// if HTML DOM Element that contains the map is found...
if (document.getElementById('map-canvas')){

  //google map custom marker icon - .png fallback for IE11
  var is_internetExplorer11= navigator.userAgent.toLowerCase().indexOf('trident') > -1;
  var $marker_url = ( is_internetExplorer11 ) ? 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/3393/rs-icon-location.png' : 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/3393/rs-icon-location.svg';
  
  var $marker_url2 = ( is_internetExplorer11 ) ? 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/3393/rs-griffin-location.png' : 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/3393/rs-griffin-location.svg';

  var locations = [
    ['<h3>Roycemore School</h3><div id="bodyContent"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3393/givingbuilding.jpg"><p>1200 Davis Street, Evanston, IL 60201<br>(847) 866-6055</p></div>', 42.046855, -87.689435, 1, $marker_url2],
      ['60010', 42.1512, -88.1636, 1],
      ['60015', 42.1724, -87.8767, 2],
      ['60016', 42.0490, -87.8913, 3],
      ['60022', 42.1358, -87.7638, 4],
      ['60025', 42.0783, -87.8242, 5],
      ['60026', 42.0926, -87.8398, 6],
      ['60044', 42.2868, -87.8639, 7],
      ['60045', 42.2369, -87.8684, 8],
      ['60056', 42.0663, -87.9341, 9],
      ['60060', 42.2666, -88.0352, 10],
      ['60062', 42.1255, -87.8406, 11],
      ['60068', 42.0122, -87.8435, 12],
      ['60076', 42.0355, -87.7304, 13],
      ['60077', 42.0345, -87.7578, 14],
      ['60091', 42.0773, -87.7294, 15],
      ['60093', 42.1029, -87.7571, 16],
      ['60104', 41.8827, -87.8764, 17],
      ['60130', 41.8677, -87.8144, 18],
      ['60133', 41.9753, -88.1388, 19],
      ['60201', 42.0566, -87.6974, 20],
      ['60202', 42.0304, -87.6897, 21],
      ['60203', 42.0490, -87.7178, 22],
      ['60302', 41.8943, -87.7897, 23],
      ['60601', 41.8858, -87.6229, 24],
      ['60605', 41.8699, -87.6252, 25],
      ['60609', 41.8121, -87.6542, 26],
      ['60610', 41.9002, -87.6364, 27],
      ['60611', 41.8946, -87.6187, 28],
      ['60613', 41.9541, -87.6605, 29],
      ['60614', 41.9225, -87.6510, 30],
      ['60615', 41.8019, -87.6027, 31],
      ['60619', 41.7440, -87.6051, 32],
      ['60622', 41.9023, -87.6781, 33],
      ['60625', 41.9735, -87.7018, 34],
      ['60626', 42.0093, -87.6692, 35],
      ['60631', 41.9950, -87.8116, 36],
      ['60640', 41.9714, -87.6603, 37],
      ['60641', 41.9460, -87.7467, 38],
      ['60642', 41.8989, -87.6562, 39],
      ['60645', 42.0040, -87.7052, 40],
      ['60646', 41.9957, -87.7653, 41],
      ['60647', 41.9209, -87.7020, 42],
      ['60654', 41.8883, -87.6357, 43],
      ['60657', 41.9396, -87.6568, 44],
      ['60659', 41.9910, -87.7047, 45],
      ['60660', 41.9910, -87.6654, 46]
    ];
  
  //define the basic color of your map, plus a value for saturation and brightness
  var  $main_color = '#0077c5',
      $saturation= -10,
      $brightness= 0;

  //we define here the style of the map
  var style= [ 
    {
      //set saturation for the labels on the map
      elementType: "labels",
      stylers: [
        {saturation: $saturation}
      ]
    },  
      { //poi stands for point of interest - don't show these lables on the map 
      featureType: "poi",
      elementType: "labels",
      stylers: [
        {visibility: "off"}
      ]
    },
    {
      //don't show highways lables on the map
          featureType: 'road.highway',
          elementType: 'labels',
          stylers: [
              {visibility: "off"}
          ]
      }, 
    {   
      //don't show local road lables on the map
      featureType: "road.local", 
      elementType: "labels.icon", 
      stylers: [
        {visibility: "off"} 
      ] 
    },
    { 
      //don't show arterial road lables on the map
      featureType: "road.arterial", 
      elementType: "labels.icon", 
      stylers: [
        {visibility: "off"}
      ] 
    },
    {
      //don't show road lables on the map
      featureType: "road",
      elementType: "geometry.stroke",
      stylers: [
        {visibility: "off"}
      ]
    }, 
    //style different elements on the map
    { 
      featureType: "transit", 
      elementType: "geometry.fill", 
      stylers: [
        { hue: $main_color },
        { visibility: "on" }, 
        { lightness: $brightness }, 
        { saturation: $saturation }
      ]
    }, 
    {
      featureType: "poi",
      elementType: "geometry.fill",
      stylers: [
        { hue: $main_color },
        { visibility: "on" }, 
        { lightness: $brightness }, 
        { saturation: $saturation }
      ]
    },
    {
      featureType: "poi.government",
      elementType: "geometry.fill",
      stylers: [
        { hue: $main_color },
        { visibility: "on" }, 
        { lightness: $brightness }, 
        { saturation: $saturation }
      ]
    },
    {
      featureType: "poi.sport_complex",
      elementType: "geometry.fill",
      stylers: [
        { hue: $main_color },
        { visibility: "on" }, 
        { lightness: $brightness }, 
        { saturation: $saturation }
      ]
    },
    {
      featureType: "poi.attraction",
      elementType: "geometry.fill",
      stylers: [
        { hue: $main_color },
        { visibility: "on" }, 
        { lightness: $brightness }, 
        { saturation: $saturation }
      ]
    },
    {
      featureType: "poi.business",
      elementType: "geometry.fill",
      stylers: [
        { hue: $main_color },
        { visibility: "on" }, 
        { lightness: $brightness }, 
        { saturation: $saturation }
      ]
    },
    {
      featureType: "transit",
      elementType: "geometry.fill",
      stylers: [
        { hue: $main_color },
        { visibility: "on" }, 
        { lightness: $brightness }, 
        { saturation: $saturation }
      ]
    },
    {
      featureType: "transit.station",
      elementType: "geometry.fill",
      stylers: [
        { hue: $main_color },
        { visibility: "on" }, 
        { lightness: $brightness }, 
        { saturation: $saturation }
      ]
    },
    {
      featureType: "landscape",
      stylers: [
        { hue: $main_color },
        { visibility: "on" }, 
        { lightness: $brightness }, 
        { saturation: $saturation }
      ]
      
    },
    {
      featureType: "road",
      elementType: "geometry.fill",
      stylers: [
        { hue: $main_color },
        { visibility: "on" }, 
        { lightness: $brightness }, 
        { saturation: $saturation }
      ]
    },
    {
      featureType: "road.highway",
      elementType: "geometry.fill",
      stylers: [
        { hue: $main_color },
        { visibility: "on" }, 
        { lightness: $brightness }, 
        { saturation: $saturation }
      ]
    }, 
    {
      featureType: "water",
      elementType: "geometry",
      stylers: [
        { hue: $main_color },
        { visibility: "on" }, 
        { lightness: -20 }, 
        { saturation: $saturation }
      ]
    }
  ];
  
    var map = new google.maps.Map(document.getElementById('map-canvas'), {
      zoom: 12,
    panControl: false,
//    zoomControl: false,
    mapTypeControl: false,
    streetViewControl: false,
      center: new google.maps.LatLng(42.046863, -87.689456),
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      scrollwheel: false,
      styles: style,
    });
 
  
    var infowindow = new google.maps.InfoWindow({
      maxWidth: 300
    });

    var marker, i;
    var markers = new Array();

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
//        icon: $marker_url,
        icon: locations[i][4],
      });

      markers.push(marker);

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }

    function AutoCenter() {
      //  Create a new viewpoint bound
      var bounds = new google.maps.LatLngBounds();
      //  Go through each...
      $.each(markers, function (index, marker) {
      bounds.extend(marker.position);
      });
      //  Fit these bounds to the map
      map.fitBounds(bounds);
    }
    AutoCenter();
  
}