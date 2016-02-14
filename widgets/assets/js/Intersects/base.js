var esriMap = L.tileLayer('http://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Esri',
            minZoom: 0,
            maxZoom: 20,
        });

var osmMap = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'OpenStreetMap',
    minZoom: 0,
    maxZoom: 20,
});

var hereMap = L.tileLayer('http://{s}.{base}.maps.cit.api.here.com/maptile/2.1/maptile/{mapID}/satellite.day/{z}/{x}/{y}/256/png8?app_id={app_id}&app_code={app_code}', {
    attribution: 'Here',
    subdomains: '1234',
    mapID: 'newest',
    app_id: 'DemoAppId01082013GAL',
    app_code: 'AJKnXv84fjrb0KIHawS0Tg',
    base: 'aerial',
    minZoom: 0,
    maxZoom: 20,
});

var baseMaps = {
    'Esri': esriMap,
    'Osm': osmMap,
    'Here': hereMap,
};

var map = L.map('map', {fullscreenControl: true,  layers: [hereMap]}).setView([KetukerIntersects_lat, KetukerIntersects_lon], KetukerIntersects_zoom);

var options = {
   key: '873e91818a81770ead632470f0ba9325',
   limit: 10
};

// var overlayMaps = {
//     "Cities": cities
// };

layercontrol = L.control.layers(baseMaps).addTo(map);
L.Control.openCageSearch(options).addTo(map);
L.easyPrint().addTo(map);

/* Tambahan */

var measureControl = L.control.measure({ position: 'topleft' });
measureControl.addTo(map);

//var sidebar = L.control.sidebar('sidebar').addTo(map);

var miniMap = new L.Control.MiniMap(esriMap).addTo(map);

L.control.scale().addTo(map);

var drawnItems = new L.FeatureGroup();
map.addLayer(drawnItems);

var drawControl = new L.Control.Draw({
	draw: {
        polyline: false,
        rectangle: false,
        polygon: {
            allowIntersection: false,
            showArea: true,
            drawError: {
                color: '#b00b00',
                timeout: 1000
            },
            shapeOptions: {
                color: '#bada55'
            }
        },
        circle: false,
        marker: false
    },
    edit: false,
	edit: {
		featureGroup: drawnItems
	}
});
map.addControl(drawControl);

map.on('draw:created', function (e) {
	var type = e.layerType,
		layers = e.layer;

	if (type === 'polygon') {
        document.getElementById(KetukerIntersects_column).value = toWkt(layers);
        //map.removeControl(drawControl);
	}

	drawnItems.addLayer(layers);
});

function toWkt(layer) {
    var lng, lat, coords = [];
    if (layer instanceof L.Polygon || layer instanceof L.Polyline) {
        var latlngs = layer.getLatLngs();
        for (var i = 0; i < latlngs.length; i++) {
            latlngs[i]
            coords.push(latlngs[i].lng + " " + latlngs[i].lat);
            if (i === 0) {
                lng = latlngs[i].lng;
                lat = latlngs[i].lat;
            }
    };
        if (layer instanceof L.Polygon) {
            return "POLYGON((" + coords.join(",") + "," + lng + " " + lat + "))";
        } else if (layer instanceof L.Polyline) {
            return "LINESTRING(" + coords.join(",") + ")";
        }
    } else if (layer instanceof L.Marker) {
        return "POINT(" + layer.getLatLng().lng + " " + layer.getLatLng().lat + ")";
    }
}