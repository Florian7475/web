<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




add_action( 'wp_enqueue_scripts', 'home_inline_style' );
function home_inline_style() {
//height:calc(100% - 200px);
$style = ''  
." 


.sub-home-1, 
.menu-item-".$prim_menu_ids[1]."{
  background-image:  none  ;
  background: -webkit-radial-gradient(   right 150% bottom 150%,  " . get_theme_mod( 'ft_flo_color_1' , false ). "0), " . get_theme_mod( 'ft_flo_color_1' , false ) . ".1)) ;; 
  background: -o-radial-gradient(                                 " . get_theme_mod( 'ft_flo_color_1' , false ). "0), " . get_theme_mod( 'ft_flo_color_1' , false ) . ".1)) ;; 
  background: -moz-radial-gradient(                               " . get_theme_mod( 'ft_flo_color_1' , false ). "0), " . get_theme_mod( 'ft_flo_color_1' , false ) . ".1)) ;; 
  background: radial-gradient(        at right 150% bottom 150%,  " . get_theme_mod( 'ft_flo_color_1' , false ). "0), " . get_theme_mod( 'ft_flo_color_1' , false ) . ".1)) ;; 
}                                                                                                
                                                                                                 
.sub-home-2,                                                                                     
.menu-item-".$prim_menu_ids[2]."{                                                                                  
  background-image:  none  ;                                                            
  background: -webkit-radial-gradient(   left 150% bottom 150%,   " . get_theme_mod( 'ft_flo_color_2' , false ). "0),  " . get_theme_mod( 'ft_flo_color_2' , false ) . ".1)) ;; 
  background: -o-radial-gradient(                                 " . get_theme_mod( 'ft_flo_color_2' , false ). "0),  " . get_theme_mod( 'ft_flo_color_2' , false ) . ".1)) ;; 
  background: -moz-radial-gradient(                               " . get_theme_mod( 'ft_flo_color_2' , false ). "0),  " . get_theme_mod( 'ft_flo_color_2' , false ) . ".1)) ;; 
  background: radial-gradient(        at left 150% bottom 150%,   " . get_theme_mod( 'ft_flo_color_2' , false ). "0),  " . get_theme_mod( 'ft_flo_color_2' , false ) . ".1)) ;; 
}                                                                                                  
                                                                                                   
.sub-home-3,                                                                                       
.menu-item-".$prim_menu_ids[3]."{                                                                                    
  background-image:  none  ;                                                              
  background: -webkit-radial-gradient(   right 150% bottom 150%,  " . get_theme_mod( 'ft_flo_color_3' , false ). "0), " . get_theme_mod( 'ft_flo_color_3' , false ) . ".1)) ;; 
  background: -o-radial-gradient(                     		      " . get_theme_mod( 'ft_flo_color_3' , false ). "0), " . get_theme_mod( 'ft_flo_color_3' , false ) . ".1)) ;; 
  background: -moz-radial-gradient(                   		      " . get_theme_mod( 'ft_flo_color_3' , false ). "0), " . get_theme_mod( 'ft_flo_color_3' , false ) . ".1)) ;; 
  background: radial-gradient(        at right 150% bottom 150%,  " . get_theme_mod( 'ft_flo_color_3' , false ). "0), " . get_theme_mod( 'ft_flo_color_3' , false ) . ".1)) ;; 
}                                                                                                 
                                                                                                  
.sub-home-4,                                                                                      
.menu-item-".$prim_menu_ids[4]."{                                                                                   
  background-image:  none  ;                                                             
  background: -webkit-radial-gradient(   left 150% bottom 150% ,  " . get_theme_mod( 'ft_flo_color_4' , false ). "0), " . get_theme_mod( 'ft_flo_color_4' , false ) . ".1)) ;; 
  background: -o-radial-gradient(                     		      " . get_theme_mod( 'ft_flo_color_4' , false ). "0), " . get_theme_mod( 'ft_flo_color_4' , false ) . ".1)) ;; 
  background: -moz-radial-gradient(                   		      " . get_theme_mod( 'ft_flo_color_4' , false ). "0), " . get_theme_mod( 'ft_flo_color_4' , false ) . ".1)) ;; 
  background: radial-gradient(        at left 150% bottom 150% ,  " . get_theme_mod( 'ft_flo_color_4' , false ). "0), " . get_theme_mod( 'ft_flo_color_4' , false ) . ".1)) ;; 
}  

.uk-active.menu-item-".$prim_menu_ids[1].", 
.uk-active.menu-item-".$prim_menu_ids[2]." , 
.uk-active.menu-item-".$prim_menu_ids[3].",
.uk-active.menu-item-".$prim_menu_ids[4]."{

background:none !important; 

}

{
}

";
wp_add_inline_style( 'uikit', trim( preg_replace( '/\s\s+/', ' ', $style ) ) );
}

