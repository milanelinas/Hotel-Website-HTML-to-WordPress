<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo get_bloginfo('sitename') ?></title>
    <?php wp_head(); ?>

  </head>
  <body>
    <div class="off-canvas-wrapper">
      <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
        <div class="off-canvas position-left" id="mainMenu" data-off-canvas data-position="left">
            <h3 class="text-center">Navigation</h3>
              <?php
                $args = array(
                  'theme_location' => 'header_menu',
                  'container' =>  false,
                  'menu_class' => 'vertical menu',
                  'items_wrap' => '<ul id="%1$s" class="%2$s" data-drilldown="">%3$s</ul>',
                  'fallback_cb' => 'foundation_drilldown',
                  'walker' => new Foundation_Walker()
                );
                wp_nav_menu($args);
               ?>

        </div> <!--.off-canvas -->

    <div class="off-canvas-content" data-off-canvas-content>
    <section class="promo-video">
      <div id="overlay"></div>
      <?php if(is_front_page() && !is_home() ):
            while(have_posts()): the_post();

                the_content();

          endwhile; ?>
          <div class="headliner hide-for-small-only">
            <div class="column row">
                <h1 class="text-center"><?php echo get_bloginfo('description'); ?></h1>
            </div>
          </div> <!-- .headliner -->
    <?php else: ?>
      <?php the_post_thumbnail(); ?>
    <div class="headliner hide-for-small-only">
      <div class="column row">
          <h1 class="text-center"><?php the_title() ?></h1>
      </div>
    </div> <!-- .headliner -->


    <?php endif; ?>
      <div class="header-content">
        <div class="row">
        <div class="small-8 medium-4 columns">
          <a href="<?php echo esc_url(home_url('/') );?>">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg">
        </a>
        </div>
        <div class="small-4 medium-4 columns">
          <a class="menu-icon float-right" data-open="mainMenu"></a>
        </div>
        </div>  <!-- row -->
      </div> <!-- .header-content -->
    </section>
