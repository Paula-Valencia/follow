<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <title>Etapa Seguimiento</title>
    <style>
        #userMenuTri {
            top: 100%;
            margin-top: 0.5rem;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="font-['Arial',sans-serif] bg-white m-0 flex flex-col min-h-screen">

    @include('partials.header')

    <!--Notificaciones -->
    @include('partials.nav-trainner')

    <div class="w-full flex justify-between items-center mt-4">
        <a href="{{ route('trainer.home') }}" class="ml-4">
            <img src="{{ asset('img/flecha.png') }}" alt="Flecha" class="w-5 h-auto">
        </a>
    </div>

    <main class=" bg-white m-2 px-2 rounded-lg max-height-100% w-5/7">

        <div class="flex flex-cols-4 gap-12 pb-4  items-between text-center mt-2">
            <div class="flex flex-col w-1/4 ">
                <label class="font-bold">Nombre Del Aprendiz</label>
                <p type="text" class="bg-gray-200 bg-opacity-60 p-2 rounded-md text-black">
                    {{ $apprentice['name'] . ' ' . $apprentice['last_name'] }}
                </p>
            </div>
            <div class="flex flex-col  w-1/4">
                <label class="font-bold">Programa</label>
                <p type="text" class=" bg-gray-200 bg-opacity-60 p-2 rounded-md text-black">
                    {{ isset($apprentice['apprentice']['program']) ? $apprentice['apprentice']['program'] : '' }}
                </p>
            </div>
            <div class="flex flex-col  w-1/4">
                <label class="font-bold">N° Ficha</label>
                <p type="text" class=" bg-gray-200 bg-opacity-60 p-2 rounded-md text-black">
                    {{ isset($apprentice['apprentice']['ficha']) ? $apprentice['apprentice']['ficha'] : '' }}
                </p>
            </div>
            <div class="flex flex-col  w-1/4">
                <label class="font-bold">Correo Electrónico</label>
                <p type="email" class=" bg-gray-200 bg-opacity-60 p-2 rounded-md text-black">
                    {{ $apprentice['email'] }}
                </p>
            </div>
        </div>

        <div class="flex justify-center">
            <div
                class="flex-cols-2 gap-2 p-4 w-2/5 text-center h-vg[80] shadow-[0_0_10px_rgba(0,0,0,0.3)] border-gray-300 rounded-2xl ml-4">

                <div class="flex flex-col">
                    <label class="font-bold">Nombre De La Empresa</label>
                    <p type="text" class="border border-gray-400  p-2 rounded-md bg-white">
                        {{ isset($apprentice['apprentice']['contract']['company']) ? $apprentice['apprentice']['contract']['company']['name'] : '' }}
                    </p>
                </div>

                <div class="w-full flex space-x-4 items-center justify-between text-center">
                    <div class="flex flex-col">
                        <label class="font-bold">Tipo de Seguimiento</label>
                        <select class="border border-gray-400 p-2 rounded-md w-48 bg-white">
                            <option selected="">Selecciona Opción</option>
                            <option value="Inicial">Concertación</option>
                            <option value="Parcial">Parcial</option>
                            <option value="Final">Final</option>
                            <option value="Mejoramiento">Mejoramiento</option>
                        </select>
                    </div>
                    <div class="flex flex-col">
                        <label class="font-bold">Fecha</label>
                        <input type="date" class="border border-gray-400 p-2 rounded-md w-48 bg-white text-center">
                    </div>
                </div>

                <div class="flex flex-col ">
                    <label class="font-bold">Nombre del Jefe Inmediato</label>
                    <input type="text" id="jefe_inmediato" value=""
                        class="border border-gray-400 p-2 rounded-md bg-white text-center ">
                </div>

                <div class="flex flex-col ">
                    <label class="font-bold">Correo</label>
                    <input type="text" id="correo_empresa"
                        value="{{ isset($apprentice['apprentice']['contract']['company']) ? $apprentice['apprentice']['contract']['company']['email'] : '' }}"
                        class="border border-gray-400 p-2 rounded-md bg-white text-center ">
                </div>
                <div class="flex flex-col ">
                    <label class="font-bold">Telefono de contacto</label>
                    <input type="text" id="telefono_contacto"
                        value="{{ isset($apprentice['apprentice']['contract']['company']) ? $apprentice['apprentice']['contract']['company']['telephone'] : '' }}"
                        class="border border-gray-400 p-2 rounded-md bg-white text-center ">
                </div>
            </div>
        </div>

        <div class="flex justify-center mt-4">
            <div class="flex flex-wrap lg:flex-nowrap w-full max-w-6xl">

                <!-- Columna Izquierda: Formulario -->
                <div class="w-full lg:w-1/2 bg-white p-6 rounded-lg shadow-md">
                    <form id="agreementForm" onsubmit="saveAgreement(event)">
                        <h2 class="text-2xl font-bold mb-4 text-center" id="formTitle">Crear visita</h2>

                        <div class="flex justify-between items-center">
                            <div class="flex-1 text-center">
                            </div>
                            <button type="button" id="resetFormButton" style="display: none" onclick="resetForm()"
                                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 focus:outline-none">
                                Crear
                            </button>
                        </div>

                        <div class="mb-4">
                            <label for="type_of_agreement" class="block text-gray-700 font-medium mb-2">Tipo de
                                visita:</label>
                            <input type="text" id="type_of_agreement" name="type_of_agreement" required
                                class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div class="mb-4">
                            <label for="date" class="block text-gray-700 font-medium mb-2">Fecha:</label>
                            <input type="date" id="date" name="date" required
                                class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div class="mb-4">
                            <label for="name_of_immediate_boss" class="block text-gray-700 font-medium mb-2">Nombre
                                del
                                jefe inmediato:</label>
                            <input type="text" id="name_of_immediate_boss" name="name_of_immediate_boss" required
                                class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 font-medium mb-2">Email:</label>
                            <input type="email" id="email" name="email" required
                                class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div class="mb-4">
                            <label for="telephone" class="block text-gray-700 font-medium mb-2">Teléfono:</label>
                            <input type="text" id="telephone" name="telephone" required
                                class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div class="mb-4">
                            <label for="observation" class="block text-gray-700 font-medium mb-2">Observación:</label>
                            <textarea id="observation" name="observation" rows="4" required
                                class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                        </div>

                        <button type="submit" id="formSubmitButton"
                            class="w-full bg-green-500 text-white p-2 rounded hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Guardar
                        </button>
                    </form>
                </div>

                <!-- Columna Derecha: Lista de visitas -->
                <div class="w-full lg:w-1/2 bg-gray-50 p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold mb-4 text-center">Visitas del Usuario</h2>
                    <div class="overflow-y-auto max-h-96">
                        <ul id="visitsList" class="space-y-4">

                        </ul>
                    </div>
                </div>

            </div>
        </div>

    </main>

    <script>
        const URL_API = "{{ env('URL_API') }}";
        let visits = [];
        let currentVisitId = null;
        let id_apprentice = null;

        function loadVisits() {
            const urlPath = window.location.pathname;
            id_apprentice = urlPath.split('/').pop();

            axios.get(`${URL_API}get_visits_by_apprentice/${id_apprentice}`)
                .then(response => {
                    visits = response.data;
                    renderVisits();
                })
                .catch(error => {
                    console.error('Error al cargar las visitas:', error);
                });
        }

        function renderVisits() {
            const visitsList = document.getElementById('visitsList');
            visitsList.innerHTML = ''; // Limpiar lista existente

            visits.forEach(visit => {
                const li = document.createElement('li');
                li.className = 'p-4 bg-white rounded shadow border border-gray-300';
                li.innerHTML = `
                    <h3 class="font-bold">Tipo de visita: ${visit.type_of_agreement}</h3>
                    <p class="text-sm text-gray-600">Fecha: ${visit.date}</p>
                    <p class="text-sm text-gray-600">Jefe Inmediato: ${visit.name_of_immediate_boss}</p>
                    <div class="flex gap-2 mt-2">
                        <button
                            class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500"
                            onclick="openEditModal(${visit.id})">
                            Editar
                        </button>
                        <button
                            class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500"
                            onclick="deleteVisit(${visit.id})">
                            Eliminar
                        </button>
                    </div>
                `;
                visitsList.appendChild(li);
            });
        }

        function openEditModal(visitId) {
            const visit = visits.find(v => v.id === visitId);
            if (!visit) return;

            currentVisitId = visit.id;

            const form = document.getElementById('agreementForm');
            form.type_of_agreement.value = visit.type_of_agreement;
            form.date.value = visit.date;
            form.name_of_immediate_boss.value = visit.name_of_immediate_boss;
            form.email.value = visit.email || '';
            form.telephone.value = visit.telephone;
            form.observation.value = visit.observation;

            document.getElementById('formTitle').innerText = 'Actualizar visita';
            document.getElementById('formSubmitButton').innerText = 'Actualizar';

            form.setAttribute('data-action', 'update'); // Marcar el formulario como "actualizar"
            document.getElementById('resetFormButton').style.display = 'inline-block';
        }

        function saveOrUpdateVisit(event) {
            event.preventDefault();

            const form = document.getElementById('agreementForm');
            const formData = new FormData(form);
            formData.append('apprendice_id', id_apprentice);
            const data = Object.fromEntries(formData.entries());
            const isUpdate = form.getAttribute('data-action') === 'update';

            if (isUpdate && currentVisitId) {
                axios.put(`${URL_API}update_visit_to_apprentice_by_id/${currentVisitId}`, data)
                    .then(response => {
                        const updatedVisit = response.data;

                        const index = visits.findIndex(visit => visit.id === currentVisitId);
                        if (index !== -1) {
                            visits[index] = updatedVisit;
                        }

                        renderVisits();
                        resetForm();

                        Swal.fire({
                            icon: 'success',
                            title: 'Visita actualizada correctamente.',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    })
                    .catch(error => {
                        console.error('Error al actualizar la visita:', error);

                        Swal.fire({
                            icon: 'error',
                            title: 'Error al actualizar la visita.',
                            text: error.message,
                            showConfirmButton: true
                        });
                    });
            } else {
                axios.post(`${URL_API}create_visit_to_apprentice`, data)
                    .then(response => {
                        const newVisit = response.data;

                        visits.unshift(newVisit);

                        renderVisits();
                        resetForm();

                        Swal.fire({
                            icon: 'success',
                            title: 'Visita guardada correctamente.',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    })
                    .catch(error => {
                        console.error('Error al guardar la visita:', error);

                        Swal.fire({
                            icon: 'error',
                            title: 'Error al guardar la visita.',
                            text: error.message,
                            showConfirmButton: true
                        });
                    });
            }
        }

        function deleteVisit(visitId) {
            resetForm();
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'Esta acción no se puede deshacer.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Hacer la solicitud DELETE a la API para eliminar la visita
                    axios.delete(`${URL_API}delete_visit/${visitId}`)
                        .then(() => {
                            // Eliminar la visita del array local
                            visits = visits.filter(visit => visit.id !== visitId);

                            renderVisits(); // Actualizar el DOM

                            // Mostrar mensaje de éxito con SweetAlert2
                            Swal.fire({
                                icon: 'success',
                                title: 'Visita eliminada correctamente.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        })
                        .catch(error => {
                            console.error('Error al eliminar la visita:', error);

                            // Mostrar mensaje de error con SweetAlert2
                            Swal.fire({
                                icon: 'error',
                                title: 'Error al eliminar la visita.',
                                text: error.message,
                                showConfirmButton: true
                            });
                        });
                }
            });
        }

        // Reiniciar formulario
        function resetForm() {
            const form = document.getElementById('agreementForm');
            form.reset(); // Limpiar los campos del formulario

            // Restaurar el estado inicial del formulario
            document.getElementById('formTitle').innerText = 'Crear visita';
            document.getElementById('formSubmitButton').innerText = 'Crear';
            form.setAttribute('data-action', 'create'); // Cambiar el atributo para "crear"
            currentVisitId = null; // Limpiar el ID de la visita actual

            // Ocultar el botón "Crear"
            document.getElementById('resetFormButton').style.display = 'none';
        }

        // Ejecutar al cargar la página
        document.addEventListener('DOMContentLoaded', function() {
            loadVisits();

            const form = document.getElementById('agreementForm');
            form.addEventListener('submit', saveOrUpdateVisit);
        });
    </script>

    <script>
        // Esperar a que el DOM se cargue
        document.addEventListener("DOMContentLoaded", function() {
            // Obtener el botón por su ID
            const registrarBtn = document.getElementById("registrar-btn");

            // Agregar el evento de click
            registrarBtn.addEventListener("click", function() {
                // Mostrar un mensaje cuando el botón sea presionado
                alert(" Visita Registrada");
            });
        });
    </script>

</body>

</html>
