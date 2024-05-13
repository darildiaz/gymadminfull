
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
                            @if($gym->actividads->count() > 0)
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
                                        @foreach($gym->actividads as $actividad)
                                            <tr>
                                                <td class="py-2 px-4">{{ $actividad->Descripcion }}</td>
                                                <td class="py-2 px-4">{{ $actividad->cupo }}</td>
                                                <td class="py-2 px-4">{{ $actividad->horario }}</td>
                                                <td class="py-2 px-4">{{ $actividad->lunes ? 'Sí' : 'No' }}</td>
                                                <td class="py-2 px-4">{{ $actividad->martes ? 'Sí' : 'No' }}</td>
                                                <td class="py-2 px-4">{{ $actividad->miercoles ? 'Sí' : 'No' }}</td>
                                                <td class="py-2 px-4">{{ $actividad->jueves ? 'Sí' : 'No' }}</td>
                                                <td class="py-2 px-4">{{ $actividad->vienes ? 'Sí' : 'No' }}</td>
                                                <td class="py-2 px-4">{{ $actividad->sabado ? 'Sí' : 'No' }}</td>
                                                <td class="py-2 px-4">{{ $actividad->domingo ? 'Sí' : 'No' }}</td>
                                                <td class="py-2 px-4">
                                                    <!--button class="bg-blue-500 text-white px-4 py--2 rounded-md">inscribirse</button-->
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
    @include('includes.footer')
</body>
</html>
