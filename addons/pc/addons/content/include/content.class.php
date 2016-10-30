<?php

namespace pc\Content;
use phpWeChat\CaChe;
use phpWeChat\MySql;

class Content {
	public static $mPageString='';
	private static $mContentTable='pc_content';

	public static function addContent($key,$content,$appid){
		$data = array(
			'key'=>$key,
			'content'=>$content,
			'appid'=>$appid
			);
		return MySql::insert(DB_PRE.self::$mContentTable, $data,true);
	}
	
	public static function updateContent($key,$content,$appid){
		$data = array(
			'content'=>$content
		);
		if (Mysql::fetchOne("SELECT * FROM ".DB_PRE.self::$mContentTable ." WHERE `appid`={$appid} AND `key`='{$key}'")){
			return Mysql::update(DB_PRE.self::$mContentTable, $data,"`appid`={$appid} AND `key`='{$key}'");
		}
		else{
			self::addContent($key, $content, $appid);
		}
	}
	
	public static function getOne($key,$appid){
		if (empty($key)){
			return false;
		}
		$sql = "SELECT * FROM ".DB_PRE.self::$mContentTable. " WHERE `appid`={$appid} AND `key`='{$key}' LIMIT 1";
		//echo $sql;exit;
		return Mysql::fetchOne($sql);
	}
	
	public static function getAllByAppid($appid){
		$sql = "SELECT * FROM ".DB_PRE.self::$mContentTable. " WHERE `appid`={$appid} ";
		return Mysql::fetchAll($sql);
	}
}
?>