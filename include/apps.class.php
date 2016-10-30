<?php
namespace phpWeChat;
class Apps {
	private static $mAppsTable='apps';
	
	public static function getCurrAppId(){
		$appinfo = self::getAppInfoByHostname();
		return $appinfo['appid'] ? $appinfo['appid'] : ($_SESSION['appid'] ? (int)$_SESSION['appid'] : 1);
	}
	
	public static function getAppInfoByHostname( $hostname='' ){
		if(empty($hostname)){
			$hostname = $_SERVER['HTTP_HOST'];
		}
		$r=MySql::fetchOne("SELECT * FROM `".DB_PRE.self::$mAppsTable."` WHERE `".DB_PRE.self::$mAppsTable."`.`site_hostname`='{$hostname}'");
		return $r;
	}
	
	public static function updateAppInfo($info,$where=""){
		return MySql::update(DB_PRE.self::$mAppsTable, $info,$where);
	}
	
}