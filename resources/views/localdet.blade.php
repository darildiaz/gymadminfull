
<!doctype html>
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
  

 
  <section class="w-full flex flex-col items-center px-3 bg-gray-lighter py-16">
    <div class="container mx-auto">
        <!-- Article Image -->
            <img src="{{ env('APP_URL') }}/storage/{{ $gym->imagen }}" class="w-full h-60 object-cover">
            <div class="flex flex-col justify-start p-6">
                <h3 class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $gym->name }}</h3>
                {!! $gym->descripcion !!}
            </div>
            <div class="flex flex-col justify-start p-6">
                <h1>{{ $gym->name }}</h1>
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
                                <th class="py-2 px-4">Suscribirse</th>
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
                                    <td class="py-2 px-4">{{ $actividad->viernes ? 'Sí' : 'No' }}</td>
                                    <td class="py-2 px-4">{{ $actividad->sabado ? 'Sí' : 'No' }}</td>
                                    <td class="py-2 px-4">{{ $actividad->domingo ? 'Sí' : 'No' }}</td>
                                    <td class="py-2 px-4">
                                        <!--a href="{{ url('clientesadmin/' . $gym->id . '/suscripcions/create/' . '?actividads_id=' . $actividad->id ) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Inscribirse</a-->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No hay clases disponibles en este gimnasio.</p>
                @endif
            </div>
    </div>
</section>


 
  @include('includes.footer')

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
