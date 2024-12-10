<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <title>Etapa Productiva</title>
    <title>Gráficos Dinámicos con Filtros Avanzados</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .container {
            text-align: center;
        }

        .filters {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .filter-item-box {
            padding: 15px;
            border: 2px solid rgba(0, 158, 0, 0.3);
            /* Borde difuso */
            border-radius: 8px;
            /* Bordes redondeados */
            box-shadow: 0 4px 8px rgba(0, 158, 0, 0.2);
            /* Sombra difusa */
            background-color: #f9f9f9;
            /* Fondo suave */
            width: 200px;
            /* Ajusta el tamaño según lo necesites */
        }

        .filter-item-box label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .filter-item-box select,
        .filter-item-box input {
            width: 100%;
            padding: 8px;
            font-size: 14px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .filter-item {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .charts-container {
            display: flex;
            justify-content: space-evenly;
            margin-top: 20px;
        }

        .chart-wrapper {
            width: 45%;
        }

        .chart-title {
            margin-bottom: 10px;
            font-weight: bold;
        }

        canvas {
            max-width: 100%;
        }

        .contract-info {
            margin: 10px 0;
            display: flex;
            justify-content: center;
            gap: 20px;
            font-size: 16px;
        }

        .contract-info .contract-item {
            font-weight: bold;
            font-size: 18px;
        }

        .contract-info .contract-count {
            font-family: 'Georgia', serif;
            font-size: 18px;
        }

        .separator {
            margin: 20px 0;
            border-top: 2px solid #ccc;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }

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
    </style>
</head>

<body class="font-['Arial',sans-serif] bg-white m-0 flex flex-col min-h-screen">
    @include('partials.header')
    @yield('content')
    @include('partials.nav')

    <div class="container">
        <h1 style="font-weight: bold; margin-top: 20px;">GRAFICOS FILTROS AVANZADOS</h1>

        <!-- Contenedor de filtros -->
        <div class="filters">
            <div class="filter-item-box">
                <label for="filterContract">Tipo de Contrato:</label>
                <select id="filterContract" onchange="applyFilters()">
                    <option value="todos">Todos</option>
                    <option value="pasantia">Pasantía</option>
                    <option value="contrato">Contrato de Aprendizaje</option>
                    <option value="vinculacion_laboral">Vínculo Laboral</option>
                </select>
            </div>

            <div class="filter-item-box">
                <label for="startDate">Fecha Inicio:</label>
                <input type="date" id="startDate" onchange="applyFilters()">
            </div>

            <div class="filter-item-box">
                <label for="endDate">Fecha Fin:</label>
                <input type="date" id="endDate" onchange="applyFilters()">
            </div>

            <div class="filter-item-box">
                <label for="sortOrder">Ordenar por:</label>
                <select id="sortOrder" onchange="applyFilters()">
                    <option value="asc">Cantidad Ascendente</option>
                    <option value="desc">Cantidad Descendente</option>
                </select>
            </div>
        </div>

        <!-- Información de los tipos de contrato con sus valores -->
        <div id="contractInfo" class="contract-info"></div>

        <!-- Separador entre la información de contratos y las gráficas -->
        <div class="separator"></div>

        <!-- Gráficos -->
        <div class="charts-container">
            <div class="chart-wrapper">
                <div class="chart-title">Gráfico de Pastel (Distribución por Contrato)</div>
                <canvas id="pieChart"></canvas>
            </div>
            <div class="chart-wrapper">
                <div class="chart-title">Gráfico de Barras (Cantidad de Aprendices)</div>
                <canvas id="barChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        const URL_API = "{{ env('URL_API') }}";
        let apiData = [];

        // Obtener los datos de la API
        async function fetchData() {
            try {
                const response = await fetch(`${URL_API}apprentices_by_modalidad`)
                const data = await response.json();
                apiData = data;
                applyFilters();
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        }

        // Filtrar y actualizar la visualización
        // Filtrar y actualizar la visualización
        let filteredData = [...apiData];

        function applyFilters() {
            const filterContract = document.getElementById('filterContract').value;
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;
            const sortOrder = document.getElementById('sortOrder').value;

            filteredData = apiData.filter(item => {
                const matchContract = filterContract === 'todos' || item.modalidad.toLowerCase().includes(
                    filterContract.toLowerCase());

                return matchContract;
            });

            if (sortOrder === 'asc') {
                filteredData.sort((a, b) => a.count - b.count);
            } else if (sortOrder === 'desc') {
                filteredData.sort((a, b) => b.count - a.count);
            }

            // Verificar si hay datos filtrados
            if (filteredData.length === 0) {
                // Usar SweetAlert en lugar del alert
                Swal.fire({
                    title: '¡Oops!',
                    text: 'No se encontraron datos con los filtros seleccionados.',
                    icon: 'warning',
                    confirmButtonText: 'Aceptar',
                    background: '#f8f9fa',
                    color: '#333',
                    confirmButtonColor: '#007bff'
                });
            }

            updateCharts();
            updateContractInfo();
        }


        // Inicializar gráficos
        const pieCtx = document.getElementById('pieChart').getContext('2d');
        const barCtx = document.getElementById('barChart').getContext('2d');

        const pieChart = new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: [],
                datasets: [{
                    data: [],
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50', '#FFC107']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    }
                }
            }
        });

        const barChart = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: [],
                datasets: [{
                    label: 'Cantidad de Aprendices',
                    data: [],
                    backgroundColor: '#36A2EB'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    }
                }
            }
        });

        // Función para actualizar los gráficos
        function updateCharts() {
            const aggregatedData = filteredData.reduce((acc, item) => {
                acc[item.modalidad] = (acc[item.modalidad] || 0) + item.count;
                return acc;
            }, {});

            const labels = Object.keys(aggregatedData);
            const values = Object.values(aggregatedData);

            // Actualizar gráfico de pastel
            pieChart.data.labels = labels;
            pieChart.data.datasets[0].data = values;
            pieChart.update();

            // Actualizar gráfico de barras
            barChart.data.labels = labels;
            barChart.data.datasets[0].data = values;
            barChart.update();
        }

        // Función para mostrar la información de los tipos de contrato y sus valores
        function updateContractInfo() {
            const aggregatedData = filteredData.reduce((acc, item) => {
                acc[item.modalidad] = (acc[item.modalidad] || 0) + item.count;
                return acc;
            }, {});

            let contractInfoHtml = '';
            for (let modalidad in aggregatedData) {
                contractInfoHtml +=
                    `<div class="contract-item">${modalidad}: </div><div class="contract-count">${aggregatedData[modalidad]} aprendices</div>`;
            }

            document.getElementById('contractInfo').innerHTML = contractInfoHtml;
        }

        // Cargar datos iniciales
        fetchData();
    </script>
</body>
