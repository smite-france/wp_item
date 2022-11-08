<?php

function get_item_spec($id , $name ) {
	global $wpdb;
	$sql = "";
	$a_results = array() ;
	if(is_array($name)){
		$sql = "SELECT ";
		foreach($name as $key => $value){
			$sql .= " ".$value." ,";
		}
		$sql = substr($sql,0,-1);
		$sql .= " FROM ".SMFR_ITEM_DB_PREFIX;
	}else {
		$sql = "SELECT ".$name." FROM ".SMFR_ITEM_DB_PREFIX;
	}
	if($id != 0 ){
		$sql .= "WHERE id = ".$id;
	}else{
		$sql .= "ORDER BY name asc";
	}

//	pr($sql);

	$a_results = $wpdb->get_results($sql, ARRAY_A);
	return $a_results;
}

function set_item_spec($id , $name , $value) {
	global $wpdb;
	$bool = false;
	$array = array();
	if($id != 0) {
		if (is_array($name) && is_array($value)) {
			// build temp array !
			for ($i = 0; $i < count($name); $i++) {
				$array[$name[$i]] = $value[$i];
			}
		} else {
			$array = array(
				$name => $value,
			);
		}
		$bool = $wpdb->update(
			SMFR_ITEM_DB_PREFIX,
			$array,
			array('id' => $id)
		);
	}
	return $bool;
}

function add_item_spec($name , $value){
	global $wpdb;
	if (is_array($name) && is_array($value)) {
		// build temp array !
		for ($i = 0; $i < count($name); $i++) {
			$array[$name[$i]] = $value[$i];
		}
	} else {
		$array = array(
			$name => $value,
		);
	}
	$wpdb->insert(
		SMFR_ITEM_DB_PREFIX,
		$array,
		array()
	);
	return $wpdb->insert_id;
}