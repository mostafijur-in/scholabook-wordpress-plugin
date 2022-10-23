<?php
/**
 * Template Name: Manage LMS
 */ 
// $stylePath = SB_PATH . "assets/styles/admin-style.php";
// include_once($stylePath);

global $wpdb;
date_default_timezone_set("Asia/Kolkata");

?>

<h1 class="page-title">Settings</h1>

<div class="main-container">
	
	<div class="container-div">
		<div class="row no-margin">
			
			<!-- ************************************************* START General Settings ******************************************************** -->
			<div class="col col-left col1" style="width:49%;">
				<div class="row no-margin">
					<div class="col col-left col1" style="width:75%;">
						<h3 class="container-heading">
							General Settings
							<span class="tips" title="."></span>
						</h3>
					</div>
					<div class="col col-right col2" style="width:80px;">
					</div>
					<div class="clearfix"></div>
				</div>
				<hr class="container-heading-divider" />
					
				<div class="inner-container-div">
					<?php
						/************************************************ Get General Settings and Form validation ************************************************/
						if(isset($_POST['sbGenSettingBtn'])) {
							
							/***************** SB Access Token *****************/
							$sb_access_token = $_POST['sb_access_token'];
							
							$get_sb_access_token = get_option('sb_access_token');
							if($get_sb_access_token === false) {
								add_option('sb_access_token', $sb_access_token, '', 'no');
							} else {
								update_option('sb_access_token', $sb_access_token, '', 'no');
							}

							/***************** SB Institute Id *****************/
							$sb_institute_id = $_POST['sb_institute_id'];
							
							$get_sb_institute_id = get_option('sb_institute_id');
							if($get_sb_institute_id === false) {
								add_option('sb_institute_id', $sb_institute_id, '', 'no');
							} else {
								update_option('sb_institute_id', $sb_institute_id, '', 'no');
							}
						}
						
						$getSbApiKey	= get_option('sb_access_token');
						$getSbInstId	= get_option('sb_institute_id');
					?>
						
					<form name="sbGenSettingForm" method="post" action="" style="max-width:450px;">
						<table class="table-collapse full-width">
							<tr>
								<td width="50%" title="It will help you to hide the wp-login function for none admin user.">Scholabook Access Token:</td>
								<td width="50%" align="right">
									<input type="text" name="sb_access_token" value="<?php echo $getSbApiKey; ?>" class="full-width" placeholder="Scholabook Access Token" />
								</td>
							</tr>
							<tr>
								<td width="50%" title="It will help you to hide the wp-login function for none admin user.">Institute Id:</td>
								<td width="50%" align="right">
									<input type="text" name="sb_institute_id" value="<?php echo $getSbInstId; ?>" class="full-width" placeholder="0" />
								</td>
							</tr>
							
							<tr>
								<td colspan="2" align="right">
									<hr class="margin-5 no-margin-rl" />
									<input type="submit" name="sbGenSettingBtn" class="button button-primary button-large container-action-btn" value="Save">
								</td>
							</tr>
						</table>
					</form>
					
				</div>
				
			</div>
			<!-- ************************************************** END General Settings ********************************************************* -->
			
            <div class="col col-right col2" style="width:49%;"></div>
			
			<div class="clearfix"></div>
			
		</div>
	</div><!-- container-div -->
	
</div><!-- main-container -->