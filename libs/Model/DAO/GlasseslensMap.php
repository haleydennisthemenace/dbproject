<?php
/** @package    Optometry::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * GlasseslensMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the GlasseslensDAO to the glasseslens datastore.
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
class GlasseslensMap implements IDaoMap, IDaoMap2
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
			self::$FM["Glensid"] = new FieldMap("Glensid","glasseslens","glensid",true,FM_TYPE_INT,5,null,true);
			self::$FM["Sphere"] = new FieldMap("Sphere","glasseslens","sphere",false,FM_TYPE_DECIMAL,6.0,null,false);
			self::$FM["Basecurve"] = new FieldMap("Basecurve","glasseslens","basecurve",false,FM_TYPE_DECIMAL,6.0,null,false);
			self::$FM["Manufid"] = new FieldMap("Manufid","glasseslens","manufid",false,FM_TYPE_INT,5,null,false);
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