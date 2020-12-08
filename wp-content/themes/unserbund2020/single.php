<?php
 $post = $wp_query->post;
 if ($post->post_type=="dogs") {
      include(TEMPLATEPATH.'/dogs.php');
  } 
  else {
      include(TEMPLATEPATH.'/single_post.php');
  }
  ?>