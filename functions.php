<?php

/**
 * Theme functions
 * 
 * @package Naval Architecture
 */


/**
 * @return string handle name for the bootstrap css and js that you can register
 */
function naval_register_bootstrap() {
  $handle_name = 'bootstrap';
  $css_path = '/css/bootstrap.min.css';
  $js_path = '/js/bootstrap.bundle.min.js';
  $bootstrap_path_uri = get_template_directory_uri() . '/assets/src/lib/bootstrap';

  // Register Styles
  wp_register_style(
    $handle_name,
    $bootstrap_path_uri . $css_path,
    [],
    false
  );


  // Register Scripts
  wp_register_script(
    $handle_name,
    $bootstrap_path_uri . $js_path,
    [],
    false,
    true
  );

  return $handle_name;
}

function naval_arch_enqueue_scripts()
{
  // Register Styles
  wp_register_style(
    'main',
    get_stylesheet_uri(),
    [],
    filemtime(get_stylesheet_directory() . '/style.css'),
    'all'
  );

  // Register Scripts
  wp_register_script(
    'main',
    get_template_directory_uri() . '/assets/main.js',
    [],
    filemtime(get_template_directory() . '/assets/main.js'),
    true
  );

  // another way to immediately enqueue
  // wp_enqueue_style('main', get_stylesheet_uri(), [], filemtime(get_stylesheet_directory() . '/style.css'), 'all');
  // wp_enqueue_script(
  //   'main',
  //   get_template_directory_uri() . '/assets/main.js',
  //   [],
  //   filemtime(get_template_directory() . '/assets/main.js'),
  //   true
  // );

  // Register bootstrap
  $bootstrap_handle_name = naval_register_bootstrap();

  wp_enqueue_style($bootstrap_handle_name);
  wp_enqueue_style('main');
  wp_enqueue_script($bootstrap_handle_name);
  wp_enqueue_script('main');
}

add_action('wp_enqueue_scripts', 'naval_arch_enqueue_scripts');
