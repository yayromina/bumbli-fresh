<?php
/*
Template Name: Home Page Template
*/
get_header();

// Shows posts
if(have_posts()) :
  while (have_posts()) : the_post();?>
<section class="splash">
	<div class="row content">
		<div class="columns">
			<h1><?php the_field('hero_headline');?></h1>
			<h2><?php the_field('hero_tagline');?></h2>
			<a href="<?php the_field('hero_button_link')?>" class="button"><?php the_field('hero_button_text');?></a>
		</div>
	</div>
	<div class="slider-container">

		<?php

			// check if the repeater field has rows of data
			if( have_rows('hero_slides') ):

			 	// loop through the rows of data
			    while ( have_rows('hero_slides') ) : the_row();?>

			        
			        <div class="slide" style="background-image:url(<?php the_sub_field('background_image');?>)">&nbsp;
			        </div>

			    <?php endwhile;

			endif;

		?>
	</div>
</section>
<section class="content-container">
	<?php

			// check if the repeater field has rows of data
			if( have_rows('content_sections') ):

			 	// loop through the rows of data
			 	$counter = 0;
			    while ( have_rows('content_sections') ) : the_row();?>

			        <div class="row content-row align-justify align-middle">
			        	<div class="content-text columns small-12 large-5">
			        		<h3><?php the_sub_field('headline');?></h3>
			        		<h4><?php the_sub_field('tagline');?></h4>
			        		<?php 
			        			if(get_sub_field('content')){
			        				the_sub_field('content');
			        			}
			        		?>
							<?php

							// check if the repeater field has rows of data
							if( have_rows('lists') ):?>
								<div class="row list-container">
									<?php
								 	// loop through the rows of data
								    while ( have_rows('lists') ) : the_row();?>

								        <div class="small-6 columns">
								        	<h6><?php the_sub_field('list_title');?></h6>
											<?php

											// check if the repeater field has rows of data
											if( have_rows('list_items') ):

											 	// loop through the rows of data
											    while ( have_rows('list_items') ) : the_row();?>

											        
											       <li><i class="fa fa-check-circle" aria-hidden="true"></i> <?php the_sub_field('list_item');?></li>

											    <?php endwhile;

											endif;

											?>

								        </div>

								    <?php endwhile;?>
								</div>
							<?php endif;

							?>

			        		<?php if(get_sub_field('button_text')){?>
								<a href="<?php the_sub_field('button_link');?>" class="button"><?php the_sub_field('button_text');?></a>
			        		<?php }?>
			        	</div>
			        	<div class="columns small-12 large-6 image-container">
			        		<img src="<?php the_sub_field('image');?>">
			        	</div>
			        </div>
			    

			    <?php $counter++; endwhile;

			endif;

			?>
</section>
<?php if(get_field('video_link')) {?>
<section class="video-cta" style="background-image:url(<?php the_field('video_background_image');?>)">
	<div class="row">
		<div class="columns">
			<h3><?php the_field('video_headline');?></h3>
			<a class="video-link" href="<?php the_field('video_link');?>">
				<img src="<?php the_field('play_button');?>" alt="<?php the_field('video_headline');?>">
				<span><?php the_field('video_link_text');?></span>
			</a>
			<div class="modal-body"></div>
		</div>
	</div>
</section>
<?php }?>
<?php if(get_field('packages_headline')){?>
<section class="home-packages">
	<div class="row header">
		<div class="columns">
			<h3><?php the_field('packages_headline');?></h3>
			<h4><?php the_field('packages_tagline');?></h4>
		</div>
	</div>
	<div class="row">
		<?php
			// check if the repeater field has rows of data
			if( have_rows('packages') ):
			 	// loop through the rows of data
			    while ( have_rows('packages') ) : the_row();?>

			        
			        <div class="columns small-12 large-4 package-container">
			        	<div class="image-container">
			        		<img src="<?php the_sub_field('image');?>">
			        	</div>
			        	<h5><?php the_sub_field('headline');?></h5>
			        	<?php the_sub_field('content');?>
			        </div>
			    <?php endwhile;
			endif;
		?>
	</div>
	<div class="row">
		<div class="columns">
			<a href="<?php the_field('packages_button_link');?>" class="button"><?php the_field('packages_button_text');?></a>
		</div>
	</div>
</section>
<?php }?>
<?php

	// check if the repeater field has rows of data
	if( have_rows('gallery_images') ):?>
	<section class="home-gallery">
		<div class="row expanded">
		 	<?php // loop through the rows of data
		    while ( have_rows('gallery_images') ) : the_row();?>

		        
		        <div class="columns small-12 medium-4">
		        	<img src="<?php the_sub_field('image');?>">
		        </div>

		    <?php endwhile;?>
		</div>
	</section>
	<?php endif;
?>
<?php if (get_field('featured_headline')){?>
<section class="home-featured">
	<div class="row header">
		<div class="columns">
			<h5><?php the_field('featured_headline');?></h5>
		</div>
	</div>
	<div class="row align-middle align-center align-justify">
		<?php
			// check if the repeater field has rows of data
			if( have_rows('featured_logos') ):
			 	// loop through the rows of data
			    while ( have_rows('featured_logos') ) : the_row();?>

			        
			        <div class="columns">
			        	<a href="<?php the_sub_field('link');?>" target="_blank">
			        		<img src="<?php the_sub_field('logo_image');?>">
			        	</a>
			        </div>
			    <?php endwhile;
			endif;
		?>
	</div>
</section>
<?php

	// check if the repeater field has rows of data
	if( have_rows('testimonials') ):?>
	 	<?php // loop through the rows of data
	    while ( have_rows('testimonials') ) : the_row();?>
	        
	        <section class="testimonial" style="background-image:url(<?php the_sub_field('testimonial_image');?>)">
	        	<div class="row">
	        		<div class="columns small-12 large-6 content-container">
	        			<h5><?php the_sub_field('name');?></h5>
	        			<p class="location"><?php the_sub_field('location');?></p>
	        			<div class="quote">
	        				<?php the_sub_field('quote');?>
	        			</div>
	        			<p>
	        			<?php $stars = get_sub_field('stars') ?>
	        				<?php
	        					// $stars = get_sub_field('stars');

	        					for($i=0; $i < $stars; $i++){?>
									<i class="fa fa-star"></i>
	        					<?php } ?>
	        			</p>
	        		</div>
	        		<div class="columns small-12 large-6 image-wrapper" style="background-image:url(<?php the_sub_field('testimonial_image');?>)">
	        		</div>
	        	</div>
	        </section>

	    <?php endwhile;?>
	<?php endif;
?>

<?php }?>
<?php 
  endwhile;

  else :
    echo '<p>No content found</p>';
endif;

get_footer();
?>