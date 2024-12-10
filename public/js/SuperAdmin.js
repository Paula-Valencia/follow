
// Manejar la visibilidad del menú de notificaciones
document.addEventListener('DOMContentLoaded', function () {
    const notifButton = document.getElementById('notifButton');
    const notifMenu = document.getElementById('notifMenu');

    // Alternar la visibilidad del menú de notificaciones al hacer clic en el botón
    notifButton.addEventListener('click', function (event) {
        notifMenu.classList.toggle('hidden');
        event.stopPropagation(); // Detener la propagación del evento para evitar el cierre inmediato
    });

    // Ocultar el menú de notificaciones si se hace clic fuera de él
    document.addEventListener('click', function (event) {
        if (!notifButton.contains(event.target) && !notifMenu.contains(event.target)) {
            notifMenu.classList.add('hidden');
        }
    });

    // Manejar la visibilidad del menú del usuario
    const menuButton = document.getElementById('menuButton');
    const userMenu = document.getElementById('userMenu');

    // Alternar la visibilidad del menú del usuario al hacer clic en el botón
    menuButton.addEventListener('click', function (event) {
        userMenu.classList.toggle('hidden');
        event.stopPropagation(); // Detener la propagación del evento para evitar el cierre inmediato
    });

    // Ocultar el menú del usuario si se hace clic fuera de él
    document.addEventListener('click', function (event) {
        if (!menuButton.contains(event.target) && !userMenu.contains(event.target)) {
            userMenu.classList.add('hidden');
        }
    });
});
document.addEventListener('DOMContentLoaded', function () {
    // Datos para las gráficas
    const data = {
        pasantia: 150,
        vinculoLaboral: 250,
        contratoAprendizaje: 110,
        unidadProductiva: 190,
        proyectoProductivo: 100
    };

    const dataAdicional = {
        pasantia: 1150,
        vinculoLaboral: 1250,
        contratoAprendizaje: 1110,
        unidadProductiva: 1190,
        proyectoProductivo: 1100
    };

    function createPieChart(ctx, data) {
        return new Chart(ctx, {
            type: 'pie',
            data: {
                labels: Object.keys(data),
                datasets: [{
                    data: Object.values(data),
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF']
                }]
            }
        });
    }

    function createBarChart(ctx, data) {
        return new Chart(ctx, {
            type: 'bar',
            data: {
                labels: Object.keys(data),
                datasets: [{
                    label: 'Cantidad',
                    data: Object.values(data),
                    backgroundColor: '#36A2EB'
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    function createDoughnutChart(ctx, data) {
        return new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Aprendices', 'Otros'],
                datasets: [{
                    data: [data.contratoAprendizaje, Object.values(data).reduce((a, b) => a + b) - data.contratoAprendizaje],
                    backgroundColor: ['#FF6384', '#36A2EB']
                }]
            }
        });
    }

    // Crear gráficas
    createPieChart(document.getElementById('pieChartAdicional').getContext('2d'), dataAdicional);
    createBarChart(document.getElementById('barChartAdicional').getContext('2d'), dataAdicional);
    createDoughnutChart(document.getElementById('doughnutChartAdicional').getContext('2d'), dataAdicional);
});
// Datos para las gráficas
const data = {
    pasantia: 150,
    vinculoLaboral: 250,
    contratoAprendizaje: 110,
    unidadProductiva: 190,
    proyectoProductivo: 100
};

const dataAdicional = {
    pasantia: 1150,
    vinculoLaboral: 1250,
    contratoAprendizaje: 1110,
    unidadProductiva: 1190,
    proyectoProductivo: 1100
};

function createPieChart(ctx, data) {
    return new Chart(ctx, {
        type: 'pie',
        data: {
            labels: Object.keys(data),
            datasets: [{
                data: Object.values(data),
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF']
            }]
        }
    });
}

function createBarChart(ctx, data) {
    return new Chart(ctx, {
        type: 'bar',
        data: {
            labels: Object.keys(data),
            datasets: [{
                data: Object.values(data),
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF']
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

function createDoughnutChart(ctx, data) {
    return new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: Object.keys(data),
            datasets: [{
                data: Object.values(data),
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF']
            }]
        }
    });
}

// Crear gráficas
createPieChart(document.getElementById('pieChart').getContext('2d'), data);
createBarChart(document.getElementById('barChart').getContext('2d'), data);
createDoughnutChart(document.getElementById('doughnutChart').getContext('2d'), data);

createPieChart(document.getElementById('pieChartAdicional').getContext('2d'), dataAdicional);
createBarChart(document.getElementById('barChartAdicional').getContext('2d'), dataAdicional);
createDoughnutChart(document.getElementById('doughnutChartAdicional').getContext('2d'), dataAdicional);

// Funcionalidad del formulario
document.getElementById('contractForm').addEventListener('submit', function (e) {
    e.preventDefault();
    alert('Formulario enviado');
});

['pendienteBtn', 'activoBtn', 'finalizadosBtn'].forEach(id => {
    document.getElementById(id).addEventListener('click', function () {
        alert(`Estado cambiado a: ${this.textContent}`);
    });
});

document.getElementById('cancelarBtn').addEventListener('click', function () {
    document.getElementById('contractForm').reset();
});

// Actualizar los totales
function updateTotals(data, suffix = '') {
    for (let key in data) {
        document.getElementById(key + suffix).textContent = data[key];
    }
    document.getElementById('total' + suffix).textContent = Object.values(data).reduce((a, b) => a + b);
}

updateTotals(data);
updateTotals(dataAdicional, 'Adicional');

// Agregar un listener al botón del menú del usuario para alternar la visibilidad del menú
document.getElementById('menuButton').addEventListener('click', function () {
    document.getElementById('userMenu').classList.toggle('hidden');
});

// Agregar un listener al botón de notificaciones para alternar la visibilidad del menú de notificaciones
document.getElementById('notifButton').addEventListener('click', function () {
    document.getElementById('notifMenu').classList.toggle('hidden');
});

// Cuando el contenido de la página se ha cargado completamente
document.addEventListener('DOMContentLoaded', function () {
    // Seleccionar elementos del DOM necesarios para el calendario y el formulario de eventos
    const calendarGrid = document.querySelector('.grid');
    const currentMonthSpan = document.getElementById('currentMonth');
    const prevMonthBtn = document.getElementById('prevMonth');
    const nextMonthBtn = document.getElementById('nextMonth');
    const addEventBtn = document.getElementById('addEvent');
    const eventModal = document.getElementById('eventModal');
    const cancelEventBtn = document.getElementById('cancelEvent');
    const eventForm = document.getElementById('eventForm');

    // Definir la fecha actual y un objeto para almacenar eventos
    let currentDate = new Date();
    let events = {};

    // Función para renderizar el calendario del mes actual
    function renderCalendar(year, month) {
        calendarGrid.innerHTML = ''; // Limpiar el calendario existente

        const firstDay = new Date(year, month, 1); // Primer día del mes
        const lastDay = new Date(year, month + 1, 0); // Último día del mes
        const daysInMonth = lastDay.getDate(); // Total de días en el mes

        // Agregar celdas vacías para los días antes del primer día del mes
        for (let i = 0; i < firstDay.getDay(); i++) {
            calendarGrid.appendChild(createDayElement(''));
        }

        // Agregar celdas para cada día del mes
        for (let day = 1; day <= daysInMonth; day++) {
            const date = new Date(year, month, day);
            const dayElement = createDayElement(day);

            // Resaltar el día actual
            if (date.toDateString() === new Date().toDateString()) {
                dayElement.classList.add('bg-yellow-200'); // Fondo amarillo para el día actual
            }

            // Mostrar un indicador si hay eventos en ese día
            const dateString = date.toISOString().split('T')[0];
            if (events[dateString]) {
                const eventIndicator = document.createElement('div');
                eventIndicator.className = 'bg-[#009e00] w-2 h-2 rounded-full mx-auto mt-1'; // Estilo del indicador
                dayElement.appendChild(eventIndicator);
            }

            calendarGrid.appendChild(dayElement);
        }

        // Actualizar el texto del mes actual en el encabezado
        currentMonthSpan.textContent = `${firstDay.toLocaleString('default', { month: 'long' })} ${year}`;
    }

    // Función para crear un elemento de día en el calendario
    function createDayElement(day) {
        const dayElement = document.createElement('div');
        dayElement.className = 'border p-2 h-24 relative'; // Estilos básicos del día
        dayElement.textContent = day; // Establecer el texto del día
        return dayElement;
    }

    // Manejador de clic para el botón del mes anterior
    prevMonthBtn.addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() - 1); // Decrementar el mes
        renderCalendar(currentDate.getFullYear(), currentDate.getMonth()); // Volver a renderizar el calendario
    });

    // Manejador de clic para el botón del mes siguiente
    nextMonthBtn.addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() + 1); // Incrementar el mes
        renderCalendar(currentDate.getFullYear(), currentDate.getMonth()); // Volver a renderizar el calendario
    });

    // Mostrar el modal para agregar un evento
    addEventBtn.addEventListener('click', () => {
        eventModal.classList.remove('hidden'); // Mostrar el modal
    });

    // Ocultar el modal cuando se cancela la adición de un evento
    cancelEventBtn.addEventListener('click', () => {
        eventModal.classList.add('hidden'); // Ocultar el modal
    });

    // Manejador de envío del formulario de eventos
    eventForm.addEventListener('submit', (e) => {
        e.preventDefault(); // Prevenir el comportamiento por defecto del formulario
        const date = document.getElementById('eventDate').value;
        const title = document.getElementById('eventTitle').value;
        const description = document.getElementById('eventDescription').value;

        // Añadir el evento al objeto de eventos
        if (!events[date]) {
            events[date] = [];
        }
        events[date].push({ title, description });

        eventModal.classList.add('hidden'); // Ocultar el modal
        renderCalendar(currentDate.getFullYear(), currentDate.getMonth()); // Volver a renderizar el calendario
    });

    // Renderizar el calendario inicialmente
    renderCalendar(currentDate.getFullYear(), currentDate.getMonth());
});


