
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym App</title>
    <meta name="author" content="Adrian y Daril">
    <meta name="description" content="Aplicacion para la gestion de Multigyms">

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }
    </style>

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</head>
<body class="bg-white font-family-karla">

    <!-- Top Bar Nav -->
    <nav class="w-full py-4 bg-blue-800 shadow">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between">

            <nav>
                <ul class="flex items-center justify-between font-bold text-sm text-white uppercase no-underline">
                    <li><a class="hover:text-gray-200 hover:underline px-4" href="../">Home</a></li>
                    <li><a class="hover:text-gray-200 hover:underline px-4" href="/">Gym</a></li>
                    <li><a class="hover:text-gray-200 hover:underline px-4" href="#">Nosotros</a></li>
                </ul>
            </nav>

            <div class="flex items-center text-lg no-underline text-white pr-6">
                <a class="" href="#">
                    <i class="fab fa-facebook"></i>
                </a>
                <a class="pl-6" href="#">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="pl-6" href="#">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="pl-6" href="#">
                    <i class="fab fa-linkedin"></i>
                </a>
            </div>
        </div>

    </nav>

    <!-- Text Header -->
    <header class="w-full container mx-auto">
        <div class="flex flex-col items-center py-12">
            <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="#">
                Gym App
            </a>
            <p class="text-lg text-gray-600">
                Encuentre el un Gym cerca de Usted
            </p>
        </div>
    </header>

    <!-- Topic Nav >
    <nav class="w-full py-4 border-t border-b bg-gray-100" ">

        <div class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
            <div class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Technology</a>
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Automotive</a>
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Finance</a>
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Politics</a>
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Culture</a>
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Sports</a>
            </div>
        </div>
    </nav-->


    <div class="container mx-auto flex flex-wrap py-6">

        <!-- Posts Section -->
        <section class="w-full md-12 flex flex-col items-center px-3">
                <!-- Article Image -->
                @foreach ($gyms as $gym)
                    <article class="flex flex-col shadow my-4">
                        <a href="gym/{{ $gym->id }}" class="hover:opacity-75">
                            <img src="{{ env('APP_URL') }}/storage/{{$gym->imagen}}">
                        </a>
                        <div class="bg-white flex flex-col justify-start p-6">
                            <a href="gym/{{ $gym->id }}" class="text-blue-700 text-sm font-bold uppercase pb-4">{{$gym-> categorias->nombre_cat}}</a>
                            <a href="gym/{{ $gym->id }}" class="text-3xl font-bold hover:text-gray-700 pb-4">{{$gym-> name}}</a>

                            <a href="gym/{{ $gym->id }}" class="pb-6">{!! Illuminate\Support\Str::limit($gym->descripcion, 50,".....")!!}</a>
                            <a href="gym/{{ $gym->id }}" class="uppercase text-gray-800 hover:text-black">Detalles <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </article>

                @endforeach



            <!-- Pagination -->
            <div class="flex items-center py-8">
                <a href="#" class="h-10 w-10 bg-blue-800 hover:bg-blue-600 font-semibold text-white text-sm flex items-center justify-center">1</a>
                <a href="#" class="h-10 w-10 font-semibold text-gray-800 hover:bg-blue-600 hover:text-white text-sm flex items-center justify-center">2</a>
                <a href="#" class="h-10 w-10 font-semibold text-gray-800 hover:text-gray-900 text-sm flex items-center justify-center ml-3">Next <i class="fas fa-arrow-right ml-2"></i></a>
            </div>

        </section>



    </div>

    <footer class="w-full border-t bg-white pb-12">

        <div class="w-full container mx-auto flex flex-col items-center">
            <div class="w-full container mx-auto flex flex-col items-center">
                <div class="flex flex-col md:flex-row text-center md:text-left md:justify-between py-6">
                    <a href="#" class="uppercase px-3">Nosotros</a>
                    <a href="#" class="uppercase px-3">Politicas de Privacidad</a>
                    <a href="#" class="uppercase px-3">Contactos</a>
                </div>
                <div class="uppercase pb-6">&copy; gymdmin.com</div>
            </div>
    </footer>

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
                title: "{{ $gym->nombre_gym }}"
            });

            marker.addListener('click', function() {
                // Aquí puedes mostrar los detalles del gimnasio
                // Por ejemplo, podrías abrir un modal o un popup
                alert("Detalles del gimnasio: " + marker.title);
                window.location.href = 'gym/' + {{ $gym->id }};
            });
            @endforeach
        }
        </script>

</body>
</html>
