<?php

namespace App\Http\Controllers;


use App\Models\LokasiPenjemputan;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;
use Geocoder\Provider\GoogleMaps\GoogleMaps;
use Geocoder\Query\GeocodeQuery;
use GoogleMapsService;
 
use GuzzleHttp\Client;

class LokasiController extends Controller
{
   


    public function convertAddressToCoordinates(Request $request)
    {
        $address = $request->input('address');

        // Panggil fungsi untuk mendapatkan koordinat dari alamat
        $coordinates = $this->getCoordinates($address);

        return view('admin.convert')->with('coordinates', $coordinates);
    }

    private function getCoordinates($address)
    {
        $client = new Client();
        $response = $client->get('https://maps.googleapis.com/maps/api/geocode/json', [
            'query' => [
                'address' => $address,
                'key' => env('GOOGLE_GEOCODING_API_KEY'),
            ]
        ]);

        $data = json_decode($response->getBody(), true);

        if ($data['status'] === 'OK') {
            $location = $data['results'][0]['geometry']['location'];
            $latitude = $location['lat'];
            $longitude = $location['lng'];
            return ['latitude' => $latitude, 'longitude' => $longitude];
        } else {
            // Handle error jika permintaan tidak berhasil
            return null;
        }
    }
}

// Panggil fungsi getCoordinates dengan alamat yang ingin diubah menjadi koordinat

    


