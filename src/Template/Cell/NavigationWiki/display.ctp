	<?php
		$currentController = !empty($this->request->params['controller']) ? $this->request->params['controller'] : '';
		$currentAction = !empty($this->request->params['action']) ? $this->request->params['action'] : '';
                
	
	?>

				<?php 
					$navHtml = "";
					if(!empty($navigationArray['block'])){		
						$navHtml .= "<ul class = 'main-navigation-menu'>";
						foreach($navigationArray['block'] as $mNavigation){
							$itemHtml = '';	
                                                        if(!empty($mNavigation['link_text'])){			
								if(!empty($mNavigation['sub_nav'])){
									$uniqid = rand(10,10000).'_'.uniqid();
									$active = ($currentController == $mNavigation['controller'] && $currentAction == $mNavigation['action'] ) ? 'active' : '';
                                                                        if(!empty($superAdmin) || !empty($mNavigation['all_access']) || !empty($mNavigation['access'])){
									$linkHtml = '<div class="item-content"><div class="item-media"><i class="'.$mNavigation['fav_icon'].'"></i></div><div class="item-inner"><span class="title">'.$mNavigation['link_text'].' </span><i class="icon-arrow"></i></div></div>';													
									$itemHtml = '<li class = "parent '.$active.'" data-toggle="collapse" data-target="#menu-content-'.$uniqid.'">'.$this->Html->link($linkHtml, ["controller" => $mNavigation['controller'], "action" => $mNavigation['action'], "prefix" => $mNavigation['prefix']], ['class' => 'buttonq', 'escape' => false]);'</li>';	
								
								
							
									
									
									$childHtmlStart = '<ul id = "menu-content-'.$uniqid.'" class="sub-menu collapse '.$active.'" >';
									$childHtml = '';
									$childHtmlBody = '';
									foreach($mNavigation['sub_nav'] as $subNav){
										$activeI = ($currentController == $subNav['controller'] && ( $currentAction == $subNav['action'] || $currentAction == 'view' || ($currentAction == 'edit' && ($subNav['action'] == 'index' || $subNav['action'] == ''))) ) ? 'active' : '';
                                                                                $actionB = ($subNav['action'] == '' ||  $subNav['action'] == 'index' || $subNav['action'] == 'listing') ? 'listing' : $subNav['action'] ; 
                                                                               
                                                                                $accessField = $actionB.'_access';
                                                                               ;
                                                                                if(!empty($superAdmin) || !empty($subNav['all_access']) || !empty($subNav['access']->{$accessField})){
										$childHtmlBody .= '<li class = "'.$activeI.'" ><i class="'.$subNav['fav_icon'].'"></i>'.$this->Html->link($subNav['link_text'], ["controller" => $subNav['controller'], "action" => $subNav['action'], "prefix" => $subNav['prefix']], ['class' => 'buttonq']);
                                                                                }
									}
									$childHtmlEnd = '</ul>';
									$childHtml = $childHtmlStart.$childHtmlBody.$childHtmlEnd ;
									$itemHtml = $itemHtml.$childHtml;
								}
                                                            }else {
									$active = ($currentController == $mNavigation['controller'] && ($currentAction == $mNavigation['action'] || $currentAction == 'view' || ($currentAction == 'edit' && ($mNavigation['action'] == 'index' || $mNavigation['action'] == ''))) ) ? 'active' : '';
                                                                         $actionc = ($mNavigation['action'] == '' ||  $mNavigation['action'] == 'index' || $mNavigation['action'] == 'listing') ? 'listing' : $mNavigation['action'] ; 
                                                                               
                                                                                $accessFieldC = $actionc.'_access';
                                                                                if(!empty($superAdmin) || !empty($mNavigation['all_access']) || !empty($mNavigation['access']->{$accessFieldC})){
																					
																				$linkHtml = '<div class="item-content"><div class="item-media"><i class="'.$mNavigation['fav_icon'].'"></i></div><div class="item-inner"><span class="title">'.$mNavigation['link_text'].' </span></div></div>';
																				
                                                                                $itemHtml = '<li class = "'.$active.'">'.$this->Html->link($linkHtml, ["controller" => $mNavigation['controller'], "action" => $mNavigation['action'], "prefix" => $mNavigation['prefix']], ['class' => 'buttonq', 'escape' => false]).'</li>';					}
								}
								$navHtml .= $itemHtml ;				
							}			
						}
						$navHtml .= "</ul>";
					}
					echo $navHtml;
				?>
			

