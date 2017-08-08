<?php
/*
Template Name: About Page Template
*/
get_header();

// Shows posts
if(have_posts()) :
while (have_posts()) : the_post();?>
<?php the_content();?>
<?php
  endwhile;

  else :
    echo '<p>No content found</p>';
endif;

get_footer();
?>