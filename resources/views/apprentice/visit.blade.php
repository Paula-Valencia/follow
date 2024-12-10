<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
    <title>Etapa Productiva</title>
    <style>
        #userMenu {
            top: 100%;
            margin-top: 0.5rem;
        }

        .user-status {
            text-align: center;
            /* Centrar el texto */
            color: #009e00;
            /* Color verde */
            margin-top: 5px;
            /* Espacio superior para alineación */
            font-size: 12px;
            /* Ajustar el tamaño de fuente */
        }

        .vis-item.completed {
            background-color: green;
            color: white;
        }

        .vis-item {
            background-color: #3498db;
            color: white;
        }

        .vis-item.vis-selected {
            background-color: #2ecc71;
        }

        .card {
            width: 300px;
            /* Ajusta el ancho según tus necesidades */
            height: 300px;
            /* Ajusta la altura según tus necesidades */
            position: relative;
            /* Necesario para posicionar el texto en el centro */
        }

        #percentage {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 2rem;
            /* Ajusta el tamaño de la fuente según tus necesidades */
            font-weight: bold;
            color: black;
            /* Color del porcentaje */
        }

        .back-button {
            background-color: transparent;
            color: #000000;
            font-style: normal;
            position: absolute;
            width: 27px;
            height: 27px;
            left: 40px;
            top: -16px;
            padding: 15px;
            text-align: center;
            font-size: 32px;
            cursor: pointer;
            text-decoration: none;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .notification-container h3 {
                width: 70%;
                font-size: 18px;
            }
        }

        @media (max-width: 768px) {

            .notification-container h3 {
                width: 80%;
                font-size: 16px;
                left: 10px;
            }

            .back-button {
                left: 10px;
                top: -10px;
                font-size: 28px;
            }
        }

        @media (max-width: 480px) {
            .notification-container {
                top: 20%;
                height: auto;
            }

            .notification-container h3 {
                width: 90%;
                font-size: 14px;
                left: 5px;
            }

            .back-button {
                left: 5px;
                top: -8px;
                font-size: 26px;
            }
        }

        @media (max-width: 1024px) {


            .notification-container h3 {
                width: 70%;
                font-size: 18px;
            }
        }

        @media (max-width: 768px) {


            .notification-container h3 {
                width: 80%;
                font-size: 16px;
                left: 10px;
            }

            .back-button {
                left: 10px;
                top: -10px;
                font-size: 28px;
            }
        }

        @media (max-width: 480px) {
            .notification-container {
                top: 15%;
                height: auto;
            }

            .notification-container h3 {
                width: 90%;
                font-size: 14px;
                left: 5px;
            }

            .back-button {
                left: 5px;
                top: -8px;
                font-size: 26px;
            }
        }

        /*olj*/
        .trainer-container {
            display: flex;
            /* Para aplicar el modelo de caja flexible */
            border-radius: 0.5rem;
            /* rounded-lg en Tailwind */
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            position: absolute;
            width: 100%;
            height: 38px;
            top: 27%;
            display: flex;
            justify-content: space-between;
            align-items: center;

            background: #D9D9D9;
        }

        .trainer-container h4 {
            text-align: left;
            font-family: 'DM Sans', sans-serif;
            font-style: normal;
            font-weight: 400;
            font-size: 15px;
            line-height: 31px;
            display: flex;
            align-items: center;
            padding: 6%;



            color: #000000;
        }

        .trainer-container p {
            text-align: right;

            font-family: 'DM Sans', sans-serif;
            font-style: normal;
            font-weight: 400;
            font-size: 15px;
            line-height: 31px;
            display: inline-flex;
            align-items: center;
            justify-content: right;
            margin: 0 10px;

            color: #000000;
        }

        .visit-container {
            display: flex;
            /* Para aplicar el modelo de caja flexible */

            background-color: #f7fafc;
            /* bg-gray-100 en Tailwind */
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
            /* shadow en Tailwind */
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: absolute;
            width: 792px;
            height: 334px;
            left: 10%;
            top: 35%;
            background: #FFFEFE;
            border: 10px#2F3E4C;
            border-radius: 20px;
        }

        .name {
            box-sizing: border-box;
            text-align: center;
            width: 792px;
            height: 59px;
            background: #009e00;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            font-family: 'DM Sans', sans-serif;
            font-style: normal;
            font-weight: 400;
            font-size: 15px;
            color: #FFFFFF;
        }


        .visit-container p {
            position: relative;
            width: 373px;
            height: auto;
            left: 12px;
            top: -5%;
            font-family: 'DM Sans', sans-serif;
            font-style: normal;
            font-weight: 400;
            font-size: 15px;
            color: #000000;
        }

        .line {
            width: 666px;
            height: 1px;
            background-color: rgba(7, 7, 7, 0.1);
            position: absolute;
            top: 60%;
        }

        .buttons {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            padding: 40px;

        }

        a {
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            color: black;
            text-align: center;
        }

        a.reject {
            background-color: #D9D9D9;
            font-family: 'DM Sans', sans-serif;
            font-style: normal;
            font-size: 15px;
            display: flex;
            align-items: center;
            text-align: center;
            border-radius: 20px;
            color: #000000;

            border: 1px solid #000000;
        }

        a.accept {
            background-color: #009E00;
            font-family: 'DM Sans', sans-serif;
            font-style: normal;
            font-size: 15px;
            display: flex;
            align-items: center;
            text-align: center;
            border-radius: 20px;

            color: #000000;

            border: 1px solid #000000;
        }

        @media (max-width: 1024px) {
            .visit-container {
                width: 90%;
                left: 5%;
            }

            .name {
                width: 100%;
            }

            .trainer-container {
                flex-direction: column;
                height: auto;
                padding: 10px;
            }

            .trainer-container h4,
            .trainer-container p {
                font-size: 18px;
                padding: 10px;
            }
        }

        @media (max-width: 768px) {
            .visit-container {
                width: 95%;
                left: 2.5%;
            }

            .name {
                height: auto;
                padding: 15px;
            }

            .trainer-container h4,
            .trainer-container p {
                font-size: 16px;
            }

            .buttons {
                padding: 20px;
                flex-direction: column;
                gap: 15px;
            }

            a {
                width: 100%;
                font-size: 18px;
            }
        }

        @media (max-width: 480px) {
            .visit-container {
                width: 100%;
                left: 0;
            }

            .trainer-container h4,
            .trainer-container p {
                font-size: 14px;
            }

            a {
                font-size: 16px;
                padding: 8px 15px;
            }
        }
    </style>
