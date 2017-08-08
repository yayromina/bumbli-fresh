<?php

get_header();

// Shows posts
if(have_posts()) :
  while (have_posts()) : the_post();?>
<section class="all-posts">

  <div class="row align-center">
    <div class="medium-10 columns small-12">
          <div class="row single-post-list align-center">
            <div class="medium-4 small-12 columns">
              <a href="<?php the_permalink();?>"><?php the_post_thumbnail('large');?></a>
            </div>
            <div class="medium-8 small-12 columns">
              <h3 class="post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
              <?$postdate = get_the_date();?>
              <h4 class="date"><?=$postdate?></h4>
              <?php the_excerpt();?>
              <a href="<?php the_permalink();?>" class="button teal centered small">Read The Article</a>
          </div>
        </div>


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