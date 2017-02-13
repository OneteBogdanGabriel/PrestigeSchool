<?php

/* Template Name: Maintenance Mode by IP Default Template */ 

wp_head(); 
show_admin_bar(false);
$template_url =  plugin_dir_url( __FILE__ );
$blog_name = get_bloginfo( 'name', 'display' );
$rc_mmip_options = get_option('rc_mmip_settings');

if($rc_mmip_options != ''){

	//Inside Default Template Options
	$rc_mmip_inside_title = $rc_mmip_options['rc_mmip_inside_title'];
	$rc_mmip_inside_date = $rc_mmip_options['rc_mmip_inside_date'];
	$rc_mmip_inside_bgopt = $rc_mmip_options['rc_mmip_inside_bgopt'];
	$rc_mmip_default_bg = $rc_mmip_options['rc_mmip_default_bg'];
	$rc_mmip_inside_custom_img = $rc_mmip_options['rc_mmip_inside_custom_img'];

	//Mailchimp Options
	$rc_mmip_mchimp_opt = $rc_mmip_options['rc_mmip_mchimp_opt'];
	$rc_mmip_inside_msg = $rc_mmip_options['rc_mmip_inside_msg'];
	$rc_mmip_inside_bgopt = $rc_mmip_options['rc_mmip_inside_bgopt'];
	$rc_mmip_inside_ctopt = $rc_mmip_options['rc_mmip_inside_ctopt'];
	$rc_mmip_default_bg = $rc_mmip_options['rc_mmip_default_bg'];
	$rc_mmip_inside_custom_img = $rc_mmip_options['rc_mmip_inside_custom_img'];
	
	//Google reCaptcha
	$rc_mmip_mchimp_gcaptcha = $rc_mmip_options['rc_mmip_mchimp_gcaptcha'];
	$rc_mmip_mchimp_gcaptcha_site = $rc_mmip_options['rc_mmip_mchimp_gcaptcha_site'];
	$rc_mmip_mchimp_section_title = $rc_mmip_options['rc_mmip_mchimp_section_title'];
	
	//Social Profiles
	$rc_mmip_social = $rc_mmip_options['rc_mmip_social'];

}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Maintenance Mode By IP - <?php echo esc_html($blog_name); ?>">
    <meta name="author" content="<?php echo esc_html($blog_name); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php echo esc_html($blog_name); ?></title>
	  <!--- need this to overwrite the styles of themes --->
	<link href="<? echo $template_url; ?>assets/css/soon.css" rel="stylesheet">
	  
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<? echo $template_url; ?>assets/js/html5shiv.js"></script>
      <script src="<? echo $template_url; ?>assets/js/respond.min.js"></script>
    <![endif]-->
	  
    <link href='//fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
		
		<style>
			body{
				background: url(<?php if ( $rc_mmip_inside_bgopt == 0){ echo esc_url($rc_mmip_default_bg); }else{ echo esc_url($rc_mmip_inside_custom_img); } ?>) #000000 no-repeat center center fixed !important; 
				background-size: cover;
				height: auto !important;
				color: #ffffff !important;
			}
			
			body:before{
				content: none;
			}
			
			body:after{
				content: none;
			}
			
			.header_text{
				margin-top: 50px;
			}
			
			.message_text{
				margin-top: 30px;
				margin-bottom: 30px;
			}
			
			#layer{
				background-color: rgba(0, 0, 0, 0.44) !important;
			}
			
			h1{
				margin-top: 0 !important;
			}
		</style>
		
		<script>
			jQuery(document).ready(function($){
				//Get data on click.
				$(".rc_submit_mailchimp").click(function(e){
					var $btn = $(this).button('loading');
					var email = $('.rc_maint_mc_email').val();
					
					
					<?php if($rc_mmip_mchimp_gcaptcha == 1): ?>
					var gcaptcha = grecaptcha.getResponse();
					<?php endif; ?>

					if(email.length === 0){
						$(".thank_you_msg").css({"color": "#ffffff", "background-color": "rgba(240, 0, 0, 0.35)", "padding":"10px"}).html('<i class="fa fa-exclamation-triangle"></i> Please insert a valid email address.');
						$btn.button('reset');
						clearContainer();
						return false;
					}
					
					<?php if($rc_mmip_mchimp_gcaptcha == 1): ?>
					if(gcaptcha.length === 0){
						$(".thank_you_msg").css({"color": "#ffffff", "background-color": "rgba(240, 0, 0, 0.35)", "padding":"10px"}).html('<i class="fa fa-exclamation-triangle"></i> reCaptcha missing...');
						$btn.button('reset');
						clearContainer();
						return false;
					}
					<?php endif; ?>

					var data = {
						'action': 'rc_maint_mchimp_action',
						'email': email<?php if($rc_mmip_mchimp_gcaptcha == 1): ?>,
						'gcaptcha': gcaptcha<?php endif; ?>
					};
					$.post(rcmmipAjaxurl,data, function(res){

						$(".rc_maint_mc_email").val("");
						$(".thank_you_msg").css({"color": "#ffffff", "background-color": "transparent", "padding":"10px"}).html(res);
						setTimeout(function(){ window.location.reload(); }, 2000);
						//$btn.button('reset');
					});
				});
				
				function clearContainer(){
					setTimeout(function(){ 
						$(".thank_you_msg").css({"color": "#ffffff", "background-color": "transparent", "padding":"10px"}).html("");
					}, 5000);

				}
				
			});
			
			
		
		</script>
  </head>
	
  <body>
	<!-- LAYER OVER THE SLIDER TO MAKE THE WHITE TEXT READABLE -->
	<div id="layer"></div>
	<div class="container" style="position: relative; z-index: 9999;">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center header_text">
				 <h1 data-animated="GoIn"><? echo str_replace('%blog_name%', esc_html($blog_name), esc_html($rc_mmip_inside_title)); ?></h1>
			</div>
		</div>

	 <div id="timer" data-animated="FadeIn">
			<?php if($rc_mmip_inside_msg != ''): ?>
				<div class="row">
					<div class="col-xs-12 col-ms-12 col-md-12 col-lg-12 text-center message_text">
						<div id="message"><?php  echo html_entity_decode($rc_mmip_inside_msg); ?></div>
					</div>
				</div>
			<?php endif; ?>

			<?php if($rc_mmip_inside_ctopt != 0): ?>
				<div class="row">
					<div class="hidden-xs col-sm-12 col-md-12 col-lg-12 text-center">
						<div id="days" class="timer_box"></div>
						<div id="hours" class="timer_box"></div>
						<div id="minutes" class="timer_box"></div>
						<div id="seconds" class="timer_box"></div>
					</div>
					<div class="visible-xs-12 hidden-sm hidden-md hidden-lg text-center">
						
							<div class="col-xs-3 col-md-3 col-lg-3 text-right">
								<div id="m_days" class="time_container"></div>
							</div>
							<div class="col-xs-3 col-md-3 col-lg-3">
								<div id="m_hours" class="time_container"></div>
							</div>
							<div class="col-xs-3 col-md-3 col-lg-3">
								<div id="m_minutes" class="time_container"></div>
							</div>
							<div class="col-xs-3 col-md-3 col-lg-3 text-left">
								<div id="m_seconds" class="time_container"></div>
							</div>
						
					</div>
				</div>
			<?php endif; ?>
		</div>

		<?php if($rc_mmip_mchimp_opt == 1):?>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 mt text-center">
				
				<h3><?php echo esc_html($rc_mmip_mchimp_section_title); ?></h3>
				<div class="form-group">
					<label class="sr-only" for="chimpemailaddress">Email address</label>
					<input type="email" name="rc_maint_mailchimpsubscriberemail" class="form-control rc_maint_mc_email" id="chimpemailaddress" placeholder="Enter email address">
				</div>
                <?php if($rc_mmip_mchimp_gcaptcha == 1): ?>
				<center><div class="g-recaptcha" data-sitekey="<?php echo $rc_mmip_mchimp_gcaptcha_site; ?>"></div></center>
				<script type="text/javascript"
								src="https://www.google.com/recaptcha/api.js?hl=en">
				</script>
				<?php endif; ?>
				<button type="submit" name="rc_maint_mailchimpsubscriber" class="btn btn-info rc_submit_mailchimp" autocomplete="off" style="margin-top: 10px;">Submit</button>
				<div class="thank_you_msg" style="margin-top: 20px;"></div>
			</div>
		</div>
		<? endif; ?>

		<?php if(is_array($rc_mmip_social) && !empty($rc_mmip_social)){ ?>
		<div class="row">
			<div class="hidden-xs col-sm-12 col-md-12 col-lg-12 text-center" style="margin-top: 25px;">
				<h4>
					Follow us on 
				</h4>
				<div class="rc_mmip_social_profiles" >
				<?php 
					$qty = count($rc_mmip_social);
					$col_num = 12/$qty;

					foreach($rc_mmip_social as $key=>$value){
						if($key == 'fb'){
							$link = '//facebook.com/'. esc_html($value['username']);
						}else if($key == 'tw'){
							$link = '//twitter.com/'. esc_html($value['username']);
						}else if($key == 'gp'){
							$link = '//plus.google.com/+'. esc_html($value['username']);
						}else if($key == 'ig'){
							$link = '//instagram.com/'. esc_html($value['username']);
						}

					?>
						<a href="<?php echo $link; ?>" target="_blank" id="<? echo substr(esc_html($value['icon']), 3); ?>"><i class="fa <? echo esc_html($value['icon']); ?> fa-2x"></i></a>
						&nbsp;&nbsp;
					<?
					}
				?>
				</div>
			</div>
			
			<!-- mobile layout -->
			<div class="visible-xs-12 hidden-sm hidden-md hidden-lg text-center" style="margin-top: 25px; margin-bottom: 50px;">
				<h4>Follow us</h4>
				<div class="rc_mmip_social_profiles" >
				<?php 
					$qty = count($rc_mmip_social);
					$col_num = 12/$qty;
					
					foreach($rc_mmip_social as $key=>$value){
						if($key == 'fb'){
							$link = '//facebook.com/'. esc_html($value['username']);
						}else if($key == 'tw'){
							$link = '//twitter.com/'. esc_html($value['username']);
						}else if($key == 'gp'){
							$link = '//plus.google.com/+'. esc_html($value['username']);
						}else if($key == 'ig'){
							$link = '//instagram.com/'. esc_html($value['username']);
						}
					?>
						<a href="<?php echo $link; ?>" target="_blank" id="<? echo substr(esc_html($value['icon']), 3); ?>" style="color: #ffffff;"><i class="fa <? echo esc_html($value['icon']); ?> fa-lg"></i></a>
						&nbsp;&nbsp;
					<?
					}
				?>
				</div>
			</div>
		</div>
		
		<?php } ?>
	</div>
	<!-- end container -->
  </body>
  <!-- END BODY -->
</html>

<?php wp_footer(); ?>