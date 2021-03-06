<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title><?php echo isset($PW['pc_site_title'])?$PW['pc_site_title']:'';?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/<?php echo defined('TLP')?TLP:'{__TLP__}';?>assets/styles/main.css">
</head>

<body>
	<div id="main">
		<div class="layout">
			<div class="layout--header">
				<div class="topbar -violet visible-md-block visible-lg-block">
					<div class="container">
						<div class="row">
							<div class="col-md-3">
								<!-- 
								<div class="topbar--left">
									<div class="select_language">
										<button type="button" class="select_language--opener"><i class="select_language--opener_icon icons8-globe-earth"></i>Language</button>
										<ul class="select_language--list">
											<li><a href="#">English</a></li>
											<li><a href="#">Espanol</a></li>
										</ul>
									</div>
								</div>								
								 -->

							</div>
							<div class="col-md-9">
								<div class="topbar--right">
									<div class="follow_us">
										<strong>社交媒体</strong>
										<ul>
											<li><a href="#"><i class="fa fa-weibo"></i></a></li>
											<li><a href="#"><i class="fa fa-wechat"></i></a></li>
										</ul>
									</div>
								</div>
								<!-- /topbar_contacts-->
							</div>
						</div>
					</div>
				</div>
				<header class="header">
					<div class="container">
						<div class="header--inner">
							<div class="row">
								<div class="col-lg-2 col-md-12">
									<div class="header--logo logo">
										<a href="#"><img src="<?php echo isset($PW['pc_site_logo'])?$PW['pc_site_logo']:'';?>" alt="" /></a>
									</div>
								</div>
								<div class="col-lg-10 col-md-12 visible-md-block visible-lg-block">
									<div class="header--right">
										<div class="header_contacts">
											<div class="header_contacts--item">
												<div class="contact_mini">
													<i class="contact_mini--icon icons8-phone color_violet"></i>
													<strong><?php echo isset($PW['contact_telephone'])?$PW['contact_telephone']:'';?></strong>
													<span><?php echo isset($PW['work_time'])?$PW['work_time']:'';?></span>
												</div>
											</div>
											<div class="header_contacts--item">
												<div class="contact_mini">
													<i class="contact_mini--icon icons8-message color_violet"></i>
													<strong><?php echo isset($PW['contact_email'])?$PW['contact_email']:'';?></strong>
													<span>恭候垂询</span>
												</div>
											</div>
											<!-- 
											<div class="header_contacts--item">
												<div class="contact_mini">
													<i class="contact_mini--icon icons8-geo-fence color_violet"></i>
													<strong></strong>
													<span><?php echo isset($PW['contact_address'])?$PW['contact_address']:'';?></span>
												</div>
											</div>											
											 -->

										</div>
										<!-- 
									   <button class="button -blue_light -bordered -menu_size"><span class="button--inner">马上预约</span></button>
										-->
										
									</div>
								</div>
							</div>
						</div>
					</div>
					<nav class="header_nav -wide visible-md-block visible-lg-block">
						<div class="header_nav--inner">
							<?php include(template("menu"));?>
						</div>
					</nav>
					<div class="header--menu_opener visible-xs-block visible-sm-block">
						<span class="c-hamburger c-hamburger--htx">
							<span>展开/收起菜单</span>
						</span>
					</div>
				</header>
				<header class="header header_sticky">
					<div class="container">
						<div class="header--inner">
							<div class="row">
								<div class="col-lg-2 col-md-12">
									<div class="header--logo logo">
										<a href="#"><img src="<?php echo isset($PW['pc_site_logo'])?$PW['pc_site_logo']:'';?>" alt="" /></a>
									</div>
								</div>
								<div class="col-lg-10 col-md-12 visible-md-block visible-lg-block">
									<div class="header--right">
										<div class="header_contacts">
											<div class="header_contacts--item">
												<div class="contact_mini">
													<i class="contact_mini--icon icons8-phone color_violet"></i>
													<strong><?php echo isset($PW['contact_telephone'])?$PW['contact_telephone']:'';?></strong>
													<span><?php echo isset($PW['work_time'])?$PW['work_time']:'';?></span>
												</div>
											</div>
											<div class="header_contacts--item">
												<div class="contact_mini">
													<i class="contact_mini--icon icons8-message color_violet"></i>
													<strong><?php echo isset($PW['contact_email'])?$PW['contact_email']:'';?></strong>
													<span>恭候垂询</span>
												</div>
											</div>

										</div>
										<!-- 
										<button class="button -blue_light -bordered -menu_size"><span class="button--inner">马上预约</span></button>
										 -->
										
									</div>
								</div>
							</div>
						</div>
					</div>
					<nav class="header_nav -wide visible-md-block visible-lg-block">
						<div class="header_nav--inner">
							<?php include(template("menu"));?>
						</div>
					</nav>
					<div class="header--menu_opener visible-xs-block visible-sm-block">
						<span class="c-hamburger c-hamburger--htx">
							<span>toggle menu</span>
						</span>
					</div>
				</header>
			</div>