<?php !defined('IN_MANAGE') && exit('Access Denied!');?>
<?php use phpWeChat\MySql;?>
<?php use Pc\Demo\Demo;?>

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
        <div class="crumb-list"><i class="icon-font"></i><a href="<?php echo defined('PW_PATH')?PW_PATH:'{__PW_PATH__}';?><?php echo defined('ADMIN_FILE')?ADMIN_FILE:'{__ADMIN_FILE__}';?>?file=index&action=main">管理首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">Demo管理</span></div>
    </div>
    <div class="result-wrap">
        <div class="config-items">
            <!--
            <div style="border: 1px solid #F3F3F3; padding:8px; margin:8px 0px">
                <form name="seatchform" method="post" action="<?php echo defined('PW_PATH')?PW_PATH:'{__PW_PATH__}';?><?php echo defined('ADMIN_FILE')?ADMIN_FILE:'{__ADMIN_FILE__}';?>?mod=<?php echo isset($mod)?$mod:'';?>&file=<?php echo isset($file)?$file:'';?>&action=<?php echo isset($action)?$action:'';?>">
                    按标题检索：
                    <input type="text" class="common-text" name="username" size="32" />
                    <input type="submit" value="搜 索" class="common_btn">
                </form>
            </div>
            -->
            <div class="admin-nav">
                <div class="nav">
                    <a href="<?php echo defined('PW_PATH')?PW_PATH:'{__PW_PATH__}';?><?php echo defined('ADMIN_FILE')?ADMIN_FILE:'{__ADMIN_FILE__}';?>?mod=<?php echo isset($mod)?$mod:'';?>&file=<?php echo isset($file)?$file:'';?>&action=manage" class="hover">Demo管理</a>
                    <?php if($_roleid==-1) { ?><a href="<?php echo defined('PW_PATH')?PW_PATH:'{__PW_PATH__}';?><?php echo defined('ADMIN_FILE')?ADMIN_FILE:'{__ADMIN_FILE__}';?>?mod=<?php echo isset($mod)?$mod:'';?>&file=<?php echo isset($file)?$file:'';?>&action=add">添加Demo</a><?php }?>
                </div>
            </div>
            <div class="result-content">
                <table class="result-tab" width="100%">
                    <tr>
                        <th>ID</th>
                        <th>标题</th>
                        <th>时间</th>
                        <th>管理</th>
                    </tr>
                    <?php $no=1;if(is_array($data))foreach($data as $r){?>
                    <tr>
                        <td><?php echo isset($r['id'])?$r['id']:'';?></td>
                        <td><?php echo isset($r['title'])?$r['title']:'';?></td>
                        <td><?php echo date('Y-m-d H:i:s',$r['posttime']);?></td>
                        <td>
                            <a href="<?php echo defined('PW_PATH')?PW_PATH:'{__PW_PATH__}';?><?php echo defined('ADMIN_FILE')?ADMIN_FILE:'{__ADMIN_FILE__}';?>?mod=<?php echo isset($mod)?$mod:'';?>&file=<?php echo isset($file)?$file:'';?>&action=edit&id=<?php echo isset($r['id'])?$r['id']:'';?>">编辑</a>
                            &nbsp;&nbsp;&nbsp;
                            <a onClick="if(!confirm('确定要删除该条记录吗？删除后不可恢复！')){return false;}" href="?mod=<?php echo isset($mod)?$mod:'';?>&file=<?php echo isset($file)?$file:'';?>&action=delete&id=<?php echo isset($r['id'])?$r['id']:'';?>">删除</a>
                        </td>
                    </tr>
                    <?php $no++;}?>
                    <tr>
                        <td colspan="8">
                            <?php echo Demo::$mPageString;?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="statics-footer"> Powered by phpWeChat V<?php echo date('Y');?> © , Processed in <?php echo microtime()-$PW['time_start'];?> second(s) , <?php echo MySql::$mQuery;?> queries <a href="#">至顶端↑</a></div>
</body>
</html>