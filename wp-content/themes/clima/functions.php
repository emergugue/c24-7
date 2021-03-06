<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images, 
sidebars, comments, ect.
*/

// Get Bones Core Up & Running!
require_once('library/bones.php');            // core functions (don't remove)
require_once('library/plugins.php');          // plugins & extra functions (optional)
// Options panel
require_once('library/options-panel.php');
// Shortcodes
require_once('library/shortcodes.php');

// Admin Functions (commented out by default)
// require_once('library/admin.php');         // custom admin functions

// Custom Backend Footer
add_filter('admin_footer_text', 'bones_custom_admin_footer');
date_default_timezone_set('America/Bogota');
setlocale(LC_ALL, 'es_ES.UTF-8');

function bones_custom_admin_footer() {
	echo '<span id="footer-thankyou">Developed by <a href="http://320press.com" target="_blank">320press</a></span>. Built using <a href="http://themble.com/bones" target="_blank">Bones</a>.';
}

// adding it to the admin area
add_filter('admin_footer_text', 'bones_custom_admin_footer');

// Set content width
if ( ! isset( $content_width ) ) $content_width = 580;


/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @param string $title Default title text for current view.
 * @param string $sep   Optional separator.
 *
 * @return string Filtered title.
 *
 * @note may be called from http://example.com/wp-activate.php?key=xxx where the plugins are not loaded.
 */
function bones_filter_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'bonestheme' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'bones_filter_title', 10, 2 );


/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'wpbs-featured', 721, 300, true );
add_image_size( 'wpbs-featured-home', 970, 311, true);
add_image_size( 'wpbs-featured-carousel', 970, 400, true);

/* 
to add more sizes, simply copy a line from above 
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image, 
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

/************* ACTIVE SIDEBARS ********************/

// Registrando posición para el widget en la página principal
if ( function_exists('register_sidebar') )
 register_sidebar(array(
  'name'=>'Widget Home',
  'id'=>'home_widget',
  'before_widget' => '<div class="widget-home">',
  'after_widget' => '</div>',
  'before_title' => '<h3 class="widgettitle">',
  'after_title' => '</h3>',
  ));

// Registrando posición para el widget de pronosticos
if ( function_exists('register_sidebar') )
 register_sidebar(array(
  'name'=>'Widget Pronostico',
  'id'=>'pronostico-widget',
  'before_widget' => '<div class="widget-pronostico">',
  'after_widget' => '</div>',
  'before_title' => '<h3 class="widgettitle">',
  'after_title' => '</h3>',
  ));


// Registrando posición para el widget de la última emisión
if ( function_exists('register_sidebar') )
 register_sidebar(array(
  'name'=>'Widget Última Emisión',
  'id'=>'ultimaemision_widget',
  'before_widget' => '<div class="contenedor-ultima-emision">',
  'after_widget' => '</div>',
  'before_title' => '<h3 class="titulo-widget-ultima-emision">',
  'after_title' => '</h3>',
  ));  


// Registrando posición para el widget en la página principal
if ( function_exists('register_sidebar') )
 register_sidebar(array(
  'name'=>'Widget Home Gallery',
  'id'=>'home_gallery',
  'before_widget' => '',
  'after_widget' => '',
  'before_title' => '',
  'after_title' => '',
  ));


// Registrando posición para el widget de las fotos de usuario en el home
if ( function_exists('register_sidebar') )
 register_sidebar(array(
  'name'=>'Widget Gallery',
  'id'=>'widget_gallery',
  'before_widget' => '<div class="widget-home-gallery hidden-phone">',
  'after_widget' => '</div>',
  'before_title' => '<h3 class="widgettitle">',
  'after_title' => '</h3>',
  ));


  // Registrando posición para el widget de las fotos de usuario en el home
if ( function_exists('register_sidebar') )
 register_sidebar(array(
  'name'=>'Widget suscripcion',
  'id'=>'suscrib',
  'before_widget' => '',
  'after_widget' => '',
  'before_title' => '',
  'after_title' => '',
  ));  

    // Registrando posición para el widget de las fotos de usuario en el home
if ( function_exists('register_sidebar') )
 register_sidebar(array(
  'name'=>'Widget Mix Galeria',
  'id'=>'mix-galeria',
  'before_widget' => '<div id="mostviewpostwidget-2" class="sidebar1 widget widget_mostviewpostwidget hidden-phone">',
  'after_widget' => '</div>',
  'before_title' => '<h3 class="widgettitle">',
  'after_title' => '</h3>',
  ));          


// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
  register_sidebar(array(
   'id' => 'sidebar1',
   'name' => 'Main Sidebar',
   'description' => 'Used on every page BUT the homepage page template.',
   'before_widget' => '<div id="%1$s" class="widget %2$s">',
   'after_widget' => '</div>',
   'before_title' => '<h4 class="widgettitle">',
   'after_title' => '</h4>',
   ));
  
  register_sidebar(array(
   'id' => 'sidebar2',
   'name' => 'Homepage Sidebar',
   'description' => 'Used only on the homepage page template.',
   'before_widget' => '<div id="%1$s" class="widget %2$s">',
   'after_widget' => '</div>',
   'before_title' => '<h4 class="widgettitle">',
   'after_title' => '</h4>',
   ));
  
     // Registrando posición para el widget de las fotos de usuario en el home
  if ( function_exists('register_sidebar') )
   register_sidebar(array(
    'name'=>'sliderbar derecha',
    'id'=>'slidebar_derecha',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '',
    'after_title' => '',
    )); 

  register_sidebar(array(
  'id' => 'socialwidget',
  'name' => 'social buttons',
  'before_widget' => '<div id="%1$s">',
  'after_widget' => '</div>',
  'before_title' => '',
  'after_title' => '',
  ));
 
 register_sidebar(array(
  'id' => 'footer1',
  'name' => 'Footer 1',
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget' => '</div>',
  'before_title' => '<h4 class="widgettitle">',
  'after_title' => '</h4>',
  ));

 register_sidebar(array(
  'id' => 'footer2',
  'name' => 'Footer 2',
  'before_widget' => '<div id="%1$s" class="widget span4 %2$s">',
  'after_widget' => '</div>',
  'before_title' => '<h4 class="widgettitle">',
  'after_title' => '</h4>',
  ));

 register_sidebar(array(
  'id' => 'footer3',
  'name' => 'Footer 3',
  'before_widget' => '<div id="%1$s" class="widget span4 %2$s">',
  'after_widget' => '</div>',
  'before_title' => '<h4 class="widgettitle">',
  'after_title' => '</h4>',
  ));
 
 
    /* 
    to add more sidebars or widgetized areas, just copy
    and edit the above sidebar code. In order to call 
    your new sidebar just use the following code:
    
    Just change the name to whatever your new
    sidebar's id is, for example:
    
    To call the sidebar in your template, you can just copy
    the sidebar.php file and rename it to your sidebar's name.
    So using the above example, it would be:
    sidebar-sidebar2.php
    
    */
} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments($comment, $args, $depth) {
 $GLOBALS['comment'] = $comment; ?>
 <li <?php comment_class(); ?>>
  <article id="comment-<?php comment_ID(); ?>" class="clearfix">
   <div class="comment-author vcard row-fluid clearfix">
    <div class="avatar span3">
     <?php echo get_avatar( $comment, $size='75' ); ?>
   </div>
   <div class="span9 comment-text">
     <?php printf('<h4>%s</h4>', get_comment_author_link()) ?>
     <?php edit_comment_link(__('Edit','bonestheme'),'<span class="edit-comment btn btn-small btn-info"><i class="icon-white icon-pencil"></i>','</span>') ?>
     
     <?php if ($comment->comment_approved == '0') : ?>
     <div class="alert-message success">
      <p><?php _e('Your comment is awaiting moderation.','bonestheme') ?></p>
    </div>
  <?php endif; ?>
  
  <?php comment_text() ?>
  
  <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time('F jS, Y'); ?> </a></time>
  
  <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
</div>
</div>
</article>
<!-- </li> is added by wordpress automatically -->
<?php
} // don't remove this bracket!

// Display trackbacks/pings callback function
function list_pings($comment, $args, $depth) {
 $GLOBALS['comment'] = $comment;
 ?>
 <li id="comment-<?php comment_ID(); ?>"><i class="icon icon-share-alt"></i>&nbsp;<?php comment_author_link(); ?>
  <?php 

}

// Only display comments in comment count (which isn't currently displayed in wp-bootstrap, but i'm putting this in now so i don't forget to later)
add_filter('get_comments_number', 'comment_count', 0);
function comment_count( $count ) {
	if ( ! is_admin() ) {
		global $id;
   $comments_by_type = separate_comments(get_comments('status=approve&post_id=' . $id));
   return count($comments_by_type['comment']);
 } else {
   return $count;
 }
}

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function bones_wpsearch( $form ) {
  $form = '<form role="search" method="get" class="form-search" action="' . home_url( '/' ) . '" >'
  //<label class="screen-reader-text" for="s">' . __('Search for:', 'bonestheme') . '</label>
 .'<input type="text" class="input-small search-query"  value="' . get_search_query() . '" name="s" id="s" placeholder="Buscar en clima24/7" />
  <input type="submit" class="btn-search" id="searchsubmit" value="" />
  </form>';
  return $form;
} // don't remove this bracket!

/****************** password protected post form *****/

add_filter( 'the_password_form', 'custom_password_form' );

function custom_password_form() {
	global $post;
	$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	$o = '<div class="clearfix"><form class="protected-post-form" action="' . get_option('siteurl') . '/wp-login.php?action=postpass" method="post">
	' . '<p>' . __( "This post is password protected. To view it please enter your password below:" ,'bonestheme') . '</p>' . '
	<label for="' . $label . '">' . __( "Password:" ,'bonestheme') . ' </label><div class="input-append"><input name="post_password" id="' . $label . '" type="password" size="20" /><input type="submit" name="Submit" class="btn btn-primary" value="' . esc_attr__( "Submit",'bonestheme' ) . '" /></div>
	</form></div>
	';
	return $o;
}

/*********** update standard wp tag cloud widget so it looks better ************/

add_filter( 'widget_tag_cloud_args', 'my_widget_tag_cloud_args' );

function my_widget_tag_cloud_args( $args ) {
	$args['number'] = 20; // show less tags
	$args['largest'] = 9.75; // make largest and smallest the same - i don't like the varying font-size look
	$args['smallest'] = 9.75;
	$args['unit'] = 'px';
	return $args;
}

// filter tag cloud output so that it can be styled by CSS
function add_tag_class( $taglinks ) {
  $tags = explode('</a>', $taglinks);
  $regex = "#(.*tag-link[-])(.*)(' title.*)#e";
  $term_slug = "(get_tag($2) ? get_tag($2)->slug : get_category($2)->slug)";

  foreach( $tags as $tag ) {
   $tagn[] = preg_replace($regex, "('$1$2 label tag-'.$term_slug.'$3')", $tag );
 }

 $taglinks = implode('</a>', $tagn);

 return $taglinks;
}

add_action( 'wp_tag_cloud', 'add_tag_class' );

add_filter( 'wp_tag_cloud','wp_tag_cloud_filter', 10, 2) ;

function wp_tag_cloud_filter( $return, $args )
{
  return '<div id="tag-cloud">' . $return . '</div>';
}

// Enable shortcodes in widgets
add_filter( 'widget_text', 'do_shortcode' );

// Disable jump in 'read more' link
function remove_more_jump_link( $link ) {
	$offset = strpos($link, '#more-');
	if ( $offset ) {
		$end = strpos( $link, '"',$offset );
	}
	if ( $end ) {
		$link = substr_replace( $link, '', $offset, $end-$offset );
	}
	return $link;
}
add_filter( 'the_content_more_link', 'remove_more_jump_link' );

// Remove height/width attributes on images so they can be responsive
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

function remove_thumbnail_dimensions( $html ) {
  $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
  return $html;
}

