<?php
/** @package    OPTOMETRY::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Appointment.php");

/**
 * AppointmentController is the controller class for the Appointment object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package OPTOMETRY::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class AppointmentController extends AppBaseController
{

	/**
	 * Override here for any controller-specific functionality
	 *
	 * @inheritdocs
	 */
	protected function Init()
	{
		parent::Init();

		// TODO: add controller-wide bootstrap code
		
		// TODO: if authentiation is required for this entire controller, for example:
		// $this->RequirePermission(ExampleUser::$PERMISSION_USER,'SecureExample.LoginForm');
	}

	/**
	 * Displays a list view of Appointment objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Appointment records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new AppointmentCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Locationid,Employeeid,Patientid,Starttime,Endtime'
				, '%'.$filter.'%')
			);

			// TODO: this is generic query filtering based only on criteria properties
			foreach (array_keys($_REQUEST) as $prop)
			{
				$prop_normal = ucfirst($prop);
				$prop_equals = $prop_normal.'_Equals';

				if (property_exists($criteria, $prop_normal))
				{
					$criteria->$prop_normal = RequestUtil::Get($prop);
				}
				elseif (property_exists($criteria, $prop_equals))
				{
					// this is a convenience so that the _Equals suffix is not needed
					$criteria->$prop_equals = RequestUtil::Get($prop);
				}
			}

			$output = new stdClass();

			// if a sort order was specified then specify in the criteria
 			$output->orderBy = RequestUtil::Get('orderBy');
 			$output->orderDesc = RequestUtil::Get('orderDesc') != '';
 			if ($output->orderBy) $criteria->SetOrder($output->orderBy, $output->orderDesc);

			$page = RequestUtil::Get('page');

			if ($page != '')
			{
				// if page is specified, use this instead (at the expense of one extra count query)
				$pagesize = $this->GetDefaultPageSize();

				$appointments = $this->Phreezer->Query('Appointment',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $appointments->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $appointments->TotalResults;
				$output->totalPages = $appointments->TotalPages;
				$output->pageSize = $appointments->PageSize;
				$output->currentPage = $appointments->CurrentPage;
			}
			else
			{
				// return all results
				$appointments = $this->Phreezer->Query('Appointment',$criteria);
				$output->rows = $appointments->ToObjectArray(true, $this->SimpleObjectParams());
				$output->totalResults = count($output->rows);
				$output->totalPages = 1;
				$output->pageSize = $output->totalResults;
				$output->currentPage = 1;
			}


			$this->RenderJSON($output, $this->JSONPCallback());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method retrieves a single Appointment record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('locationid');
			$appointment = $this->Phreezer->Get('Appointment',$pk);
			$this->RenderJSON($appointment, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Appointment record and render response as JSON
	 */
	public function Create()
	{
		try
		{
						
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$appointment = new Appointment($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			$appointment->Locationid = $this->SafeGetVal($json, 'locationid');
			$appointment->Employeeid = $this->SafeGetVal($json, 'employeeid');
			$appointment->Patientid = $this->SafeGetVal($json, 'patientid');
			$appointment->Starttime = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'starttime')));
			$appointment->Endtime = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'endtime')));

			$appointment->Validate();
			$errors = $appointment->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				// since the primary key is not auto-increment we must force the insert here
				$appointment->Save(true);
				$this->RenderJSON($appointment, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Appointment record and render response as JSON
	 */
	public function Update()
	{
		try
		{
						
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$pk = $this->GetRouter()->GetUrlParam('locationid');
			$appointment = $this->Phreezer->Get('Appointment',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $appointment->Locationid = $this->SafeGetVal($json, 'locationid', $appointment->Locationid);

			// this is a primary key.  uncomment if updating is allowed
			// $appointment->Employeeid = $this->SafeGetVal($json, 'employeeid', $appointment->Employeeid);

			// this is a primary key.  uncomment if updating is allowed
			// $appointment->Patientid = $this->SafeGetVal($json, 'patientid', $appointment->Patientid);

			// this is a primary key.  uncomment if updating is allowed
			// $appointment->Starttime = $this->SafeGetVal($json, 'starttime', $appointment->Starttime);

			$appointment->Endtime = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'endtime', $appointment->Endtime)));

			$appointment->Validate();
			$errors = $appointment->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$appointment->Save();
				$this->RenderJSON($appointment, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{

			// this table does not have an auto-increment primary key, so it is semantically correct to
			// issue a REST PUT request, however we have no way to know whether to insert or update.
			// if the record is not found, this exception will indicate that this is an insert request
			if (is_a($ex,'NotFoundException'))
			{
				return $this->Create();
			}

			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Appointment record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('locationid');
			$appointment = $this->Phreezer->Get('Appointment',$pk);

			$appointment->Delete();

			$output = new stdClass();

			$this->RenderJSON($output, $this->JSONPCallback());

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}
}

?>
