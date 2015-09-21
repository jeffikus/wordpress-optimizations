<?php
function get_posts_categories_optimized( $number_posts = 1000, $category_terms = array() ) {
   $post_id_array = get_posts(array(
      'numberposts'   => $number_posts,
      'tax_query'     => array(
          array(
              'taxonomy'  => 'category',
              'field'     => 'id',
              'terms'     => $category_terms
          ),
      ),
      'fields'        => 'ids', // Only get post IDs
      'no_found_rows' => true, // Only use when pagination is not needed
      'update_post_meta_cache' => false, // Only use when post meta will not be utilized
   ));
   $post_cats = wp_get_object_terms( $post_id_array, 'category' );
   return $post_cats;
} // End get_posts_categories_optimized()
?>