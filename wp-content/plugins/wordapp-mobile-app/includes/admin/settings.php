<?php
include trailingslashit( plugin_dir_path( __FILE__ ) ) . 'admin_toolbar_misc.php';
?>


	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">

			<!-- main content -->
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable">

					<div class="postbox">

						<h3><span><?php echo __( 'Settings ').APPNAME; ?></span></h3>

						<div class="inside">

							<form method="post" action="options.php">
<?php
$varGA = (array)get_option( 'WordApp_ga' );
settings_fields( 'WordApp_main_ga' );

if(!isset($varGA['email'])) $varGA['email'] ='';
if(!isset($varGA['apiKey'])) $varGA['apiKey'] ='';
if(!isset($varGA['apiDomain'])) $varGA['apiDomain'] ='';
if(!isset($varGA['apiLogin'])) $varGA['apiLogin'] ='';
if(!isset($varGA['google'])) $varGA['google'] ='';
if(!isset($varGA['powered'])) $varGA['powered'] ='';
if(!isset($varGA['chatHide'])) $varGA['chatHide'] ='';
if(!isset($varGA['plugin_rm'])) $varGA['plugin_rm'] ='';
if(!isset($varGA['androidURL'])) $varGA['androidURL'] ='';
if(!isset($varGA['iOSURL'])) $varGA['iOSURL'] ='';
if(!isset($varGA['wphead'])) $varGA['wphead'] ='';
if(!isset($_GET['resetPages'])) $_GET['resetPages'] ='';


?>
				<h3><?php _e('Activate mobile site','wordapp-mobile-app'); ?></h3>

	<hr>
								  <p>

			 <?php echo __('Do you want to use this as your mobile website too ?','WordApp' ); ?><br />
       <label for="WordApp_GA[mobilesite]"><?php echo __('Mobile Site ? ','WordApp' ); ?></label> <input type="radio" name="WordApp_ga[mobilesite]" id="mobilesiteOff" value="" <?php echo ($varGA['mobilesite'] == '' ? 'checked' : '')?>><?php echo __('off','wordapp-mobile-app'); ?>
		<input type="radio" name="WordApp_ga[mobilesite]" id="mobilesiteOn" value="on" <?php echo ($varGA['mobilesite'] == 'on' ? 'checked' : '')?>><?php echo __('on','wordapp-mobile-app'); ?>
         </p>
	<h3><?php _e('Google Analytics','wordapp-mobile-app'); ?></h3>

	<hr>
	<?php echo __('Add your Google Analytics tracking ID below. Get more information about your app downloads, views & activity. ','wordapp-mobile-app'); ?>
								<a href="https://support.google.com/analytics/answer/2614741?hl=en-GB"><?php echo __('Setup a google tracking ID here','wordapp-mobile-app');?></a><p>  	<label for="WordApp_GA[Color]"><?php echo __('Google Analytics ID','WordApp' ); ?></label>
 	<input type="text" id="WordAppGA_GA" name="WordApp_ga[google]"  placeholder="UA-XXXXXXXX-X" value="<?php echo $varGA['google']; ?>"/></p>

	<h3><?php _e('API credentials','wordapp-mobile-app'); ?></h3>
	<hr>
	<?php echo __('If you have subscribed for push notifications you will be sent API credentials via email.','wordapp-mobile-app'); ?>
	<p>  	<label for="WordApp_GA[apiLogin]"><?php echo __('API Login','WordApp' ); ?></label>
 	<input type="text" id="WordAppGA_apiLogin" name="WordApp_ga[apiLogin]"  value="<?php echo $varGA['apiLogin']; ?>"/></p>

	<p>  	<label for="WordApp_GA[apiKey]"><?php echo __('API Key','WordApp' ); ?></label>
 	<input type="text" id="WordAppGA_apiKey" name="WordApp_ga[apiKey]"  value="<?php echo $varGA['apiKey']; ?>"/></p>

	<p>  	<label for="WordApp_GA[apiDomain]"><?php echo __('API Domain','WordApp' ); ?></label>
 	<input type="text" id="WordAppGA_apiDomain" name="WordApp_ga[apiDomain]"  value="<?php echo $varGA['apiDomain']; ?>"/></p>


	<h3><?php _e('QRCODE setup','wordapp-mobile-app'); ?></h3>
	<hr>
	<p>  	<label for="WordApp_GA[androidURL]"><?php echo __('Android URL','WordApp' ); ?></label>
 	<input type="text" id="WordAppGA_androidURL" name="WordApp_ga[androidURL]"  value="<?php echo $varGA['androidURL']; ?>"/></p>

	<p>  	<label for="WordApp_GA[iOSURL]"><?php echo __('iOS URL','WordApp' ); ?></label>
 	<input type="text" id="WordAppGA_iOSURL" name="WordApp_ga[iOSURL]"  value="<?php echo $varGA['iOSURL']; ?>"/></p>

	<h3><?php _e('White Label App','wordapp-mobile-app'); ?></h3>

	<hr>
	 <p>
			<?php echo __('Remove powered by link ?','WordApp' ); ?><br />
    	   	<label for="WordApp_GA[powered]"><?php echo __('Yes ? ','WordApp' ); ?></label>
		 <input type="checkbox" name="WordApp_ga[powered]" id="poweredOff" value="off" <?php echo ($varGA['powered'] == 'off' ? 'checked' : '')?>>

		<font color="grey"> <?php echo __('Remove powered by & ads (PRO only)','wordapp-mobile-app'); ?>
			<a href="http://app-developers.biz/wordapp-specials/"><?php echo __('Upgrade','wordapp-mobile-app'); ?></a></font>  </p>

	<h3><?php _e('Hide Chat','wordapp-mobile-app'); ?></h3>

	<hr>
	 <p>
			<?php echo __("Here to help but I don't what to get in your way..",'WordApp' ); ?><br />
    	   	<label for="WordApp_GA[powered]"><?php echo __('Hide Chat? ','WordApp' ); ?></label>
		 <input type="checkbox" name="WordApp_ga[chatHide]" id="chatHide" value="off" <?php echo ($varGA['chatHide'] == 'off' ? 'checked' : '')?>>

		</p>

	<h3><?php _e('Emails & Newsletter','wordapp-mobile-app'); ?></h3>

	<hr>
	 <p>
			<?php echo __('Do you want to be informed about latest security updates & news from WordApps ?','WordApp' ); ?><br />
    	   	<label for="WordApp_GA[email]"><?php echo __('Newsletter ? ','WordApp' ); ?></label> <input type="radio" name="WordApp_ga[email]" id="emailOff" value="off" <?php echo ($varGA['email'] == 'off' ? 'checked' : '')?>><?php echo __('off'); ?>
			<input type="radio" name="WordApp_ga[email]" id="emailOn" value="" <?php echo ($varGA['email'] == '' ? 'checked' : '')?>><?php echo __('on'); ?>
     </p>



		<h3><?php _e('Activate WP HEAD','wordapp-mobile-app'); ?></h3>

	<hr>
								  <p>

			 <?php echo __('Some themes don\'t include wp-head. You can force them to include wp-head.','WordApp' ); ?><br />
       <label for="WordApp_GA[wphead]"><?php echo __('WP-HEAD ? ','WordApp' ); ?></label>
       <input type="radio" name="WordApp_ga[wphead]" id="wphead" value="" <?php echo ($varGA['wphead'] == '' ? 'checked' : '')?>><?php echo __('off','wordapp-mobile-app'); ?>
		<input type="radio" name="WordApp_ga[wphead]" id="wphead" value="on" <?php echo ($varGA['wphead'] == 'on' ? 'checked' : '')?>><?php echo __('on','wordapp-mobile-app'); ?>
         </p>

	<p>
		<h3><?php _e('Deactivate Plugins on mobile','wordapp-mobile-app'); ?></h3>

	<hr>
		<?php echo __('Some plugins might not look great on mobile but work fine on desktop. Here you can deactivate plugins on the mobile version & app.','WordApp' ); ?><br />
		<?php echo __('Checked plugins will be deactivated on mobile only','WordApp' ); ?><br />
								<b><?php _e('Beta testing this part','wordapp-mobile-app'); ?></b>

		<?php
