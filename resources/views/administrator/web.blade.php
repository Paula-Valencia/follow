<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <title>Etapa Productiva</title>
    <style>
        html,
        body {
            width: 100%;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: white;
            overflow-x: hidden;
        }

        .section-title {
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
            color: #009e00;
            margin-bottom: 20px;
        }

        .section-content {
            padding: 40px;
            margin: 0 auto;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
            margin-top: 40px;
        }

        .section-content p {
            line-height: 1.8;
            font-size: 1rem;
            margin-bottom: 20px;
            color: #666;
        }

        .cta-button {
            display: inline-block;
            background-color: #009e00;
            color: white;
            padding: 12px 20px;
            text-align: center;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .cta-button:hover {
            background-color: #007a00;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        .table th,
        .table td {
            padding: 15px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .table th {
            background-color: #009e00;
            color: white;
        }

        .table tr:hover {
            background-color: #f9f9f9;
        }

        /* Estilos para el carrusel */
        .carousel-container {
            max-width: 20%;
            margin: 40px auto 0;
            box-shadow: 0px 8px 30px rgba(0, 0, 0, 0.4);
            border-radius: 10px;
            overflow: hidden;
        }

        .slick-prev,
        .slick-next {
            background-color: rgba(0, 0, 0, 0.5);
            border: none;
            color: white;
            font-size: 20px;
            padding: 10px;
            cursor: pointer;
        }

        .slick-prev:hover,
        .slick-next:hover {
            background-color: rgba(0, 0, 0, 0.7);
        }

        .slick-dots li button:before {
            color: #009e00;
        }

        .slick-dots li.slick-active button:before {
            color: #009e00;
        }

        .carousel-item img {
            width: 20%;
            margin: 0 auto;
            display: block;
        }

        /* Estilo para la sección de Misión */
        #mision {
            background: linear-gradient(to right, #ffffff, #009e00);
            /* Gradiente de verdes claritos */
            color: #009e00;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgb(0, 0, 0);
        }


        #mision .text-section {
            width: 60%;
        }

        #mision img {
            width: 30%;
            border-radius: 10px;
            margin-left: 20px;
        }

        #mision h2 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        #mision p {
            font-size: 1.1rem;
            line-height: 1.8;
            color: rgba(0, 0, 0, 0.884);
            font-family: 'Poppins', sans-serif;
            text-align: justify;
        }



        /* Animación para el título de la misión */
        #mision h2 {
            animation: fadeInUp 1s ease-out;
        }

        /* Aplica una fuente llamativa al párrafo de la sección "¿Qué es Etapa Productiva?" */
        #queEsEtapa p {
            font-family: 'Poppins', sans-serif;
            /* Cambia a la fuente de tu elección */
            font-size: 1.1rem;
            line-height: 1.8;
            color: black;
        }

        .custom-login-button {
            background-color: #009e00;
            height: 40px;
            line-height: 30px;
        }

        .custom-login-button:hover {
            background-color: #41bd41;
            /* Cambia este valor al color que prefieras para el hover */
        }
    </style>

    <!-- jQuery y Slick CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css" />
</head>

