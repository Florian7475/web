<?php

// Include Beans
require_once( get_template_directory() . '/lib/init.php' );


//beans_modify_action_hook( 'beans_post_header', 'beans_header_after_markup' );

//beans_modify_action_priority( 'my_page_description', 5 );


// Remove Beans Default Styling
remove_theme_support( 'beans-default-styling' );


//add_action( 'after_setup_theme', 'example_register_menu' );
function example_register_menu() {
    register_nav_menus( array(
        'example-secondary' => __( 'Off Canvas', 'example-domain' ),
    ) );
}



// Enqueue uikit assets
beans_add_smart_action( 'beans_uikit_enqueue_scripts', 'totem_enqueue_uikit_assets', 7 );

function totem_enqueue_uikit_assets() {

/*
	// Enqueue uikit extra components
	beans_uikit_enqueue_components( array( 'flex' ) );

	// Enqueue uikit overwrite theme folder
	beans_uikit_enqueue_theme( 'totem', get_stylesheet_directory_uri() . '/assets/less/uikit' );

	// Add the theme style as a uikit fragment to have access to all the variables
	beans_compiler_add_fragment( 'uikit', get_stylesheet_directory_uri() . '/assets/less/style.less', 'less' );
*/
    
	beans_uikit_enqueue_components( true );
	beans_uikit_enqueue_components( true, 'add-ons' );
    
	// Enqueue uikit extra components
	//beans_uikit_enqueue_components( array( 'flex' ) );

	// Enqueue uikit overwrite theme folder
	beans_uikit_enqueue_theme( 'totem', get_stylesheet_directory_uri() . '/assets/less/uikit' );

        beans_compiler_add_fragment( 'uikit', get_stylesheet_directory_uri() . '/assets/less/flo.less', 'less' );
	//beans_compiler_add_fragment( 'uikit', get_stylesheet_directory_uri() . '/assets/less/grid-push-pull.less', 'less' );
	// Add the theme style as a uikit fragment to have access to all the variables
	beans_compiler_add_fragment( 'uikit', get_stylesheet_directory_uri() . '/assets/less/style.less', 'less' );
    
}


//add_action( 'wp_enqueue_scripts', 'print_uikit_components' );

function print_uikit_components() {

	global $_beans_uikit_enqueued_items;

	print_r( $_beans_uikit_enqueued_items );

}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////

//add_action( 'generate_rewrite_rules', 'register_portfolio_rewrite_rules' );
function register_portfolio_rewrite_rules( $wp_rewrite ) {
    
	$new_rules = array( 
            'clases_cursos_yoga/categoria(.+?)/categoria(.+?)/categoria(.+?)/([^/]+)/?$' => 'index.php?name=' . $wp_rewrite->preg_index( 4 ),
            'clases_cursos_yoga/categoria(.+?)/categoria(.+?)/(.*(?<!categoria)).*/?$'=> 'index.php?category_name=' . $wp_rewrite->preg_index( 3 ),
            'clases_cursos_yoga/categoria(.+?)/((categoria).*)/?$'=> 'index.php?category_name=' . $wp_rewrite->preg_index( 2 ),
            'clases_cursos_yoga/categoria(.+?)/(.*(?<!categoria)).*/?$'=> 'index.php?name=' . $wp_rewrite->preg_index( 2 ),
            'clases_cursos_yoga/categoria(.+?)/categoria(.+?)/(.*(?<!categoria)).*/?$'=> 'index.php?name=' . $wp_rewrite->preg_index( 3 ),
            'centros-yoga/yoga-barcelona/bcn-centro-urquinaona-horarios/?$' => 'index.php?post_type=horariocentral',
            'centros-yoga/yoga-barcelona/bcn-poblenou-horarios/?$' => 'index.php?post_type=horariopoblenou',
            'centros-yoga/yoga-barcelona/bcn-gracia-horarios/?$' => 'index.php?post_type=horariogracia',
	);
	$wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
        
//var_dump($wp_rewrite);

}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////

