@extends('driver.nav-side')

@section('driver')
<style>
  #map {
    height: 400px;
    width: 100%;
  }
</style>

<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="row">
      <div class="col-12 col-xl-8 mb-5 mb-xl-0">
        <h6 class="font-weight-bold display-5 mb-3">Driver Panel<span class="text-primary"></span></h6>
        <h3 class="font-weight-normal mb-0 display-4">Welcome {{ Auth::user()->name }}</h3>
      </div>
      <div class="col-12 col-xl-4">
        <div class="justify-content-end d-flex">
          <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
            <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              <i class="mdi mdi-calendar"></i> Today ({{ now()->format('d M Y') }})
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
              <a class="dropdown-item" href="#">January - March</a>
              <a class="dropdown-item" href="#">March - June</a>
              <a class="dropdown-item" href="#">June - August</a>
              <a class="dropdown-item" href="#">August - November</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Map Section -->
<div class="row">
  @if(Auth::User()->isAvailable == "1")
    @foreach($app as $a)
      @if($a->isAccepted == "1" && $a->isReached == "0")
      <input style="display : none" id="lat" value="{{$a->p_lat}}" type="text" placeholder="latitude">
      <br>
      <input style="display : none" id="lang" value="{{$a->p_lang}}" type="text" placeholder="longitude">
    @endif
  @endforeach
  <div class="col-md-6 grid-margin stretch-card">
    <div id="map"></div>
  </div>
  @else
  <div class="col-md-6 grid-margin stretch-card">
    <h1 class="display-2  ">You Are Free Now !</h1>
  </div>
  @endif
  <!-- Statistics Section -->
  <div class="col-md-6 grid-margin transparent">
    <div class="row">
      <div class="col-md-6 mb-4 stretch-card transparent">
        <div class="card card-tale">
          <div class="card-body">
            <p class="mb-4">All Pending Requests</p>
            <p class="fs-30 mb-2">4006</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-4 stretch-card transparent">
        <div class="card card-dark-blue">
          <div class="card-body">
            <p class="mb-4">All Drivers</p>
            <p class="fs-30 mb-2">25</p> <!-- Added value -->
            <p>22.00% (30 days)</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
        <div class="card card-light-blue">
          <div class="card-body">
            <p class="mb-4">Number of Meetings</p>
            <p class="fs-30 mb-2">34040</p>
            <p>2.00% (30 days)</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 stretch-card transparent">
        <div class="card card-light-danger">
          <div class="card-body">
            <p class="mb-4">Number of Clients</p>
            <p class="fs-30 mb-2">47033</p>
            <p>0.22% (30 days)</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<!-- Leaflet Routing Machine JS -->
<script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>

<script>
    

    document.addEventListener("DOMContentLoaded", function () {
        // Coordinates for Seaview in Karachi
        // Seaview Karachi coordinates
        var lat = document.getElementById("lat").value;
        var lang = document.getElementById("lang").value;
        
        // var lat = document.getElementById("lat").style.display = "none";
        // var lang = document.getElementById("lang").style.display = "none";

        var seaviewLatLng = [lat, lang];
        // Initialize the map and set the view to Seaview by default
        var map = L.map('map').setView([seaviewLatLng[0], seaviewLatLng[1]], 13);

        // Add OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        // Function to calculate distance using Haversine formula
        function calculateDistance(lat1, lon1, lat2, lon2) {
            var R = 6371; // Radius of the Earth in km
            var dLat = (lat2 - lat1) * Math.PI / 180;
            var dLon = (lon2 - lon1) * Math.PI / 180;
            var a = 
                0.5 - Math.cos(dLat)/2 + 
                Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) * 
                (1 - Math.cos(dLon)) / 2;

            return R * 2 * Math.asin(Math.sqrt(a));
        }

        // Geolocation API to get user's current location
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var userLatLng = [position.coords.latitude, position.coords.longitude];  // User's current location

                // Calculate distance from user to Seaview
                var distance = calculateDistance(userLatLng[0], userLatLng[1], seaviewLatLng[0], seaviewLatLng[1]);

                // Add marker for the user's current location
                L.marker(userLatLng).addTo(map)
                    .bindPopup('You are here. Distance to Your Destination: ' + distance.toFixed(2) + ' km')
                    .openPopup();

                // Add routing control to show route from user's location to Seaview
                L.Routing.control({
                    waypoints: [
                        L.latLng(userLatLng[0], userLatLng[1]),  // User's current location
                        L.latLng(seaviewLatLng[0], seaviewLatLng[1])  // Seaview Karachi
                    ],
                    routeWhileDragging: false,
                    addWaypoints: false,
                    show: false,
                    createMarker: function(i, waypoint, n) {
                        var markerOptions = {
                            icon: L.icon({
                                iconUrl: i === 0 ? 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-green.png' : 
                                                  'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png',
                                iconSize: [25, 41],
                                iconAnchor: [12, 41],
                                popupAnchor: [1, -34]
                            })
                        };
                        return L.marker(waypoint.latLng, markerOptions);
                    }
                }).addTo(map);
            }, function () {
                alert("Geolocation is not supported by this browser.");
            });
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    });
</script>


