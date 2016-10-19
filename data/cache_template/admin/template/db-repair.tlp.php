<?php !defined('IN_MANAGE') && exit('Access Denied!');use phpWeChat\dbBak;use phpWeChat\MySql;?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>phpWeChat后台管理</title>
    <link rel="stylesheet" type="text/css" href="<?php echo defined('PW_PATH')?PW_PATH:'{__PW_PATH__}';?>admin/template/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo defined('PW_PATH')?PW_PATH:'{__PW_PATH__}';?>admin/template/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo defined('PW_PATH')?PW_PATH:'{__PW_PATH__}';?>statics/core.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo defined('PW_PATH')?PW_PATH:'{__PW_PATH__}';?>statics/reveal/reveal.css"/>
	<script src="<?php echo defined('PW_PATH')?PW_PATH:'{__PW_PATH__}';?>statics/jquery/jquery-1.12.2.min.js" language="javascript"></script>
    <script src="<?php echo defined('PW_PATH')?PW_PATH:'{__PW_PATH__}';?>statics/reveal/jquery.reveal.js" language="javascript"></script>
	<script src="<?php echo defined('PW_PATH')?PW_PATH:'{__PW_PATH__}';?>statics/core.js" language="javascript"></script>
    <script type="text/javascript" src="<?php echo defined('PW_PATH')?PW_PATH:'{__PW_PATH__}';?>admin/template/js/libs/modernizr.min.js"></script>
    <script language="javascript" type="text/javascript">
		var PW_PATH='<?php echo defined('PW_PATH')?PW_PATH:'{__PW_PATH__}';?>';
	</script>
</head>
<body>
    <div class="ifame-main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="<?php echo defined('PW_PATH')?PW_PATH:'{__PW_PATH__}';?><?php echo defined('ADMIN_FILE')?ADMIN_FILE:'{__ADMIN_FILE__}';?>?file=index&action=main">管理首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">优化修复</span></div>
        </div>
        <div class="result-wrap">
                <div class="config-items">
					<form action="" method="post" name="myform" id="myform">
					<input type="hidden" name="operation" id="operation" value="optimize" />
					<div class="result-title">
					  <div class="result-list">
						  <a href="###" onClick="if(isCheckboxChecked()){$('#operation').val('optimize');$('#myform').submit();}else{alert('请选择要'+$(this).text()+' 的项目！')}"><i class="icon-font">&#xe045;</i>优化表</a>
						  <a href="###" onClick="if(isCheckboxChecked()){$('#operation').val('repair');$('#myform').submit();}else{alert('请选择要'+$(this).text()+' 的项目！')}"><i class="icon-font">&#xe017;</i>修复表</a>
					  </div>
				    </div>
                    <div class="result-content">
						<ul class="toggle-ul">
							<li style="border-left:#F3F3F3 1px solid"><a href="<?php echo defined('PW_PATH')?PW_PATH:'{__PW_PATH__}';?><?php echo defined('ADMIN_FILE')?ADMIN_FILE:'{__ADMIN_FILE__}';?>?mod=&file=db&action=export">数据备份</a></li>
							<li><a href="<?php echo defined('PW_PATH')?PW_PATH:'{__PW_PATH__}';?><?php echo defined('ADMIN_FILE')?ADMIN_FILE:'{__ADMIN_FILE__}';?>?mod=&file=db&action=import">数据还原</a></li>
							<li class="hover"><a href="<?php echo defined('PW_PATH')?PW_PATH:'{__PW_PATH__}';?><?php echo defined('ADMIN_FILE')?ADMIN_FILE:'{__ADMIN_FILE__}';?>?mod=&file=db&action=repair">优化修复</a></li>
						</ul>
                        <table class="result-tab" width="100%">
						  <tr>
							<th><input id="checkAll" class="common-checkbox" checked="checked" title="全选/反选" type="checkbox" /></th>
							<th>数据库表</th>
							<th>记录条数</th>
							<th>使用空间</th>
							<th>表类型</th>
							<th>记录更新时间</th>
						  </tr>
						  <?php $no=1;if(is_array(dbBak::tablesList()))foreach(dbBak::tablesList() as $r){?>
							<tr>
								<td><input type="checkbox" name="name[]" class="common-checkbox" checked="checked" la="checkbox" value="<?php echo isset($r['Name'])?$r['Name']:'';?>" /></td>
								<td><?php echo isset($r['Name'])?$r['Name']:'';?></td>
								<td><?php echo isset($r['Rows'])?$r['Rows']:'';?> 条</td>
								<td><?php echo round($r['Data_length']/1024,2);?> K </td>
								<td><?php echo isset($r['Engine'])?$r['Engine']:'';?> </td>
								<td><?php echo $r['Update_time']?$r['Update_time']:'-';?> </td>
							</tr>
						 <?php $no++;}?>
					  </table>
                    </div>
					</form>
                </div>
        </div>
    </div>
    <div class="statics-footer">  V<?php echo defined('PHPWECHAT_VERSION')?PHPWECHAT_VERSION:'{__PHPWECHAT_VERSION__}';?><?php echo defined('PHPWECHAT_RELEASE')?PHPWECHAT_RELEASE:'{__PHPWECHAT_RELEASE__}';?> © , Processed in <?php echo microtime()-$PW['time_start'];?> second(s) , <?php echo MySql::$mQuery;?> queries <a href="#">至顶端↑</a></div>
</body>
</html>