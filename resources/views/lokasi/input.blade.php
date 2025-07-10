<!-- resources/views/lokasi/input.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Input Lokasi</h2>
        <!-- Formulir input lokasi dan peta -->
        
        <form action="{{ route('simpan-lokasi') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama">Nama Lokasi:</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="latitude">Latitude:</label>
                <input type="text" name="latitude" id="latitude" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="longitude">Longitude:</label>
                <input type="text" name="longitude" id="longitude" class="form-control" required>
            </div>

            <!-- Peta -->
            <div id="map" style="height: 400px; margin-bottom: 20px;"></div>

            <button type="submit" class="btn btn-primary">Simpan Lokasi</button>
        </form>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=<AIzaSyCmdoLO5JnuUrsAHy4rc-N_EvMapVdCwjc"></script>

    <script>
        var map;
        var marker;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: -6.2088, lng: 106.8456 }, // Koordinat Jakarta sebagai titik pusat awal
                zoom: 12
            });

            marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                position: { lat: -6.2088, lng: 106.8456 } // Koordinat Jakarta sebagai posisi awal marker
            });

            // Event listener untuk memperbarui input latitude dan longitude saat marker digeser
            google.maps.event.addListener(marker, 'dragend', function (event) {
                document.getElementById('latitude').value = this.getPosition().lat();
                document.getElementById('longitude').value = this.getPosition().lng();
            });
        }

        // Inisialisasi peta setelah halaman selesai dimuat
        google.maps.event.addDomListener(window, 'load', initMap);
    </script>
@endsection
