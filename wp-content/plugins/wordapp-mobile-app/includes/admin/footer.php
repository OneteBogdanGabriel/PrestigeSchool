<center>
		<?php echo __('Made with &#10084; by geeks who love wordpress & mobile','wordapp-mobile-app');?>
</center>

	<?php
$varGA = (array)get_option( 'WordApp_ga' );
if(!isset($varGA['chatHide'])) $varGA['chatHide'] ='';
if($varGA['chatHide']== ''){
?>
<!-- Start of appdeveloper Zendesk Widget script -->
<script type='text/javascript' src='https://s3.amazonaws.com/cordovajs/fb/messenger.js?ver=1.0.0'></script>
<!-- End of appdeveloper Zendesk Widget script -->
<script type="text/javascript">
			var config = {


				click_url: "https://messenger.com/t/AppDevelopersBiz",
				avatar: "http://graph.facebook.com/AppDevelopersBiz/picture",
				message: "",
				message_button: "Send me a message...",

				messenger_header_background_color: "#3E7CF7",
				messenger_header_text: 'AppDevelopersBiz <span class="fb23">Messenger</span>',

				popup_delay: 10000, //in seconds
				popup_sound: "",

				//bubble
				short_widget_background: "#fff",
				short_widget_border: "1px solid #3E7CF7",

			};
		</script>
		<div id="fb28">
			<div class="fb27">
				<div class="fb24"></div>
				<div class="fb21">

				</div>
				<div class="fb26">
					<div class="fb25">
						<img class="fb17" src="">
						<span class="fb18 empty"></span>
						<div class="poweredAD">Powered by <a href="http://app-developers.biz">App-Developers.biz</a></div>
					</div>
				</div>
			</div>
		</div>
<?php

}
?>