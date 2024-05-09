
<!DOCTYPE html>
<html lang="es">
<head>
    @include('includes.links')
</head>
<body class="bg-white font-family-karla">
    <!-- Top Bar Nav -->
    @include('includes.menu')
    <div class="container mx-auto flex flex-wrap py-6">
        <!-- Posts Section -->
        <section class="w-full md:w-2/3 flex flex-col items-center px-3">
            <div id="map" style="height: 500px; width: 100%;"></div>
                <!-- Article Image -->
        </section>

    </div>
    @include('includes.footer')
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
                alert("Detalles del gimnasio: " + marker.title);
                window.location.href = 'local/' + {{ $gym->id }};
            });
            @endforeach
        }
        </script>
</body>
</html>
