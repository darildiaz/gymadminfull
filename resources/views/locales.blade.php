
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
        <section class="w-full md:w-full flex flex-col items-center px-3">
            <!-- Article Image -->
            @foreach ($gyms as $gym)
                <article class="flex flex-col shadow my-4">
                    <a href="local/{{ $gym->id }}" class="hover:opacity-75">
                        <img src="{{ env('APP_URL') }}/storage/{{$gym->imagen}}">
                    </a>
                    <div class="bg-white flex flex-col justify-start p-6">
                        <a href="local/{{ $gym->id }}" class="text-blue-700 text-sm font-bold uppercase pb-4">{{$gym-> categorias->nombre_cat}}</a>
                        <a href="local/{{ $gym->id }}" class="text-3xl font-bold hover:text-gray-700 pb-4">{{$gym-> name}}</a>

                        <a href="local/{{ $gym->id }}" class="pb-6">{!! Illuminate\Support\Str::limit($gym->descripcion, 50,".....")!!}</a>
                        <a href="local/{{ $gym->id }}" class="uppercase text-gray-800 hover:text-black">Detalles <i class="fas fa-arrow-right"></i></a>
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