//add_action( 'init', 'wpa37911_permastructs' );
function wpa37911_permastructs(){

    global $wp_rewrite;
    $wp_rewrite->extra_permastructs['fl-builder-template']['struct'] = str_replace( "/clases_cursos_yoga/", "/", $wp_rewrite->extra_permastructs['fl-builder-template']['struct'] ); 
    $wp_rewrite->extra_permastructs['horariocentral']['struct'] = str_replace( "/clases_cursos_yoga/", "/centros-yoga/", $wp_rewrite->extra_permastructs['horariocentral']['struct'] ); 
    $wp_rewrite->extra_permastructs['horariopoblenou']['struct'] = str_replace( "/clases_cursos_yoga/", "/centros-yoga/", $wp_rewrite->extra_permastructs['horariopoblenou']['struct'] ); 
    $wp_rewrite->extra_permastructs['evento']['struct'] = str_replace( "/clases_cursos_yoga/evento/", "/retiros-yoga/", $wp_rewrite->extra_permastructs['evento']['struct'] ); 

}

add_post_type_support( 'page', 'excerpt' );




// Remove page post type comment support
beans_add_smart_action( 'init', 'totem_post_type_support' );

function totem_post_type_support() {

	remove_post_type_support( 'page', 'comments' );

}


// Setup document fragements, markups and attributes
beans_add_smart_action( 'wp', 'totem_setup_document' );

function totem_setup_document() {


    
	// Header
	beans_remove_attribute( 'beans_header', 'class', ' uk-block' );
	beans_wrap_inner_markup( 'beans_fixed_wrap_header', 'totem_overlay_navigation', 'div', array( 'class' => 'tm-overlay-navigation uk-clearfix' ) );

	// Breadcrumb
	beans_remove_action( 'beans_breadcrumb' );

	// Navigation
	beans_add_attribute( 'beans_sub_menu_wrap', 'class', 'uk-dropdown-center' );
	beans_remove_attribute( 'beans_menu_item_child_indicator', 'class', 'uk-margin-small-left' );

	// Offcanvas
	beans_add_attribute( 'beans_widget_area_offcanvas_bar', 'class', 'uk-offcanvas-bar-flip' );
	beans_add_attribute( 'beans_primary_menu_offcanvas_button', 'class', 'uk-button-primary' );

	// Post content
	beans_remove_attribute( 'beans_post', 'class', ' uk-panel-box' );
	beans_add_attribute( 'beans_post_content', 'class', 'uk-text-large' );
	beans_add_attribute( 'beans_post_more_link', 'class', 'uk-button uk-button-small' );

	// Post image
	beans_modify_action_hook( 'beans_post_image', 'beans_post_title_before_markup' );

	// Post meta
	beans_remove_action( 'beans_post_meta' );
	beans_remove_action( 'beans_post_meta_tags' );
	beans_remove_action( 'beans_post_meta_categories' );

	// Post read more
	beans_replace_attribute( 'beans_next_icon_more_link', 'class' , 'angle-double-right', 'long-arrow-right' );

	// Posts pagination
	beans_remove_markup( 'beans_previous_icon_posts_pagination' );
	beans_remove_markup( 'beans_next_icon_posts_pagination' );

	// Comment badge
	beans_add_attribute( 'beans_moderator_badge', 'class', 'uk-border-rounded uk-align-right' );
	beans_add_attribute( 'beans_moderation_badge', 'class', 'uk-border-rounded uk-align-right' );

	// Comment meta
	beans_modify_action_priority( 'beans_comment_metadata', 9 );

	// Comment form
	beans_add_attribute( 'beans_comment_form_submit', 'class', 'uk-button-large' );
	beans_replace_attribute( 'beans_comment_fields_wrap', 'class', 'uk-width-medium-1-1', 'uk-width-medium-4-10' );
	beans_replace_attribute( 'beans_comment_form', 'class', 'uk-width-medium-1-3', 'uk-width-medium-1-1' );

	if ( !is_user_logged_in() )
		beans_replace_attribute( 'beans_comment_form_comment', 'class', 'uk-width-medium-1-1', 'uk-width-medium-6-10' );

	// Search
	beans_add_attribute( 'beans_search_title', 'class', 'uk-margin-large-bottom' );

	if ( is_search() )
		beans_remove_action( 'beans_post_image' );
        
        
beans_remove_attribute( 'beans_main', 'class', ' uk-block' );
beans_add_attribute( 'beans_main', 'style', 'overflow:hidden' );
        
beans_remove_attribute( 'beans_fixed_wrap[_header]', 'class' , 'uk-container-center');
//beans_add_attribute( 'beans_fixed_wrap[_header]', 'style' , 'border-bottom: 1px solid #EDEDED;');
beans_remove_attribute( 'beans_primary_menu_offcanvas_button_icon', 'class' , 'uk-margin-small-right');

beans_remove_attribute( 'beans_menu[_navbar][_primary]', 'class' , 'uk-visible-large');
beans_add_attribute( 'beans_menu[_navbar][_primary]', 'class' , 'uk-hidden-small');

beans_remove_attribute( 'beans_primary_menu', 'class' , 'uk-float-right uk-navbar');
beans_add_attribute( 'beans_primary_menu', 'class' , 'uk-clearfix');


beans_add_attribute( 'beans_site_branding', 'id', 'beans_site_branding' );
beans_add_attribute( 'beans_site', 'id', 'beans_site' );

beans_remove_attribute( 'beans_site_branding', 'class' , 'uk-float-left uk-margin-small-top');


beans_remove_attribute( 'beans_primary_menu_offcanvas_button', 'class' , 'uk-hidden-large');

beans_add_attribute( 'beans_fixed_wrap[_header]', 'style' , 'max-width:2000px;');

beans_remove_markup( 'beans_site_title_link');



beans_wrap_markup( 'beans_logo_image', 'flo_link_logo', 'a', array( 'id' => 'beans_logo_image', 'href' => esc_url( home_url( '/' ) )  ) );


beans_add_attribute( 'beans_primary_menu_offcanvas_button', 'id', 'beans_primary_menu_offcanvas_button' );

beans_remove_attribute( 'beans_fixed_wrap[_main]', 'class' , 'uk-container-center');
beans_add_attribute( 'beans_fixed_wrap[_main]', 'style' , 'max-width:2000px;');

beans_add_attribute( 'beans_main', 'id', 'beans_main' );
beans_add_attribute( 'beans_main', 'class', 'heightOK heightIsImportant'  );

beans_remove_attribute( 'beans_post', 'class' , 'uk-panel-box');


//beans_add_attribute( 'beans_post_header', 'class', 'uk-panel-box'  );

        
        
        
        

}


