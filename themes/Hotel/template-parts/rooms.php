<div class="row column show-for-small-only">
  <h2>Home</h2>
</div>

<section class="rooms row">
    <h2>Our Rooms</h2>
  <?php
      $args = array(
        'post_type' => 'page',
        'post_parent' => 11,
        'orderby' => 'title',
        'order' => 'ASC',
        'posts_per_page' => 3

);
        $rooms = new WP_Query($args);
        while($rooms->have_posts()): $rooms->the_post();

 ?>

  <div class="medium-4 columns">
    <div class="room-image">
      <?php the_post_thumbnail(); ?>
      <div class="room-title">
        <h3><?php the_title(); ?></h3>
      </div>
    </div><!-- room image -->
    <div class="room-content">
      <?php the_field('short_description') ?>
    </div>
  </div><!-- medium columns -->
  <?php   endwhile; wp_reset_postdata(); ?>
</section>
