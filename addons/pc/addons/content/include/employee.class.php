<?php

namespace pc\Content;
use phpWeChat\CaChe;
use phpWeChat\MySql;


class Employee {
	public static $mPageString='';
	private static $mEmployeeTable='pc_employee';
	
	public static function addEmployee($data){
		return Mysql::insert(DB_PRE.self::$mEmployeeTable, $data);
	}
	
	public static function updateEmployee($data){
		if (!isset($data['employee_id']) || !$data['employee_id']){
			return false;
		}
		
		$info = Mysql::fetchOne("SELECT * FROM ".DB_PRE.self::$mEmployeeTable ." WHERE `employee_id`='{$data['employee_id']}' limit 1");
		if (isset($info['employee_id']) && $info['employee_id']==$data['employee_id']){
			return Mysql::update(DB_PRE.self::$mEmployeeTable, $data, "`employee_id`='{$data['employee_id']}'");
		}
		else{
			return self::addEmployee($data);
		}
	}
	
	public static function getAllEmployee($appid){
		$sql = "SELECT * FROM ".DB_PRE.self::$mEmployeeTable ." WHERE `appid`={$appid}";
		return Mysql::fetchAll($sql);
	}
	
	public static function deleteEmployee($id){
		return Mysql::mysqlDelete(DB_PRE.self::$mEmployeeTable, $id, 'id');
	}
	
	public static function getOne($id,$appid){
		return Mysql::fetchOne("SELECT * FROM ".DB_PRE.self::$mEmployeeTable. "WHERE `id`={$id}")." AND `appid`={$appid}";
	}
}