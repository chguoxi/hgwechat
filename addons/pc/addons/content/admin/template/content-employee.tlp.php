{php !defined('IN_MANAGE') && exit('Access Denied!');use phpWeChat\Form;use phpWeChat\MySql;}
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>微私募后台管理</title>
    <link rel="stylesheet" type="text/css" href="{__PW_PATH__}admin/template/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="{__PW_PATH__}admin/template/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="{__PW_PATH__}statics/core.css"/>
    <link rel="stylesheet" type="text/css" href="{__PW_PATH__}statics/reveal/reveal.css"/>
	<script src="{__PW_PATH__}statics/jquery/jquery-1.12.2.min.js" language="javascript"></script>
    <script src="{__PW_PATH__}statics/reveal/jquery.reveal.js" language="javascript"></script>
	<script src="{__PW_PATH__}statics/core.js" language="javascript"></script>
    <script type="text/javascript" src="{__PW_PATH__}admin/template/js/libs/modernizr.min.js"></script>
    <script language="javascript" type="text/javascript">
		var PW_PATH='{__PW_PATH__}';
	</script>
</head>
<body>
<div class="ifame-main-wrap">
      <div class="crumb-wrap">
          <div class="crumb-list"><i class="icon-font"></i><a href="{__PW_PATH__}{__ADMIN_FILE__}?file=index&action=main">管理首页</a><span class="crumb-step">&gt;</span><span class="crumb-name"><a href="{__PW_PATH__}{__ADMIN_FILE__}?mod={$mod}&file={$file}&action={$action}">粉丝营销</a></span></div>
      </div>
      <div class="result-wrap">
      
          <form name="myform" id="myform" action="" method="post">
             
              <div class="result-content">
				<div class="config-items">
                   <div class="admin-nav">
                        <h2>添加核心人物</h2>
                        <div class="nav">
                        	<a href="{__PW_PATH__}{__ADMIN_FILE__}?mod=content&file=content&action=employee" class="hover">核心人物列表</a>
                            <a href="{__PW_PATH__}{__ADMIN_FILE__}?mod=content&file=content&action=employee_post" >增加核心人物</a>
                            
                        </div>
                    </div>				
				</div>
                  <table class="result-tab" width="100%">
                      <tr>
                        <th class="tc" width="1%"><input id="checkAll" class="common-checkbox" checked="checked" title="全选/反选" type="checkbox"></th>
                          <th width="3%">编号</th>
                          <th width="14%">姓名</th>
						  <th width="9%">性别</th>
						  <th width="14%">职称</th>
						  <th width="12%">从业背景</th>
						  <th width="13%">学历</th>
						  <th width="13%">头像</th>
						  <th width="13%">是否展示</th>
                          <th width="8%">操作</th>
                      </tr>
                      {loop $employees $r}
                      <tr>
                          <td class="tc"><input name="ids[{$r['id']}]" class="common-checkbox" checked="checked" la="checkbox" value="{$r['id']}" type="checkbox"></td>
                          <td>{$r['id']}</td>
                          <td>{if $r['name']}{$r['name']}{else}-{/if}</td>
						  <td>{php echo $r['gender']==1?'男':($r['gender']==2?'女':'未知');}</td>
						  <td>{php echo $r['job_title']}</td>
						  <td>{if $r['occupation_background']}{$r['occupation_background']}{else}-{/if}</td>
						  <td>{php echo $r['degree']}</td>
						  <td>{if $r['avatar']}<a href="{$r['avatar']}" target="_blank"><img src="{$r['avatar']}" style="width:50px; margin:8px 0px" /></a>{else}-{/if}</td>
						  <td>{if $r['display']}是{else}否{/if}</td>
                          <td>
                          	  <a href="{__PW_PATH__}{__ADMIN_FILE__}?mod={$mod}&file={$file}&action=employee_del&id={$r['id']}">删除</a>|
                          	  <a href="{__PW_PATH__}{__ADMIN_FILE__}?mod={$mod}&file={$file}&action=employee_edit={$r['openid']}">编辑</a>
                          </td>
                      </tr>
                     {/loop}
                     <tr>
                     	<td colspan="10">
                        	{php echo WeChatManage::$mPageString;}
                        </td>
                     </tr>
                  </table>
              </div>
          </form>
      </div>
  </div>
    <div class="statics-footer"> Powered by phpWeChat V{__PHPWECHAT_VERSION__}{__PHPWECHAT_RELEASE__} © , Processed in {php echo microtime()-$PW['time_start'];} second(s) , {MySql::$mQuery} queries <a href="#">至顶端↑</a></div>
</body>
</html>