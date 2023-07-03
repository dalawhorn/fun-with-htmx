<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public $locations = [
        'Huntsville, AL' => [
            'lat' => '34.7304',
            'lng' => '-86.5861',
            'beaches' => [
                'Panama City Beach, FL' => [
                    'lat' => '30.1766',
                    'lng' => '-85.8055'
                ]
            ]
        ],
        'Knoxville, TN' => [
            'lat' => '35.9606',
            'lng' => '-83.9207',
            'beaches' => [
                'Myrtle Beach, SC' => [
                    'lat' => '33.6891',
                    'lng' => '-78.8867'
                ]
            ]
        ],
    ];

    public function index(Request $request) {
        $location_data = [];
        $location = null;
        if($request->filled('location')) {
            $location = $request->get('location');
            if(isset($this->locations[$location])) {
                $location_data = $this->locations[$location];
            }
        }

        if($request->header('HX-Request', false)) {
            return view('components.locations', ['searchedLocationName' => $location, 'locationData' => $location_data]);
        } 
        else {
            return view('map', ['searched_location_name' => $location, 'location_data' => $location_data]);
        }
    }
}
