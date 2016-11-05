function mapFunc() {
    var mapCanvas = document.getElementById("map");
    var USPbndrs = [
        {id: 1, lat: -23.569874, lng: -46.712313},
        {id: 2, lat: -23.558793, lng: -46.712657},
        {id: 3, lat: -23.549307, lng: -46.732130},
        {id: 4, lat: -23.550242, lng: -46.732491},
        {id: 5, lat: -23.553657, lng: -46.733462},
        {id: 6, lat: -23.557123, lng: -46.740066},
        {id: 7, lat: -23.557199, lng: -46.741795},
        {id: 8, lat: -23.558622, lng: -46.743935},
        {id: 9, lat: -23.558913, lng: -46.747295},
        {id: 10,lat: -23.562810, lng: -46.746580},
        {id: 11,lat: -23.572888, lng: -46.737684},
        {id: 12,lat: -23.568439, lng: -46.728958},
        {id: 13,lat: -23.569395, lng: -46.725498},
        {id: 14,lat: -23.571587, lng: -46.721966},
        {id: 15,lat: -23.568956, lng: -46.715142},
    ];
    var markers = [
            {
                title: "ime",
                lat: -23.559595,
                lng: -46.731391,
                animation: google.maps.Animation.DROP,
                info: 'Teste as fuck' +
                '<b> teste de negrito embaixo</b><br><br>' +
                'teste de <em>itálico</em>',
                id: "000001",
            },
            {
                title: "Construção do IME",
                lat: -23.558672,
                lng: -46.732178,
                animation: google.maps.Animation.DROP,
                info: '<b>Contrução no bloco C do IME</b><br><br>' +
                '<b>Custo:</b> 1 zilhão de reais' +
                '<br><b>Início em:</b> 1/8/1990' +
                '<br><b>Previsão de término:</b> 1/8/1991',
            },
            {
                title: "fau",
                lat: -23.560097,
                lng: -46.729895,
                animation: google.maps.Animation.DROP,
                info: "Mais um teste",
            },
            {
                title: "io",
                lat: -23.561130,
                lng: -46.731933,
                animation: google.maps.Animation.DROP,
                info: "hehe io",
            }
        ];
    var clusterer = [];
    function loadMarkers(mark) {
        mark.forEach(function(item) {
            var latlng = new google.maps.LatLng(item.lat, item.lng);
            var marker = new google.maps.Marker({position: latlng, animation: item.animation});
            marker.setMap(map);
            google.maps.event.addListener(marker, 'click', function() {
                /* var info = new google.maps.InfoWindow({
                     content: item.info,
                });
                info.open(map, marker);
                */
                $.ajax({
                    type: "POST",
                    url: "",
                    data: "name=" + item.title +
                          "&lat=" + item.lat +
                          "&lng=" + item.lng,
                    success: function(input) {
                        //LEMBRAR DE LIMPAR A TELA!
                        console.log(input);
                    }
                });
            });
            clusterer.push(marker);
        });
    }
    var mapOptions = {
        center: new google.maps.LatLng(-23.560690, -46.728243),
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        disableDefaultUI:true,
        mapTypeControl: true,
        scaleControl: true
    }
    var USPboundaries = new google.maps.Polygon({
        path: USPbndrs,
        strokeColor: "#000000",
        strokeOpacity: 0.5,
        fillOpacity: 0,
    });
    var map = new google.maps.Map(mapCanvas, mapOptions);
    loadMarkers(markers);
    var markerCluster = new MarkerClusterer(map, clusterer,
        {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
    USPboundaries.setMap(map);
}
