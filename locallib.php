<?php

defined('MOODLE_INTERNAL') || die();
require_once(dirname(__FILE__) . '/../../config.php'); //obligatorio

//table showing a table of 4x4 where books are shown
function librar_bookShelf(){
	global $DB, $USER, $CFG;
	
	$table = new html_table();
	$rows=3;
	$columns=3;
	//going throw rows
	for($row = 0;$row<$rows;$row ++){
		//going through columns
		for($column = 0;$column<$columns;$column ++){
			
		}
	}
}