<?php
/** @package    Optometry::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the Patient object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package Optometry::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class PatientReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `patient` table
	public $CustomFieldExample;

	public $Patientid;
	public $Name;
	public $Prescriptionid1;
	public $Prescriptionid2;
	public $Phone1;
	public $Phone2;
	public $Housenumber;
	public $Street;
	public $City;
	public $State;
	public $Zipcode;

	/*
	* GetCustomQuery returns a fully formed SQL statement.  The result columns
	* must match with the properties of this reporter object.
	*
	* @see Reporter::GetCustomQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomQuery($criteria)
	{
		$sql = "select
			'custom value here...' as CustomFieldExample
			,`patient`.`patientid` as Patientid
			,`patient`.`name` as Name
			,`patient`.`prescriptionid1` as Prescriptionid1
			,`patient`.`prescriptionid2` as Prescriptionid2
			,`patient`.`phone1` as Phone1
			,`patient`.`phone2` as Phone2
			,`patient`.`housenumber` as Housenumber
			,`patient`.`street` as Street
			,`patient`.`city` as City
			,`patient`.`state` as State
			,`patient`.`zipcode` as Zipcode
		from `patient`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();
		$sql .= $criteria->GetOrder();

		return $sql;
	}
	
	/*
	* GetCustomCountQuery returns a fully formed SQL statement that will count
	* the results.  This query must return the correct number of results that
	* GetCustomQuery would, given the same criteria
	*
	* @see Reporter::GetCustomCountQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomCountQuery($criteria)
	{
		$sql = "select count(1) as counter from `patient`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>