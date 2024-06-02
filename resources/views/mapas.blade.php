
<!DOCTYPE html>
<html>

<head>
  
  @include('includes.links')
</head>

<body>
  <header class="bg-gray-dark sticky top-0 z-50">
    <div class="container mx-auto flex justify-between items-center py-4">
      <!-- Left section: Logo -->
      <div class="flex items-center">
        <img src="{{ asset('images/blue-logo.png') }}" alt="Logo" class="h-14 w-auto mr-4">
      </div>

      <!-- Hamburger menu (for mobile) -->
      <div class="flex md:hidden">
        <button id="hamburger" class="text-white focus:outline-none">
          <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
          </svg>
        </button>
      </div>

      <!-- Center section: Menu -->
      @include('includes.menu')
      

      
    </div>
  </header>
  <!-- Mobile menu -->
  @include('includes.menumobil')
  

 
  <section id="map-section" class="bg-gray-lighter py-16">
    <div class="container mx-auto flex flex-wrap">
        <!-- Posts Section -->
        <div class="w-full md:w-2/3 flex flex-col items-center px-3">
            <div id="map" class="w-full h-96 bg-white rounded-lg shadow-lg"></div>
        </div>
    </div>
</section>

<script>
    function initMap() {
        var mapOptions = {
            center: new google.maps.LatLng(-23.3998500, -57.4323600), // Coordenadas iniciales
            zoom: 10
        };
        var map = new google.maps.Map(document.getElementById('map'), mapOptions);

        @foreach($gyms as $gym)
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng({{ $gym->latitud }}, {{ $gym->longitud }}),
            map: map,
            title: "{{ $gym->name }}"
        });

        marker.addListener('click', function() {
            // Aquí puedes mostrar los detalles del gimnasio
            // Por ejemplo, podrías abrir un modal o un popup
           // alert("Detalles del gimnasio: " + marker.title);
            window.location.href = 'local/' + {{ $gym->id }};
        });
        @endforeach
    }
    </script>
 
  @include('includes.footer')

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
