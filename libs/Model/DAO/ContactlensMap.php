<?php
/** @package    Optometry::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * ContactlensMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the ContactlensDAO to the contactlens datastore.
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
class ContactlensMap implements IDaoMap, IDaoMap2
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
			self::$FM["Clensid"] = new FieldMap("Clensid","contactlens","clensid",true,FM_TYPE_INT,10,null,true);
			self::$FM["Name"] = new FieldMap("Name","contactlens","name",false,FM_TYPE_VARCHAR,15,null,false);
			self::$FM["Basecurve"] = new FieldMap("Basecurve","contactlens","basecurve",false,FM_TYPE_DECIMAL,3.0,null,false);
			self::$FM["Diameter"] = new FieldMap("Diameter","contactlens","diameter",false,FM_TYPE_DECIMAL,4.0,null,false);
			self::$FM["Sphere"] = new FieldMap("Sphere","contactlens","sphere",false,FM_TYPE_DECIMAL,5.0,null,false);
			self::$FM["Manufacturerid"] = new FieldMap("Manufacturerid","contactlens","manufacturerid",false,FM_TYPE_INT,5,null,false);
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