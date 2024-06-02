
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
  

 
  <section class="w-full flex flex-col items-center px-3 bg-gray-lighter py-16">
    <div class="container mx-auto">
        <article class="flex flex-col shadow-lg bg-white rounded-lg overflow-hidden my-4">
            <div class="flex flex-col justify-start p-6">
                <p class="text-3xl font-bold text-primary hover:text-gray-700 pb-4">Nosotros</p>
                <p class="text-lg text-gray-700">
                    Nuestro sistema de administración de gimnasio es una solución integral diseñada para facilitar la gestión diaria de un gimnasio o centro de fitness. Con un enfoque en la eficiencia operativa y la experiencia del cliente, nuestro sistema ofrece una amplia gama de funciones que abarcan desde la gestión de socios y clases hasta el seguimiento de pagos y la generación de informes.
                </p>
                <br>
                <p class="text-lg text-gray-700">
                    Una de las características clave de nuestro sistema es su capacidad para gestionar fácilmente la programación de clases, permitiendo a los administradores definir horarios, asignar entrenadores y gestionar la asistencia de los clientes. Además, el sistema facilita el seguimiento de los pagos de los clientes, generando recordatorios automáticos y permitiendo el acceso a los clientes a su historial de pagos.
                </p>
                <br>
                <p class="text-lg text-gray-700">
                    Otra característica destacada es la capacidad de nuestro sistema para ofrecer una experiencia personalizada a los clientes. A través de perfiles de usuario, los clientes pueden acceder a información relevante sobre su membresía, reservar clases y recibir recomendaciones personalizadas basadas en sus objetivos de fitness.
                </p>
            </div>
        </article>
    </div>
</section>



 
  @include('includes.footer')

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
