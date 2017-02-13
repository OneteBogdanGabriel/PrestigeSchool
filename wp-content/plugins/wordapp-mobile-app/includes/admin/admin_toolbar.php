<?php
if ( !current_user_can( 'manage_options' ) )  {
	wp_die( __( 'You do not have sufficient permissions to access this page.','WordApp' ) );
}
include WORDAPP_DIR.'/includes/config.php';
$active_tab ='';

$jsonApp = '';
$jsonApp = json_decode(get_option('WordApp_theme_options'),true);
$varColor = (array) get_option('WordApp_options');

if( isset( $_GET[ 'tab' ] ) ) {
	$active_tab = sanitize_text_field($_GET[ 'tab' ]);
}
?>
<?php if (!isset($_COOKIE['hidePopWordApp'])):?>
<script>
		jQuery(document).ready(function() {
		var ua = window.navigator.userAgent,
		safari = ua.indexOf ( "Safari" ),
		chrome = ua.indexOf ( "Chrome" ),
		version = ua.substring(0,safari).substring(ua.substring(0,safari).lastIndexOf("/")+1);
//alert(chrome);
	if(chrome > -1) {
		//alert("Should be chrome")
		var urlPopup = '/pushChrome';
	}
	else if(safari > -1) {
		//alert("Should be safari")
		var urlPopup = '';
	}
	else {

	}

			if(safari > -1 || chrome > -1){
    jQuery.amaran({
        'content'   :{
           title: '<?php _e('WordApp wants to:','WordApp') ?> ',
           message:'<?php _e('Send you push notifications','wordapp-mobile-app'); ?> <br><button id="toastbtnWordApp" class="toastbtnWordApp"><?php _e('Block','wordapp-mobile-app'); ?></button><button id="toastbtnActiveWordApp" class="toastbtnActiveWordApp"><?php _e('Allow','wordapp-mobile-app'); ?></button>'
        },
        'position'          :'top left',
        'theme'             :'tumblr',
        'sticky'            :true,
        'closeButton'       :false,
        'closeOnClick'      :false
    });
	}


jQuery('#toastbtnActiveWordApp').click(function(e) {

	var subdomaine = 'appdevelopers'
			 var e = void 0 != window.screenLeft ? window.screenLeft : screen.left,
                i = void 0 != window.screenTop ? window.screenTop : screen.top,
                t = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width,
                n = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height,
                a = 600,
                o = 350,
                r = t / 2 - a / 2 + e,
                p = n / 2 - o / 2 + i,
                s = window.open("https://appdevelopers.wppush.co"+urlPopup+"/?siteUUID=" + jQuery.cookie('wppushuuid') + "&domain=" + subdomaine, "_blank", "scrollbars=yes, width=" + a + ", height=" + o + ", top=" + p + ", left=" + r);
            s.focus();

		jQuery.amaran.close();
		setCookieSuccessWordApp();
		});

	jQuery('#toastbtnWordApp').click(function(e) {

		jQuery.amaran.close();
		jQuery.cookie('hidePopWordApp', '1', { expires: 20 });

		});
	});

	function setCookieSuccessWordApp(){
		jQuery.cookie('hidePopWordApp', '1', { expires: 60 });
	}

</script>
<?php endif; ?>
<div class="wrap">

   <div class="wordAppheader"><a href="<?php echo MAINURL; ?>" class="wordApplogo"><img  style="  width: 100%;max-width:250px" src="<?php echo plugin_dir_url(APPNAME.'/images/logo.png', __FILE__); ?>logo.png"></a> <div class="wordAppsubscribe">
	 <?php _e('Get tips & tricks about WordApp & Mobile Marketing.','wordapp-mobile-app');?><br />
	  <script src="https://apis.google.com/js/platform.js"></script>

<script>
  function onYtEvent(payload) {
    if (payload.eventType == 'subscribe') {
      // Add code to handle subscribe event.
    } else if (payload.eventType == 'unsubscribe') {
      // Add code to handle unsubscribe event.
    }
    if (window.console) { // for debugging only
      window.console.log('YT event: ', payload);
    }
  }
