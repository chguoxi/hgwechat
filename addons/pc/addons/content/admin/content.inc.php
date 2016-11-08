<?php
/**
	 * 本文件是 content 模块的后端控制器
	 *
	 * 您可以通过 switch 的 case 分支来实现不同的业务逻辑
	 */


use phpWeChat\Area;
use phpWeChat\CaChe;
use phpWeChat\Config;
use phpWeChat\Member;
use phpWeChat\Module;
use phpWeChat\MySql;
use phpWeChat\Order;
use phpWeChat\Upload;
use phpWeChat\Apps;
use pc\Content\Content;
use pc\Content\Employee;

!defined('IN_MANAGE') && exit('Access Denied!'); 

$mod=@return_edefualt(str_callback_w($_GET['mod']),'content');
$file=@return_edefualt(str_callback_w($_GET['file']),'content');
$action=@return_edefualt(str_callback_w($_GET['action']),'config');
$appid = Apps::getCurrAppId();

$_parent=Module::getModuleByKey(Module::getModule($mod,'parentkey'));
$_mod=$_parent['folder'].'/'.$mod.'/';

switch($action)
{
	// case 'config' 是系统默认自带操作，用于进行模块选项配置的操作
	case 'config':
		if(isset($dosubmit))
		{
			Config::setConfig($_mod,$config,$appid);
			operation_tips('操作成功！','?mod=content&file=content&action=intro');
		}
		
		include_once parse_admin_tlp($file.'-'.$action,$mod);
		break;
	case 'intro':
		$key = 'pc_content_intro';
		if(isset($dosubmit)){
			$text = $content[$key];
			Content::updateContent($key, $text, $appid);
			operation_tips('操作成功！','?mod=content&file=content&action=intro');			
		}
		$info = Content::getOne($key, $appid);
		// 已经保存的值
		//print_r($introInfo);
		$$key = $info && isset($info['content']) ? $info['content'] : '';
		include_once parse_admin_tlp($file.'-'.$action,$mod);
		break;
	case 'idea':
		$key = 'pc_content_idea';
		if(isset($dosubmit)){
			$text = $content[$key];
			Content::updateContent($key, $text, $appid);
			operation_tips('操作成功！','?mod=content&file=content&action=idea');
		}
		$info = Content::getOne($key, $appid);
		$$key = $info && isset($info['content']) ? $info['content'] : '';
		include_once parse_admin_tlp($file.'-'.$action,$mod);
		break;
	case 'jobs':
		$key = 'pc_content_jobs';
		if(isset($dosubmit)){
			$text = $content[$key];
			Content::updateContent($key, $text, $appid);
			operation_tips('操作成功！','?mod=content&file=content&action=jobs');
		}
		$info = Content::getOne($key, $appid);
		$$key = $info && isset($info['content']) ? $info['content'] : '';
		include_once parse_admin_tlp($file.'-'.$action,$mod);
		break;
	case 'employee':
		$employees = Employee::getAllEmployee($appid);
		//echo Mysql::getLastSql();exit;
		include_once parse_admin_tlp($file.'-'.$action,$mod);
		break;
	case 'employee_post':
		if(isset($dosubmit)){
			$employee['appid'] = $appid;
			Employee::updateEmployee($employee);
			operation_tips('操作成功！','?mod=content&file=content&action=employee');
		}
		$id = intval($_GET['id']);
		if( $id>0 ){
			$employee = Employee::getOne($id, $appid);
		}
		
		include_once parse_admin_tlp($file.'-'.$action,$mod);
		break;
	default:
		break;
}
?>