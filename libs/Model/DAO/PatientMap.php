<?php
/** @package    Optometry::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * PatientMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the PatientDAO to the patient datastore.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * You can override the default fetching strategies for KeyMaps in _config.php.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package Optometry::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class PatientMap implements IDaoMap, IDaoMap2
{

	private static $KM;
	private static $FM;
	
	/**
	 * {@inheritdoc}
	 */
	public static function AddMap($property,FieldMap $map)
	{
		self::GetFieldMaps();
		self::$FM[$property] = $map;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public static function SetFetchingStrategy($property,$loadType)
	{
		self::GetKeyMaps();
		self::$KM[$property]->LoadType = $loadType;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetFieldMaps()
	{
		if (self::$FM == null)
		{
			self::$FM = Array();
			self::$FM["Patientid"] = new FieldMap("Patientid","patient","patientid",true,FM_TYPE_INT,5,null,true);
			self::$FM["Name"] = new FieldMap("Name","patient","name",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Prescriptionid1"] = new FieldMap("Prescriptionid1","patient","prescriptionid1",false,FM_TYPE_INT,5,null,false);
			self::$FM["Prescriptionid2"] = new FieldMap("Prescriptionid2","patient","prescriptionid2",false,FM_TYPE_INT,5,null,false);
			self::$FM["Phone1"] = new FieldMap("Phone1","patient","phone1",false,FM_TYPE_VARCHAR,11,null,false);
			self::$FM["Phone2"] = new FieldMap("Phone2","patient","phone2",false,FM_TYPE_VARCHAR,11,null,false);
			self::$FM["Housenumber"] = new FieldMap("Housenumber","patient","housenumber",false,FM_TYPE_VARCHAR,6,null,false);
			self::$FM["Street"] = new FieldMap("Street","patient","street",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["City"] = new FieldMap("City","patient","city",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["State"] = new FieldMap("State","patient","state",false,FM_TYPE_VARCHAR,2,null,false);
			self::$FM["Zipcode"] = new FieldMap("Zipcode","patient","zipcode",false,FM_TYPE_INT,5,null,false);
		}
		return self::$FM;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetKeyMaps()
	{
		if (self::$KM == null)
		{
			self::$KM = Array();
		}
		return self::$KM;
	}

}

?>