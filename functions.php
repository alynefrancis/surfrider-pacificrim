<?php 

/**************************************
CHILD THEME ENQUEUE STYLES
***************************************/

	add_action( 'wp_enqueue_scripts', 'child_theme_enqueue_styles' );

	if (!function_exists("child_theme_enqueue_styles")) { function child_theme_enqueue_styles() {	
		wp_enqueue_style( 'surfrider-chapter-parent-style', get_template_directory_uri() . '/style.css' );
	}}



	// new image sizes

		add_image_size( 'crew-member', 500, 320	, array( 'center', 'center' ) );
		add_image_size( 'gallery-image', 400, 300	, array( 'center', 'center' ) );

	/**
	 * Filter the except length to 20 words.
	 *
	 * @param int $length Excerpt length.
	 * @return int (Maybe) modified excerpt length.
	 */
	function wpdocs_custom_excerpt_length( $length ) {
	    return 40;
	}
	add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

 

/**************************************
ADD SITE SCRIPTS
***************************************/


/* When running localhost for theme development the license for fonts does not work. 
The following fonts are a close proximity to those used under the surfrider domain. 
Don't forget to comment out when deploying to Chapter domain */

// function extra_theme_styles() {

// 		wp_enqueue_style( 
// 		'googlefont_sixcaps', 'https://fonts.googleapis.com/css?family=Six+Caps'
// 		);

// 		wp_enqueue_style( 
// 		'googlefonts_sourcesans', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700' 
// 		);	

// 	wp_enqueue_style( 
// 		'googlefonts_oswald', 'https://fonts.googleapis.com/css?family=Oswald:300,700' 
// 		);	

// 	wp_enqueue_style( 
// 		'googlefonts_montserrat', 'https://fonts.googleapis.com/css?family=Montserrat' 
// 		);	
// }
// add_action('wp_enqueue_scripts', 'extra_theme_styles');



/**************************************
ADD CUSTOM POST TYPES TO USE CATAGORY.PHP
***************************************/


function add_custom_types_to_tax( $query ) {
if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {

// Get all your post types
$post_types = get_post_types();

$query->set( 'post_type', $post_types );
return $query;
}
}
add_filter( 'pre_get_posts', 'add_custom_types_to_tax' );


/*********************
  CUSTOM PAGINATION
*********************/

function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  /**
   * This first part of function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   * 
   * We can now override default pagination
   * in our theme, and use this function in default queries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /** 
   * Pagination arguments for paginate_links function. 
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('&laquo;'),
    'next_text'       => __('&raquo;'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='custom-pagination'>";
      echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span> ";
      echo $paginate_links;
    echo "</nav>";
  }

}