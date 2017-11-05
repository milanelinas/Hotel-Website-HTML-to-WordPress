
<?php
  // Template Name: Services
 get_header(); ?>

<?php while(have_posts() ): the_post(); ?>
<div class="row column show-for-small-only">
  <h2><?php the_title(); ?></h2>
</div>
<section class="content">
  <?php $args = array(
      'post_type' => 'page',
      'post_parent' => 9,
      'orderby' => 'title',
      'order' => 'ASC'
  );
  $i = 0;
    $services = new WP_Query($args); while($services->have_posts()): $services->the_post();
  ?>
  <div class="row" data-equalizer="service <?php echo $i; ?>">
    <div class="medium-6 content-text columns <?php echo $i % 2 == 1 ? 'medium-push-6' : '' ?>" data-equalizer-watch="service <?php echo $i; ?>">
      <h2 class="<?php echo $i % 2 == 1 ? 'medium-text-right' : '' ?>"><?php the_title(); ?></h2>
      <p class="<?php echo $i % 2 == 1 ? 'medium-text-right' : '' ?>"><?php echo get_the_content(); ?></p>
    </div>
    <div class="medium-6 columns <?php echo $i % 2 == 1 ? 'medium-pull-6' : '' ?>" data-equalizer-watch="service">
       <?php the_post_thumbnail(); ?>
         <a href="<?php the_permalink() ?>" class="button">More Info</a>
    </div>
  </div> <!-- row -->
  <?php $i++; endwhile; wp_reset_postdata(); ?>
</section>
<?php endwhile; ?>

<?php get_footer(); ?>