// Add the Meta Box to the homepage template
function add_homepage_meta_box() {  
	global $post;

	// Only add homepage meta box if template being used is the homepage template
	// $post_id = isset($_GET['post']) ? $_GET['post'] : (isset($_POST['post_ID']) ? $_POST['post_ID'] : "");
	$post_id = $post->ID;
	$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);

	if ( $template_file == 'page-homepage.php' ){
   add_meta_box(  
	        'homepage_meta_box', // $id  
	        'Optional Homepage Tagline', // $title  
	        'show_homepage_meta_box', // $callback  
	        'page', // $page  
	        'normal', // $context  
	        'high'); // $priority  
 }
}

add_action( 'add_meta_boxes', 'add_homepage_meta_box' );

// Field Array  
$prefix = 'custom_';  
$custom_meta_fields = array(  
  array(  
    'label'=> 'Homepage tagline area',  
    'desc'  => 'Displayed underneath page title. Only used on homepage template. HTML can be used.',  
    'id'    => $prefix.'tagline',  
    'type'  => 'textarea' 
    )  
  );  

// The Homepage Meta Box Callback  
function show_homepage_meta_box() {  
  global $custom_meta_fields, $post;

  // Use nonce for verification
  wp_nonce_field( basename( __FILE__ ), 'wpbs_nonce' );
  
  // Begin the field table and loop
  echo '<table class="form-table">';

  foreach ( $custom_meta_fields as $field ) {
      // get value of this field if it exists for this post  
    $meta = get_post_meta($post->ID, $field['id'], true);  
      // begin a table row with  
    echo '<tr> 
    <th><label for="'.$field['id'].'">'.$field['label'].'</label></th> 
    <td>';  
    switch($field['type']) {  
                  // text  
      case 'text':  
      echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="60" /> 
      <br /><span class="description">'.$field['desc'].'</span>';  
      break;
      
                  // textarea  
      case 'textarea':  
      echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="80" rows="4">'.$meta.'</textarea> 
      <br /><span class="description">'.$field['desc'].'</span>';  
      break;  
              } //end switch  
              echo '</td></tr>';  
  } // end foreach  
  echo '</table>'; // end table  
}  

// Save the Data  
function save_homepage_meta( $post_id ) {  

  global $custom_meta_fields;  
  
    // verify nonce  
  if ( !isset( $_POST['wpbs_nonce'] ) || !wp_verify_nonce($_POST['wpbs_nonce'], basename(__FILE__)) )  
    return $post_id;

    // check autosave
  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
    return $post_id;

    // check permissions
  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
      return $post_id;
  } elseif ( !current_user_can( 'edit_post', $post_id ) ) {
    return $post_id;
  }
  
    // loop through fields and save the data  
  foreach ( $custom_meta_fields as $field ) {
    $old = get_post_meta( $post_id, $field['id'], true );
    $new = $_POST[$field['id']];

    if ($new && $new != $old) {
      update_post_meta( $post_id, $field['id'], $new );
    } elseif ( '' == $new && $old ) {
      delete_post_meta( $post_id, $field['id'], $old );
    }
    } // end foreach
  }
  add_action( 'save_post', 'save_homepage_meta' );

// Add thumbnail class to thumbnail links
  function add_class_attachment_link( $html ) {
    $postid = get_the_ID();
    $html = str_replace( '<a','<a class="thumbnail"',$html );
    return $html;
  }
  add_filter( 'wp_get_attachment_link', 'add_class_attachment_link', 10, 1 );

// Add lead class to first paragraph
  function first_paragraph( $content ){
    global $post;

    // if we're on the homepage, don't add the lead class to the first paragraph of text
    if( is_page_template( 'page-homepage.php' ) )
      return $content;
    else
      return preg_replace('/<p([^>]+)?>/', '<p$1 class="lead">', $content, 1);
  }
  add_filter( 'the_content', 'first_paragraph' );

// Menu output mods
/**
 * Class Name: wp_bootstrap_navwalker
 * GitHub URI: https://github.com/twittem/wp-bootstrap-navwalker
 * Description: A custom WordPress nav walker class to implement the Twitter Bootstrap 2.3.2 navigation style in a custom theme using the WordPress built in menu manager.
 * Version: 1.4.4
 * Author: Edward McIntyre - @twittem
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

class Bootstrap_Walker extends Walker_Nav_Menu {
  
  /**
   * @see Walker::start_lvl()
   * @since 3.0.0
   *
   * @param string $output Passed by reference. Used to append additional content.
   * @param int $depth Depth of page. Used for padding.
   */
  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\" dropdown-menu\">\n";
  }

  /**
   * @see Walker::start_el()
   * @since 3.0.0
   *
   * @param string $output Passed by reference. Used to append additional content.
   * @param object $item Menu item data object.
   * @param int $depth Depth of menu item. Used for padding.
   * @param int $current_page Menu item ID.
   * @param object $args
   */

  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

    /**
     * Dividers & Headers
       * ==================
     * Determine whether the item is a Divider, Header, or regular menu item.
     * To prevent errors we use the strcasecmp() function to so a comparison
     * that is not case sensitive. The strcasecmp() function returns a 0 if 
     * the strings are equal.
     */
    if (strcasecmp($item->title, 'divider') == 0) {
      // Item is a Divider
      $output .= $indent . '<li class="divider">';
    } else if (strcasecmp($item->title, 'divider-vertical') == 0) {
      // Item is a Vertical Divider
      $output .= $indent . '<li class="divider-vertical">';
    } else if (strcasecmp($item->title, 'nav-header') == 0) {
      // Item is a Header
      $output .= $indent . '<li class="nav-header">' . esc_attr( $item->attr_title );
    } else {

      $class_names = $value = '';

      $classes = empty( $item->classes ) ? array() : (array) $item->classes;
      $classes[] = 'menu-item-' . $item->ID;

      $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
      
      //If item has_children add dropdown class to li
      if($args->has_children) {
        $class_names .= ' dropdown';
      }

      $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

      $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
      $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

      $output .= $indent . '<li' . $id . $value . $class_names .'>';

      $atts = array();
      $atts['title']  = ! empty( $item->title )      ? $item->title      : '';
      $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
      $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';

      //If item has_children add atts to a
      if($args->has_children) {
        $atts['href']       = '#';
        $atts['class']      = 'dropdown-toggle';
      } else {
        $atts['href'] = ! empty( $item->url ) ? $item->url : '';
      }

      $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

      $attributes = '';
      foreach ( $atts as $attr => $value ) {
        if ( ! empty( $value ) ) {
          $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
          $attributes .= ' ' . $attr . '="' . $value . '"';
        }
      }

      $item_output = $args->before;
    
      /*
       * Glyphicons
       * ===========
       * Since the the menu item is NOT a Divider or Header we check the see
       * if there is a value in the attr_title property. If the attr_title
       * property is NOT null we apply it as the class name for the glyphicon.
       */

      if(! empty( $item->attr_title )){
        $item_output .= '<a'. $attributes .'><i class="' . esc_attr( $item->attr_title ) . '"></i>&nbsp;';
      } else {
        $item_output .= '<a'. $attributes .'>';
      }
      
      $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
      $item_output .= ($args->has_children) ? ' <span class="caret"></span></a>' : '</a>';
      $item_output .= $args->after;

      $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
  }

  /**
   * Traverse elements to create list from elements.
   *
   * Display one element if the element doesn't have any children otherwise,
   * display the element and its children. Will only traverse up to the max
   * depth and no ignore elements under that depth. 
   *
   * This method shouldn't be called directly, use the walk() method instead.
   *
   * @see Walker::start_el()
   * @since 2.5.0
   *
   * @param object $element Data object
   * @param array $children_elements List of elements to continue traversing.
   * @param int $max_depth Max depth to traverse.
   * @param int $depth Depth of current element.
   * @param array $args
   * @param string $output Passed by reference. Used to append additional content.
   * @return null Null on failure with no changes to parameters.
   */

  function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( !$element ) {
            return;
        }

        $id_field = $this->db_fields['id'];

        //display this element
        if ( is_object( $args[0] ) ) {
           $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
        }

        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
} 
      add_editor_style('editor-style.css');

