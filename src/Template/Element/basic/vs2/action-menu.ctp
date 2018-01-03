<?php
use Cake\Core\Configure;
?>
<header class="navbar navbar-default navbar-static-top">
					<!-- start: NAVBAR HEADER -->
					<div class="navbar-header">
						<a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" class="btn btn-navbar sidebar-toggle" data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
							<i class="ti-align-justify"></i>
						</a>
						<a class="navbar-brand" href="#">
							<i class="fa fa-snowflake-o" aria-hidden="true"></i><?php echo Configure::read('App.title') ?> - Admin Panel
						</a>
						<a href="#" class="sidebar-toggler pull-right visible-md visible-lg" data-toggle-class="app-sidebar-closed" data-toggle-target="#app">
							<i class="ti-align-justify"></i>
						</a>
						<a class="pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse" href=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<i class="ti-view-grid"></i>
						</a>
					</div>
					<!-- end: NAVBAR HEADER -->
					<!-- start: NAVBAR COLLAPSE -->
					
					
							
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-right">	
							
							<li class="dropdown1">
								<a href = '<?php echo $this->Url->build(["controller" => "Users", "action" => "index" ]); ?>'>
									<!--span class="dot-badge partition-red"></span--> <i class=" ti-calendar"></i> <span>Users</span>
								</a>								
							</li>
							
							<li class="dropdown1">
								<a href = '' class="dropdown-toggle" data-toggle="dropdown">
									<!--span class="dot-badge partition-red"></span--> <i class="ti-agenda"></i> <span>Memebrship Packages</span>
								</a>								
							</li>
							<li class="dropdown1">
								<a href class="dropdown-toggle" data-toggle="dropdown">
									<!--span class="dot-badge partition-red"></span--> <i class=" ti-receipt"></i> <span>Payments</span>
								</a>								
							</li>
							
							<!-- start: USER OPTIONS DROPDOWN -->
							<li class="dropdown current-user">
								<a href class="dropdown-toggle" data-toggle="dropdown">
									
								</a>
								<ul class="dropdown-menu dropdown-dark">
									<li>
										<a href="<?php //echo $this->Url->build(["controller" => "Users", "action" => "updateProfile" ]); ?>">
											My Profile
										</a>
									</li><li>
										<a href="<?php //echo $this->Url->build(["controller" => "Admins", "action" => "updatePassword", 'prefix' => 'admin' ]); ?>">
											Change Password
										</a>
									</li>
									<li>
										<a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "logout" ]); ?>">
											Log Out
										</a>
									</li>
								</ul>
							</li>
							<!-- end: USER OPTIONS DROPDOWN -->
						</ul>
						<!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
						<div class="close-handle visible-xs-block menu-toggler" data-toggle="collapse" href=".navbar-collapse">
							<div class="arrow-left"></div>
							<div class="arrow-right"></div>
						</div>
						<!-- end: MENU TOGGLER FOR MOBILE DEVICES -->
					</div>
					
					<!-- end: NAVBAR COLLAPSE -->
				</header>
				<!-- end: TOP NAVBAR -->