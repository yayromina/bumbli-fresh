<?php
/*
Template Name: Contact Page Template
*/
get_header();

// Shows posts
if(have_posts()) :
  while (have_posts()) : the_post();?>
<section class="contact">
	<div class="row">
		<div class="columns small-12 large-6">
			<?php the_content();?>
		</div>
		<div class="columns small-12 large-6 header contact-header">
			<h3><?php the_field('headline');?></h3>
			<?php the_field('content');?>
			<?php
			// check if the repeater field has rows of data
			if( have_rows('faqs') ):?>
			<div class="faqs contact-faqs">
				<div class="row">
					<?php while ( have_rows('faqs') ) : the_row();?>
						<div class="small-12 columns">
							<div class="question contact-question"><?php the_sub_field('question');?></div>
							<?php the_sub_field('answer');?>
						</div>
				   
				    <?php endwhile;?>	
				</div>
			</div>
			<?php endif;
		?>
		</div>
	</div>
</section>
<?php
  endwhile;

  else :
    echo '<p>No content found</p>';
endif;

get_footer();
?>