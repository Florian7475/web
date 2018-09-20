/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


    function loadNelioHQMap(   num ,   ad ) {
       var address = ad; 
       console.log(ad);
       var map = new google.maps.Map(document.getElementById(num), { 
           mapTypeId: google.maps.MapTypeId.TERRAIN,
           zoom: 16
       });
       var geocoder = new google.maps.Geocoder();
       geocoder.geocode({
          'address': address
       }, 
       function(results, status) {
          if(status == google.maps.GeocoderStatus.OK) {
             new google.maps.Marker({
                position: results[0].geometry.location,
                map: map
             });
             map.setCenter(results[0].geometry.location);
          }
       });
    }
    google.maps.event.addDomListener( window, 'load', loadNelioHQMap );