</head>

<body class="font-['Arial',sans-serif] bg-white m-0 flex flex-col min-h-screen">

    @include('partials.header')

    <nav class="bg-[#009e00] px-2.5 h-14 py-1.5 flex justify-start items-center relative z-10">
        <a href="{{ route('apprentice.notification') }}" id="notifButton" class="absolute right-0">
            <img class="w-[35px] h-auto mr-2.5 filter invert" src="{{ asset('img/notificaciones.png') }}"
                alt="Notificaciones">
        </a>
        <div class="w-full flex justify-center">
            <ul class="horizontal-list flex space-x-4 justify-center">
                <li>
                    <a href="{{ route('apprentice.home') }}"
                        class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="{{ route('apprentice.calendar') }}"
                        class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                        Calendario
                    </a>
                </li>
            </ul>
        </div>

    </nav>

    <div class="trainer-container ">
        <div class="w-full flex justify-between items-center mt-0">
            <a href="{{ route('apprentice.notification') }}" class="ml-4">
                <img src="{{ asset('img/flecha.png') }}" alt="Flecha" class="w-5 h-auto mr-1">
            </a>
            <h4 class="flex items-center ">Instructor</h4>
            <p>08:39am. 30 mar</p>
        </div>
    </div>

    <div class="visit-container ">
        <div class="name">
            <h5>¡Mariani Dorado ha solicitado programar una visita!</h5>
        </div>
        <p>Fecha: 01/04/2024 </p>
        <p>Hora: 08:30am.</p>

        <div class="line"></div>

        <div class="buttons">
            <a href="{{ route('apprentice.index') }}" class="reject">Rechazar</a>
            <a href="{{ route('apprentice.calendar') }}" class="accept">Aceptar</a>
        </div>
    </div>

    <script>
        document.querySelector('.dropbtn').addEventListener('click', function() {
            document.querySelector('.dropdown-content').classList.toggle('show');
        });


        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const currentMonthSpan = document.getElementById('currentMonth');
            const prevMonthButton = document.getElementById('prevMonth');
            const nextMonthButton = document.getElementById('nextMonth');
            const calendarDays = document.getElementById('calendarDays');
            const eventModal = document.getElementById("eventModal");
            const addEventButton = document.getElementById("addEvent");
            const cancelEventButton = document.getElementById("cancelEvent");
            const eventForm = document.getElementById("eventForm");
            const eventIdInput = document.getElementById("eventId");
            const modalTitle = document.getElementById("modalTitle");

            let currentMonth = new Date().getMonth();
            let currentYear = new Date().getFullYear();
            let events = JSON.parse(localStorage.getItem('events')) || [];

            const months = [
                'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
            ];

            function daysInMonth(month, year) {
                return new Date(year, month + 1, 0).getDate();
            }

            function firstDayOfMonth(month, year) {
                return new Date(year, month, 1).getDay();
            }

            function renderCalendar() {
                calendarDays.innerHTML = '';
                currentMonthSpan.textContent = `${months[currentMonth]} ${currentYear}`;

                const totalDays = daysInMonth(currentMonth, currentYear);
                const startDay = firstDayOfMonth(currentMonth, currentYear);

                for (let i = 0; i < startDay; i++) {
                    const emptyCell = document.createElement('div');
                    calendarDays.appendChild(emptyCell);
                }

                for (let day = 1; day <= totalDays; day++) {
                    const dayCell = document.createElement('div');
                    dayCell.classList.add('day-cell'); // Agregar una clase para estilos adicionales si es necesario
                    dayCell.textContent = day;

                    const dayEvents = events.filter(event => {
                        const eventDate = new Date(event.date);
                        return eventDate.getDate() === day && eventDate.getMonth() === currentMonth &&
                            eventDate.getFullYear() === currentYear;
                    });

                    dayEvents.forEach(event => {
                        const eventDiv = document.createElement('div');
                        eventDiv.classList.add('event');
                        eventDiv.textContent = event.title;
                        eventDiv.style.cursor = 'pointer';
                        eventDiv.classList.add('bg-blue-200', 'rounded', 'mt-1',
                            'p-1'); // Estilos opcionales
                        eventDiv.addEventListener("click", () => {
                            // Redirigir a la página de detalles del evento con el ID en la URL
                            window.location.href = `event-details.html?id=${event.id}`;
                        });
                        dayCell.appendChild(eventDiv);
                    });

                    calendarDays.appendChild(dayCell);
                }
            }

            prevMonthButton.addEventListener('click', function() {
                currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
                if (currentMonth === 11) currentYear--;
                renderCalendar();
            });

            nextMonthButton.addEventListener('click', function() {
                currentMonth = (currentMonth === 11) ? 0 : currentMonth + 1;
                if (currentMonth === 0) currentYear++;
                renderCalendar();
            });

            addEventButton.addEventListener("click", function() {
                modalTitle.textContent = "Agregar Evento";
                eventIdInput.value = ''; // Limpiar ID
                eventForm.reset(); // Limpiar el formulario
                eventModal.classList.remove("hidden");
            });

            cancelEventButton.addEventListener("click", function() {
                eventModal.classList.add("hidden");
            });

            eventForm.addEventListener("submit", function(e) {
                e.preventDefault();
                const eventDate = document.getElementById("eventDate").value;
                const eventTitle = document.getElementById("eventTitle").value;
                const eventDescription = document.getElementById("eventDescription").value;

                if (eventIdInput.value) {
                    // Actualizar evento
                    const eventIndex = events.findIndex(event => event.id === eventIdInput.value);
                    if (eventIndex !== -1) {
                        events[eventIndex] = {
                            id: eventIdInput.value,
                            date: eventDate,
                            title: eventTitle,
                            description: eventDescription
                        };
                    }
                } else {
                    // Agregar nuevo evento
                    const newEvent = {
                        id: Date.now().toString(), // Usar timestamp como ID
                        date: eventDate,
                        title: eventTitle,
                        description: eventDescription
                    };
                    events.push(newEvent);
                }

                // Guardar eventos en localStorage
                localStorage.setItem('events', JSON.stringify(events));

                eventModal.classList.add("hidden");
                renderCalendar();
            });

            function openEditEvent(event) {
                modalTitle.textContent = "Actualizar Evento";
                eventIdInput.value = event.id; // Establecer ID del evento
                document.getElementById("eventDate").value = event.date;
                document.getElementById("eventTitle").value = event.title;
                document.getElementById("eventDescription").value = event.description;
                eventModal.classList.remove("hidden");
            }

            renderCalendar(); // Renderizar el calendario al cargar la página
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Evento para el toggle del menú 2
            document.getElementById('toggleMenu2').addEventListener('click', function() {
                console.log('toggleMenu2 clicked'); // Verificar si se activa el evento
                var menu = document.getElementById('menu2');
                menu.classList.toggle('hidden'); // Alternar la clase 'hidden'
            });

            // Función para alternar sublistas
            function toggleSublist(event) {
                event.preventDefault(); // Evitar el comportamiento por defecto
                var sublist = event.target.nextElementSibling; // Obtener el siguiente elemento
                if (sublist) {
                    sublist.classList.toggle('hidden'); // Alternar la clase 'hidden' de la sublista
                }
            }

            // Registro del evento para todos los enlaces que necesitan alternar un submenu
            document.querySelectorAll('a[onclick="toggleSublist(event)"]').forEach(function(link) {
                link.addEventListener('click', toggleSublist);
            });
        });
    </script>

</body>

</html>
