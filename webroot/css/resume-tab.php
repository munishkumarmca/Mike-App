						<div class = 'myInfo' style = 'width: 42%;'>
							<label>Resume Preferences<span class = 'mand'>*</span>: </label>
							<span class = 'infoVal'>
								<?php 
									$resume_preference = get_user_meta($current_user->ID, 'resume_preference', true); 
									
									$resume_preference_options = get_option('resume_preference_options');
									if(!empty($resume_preference_options)){
										echo "<select name = 'resume_preference' class = 'resume_preference' >";
										echo "<option value = ''>Please select resume preference.</option>";
											foreach($resume_preference_options as $resume_preference_option){
												if($resume_preference_option['deleted'] == 0){
													$selected = ($resume_preference_option['name'] == $resume_preference) ? 'selected' : '' ;
													?>
														<option value = '<?php echo $resume_preference_option['name'] ?>' <?php echo $selected; ?> ><?php echo $resume_preference_option['name'] ?></option>
													<?php 
												}
											}
										echo "</select>";
									} else {
										echo 'No option available';
									}
								?>							
							</span>
						</div>
						<div class = 'myInfo'>
							<label>My Resume Title<span class = 'mand'>*</span>: </label><span class = 'infoVal'><input type = 'text' name = 'user_resumetitle' class = 'user_resumetitle' value = '<?php echo get_user_meta($current_user->ID, 'user_resumetitle', true); ?>' placeholder = 'Resume Title' /></span>
						</div>
						<div style = 'clear: both;'></div>
						<div class = 'myInfoFull'>
							<label>Upload Resume<span class = 'mand'>*</span>: </label><span class = 'infoVal'><input type = 'text' name = 'user_resume' class = 'user_resume' value = '<?php echo get_user_meta($current_user->ID, 'user_resume', true); ?>' placeholder = 'Upload Resume' id = 'image_url-res' /><input type="button" name="upload-btn" id="upload-btn-res" class="button-secondary fusion-button button-flat button-square button-medium button-custom button-3" value="Select File"><?php if(get_user_meta($current_user->ID, 'user_resume', true)) { ?> <a class = '' href = '<?php echo get_user_meta($current_user->ID, 'user_resume', true); ?>'  download >Download Resume</a> <?php } ?></span>
						</div>						
					</div>
					<div style = 'clear: both;'></div>
					<div class = 'myResumeSample myInfoBlock'>
						<div class = 'myInfo'>
							<label>My Resume Sample<span class = 'mand'>*</span>: </label>						
							<span class = 'infoVal'>
								<?php 
									$resume_sample_options = get_option('resume_sample_options'); 
									$resume_Sample = get_user_meta($current_user->ID, 'resume_sample_option', true); 
								
									
									if(!empty($resume_sample_options)){
										echo "<select name = 'resume_sample_option' class = 'resumeSample  image-picker show-html resume_sample_option' >";
											echo "<option value = ''>Please select resume sample.</option>";
											foreach($resume_sample_options as $resume_sample_option){
												if($resume_sample_option['deleted'] == 0){
													if(isImage($resume_sample_option['image'])){
														$thumb1 = wp_get_attachment_image_src( $resume_sample_option['id'], 'medium' );
														$thumb = $thumb1[0];
													} else {
														$thumb = get_bloginfo('url').'/wp-content/plugins/coaching-packages-manager/assets/images/document.png' ;
													}
													$selected = ($resume_sample_option['id'] == $resume_Sample) ? 'selected' : '' ;
													$bigImage =  $resume_sample_option['image'];
													$optionText = $resume_sample_option['name'] ? $resume_sample_option['name'] : $resume_sample_option['image'] ;
													?>
														<option  data-img-label='<?php echo $optionText; ?>' data-img-src='<?php echo $thumb; ?>' value = '<?php echo $resume_sample_option['id'] ;?>' data-url-src='<?php echo $bigImage; ?>' <?php echo $selected; ?> ><?php echo $optionText ;?></option>								
													<?php 
												} 	
											}
										echo "</select>";
									} else {
											echo "Resume Samples are not available at this time. Please try again later.";
									}														
								?>
							</span>
						</div>