// Modify beans layout (filter)
beans_add_smart_action( 'beans_layout_grid_settings', 'totem_layout_grid_settings' );

function totem_layout_grid_settings( $layouts ) {

	return array_merge( $layouts, array(
		'grid' => 10,
		'sidebar_primary' => 2,
		'sidebar_secondary' => 2,
	) );

}


// Modify beans default layout (filter)
beans_add_smart_action( 'beans_default_layout', 'totem_default_layout' );

function totem_default_layout( $layouts ) {

	return 'sp_c_ss';

}


// Modify the categories widget count (filter)
beans_add_smart_action( 'beans_widget_count_output', 'totem_widget_counts' );

function totem_widget_counts() {

	return '$2';

}


// Modify the tags cloud widget (filter)
beans_add_smart_action( 'wp_generate_tag_cloud', 'totem_widget_tags_cloud' );

function totem_widget_tags_cloud( $output ) {

	$output = preg_replace( '#tag-link-#', 'uk-button uk-button-mini tag-link-', $output );
	$output = preg_replace( "#style='font-size:.+pt;'#", '', $output );

	return $output;

}


// Remove comment after note (filter).
beans_add_smart_action( 'comment_form_defaults', 'totem_comment_form_defaults' );

function totem_comment_form_defaults( $args ) {

	$args['comment_notes_after'] = '';

	return $args;

}


// Modify comment title
beans_add_smart_action( 'beans_comment_title_append_markup', 'totem_comment_title_prefix' );

