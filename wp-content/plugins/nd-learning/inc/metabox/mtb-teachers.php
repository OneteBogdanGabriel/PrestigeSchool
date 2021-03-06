<?php

///////////////////////////////////////////////////METABOX ///////////////////////////////////////////////////////////////


add_action( 'add_meta_boxes', 'nd_learning_meta_box_teacher' );
function nd_learning_meta_box_teacher() {
    add_meta_box( 'nd-learning-meta-box-teachers', __('Teacher Options','nd-learning'), 'nd_learning_meta_box_teachers', 'teachers', 'normal', 'high' );
}

function nd_learning_meta_box_teachers()
{

    //date picker
    wp_enqueue_script('jquery-ui-datepicker'); 
    wp_enqueue_style( 'jquery-ui-datepicker-css', plugins_url() . '/nd-learning/assets/css/jquery-ui-datepicker.css' );

    //iris color picker
    wp_enqueue_script('iris');

    // $post is already set, and contains an object: the WordPress post
    global $post;
    $nd_learning_values = get_post_custom( $post->ID );
     
    $nd_learning_meta_box_teacher_role = get_post_meta( get_the_ID(), 'nd_learning_meta_box_teacher_role', true );
    $nd_learning_meta_box_teacher_color = get_post_meta( get_the_ID(), 'nd_learning_meta_box_teacher_color', true ); 
    $nd_learning_meta_box_teacher_form = get_post_meta( get_the_ID(), 'nd_learning_meta_box_teacher_form', true ); 
    $nd_learning_meta_box_teacher_location = get_post_meta( get_the_ID(), 'nd_learning_meta_box_teacher_location', true ); 

    ?>


    <p><strong><?php _e('Role','nd-learning'); ?></strong></p>
    <p><input type="text" name="nd_learning_meta_box_teacher_role" id="nd_learning_meta_box_teacher_role" value="<?php echo $nd_learning_meta_box_teacher_role; ?>" /></p>

    <p><strong><?php _e('Location','nd-learning'); ?></strong></p>
    <p><input type="text" name="nd_learning_meta_box_teacher_location" id="nd_learning_meta_box_teacher_location" value="<?php echo $nd_learning_meta_box_teacher_location; ?>" /></p>

    <p><strong><?php _e('Color','nd-learning'); ?></strong></p>
    <p><input id="nd_learning_colorpicker" type="text" name="nd_learning_meta_box_teacher_color" value="<?php echo $nd_learning_meta_box_teacher_color; ?>" /></p>
    
    <script type="text/javascript">
      //<![CDATA[
      
      jQuery(document).ready(function($){
          $('#nd_learning_colorpicker').iris();
      });

      //]]>
    </script>


    <p><strong><?php _e('CF7 Form','nd-learning'); ?></strong></p>
    <p>
      <select name="nd_learning_meta_box_teacher_form">
          <?php 

            $nd_learning_meta_box_teacher_form = get_post_meta( get_the_ID(), 'nd_learning_meta_box_teacher_form', true );
            $nd_learning_forms_args = array( 'posts_per_page' => -1, 'post_type'=> 'wpcf7_contact_form' );
            $nd_learning_forms = get_posts($nd_learning_forms_args); 

            ?>
          <?php foreach ($nd_learning_forms as $nd_learning_form) : ?>
              <option 

              <?php 
                if( $nd_learning_meta_box_teacher_form == $nd_learning_form->ID ) { 
                  echo 'selected="selected"';
                } 
              ?>

              value="<?php echo $nd_learning_form->ID; ?>">
                  <?php echo $nd_learning_form->post_title; ?>
              </option>
          <?php endforeach; ?>
        </select>
    </p>
    


    <?php    
}



add_action( 'save_post', 'nd_learning_meta_box_teachers_save' );
function nd_learning_meta_box_teachers_save( $post_id )
{

    // Make sure your data is set before trying to save it
    if( isset( $_POST['nd_learning_meta_box_teacher_role'] ) )
        update_post_meta( $post_id, 'nd_learning_meta_box_teacher_role', wp_kses( $_POST['nd_learning_meta_box_teacher_role'], $allowed ) );

    if( isset( $_POST['nd_learning_meta_box_teacher_location'] ) )
        update_post_meta( $post_id, 'nd_learning_meta_box_teacher_location', wp_kses( $_POST['nd_learning_meta_box_teacher_location'], $allowed ) );

    if( isset( $_POST['nd_learning_meta_box_teacher_color'] ) )
        update_post_meta( $post_id, 'nd_learning_meta_box_teacher_color', wp_kses( $_POST['nd_learning_meta_box_teacher_color'], $allowed ) );

    if( isset( $_POST['nd_learning_meta_box_teacher_form'] ) )
        update_post_meta( $post_id, 'nd_learning_meta_box_teacher_form', wp_kses( $_POST['nd_learning_meta_box_teacher_form'], $allowed ) );
         
}





