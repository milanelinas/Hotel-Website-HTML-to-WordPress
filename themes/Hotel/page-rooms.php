
<?php
// Template Name: Rooms
 get_header(); ?>

<?php get_template_part('template' , 'parts/rooms'); ?>

 <?php while(have_posts()): the_post(); ?>
   <div class="separator-image" style="background-image: url(<?php the_field(separator_image); ?>)"></div>
 <?php endwhile; ?>

 <section class="rooms row">
   <?php
       $args = array(
         'post_type' => 'page',
         'post_parent' => 11,
         'orderby' => 'title',
         'order' => 'ASC',
         'posts_per_page' => 3,
         'offset' => 3

);
         $rooms = new WP_Query($args);
         while($rooms->have_posts()): $rooms->the_post();

  ?>

   <div class="medium-4 columns">
     <a href="<?php the_permalink() ?>">
     <div class="room-image">
       <?php the_post_thumbnail(); ?>
     </a>
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


<?php get_footer(); ?>
