<?php

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

wp_deregister_script( 'jquery' );


function hotelspa_styles() {
  wp_enqueue_style('app', get_template_directory_uri() . '/css/app.css', '1.0.0' );

  wp_enqueue_style('foundation-icons', get_template_directory_uri() . '/css/foundation-icons.css', '1.0.0' );

  wp_enqueue_script('jquery');

  wp_enqueue_script('what-input', get_template_directory_uri() . '/bower_components/what-input/what-input.js', array('jquery'), '6.2.2', true  );

  wp_enqueue_script('foundation', get_template_directory_uri() . '/bower_components/foundation-sites/dist/foundation.js', array('jquery'), '6.2.2', true  );

  wp_enqueue_script('appjs', get_template_directory_uri() . '/js/app.js', array('jquery'), '6.2.2', true  );

}
add_action('wp_enqueue_scripts', 'hotelspa_styles');


function hotelspa_menus() {
  register_nav_menus(array(
    'footer_menu' => 'Footer Menu',
    'header_menu' => 'Header Menu'
  ));
}
add_action( 'after_setup_theme', 'hotelspa_menus');

function hotelspa_widgets() {
  register_sidebar(array(
    'name' => 'Footer Widgets',
    'id'  => 'footer_widget',
    'before_widget' => '<div>',
    'after_widget' => '</div>',
    'before_title' => '',
    'after_title' => ''
  ));
  register_sidebar(array(
    'name' => 'Footer Contact Info',
    'id'  => 'footer_cinfo',
    'before_widget' => '<div>',
    'after_widget' => '</div>',
    'before_title' => '',
    'after_title' => ''
  ));
  register_sidebar(array(
    'name' => 'Footer aboutus',
    'id'  => 'footer_about',
    'before_widget' => '<div>',
    'after_widget' => '</div>',
    'before_title' => '<h4>',
    'after_title' => '</h4>'
  ));
}

add_action('widgets_init', 'hotelspa_widgets');


class Foundation_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = array() ) {
      $indent = str_repeat("\t", $depth);
      $output .= "\n$indent<ul class=\"vertical menu\">\n";
    }
}

function foundation_drilldown($args) {
      $walker_page = new Walker_Page();
      $fallback = $walker_page->walk(get_pages(), 0);
      $fallback = str_replace("children", "children vertical menu", $fallback);
      echo '<ul class="vertical menu" data-drilldown="">' . $fallback . '</ul>';
}

add_theme_support('post-thumbnails');
add_theme_support('menus');
 ?>
