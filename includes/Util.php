<?php
	
/**
 * Deze klasse bevat helper-functies
 * 
 */
 
class Util {
	
	public static function getSafeGetVar ($paramVal)
	{
		// voeg hier beveiliging toe!
		// mysql_real_escape_string($_GET[$paramName]); etc
		$paramVal = isset($_GET[$paramVal]) ? $_GET[$paramVal] : 'id';
		
		return $paramVal;
	}



}