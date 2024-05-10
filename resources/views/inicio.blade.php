
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
        <section class="w-full md flex flex-col items-center px-3">
            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
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
        <!-- Sidebar Section -->
        <aside class="w-full md:w-1/3 flex flex-col items-center px-3">
            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">Nosotros</p>
                <p class="pb-2">es un proyecto para la gestion de multi gym</p>
                <a href="admin/login" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                    Login
                </a>
            </div>
        </aside>
    </div>
    @include('includes.footer')
</body>
</html>