<body class="flex flex-col min-h-screen">

    @include('partials.header')

    <nav class="h-14 py-1.5 flex justify-between items-center px-4 bg-[#009e00]">
        <!-- Elementos de navegación centrados -->
        <div class="flex justify-center w-full space-x-4">
            <a href="#queEsEtapa"
                class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                ¿Qué es Etapa Productiva?
            </a>
            <a href="#tiposModalidad"
                class="block text-center text-white px-4 py-2 rounded-lg {{ request()->routeIs('administrator.apprentice') ? 'bg-green-600 bg-opacity-70' : 'bg-green-600 bg-opacity-20 hover:bg-opacity-50' }}">
                <span class="font-bold">Tipos de modalidad</span>
            </a>
            <a href="#mision"
                class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                Misión
            </a>
        </div>
    </nav>

    <div class="container-fluid p-0 mt-2">
        <div class="container-fluid p-0">
            <div id="carouselImages">
                <div>
                    <img src="{{ asset('img/webpng/carrusel0.jpg') }}" alt="Imagen 1" class="d-block w-100 h-100">
                </div>
                <div>
                    <img src="{{ asset('img/webpng/carrusel6.png') }}" alt="Imagen 1" class="d-block w-100 h-100">
                </div>
                <div>
                    <img src="{{ asset('img/webpng/carrusel7.png') }}" alt="Imagen 2" class="d-block w-100 h-100">
                </div>
                <div>
                    <img src="{{ asset('img/webpng/carrusel8.png') }}" alt="Imagen 2" class="d-block w-100 h-100">
                </div>
            </div>
        </div>
    </div>

    <!-- Secciones de contenido -->
    <div id="queEsEtapa" class="section-content flex items-center justify-between">
        <div class="text-section w-3/5">
            <h2 class="section-title text-2xl font-bold mb-4">¿Qué es Etapa Productiva?</h2>
            <p class="text-lg">La "Etapa Productiva" es una fase del proceso formativo en la que los aprendices aplican
                en un entorno laboral real los conocimientos adquiridos durante la "Etapa Lectiva" o teórica. Esta
                etapa, similar a una práctica o pasantía, permite que el aprendiz gane experiencia directa en su campo
                de estudio bajo supervisión. Su objetivo es desarrollar competencias laborales, adquirir experiencia en
                el entorno real de trabajo, contribuir a la productividad de la empresa y facilitar la inserción
                laboral, ya que en muchos casos las empresas terminan contratando a los aprendices.</p>
        </div>
        <img src="{{ asset('img/trainer/etapa.jpg') }}" alt="Descripción de la imagen" class="w-1/3 ml-4 rounded-lg">
    </div>

    <!-- Sección Tipos de Modalidad -->
    <section id="tiposModalidad"
        class="section-content mt-16 bg-white p-8 border border-gray-200 rounded-lg shadow-sm relative">
        <h2 class="section-title text-3xl font-bold text-gray-800 mb-6">Tipos de Modalidad</h2>
        <p class="text-gray-700 mb-6">Cada modalidad de la etapa productiva está diseñada para adaptarse a las distintas
            necesidades de formación y las características del entorno laboral, permitiendo que los aprendices adquieran
            experiencia según sus intereses y las oportunidades disponibles. A continuación, se describen las
            modalidades más comunes, cada una con sus beneficios y características principales:</p>

        <!-- Contenedor centrado y tabla pequeña -->
        <div class="flex justify-center">
            <table class="text-gray-700 text-sm bg-white rounded-lg shadow w-auto">
                <thead>
                    <tr class="bg-[#009e00] text-white">
                        <th class="py-3 px-4">Modalidad</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr onclick="showInfo('pasantia')">
                        <td class="py-3 px-4 cursor-pointer">Pasantía</td>
                    </tr>
                    <tr onclick="showInfo('contrato')">
                        <td class="py-3 px-4 cursor-pointer">Contrato de Aprendizaje</td>
                    </tr>
                    <tr onclick="showInfo('vinculo')">
                        <td class="py-3 px-4 cursor-pointer">Vínculo Laboral</td>
                    </tr>
                    <tr onclick="showInfo('unidad')">
                        <td class="py-3 px-4 cursor-pointer">Unidad Productiva Familiar</td>
                    </tr>
                    <tr onclick="showInfo('proyecto')">
                        <td class="py-3 px-4 cursor-pointer">Proyecto Productivo Empresarial</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Mensaje de Alerta con la Información -->
        <div id="infoAlert"
            class="hidden absolute inset-0 bg-black bg-opacity-70 flex justify-center items-center z-50">
            <div class="bg-white text-gray-800 p-6 rounded-lg shadow-lg max-w-lg w-full relative">
                <button onclick="closeAlert()" class="absolute top-0 right-0 p-2 text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
                <p id="alertText" class="text-lg"></p>
            </div>
        </div>

        <p class="text-gray-700 leading-relaxed mt-4">
            Cada modalidad tiene un enfoque específico que busca no solo el desarrollo profesional de los aprendices,
            sino también la aportación de valor a las empresas o iniciativas productivas con las que se colaboran. Así,
            se genera un entorno de aprendizaje mutuamente beneficioso. Al participar en estas modalidades, los
            aprendices no solo adquieren conocimientos prácticos que aumentan su empleabilidad, sino que también se
            convierten en parte integral de procesos productivos reales, contribuyendo al éxito de las organizaciones.
        </p>

    </section>

    <!-- Sección Misión -->
    <div id="mision" class="section-content">
        <div class="flex items-center justify-between">
            <div class="text-section">
                <h2>Misión</h2>
                <p>La misión de la Etapa Productiva es promover la integración efectiva de los estudiantes en el entorno
                    laboral, brindándoles la oportunidad de aplicar y perfeccionar los conocimientos adquiridos durante
                    su formación académica. Este proceso se centra en fortalecer sus habilidades técnicas y desarrollar
                    competencias transversales que les permitan adaptarse y responder a las demandas cambiantes del
                    mercado laboral.

                    A través de experiencias prácticas supervisadas y orientadas, buscamos no solo mejorar la formación
                    integral de los estudiantes, sino también impulsar su crecimiento personal y profesional. Nuestro
                    objetivo es formar individuos competentes, comprometidos y preparados para enfrentar los desafíos de
                    un entorno laboral globalizado, contribuyendo así al desarrollo y productividad de las
                    organizaciones que los reciben, y creando un impacto positivo en la sociedad.






                </p>
            </div>
            <div class="carrusel-container ml-8" style="max-width: 35%; width: 35%;">
                <div class="carousel-images">
                    <img src="{{ asset('img/webpng/image1.png') }}" alt="Imagen 1"
                        style="width: 100%; height: auto;">
                    <img src="{{ asset('img/webpng/image copy.png') }}" alt="Imagen 2"
                        style="width: 100%; height: auto;">
                    <img src="{{ asset('img/webpng/image copy 2.png') }}" alt="Imagen 3"
                        style="width: 100%; height: auto;">
                    <img src="{{ asset('img/webpng/image2.png') }}" alt="Imagen 3"
                        style="width: 100%; height: auto;">
                    <img src="{{ asset('img/webpng/image3.png') }}" alt="Imagen 3"
                        style="width: 100%; height: auto;">
                    <img src="{{ asset('img/webpng/image4.png') }}" alt="Imagen 3"
                        style="width: 100%; height: auto;">

                    <!-- Agrega más imágenes aquí si lo deseas -->
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery y Slick JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#carouselImages').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                dots: true,
                autoplay: true, // Activa el autoplay
                autoplaySpeed: 2000, // Duración de 3 segundos entre cada imagen
            });
        });

        $(document).ready(function() {
            $('.carousel-images').slick({
                autoplay: true, // Activa el cambio automático
                autoplaySpeed: 4000, // Cambia la imagen cada 3 segundos
                infinite: true, // Ciclo infinito
                arrows: false, // Desactiva los botones de navegación (opcional)
                dots: false, // Desactiva los puntos de navegación
                fade: true,
                adaptiveHeight: true // Efecto de desvanecimiento entre las imágenes
            });
        });

        function showInfo(modalidad) {
            let alertText = '';

            switch (modalidad) {
                case 'pasantia':
                    alertText =
                        "La pasantía permite al aprendiz realizar prácticas en una empresa, poniendo en práctica lo aprendido en su formación académica. Ideal para estudiantes que desean experimentar el entorno laboral y aplicar sus conocimientos.";
                    break;
                case 'contrato':
                    alertText =
                        "El contrato de aprendizaje combina la formación teórica con la práctica laboral, donde el aprendiz es un colaborador activo en la empresa, y recibe una remuneración acorde al tipo de contrato.";
                    break;
                case 'vinculo':
                    alertText =
                        "En el vínculo laboral, el aprendiz trabaja directamente en una empresa con un contrato formal de trabajo y salario acorde a las normativas laborales, permitiendo una inmersión total en el entorno laboral.";
                    break;
                case 'unidad':
                    alertText =
                        "En la modalidad de unidad productiva familiar, el aprendiz se involucra en el desarrollo de un emprendimiento familiar, aplicando sus conocimientos para fortalecer y expandir el negocio.";
                    break;
                case 'proyecto':
                    alertText =
                        "El proyecto productivo empresarial permite a los aprendices participar en proyectos innovadores dentro de las empresas, generando soluciones prácticas para las necesidades de la empresa.";
                    break;
                default:
                    alertText = "Información no disponible.";
            }

            // Mostrar el mensaje en la alerta
            document.getElementById('alertText').innerText = alertText;
            document.getElementById('infoAlert').classList.remove('hidden');

            // Desenfocar el resto del contenido con un desenfoque más suave
            document.querySelector('.section-content').style.filter = 'blur(4px)';
        }

        function closeAlert() {
            // Ocultar la alerta y quitar el desenfoque
            document.getElementById('infoAlert').classList.add('hidden');
            document.querySelector('.section-content').style.filter = 'none';
        }
    </script>
</body>

</html>
