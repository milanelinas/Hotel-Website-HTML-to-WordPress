
  <?php get_header(); ?>

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
    <div class="row columns">
      <a class="button float-right">View All</a>
    </div>
    <!-- Separator Image -->
    <?php while(have_posts()): the_post(); ?>
    <div class="separator-image" style="background-image: url(<?php the_field('separator_1'); ?>)"></div>
  <?php endwhile; ?>
    <section class="about-us-gallery">
      <div class="medium-6 columns empty"></div>
      <div class="medium-6 columns empty bluebg"></div>

      <div class="content-about-us">
        <div class="row">
            <div class="medium-6 columns">

                <?php $about = new WP_Query('pagename=about-us');
                while($about->have_posts()): $about->the_post();     ?>
                  <h2><?php the_title(); ?></h2>
                  <?php the_content(); ?>

            <?php endwhile; wp_reset_postdata(); ?>
            </div>

              <!-- Modals -->

            <!-- End of modals  -->


            <div id="gallery" class="medium-6 columns bluebg">
              <?php $gallery = new WP_Query('pagename=gallery');
              while($gallery->have_posts()): $gallery->the_post();
              ?>
                <h2 class="white"><?php the_title(); ?></h2>
                <?php $images = get_post_gallery(get_the_ID(), false) ?>
                <div class="row small-up-3 medium-up-3 large-up-3">
                  <?php $ids = $images['ids'];
                        $ids = explode(",", $ids);
$i = 0;
                        foreach($ids as $image_id):

                        $gallery_image= wp_get_attachment_image_src( $image_id, 'thumbnail'); ?>

                        <div class="column">
                          <a data-open="galleryModal<?php echo $i; ?>">
                            <img class="thumbnail" src="<?php echo $gallery_image[0]; ?>" alt="">
                        </a>
                        </div>

                        <div class="reveal" id="galleryModal<?php echo $i; ?>" data-close-on-click="true" data-reveal data-animation-in="scale-in-up"
                        data-animation-out="scale-out-down">
                        <?php $gallery_image= wp_get_attachment_image_src( $image_id, 'full'); ?>
                          <img src="<?php echo $gallery_image[0]; ?>">
                          <button class="close-button" data-close aria-label="Close reveal" type="button">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>

                      <?php $i++; endforeach; ?>
                <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
      </div>
    </section>
    <?php while(have_posts()): the_post(); ?>
    <div class="separator-image" style="background-image: url(<?php the_field('separator_2'); ?>)"></div>
  <?php endwhile; ?>
    <section class="booking row">
      <div class="large-8 large-centered text-center columns">
        <h2>Book Now</h2>
        <p>
            default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
        </p>
        <a data-open="modalBook" class="button">Book Now</a>
      </div>
    </section>
      <div class="reveal" id="modalBook" data-reveal>
        <h2 class="text-center">Booking Form</h2>
            <?php echo do_shortcode('[ninja_form id=1]'); ?>
      </div>
        <?php get_footer(); ?>
