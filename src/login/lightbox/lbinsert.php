<?php

/*

Plugin Name: Lightbox Inserter
Version: 1.0
Author URI: http://www.mikoder.com.au/
Plugin URI: http://www.mikoder.com.au/
Description:  Installs the Lightbox JS library on a per-needs basis
Author: Michael Little, Mikoder


This plug-in will cause the lightbox JS library to be uenqueued when the current (single) post or page
contains a lightbox reference

*/

$needlightbox = false;
$lightboxpath = '';

function lb_insertlightbox() {
  global $post, $needlightbox, $lightboxpath;
  $needlightbox = ($needlightbox || ((is_single() || is_page()) && (strpos($post->post_content, 'rel="lightbox') > 1)));
  if ($needlightbox) {
    $lightboxpath = get_bloginfo('wpurl').'/'.PLUGINDIR.'/lightbox/';
 	wp_enqueue_script('prototype');
	wp_enqueue_script('scriptaculous-effects');
	wp_enqueue_script('scriptaculous-builder');
	wp_enqueue_script('lightbox', $lightboxpath.'lightbox.js');
  }
}

//add_action('get_header', 'lb_insertlightbox' );


function lb_insertlightboxcss() {
  global $needlightbox, $lightboxpath;
  if ($needlightbox)
   echo '<link rel="stylesheet" href="'.$lightboxpath.'lightbox.css" type="text/css" media="screen" />'."\n";
}

//add_action('wp_head', 'lb_insertlightboxcss' );

?>