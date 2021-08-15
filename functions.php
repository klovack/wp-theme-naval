<?php

/**
 * Theme functions
 * 
 * @package Naval Architecture
 */

function naval_arch_enqueue_scripts()
{
  wp_register_style(
    'main',
    get_stylesheet_uri(),
    [],
    filemtime(get_stylesheet_directory() . '/style.css'),
    'all'
  );
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

  wp_enqueue_style('main');
  wp_enqueue_script('main');
}

add_action('wp_enqueue_scripts', 'naval_arch_enqueue_scripts');
