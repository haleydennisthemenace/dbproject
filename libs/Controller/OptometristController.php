<?php
/** @package    OPTOMETRY::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Optometrist.php");

/**
 * OptometristController is the controller class for the Optometrist object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package OPTOMETRY::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class OptometristController extends AppBaseController
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
	 * Displays a list view of Optometrist objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Optometrist records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new OptometristCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Employeeid,Name,Password,Title'
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

				$optometrists = $this->Phreezer->Query('Optometrist',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $optometrists->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $optometrists->TotalResults;
				$output->totalPages = $optometrists->TotalPages;
				$output->pageSize = $optometrists->PageSize;
				$output->currentPage = $optometrists->CurrentPage;
			}
			else
			{
				// return all results
				$optometrists = $this->Phreezer->Query('Optometrist',$criteria);
				$output->rows = $optometrists->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Optometrist record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('employeeid');
			$optometrist = $this->Phreezer->Get('Optometrist',$pk);
			$this->RenderJSON($optometrist, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Optometrist record and render response as JSON
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

			$optometrist = new Optometrist($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $optometrist->Employeeid = $this->SafeGetVal($json, 'employeeid');

			$optometrist->Name = $this->SafeGetVal($json, 'name');
			$optometrist->Password = $this->SafeGetVal($json, 'password');
			$optometrist->Title = $this->SafeGetVal($json, 'title');

			$optometrist->Validate();
			$errors = $optometrist->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$optometrist->Save();
				$this->RenderJSON($optometrist, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Optometrist record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('employeeid');
			$optometrist = $this->Phreezer->Get('Optometrist',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $optometrist->Employeeid = $this->SafeGetVal($json, 'employeeid', $optometrist->Employeeid);

			$optometrist->Name = $this->SafeGetVal($json, 'name', $optometrist->Name);
			$optometrist->Password = $this->SafeGetVal($json, 'password', $optometrist->Password);
			$optometrist->Title = $this->SafeGetVal($json, 'title', $optometrist->Title);

			$optometrist->Validate();
			$errors = $optometrist->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$optometrist->Save();
				$this->RenderJSON($optometrist, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Optometrist record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('employeeid');
			$optometrist = $this->Phreezer->Get('Optometrist',$pk);

			$optometrist->Delete();

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