function totem_comment_title_prefix() {

	echo beans_open_markup( 'totem_comment_title_extra', 'span', array(
			'class' => 'uk-margin-small-left',
		) );

		echo beans_output( 'totem_comment_title_extra', __( 'says:', 'tm-totem' ) );

	echo beans_close_markup( 'totem_comment_title_extra', 'span' );

}


// Add avatar uikit circle class (filter)
beans_add_smart_action( 'get_avatar', 'totem_avatar' );

function totem_avatar( $output ) {

	return str_replace( "class='avatar", "class='avatar uk-border-circle", $output ) ;

}


// Add footer content (filter)
//beans_add_smart_action( 'beans_footer_credit_right_text_output', 'totem_footer' );

function totem_footer() { ?>

  <a href="http://www.themebutler.com/themes/totem/" target="_blank" title="Totem theme for WordPress">Totem</a> theme for <a href="http://wordpress.org" target="_blank">WordPress</a>. Built-with <a href="http://www.getbeans.io/" title="Beans Framework for WordPress" target="_blank">Beans</a>.

<?php }




//add_action( 'widgets_init', 'example_widget_area' );  //enleve layout !!!
function example_widget_area() {
    beans_deregister_widget_area( 'sidebar_primary' );
}



beans_remove_action( 'beans_primary_offcanvas_menu' );




add_action( 'beans_before_load_document', 'add_class_sticky_beans_header' );
function add_class_sticky_beans_header() {
    
if(is_admin_bar_showing()){$top = 32 ;}else{$top = 0 ;}
if(is_admin_bar_showing()){$top2 = 160 ;}else{$top2 = 100 ;}

beans_add_attribute( "flo_sticky_subnav", 'style' , 'z-index:1;' ); 
beans_add_attribute( 'flo_sticky_subnav', 'data-uk-sticky' , '{top:'.$top2.'}' );
beans_add_attribute( 'beans_header', 'data-uk-sticky' , '{top:'.$top.'}' );

}


function flo_change_text( $translated_text, $text, $domain ) {
switch ( $translated_text ) {
case 'Menu' :
$translated_text = __( '', 'thotem' );
break;
}
return $translated_text;
}
add_filter( 'gettext', 'flo_change_text', 20, 3 );




// Add footer content (filter)
add_action( 'beans_body_append_markup', 'totem_breakpoint' );

function totem_breakpoint() { ?>

  <a href="http://www.themebutler.com/themes/totem/" target="_blank" title="Totem theme for WordPress">Totem</a> theme for <a href="http://wordpress.org" target="_blank">WordPress</a>. Built-with <a href="http://www.getbeans.io/" title="Beans Framework for WordPress" target="_blank">Beans</a>.


<div id="flo-fix-breakpoint"      style="height:30px; width : 100% ; text-align: center;position: fixed; bottom:0;background-color: red;color:#fff;font-weight:bolder">
     
</div>

<?php }

/*
// Add footer content (filter)
//add_action( 'beans_body_append_markup', 'flo_show_levels' );

function flo_show_levels() { ?>

<?php  echo beans_open_markup( 'flo_show_levels', 'div' , array( 'id' => 'flo-show-levels' , 'class' => 'uk' , 'style' => 'height:300px; width : 100% ; text-align: center;position: fixed; bottom:0;background-color: pink;color:#fff;font-weight:bolder'   ));  
?>     

        
<?php echo beans_close_markup( 'flo_show_levels' , 'div' );?>  
    


<?php }
*/




require_once( get_stylesheet_directory() . '/php/style.php' );

















/////////////////////////////////////////////////////////////////////////////////////////////////////////////
if( wp_is_mobile() ){
add_action('get_header', 'remove_admin_login_header');
}
function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}

    

//add_action( 'wp_enqueue_scripts', 'my_function_name_alla' );

