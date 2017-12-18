google.maps.event.addDomListener(window, 'load', init);

function init() {
    // Basic options for a simple Google Map
    // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
    var mapOptions = {
        // How zoomed in you want the map to start at (always required)
        zoom: 10,

        // The latitude and longitude to center the map (always required)
        center: new google.maps.LatLng(48.856614, 2.3522219000000177),

        // How you would like to style the map. 
        // This is where you would paste any style found on Snazzy Maps.
        styles: [{"featureType": "administrative", "elementType": "geometry", "stylers": [{"visibility": "on"}]}, {"featureType": "administrative", "elementType": "labels", "stylers": [{"visibility": "off"}]}, {"featureType": "administrative.country", "elementType": "geometry", "stylers": [{"visibility": "on"}]}, {"featureType": "administrative.province", "elementType": "geometry", "stylers": [{"visibility": "on"}]}, {"featureType": "administrative.locality", "elementType": "geometry", "stylers": [{"visibility": "on"}]}, {"featureType": "administrative.neighborhood", "elementType": "all", "stylers": [{"visibility": "off"}]}, {"featureType": "landscape", "elementType": "all", "stylers": [{"visibility": "off"}]}, {"featureType": "poi", "elementType": "all", "stylers": [{"visibility": "off"}]}, {"featureType": "road", "elementType": "all", "stylers": [{"visibility": "off"}]}, {"featureType": "transit", "elementType": "all", "stylers": [{"visibility": "off"}]}, {"featureType": "water", "elementType": "all", "stylers": [{"visibility": "off"}]}]
    };

    // Get the HTML DOM element that will contain your map 
    // We are using a div with id="map" seen below in the <body>
    var mapElement = document.getElementById('map');

    // Create the Google Map using our element and options defined above
    var map = new google.maps.Map(mapElement, mapOptions);

    var geocoder = new google.maps.Geocoder();

    google.maps.event.addListener(map, 'click', function (event) {
        geocoder.geocode({
            'latLng': event.latLng
        }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    var dpt = results[0].formatted_address;

                    var container = document.getElementById("message");
                    var res = dpt.split(", ");
                    dptElt = res[1];
                    dptElt = dptElt.substr(0, 2);

                    switch (dptElt) {
                        case '77':
                            dptElt = 'Seine et Marne';
                            break;
                        case '78':
                            dptElt = 'Yvelines';
                            break;
                        case '75':
                            dptElt = 'Paris';
                            break;
                        case '91':
                            dptElt = 'Essonnes';
                            break;
                        case '92':
                            dptElt = 'Hauts de Seine';
                            break;
                        case '93':
                            dptElt = 'Seine Saint Denis';
                            break;
                        case '94':
                            dptElt = 'Val de Marne';
                            break;
                        case '95':
                            dptElt = 'Val d\'Oise';
                            break;
                        default:
                            break;
                    }
                    container.innerHTML = '<span>' + dptElt + '</span>';
                }
            }
        });
    });
    var polyCoords94 = [

        new google.maps.LatLng(48.8488878, 2.416766300000063),
        new google.maps.LatLng(48.83320759999999, 2.41194059999998),
        new google.maps.LatLng(48.82902259999999, 2.402457400000003),
        new google.maps.LatLng(48.81990769999999, 2.37614039999994),
        new google.maps.LatLng(48.81558, 2.361407600000007),
        new google.maps.LatLng(48.8153898, 2.35571989999994),
        new google.maps.LatLng(48.8180393, 2.3521335000000363),
        new google.maps.LatLng(48.81582359999999, 2.347524700000008),
        new google.maps.LatLng(48.81603550000001, 2.338626599999998),
        new google.maps.LatLng(48.8167549, 2.332215499999961),
        new google.maps.LatLng(48.8091825, 2.326111399999945),
        new google.maps.LatLng(48.8096893, 2.3194704),
        new google.maps.LatLng(48.805841, 2.318786799999998),
        new google.maps.LatLng(48.8054862, 2.3242748999999776),
        new google.maps.LatLng(48.8080945, 2.326774900000032),
        new google.maps.LatLng(48.8021979, 2.3246732000000065),
        new google.maps.LatLng(48.7949499, 2.3216383999999834),
        new google.maps.LatLng(48.78755140000001, 2.3191067000000203),
        new google.maps.LatLng(48.7859668, 2.325259800000026),
        new google.maps.LatLng(48.7789912, 2.325376199999937),
        new google.maps.LatLng(48.774438, 2.322952600000008),
        new google.maps.LatLng(48.7673831, 2.3176341999999295),
        new google.maps.LatLng(48.7621352, 2.3139959999999746),
        new google.maps.LatLng(48.75526259999999, 2.3091693000000078),
        new google.maps.LatLng(48.75439309999999, 2.31144919999997),
        new google.maps.LatLng(48.7521752, 2.31078679999996),
        new google.maps.LatLng(48.7479999, 2.3230475000000297),
        new google.maps.LatLng(48.7501804, 2.3250152000000526),
        new google.maps.LatLng(48.75200110000001, 2.3242301000000225),
        new google.maps.LatLng(48.7488508, 2.329867799999988),
        new google.maps.LatLng(48.7456664, 2.3368123999999852),
        new google.maps.LatLng(48.7437398, 2.34199650000005),
        new google.maps.LatLng(48.74092049999999, 2.348502499999995),
        new google.maps.LatLng(48.7379709, 2.3548686000000316),
        new google.maps.LatLng(48.7426126, 2.3600569999999834),
        new google.maps.LatLng(48.7438822, 2.3627228999999943),
        new google.maps.LatLng(48.7448728, 2.363566799999944),
        new google.maps.LatLng(48.745373, 2.369093600000042),
        new google.maps.LatLng(48.7200561, 2.371068599999944),
        new google.maps.LatLng(48.7177885, 2.386508899999967),
        new google.maps.LatLng(48.7188884, 2.389346700000033),
        new google.maps.LatLng(48.7231807, 2.4025183999999626),
        new google.maps.LatLng(48.7259188, 2.411111900000037),
        new google.maps.LatLng(48.72182429999999, 2.41114970000001),
        new google.maps.LatLng(48.7207699, 2.415872600000057),
        new google.maps.LatLng(48.7206505, 2.4155703999999787),
        new google.maps.LatLng(48.7197389, 2.4155852000000095),
        new google.maps.LatLng(48.7202277, 2.4212623999999323),
        new google.maps.LatLng(48.7220126, 2.4256646999999703),
        new google.maps.LatLng(48.7261359, 2.4397791000000097),
        new google.maps.LatLng(48.72426859999999, 2.443602700000042),
        new google.maps.LatLng(48.7141657, 2.4505249999999705),
        new google.maps.LatLng(48.7172417, 2.4483353000000534),
        new google.maps.LatLng(48.72293250000001, 2.448542800000041),
        new google.maps.LatLng(48.7199846, 2.4543244999999843),
        new google.maps.LatLng(48.72176049999999, 2.456767300000024),
        new google.maps.LatLng(48.72346599999999, 2.4513538999999582),
        new google.maps.LatLng(48.7243213, 2.454611200000045),
        new google.maps.LatLng(48.7236508, 2.4602345000000696),
        new google.maps.LatLng(48.7246229, 2.4600769999999557),
        new google.maps.LatLng(48.7263616, 2.464225400000032),
        new google.maps.LatLng(48.7307571, 2.463345200000049),
        new google.maps.LatLng(48.72708910000001, 2.470437199999992),
        new google.maps.LatLng(48.726037, 2.4810399000000416),
        new google.maps.LatLng(48.7327557, 2.4975405000000137),
        new google.maps.LatLng(48.73641629999999, 2.506767200000013),
        new google.maps.LatLng(48.7317428, 2.5087730000000192),
        new google.maps.LatLng(48.7363806, 2.5104923999999755),
        new google.maps.LatLng(48.7293491, 2.5150121000000354),
        new google.maps.LatLng(48.7160587, 2.5182187999999996),
        new google.maps.LatLng(48.709794, 2.522926900000016),
        new google.maps.LatLng(48.7095588, 2.526538100000039),
        new google.maps.LatLng(48.7078788, 2.5279480000000376),
        new google.maps.LatLng(48.7050733, 2.5296513000000687),
        new google.maps.LatLng(48.70479419999999, 2.527093499999978),
        new google.maps.LatLng(48.6985311, 2.532368799999972),
        new google.maps.LatLng(48.7007539, 2.535754699999984),
        new google.maps.LatLng(48.6972879, 2.5367774000000054),
        new google.maps.LatLng(48.69844639999999, 2.544482099999982),
        new google.maps.LatLng(48.696744, 2.5430996999999707),
        new google.maps.LatLng(48.694633, 2.5446914000000334),
        new google.maps.LatLng(48.69366309999999, 2.5450005999999803),
        new google.maps.LatLng(48.69007449999999, 2.5511741999999913),
        new google.maps.LatLng(48.6885033, 2.5497338000000127),
        new google.maps.LatLng(48.68736, 2.5557475000000522),
        new google.maps.LatLng(48.6883843, 2.5549932000000126),
        new google.maps.LatLng(48.6884716, 2.5572515999999723),
        new google.maps.LatLng(48.6912859, 2.5574070999999776),
        new google.maps.LatLng(48.6866041, 2.566321799999969),
        new google.maps.LatLng(48.6866041, 2.566321799999969),
        new google.maps.LatLng(48.6882907, 2.5728257000000667),
        new google.maps.LatLng(48.6960943, 2.560529900000006),
        new google.maps.LatLng(48.6971517, 2.5751946999999973),
        new google.maps.LatLng(48.6973588, 2.579797800000051),
        new google.maps.LatLng(48.6882907, 2.5728257000000667),

        new google.maps.LatLng(48.7018731, 2.5694131999999854),
        new google.maps.LatLng(48.71133589999999, 2.575389399999949),
        new google.maps.LatLng(48.71133589999999, 2.575389399999949),
        new google.maps.LatLng(48.7219255, 2.579243099999985),
        new google.maps.LatLng(48.7292676, 2.588307699999973),
        new google.maps.LatLng(48.735549, 2.5894984999999906),
        new google.maps.LatLng(48.7473428, 2.5942265999999563),
        new google.maps.LatLng(48.7554526, 2.6034627999999884),
        new google.maps.LatLng(48.7602533, 2.597587800000042),
        new google.maps.LatLng(48.7577522, 2.6154231000000436),
        new google.maps.LatLng(48.7715979, 2.6097677000000203),
        new google.maps.LatLng(48.7718454, 2.5888099999999667),
        new google.maps.LatLng(48.7785111, 2.586681399999975),
        new google.maps.LatLng(48.7779543, 2.590289900000016),
        new google.maps.LatLng(48.7825242, 2.589018699999997),
        new google.maps.LatLng(48.784747, 2.5925737999999683),
        new google.maps.LatLng(48.7847352, 2.5954050999999936),
        new google.maps.LatLng(48.7894471, 2.597054899999989),
        new google.maps.LatLng(48.7943213, 2.6003846999999496),
        new google.maps.LatLng(48.7974304, 2.5911836999999878),
        new google.maps.LatLng(48.8048195, 2.5954982000000655),
        new google.maps.LatLng(48.8084183, 2.590403400000014),
        new google.maps.LatLng(48.8189703, 2.5659008000000085),
        new google.maps.LatLng(48.8231739, 2.572134300000016),
        new google.maps.LatLng(48.82645580000001, 2.562219099999993),
        new google.maps.LatLng(48.83119259999999, 2.557394899999963),
        new google.maps.LatLng(48.8312326, 2.5555219000000307),
        new google.maps.LatLng(48.834217, 2.5481598999999733),
        new google.maps.LatLng(48.8382182, 2.5373692000000574),
        new google.maps.LatLng(48.8392503, 2.5399638000000095),
        new google.maps.LatLng(48.84271769999999, 2.5294335999999475),
        new google.maps.LatLng(48.8485814, 2.5252209999999877),
        new google.maps.LatLng(48.84466339999999, 2.5346941000000243),
        new google.maps.LatLng(48.8476317, 2.5190666999999394),
        new google.maps.LatLng(48.8507505, 2.515833799999996),
        new google.maps.LatLng(48.8520923, 2.51207009999996),
        new google.maps.LatLng(48.856885, 2.5053378999999723),
        new google.maps.LatLng(48.8555929, 2.497221599999989),
        new google.maps.LatLng(48.8592496, 2.4921962999999323),
        new google.maps.LatLng(48.859782, 2.4806943999999476),
        new google.maps.LatLng(48.856157, 2.4677504),
        new google.maps.LatLng(48.85193140000001, 2.447837400000026),
        new google.maps.LatLng(48.85048399999999, 2.4347907000000077),
        new google.maps.LatLng(48.848524, 2.429343000000017),
        new google.maps.LatLng(48.8489667, 2.4173051000000214)



    ];

    var poly = new google.maps.Polygon({
        paths: polyCoords94,
        strokeColor: "#000000",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "#fa58f4",
        fillOpacity: 1
    });

    poly.setMap(map);



    var polyCoords93 = [

        new google.maps.LatLng(48.9496303, 2.293935000000033),
        new google.maps.LatLng(48.9577748, 2.289344099999994),
        new google.maps.LatLng(48.96159859999999, 2.290983800000049),
        new google.maps.LatLng(48.965848, 2.2995756000000256),
        new google.maps.LatLng(48.961745, 2.305095700000038),
        new google.maps.LatLng(48.96380449999999, 2.309601599999951),
        new google.maps.LatLng(48.9614627, 2.3106308999999783),
        new google.maps.LatLng(48.9623852, 2.3128371000000243),
        new google.maps.LatLng(48.9574432, 2.3226518999999826),
        new google.maps.LatLng(48.9584906, 2.327530799999977),
        new google.maps.LatLng(48.9551756, 2.3334641000000147),
        new google.maps.LatLng(48.9680982, 2.344052099999999),
        new google.maps.LatLng(48.9672501, 2.3497310000000198),
        new google.maps.LatLng(48.9672501, 2.3497310000000198),
        new google.maps.LatLng(48.9655122, 2.3533426999999847),
        new google.maps.LatLng(48.968606, 2.357496099999935),
        new google.maps.LatLng(48.9724942, 2.3594605000000684),
        new google.maps.LatLng(48.9736146, 2.3613424000000123),
        new google.maps.LatLng(48.9728013, 2.365465900000004),
        new google.maps.LatLng(48.9736859, 2.3667732000000115),
        new google.maps.LatLng(48.9708318, 2.3843532999999297),
        new google.maps.LatLng(48.9641044, 2.3910809999999856),
        new google.maps.LatLng(48.9598939, 2.4048771000000215),
        new google.maps.LatLng(48.9552515, 2.4091984000000366),
        new google.maps.LatLng(48.9584468, 2.4179665999999997),
        new google.maps.LatLng(48.95744209999999, 2.4224964999999656),
        new google.maps.LatLng(48.95744209999999, 2.4224964999999656),
        new google.maps.LatLng(48.9562773, 2.460604999999987),
        new google.maps.LatLng(48.9649805, 2.468748499999947),
        new google.maps.LatLng(48.96634599999999, 2.475373999999988),
        new google.maps.LatLng(48.9689284, 2.4803779000000077),
        new google.maps.LatLng(48.9808214, 2.515033600000038),
        new google.maps.LatLng(49.0036418, 2.5351144999999633),
        new google.maps.LatLng(49.0031002, 2.549126200000046),
        new google.maps.LatLng(49.0101719, 2.5549234999999726),
        new google.maps.LatLng(49.0100475, 2.5706319999999323),
        new google.maps.LatLng(49.0066209, 2.570231299999932),
        new google.maps.LatLng(49.0066209, 2.570231299999932),
        new google.maps.LatLng(49.00256, 2.5738767999999936),
        new google.maps.LatLng(49.0028003, 2.5719861999999694),
        new google.maps.LatLng(49.0021608, 2.5832304000000477),
        new google.maps.LatLng(48.9918515, 2.581742800000029),
        new google.maps.LatLng(48.9824409, 2.582371999999964),
        new google.maps.LatLng(48.9824409, 2.582371999999964),
        new google.maps.LatLng(48.9824409, 2.582371999999964),
        new google.maps.LatLng(48.9648625, 2.5762608999999657),
        new google.maps.LatLng(48.9567863, 2.583583200000021),
        new google.maps.LatLng(48.956455, 2.5861790000000155),
        new google.maps.LatLng(48.946527, 2.5935620999999855),
        new google.maps.LatLng(48.93838299999999, 2.59673250000003),
        new google.maps.LatLng(48.9372815, 2.6035984999999755),
        new google.maps.LatLng(48.9312589, 2.6031394999999975),
        new google.maps.LatLng(48.9279501, 2.6030364000000645),
        new google.maps.LatLng(48.927951, 2.602899500000035),
        new google.maps.LatLng(48.9220206, 2.5957399000000123),
        new google.maps.LatLng(48.9214053, 2.5910535000000436),
        new google.maps.LatLng(48.9157148, 2.5874882000000525),
        new google.maps.LatLng(48.9157753, 2.5909242000000177),
        new google.maps.LatLng(48.9154519, 2.5899520000000393),
        new google.maps.LatLng(48.9154986, 2.590518100000054),
        new google.maps.LatLng(48.9133073, 2.5903748000000633),
        new google.maps.LatLng(48.9133874, 2.5899553000000424),
        new google.maps.LatLng(48.9118424, 2.5892624000000524),
        new google.maps.LatLng(48.9116182, 2.5908898000000136),
        new google.maps.LatLng(48.9089883, 2.5895143999999846),
        new google.maps.LatLng(48.9072456, 2.5929817999999614),
        new google.maps.LatLng(48.90509549999999, 2.589696099999969),
        new google.maps.LatLng(48.9032596, 2.5849656000000323),
        new google.maps.LatLng(48.8984782, 2.589860700000031),
        new google.maps.LatLng(48.8950244, 2.5854604999999538),
        new google.maps.LatLng(48.8909975, 2.5703849999999875),
        new google.maps.LatLng(48.8874625, 2.56109390000006),
        new google.maps.LatLng(48.8853667, 2.559128200000032),
        new google.maps.LatLng(48.8801959, 2.560934800000041),
        new google.maps.LatLng(48.8806083, 2.5668776999999636),
        new google.maps.LatLng(48.8811404, 2.5673378000000184),
        new google.maps.LatLng(48.8810191, 2.568910200000005),
        new google.maps.LatLng(48.8794494, 2.571769099999983),
        new google.maps.LatLng(48.86900000000001, 2.570524500000033),
        new google.maps.LatLng(48.8673553, 2.5738718000000063),
        new google.maps.LatLng(48.8645967, 2.5762621999999737),
        new google.maps.LatLng(48.8645675, 2.5879598000000215),
        new google.maps.LatLng(48.8600175, 2.5874330000000327),
        new google.maps.LatLng(48.8583624, 2.5839167000000316),
        new google.maps.LatLng(48.858611, 2.5817176000000472),
        new google.maps.LatLng(48.8551957, 2.583578100000068),
        new google.maps.LatLng(48.8551351, 2.5799180999999862),
        new google.maps.LatLng(48.85368279999999, 2.5748728999999457),
        new google.maps.LatLng(48.833406, 2.587374700000055),
        new google.maps.LatLng(48.83251449999999, 2.586359899999934),
        new google.maps.LatLng(48.8304096, 2.585599699999989),
        new google.maps.LatLng(48.8285054, 2.5858983000000535),
        new google.maps.LatLng(48.82647739999999, 2.5867058000000043),
        new google.maps.LatLng(48.8239865, 2.586259899999959),
        new google.maps.LatLng(48.8274963, 2.5920255999999426),
        new google.maps.LatLng(48.8231215, 2.5914060000000063),
        new google.maps.LatLng(48.8211376, 2.5925357999999505),
        new google.maps.LatLng(48.8169323, 2.5942512999999963),
        new google.maps.LatLng(48.8169323, 2.5942512999999963),
        new google.maps.LatLng(48.8099104, 2.596126099999992),
        new google.maps.LatLng(48.8057396, 2.5965340000000197),
        new google.maps.LatLng(48.8048195, 2.5954982000000655),
        new google.maps.LatLng(48.8191657, 2.5662700000000314),
        new google.maps.LatLng(48.8263952, 2.562378399999943),
        new google.maps.LatLng(48.8311254, 2.5576479000000063),
        new google.maps.LatLng(48.8312326, 2.5555219000000307),
        new google.maps.LatLng(48.8382182, 2.5373692000000574),
        new google.maps.LatLng(48.8392503, 2.5399638000000095),
        new google.maps.LatLng(48.8427055, 2.529735399999936),
        new google.maps.LatLng(48.8459387, 2.5271955000000617),
        new google.maps.LatLng(48.844511, 2.5348913000000266),
        new google.maps.LatLng(48.8485814, 2.5252209999999877),
        new google.maps.LatLng(48.8462368, 2.526625400000057),
        new google.maps.LatLng(48.8476317, 2.5190666999999394),
        new google.maps.LatLng(48.8506527, 2.516023799999971),
        new google.maps.LatLng(48.856885, 2.5053378999999723),
        new google.maps.LatLng(48.8555929, 2.497221599999989),
        new google.maps.LatLng(48.8592496, 2.4921962999999323),
        new google.maps.LatLng(48.859782, 2.4806943999999476),
        new google.maps.LatLng(48.85194509999999, 2.4477071000000024),
        new google.maps.LatLng(48.85048399999999, 2.4347907000000077),
        new google.maps.LatLng(48.848524, 2.429343000000017),
        new google.maps.LatLng(48.8491363, 2.4165576999999985),
        new google.maps.LatLng(48.876165, 2.412978100000032),
        new google.maps.LatLng(48.8801512, 2.410078399999975),
        new google.maps.LatLng(48.8819743, 2.4029868999999735),
        new google.maps.LatLng(48.8850673, 2.3998807000000397),
        new google.maps.LatLng(48.8942871, 2.3980688999999984),
        new google.maps.LatLng(48.9006135, 2.3212747000000036),
        new google.maps.LatLng(48.9132592, 2.314632999999958),
        new google.maps.LatLng(48.9151385, 2.3216856000000234),
        new google.maps.LatLng(48.92046269999999, 2.325958300000025),
        new google.maps.LatLng(48.9270116, 2.3353389000000107),
                // new google.maps.LatLng(48.9287054, 2.333629999999971),
                // new google.maps.LatLng(48.8942871, 2.3980688999999984),


    ];

    var poly = new google.maps.Polygon({
        paths: polyCoords93,
        strokeColor: "#000000",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "#fbeffb",
        fillOpacity: 1
    });
    poly.setMap(map);



    var polyCoords75 = [

        new google.maps.LatLng(48.8318871, 2.2798812999999427),

        new google.maps.LatLng(48.8170397, 2.3324322999999367),
        new google.maps.LatLng(48.81841610000001, 2.3523907999999665),
        new google.maps.LatLng(48.8153898, 2.35571989999994),
        new google.maps.LatLng(48.81558, 2.361407600000007),
        new google.maps.LatLng(48.83320759999999, 2.41194059999998),
        new google.maps.LatLng(48.84887210000001, 2.4165934999999763),
        new google.maps.LatLng(48.876165, 2.412978100000032),
        new google.maps.LatLng(48.8800906, 2.410351999999989),

        new google.maps.LatLng(48.8817347, 2.4030264000000443),
        new google.maps.LatLng(48.8845839, 2.400052599999981),
        new google.maps.LatLng(48.8941476, 2.3979546000000482),
        new google.maps.LatLng(48.9002152, 2.32086419999996),
        new google.maps.LatLng(48.8896691, 2.2955881999999974),
        new google.maps.LatLng(48.8830266, 2.28107829999999),
        new google.maps.LatLng(48.8784255, 2.280630100000053),

        new google.maps.LatLng(48.87773050000001, 2.2777121999999963),
        new google.maps.LatLng(48.8803439, 2.2592548999999735),
        new google.maps.LatLng(48.8733985, 2.255983399999991),
        new google.maps.LatLng(48.8754941, 2.24584440000001),
        new google.maps.LatLng(48.8678654, 2.2339663999999857),
        new google.maps.LatLng(48.8532291, 2.225804100000005),
        new google.maps.LatLng(48.84891930000001, 2.2403629000000365),

        new google.maps.LatLng(48.8345955, 2.2557249000000184),
        new google.maps.LatLng(48.83325809999999, 2.263652699999966),
        new google.maps.LatLng(48.8348036, 2.2688259000000244),
        new google.maps.LatLng(48.8332183, 2.2703811000000087),
        new google.maps.LatLng(48.8313142, 2.2672211999999945),
        new google.maps.LatLng(48.8276569, 2.267981700000064),
        new google.maps.LatLng(48.8277265, 2.2729276000000027),
    ];

    var poly = new google.maps.Polygon({
        paths: polyCoords75,
        strokeColor: "#000000",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "#F6CEEC",
        fillOpacity: 1
    });
    poly.setMap(map);

    var polyCoords92 = [

        new google.maps.LatLng(48.8532291, 2.225804100000005),
        new google.maps.LatLng(48.8678123, 2.233827799999972),
        new google.maps.LatLng(48.8741223, 2.2446482000000287),
        new google.maps.LatLng(48.8733985, 2.255983399999991),
        new google.maps.LatLng(48.8803495, 2.259209700000042),
        new google.maps.LatLng(48.87773050000001, 2.2777121999999963),
        new google.maps.LatLng(48.8784255, 2.280630100000053),
        new google.maps.LatLng(48.8830866, 2.2806123999999954),
        new google.maps.LatLng(48.90054809999999, 2.3209300999999414),
        new google.maps.LatLng(48.91205129999999, 2.314677599999982),
        new google.maps.LatLng(48.9151385, 2.3216856000000234),
        new google.maps.LatLng(48.92046269999999, 2.325958300000025),
        new google.maps.LatLng(48.9270116, 2.3353389000000107),
        new google.maps.LatLng(48.9287054, 2.333629999999971),
        new google.maps.LatLng(48.9496303, 2.293935000000033),
        new google.maps.LatLng(48.9461199, 2.271820400000024),
        new google.maps.LatLng(48.9085427, 2.202087000000006),
        new google.maps.LatLng(48.8872959, 2.163806700000009),
        new google.maps.LatLng(48.8972511, 2.174778599999968),
        new google.maps.LatLng(48.8824398, 2.1637943000000632),
        new google.maps.LatLng(48.8793707, 2.158673799999974),
        new google.maps.LatLng(48.8683023, 2.14956959999995),
        new google.maps.LatLng(48.8694812, 2.1587849000000006),
        new google.maps.LatLng(48.8557654, 2.1510087999999996),
        new google.maps.LatLng(48.8557654, 2.1510087999999996),

        new google.maps.LatLng(48.8472708, 2.1596223000000236),
        new google.maps.LatLng(48.8480013, 2.1511801000000332),
        new google.maps.LatLng(48.8412465, 2.1461446000000706),
        new google.maps.LatLng(48.8388919, 2.14651989999993),
        new google.maps.LatLng(48.8217265, 2.1530669999999645),
        new google.maps.LatLng(48.8160154, 2.1546193000000358),
        new google.maps.LatLng(48.8118425, 2.1677574999999933),
        new google.maps.LatLng(48.8159787, 2.169401099999959),
        new google.maps.LatLng(48.8132556, 2.176403100000016),
        new google.maps.LatLng(48.8048519, 2.183869100000038),
        new google.maps.LatLng(48.8001031, 2.1826469999999745),
        new google.maps.LatLng(48.7969816, 2.183620900000051),
        new google.maps.LatLng(48.798585, 2.1980510999999296),
        new google.maps.LatLng(48.7951783, 2.2054626000000326),
        new google.maps.LatLng(48.7837175, 2.2080499999999574),
        new google.maps.LatLng(48.7855015, 2.2246982000000344),
        new google.maps.LatLng(48.7805685, 2.2271447000000535),
        new google.maps.LatLng(48.7761517, 2.226961899999992),
        new google.maps.LatLng(48.7665271, 2.2330524000000196),
        new google.maps.LatLng(48.759852, 2.247501300000067),
        new google.maps.LatLng(48.7623602, 2.2673230999999987),
        new google.maps.LatLng(48.7461208, 2.284807799999953),
        new google.maps.LatLng(48.73921319999999, 2.2753725999999688),
        new google.maps.LatLng(48.7326641, 2.281670100000042),
        new google.maps.LatLng(48.7400042, 2.302570400000036),
        new google.maps.LatLng(48.7287152, 2.305699900000036),
        new google.maps.LatLng(48.7357962, 2.3174506000000292),
        new google.maps.LatLng(48.7433804, 2.315761299999963),
        new google.maps.LatLng(48.7487333, 2.3203816999999844),
        new google.maps.LatLng(48.7788845, 2.3244925000000194),
        new google.maps.LatLng(48.78550329999999, 2.3251622000000225),
        new google.maps.LatLng(48.7870106, 2.3189489000000094),
        new google.maps.LatLng(48.8079236, 2.3265416000000414),
        new google.maps.LatLng(48.8170449, 2.331843400000025),
    ];
    var param = '';
    var poly92 = new google.maps.Polygon({
        paths: polyCoords92,
        strokeColor: "#000000",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "#f5a9f2",
        fillOpacity: 1
    });
    
    poly92.setMap(map);
    
    google.maps.event.addListener(poly92, 'click', function (event) {
        console.log('test');
        param = '&dpt=' + 92;
        monAjax(param);
    });

    

    function monAjax(arg) {
        //e.preventDefault();
        var file = '../recentDistrictMap.php';

        if (window.XMLHttpRequest) //car certains nav comme IE n'ont pas ça.
            var xhttp = new XMLHttpRequest();
        else // pour IE
            var xhttp = new ActiveXObject("Microsoft.XMLHTTP");
        
        console.log(arg);

        xhttp.open("POST", file, true); // on écrit la demande envoyée au serveur, ie envoie de la variable file (fichier.php)
        //la ligne suivante est obligatoire en methode POST
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhttp.onreadystatechange = function () {
            if (xhttp.status == 200 && xhttp.readyState == 4) {
                console.log(xhttp.responseText);
                var result = xhttp.responseText;//je stocke le résultat de la requête dans une variable
                document.getElementById('message').textcontent = result;
                console.log(result);

                
            }
        }
        xhttp.send(param);
    }
}

$('.datepicker').datepicker({
    autoclose: true,
});