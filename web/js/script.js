

//affichage de tweets au hasard pour résumé régional

//var datetime = new Date().toLocaleString();
//console.log(datetime);
//
//document.getElementById('jourCarte').innerHTML = jour + " " + mois;



if ((window.location.href).length < 50) {
    document.getElementById('statsJour').innerHTML = "Dernières statistiques";
} else {
    var urlDate = window.location.href;
    var datetime = urlDate.substr(-21);
    console.log(datetime);
    var time = datetime.substr(-8, 2);
    console.log(time);
    var year = datetime.substr(0, 4);
    console.log(year);
    var month = datetime.substr(5, 2);
    var day = datetime.substr(8, 2);


    document.getElementById('jourCarte').innerHTML = day + "/" + month + "/" + year;
    document.getElementById('heureCarte').innerHTML = time + "h";
}




//var annee = urlDate.substr()
//
//window.location.href
//2017-12-20%2012:00:00

var random = Math.random();
console.log(random);
if (random < 0.25) {
    iframeHDSPositif = iframeHDSPositif.replace("<gertrude", "<script").replace("/gertrude>", "/script>");
    $('#popularTweetPositif').html(iframeHDSPositif);

    iframeHDSNegatif = iframeHDSNegatif.replace("<gertrude", "<script").replace("/gertrude>", "/script>");
    $('#popularTweetNegatif').html(iframeHDSNegatif);
} else if (random >= 0.25 && random < 0.5) {
    iframeVDMPositif = iframeVDMPositif.replace("<gertrude", "<script").replace("/gertrude>", "/script>");
    $('#popularTweetPositif').html(iframeVDMPositif);

    iframeVDMNegatif = iframeVDMNegatif.replace("<gertrude", "<script").replace("/gertrude>", "/script>");
    $('#popularTweetNegatif').html(iframeVDMNegatif);
} else if (random >= 0.5 && random > 0.75) {
    iframeSSDPositif = iframeSSDPositif.replace("<gertrude", "<script").replace("/gertrude>", "/script>");
    $('#popularTweetPositif').html(iframeSSDPositif);

    iframeSSDNegatif = iframeSSDNegatif.replace("<gertrude", "<script").replace("/gertrude>", "/script>");
    $('#popularTweetNegatif').html(iframeSSDNegatif);
} else if (random >= 0.75) {
    iframeParisPositif = iframeParisPositif.replace("<gertrude", "<script").replace("/gertrude>", "/script>");
    $('#popularTweetPositif').html(iframeParisPositif);

    iframeParisNegatif = iframeParisNegatif.replace("<gertrude", "<script").replace("/gertrude>", "/script>");
    $('#popularTweetNegatif').html(iframeParisNegatif);
}


function getColor(note) {
    if (note <= 5) {
        return '#A4A4A4';
    }
    if (note <= 10) {
        return '#D8D8D8';
    }
    if (note <= 11) {
        return '#EFF8FB';
    }
    if (note <= 12) {
        return '#E0F2F7';
    }
    if (note <= 13) {
        return '#CEECF5';
    }
    if (note <= 14) {
        return '#A9E2F3';
    }
    if (note <= 15) {
        return '#81DAF5';
    }
    if (note <= 16) {
        return '#58D3F7';
    }
    if (note <= 17) {
        return '#2ECCFA';
    }
    if (note <= 18) {
        return '#00BFFF';
    }
    if (note <= 19) {
        return '#01A9DB';
    }
    if (note <= 20) {
        return '#0489B1';
    }
}

