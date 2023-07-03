<x-layout>
    <x-slot:title>
        Map
    </x-slot>

    <h1>Map</h1>

    <!--https://www.reddit.com/r/htmx/comments/usyzgn/django_htmx_and_leafletjs/-->
    <!--https://htmx.org/docs/#3rd-party-->
    
    <div id="locations">
        <!-- <div data-searched data-lat="39.8355" data-lng="-99.0909">
            Knoxville, TN
        </div> -->
        <x-locations :searched-location-name="$searched_location_name" :location-data="$location_data" />
    </div>

    <form
        hx-get="/map"
        hx-target="#locations"
    >
        <button type="submit" name="location" value="Huntsville, AL">Search Beaches Near Huntsville, AL</button>
        <button type="submit" name="location" value="Knoxville, TN">Search Beaches Near Knoxville, TN</button>
    </form>

    <div id="map"></div>


    <style type="text/css">
        #map {
            height: 600px;
        }
    </style>
    <script type="text/javascript">
        var map = L.map('map').setView([39.8355, -99.0909], 4);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var markers = L.layerGroup();

        // var marker = L.marker([35.9606, -83.9207]).addTo(map);
        // var marker = L.marker([34.7304, -86.5861]).addTo(map);

        htmx.onLoad(function(content) {
            markers.clearLayers();
            // console.log('htmx content', content)
            var mapLocations = content.querySelectorAll(".location-point");
            // console.log('map locations', mapLocations);
            if(mapLocations.length > 0) {
                // console.log('add map locations');
                for(i=0; i < mapLocations.length; i++) {
                    const lat = mapLocations[i].dataset.lat;
                    const lng = mapLocations[i].dataset.lng;
                    // console.log('lat', lat, 'lng', lng);
                    var marker = L.marker([lat, lng]).addTo(map);
                    markers.addLayer(marker);
                }

                markers.addTo(map);
            }
        });
    </script>
</x-layout>