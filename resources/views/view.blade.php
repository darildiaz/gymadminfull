
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
                    <li><a class="hover:text-gray-200 hover:underline px-4" href="../../">Home</a></li>
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
            <a class="font-bold text-gray-800 uppercase hover:text-gra-y-700 text-5xl" href="#">
                Gym App
            </a>
            <p class="text-lg text-gray-600">
                Encuentre el un Gym cerca de Usted
            </p>
        </div>
    </header>

    <!-- Topic Nav -->
    <!--nav class="w-full py-4 border-t border-b bg-gray-100" ">

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
        <section class="w-full flex flex-col items-center px-3">

                <!-- Article Image -->
                    <article class="flex flex-col shadow my-4">
                        <img src="{{env('APP_URL')}}/storage/{{$gym->imagen}}">
                        <div class="bg-white flex flex-col justify-start p-6">
                            <h3 class="text-blue-700 text-sm font-bold uppercase pb-4">{{$gym-> categorias->nombre_cat}}</h3>
                            <p  class="text-3xl font-bold hover:text-gray-700 pb-4">{{$gym-> name}}</p>

                            {!!  $gym-> descripcion !!}

                        </div>
                        <div class="bg-white flex flex-col justify-start p-6">
                            <h1>{{ $gym->nombre }}</h1>

@if($gym->clases->count() > 0)
    <table class="min-w-full bg-white border border-gray-300 shadow-md rounded-md overflow-hidden">
        <thead class="bg-blue-700 text-white">
            <tr>
                <th class="py-2 px-4">Nombre de la Clase</th>
                <th class="py-2 px-4">Cupo</th>
                <th class="py-2 px-4">Horario</th>
                <th class="py-2 px-4">Lunes</th>
                <th class="py-2 px-4">Martes</th>
                <th class="py-2 px-4">Miércoles</th>
                <th class="py-2 px-4">Jueves</th>
                <th class="py-2 px-4">Viernes</th>
                <th class="py-2 px-4">Sábado</th>
                <th class="py-2 px-4">Domingo</th>
                <th class="py-2 px-4">suscribirse</th>
            </tr>
        </thead>
        <tbody>
            @foreach($gym->clases as $clase)
            <tr>
                <td class="py-2 px-4">{{ $clase->nombre_clase }}</td>
                <td class="py-2 px-4">{{ $clase->cupo }}</td>
                <td class="py-2 px-4">{{ $clase->horario }}</td>
                <td class="py-2 px-4">{{ $clase->lunes ? 'Sí' : 'No' }}</td>
                <td class="py-2 px-4">{{ $clase->martes ? 'Sí' : 'No' }}</td>
                <td class="py-2 px-4">{{ $clase->miercoles ? 'Sí' : 'No' }}</td>
                <td class="py-2 px-4">{{ $clase->jueves ? 'Sí' : 'No' }}</td>
                <td class="py-2 px-4">{{ $clase->vienes ? 'Sí' : 'No' }}</td>
                <td class="py-2 px-4">{{ $clase->sabado ? 'Sí' : 'No' }}</td>
                <td class="py-2 px-4">{{ $clase->domingo ? 'Sí' : 'No' }}</td>
                <td class="py-2 px-4">
                    <button class="bg-blue-500 text-white px-4 py--2 rounded-md">inscribirse</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No hay clases disponibles en este gimnasio.</p>
@endif

                        </div>




                    </article>






        </section>
    </div>

    <footer class="w-full border-t bg-white pb-12">

        <div class="w-full container mx-auto flex flex-col items-center">
            <div class="flex flex-col md:flex-row text-center md:text-left md:justify-between py-6">
                <a href="#" class="uppercase px-3">Nosotros</a>
                <a href="#" class="uppercase px-3">Politicas de Privacidad</a>
                <a href="#" class="uppercase px-3">Contactos</a>
            </div>
            <div class="uppercase pb-6">&copy; gymdmin.com</div>
        </div>
    </footer>



</body>
</html>
