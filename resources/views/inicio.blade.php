
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
  

  <section id="home" class="bg-white py-16">
    <div class="container mx-auto flex flex-col md:flex-row items-center justify-between">
    

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($sliders as $key => $slider)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <img class="d-block w-100" src="{{ env('APP_URL') }}/storage/{{ $slider->imagen }}" alt="{{$slider->titulo}}">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="text-3xl font-bold hover:text-gray-700 pb-4">
                                {{ $slider->titulo }}
                            </h1>
                            <p>
                    {!!  $slider->descripcion !!}
                            </p>
                          </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        
    </div>
  </section>

  <section id="aboutus" class="py-16 bg-gray-dark">
    <div class="container mx-auto flex flex-col md:flex-row items-center justify-between">
        

      <!-- Left column: Image -->
      <div class="md:w-2/4 mb-8 md:mb-2">
        <div id="map" style="height: 500px; width: 100%;" class="left-0 top-0 h-full w-full rounded-t-lg lg:rounded-tr-none lg:rounded-bl-lg"></div>
      </div>

      <!-- Right column: Title, description list, and button -->
      <div class="md:w-1/4">
        <h2 class="text-5xl font-bold mb-4 text-white">Sistema de Gestión de  <span class="text-primary">Gyms</span></h2>
        <p class="my-5 text-white">Bienvenido a nuestro avanzado sistema de gestión de gimnasios. Aquí, puedes encontrar fácilmente un gimnasio cerca de ti y disfrutar de una amplia gama de servicios:
        </p>
        <ol class="mb-10 list-outside">
            
          <li class="flex items-center mb-4">
            <strong class="bg-primary text-white rounded-full w-8 h-8 text-lg font-semibold flex items-center justify-center mr-3">1</strong>
            <span class="text-white"><strong>Gestión de Suscripción:</strong> Administra tus membresías de manera eficiente y sencilla.</span>
          </li>
          <li class="flex items-center mb-4">
            <strong class="bg-primary text-white rounded-full w-8 h-8 text-lg font-semibold flex items-center justify-center mr-3">2</strong>
            <span class="text-white"><strong>Rutinas Personalizadas:</strong> Diseña y sigue rutinas de ejercicio adaptadas a tus necesidades.</span>
          </li>
          <li class="flex items-center mb-4">
            <strong class="bg-primary text-white rounded-full w-8 h-8 text-lg font-semibold flex items-center justify-center mr-3">3</strong>
            <span class="text-white"><strong>Registro de Visitas:</strong> Lleva un control preciso de tus visitas y asistencia.</span>
          </li>
          <li class="flex items-center mb-4">
            <strong class="bg-primary text-white rounded-full w-8 h-8 text-lg font-semibold flex items-center justify-center mr-3">4</strong>
            <span class="text-white"><strong>Horarios de Clases:</strong> Consulta y reserva clases y actividades en tu gimnasio favorito.</span>
          </li>
        </ol>
        <!--button class="bg-secondary hover:bg-primary text-white font-semibold px-4 py-2 rounded">Get Started</button-->
      </div>
      
    </div>
  </section>

  <section id="results" class="bg-gray-lighter py-16 success-metrics">
    <div class="container mx-auto">
      <!-- First row: Title and subtitle -->
      <div class="text-center mb-12">
        <h2 class="text-5xl font-bold mb-4">Métricas de Éxito</h2>
        <p class="text-lg text-primary font-semibold">Midiendo nuestros logros y hitos para garantizar que estamos cumpliendo con nuestros objetivos y mejorando continuamente.
        </p></p>
      </div>

      <!-- Second row: Four columns with success metrics -->
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <div
          class="success-metric bg-white p-6 rounded-lg shadow-lg text-center group hover:bg-primary hover:text-white transition-all duration-300">
          <h3 class="text-2xl font-bold text-primary counter" data-target-value="{!!  $clientecant !!}">0</h3>
          <p class="text-lg">Clientes Felices</p>
        </div>
        <div
          class="success-metric bg-white p-6 rounded-lg shadow-lg text-center group hover:bg-primary hover:text-white transition-all duration-300">
          <h3 class="text-2xl font-bold text-primary counter" data-target-value="{!!  $gymscant !!}">0</h3>
          <p class="text-lg">Locales</p>
        </div>
        <div
          class="success-metric bg-white p-6 rounded-lg shadow-lg text-center group hover:bg-primary hover:text-white transition-all duration-300">
          <h3 class="text-2xl font-bold text-primary counter" data-target-value="{!!  $entrenadorcant !!}">0</h3>
          <p class="text-lg">Entrenedores</p>
        </div>
        <div
          class="success-metric bg-white p-6 rounded-lg shadow-lg text-center group hover:bg-primary hover:text-white transition-all duration-300">
          <h3 class="text-2xl font-bold text-primary ">24/7</h3>
          <p class="text-lg">Soporte disponible</p>
        </div>
      </div>
    </div>
  </section>

  
  <section id="contact" class="bg-cover bg-no-repeat bg-center relative py-16 px-2">
    <div
      class="grid md:grid-cols-2 gap-16 items-center relative overflow-hidden p-10 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] rounded-3xl max-w-6xl mx-auto bg-white text-[#333] my-6 before:absolute before:right-0 before:w-[300px] before:bg-blue-400 before:h-full max-md:before:hidden">
      <div>
        <h2 class="text-5xl font-bold text-primary">Contactanos</h2>
        <p class="text-gray-dark mt-5">¿Tiene una consulta específica o busca explorar nuevas oportunidades? Nuestro
            Un equipo experimentado está listo para interactuar con usted.</p>
            <form id="contactForm">
                <div class="space-y-4 mt-8">
                    <input type="text" id="fullName" placeholder="Nombre Completo"
                        class="px-2 py-3 bg-white w-full text-sm border-b  outline-none" required />
                    
                    <input type="email" id="email" placeholder="Email"
                        class="px-2 py-3 bg-white text-gray-dark w-full text-sm border-b  outline-none" required />
                    <textarea id="message" placeholder="Escriba su consulta"
                        class="px-2 pt-3 bg-white text-gray-dark w-full text-sm border-b  outline-none" required></textarea>
                </div>
                <button type="button" onclick="sendMessage()"
                    class="mt-8 flex items-center justify-center text-sm w-full rounded px-4 py-2.5 font-semibold bg-primary text-white hover:bg-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="16px" height="16px" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                    viewBox="0 0 1217.08 1217.07"
                     xmlns:xlink="http://www.w3.org/1999/xlink"
                     xmlns:xodm="http://www.corel.com/coreldraw/odm/2003">
                     <defs>
                      <style type="text/css">
                       <![CDATA[
                        .fil0 {fill:white;fill-rule:nonzero}
                       ]]>
                      </style>
                     </defs>
                     <g id="Capa_x0020_1">
                      <metadata id="CorelCorpID_0Corel-Layer"/>
                      <path class="fil0" d="M608.54 0c-335.53,0 -608.53,273 -608.53,608.53 0,104.78 27.07,207.8 78.4,298.71l-77.42 276.23c-2.54,9.08 -0.08,18.81 6.48,25.56 5.05,5.21 11.93,8.04 19,8.04 2.12,0 4.26,-0.26 6.35,-0.77l288.29 -71.41c88.02,47.26 187.16,72.18 287.43,72.18 335.54,0 608.54,-273 608.54,-608.54 0,-335.53 -273,-608.53 -608.54,-608.53zm306.12 823.27c-13.02,36.04 -75.46,68.92 -105.46,73.34 -26.93,3.94 -61.01,5.64 -98.43,-6.11 -22.67,-7.14 -51.78,-16.62 -89.06,-32.52 -156.7,-66.83 -259.04,-222.65 -266.88,-232.94 -7.79,-10.29 -63.78,-83.62 -63.78,-159.53 0,-75.91 40.35,-113.24 54.69,-128.69 14.34,-15.45 31.25,-19.31 41.67,-19.31 10.42,0 20.82,0.13 29.95,0.56 9.6,0.48 22.49,-3.62 35.16,26.48 13.02,30.9 44.26,106.81 48.13,114.56 3.92,7.73 6.51,16.75 1.32,27.04 -5.19,10.29 -7.78,16.72 -15.61,25.74 -7.83,9.02 -16.4,20.11 -23.44,27.04 -7.83,7.7 -15.95,16.03 -6.85,31.49 9.1,15.45 40.45,65.95 86.92,106.86 59.66,52.55 110,68.84 125.61,76.57 15.61,7.73 24.74,6.43 33.84,-3.86 9.1,-10.32 39.05,-45.06 49.45,-60.48 10.4,-15.42 20.82,-12.89 35.16,-7.73 14.34,5.13 91.15,42.44 106.76,50.17 15.61,7.73 26.04,11.59 29.95,18.02 3.92,6.38 3.92,37.29 -9.1,73.3z"/>
                     </g>
                    </svg>
                    
                    
                    Enviar mensaje
                </button>
            </form>
        <ul class="mt-4 flex justify-center lg:space-x-6 max-lg:flex-col max-lg:items-center max-lg:space-y-2 ">
          <li class="flex items-center hover:text-blue-500">
            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill='currentColor'
              viewBox="0 0 479.058 479.058">
              <path
                d="M434.146 59.882H44.912C20.146 59.882 0 80.028 0 104.794v269.47c0 24.766 20.146 44.912 44.912 44.912h389.234c24.766 0 44.912-20.146 44.912-44.912v-269.47c0-24.766-20.146-44.912-44.912-44.912zm0 29.941c2.034 0 3.969.422 5.738 1.159L239.529 264.631 39.173 90.982a14.902 14.902 0 0 1 5.738-1.159zm0 299.411H44.912c-8.26 0-14.971-6.71-14.971-14.971V122.615l199.778 173.141c2.822 2.441 6.316 3.655 9.81 3.655s6.988-1.213 9.81-3.655l199.778-173.141v251.649c-.001 8.26-6.711 14.97-14.971 14.97z"
                data-original="#006BFD" />
            </svg>
            <a href="mailto:darildiaz29@gmail.com" class="text-current text-sm ml-3">
              <strong>darildiaz29@gmail.com</strong>
            </a>
          </li>
          <li class="flex items-center text-current hover:text-blue-500">
            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill='currentColor'
              viewBox="0 0 482.6 482.6">
              <path
                d="M98.339 320.8c47.6 56.9 104.9 101.7 170.3 133.4 24.9 11.8 58.2 25.8 95.3 28.2 2.3.1 4.5.2 6.8.2 24.9 0 44.9-8.6 61.2-26.3.1-.1.3-.3.4-.5 5.8-7 12.4-13.3 19.3-20 4.7-4.5 9.5-9.2 14.1-14 21.3-22.2 21.3-50.4-.2-71.9l-60.1-60.1c-10.2-10.6-22.4-16.2-35.2-16.2-12.8 0-25.1 5.6-35.6 16.1l-35.8 35.8c-3.3-1.9-6.7-3.6-9.9-5.2-4-2-7.7-3.9-11-6-32.6-20.7-62.2-47.7-90.5-82.4-14.3-18.1-23.9-33.3-30.6-48.8 9.4-8.5 18.2-17.4 26.7-26.1 3-3.1 6.1-6.2 9.2-9.3 10.8-10.8 16.6-23.3 16.6-36s-5.7-25.2-16.6-36l-29.8-29.8c-3.5-3.5-6.8-6.9-10.2-10.4-6.6-6.8-13.5-13.8-20.3-20.1-10.3-10.1-22.4-15.4-35.2-15.4-12.7 0-24.9 5.3-35.6 15.5l-37.4 37.4c-13.6 13.6-21.3 30.1-22.9 49.2-1.9 23.9 2.5 49.3 13.9 80 17.5 47.5 43.9 91.6 83.1 138.7zm-72.6-216.6c1.2-13.3 6.3-24.4 15.9-34l37.2-37.2c5.8-5.6 12.2-8.5 18.4-8.5 6.1 0 12.3 2.9 18 8.7 6.7 6.2 13 12.7 19.8 19.6 3.4 3.5 6.9 7 10.4 10.6l29.8 29.8c6.2 6.2 9.4 12.5 9.4 18.7s-3.2 12.5-9.4 18.7c-3.1 3.1-6.2 6.3-9.3 9.4-9.3 9.4-18 18.3-27.6 26.8l-.5.5c-8.3 8.3-7 16.2-5 22.2.1.3.2.5.3.8 7.7 18.5 18.4 36.1 35.1 57.1 30 37 61.6 65.7 96.4 87.8 4.3 2.8 8.9 5 13.2 7.2 4 2 7.7 3.9 11 6 .4.2.7.4 1.1.6 3.3 1.7 6.5 2.5 9.7 2.5 8 0 13.2-5.1 14.9-6.8l37.4-37.4c5.8-5.8 12.1-8.9 18.3-8.9 7.6 0 13.8 4.7 17.7 8.9l60.3 60.2c12 12 11.9 25-.3 37.7-4.2 4.5-8.6 8.8-13.3 13.3-7 6.8-14.3 13.8-20.9 21.7-11.5 12.4-25.2 18.2-42.9 18.2-1.7 0-3.5-.1-5.2-.2-32.8-2.1-63.3-14.9-86.2-25.8-62.2-30.1-116.8-72.8-162.1-127-37.3-44.9-62.4-86.7-79-131.5-10.3-27.5-14.2-49.6-12.6-69.7z"
                data-original="#006BFD"></path>
            </svg>
            <a href="tel:595972813605" class="text-current text-sm ml-3">
              <strong>+595972813605</strong>
            </a>
          </li>
        </ul>
      </div>
      
    </div>
  </section>

  
@include('includes.footer')
<script>
    function sendMessage() {
        const fullName = document.getElementById('fullName').value;
        const email = document.getElementById('email').value;
        const message = document.getElementById('message').value;

        const whatsappMessage = `Hola, mi Nombre es: ${fullName}%0aEmail: ${email}%0ay quiero: ${message}`;
        const whatsappUrl = `https://wa.me/595972813605?text=${whatsappMessage}`;

        window.open(whatsappUrl, '_blank');
    }
</script>
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
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>