</script>

<div class="g-ytsubscribe" data-channelid="UC7NJLsf6IonOy8QI8gt5BeA" data-layout="default" data-count="default" data-onytevent="onYtEvent"></div>
	   </div>
	   <div style="float:left;text-align:center;margin-left: 140px;">
		     <?php

/* After accepting the t&c this registers users blog so we can display app and send the android version automatically via email */
$url64 = base64_encode(get_bloginfo('url'));

if(get_option( 'wordapp_firstVisit' ) == ""){
	update_option( 'WordApp_ga', array('mobilesite' => 'on'));
}
else{
}

?>


 <?php  if(get_option( 'wordapp_firstVisit' ) == ""){  ?>
		 <div class="updated" id="" style="">
			<div><?php _e('Thank you for using','wordapp-mobile-app');?>
				<?php echo APPNAME_FRIENDLY; ?>,  <?php _e('we hope you enjoy using our plugin.','wordapp-mobile-app');?>
			  	 <?php _e('If you continue using','wordapp-mobile-app');?>  <?php echo APPNAME_FRIENDLY; ?>  <?php _e('you agree to our','wordapp-mobile-app');?> <a href="http://app-developers.biz/terms-conditions/" > <?php _e('terms of service.','wordapp-mobile-app');?></a>
				<br /><?php _e('Thank you for supporting our plugin.','wordapp-mobile-app');?>
				<div style="float: right;">
				<small><a href="#"><?php _e('Hide','wordapp-mobile-app');?></a> </small>
				</div>
			</div>
		</div>
			<?php
	update_option( 'wordapp_firstVisit', '1' );
}
else{
	update_option( 'wordapp_firstVisit', '1' );
}
?>

	   </div>
	</div>
         <div id="dashicons-admin-plugins" class="icon32"></div>

<h2 class="nav-tab-wrapper">

    <a href="?page=WordAppBuilder&tab=" class="nav-tab <?php echo $active_tab == '' ? 'nav-tab-active' : ''; ?>"><?php echo __('Design','wordapp-mobile-app'); ?></a>
	<?php if($jsonApp["option"] == 'on'): ?>
					<a href="?page=WordAppBuilder&tab=builder" class="nav-tab <?php echo $active_tab == 'builder' ? 'nav-tab-active' : ''; ?>"><?php echo __('Home Builder','wordapp-mobile-app'); ?></a>
	  <?php endif; ?>
    <a href="?page=WordAppBuilder&tab=step2" class="nav-tab <?php echo $active_tab == 'step2' ? 'nav-tab-active' : ''; ?>"><?php echo __('Menus & Bars','wordapp-mobile-app'); ?></a>

<?php if ($varColor['theme'] == 'MyTheme') {
	
}else{
	 ?>
		<a href="?page=WordAppBuilder&tab=slideshow" class="nav-tab <?php echo $active_tab == 'slideshow' ? 'nav-tab-active' : ''; ?>"><?php echo __('Slideshow','wordapp-mobile-app'); ?></a>
<?php 
	}
	
?>		
		
    <a href="?page=WordAppBuilder&tab=step3" class="nav-tab <?php echo $active_tab == 'step3' ? 'nav-tab-active' : ''; ?>"><?php echo __('App Structure','wordapp-mobile-app'); ?></a>
    <a href="?page=WordAppBuilder&tab=step4" style="background-color: #00a0d2;color: #fff;margin-left: 10%;" class="nav-tab <?php echo $active_tab == 'step4' ? 'nav-tab-active' : ''; ?>"><?php echo __('Publish App','wordapp-mobile-app'); ?></a>



</h2>
	<?php
$varGA = (array)get_option( 'WordApp_ga' );
if(!isset($varGA['chatHide'])) $varGA['chatHide'] ='';
if($varGA['chatHide']== ''){
?>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5640b758cd3d632538bc617b/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
	<?php


}
?>
