$ = jQuery;

var previousScroll = 0, // previous scroll position
        menuOffset = 54, // height of menu (once scroll passed it, menu is hidden)
        detachPoint = 650, // point of detach (after scroll passed it, menu is fixed)
        hideShowOffset = 6; // scrolling value after which triggers hide/show menu
    // on scroll hide/show menu
    $(window).scroll(function() {
      if (!$('nav').hasClass('expanded')) {
        var currentScroll = $(this).scrollTop(), // gets current scroll position
            scrollDifference = Math.abs(currentScroll - previousScroll); // calculates how fast user is scrolling
        // if scrolled past menu
        if (currentScroll > menuOffset) {
          // if scrolled past detach point add class to fix menu
          if (currentScroll > detachPoint) {
            if (!$('nav').hasClass('detached'))
              $('nav').addClass('detached');
          }
          // if scrolling faster than hideShowOffset hide/show menu
          if (scrollDifference >= hideShowOffset) {
            if (currentScroll > previousScroll) {
              // scrolling down; hide menu
              if (!$('nav').hasClass('invisible'))
                $('nav').addClass('invisible');
            } else {
              // scrolling up; show menu
              if ($('nav').hasClass('invisible'))
                $('nav').removeClass('invisible');
            }
          }
        } else {
          // only remove “detached” class if user is at the top of document (menu jump fix)
          if (currentScroll <= 0){
            $('nav').removeClass();
          }
        }
        // if user is at the bottom of document show menu
        if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
          $('nav').removeClass('invisible');
        }
        // replace previous scroll position with new one
        previousScroll = currentScroll;
      }
    })
    // shows/hides navigation’s popover if class "expanded"
    $('nav').on('click touchstart', function(event) {
      showHideNav();
      event.preventDefault();
    })
    // clicking anywhere inside navigation or heading won’t close navigation’s popover
    $('#navigation').on('click touchstart', function(event){
        event.stopPropagation();
    })
    // checks if navigation’s popover is shown
    function showHideNav() {
      if ($('nav').hasClass('expanded')) {
        hideNav();
      } else {
        showNav();
      }
    }
    // shows the navigation’s popover
    function showNav() {
      $('nav').removeClass('invisible').addClass('expanded');
      $('#container').addClass('blurred');
      window.setTimeout(function(){$('body').addClass('no_scroll');}, 200); // Firefox hack. Hides scrollbar as soon as menu animation is done
      $('#navigation a').attr('tabindex', ''); // links inside navigation should be TAB selectable
    }
    // hides the navigation’s popover
    function hideNav() {
      $('#container').removeClass('blurred');
      window.setTimeout(function(){$('body').removeClass();}, 10); // allow animations to start before removing class (Firefox)
      $('nav').removeClass('expanded');
      $('#navigation a').attr('tabindex', '-1'); // links inside hidden navigation should not be TAB selectable
      $('.icon').blur(); // deselect icon when navigation is hidden
    }
    // keyboard shortcuts
    $('body').keydown(function(e) {
      // menu accessible via TAB as well
      if ($("nav .icon").is(":focus")) {
        // if ENTER/SPACE show/hide menu
        if (e.keyCode === 13 || e.keyCode === 32) {
          showHideNav();
          e.preventDefault();
        }
      }
      // if ESC show/hide menu
      if (e.keyCode === 27 || e.keyCode === 77) {
        showHideNav();
        e.preventDefault();
      }
    })

// ====================================================

$(".team__single").click(function(){
  var nextPanel = $(this).next(".drop-down-panel");
  
  nextPanel.slideToggle(300);
});

$(".close-push-panel").click(function() {
  $(this).parent(".drop-down-panel").slideToggle(300);

  $('html, body').animate({
    'scrollTop': $(this).parent(".drop-down-panel").offset().top - 400
  }, 'fast');

});


$(function() {
  IEcheck();
  new WOW({
     mobile: false
  }).init();
  
  var iframe = $('#vimeo_player')[0],
      player = $f(iframe),
      status = $('.status');

  // When the player is ready MUTE
  player.addEvent('ready', function() {
      player.api('setVolume', 0);
      player.api('seekTo',8);
  });
});

// Menu Toggle ============================================

// var anchor = document.getElementById('toggle-button');
// var anchorBtn = document.getElementById('menu-toggle');

    
// var open = false;
// anchor.onclick = function(event){
// 	event.preventDefault();
// 	if(!open){
// 	  anchorBtn.classList.add('close');
// 	  open = true;
// 	  $( "#fullscreen-menu" ).toggle( "slide" );
// 	}
// 	else{
// 	  anchorBtn.classList.remove('close');
// 	  $( "#fullscreen-menu" ).toggle( "slide" );
// 	  open = false;
// 	}
// };

// GOOGLE MAPS ============================================

// When the window has finished loading create our google map below
google.maps.event.addDomListener(window, 'load', init);

