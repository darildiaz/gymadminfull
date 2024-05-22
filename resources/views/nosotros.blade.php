
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
                        <div class="bg-white flex flex-col justify-start p-6">
                            <p  class="text-3xl font-bold hover:text-gray-700 pb-4">Nosotros</p>

                            Nuestro sistema de administración de gimnasio es una solución integral diseñada para facilitar la gestión diaria de un gimnasio o centro de fitness. Con un enfoque en la eficiencia operativa y la experiencia del cliente, nuestro sistema ofrece una amplia gama de funciones que abarcan desde la gestión de socios y clases hasta el seguimiento de pagos y la generación de informes.
<br>
<br>

Una de las características clave de nuestro sistema es su capacidad para gestionar fácilmente la programación de clases, permitiendo a los administradores definir horarios, asignar entrenadores y gestionar la asistencia de los clientes. Además, el sistema facilita el seguimiento de los pagos de los clientes, generando recordatorios automáticos y permitiendo el acceso a los clientes a su historial de pagos.
<br>
<br>
Otra característica destacada es la capacidad de nuestro sistema para ofrecer una experiencia personalizada a los clientes. A través de perfiles de usuario, los clientes pueden acceder a información relevante sobre su membresía, reservar clases y recibir recomendaciones personalizadas basadas en sus objetivos de fitness.

                        </div>

                    </article>

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
