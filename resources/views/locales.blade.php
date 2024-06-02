
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
  

 
  <section id="portfolio" class="portfolio-section py-16 px-4">
    <div class="container mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-5xl font-bold mb-4">Locales Asociados</h2>
            <p class="text-lg text-primary font-semibold">Encuentra los gimnasios más cercanos a ti y comienza a disfrutar de nuestros servicios hoy mismo.</p>
        </div>  
        <div class="flex flex-col md:flex-row items-center mb-8">
            <button class="filter-button bg-primary hover:bg-secondary px-4 py-2 mr-2 mb-2 text-white rounded" data-filter="all">Todos</button>
            @foreach ($categorias as $categoria)
                <button class="filter-button bg-primary hover:bg-secondary px-4 py-2 mr-2 mb-2 text-white rounded" 
                data-filter="{{ $categoria->id }}">{{ $categoria->nombre }}</button>
            @endforeach
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach ($gyms as $gym)
                <div class="group portfolio-item relative hover:shadow-lg shadow-md rounded-lg overflow-hidden" data-category="{{ $gym->categorias_id }}">
                    <a href="local/{{ $gym->id }}">
                        <img class="w-full h-60 object-cover" src="{{ env('APP_URL') }}/storage/{{$gym->imagen}}" alt="{{ $gym->name }}">
                        <div class="absolute top-0 left-0 right-0 bottom-0 bg-gradient-to-r from-primary to-secondary opacity-0 transition duration-300 ease-in-out group-hover:opacity-70"></div>
                        <div class="p-4 flex flex-col items-center justify-between relative z-10">
                            <h3 class="text-lg font-medium text-txt group-hover:text-gray-dark"> {{ $gym->name }}</h3>
                            <span class="text-sm font-bold text-secondary group-hover:text-primary">{!! Illuminate\Support\Str::limit($gym->descripcion, 50, ".....") !!}</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterButtons = document.querySelectorAll('.filter-button');
        const portfolioItems = document.querySelectorAll('.portfolio-item');
    
        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                const filter = button.getAttribute('data-filter');
                console.log(`Filter selected: ${filter}`);
    
                portfolioItems.forEach(item => {
                    const itemCategory = item.getAttribute('data-category');
                    console.log(`Item category: ${itemCategory}`);
    
                    if (filter === 'all') {
                        item.style.display = 'block';
                    } else {
                        if (itemCategory == filter) {  // Asegúrate de usar == para comparar valores numéricos y cadenas
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    }
                });
            });
        });
    });
    </script>
 

 
  @include('includes.footer')

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>