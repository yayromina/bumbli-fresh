<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title();?> Penny</title>
  <link rel="icon" type="image/x-icon" href="<?=get_template_directory_uri();?>/favicon.ico" />
  <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,900" rel="stylesheet">
	<?php wp_head();?>
</head>
<body <?php body_class(); ?>>
<div class="off-canvas-wrapper">
  <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
    <div class="off-canvas position-left" id="offCanvas" data-off-canvas>
      <!-- Mobile menu content -->
      <?php wp_nav_menu(array('theme_location' => 'primary_menu', 'container' => '', 'depth' => 1));?>
      <button class="close-button" aria-label="Close menu" type="button" data-close>
        <i class="fa fa-close"></i>
      </button>
    </div>
 
    <div class="off-canvas-content" data-off-canvas-content>
<header class="primary-header">
  <div class="row navigation">
    <div class="columns medium-5">
      <?php wp_nav_menu( array('theme_location' => 'primary_menu') );?>
    </div>
    <div class="columns small-4 large-2 logo-container">
      <a href="<?=site_url();?>/"><img src="<?php the_field('logo', 'option');?>"></a>
    </div>
  </div>
</header>