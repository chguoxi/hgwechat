{php !defined('IN_MANAGE') && exit('Access Denied!');}
<?php
use pc\Content\Content;
use phpWeChat\Area;
use phpWeChat\CaChe;
use phpWeChat\Config;
use phpWeChat\Member;
use phpWeChat\Module;
use phpWeChat\MySql;
use phpWeChat\Order;
use phpWeChat\Upload;
use phpWeChat\Form;
?>
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
	<script language="javascript" type="text/javascript">
		var PW_PATH='{__PW_PATH__}';
	</script>
	<script src="{__PW_PATH__}statics/jquery/jquery-1.12.2.min.js" language="javascript"></script>
    <script src="{__PW_PATH__}statics/reveal/jquery.reveal.js" language="javascript"></script>
	<script src="{__PW_PATH__}statics/core.js" language="javascript"></script>
    <script type="text/javascript" src="{__PW_PATH__}admin/template/js/libs/modernizr.min.js"></script>
    
</head>
<body>
    <div class="ifame-main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="{__PW_PATH__}{__ADMIN_FILE__}?file=index&action=main">管理首页</a><span class="crumb-step">&gt;</span><span class="crumb-name"><a href="{__PW_PATH__}{__ADMIN_FILE__}?mod={$mod}&file={$file}&action={$action}">配置选项</a></span></div>
        </div>
        <div class="result-wrap">
            <form action="" method="post" name="mysubmitform" id="mysubmitform" enctype="multipart/form-data">
            	<input type="hidden" value="1" name="dosubmit">
                <div class="config-items">
                   <div class="admin-nav">
                        <h2>添加核心人物</h2>
                        <div class="nav">
                        	<a href="{__PW_PATH__}{__ADMIN_FILE__}?mod=content&file=content&action=employee" >核心人物列表</a>
                            <a href="{__PW_PATH__}{__ADMIN_FILE__}?mod=content&file=content&action=employee_post" class="hover">增加核心人物</a>
                            
                        </div>
                    </div>
					<div class="result-content" id="content_panel_1">
						{php Form::loadForm('employee');}
                        <table width="100%" class="insert-tab">
                            <tbody>
								<tr class="formtr">
                                    <th class="formth" width="12%"><i class="require-red">*</i>姓名：</th>
                                    <td class="formtd">
                                 	<input type="text" name="employee[name]" value="{$employee['name']}" size="35"/>
                                    </td>
                                </tr>
								<tr class="formtr">
                                    <th class="formth" width="12%"><i class="require-red">*</i>工号：</th>
                                    <td class="formtd">
                                 	<input type="text" name="employee[employee_id]" value="{$employee['employee_id']}" size="35"/>
                                    </td>
                                </tr>
								<tr class="formtr">
                                    <th class="formth" width="12%"><i class="require-red">*</i>职称：</th>
                                    <td class="formtd">
                                 	<input type="text" name="employee[lastname]" value="{$employee['job_title']}" size="35"/>
                                    </td>
                                </tr>
                                 <tr class="formtr">
                                    <th class="formth"><i class="require-red">*</i>头像：</th>
                                    <td class="formtd">
                                    {php echo Form::image('个人头像','avatar',$employee['avatar']);}
                                    </td>
                                </tr>                               
								<tr class="formtr">
                                    <th class="formth" width="12%"><i class="require-red">*</i>毕业院校：</th>
                                    <td class="formtd">
                                 	<input type="text" name="employee[college]" value="{$employee['college']}" size="35"/>
                                    </td>
                                </tr>    
								<tr class="formtr">
                                    <th class="formth" width="12%"><i class="require-red">*</i>学历：</th>
                                    <td class="formtd">
                                 	<input type="text" name="employee[degree]" value="{$employee['degree']}" size="35"/>
                                    </td>
                                </tr>                                                                                          
								<tr class="formtr">
                                    <th class="formth" width="12%"><i class="require-red">*</i>从业背景：</th>
                                    <td class="formtd">
                                 	<input type="text" name="employee[occupation_background]" value="{$employee['occupation_background']}" size="35"/>
                                    </td>
                                </tr>                                                                                          
								<tr class="formtr">
                                    <th class="formth" width="12%"><i class="require-red">*</i>性别：</th>
                                    <td class="formtd">
                                 	<div >
                                 		<input type="radio" name="employee[gender]" value="1" id="gender_male">
                                 		<label for="gender_male">男</label>
                                 		
                                 		<input type="radio" name="employee[gender]" value="0" id="gender_female">
                                 		<label for="gender_female">女</label>
                                 	</div>
                                 	
                                    </td>
                                </tr>
                                
								<tr class="formtr">
                                    <th class="formth" width="12%"><i class="require-red">*</i>从业开始年份：</th>
                                    <td class="formtd">
                                 	<div >
                                 		{php $years=range(1990,date('Y'))}
										<select name="employee[work_start_year]">
										{loop $years $key $year}
										<option value="{$year}" {if $year==date('Y')}selected="selected" {/if}>{$year}</option>
										{/loop}
										</select>
                                 	</div>
                                 	
                                    </td>
                                </tr>                                
                                <tr class="formtr">
                                    <th class="formth" width="12%"><i class="require-red"></i>个人履历：</th>
                                    <td class="formtd">
                                 		 
                                    	 {php echo Form::baiduEditor('个人履历','personal_experience',$employee['personal_experience']);}
                                    </td>
                                </tr>
                              
                                <tr class="formtr">
                                    <th class="formth"></th>
                                    <td class="formtd">
                                        <input type="button" onClick="doSubmit('mysubmitform','')" value="提 交" class="submit-button">
                                        <input type="button" value="返 回" onClick="history.go(-1)" class="reset-button">
                                    </td>
                                </tr>
                            </tbody></table>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="statics-footer"> © , Processed in {php echo microtime()-$PW['time_start'];} second(s) , {MySql::$mQuery} queries <a href="#">至顶端↑</a></div>
</body>
</html>