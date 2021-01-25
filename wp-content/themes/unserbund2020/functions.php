<?php

function unserbund_setup() {

	load_theme_textdomain( 'unserbund', get_template_directory() . '/languages' );
	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
	/*
	 * Switches default core unserbundup for search form, comment form,
	 * and comments to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Navigation Menu', 'unserbund' ) );
	add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'unserbund_setup' );
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function custom_excerpt_length( $length ) {
	return 19;
}

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Twenty Thirteen 1.0
 */
function unserbund_scripts_styles() {
	wp_enqueue_style( 'unserbund-style', get_stylesheet_uri(), array(), date() );
    wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array( 'jquery' ), '2014-04-18', true );
	wp_enqueue_script( 'hoverdirection-script', get_template_directory_uri() . '/bootstrap/js/jquery-hoverdirection.min.js', array( 'jquery' ), '2014-01-18', true );

	wp_enqueue_script( 'unserbund-add-functions', get_template_directory_uri() . '/js/unserbund.js', array( 'jquery' ), '2014-04-18', true );
	wp_enqueue_style( 'bootsrap-style',  get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', array(), '2013-04-18' );
	wp_enqueue_style( 'flaticon-style',  get_template_directory_uri() . '/flat-icon/flaticon.css', array(), '2013-04-18' );
	wp_enqueue_style( 'unserbund-ie', get_template_directory_uri() . '/css/ie.css', array( 'unserbund-style' ), '2013-07-18' );
	wp_style_add_data( 'unserbund-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'unserbund_scripts_styles' );

function unserbund_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'unserbund' ), max( $paged, $page ) );

	return $title;
}

add_filter( 'wp_title', 'unserbund_wp_title', 10, 2 );



if ( ! function_exists( 'unserbund_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since Twenty Thirteen 1.0
 */
function unserbund_paging_nav() {
	global $wp_query;

	// Don't print empty unserbundup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'unserbund' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'unserbund' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'unserbund' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'unserbund_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
*
* @since Twenty Thirteen 1.0
*/
function unserbund_post_nav() {
	global $post;

	// Don't print empty unserbundup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'unserbund' ); ?></h1>
		<div class="nav-links">

			<?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'unserbund' ) ); ?>
			<?php next_post_link( '%link', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'unserbund' ) ); ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'unserbund_entry_meta' ) ) :
/**
 * Print HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own unserbund_entry_meta() to override in a child theme.
 *
 * @since Twenty Thirteen 1.0
 */
function unserbund_entry_meta() {
	if ( is_sticky() && is_home() && ! is_paged() )
		echo '<span class="featured-post">' . __( 'Sticky', 'unserbund' ) . '</span>';

	if ( ! has_post_format( 'link' ) && 'post' == get_post_type() )
		unserbund_entry_date();

	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'unserbund' ) );
	if ( $categories_list ) {
		echo '<span class="categories-links">' . $categories_list . '</span>';
	}

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'unserbund' ) );
	if ( $tag_list ) {
		echo '<span class="tags-links">' . $tag_list . '</span>';
	}

	// Post author
	if ( 'post' == get_post_type() ) {
		printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'unserbund' ), get_the_author() ) ),
			get_the_author()
		);
	}
}
endif;

if ( ! function_exists( 'unserbund_entry_date' ) ) :
/**
 * Print HTML with date information for current post.
 *
 * Create your own unserbund_entry_date() to override in a child theme.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param boolean $echo (optional) Whether to echo the date. Default true.
 * @return string The HTML-formatted post date.
 */
function unserbund_entry_date( $echo = true ) {
	if ( has_post_format( array( 'chat', 'status' ) ) )
		$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'unserbund' );
	else
		$format_prefix = '%2$s';

	$date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookunserbund"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( sprintf( __( 'Permalink to %s', 'unserbund' ), the_title_attribute( 'echo=0' ) ) ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
	);

	if ( $echo )
		echo $date;

	return $date;
}
endif;

if ( ! function_exists( 'unserbund_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @since Twenty Thirteen 1.0
 */
function unserbund_the_attached_image() {
	/**
	 * Filter the image attachment size to use.
	 *
	 * @since Twenty thirteen 1.0
	 *
	 * @param array $size {
	 *     @type int The attachment height in pixels.
	 *     @type int The attachment width in pixels.
	 * }
	 */
	$attachment_size     = apply_filters( 'unserbund_attachment_size', array( 724, 724 ) );
	$next_attachment_url = wp_get_attachment_url();
	$post                = get_post();

	/*
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ),
		the_title_attribute( array( 'echo' => false ) ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

/**
 * Return the post URL.
 *
 * @uses get_url_in_content() to get the URL in the post meta (if it exists) or
 * the first link found in the post content.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return string The Link format URL.
 */
function unserbund_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Active widgets in the sidebar to change the layout and spacing.
 * 3. When avatars are disabled in discussion settings.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function unserbund_body_class( $classes ) {
	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	if ( is_active_sidebar( 'sidebar-2' ) && ! is_attachment() && ! is_404() )
		$classes[] = 'sidebar';

	if ( ! get_option( 'show_avatars' ) )
		$classes[] = 'no-avatars';

	return $classes;
}
add_filter( 'body_class', 'unserbund_body_class' );

/**
 * Adjust content_width value for video post formats and attachment templates.
 *
 * @since Twenty Thirteen 1.0
 */


/**
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function unserbund_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'unserbund_customize_register' );

/**
 * Enqueue Javascript postMessage handlers for the Customizer.
 *
 * Binds JavaScript handlers to make the Customizer preview
 * reload changes asynchronously.
 *
 * @since Twenty Thirteen 1.0
 */
function unserbund_customize_preview_js() {
	wp_enqueue_script( 'unserbund-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20130226', true );
}
add_action( 'customize_preview_init', 'unserbund_customize_preview_js' );

/****************************My Staff************************************/
/* Очищаем wp_head(); */
    function remove_recent_comments_style() {  
      global $wp_widget_factory;  
	  wp_localize_script( 'jquery', 'myajax', array('url' => admin_url('admin-ajax.php')));
      remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );  
    }  
	
    add_action( 'widgets_init', 'remove_recent_comments_style' );  
    remove_action( 'wp_head', 'feed_links_extra', 3 ); 
    remove_action( 'wp_head', 'feed_links', 2 );
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'index_rel_link' );
    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); 
    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
    remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
    remove_action( 'wp_head', 'wp_generator' );

    remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('wp_print_styles', 'print_emoji_styles');