if(!isset($varGA['plugin_rm'])) $varGA['plugin_rm']='';
$the_plugs = get_plugins();
//$the_plugs = get_option('active_plugins');
echo '<ul>';
foreach($the_plugs as $plugin_key => $value) {
	//$string = explode('/',$value); // Folder name will be displayed

	if($varGA['plugin_rm'] ==''){
		$checked = '';
	}else{
		$checked = (in_array($plugin_key,$varGA['plugin_rm']) == true ? 'checked="checked"' : '');

	}

?>
      			    <li><input type="checkbox" <?php echo $checked; ?> name="WordApp_ga[plugin_rm][]" value="<?php echo $plugin_key; ?>"/><?php echo $value['Name']; ?>
            		  - <small><?php if ( is_plugin_active($plugin_key) ) : _e('Currently Active','wordapp-mobile-app'); else : _e('Currently Inactive','wordapp-mobile-app'); endif; ?></small></li>

			 		 <?php

}


echo '</ul>';


?>
	</p>

	<?php submit_button(); ?>

	<?php

if($_GET['resetPages'] == '1'){

	/* install new themes here */

	include WORDAPP_DIR.'/themes/wordappjqmobileMyiOS/resetPages.php';

	/* end install new themes here */
}
?>
<p><?php _e('Did you delete the mobile homepage?','wordapp-mobile-app'); ?>							<br>
	<a class="button" href="?page=WordAppSettings&resetPages=1"><?php _e('Reset mobile home page','wordapp-mobile-app'); ?>	</a></p>
						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->

				</div>
				<!-- .meta-box-sortables .ui-sortable -->

			</div>
			<!-- post-body-content -->

			<!-- sidebar -->
			<div id="postbox-container-1" class="postbox-container">

				<div class="meta-box-sortables">

					<div class="postbox">


						<div class="inside">
							<p>
							 <?php include plugin_dir_path( __FILE__ ).'more_info.php'; ?>
							</p>
						</div>

						<!-- .inside -->

					</div>
					<!-- .postbox -->


				</div>
				<!-- .meta-box-sortables -->

			</div>
			<!-- #postbox-container-1 .postbox-container -->

		</div>
		<!-- #post-body .metabox-holder .columns-2 -->

		<br class="clear">
	</div>
	<!-- #poststuff -->

</div> <!-- .wrap -->
<?php
include trailingslashit( plugin_dir_path( __FILE__ ) ) . 'footer.php';
?>

<style>
	.message_invite{
		font-family: "Open Sans","lucida grande","Segoe UI",arial,verdana,"lucida sans unicode",tahoma,sans-serif;
  		font-size: 13px;
  		color: #3d464d;
  		font-weight: normal;
		text-align: center;
	}

	</style>