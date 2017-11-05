<?php
/*
    Template Name: Room Single
*/
 get_header(); ?>


      <?php while(have_posts()): the_post(); ?>
          <div class="row column show-for-small-only">
              <h2><?php the_title(); ?></h2>
          </div>
          
          
          <section class="content">
            <div class="row">
              <div class="large-6 columns large-centered">
                  <nav class="roomMenu">
                      <ul class="menu horizontal expanded" data-magellan>
                            <li><a href="#room-info">Information</a></li>
                            <li><a href="#gallery">Gallery</a></li>
                            <li><a href="#booking">Book Now</a></li>
                      </ul>
                  </nav>
              </div>
            </div>

            
                    <section id="room-info" data-magellan-target="room-info" class="room-info">
                        <div class="row">
                          <div class="large-10 columns large-centered">
                              <?php the_content(); ?>
                          </div> <!--.large-10-->
                        </div> <!--.row-->
                    </section>

                    <section id="gallery" data-magellan-target="gallery" class="gallery bluebg">
                        <div class="row">
                    
                          <?php $gallery = get_field('gallery', $post->ID, false ); 
                                 $image_ids = explode('"', $gallery ); 
                                 $image_ids = $image_ids[1];
                                 $ids = explode(",", $image_ids);
                                 ?>
                          

                          
                           <h2 class="white text-center">Gallery</h2>

                           <div class="medium-up-4 small-up-2">
                          <?php
                          
                          $i = 0;
                          foreach($ids as $image_id):
                                $gallery_image = wp_get_attachment_image_src( $image_id, 'medium'); ?>
                                
                                  <div class="column">
                                      <a data-open="galleryModal<?php echo $i; ?>">
                                        <img class="thumbnail" src="<?php echo $gallery_image[0]; ?>">
                                      </a>
                                      
                                        <!-- MODALS -->
                                        <div class="reveal large" id="galleryModal<?php echo $i; ?>" data-close-on-click="true" data-reveal data-animation-in="scale-in-up" data-animation-out="scale-out-down">
                                          <?php $gallery_image = wp_get_attachment_image_src( $image_id, 'full'); ?>
                                          <img src="<?php echo $gallery_image[0]; ?>">
                                          <button class="close-button" data-close aria-label="Close reveal" type="button">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                      <!-- End of Modal-->
                                  </div>

                            
                            <?php $i++;  endforeach;  ?>
                           </div>


                        </div>
                    </section>


                <!-- Separator image -->
                <div class="separator-image" style="background-image: url(<?php the_field('separator_image'); ?>);"></div>
                   <!-- Booking section -->
                   
                   
                     <?php get_template_part('template', 'parts/booking'); ?>
      <?php endwhile; ?>

<?php get_footer(); ?>