// Configuración y renderizado de gráficos utilizando Chart.js
const ctxDoughnut = document.getElementById('doughnutChart').getContext('2d');
const doughnutChart = new Chart(ctxDoughnut, {
    type: 'doughnut', // Tipo de gráfico
    data: {
        labels: ['Aprendices en 1 visita', 'Aprendices en 2 visita', 'Aprendices en 3 visita', 'Aprendices aprobados', 'Aprendices en mora'],
        datasets: [{
            label: 'Aprendices',
            data: [25, 12.5, 18.75, 6.25, 37.5], // Datos de ejemplo
            backgroundColor: ['#10B981', '#3B82F6', '#9333EA', '#F59E0B', '#EF4444'] // Colores para cada segmento
        }]
    },
    options: {
        responsive: true // Hacer el gráfico responsivo
    }
});

const ctxBar = document.getElementById('barChart').getContext('2d');
const barChart = new Chart(ctxBar, {
    type: 'bar', // Tipo de gráfico
    data: {
        labels: ['Aprendices en 1 visita', 'Aprendices en 2 visita', 'Aprendices en 3 visita', 'Aprendices aprobados', 'Aprendices en mora'],
        datasets: [{
            label: '1 Bitácora',
            backgroundColor: '#10B981',
            data: [50, 100, 75, 200, 125] // Datos de ejemplo para 1 bitácora
        }, {
            label: '2 Bitácora',
            backgroundColor: '#3B82F6',
            data: [30, 80, 60, 180, 100] // Datos de ejemplo para 2 bitácora
        }, {
            label: '3 Bitácora',
            backgroundColor: '#9333EA',
            data: [20, 60, 40, 160, 80] // Datos de ejemplo para 3 bitácora
        }, {
            label: 'total Aprendices asignados',
            backgroundColor: '#F59E0B',
            data: [100, 150, 120, 300, 200] // Datos de ejemplo para total
        }]
    },
    options: {
        responsive: true, // Hacer el gráfico responsivo
        scales: {
            y: {
                beginAtZero: true // Comenzar el eje Y desde cero
            }
        }
    }
});
