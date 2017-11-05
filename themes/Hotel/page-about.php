<?php
// Template Name: About Us


get_header(); ?>

<?php while(have_posts() ): the_post(); ?>
<div class="row column show-for-small-only">
  <h2><?php the_title(); ?></h2>
</div>
<section class="content">
  <div class="row">
    <div class="medium-9 columns">
        <?php the_content(); ?>
    </div>
    <div class="medium-3 columns">
        <img src="<?php the_field('sidebar_image'); ?>" alt="">
    </div>
  </div>
</section>
<?php endwhile; ?>

<?php get_footer(); ?>
