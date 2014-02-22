<?php
/**
 * @package Base
 */

if ( !defined( 'DCM_VERSION' ) ) {
	header( 'HTTP/1.0 403 Forbidden' );
	die;
}

/*
 * LP_Base is the base class for LP_Admin
 * Does nothing currently
 */
class LP_Base {

	public function __construct() {
	}
	
}
