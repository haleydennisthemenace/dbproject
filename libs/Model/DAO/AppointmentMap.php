<?php
/** @package    Optometry::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * AppointmentMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the AppointmentDAO to the appointment datastore.
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
class AppointmentMap implements IDaoMap, IDaoMap2
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
			self::$FM["Locationid"] = new FieldMap("Locationid","appointment","locationid",true,FM_TYPE_INT,5,null,false);
			self::$FM["Employeeid"] = new FieldMap("Employeeid","appointment","employeeid",true,FM_TYPE_INT,5,null,false);
			self::$FM["Patientid"] = new FieldMap("Patientid","appointment","patientid",true,FM_TYPE_INT,5,null,false);
			self::$FM["Starttime"] = new FieldMap("Starttime","appointment","starttime",true,FM_TYPE_DATETIME,null,null,false);
			self::$FM["Endtime"] = new FieldMap("Endtime","appointment","endtime",false,FM_TYPE_DATETIME,null,null,false);
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