/*******************************HEADER IMG******************************/

add_action( 'add_meta_boxes', 'nd_learning_metabox_teachers_header_img' );
function nd_learning_metabox_teachers_header_img() {
    add_meta_box( 'nd-learning-meta-box-teacher-header-img-id', __('Header Image','nd-learning'), 'nd_learning_metabox_teacher_header_img', 'teachers', 'normal', 'high' );
}

function nd_learning_metabox_teacher_header_img()
{


    // $post is already set, and contains an object: the WordPress post
    global $post;
    $nd_learning_values = get_post_custom( $post->ID );
     
    $nd_learning_meta_box_teacher_header_img = get_post_meta( get_the_ID(), 'nd_learning_meta_box_teacher_header_img', true );
    $nd_learning_meta_box_teacher_header_img_position = get_post_meta( get_the_ID(), 'nd_learning_meta_box_teacher_header_img_position', true );


    ?>


    <p><strong><?php _e('Header Image','nd-learning'); ?></strong></p>
    <p><input class="regular-text" type="text" name="nd_learning_meta_box_teacher_header_img" id="nd_learning_meta_box_teacher_header_img" value="<?php echo $nd_learning_meta_box_teacher_header_img; ?>" /></p>
    <p>
      <input class="button nd_learning_meta_box_teacher_header_img_button" type="button" name="nd_learning_meta_box_teacher_header_img_button" id="nd_learning_meta_box_teacher_header_img_button" value="<?php _e('Upload','nd-learning'); ?>" />
    </p>



    <p><strong><?php _e('Image Position','nd-learning'); ?></strong></p>
    <p>
      <select name="nd_learning_meta_box_teacher_header_img_position" id="nd_learning_meta_box_teacher_header_img_position">
        
        <option <?php if( $nd_learning_meta_box_teacher_header_img_position == 'nd_learning_background_position_center_top' ) { echo 'selected="selected"'; } ?> value="nd_learning_background_position_center_top">Position Top</option>
        <option <?php if( $nd_learning_meta_box_teacher_header_img_position == 'nd_learning_background_position_center_bottom' ) { echo 'selected="selected"'; } ?> value="nd_learning_background_position_center_bottom">Position Bottom</option>
        <option <?php if( $nd_learning_meta_box_teacher_header_img_position == 'nd_learning_background_position_center' ) { echo 'selected="selected"'; } ?> value="nd_learning_background_position_center">Position Center</option>
         
      </select>
    </p>


    <script type="text/javascript">
      //<![CDATA[
      
    jQuery(document).ready(function() {

      jQuery( function ( $ ) {

        var file_frame = [],
        $button = $( '.nd_learning_meta_box_teacher_header_img_button' );


        $('#nd_learning_meta_box_teacher_header_img_button').click( function () {


          var $this = $( this ),
            id = $this.attr( 'id' );

          // If the media frame already exists, reopen it.
          if ( file_frame[ id ] ) {
            file_frame[ id ].open();

            return;
          }

          // Create the media frame.
          file_frame[ id ] = wp.media.frames.file_frame = wp.media( {
            title    : $this.data( 'uploader_title' ),
            button   : {
              text : $this.data( 'uploader_button_text' )
            },
            multiple : false  // Set to true to allow multiple files to be selected
          } );

          // When an image is selected, run a callback.
          file_frame[ id ].on( 'select', function() {

            // We set multiple to false so only get one image from the uploader
            var attachment = file_frame[ id ].state().get( 'selection' ).first().toJSON();

            $('#nd_learning_meta_box_teacher_header_img').val(attachment.url);

          } );

          // Finally, open the modal
          file_frame[ id ].open();


        } );

      });

    });

      //]]>
    </script>


    <?php    
}