function init() {

  // Basic options for a simple Google Map
 // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
 var mapOptions = {
     // How zoomed in you want the map to start at (always required)
     zoom: 15,

     scrollwheel:  false,

     // The latitude and longitude to center the map (always required)
     center: new google.maps.LatLng(43.5238744, -79.7086458), // New York

     // How you would like to style the map. 
     // This is where you would paste any style found on Snazzy Maps.
     styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"administrative","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#2d2d2d"}]},{"featureType":"landscape","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"landscape","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#2d2d2d"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#a68d29"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#a68d29"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"visibility":"simplified"},{"color":"#a68d29"}]},{"featureType":"transit.station","elementType":"geometry","stylers":[{"color":"#2d2d2d"},{"lightness":9},{"visibility":"simplified"}]},{"featureType":"transit.station","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"transit.station.airport","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]},{"featureType":"water","elementType":"geometry","stylers":[{"saturation":-83},{"lightness":-51}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"color":"#2d2d2d"}]}]
 };

 // Get the HTML DOM element that will contain your map 
 // We are using a div with id="map" seen below in the <body>
 // var mapElement = document.getElementById('footer-map');
 var contactMap = document.getElementById('contact-map');

 // Create the Google Map using our element and options defined above
 // var map = new google.maps.Map(mapElement, mapOptions);
 var mapC = new google.maps.Map(contactMap, mapOptions);
 mapC.panBy(0, -120);

 // Let's also add a marker while we're at it
 // var marker = new google.maps.Marker({
 //     position: new google.maps.LatLng(43.5238744, -79.7086458),
 //     map: map
 // });

var currentpage = window.location.href;
if (currentpage == "http://hypelabs.ca/ingenuity/contact-us/") {
  var theicon = '/ingenuity/custom/themes/ingenuity/dist/images/homemap.png';
} else {
  var theicon = '/custom/themes/ingenuity/dist/images/homemap.png'
}

var marker = new google.maps.Marker({
  position: new google.maps.LatLng(43.5238744, -79.7086458),
  map: mapC,
  icon: theicon
});

  // Let's also add a marker while we're at it
 // var markerC = new google.maps.Marker({
 //     position: new google.maps.LatLng(43.5238744, -79.7086458),
 //     map: mapC
 // });

var contentString = '<div id="info-window-content">'+
 '<h3 id="firstHeading" class="firstHeading">Drop by for an espresso!</h3>'+
 '<a href="https://www.google.ca/maps/place/Ingenuity+Developments+Inc/@43.52352,-79.7077452,14.98z/data=!4m2!3m1!1s0x0:0x621fce01694efaaf" target="_blank"><p>3450 Ridgeway Dr. Unit • 3 </p>'+
 '<p>Mississauga, ON L5L 0A2</p></a>'+
 '<a href="tel:+1-905-569-2624" target="_blank"><p>(905) 569-2624</p></a>'+
 '</div>';

var infowindow = new google.maps.InfoWindow({
   content: contentString
});

google.maps.event.addListener(marker, 'click', function() {
   infowindow.open(mapC,marker);
});

infowindow.open(mapC,marker);

}

// PUSH PANEL FOR TEAM PAGE ============================================

var menuRight = document.getElementById( 'push-panel' ),
	// showRightPush = document.getElementById( 'showRightPush' ),
	closepanel = document.getElementById( 'close-push-panel' ),
	body = document.body;

// showRightPush.onclick = function() {
// 	classie.toggle( this, 'active' );
// 	classie.toggle( body, 'cbp-spmenu-push-toleft' );
// 	classie.toggle( menuRight, 'cbp-spmenu-open' );
// };


// Grab the data attribute info, and print them into the overlay
function printTeamMemberInfo($single) {
	$('#push__name').append($single.data('name'));
	$('#push__longbio').html($single.data('longbio'));
};


$( ".trigger-push-panel" ).click(function() {
	$('#push__name').empty();
	$('#push__longbio').empty();

	$('html, body').animate({
		'scrollTop': $('#push-panel').offset().top - 20
	}, 'fast');

	printTeamMemberInfo($(this));

	classie.toggle( this, 'active' );
	classie.toggle( body, 'cbp-spmenu-push-toleft' );
	classie.toggle( menuRight, 'cbp-spmenu-open' );
});

$( "#close-push-panel" ).click(function() {
	$(body).removeClass("cbp-spmenu-push-toleft");
	$(menuRight).removeClass("cbp-spmenu-open");
});

// =========================

/**
 * detect IE
 * returns version of IE or false, if browser is not Internet Explorer
 */
function detectIE() {
  var ua = window.navigator.userAgent;

  // test values
  // IE 10
  //ua = 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)';
  // IE 11
  //ua = 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko';
  // IE 12 / Spartan
  //ua = 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36 Edge/12.0';
  
  var msie = ua.indexOf('MSIE ');
  if (msie > 0) {
    // IE 10 or older => return version number
    return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
  }

  var trident = ua.indexOf('Trident/');
  if (trident > 0) {
    // IE 11 => return version number
    var rv = ua.indexOf('rv:');
    return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
  }

  var edge = ua.indexOf('Edge/');
  if (edge > 0) {
    // IE 12 => return version number
    return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
  }

  // other browser
  return false;
}

// detect IE
var IEversion = detectIE();

var vwidth = document.documentElement.clientWidth;

function IEcheck() {
  var vwidth = document.documentElement.clientWidth;

  if ( IEversion !== false ) {
    console.log('You are using IE! ' + vwidth);

    var myElements = document.querySelectorAll(".default-hero");
     
    for (var i = 0; i < myElements.length; i++) {
        myElements[i].style.height = '100vh';
    }

  } else {
    console.log('You are not using IE! ' + vwidth);
  }
}