// Подкидываем обходчик меню 
require_once('wp_bootstrap_navwalker.php');
if ( function_exists( 'add_theme_support' ) ) {
     add_theme_support( 'post-thumbnails' );
}
//*******************************Cool Things****************************************/
function champions() {
global $post;
$args = array(
	'numberposts' => -1,
	'post_type' => 'dogs',
	'meta_key' => 'is_champion',
	'meta_value' => '1');
$mydogs = get_posts( $args ) ;	
	if ($mydogs) {
	echo  '<div id="owl-dogs" class="owl-carousel owl-theme container">';
	
	foreach ($mydogs as $post) {
	setup_postdata($post);
	echo  '<div class="item col-xs-12 ">
			<a href="'.get_the_permalink().'" class="noHover">
			<section class="champion wow fadeInDown">
			<header class="title"><h4 class="absPos">'.get_the_title().'
			</h4></header>
			<figure class="champio_ico">';
	the_post_thumbnail('dog-thumb');
	echo '</figure><div class="titules">';
	$tituls=get_field('dog_title');
	echo '<p>'.cogitator($tituls,'</p><p>','').'</p>';
	echo '</div></section></a></div>';
	}
	echo '</div> 
 <div class="customNavigation">
  <a class="flaticon-previous11 noHover" id="prev_dog" ></a>
  <a class="flaticon-next15 noHover" id="next_dog"></a>
</div>';
	}
}

// Loves Cogitator
function cogitator($arr,$simb='',$method='name')
{if ($arr){$output='';foreach ($arr as $object) {$output.=($method!='')?$simb.$object->$method:$simb.$object;}}return $output;}
// Ajax fullshit
add_action('wp_ajax_post_load', 'my_action_callback');
add_action('wp_ajax_nopriv_post_load', 'my_action_callback');

function my_action_callback() {
	global $wpdb;
	global $post;
	$page = intval($_POST['page']);
	$page++;
	$the_query = new WP_Query('paged='.$page);
	if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
	$the_query->the_post();
$type=get_field('new_type');
$headAdd="";
if ($type=='show') {$dogs=get_field('dogs_in_show'); $headAdd="Выставка собак ";$dogCaption="на выставке";} else {$dogs=get_field('dogs_in_new');$headAdd="";$dogCaption="в новости";}
 echo '<article class="wow fadeInLeft rotNew"> 
  <time class="dates_post">
					<strong>';
					the_date('d');
					echo '</strong>
					<span>';
					the_time('M');
					echo '</span>
                    </time>
				<div class="col-md-5 col-sm-5">	<a href="'.get_the_permalink().'" class="noHover" >
 <figure class="newThumb">
	';
 the_post_thumbnail('dog-thumb');
echo '<span class="shader glyphicon glyphicon-zoom-in"></span></figure></a></div><div class="col-md-7 col-sm-7"><h3><a href="'.get_the_permalink().'" class="noHover" >'.$headAdd;	
 the_title();
 echo '</a></h3>';
 echo '<small>';
  the_excerpt();
 echo '</small>
 <b> Собаки '.$dogCaption.': </b>
 <ul>';
 if ($dogs) {
 foreach ($dogs as $object) {echo '<li class="dogLink"><a href="'.$object['dog']->guid.'" class="noHover">'.$object['dog']->post_title.'</a></li>';}}
 //echo cogitator($dogs,'.','post_title');
 echo '</ul></div></article>';
}}
	

	exit; 
} 
// Photo side
function side_photos() {
$attachments = get_posts( array(
    'post_type' => 'attachment',
    'posts_per_page' => 15,
    'post_status' => null,
    'post_mime_type' => 'image'
) );

if ($attachments) {
foreach($attachments as $photo)
{
$icon = wp_get_attachment_image_src( $photo->ID, 'thumbnail');
$fullfoto= wp_get_attachment_image_src( $photo->ID, 'full');
echo '<a href="'.$fullfoto[0].'" class="sidePhoto" data-link="'.get_the_permalink($photo->post_parent).'" rel="lightbox" title="'.get_the_title($photo->post_parent).'"><img src="'.$icon[0].'" title="'.get_the_title($photo->post_parent).'">
<div class="inner"><span class="glyphicon glyphicon-zoom-in"></div></a>';
}
}
}
 
function side_video() {
	global $post;
$dogs_with_video= get_posts( array(
    'post_type' => 'dogs',
    'posts_per_page' => 15,
    'meta_key' => 'video',
	'meta_value'=>'empty',
	'meta_compare'=>'!=',
	'post_status'     => 'publish',
) );

foreach ($dogs_with_video as $post) {
	setup_postdata($post); 
	echo '<a href="'.get_the_permalink().'" class="noHover">
			<section class="videoIco">
			<header class="title"><h4 class="absPos">'.get_the_title().'
			</h4></header>
			<figure class="champio_ico">';
	the_post_thumbnail('dog-thumb');
	echo '</figure>';
	
	echo '</section></a>';
	}

}



