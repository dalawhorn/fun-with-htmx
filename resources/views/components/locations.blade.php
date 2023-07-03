<div>
    @isset($searchedLocationName)
        <h2>Searched Location</h2>
        <div class="location-point" data-searched data-lat="{{ $locationData['lat'] }}" data-lng="{{ $locationData['lng'] }}">
            {{$searchedLocationName}}
        </div>
        <h2>Nearby Beaches</h2>
        @foreach($locationData['beaches'] as $beach_location_name => $beach_data)
            <div class="location-point" data-lat="{{ $beach_data['lat'] }}" data-lng="{{ $beach_data['lng'] }}">
                {{ $beach_location_name }}
            </div>
        @endforeach
    @else
        <div>Search a Location Below</div>
    @endisset
</div>