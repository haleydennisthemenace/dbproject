<?php
/** @package Optometry::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("OrderMap.php");

/**
 * OrderDAO provides object-oriented access to the order table.  This
 * class is automatically generated by ClassBuilder.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the Model class which is extended from this DAO class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package Optometry::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class OrderDAO extends Phreezable
{
	/** @var int */
	public $Orderid;

	/** @var int */
	public $Clensid;

	/** @var int */
	public $Glensid;

	/** @var float */
	public $Price;

	/** @var int */
	public $Quantity;

	/** @var int */
	public $Received;



}
?>