// Add Twitter Bootstrap's standard 'active' class name to the active nav link item
      add_filter('nav_menu_css_class', 'add_active_class', 10, 2 );

      function add_active_class($classes, $item) {
       if( $item->menu_item_parent == 0 && in_array('current-menu-item', $classes) ) {
        $classes[] = "active";
      }
      
      return $classes;
    }

// enqueue styles
    if( !function_exists("theme_styles") ) {  
      function theme_styles() { 
        // This is the compiled css file from LESS - this means you compile the LESS file locally and put it in the appropriate directory if you want to make any changes to the master bootstrap.css.
        wp_register_style( 'bootstrap', get_template_directory_uri() . '/library/css/bootstrap.css', array(), '1.0', 'all' );
        wp_register_style( 'bootstrap-responsive', get_template_directory_uri() . '/library/css/responsive.css', array(), '1.0', 'all' );
        wp_register_style( 'wp-bootstrap', get_stylesheet_uri(), array(), '1.0', 'all' );
        
        wp_enqueue_style( 'bootstrap' );
        wp_enqueue_style( 'bootstrap-responsive' );
        wp_enqueue_style( 'wp-bootstrap');
      }
    }
    add_action( 'wp_enqueue_scripts', 'theme_styles' );

// enqueue javascript
    if( !function_exists( "theme_js" ) ) {  
      function theme_js(){
        
        wp_register_script('bootstrap', get_template_directory_uri() . '/library/js/bootstrap.min.js', array('jquery'), '1.2' );
        wp_register_script('wpbs-scripts',get_template_directory_uri() . '/library/js/scripts.js', array('jquery'),'1.2' );
        wp_register_script('modernizr',get_template_directory_uri() . '/library/js/modernizr.full.min.js',array('jquery'),'1.2' );

    // JQUERY UI
        wp_register_script('jquery_ui_core', '/wp-includes/js/jquery/ui/jquery.ui.core.min.js', array('jquery'), '1.2' );
        wp_register_script('jquery_ui','/wp-includes/js/jquery/ui/jquery.ui.datepicker.min.js', array('jquery'),'1.2' );
    
        wp_register_style('css_query_ui', '/wp-content/themes/clima/library/css/jquery-ui.min.css', '1.2' );
        //wp_register_style('css_query_ui_core', '/wp-content/themes/clima/library/css/jquery.ui.core.min.css', '1.2' );
        wp_register_style('css_query_ui_datepicker', '/wp-content/themes/clima/library/css/jquery.ui.datepicker.min.css', '1.2' );

    // fancyBox 

        wp_register_script('jquery_mousewheel', '/wp-includes/js/fancyBox/lib/jquery.mousewheel-3.0.6.pack.js', array('jquery'), '1.2' );
        wp_register_script('fancybox', '/wp-includes/js/fancyBox/source/jquery.fancybox.pack.js', array('jquery'), '2.1.5' );
      //  wp_register_script('fancybox_buttons', '/wp-includes/js/fancyBox/source/helpers/jquery.fancybox-buttons.js', array('jquery'), '1.0.5' );
      //  wp_register_script('fancybox_pack', '/wp-includes/js/fancyBox/source/jquery.fancybox.pack.js', array('jquery'), '2.1.5' );
       // wp_register_script('fancybox_media', '/wp-includes/js/fancyBox/source/helpers/jquery.fancybox-media.js', array('jquery'), '1.0.6' );

        wp_register_style('css_fancybox', '/wp-includes/js/fancyBox/source/jquery.fancybox.css', '2.1.5' );
      //  wp_register_style('css_fancybox_buttons', '/wp-includes/js/fancyBox/source/helpers/jquery.fancybox-buttons.css', '1.0.5' );
        wp_register_style('css_fancybox_thumbs', '/wp-includes/js/fancyBox/source/helpers/jquery.fancybox-thumbs.js', '1.0.7' );

    //default
        wp_enqueue_script('bootstrap');
        wp_enqueue_script('wpbs-scripts');
        wp_enqueue_script('modernizr');


  //wp_enqueue_style( 'style-name', get_stylesheet_uri() );
        wp_enqueue_script('jquery_ui');
        wp_enqueue_script('jquery_ui_core');
        wp_enqueue_style('css_query_ui');
        //wp_enqueue_style('css_query_ui_core');
        wp_enqueue_style('css_query_ui_datepicker');

   // jquery fancyBox
        wp_enqueue_script('jquery_mousewheel');
        wp_enqueue_script('fancybox');
      //  wp_enqueue_script('fancybox_buttons');
        //wp_enqueue_script('fancybox_pack');
        wp_enqueue_script('fancybox_media');

        wp_enqueue_style('css_fancybox');
       // wp_enqueue_style('css_fancybox_buttons');
        wp_enqueue_style('css_fancybox_thumbs');

        
      }
    }
    add_action( 'wp_enqueue_scripts', 'theme_js' );

