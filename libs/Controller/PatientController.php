<?php
/** @package    OPTOMETRY::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Patient.php");

/**
 * PatientController is the controller class for the Patient object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package OPTOMETRY::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class PatientController extends AppBaseController
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
	 * Displays a list view of Patient objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Patient records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new PatientCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Patientid,Name,Prescriptionid1,Prescriptionid2,Phone1,Phone2,Housenumber,Street,City,State,Zipcode'
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

				$patients = $this->Phreezer->Query('Patient',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $patients->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $patients->TotalResults;
				$output->totalPages = $patients->TotalPages;
				$output->pageSize = $patients->PageSize;
				$output->currentPage = $patients->CurrentPage;
			}
			else
			{
				// return all results
				$patients = $this->Phreezer->Query('Patient',$criteria);
				$output->rows = $patients->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Patient record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('patientid');
			$patient = $this->Phreezer->Get('Patient',$pk);
			$this->RenderJSON($patient, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Patient record and render response as JSON
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

			$patient = new Patient($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $patient->Patientid = $this->SafeGetVal($json, 'patientid');

			$patient->Name = $this->SafeGetVal($json, 'name');
			$patient->Prescriptionid1 = $this->SafeGetVal($json, 'prescriptionid1');
			$patient->Prescriptionid2 = $this->SafeGetVal($json, 'prescriptionid2');
			$patient->Phone1 = $this->SafeGetVal($json, 'phone1');
			$patient->Phone2 = $this->SafeGetVal($json, 'phone2');
			$patient->Housenumber = $this->SafeGetVal($json, 'housenumber');
			$patient->Street = $this->SafeGetVal($json, 'street');
			$patient->City = $this->SafeGetVal($json, 'city');
			$patient->State = $this->SafeGetVal($json, 'state');
			$patient->Zipcode = $this->SafeGetVal($json, 'zipcode');

			$patient->Validate();
			$errors = $patient->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$patient->Save();
				$this->RenderJSON($patient, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Patient record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('patientid');
			$patient = $this->Phreezer->Get('Patient',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $patient->Patientid = $this->SafeGetVal($json, 'patientid', $patient->Patientid);

			$patient->Name = $this->SafeGetVal($json, 'name', $patient->Name);
			$patient->Prescriptionid1 = $this->SafeGetVal($json, 'prescriptionid1', $patient->Prescriptionid1);
			$patient->Prescriptionid2 = $this->SafeGetVal($json, 'prescriptionid2', $patient->Prescriptionid2);
			$patient->Phone1 = $this->SafeGetVal($json, 'phone1', $patient->Phone1);
			$patient->Phone2 = $this->SafeGetVal($json, 'phone2', $patient->Phone2);
			$patient->Housenumber = $this->SafeGetVal($json, 'housenumber', $patient->Housenumber);
			$patient->Street = $this->SafeGetVal($json, 'street', $patient->Street);
			$patient->City = $this->SafeGetVal($json, 'city', $patient->City);
			$patient->State = $this->SafeGetVal($json, 'state', $patient->State);
			$patient->Zipcode = $this->SafeGetVal($json, 'zipcode', $patient->Zipcode);

			$patient->Validate();
			$errors = $patient->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$patient->Save();
				$this->RenderJSON($patient, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Patient record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('patientid');
			$patient = $this->Phreezer->Get('Patient',$pk);

			$patient->Delete();

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
