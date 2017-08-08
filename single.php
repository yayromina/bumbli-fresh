<?php

get_header();

// Shows posts
if(have_posts()) :
  while (have_posts()) : the_post();?>
<section class="post-content">
  <div class="row align-center">
    <div class="medium-10 large-8 columns small-12">
    <h2 class="post-date"><?= get_the_date();?></h2>
    <h1 class="post-title"><?php the_title();?></h1>
    <p class="author">By <?php the_author();?></p>
      <div class="featured-image-wrapper"><?php the_post_thumbnail('large');?></div>
      <?php the_content();?>
    </div>
  </div>
</section>
<?php
  endwhile;

else :?>
    <section>
      <div class="row">
        <h1>No content found</h1>
      </div>
    </section>
<?php endif;

get_footer();
?>