<?php
/** @package    Optometry::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Criteria.php");

/**
 * PatientCriteria allows custom querying for the Patient object.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the ModelCriteria class which is extended from this class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @inheritdocs
 * @package Optometry::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class PatientCriteriaDAO extends Criteria
{

	public $Patientid_Equals;
	public $Patientid_NotEquals;
	public $Patientid_IsLike;
	public $Patientid_IsNotLike;
	public $Patientid_BeginsWith;
	public $Patientid_EndsWith;
	public $Patientid_GreaterThan;
	public $Patientid_GreaterThanOrEqual;
	public $Patientid_LessThan;
	public $Patientid_LessThanOrEqual;
	public $Patientid_In;
	public $Patientid_IsNotEmpty;
	public $Patientid_IsEmpty;
	public $Patientid_BitwiseOr;
	public $Patientid_BitwiseAnd;
	public $Name_Equals;
	public $Name_NotEquals;
	public $Name_IsLike;
	public $Name_IsNotLike;
	public $Name_BeginsWith;
	public $Name_EndsWith;
	public $Name_GreaterThan;
	public $Name_GreaterThanOrEqual;
	public $Name_LessThan;
	public $Name_LessThanOrEqual;
	public $Name_In;
	public $Name_IsNotEmpty;
	public $Name_IsEmpty;
	public $Name_BitwiseOr;
	public $Name_BitwiseAnd;
	public $Prescriptionid1_Equals;
	public $Prescriptionid1_NotEquals;
	public $Prescriptionid1_IsLike;
	public $Prescriptionid1_IsNotLike;
	public $Prescriptionid1_BeginsWith;
	public $Prescriptionid1_EndsWith;
	public $Prescriptionid1_GreaterThan;
	public $Prescriptionid1_GreaterThanOrEqual;
	public $Prescriptionid1_LessThan;
	public $Prescriptionid1_LessThanOrEqual;
	public $Prescriptionid1_In;
	public $Prescriptionid1_IsNotEmpty;
	public $Prescriptionid1_IsEmpty;
	public $Prescriptionid1_BitwiseOr;
	public $Prescriptionid1_BitwiseAnd;
	public $Prescriptionid2_Equals;
	public $Prescriptionid2_NotEquals;
	public $Prescriptionid2_IsLike;
	public $Prescriptionid2_IsNotLike;
	public $Prescriptionid2_BeginsWith;
	public $Prescriptionid2_EndsWith;
	public $Prescriptionid2_GreaterThan;
	public $Prescriptionid2_GreaterThanOrEqual;
	public $Prescriptionid2_LessThan;
	public $Prescriptionid2_LessThanOrEqual;
	public $Prescriptionid2_In;
	public $Prescriptionid2_IsNotEmpty;
	public $Prescriptionid2_IsEmpty;
	public $Prescriptionid2_BitwiseOr;
	public $Prescriptionid2_BitwiseAnd;
	public $Phone1_Equals;
	public $Phone1_NotEquals;
	public $Phone1_IsLike;
	public $Phone1_IsNotLike;
	public $Phone1_BeginsWith;
	public $Phone1_EndsWith;
	public $Phone1_GreaterThan;
	public $Phone1_GreaterThanOrEqual;
	public $Phone1_LessThan;
	public $Phone1_LessThanOrEqual;
	public $Phone1_In;
	public $Phone1_IsNotEmpty;
	public $Phone1_IsEmpty;
	public $Phone1_BitwiseOr;
	public $Phone1_BitwiseAnd;
	public $Phone2_Equals;
	public $Phone2_NotEquals;
	public $Phone2_IsLike;
	public $Phone2_IsNotLike;
	public $Phone2_BeginsWith;
	public $Phone2_EndsWith;
	public $Phone2_GreaterThan;
	public $Phone2_GreaterThanOrEqual;
	public $Phone2_LessThan;
	public $Phone2_LessThanOrEqual;
	public $Phone2_In;
	public $Phone2_IsNotEmpty;
	public $Phone2_IsEmpty;
	public $Phone2_BitwiseOr;
	public $Phone2_BitwiseAnd;
	public $Housenumber_Equals;
	public $Housenumber_NotEquals;
	public $Housenumber_IsLike;
	public $Housenumber_IsNotLike;
	public $Housenumber_BeginsWith;
	public $Housenumber_EndsWith;
	public $Housenumber_GreaterThan;
	public $Housenumber_GreaterThanOrEqual;
	public $Housenumber_LessThan;
	public $Housenumber_LessThanOrEqual;
	public $Housenumber_In;
	public $Housenumber_IsNotEmpty;
	public $Housenumber_IsEmpty;
	public $Housenumber_BitwiseOr;
	public $Housenumber_BitwiseAnd;
	public $Street_Equals;
	public $Street_NotEquals;
	public $Street_IsLike;
	public $Street_IsNotLike;
	public $Street_BeginsWith;
	public $Street_EndsWith;
	public $Street_GreaterThan;
	public $Street_GreaterThanOrEqual;
	public $Street_LessThan;
	public $Street_LessThanOrEqual;
	public $Street_In;
	public $Street_IsNotEmpty;
	public $Street_IsEmpty;
	public $Street_BitwiseOr;
	public $Street_BitwiseAnd;
	public $City_Equals;
	public $City_NotEquals;
	public $City_IsLike;
	public $City_IsNotLike;
	public $City_BeginsWith;
	public $City_EndsWith;
	public $City_GreaterThan;
	public $City_GreaterThanOrEqual;
	public $City_LessThan;
	public $City_LessThanOrEqual;
	public $City_In;
	public $City_IsNotEmpty;
	public $City_IsEmpty;
	public $City_BitwiseOr;
	public $City_BitwiseAnd;
	public $State_Equals;
	public $State_NotEquals;
	public $State_IsLike;
	public $State_IsNotLike;
	public $State_BeginsWith;
	public $State_EndsWith;
	public $State_GreaterThan;
	public $State_GreaterThanOrEqual;
	public $State_LessThan;
	public $State_LessThanOrEqual;
	public $State_In;
	public $State_IsNotEmpty;
	public $State_IsEmpty;
	public $State_BitwiseOr;
	public $State_BitwiseAnd;
	public $Zipcode_Equals;
	public $Zipcode_NotEquals;
	public $Zipcode_IsLike;
	public $Zipcode_IsNotLike;
	public $Zipcode_BeginsWith;
	public $Zipcode_EndsWith;
	public $Zipcode_GreaterThan;
	public $Zipcode_GreaterThanOrEqual;
	public $Zipcode_LessThan;
	public $Zipcode_LessThanOrEqual;
	public $Zipcode_In;
	public $Zipcode_IsNotEmpty;
	public $Zipcode_IsEmpty;
	public $Zipcode_BitwiseOr;
	public $Zipcode_BitwiseAnd;

}

?>