// Get theme options
    function get_wpbs_theme_options(){
      $theme_options_styles = '';
      
      $heading_typography = of_get_option( 'heading_typography' );
      if ( $heading_typography['face'] != 'Default' ) {
        $theme_options_styles .= '
        h1, h2, h3, h4, h5, h6{ 
          font-family: ' . $heading_typography['face'] . '; 
          font-weight: ' . $heading_typography['style'] . '; 
          color: ' . $heading_typography['color'] . '; 
        }';
      }
      
      $main_body_typography = of_get_option( 'main_body_typography' );
      if ( $main_body_typography['face'] != 'Default' ) {
        $theme_options_styles .= '
        body{ 
          font-family: ' . $main_body_typography['face'] . '; 
          font-weight: ' . $main_body_typography['style'] . '; 
          color: ' . $main_body_typography['color'] . '; 
        }';
      }
      
      $link_color = of_get_option( 'link_color' );
      if ($link_color) {
        $theme_options_styles .= '
        a{ 
          color: ' . $link_color . '; 
        }';
      }
      
      $link_hover_color = of_get_option( 'link_hover_color' );
      if ($link_hover_color) {
        $theme_options_styles .= '
        a:hover{ 
          color: ' . $link_hover_color . '; 
        }';
      }
      
      $link_active_color = of_get_option( 'link_active_color' );
      if ($link_active_color) {
        $theme_options_styles .= '
        a:active{ 
          color: ' . $link_active_color . '; 
        }';
      }
      
      $topbar_position = of_get_option( 'nav_position' );
      if ($topbar_position == 'scroll') {
        $theme_options_styles .= '
        .navbar{ 
          position: static; 
        }
        body{
          padding-top: 0;
        }
        #content {
        padding-top: 27px;
      }
      ' 
      ;
    }
    
    $topbar_bg_color = of_get_option( 'top_nav_bg_color' );
    $use_gradient = of_get_option( 'showhidden_gradient' );

    if ( $topbar_bg_color && !$use_gradient ) {
      $theme_options_styles .= '
      .navbar-inner, .navbar .fill { 
        background-color: '. $topbar_bg_color . ';
        background-image: none;
      }' . $topbar_bg_color;
    }
    
    if ( $use_gradient ) {
      $topbar_bottom_gradient_color = of_get_option( 'top_nav_bottom_gradient_color' );
      
      $theme_options_styles .= '
      .navbar-inner, .navbar .fill {
        background-image: -khtml-gradient(linear, left top, left bottom, from(' . $topbar_bg_color . '), to('. $topbar_bottom_gradient_color . '));
        background-image: -moz-linear-gradient(top, ' . $topbar_bg_color . ', '. $topbar_bottom_gradient_color . ');
        background-image: -ms-linear-gradient(top, ' . $topbar_bg_color . ', '. $topbar_bottom_gradient_color . ');
        background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, ' . $topbar_bg_color . '), color-stop(100%, '. $topbar_bottom_gradient_color . '));
        background-image: -webkit-linear-gradient(top, ' . $topbar_bg_color . ', '. $topbar_bottom_gradient_color . '2);
        background-image: -o-linear-gradient(top, ' . $topbar_bg_color . ', '. $topbar_bottom_gradient_color . ');
        background-image: linear-gradient(top, ' . $topbar_bg_color . ', '. $topbar_bottom_gradient_color . ');
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=\'' . $topbar_bg_color . '\', endColorstr=\''. $topbar_bottom_gradient_color . '2\', GradientType=0);
      }';
    }
    else{
    } 
    
    $topbar_link_color = of_get_option( 'top_nav_link_color' );
    if ( $topbar_link_color ) {
      $theme_options_styles .= '
      .navbar .nav li a { 
        color: '. $topbar_link_color . ';
      }';
    }
    
    $topbar_link_hover_color = of_get_option( 'top_nav_link_hover_color' );
    if ( $topbar_link_hover_color ) {
      $theme_options_styles .= '
      .navbar .nav li a:hover { 
        color: '. $topbar_link_hover_color . ';
      }';
    }
    
    $topbar_dropdown_hover_bg_color = of_get_option( 'top_nav_dropdown_hover_bg' );
    if ( $topbar_dropdown_hover_bg_color ) {
      $theme_options_styles .= '
      .dropdown-menu li > a:hover, .dropdown-menu .active > a, .dropdown-menu .active > a:hover {
        background-color: ' . $topbar_dropdown_hover_bg_color . ';
      }
      ';
    }
    
    $topbar_dropdown_item_color = of_get_option( 'top_nav_dropdown_item' );
    if ( $topbar_dropdown_item_color ){
      $theme_options_styles .= '
      .dropdown-menu a{
        color: ' . $topbar_dropdown_item_color . ' !important;
      }
      ';
    }
    
    $hero_unit_bg_color = of_get_option( 'hero_unit_bg_color' );
    if ( $hero_unit_bg_color ) {
      $theme_options_styles .= '
      .hero-unit { 
        background-color: '. $hero_unit_bg_color . ';
      }';
    }
    
    $suppress_comments_message = of_get_option( 'suppress_comments_message' );
    if ( $suppress_comments_message ){
      $theme_options_styles .= '
        #main article {
      border-bottom: none;
    }';
  }
  
  $additional_css = of_get_option( 'wpbs_css' );
  if( $additional_css ){
    $theme_options_styles .= $additional_css;
  }
  
  if( $theme_options_styles ){
    echo '<style>' 
    . $theme_options_styles . '
    </style>';
  }
  
  $bootstrap_theme = of_get_option( 'wpbs_theme' );
  $use_theme = of_get_option( 'showhidden_themes' );
  
  if( $bootstrap_theme && $use_theme ){
    if( $bootstrap_theme == 'default' ){}
      else {
        echo '<link rel="stylesheet" href="' . get_template_directory_uri() . '/admin/themes/' . $bootstrap_theme . '.css">';
      }
    }
} // end get_wpbs_theme_options function

