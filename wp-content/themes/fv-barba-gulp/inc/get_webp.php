<?php
function get_webp($image_path) {
  $start = strpos($image_path, 'wp-content/uploads');
  $file_path = str_replace('wp-content/uploads/', $_SERVER['DOCUMENT_ROOT'].'/wp-content/uploads-webpc/uploads/', substr($image_path, $start)).'.webp';
  if(file_exists($file_path)) {
    return $webp_path =  str_replace('wp-content/uploads/', 'wp-content/uploads-webpc/uploads/', $image_path).'.webp';
  } else {
    return $image_path;
  } 
}