function my_function_name_alla() {
    
    
//if( is_front_page() ){
    beans_compile_js_fragments( 'js_compiler_id', array(
       
        get_stylesheet_directory_uri() . '/js/beans.js' ,
        get_stylesheet_directory_uri() . '/js/home.js' ,
        get_stylesheet_directory_uri() . '/js/slick.js' , 
        
    ));  
//}else{
/*
        if(!is_singular()){
            
            beans_compile_js_fragments( 'js_compiler_id', array(
            get_stylesheet_directory_uri() . '/js/beans.js' ,
            get_stylesheet_directory_uri() . '/js/blog.js' ,

            ));  
            
            
        }
*/
    
}



add_action( 'wp_enqueue_scripts', 'my_function_name_all' );

function my_function_name_all() {
    
$js=array();

    
  array_push($js, get_stylesheet_directory_uri() . '/js/beans.js' );
    
   
if( is_front_page() ){
        
    //echo "<h1>-HOME</h1>";

    
    array_push($js, get_stylesheet_directory_uri() . '/js/home.js' );
    array_push($js, get_stylesheet_directory_uri() . '/js/slick.js' );
        
        
        
    }else{
        
        if(is_singular()){
            
            if(is_page()){
                
            //echo "<h1>-PAGE ". $post->ID ."</h1>"   ;

                    
                array_push($js, 'https://maps.googleapis.com/maps/api/js?key=AIzaSyD_GdbNPS5ucLEklf0N6uRpVbu-SJBNYro' );    
                array_push($js, get_stylesheet_directory_uri() . '/js/centros.js' );
                
                /*
                if ( in_array( $post->ID , get_all_id_I(8))  ) {

                    
                }
                if (in_array($post->ID, get_all_id_I(18))) {

                    
                    
                }
                ; 
                */

            } else {
                //echo "<h1>-POST</h1>";

                if ( $post ) {


                    
                }


            }
        }else{

            if ( !is_front_page() && is_home() ) {
                
            //echo "<h1>-BLOG</h1>";

                
            }else{
                if (is_category()) {
                    

                    
                }
                else{

                if( strpos(get_post_type(), 'horario') !== false ){
                   //  echo "<h1>horario</h1>";


                }else{

                   //  echo "<h1>NO SE QUE</h1>"; 
                }

                    

                    
                }
            }        
        }    
    }

    

    
     beans_compile_js_fragments( 'js_compiler_id',  $js );   

} ;








add_action( 'wp', 'example_modify_layout' );
/**
 * Modify mobile layout.
 */
function example_modify_layout() {

    // Display left sidebar before content on mobile.
    if ( 'sp_c' === beans_get_layout() ) {
        // Move the sidebar HTML before primary content.
      //  beans_modify_action_hook( 'beans_sidebar_primary_template', 'beans_primary_before_markup' );

        // Remove push pull classes.
        beans_remove_attribute( 'beans_primary', 'class', 'uk-push-1-4' );
        beans_remove_attribute( 'beans_sidebar_primary', 'class', 'uk-pull-3-4' );
    }

}


// Add Back to Top.
add_action( 'beans_body_prepend_markup', 'mk_blue_shared_top_anchor' );

function mk_blue_shared_top_anchor() {

    ?><div id="blue-top"></div><?php

}



add_action( 'beans_post_content_after_markup', 'mk_blue_contactpage_top_bar' );

function mk_blue_contactpage_top_bar() {

    ?>
    <div class="uk-width-large-1-1 uk-width-medium-1-1 uk-text-middle uk-text-center uk-text-center-small uk-text-break uk-margin-large">
        <a href="#blue-top" class="uk-button uk-button-primary uk-button-large uk-width-1-1 uk-margin-small-bottom" title="Terug naar boven" data-uk-smooth-scroll><i class="uk-icon-arrow-up"></i></a>
    </div>
    <?php

}






/*

beans_remove_action( 'beans_do_register_post_meta' );
beans_remove_action( 'beans_do_register_term_meta' );


*/




//beans_add_attribute( 'beans_menu_item[_'. $off_menu_ids[2].']', 'class', 'menu-item-has-children uk-parent' ); 
//add_action( 'beans_menu_item[_'. $off_menu_ids[2].']_append_markup', 'insert_menu_cat_off' ); 


function insert_menu_cat_off(){
}   