// Añadimos la acción para crear widgets desde el template
function creaWidgets()
{
 register_widget( 'WidgetPronosticoHome' );
 register_widget( 'WidgetPronostico');
 register_widget( 'WidgetUltimaEmision' );
 register_widget( 'widgetGaleria' );
 register_widget( 'widgetGaleriaHome' );
 register_widget( 'widgetMinUltimaEmision' );
 register_widget( 'widgetUltimosArticulos' );
 register_widget( 'widgetSocialButtons' );
}

add_action( 'widgets_init', 'creaWidgets' );



function loadBlogs()
{

  $paged   = ( isset($_GET['paged']) ) ? $_GET['paged'] : 1;
  $content = "";
  $i = 0;
  $args = array('cat'=>'2', 'paged'=> $paged );
  $the_query = new WP_Query($args); 

  if ($the_query->have_posts())
  {
    while ($the_query->have_posts()) : $the_query->the_post(); 
    $categoria    = get_the_category();
    $categoria    = ( !empty($categoria[1]->name) ) ? $categoria[1]->name : $categoria[0]->name ; 
    $post_thumbnail_id   = get_post_thumbnail_id(get_the_ID(), 'full');
    $post_thumbnail_url  = (!empty($post_thumbnail_id)) ? wp_get_attachment_url( $post_thumbnail_id ) : get_template_directory_uri().'/images/dummie-galeria.png';
    $contenido      = get_the_content();
    $contenido      = substr(wp_filter_nohtml_kses( $contenido ), 0,80).'...'; 
    $contenido      = ereg_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]","", $contenido);

    $pClass = "";

    foreach (get_post_class(array('clearfix')) as $post_cass) 
    {
      $pClass .= $post_cass." ";
    }

    $content .= '<article id="post-'.get_the_ID().'"  class="'. $pClass.' isotope-item" role="article" class="blog-thumb">
    <a href="'.get_permalink().'" rel="bookmark" title="'.the_title('','',false).'">
    <figure class="img-post"><img src="'.$post_thumbnail_url.'" alt="'.the_title('','',false).'" class="thumb" /></figure>
    <div class="contenido"><header ><span class="categorias">'.$categoria.'</span>
    <h1>'.the_title('','',false).'</h1>
    <time datetime="'.get_the_time('Y-m-j').'" pubdate>'.get_the_time('j').' de '.get_the_time('F').' del '.get_the_time('Y').'</time>
    </header>
    <p>'.$contenido .'
    <span>Leer Más +<span></p></div>
    </a>
    </article>';    
    $i++;
    endwhile;
  }

  echo $content;
  die();
}

add_action('wp_ajax_nopriv_getBlog', 'loadBlogs');
add_action('wp_ajax_getBlog', 'loadBlogs');


function loadGallery()
{

  $paged   = ( isset($_GET['paged']) ) ? $_GET['paged'] : 1;
  $content = "";
  $i = 0;

  $args = array('cat'=>'23', 'paged'=> $paged );
  $the_query = new WP_Query($args); 

  if ($the_query->have_posts())
  {
    while ($the_query->have_posts()) : $the_query->the_post(); 
    $categoria    = get_the_category();
    $categoria    = ( !empty($categoria[1]->name) ) ? $categoria[1]->name : $categoria[0]->name ; 
    $post_thumbnail_id   = get_post_thumbnail_id($post->ID, 'full');
    $post_thumbnail_url  = (!empty($post_thumbnail_id)) ? wp_get_attachment_url( $post_thumbnail_id ) : get_template_directory_uri().'/images/dummie-galeria.png';

    $contenuto = get_the_content();

    $pClass = "";

    foreach (get_post_class(array('clearfix')) as $post_cass) 
    {
      $pClass .= $post_cass." ";
    }


    $content .='<article id="post-'.get_the_ID().'"  class="'. $pClass.' isotope-item" role="article" class="blog-thumb">
    <a href="'.$post_thumbnail_url.'" rel="bookmark" class="galeria-item fancybox" title="'.the_title('','',false).'" 
    caption="'.$contenuto.'" datePub="'.get_the_time('j').' de '.get_the_time('F').' del '.get_the_time('Y').'" cat="'.ucwords( strtolower($categoria) ).'" >
    <span class="categorias">'.strtolower($categoria).'</span>
    <figure><img src="'.$post_thumbnail_url.'" alt="'.the_title('','',false).'" class="thumb" /></figure>
    <div class="contenido"><header >
    <h1>'.the_title('','',false).'</h1>
    <time datetime="'.get_the_time('Y-m-j').'" pubdate>'.get_the_time('j').'de '.get_the_time('F').' del '.get_the_time('Y').'</time>
    </header>
    <p>'.$contenuto.'</p></div>
    </a>
    </article>';
    
    $i++;
    endwhile;
  }

  echo $content;
  die();
}


add_action('wp_ajax_nopriv_getGallery', 'loadGallery');
add_action('wp_ajax_getGallery', 'loadGallery');


