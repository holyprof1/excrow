<?php
// wp-content/themes/savvy-media/functions.php
  add_theme_support('post-thumbnails');
  add_theme_support('title-tag');

});
add_action('wp_enqueue_scripts', function(){
  wp_enqueue_style('savvy-style', get_stylesheet_uri(), [], '1.0');
  wp_enqueue_script('savvy-main', get_template_directory_uri().'/assets/js/main.js', ['jquery'], '1.0', true);
});
?>