google.maps.event.addDomListener(window, 'load', function init() {
    // Basic options for a simple Google Map
    // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
    var mapOptions = {
        // How zoomed in you want the map to start at (always required)
        zoom: 10,

        // The latitude and longitude to center the map (always required)
        center: new google.maps.LatLng(48.856614, 2.3522219000000177),

        scrollwheel: false,

        zoomControl: false,

        streetViewControl: false,

        mapTypeControl: false,

        fullscreenControl: false    ,

        // How you would like to style the map. 
        // This is where you would paste any style found on Snazzy Maps.
        styles: [{"featureType": "all", "elementType": "geometry", "stylers": [{"color": "#63b5e5"}]}, {"featureType": "all", "elementType": "labels.text.fill", "stylers": [{"gamma": 0.01}, {"lightness": 20}]}, {"featureType": "all", "elementType": "labels.text.stroke", "stylers": [{"saturation": -31}, {"lightness": -33}, {"weight": 2}, {"gamma": 0.8}]}, {"featureType": "all", "elementType": "labels.icon", "stylers": [{"visibility": "off"}]}, {"featureType": "administrative", "elementType": "geometry", "stylers": [{"visibility": "off"}, {"color": "#756a6a"}, {"weight": "1.34"}]}, {"featureType": "administrative", "elementType": "geometry.fill", "stylers": [{"color": "#8c4040"}, {"visibility": "on"}]}, {"featureType": "administrative", "elementType": "labels", "stylers": [{"visibility": "off"}]}, {"featureType": "landscape", "elementType": "all", "stylers": [{"color": "#e6ecf0"}]}, {"featureType": "landscape", "elementType": "geometry", "stylers": [{"lightness": 30}, {"saturation": 30}]}, {"featureType": "poi", "elementType": "all", "stylers": [{"visibility": "off"}]}, {"featureType": "poi", "elementType": "geometry", "stylers": [{"saturation": 20}]}, {"featureType": "poi.park", "elementType": "geometry", "stylers": [{"lightness": 20}, {"saturation": -20}]}, {"featureType": "road", "elementType": "all", "stylers": [{"visibility": "off"}]}, {"featureType": "road", "elementType": "geometry", "stylers": [{"lightness": 10}, {"saturation": -30}]}, {"featureType": "road", "elementType": "geometry.stroke", "stylers": [{"saturation": 25}, {"lightness": 25}]}, {"featureType": "transit", "elementType": "all", "stylers": [{"visibility": "off"}]}, {"featureType": "water", "elementType": "all", "stylers": [{"lightness": -20}, {"visibility": "off"}]}]
    };

    // Get the HTML DOM element that will contain your map 
    // We are using a div with id="map" seen below in the <body>
    var mapElement = document.getElementById('map');

    // Create the Google Map using our element and options defined above
    var map = new google.maps.Map(mapElement, mapOptions);


//
// google.maps.event.addListener(map, 'click', function (event) {
//     console.log('test');
//    document.getElementById('tweet').scrollIntoView();
// });

//    google.maps.event.addListener(map, 'click', function (event) {
//        geocoder.geocode({
//            'latLng': event.latLng
//        }, function (results, status) {
//            if (status == google.maps.GeocoderStatus.OK) {
//                if (results[0]) {
//                    var dpt = results[0].formatted_address;
//
//                    var container = document.getElementById("message");
//                    var res = dpt.split(", ");
//                    dptElt = res[1];
//                    dptElt = dptElt.substr(0, 2);
//
//                    switch (dptElt) {
//                        case '77':
//                            dptElt = 'Seine et Marne';
//                            break;
//                        case '78':
//                            dptElt = 'Yvelines';
//                            break;
//                        case '75':
//                            dptElt = 'Paris';
//                            break;
//                        case '91':
//                            dptElt = 'Essonnes';
//                            break;
//                        case '92':
//                            dptElt = 'Hauts de Seine';
//                            break;
//                        case '93':
//                            dptElt = 'Seine Saint Denis';
//                            break;
//                        case '94':
//                            dptElt = 'Val de Marne';
//                            break;
//                        case '95':
//                            dptElt = 'Val d\'Oise';
//                            break;
//                        default:
//                            break;
//                    }
//                    container.innerHTML = '<span>' + dptElt + '</span>';
//                }
//            }
//        });
//    }); 
    
    var fillColorDefault = "#EBF3F8";
    
    var poly75 = new google.maps.Polygon({
        paths: polyCoords75,
        strokeColor: "#000000",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: getColor(parisMood),
        fillOpacity: 1
    });
    poly75.setMap(map);
    
    var poly77 = new google.maps.Polygon({
        paths: polyCoords77,
        strokeColor: "#000000",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: fillColorDefault,
        fillOpacity: 1
    });
    poly77.setMap(map);

    var poly78 = new google.maps.Polygon({
        paths: polyCoords78,
        strokeColor: "#000000",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: fillColorDefault,
        fillOpacity: 1
    });
    poly78.setMap(map);

    var poly91 = new google.maps.Polygon({
        paths: polyCoords91,
        strokeColor: "#000000",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: fillColorDefault,
        fillOpacity: 1
    });
    poly91.setMap(map);

    var poly92 = new google.maps.Polygon({
        paths: polyCoords92,
        strokeColor: "#000000",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: getColor(HDSMood),
        fillOpacity: 1
    });
    poly92.setMap(map);

    var poly93 = new google.maps.Polygon({
        paths: polyCoords93,
        strokeColor: "#000000",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: getColor(SSDMood),
        fillOpacity: 1
    });
    poly93.setMap(map);

    var poly94 = new google.maps.Polygon({
        paths: polyCoords94,
        strokeColor: "#000000",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: getColor(VDMMood),
        fillOpacity: 1
    });
    poly94.setMap(map);

    var poly95 = new google.maps.Polygon({
        paths: polyCoords95,
        strokeColor: "#000000",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: fillColorDefault,
        fillOpacity: 1
    });
    poly95.setMap(map);


    var humeur = "<img src ='/FirstRanger/web/img/humeur25.png'/>";
    var humeurPlus = "<img src ='/FirstRanger/web/img/humeurPlus25.png'/>";
    var humeurNeg = "<img src ='/FirstRanger/web/img/humeurNeg25.png'/>";
    var humeurNeutr = "<img src ='/FirstRanger/web/img/humeurNeutr25.png'/>";
    var stats = "<img src ='/FirstRanger/web/img/stats25.png'/>";





    google.maps.event.addListener(poly92, 'click', function (event) {
        document.getElementById('resume').innerHTML = "<div class='titlehome'><strong>Hauts-de-Seine</strong></div><br><div id='blocHumeur'>" + humeur + " Humeur du département : " + HDSMood + " / 20<br>" + stats + " Nombre total de tweets : " + HDSTotalQuantity + "<br>" + humeurPlus + " Proportion de tweets positifs : " + (HDSPositivePercentage * 100).toFixed(2) + " %<br>" + humeurNeg + " Proportion de tweets négatifs : " + (HDSNegativePercentage * 100).toFixed(2) + " %<br>" + humeurNeutr + " Proportion de tweets neutres : " + (HDSNeutralPercentage * 100).toFixed(2) + " %<br></div>";

        iframeHDSPositif = iframeHDSPositif.replace("<gertrude", "<script").replace("/gertrude>", "/script>");
        $('#popularTweetPositif').html(iframeHDSPositif);

        iframeHDSNegatif = iframeHDSNegatif.replace("<gertrude", "<script").replace("/gertrude>", "/script>");
        $('#popularTweetNegatif').html(iframeHDSNegatif);
        $('html, body').animate({ scrollTop: $(".titlehome").offset().top }, 1000); 
    });
    google.maps.event.addListener(poly94, 'click', function (event) {
        document.getElementById('resume').innerHTML = "<div class='titlehome'><strong>Val-de-Marne</strong></div><br><div id='blocHumeur'>" + humeur + " Humeur du département : " + VDMMood + " / 20<br>" + stats + " Nombre total de tweets : " + VDMTotalQuantity + "<br>" + humeurPlus + " Proportion de tweets positifs : " + (VDMPositivePercentage * 100).toFixed(2) + " %<br>" + humeurNeg + " Proportion de tweets négatifs : " + (VDMNegativePercentage * 100).toFixed(2) + " %<br>" + humeurNeutr + " Proportion de tweets neutres : " + (VDMNeutralPercentage * 100).toFixed(2) + " %<br></div>";
        iframeVDMPositif = iframeVDMPositif.replace("<gertrude", "<script").replace("/gertrude>", "/script>");
        $('#popularTweetPositif').html(iframeVDMPositif);

        iframeVDMNegatif = iframeVDMNegatif.replace("<gertrude", "<script").replace("/gertrude>", "/script>");
        $('#popularTweetNegatif').html(iframeVDMNegatif);
        $('html, body').animate({ scrollTop: $(".titlehome").offset().top }, 1000);
        
    });
    google.maps.event.addListener(poly93, 'click', function (event) {
        document.getElementById('resume').innerHTML = "<div class='titlehome'><strong>Seine-Saint-Denis</strong></div><br><div id='blocHumeur'>" + humeur + " Humeur du département : " + SSDMood + " / 20<br>" + stats + " Nombre total de tweets : " + SSDTotalQuantity + "<br>" + humeurPlus + " Proportion de tweets positifs : " + (SSDPositivePercentage * 100).toFixed(2) + " %<br>" + humeurNeg + " Proportion de tweets négatifs : " + (SSDNegativePercentage * 100).toFixed(2) + " %<br>" + humeurNeutr + " Proportion de tweets neutres : " + (SSDNeutralPercentage * 100).toFixed(2) + " %<br><div>";
        iframeSSDPositif = iframeSSDPositif.replace("<gertrude", "<script").replace("/gertrude>", "/script>");
        $('#popularTweetPositif').html(iframeSSDPositif);

        iframeSSDNegatif = iframeSSDNegatif.replace("<gertrude", "<script").replace("/gertrude>", "/script>");
        $('#popularTweetNegatif').html(iframeSSDNegatif);
        $('html, body').animate({ scrollTop: $(".titlehome").offset().top }, 1000);
    });
    google.maps.event.addListener(poly75, 'click', function (event) {
        document.getElementById('resume').innerHTML = "<div class='titlehome'><strong>Paris</strong></div><br><div id='blocHumeur'>" + humeur + " Humeur du département : " + parisMood + " / 20<br>" + stats + " Nombre total de tweets : " + parisTotalQuantity + "<br>" + humeurPlus + " Proportion de tweets positifs : " + (parisPositivePercentage * 100).toFixed(2) + " %<br>" + humeurNeg + " Proportion de tweets négatifs : " + (parisNegativePercentage * 100).toFixed(2) + " %<br>" + humeurNeutr + " Proportion de tweets neutres : " + (parisNeutralPercentage * 100).toFixed(2) + " %<br></div>";

        iframeParisPositif = iframeParisPositif.replace("<gertrude", "<script").replace("/gertrude>", "/script>");
        $('#popularTweetPositif').html(iframeParisPositif);

        iframeParisNegatif = iframeParisNegatif.replace("<gertrude", "<script").replace("/gertrude>", "/script>");
        $('#popularTweetNegatif').html(iframeParisNegatif);
        $('html, body').animate({ scrollTop: $(".titlehome").offset().top }, 1000);
        var loading = $('#popularTweetNegatif');
loading.hide();

setTimeout(function(){loading.show();
    $('.loader').hide();
}, 800);
console.log('clique'); 
    });



});



document.getElementById('formulaire').addEventListener('submit', function (e) {
    e.preventDefault();
    var annee = document.getElementById('annee').value;
    var mois = document.getElementById('mois').value;
    var jour = document.getElementById('jour').value;
    var heure = document.getElementById('heure').value;
    var hour = annee + "-" + mois + "-" + jour + " " + heure + ":00";
    console.log(hour);
    window.location = URL + hour;



});

var loading = $('#popularTweetNegatif');
loading.hide();

setTimeout(function(){loading.show();
    $('.loader').toggleClass();   }, 2500);
console.log('clique');  
  