function loadGalleryPerDate()
{

  $date   = explode("/", $_GET['date']);
  $content = "";
  $i = 0;

  $args = array('cat'=>'23', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => '-1' ,'date_query' => array(array('year'  => $date[2] ,'month' => $date[1] ,'day'   => $date[0] ,),)  );
  $the_query = new WP_Query($args); 


  if ($the_query->have_posts())
  {


    while ($the_query->have_posts() ) : $the_query->the_post(); 


  // 2 -> categoria blogs
    if(in_category(23)) :

      $categoria    = get_the_category();
    $categoria    = ( !empty($categoria[1]->name) ) ? $categoria[1]->name : $categoria[0]->name ;

    $post_thumbnail_id   = get_post_thumbnail_id($post->ID, 'full');
    $post_thumbnail_url  = (!empty($post_thumbnail_id)) ? wp_get_attachment_url( $post_thumbnail_id ) : get_template_directory_uri().'/images/dummie-post.png';


    $contenuto = get_the_content();

    $pClass = "";

    foreach (get_post_class(array('clearfix')) as $post_cass) 
    {
      $pClass .= $post_cass." ";
    }


    $content .='<article id="post-'.get_the_ID().'"  class="'. $pClass.' isotope-item" role="article" class="blog-thumb">
    <a href="'.$post_thumbnail_url.'" rel="bookmark" class="galeria-item fancybox" title="'.the_title('','',false).'" 
    caption="'.$contenuto.'" datePub="'.get_the_time('j').' de '.get_the_time('F').' del '.get_the_time('Y').'" cat="'.ucwords( strtolower($categoria) ).'" >
    <span class="categorias">'.strtolower($categoria).'</span>
    <figure><img src="'.$post_thumbnail_url.'" alt="'.the_title('','',false).'" class="thumb" /></figure>
    <div class="contenido"><header >
    <h1>'.the_title('','',false).'</h1>
    <time datetime="'.get_the_time('Y-m-j').'" pubdate>'.get_the_time('j').'de '.get_the_time('F').'del'.get_the_time('Y').'</time>
    </header>
    <p>'.$contenuto.'</p></div>
    </a>
    </article>';
    
    $i++;
    endif;
    endwhile;
  }

  echo $content;
  die();
}


add_action('wp_ajax_nopriv_getGalleryPerDate', 'loadGalleryPerDate');
add_action('wp_ajax_getGalleryPerDate', 'loadGalleryPerDate');


function getElementGallery($postId)
{

  $content = "";
  $args = array( 'p' => $postId, 'posts_per_page' => '1' );
  $the_query = new WP_Query($args); 

  if ($the_query->have_posts())
  {

    while ($the_query->have_posts() ) : $the_query->the_post(); 

    $categoria    = get_the_category();
    $categoria    = ( !empty($categoria[1]->name) ) ? $categoria[1]->name : $categoria[0]->name ;

    $post_thumbnail_id   = get_post_thumbnail_id($post->ID, 'full');
    $post_thumbnail_url  = (!empty($post_thumbnail_id)) ? wp_get_attachment_url( $post_thumbnail_id ) : get_template_directory_uri().'/images/dummie-post.png';

    $contenuto = get_the_content();

    $content .='<div id="post-get" ><article id="post-'.get_the_ID().'"  role="article" class="blog-thumb span4">
    <a href="'.$post_thumbnail_url.'" rel="bookmark" class="galeria-item fancybox" title="'.the_title('','',false).'" 
    caption="'.$contenuto.'" datePub="'.get_the_time('j').' de '.get_the_time('F').' del '.get_the_time('Y').'" cat="'.ucwords( strtolower($categoria) ).'" >
    <span class="categorias">'.strtolower($categoria).'</span>
    <figure><img src="'.$post_thumbnail_url.'" alt="'.the_title('','',false).'" class="thumb" /></figure>
    <div class="contenido"><header >
    <h1>'.the_title('','',false).'</h1>
    <time datetime="'.get_the_time('Y-m-j').'" pubdate>'.get_the_time('j').'de '.get_the_time('F').' del '.get_the_time('Y').'</time>
    </header>
    <p>'.$contenuto.'</p></div>
    </a>
    </article></div>';
    
    endwhile;

  }
  else
  {

    return null;

  }


  return $content;



}



function get_youtube_id($url)
{

  $url  =  explode("embed/", $url);
  $url2 = explode('"',$url[1]);
  $id   = $url2[0];

  return $id;
}

function get_thumbnail_youtube($youtubeUrl, $quality = 'default')
{
  $videoId = get_youtube_id( $youtubeUrl );

  return 'http://img.youtube.com/vi/' . $videoId . '/' . $quality . '.jpg';

}


function porcentajeEquivalente($probablidad)
{
  $porcentaje = null;

  if(! empty($probablidad) )
  {
    $probablidad = strtolower($probablidad);

    if($probablidad == "baja")
    {
      $porcentaje = 30;
    }
    else if ($probablidad == "media")
    {
      $porcentaje = 60;
    }
    else if($probablidad == "alta")
    {
      $porcentaje = 80;
    }
  }

  return $porcentaje; 

}

function textoProbabilidad($probablidad)
{
  $texto = null;

  if(! empty($probablidad) )
  {
    $probablidad = strtolower($probablidad);

    if($probablidad == "baja")
    {
      $texto = 'Inferior a 30%';
    }
    else if ($probablidad == "media")
    {
      $texto = 'Entre 40% y 60%';
    }
    else if($probablidad == "alta")
    {
      $texto = 'Mayor a 70%';
    }
  }

  return $texto; 

}



function getMarkersEstaciones()
{
  global $wpdb;
  $datos_estaciones = array();
  $result = array();
  $datos_estaciones = $wpdb->get_results("SELECT * FROM c247_csv_pluviometricas WHERE latitud is not null AND longitud is not null ;");

  if(count($datos_estaciones) > 0)
  {
    foreach ($datos_estaciones as $key => $est) {

      $result[$key]['id_estacion']        = ( $est->id_estacion != null ) ? $est->id_estacion : "0";
      $result[$key]['direccion']          = ( $est->direccion != null )? $est->direccion : "0";
      $result[$key]['barrio']             = ( $est->barrio != null) ? $est->barrio : "0" ;
      $result[$key]['municipio']          = ( $est->municipio != null) ? $est->municipio : "0";
      $result[$key]['nombre']             = ( $est->nombre != null ) ? $est->nombre : "0";
      $result[$key]['intensidad_30m']     = ( $est->intensidad_30m != null ) ? $est->intensidad_30m : "0";
      $result[$key]['precipitacion_1h']   = ( $est->precipitacion_1h != null ) ? $est->precipitacion_1h : "0";
      $result[$key]['precipitacion_3h']   = ( $est->precipitacion_3h != null ) ? $est->precipitacion_3h : "0";
      $result[$key]['imagen']             = ( $est->imagen != null ) ? $est->imagen : "0";
      $result[$key]['latitud']            = ( $est->latitud != null) ? $est->latitud : "0";
      $result[$key]['longitud']           = ( $est->longitud != null) ? $est->longitud : "0" ;
      $result[$key]['fecha_reporte']      = ( $est->fecha_reporte != null) ? $est->fecha_reporte : "0";

    }
    echo json_encode($result);
    exit;
  }
  else
  {
    echo 'no results';
  }

}