add_action( 'save_post', 'nd_learning_meta_box_teacher_header_img_save' );
function nd_learning_meta_box_teacher_header_img_save( $post_id )
{

    // Make sure your data is set before trying to save it
    if( isset( $_POST['nd_learning_meta_box_teacher_header_img'] ) )
        update_post_meta( $post_id, 'nd_learning_meta_box_teacher_header_img', wp_kses( $_POST['nd_learning_meta_box_teacher_header_img'], $allowed ) );


    // Make sure your data is set before trying to save it
    if( isset( $_POST['nd_learning_meta_box_teacher_header_img_position'] ) )
        update_post_meta( $post_id, 'nd_learning_meta_box_teacher_header_img_position', wp_kses( $_POST['nd_learning_meta_box_teacher_header_img_position'], $allowed ) );
         
}





/*******************************CONTACT INFO******************************/
add_action( 'add_meta_boxes', 'nd_learning_meta_box_info_teacher' );
function nd_learning_meta_box_info_teacher() {
    add_meta_box( 'nd-learning-meta-box-info-teachers', __('Teacher Info','nd-learning'), 'nd_learning_meta_box_teachers_info', 'teachers', 'normal', 'high' );
}

function nd_learning_meta_box_teachers_info()
{


    // $post is already set, and contains an object: the WordPress post
    global $post;
    $nd_learning_values = get_post_custom( $post->ID );
     
    $nd_learning_meta_box_teacher_email = get_post_meta( get_the_ID(), 'nd_learning_meta_box_teacher_email', true );
    $nd_learning_meta_box_teacher_telephone = get_post_meta( get_the_ID(), 'nd_learning_meta_box_teacher_telephone', true );
    $nd_learning_meta_box_teacher_skype = get_post_meta( get_the_ID(), 'nd_learning_meta_box_teacher_skype', true );
    $nd_learning_meta_box_teacher_website = get_post_meta( get_the_ID(), 'nd_learning_meta_box_teacher_website', true );

    ?>


    <p><strong><?php _e('Email','nd-learning'); ?></strong></p>
    <p><input type="text" name="nd_learning_meta_box_teacher_email" id="nd_learning_meta_box_teacher_email" value="<?php echo $nd_learning_meta_box_teacher_email; ?>" /></p>

    <p><strong><?php _e('Telephone','nd-learning'); ?></strong></p>
    <p><input type="text" name="nd_learning_meta_box_teacher_telephone" id="nd_learning_meta_box_teacher_telephone" value="<?php echo $nd_learning_meta_box_teacher_telephone; ?>" /></p>

    <p><strong><?php _e('Skype','nd-learning'); ?></strong></p>
    <p><input type="text" name="nd_learning_meta_box_teacher_skype" id="nd_learning_meta_box_teacher_skype" value="<?php echo $nd_learning_meta_box_teacher_skype; ?>" /></p>

    <p><strong><?php _e('Website','nd-learning'); ?></strong></p>
    <p><input type="text" name="nd_learning_meta_box_teacher_website" id="nd_learning_meta_box_teacher_website" value="<?php echo $nd_learning_meta_box_teacher_website; ?>" /></p>


    <?php
}



add_action( 'save_post', 'nd_learning_meta_box_teachers_info_save' );
function nd_learning_meta_box_teachers_info_save( $post_id )
{

    // Make sure your data is set before trying to save it
    if( isset( $_POST['nd_learning_meta_box_teacher_email'] ) )
        update_post_meta( $post_id, 'nd_learning_meta_box_teacher_email', wp_kses( $_POST['nd_learning_meta_box_teacher_email'], $allowed ) );

    if( isset( $_POST['nd_learning_meta_box_teacher_telephone'] ) )
        update_post_meta( $post_id, 'nd_learning_meta_box_teacher_telephone', wp_kses( $_POST['nd_learning_meta_box_teacher_telephone'], $allowed ) );

    if( isset( $_POST['nd_learning_meta_box_teacher_skype'] ) )
        update_post_meta( $post_id, 'nd_learning_meta_box_teacher_skype', wp_kses( $_POST['nd_learning_meta_box_teacher_skype'], $allowed ) );

    if( isset( $_POST['nd_learning_meta_box_teacher_website'] ) )
        update_post_meta( $post_id, 'nd_learning_meta_box_teacher_website', wp_kses( $_POST['nd_learning_meta_box_teacher_website'], $allowed ) );
         
}