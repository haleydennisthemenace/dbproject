<?php
/** @package    OPTOMETRY::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Contactlens.php");

/**
 * ContactlensController is the controller class for the Contactlens object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package OPTOMETRY::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class ContactlensController extends AppBaseController
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
	 * Displays a list view of Contactlens objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Contactlens records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new ContactlensCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Clensid,Name,Basecurve,Diameter,Sphere,Manufacturerid'
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

				$contactlenses = $this->Phreezer->Query('Contactlens',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $contactlenses->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $contactlenses->TotalResults;
				$output->totalPages = $contactlenses->TotalPages;
				$output->pageSize = $contactlenses->PageSize;
				$output->currentPage = $contactlenses->CurrentPage;
			}
			else
			{
				// return all results
				$contactlenses = $this->Phreezer->Query('Contactlens',$criteria);
				$output->rows = $contactlenses->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Contactlens record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('clensid');
			$contactlens = $this->Phreezer->Get('Contactlens',$pk);
			$this->RenderJSON($contactlens, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Contactlens record and render response as JSON
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

			$contactlens = new Contactlens($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $contactlens->Clensid = $this->SafeGetVal($json, 'clensid');

			$contactlens->Name = $this->SafeGetVal($json, 'name');
			$contactlens->Basecurve = $this->SafeGetVal($json, 'basecurve');
			$contactlens->Diameter = $this->SafeGetVal($json, 'diameter');
			$contactlens->Sphere = $this->SafeGetVal($json, 'sphere');
			$contactlens->Manufacturerid = $this->SafeGetVal($json, 'manufacturerid');

			$contactlens->Validate();
			$errors = $contactlens->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$contactlens->Save();
				$this->RenderJSON($contactlens, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Contactlens record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('clensid');
			$contactlens = $this->Phreezer->Get('Contactlens',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $contactlens->Clensid = $this->SafeGetVal($json, 'clensid', $contactlens->Clensid);

			$contactlens->Name = $this->SafeGetVal($json, 'name', $contactlens->Name);
			$contactlens->Basecurve = $this->SafeGetVal($json, 'basecurve', $contactlens->Basecurve);
			$contactlens->Diameter = $this->SafeGetVal($json, 'diameter', $contactlens->Diameter);
			$contactlens->Sphere = $this->SafeGetVal($json, 'sphere', $contactlens->Sphere);
			$contactlens->Manufacturerid = $this->SafeGetVal($json, 'manufacturerid', $contactlens->Manufacturerid);

			$contactlens->Validate();
			$errors = $contactlens->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$contactlens->Save();
				$this->RenderJSON($contactlens, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Contactlens record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('clensid');
			$contactlens = $this->Phreezer->Get('Contactlens',$pk);

			$contactlens->Delete();

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