add_action('wp_ajax_nopriv_setGoogleMarkersEstaciones', 'getMarkersEstaciones');
add_action('wp_ajax_setGoogleMarkersEstaciones', 'getMarkersEstaciones');

function saveLog($evento,$msg)
{
  global $wpdb;

  $data = array();
  $data['evento'] = $evento;
  $data['msg']    = $msg;
  $data['fecha']  = date('Y/m/d H:i:s');



  $wpdb->insert( 'c247_log_cargas', $data );

}


function getInfoCuenca()
{
  global $wpdb;

  $cuenca = $wpdb->get_results("SELECT * FROM c247_csv_niveles n WHERE codigo = ".$_GET['codigo']." ;");

  echo json_encode($cuenca);
  exit;

}
add_action('wp_ajax_nopriv_showInfoCuenca', 'getInfoCuenca');
add_action('wp_ajax_showInfoCuenca', 'getInfoCuenca');


function getCuencas()
{
  global $wpdb;

  $datos_estaciones = $wpdb->get_results("SELECT codigo,nombre FROM c247_csv_niveles WHERE nombre is not null ;");
  $result = "";
  $seleccionado = "selected";

  foreach ($datos_estaciones as $key => $cuenca) 
  {

    $result .= '<option value="'.$cuenca->codigo.' " '.$seleccionado.' >'.$cuenca->codigo." -  ".$cuenca->nombre.'</option>';
    $seleccionado = '';
    
  }
  return $result;

}

//Funcion para verificar si existe la página.
function verificar($url)
{
	$id = @fopen($url,'r');

	if($id)
	{
		return true;
	}else
	{
		return false;
	}
} 

/*
* Compara con el slug
*/
function verifyCategory($blogCategory, $pattern)
{


  if( !empty($blogCategory) && !empty($pattern) && count($blogCategory) > 0 )
  {

    foreach ($blogCategory as $key => $value) 
    {
      if( strtolower($value->slug) == strtolower($pattern) )
      {
        return true;
      }

    }
  }
  else
  {
    return false;
  }

}


function the_breadcrumb($cat_cod='')
{
	if( !empty($cat_cod) )
	{
		$args = array(
		  'orderby' => 'ID',
		  'include' => $cat_cod
		 ); 
		 $category = get_categories( $args );
	}
	else
	{
		$category =  get_the_category();
	}

	echo '<div class="breadcrumb" >';
	if( $category[0]->category_parent > 0 && isset($category[0]->category_parent))
	{
			
		$args = array(
		  'orderby' => 'ID',
		  'include' => $category[0]->category_parent
		 ); 
		 
		$categoryParent = get_categories( $args );
		echo '<a id="cat-'.$categoryParent[0]->cat_ID.'" href="'.esc_url(get_category_link($categoryParent[0]->cat_ID)).'" class="item-breadcrumb">'. ucwords(strtolower($categoryParent[0]->name)) .'</a> <span> &#187; </span> ';
	} 
	
	echo '<a id="cat-'.$category[0]->cat_ID.'" href="'.esc_url(get_category_link($category[0]->cat_ID)).'" class="item-breadcrumb">'.$category[0]->name.'</a>';
	echo '</div>';
}

/* 
 Permite senear variables pasadas por get, tipo entero
 @param paramInt int 
 @author Pablo Martínez
 @return int
*/
function cleanInt( $paramInt )
{

  if( !empty( $paramInt) )
  {
    settype( $paramInt , "int")  ;
  }
  else
  {
    return 0;
  }

  return $paramInt;
  
}


function getStringSubcategories($parent)
{
  settype($parent, 'int');

  $args = array(
    'orderby' => 'id',
    'parent'  => $parent
    );

  $categories = get_categories( $args );
  $catList    = '';

  if($categories == NULL || count($categories) == 0 )
  {
    return NULL;
  }
  else
  {
    foreach ($categories as $key => $category) 
    {
      $catList = $catList .','. $category->cat_ID;
    }
  }

  return $catList;
}

/*
* Obtener las dispobibles en clima24/7
*
*/
function getCiudades()
{
    global $wpdb;  

    $query    = "SELECT ciudad FROM c247_ciudades;";
    $results  = $wpdb->get_results($query);
    $ciudad = array();

    foreach ($results as $key => $value) 
    {
      $ciudad[] = $value->ciudad;
    }

    return $ciudad;
}

/*
* Codigo del widget embebido clima 24/7
*
*/
function widget_embed()
{
  $id     =  $_GET['id_widget'];
  $embed  = "";
  settype($id, 'int');

  if( $id > 0)
  {
    $embed = "<iframe class='widget-clima' style='width:100%; height:1500px;'".
              "src='http://localhost/c24-7/wp-content/themes/clima/embed.php?id_widget=$id' frameborder='0'></iframe>";
  }
  else
  {
    return false;
  }

    echo $embed;
    die;
}

add_action('wp_ajax_nopriv_widget_embed', 'widget_embed');
add_action('wp_ajax_widget_embed', 'widget_embed');


include_once(TEMPLATEPATH.'/blogConfig.php');
include_once(TEMPLATEPATH.'/viewConvenciones.php');


// Incluimos el archivo de widget home
include_once(TEMPLATEPATH.'/widgets/widget-home.php');
include_once(TEMPLATEPATH.'/widgets/widget-pronostico.php');
include_once(TEMPLATEPATH.'/widgets/widget-ultima-emision.php');
include_once(TEMPLATEPATH.'/widgets/widget-gallery.php');
include_once(TEMPLATEPATH.'/widgets/widget-gallery-home.php');
include_once(TEMPLATEPATH.'/widgets/widget-mini-ultima-emision.php');
include_once(TEMPLATEPATH.'/widgets/widget-ultimos-articulos.php');
include_once(TEMPLATEPATH.'/widgets/widget-social-buttons.php');



?>
