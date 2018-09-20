







var h = 0;

var resizeTimer;

jQuery(window).on('resize', function(e) {

  clearTimeout(resizeTimer);
 // resizeTimer = setTimeout(function() { myScreenSize1() }, 250);

});




    
 
  


//https://community.getbeans.io/discussion/offcanvas-menu/



(function( $ ) {
    $( document ).ready( function() {
        
        
        //premier passage : niveau 1
        
        var arraytext = []; var arraylink = [];
        $(".menu-offcanvas-container").find("#menu-offcanvas > .menu-item-has-children  >  a").each(function(){
            $(this).addClass('flo-subnav-link');
            if(($.trim($(this).text()).length>0)){
             arraytext.push($(this).text());
             arraylink.push($(this).attr( 'href'));
             console.log($(this).text() + " - " + $(this).attr( 'href'));
            }
        });     
        
        var i = 0;

       $(".menu-offcanvas-container").find("#menu-offcanvas > .menu-item-has-children").each(function(i){
              console.log(arraylink[i]);
             $(this).css("position","relative");
             $(this).prepend("<li class='flo-link-on-parent'  >  <a href='" + arraylink[i] + "'>  <span class='flo-text-link-on-parent'>" + arraytext[i] + "</span>  </a></li>");   
             i++;
        });        

       $( '#menu-offcanvas > .menu-item-has-children  >  a' ).attr( 'href', '#' );
    
  
    
        ////////////////////////////////////
        //second passage niveau 2
        ////////////////////////////////////http://jsfiddle.net/JqJce/6/

    
        var arraytext2 = []; var arraylink2= [];
        $(".menu-offcanvas-container").find("#menu-offcanvas > .menu-item-has-children ul .menu-item-has-children >  a").each(function(){

         //   $(this).addClass('flo-subnav-link ');

            if(($.trim($(this).text()).length>0)){

             arraytext2.push($(this).text());
             arraylink2.push($(this).attr( 'href'));

             console.log("...2 " + $(this).text() + " - " + $(this).attr( 'href'));

            }

        });  
    
        $(".menu-offcanvas-container").find("#menu-offcanvas > .menu-item-has-children > ul ").each(function(){
           $(this).addClass('nav level-1');
        })

        $(".menu-offcanvas-container").find("#menu-offcanvas > .menu-item-has-children ul .menu-item-has-children ").each(function(){
            $(this).addClass('has-submenu');
        });

        $(".menu-offcanvas-container").find("#menu-offcanvas > .menu-item-has-children ul .menu-item-has-children ul").each(function(){
            $(this).addClass('level-2');
        });

        
         $('.has-submenu > a').on('click', function (e) {
          e.preventDefault();
          console.log("has-submenu");
                // slide up currently open except if click is nested within an already open menu
                if ($(this).closest('.nav-open').length === 0)
                {
                    $('.nav > .nav-open').removeClass('nav-open').find('> ul > li').slideUp();
                }
                // give the <li> the "nav-open" class, then slide the <li> grandchildren
                $(this).parent().toggleClass('nav-open').find('> ul > li').slideToggle();
         });

       //     $( '.menu-item-has-children > a' ).attr( 'href', '#' );
        var j = 0;
        $(".menu-offcanvas-container").find("#menu-offcanvas > .menu-item-has-children ul .menu-item-has-children").each(function(){

             $(this).css("position","relative");
             $(this).prepend("<li class='flo-link-on-parent-subsub'  >  <a href='" + arraylink2[j] + "'>  <span class='flo-text-link-on-parent'>" + arraytext2[j] + "</span>  </a></li>");   
             j++;

        });  


            jQuery(".has-submenu ").find('> a').each(function(){
                if (jQuery(this).closest('.nav-open').length === 0){
                    jQuery('.nav > .nav-open').removeClass('nav-open').find('> ul > li').slideUp();
                }
                jQuery(this).parent().toggleClass('nav-open').find('> ul > li').slideToggle();               

                if ( jQuery(this).parent().hasClass('uk-active')  ){

                    if (jQuery(this).closest('.nav-open').length === 0){
                        jQuery('.sub-nav > li').addClass('nav-open').find('> ul > li').slideUp();
                    }
                    jQuery(this).parent().toggleClass('nav-open').find('> ul > li').slideToggle(); 
                }

                if (   jQuery(this).next().children().hasClass('uk-active') ){
                   if (jQuery(this).closest('.nav-open').length === 0){     
                        jQuery('.sub-nav > li').addClass('nav-open').find('> ul > li').slideUp();
                    }
                   jQuery(this).parent().toggleClass('nav-open').find('> ul > li').slideToggle(); 
                 }
             })










    })
    
    
    
    
    
    
    $(window).load(function() {

       
    
    window.setTimeout(function(){jQuery("#elem0").addClass("uk-hidden");}, 1000);
    window.setTimeout(function(){jQuery("#elem1").addClass("uk-hidden");}, 1000);
    window.setTimeout(function(){jQuery("#elem2").addClass("uk-hidden");}, 1000);
    window.setTimeout(function(){jQuery("#elem3").addClass("uk-hidden");}, 1000);
    window.setTimeout(function(){jQuery("#elem4").addClass("uk-hidden");}, 1000);
    window.setTimeout(function(){jQuery("#elem5").addClass("uk-hidden");}, 1000);
    
    
    
    
    
    
    
    
   /* 
jQuery("#elem0").on('display.uk.check', function(){});
    
*/
  
});




    
})( jQuery );



/*
            
jQuery(document).ready(function(){
    


var menuFloId = [ 1 ];



        function addLoadEvent(func) {
          var oldonload = window.onload;
          if (typeof window.onload != 'function') {
            window.onload = func;
          } else {
            window.onload = function() {
              if (oldonload) {
                oldonload();
              }
              func();
            }
          }
        }
        addLoadEvent(function() {
            i=0;  
            loopArray(menuFloId);
        });
        function loopArray(arr) {
            console.log( "hhgfhgfgfgfgfgfgfgfgfgfgfgfgf" + arr[i]);

            customAlert(arr[i],i,function(){
                i++;  
                  // any more items in array?
                  if(i < arr.length) {
                          loopArray(arr);   
                  }
            }); 

        } 
        
        function customAlert(msg,i,callback) {
            // fancy code to show your message
            //console.log(msg);
            // do callback when ready
            callback();
            console.log("H" );
            
            
;
            if(i === 0){
                

         
     //       var accordion = UIkit.accordion(jQuery("#ac1") , { showfirst:false } );


                jQuery(".status-flo").fadeOut();
                jQuery(".preloader-flo").delay(100).fadeOut("slow");
                console.log("ok loaded");
           //     jQuery('#myCarousel').carousel({interval: 500});

            }
        }
});
         
*/