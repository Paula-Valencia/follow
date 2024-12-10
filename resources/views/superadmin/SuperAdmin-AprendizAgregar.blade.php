<!DOCTYPE html>
<html lang="es">
@include('partials.head')

<body class="font-['Arial',sans-serif] bg-white m-0 flex flex-col min-h-screen">
    @include('partials.header')
    @yield('content')
    @include('partials.nav')

    <div class="flex justify-center mt-8">
        <main class="bg-white m-4 p-2 rounded-lg shadow-[0_0_10px_rgba(0,0,0,0.8)] border-[#2F3E4C] w-2/3 items-center">
            <div class="mb-6 steps-container">
                <ul class="flex justify-between text-sm font-medium text-gray-500">
                    <li class="step active" data-step="1">Paso 1: Datos Personales</li>
                    <li class="step" data-step="2">Paso 2: Datos Académicos</li>
                    <li class="step" data-step="3">Paso 3: Asignaciones</li>
                </ul>
            </div>

            <form action="{{ route('superadmin.crearAprendiz') }}" method="POST" id="stepsForm">
                @csrf

                <!-- Step 1 -->
                <div class="step-content active" data-step="1">
                    <h2 class="mb-4 text-lg font-semibold text-gray-700">Datos Personales</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="identification"
                                class="block text-sm font-medium text-gray-700">Identificación</label>
                            <input type="number" class="w-full border border-gray-300 rounded-lg p-2.5"
                                id="identification" name="identification" required>
                        </div>
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2.5" id="name"
                                name="name" required>
                        </div>
                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Apellido</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2.5" id="last_name"
                                name="last_name" required>
                        </div>
                        <div>
                            <label for="telephone" class="block text-sm font-medium text-gray-700">Teléfono</label>
                            <input type="number" class="w-full border border-gray-300 rounded-lg p-2.5" id="telephone"
                                name="telephone" required>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Correo
                                Electrónico</label>
                            <input type="email" class="w-full border border-gray-300 rounded-lg p-2.5" id="email"
                                name="email" required>
                        </div>
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700">Dirección</label>
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2.5" id="address"
                                name="address" required>
                        </div>
                        <div>
                            <label class="block text-gray-700">Departamento:</label>
                            <input type="text" name="department"
                                class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Departamento"
                                required>
                        </div>
                        <div>
                            <label class="block text-gray-700">Municipio:</label>
                            <input type="text" name="municipality"
                                class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Municipio" required>
                        </div>
                        {{-- <div>
                            <label class="block text-gray-700">Dirección:</label>
                            <input type="text" name="address" class="w-full border border-gray-300 rounded-lg p-2.5"
                                placeholder="Dirección" required>
                        </div> --}}
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="hidden step-content" data-step="2">
                    <h2 class="mb-4 text-lg font-semibold text-gray-700">Datos Académicos</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <!-- Select para Niveles Académicos -->
                        <div>
                            <label for="academic_level" class="block text-sm font-medium text-gray-700">Nivel
                                Académico</label>
                            <select id="academic_level" name="academic_level"
                                class="w-full border border-gray-300 rounded-lg p-2.5" required>
                                <option value="" disabled selected>Selecciona el nivel académico</option>
                                <option value="tecnologo">Tecnólogo</option>
                                <option value="tecnico">Técnico</option>
                                <option value="operario">Operario</option>
                            </select>
                        </div>

                        <div>
                            <label for="program" class="block text-sm font-medium text-gray-700">Programa</label>
                            <select id="program" name="program" class="w-full border border-gray-300 rounded-lg p-2.5"
                                required>
                                <option value="" disabled selected>Selecciona el programa</option>
                                <!-- Programas Técnicos -->
                                <optgroup label="Técnicos">
                                    <option value="GESTION ADMINISTRATIVA DEL SECTOR SALUD">GESTION ADMINISTRATIVA DEL
                                        SECTOR SALUD</option>
                                    <option value="GESTION DE MERCADOS">GESTION DE MERCADOS</option>
                                    <option value="ASISTENCIA ADMINISTRATIVA">ASISTENCIA ADMINISTRATIVA</option>
                                    <option value="GESTION DE PROCESOS ADMINISTRATIVOS DE SALUD">GESTION DE PROCESOS
                                        ADMINISTRATIVOS DE SALUD</option>
                                    <option value="GESTION EMPRESARIAL">GESTION EMPRESARIAL</option>
                                    <option value="GUIANZA TURISTICA">GUIANZA TURISTICA</option>
                                    <option value="GESTION CONTABLE Y FINANCIERA">GESTION CONTABLE Y FINANCIERA</option>
                                    <option value="ANALISIS Y DESARROLLO DE SISTEMAS DE INFORMACION">ANALISIS Y
                                        DESARROLLO DE SISTEMAS DE INFORMACION</option>
                                    <option value="GESTION LOGISTICA">GESTION LOGISTICA</option>
                                    <option value="NEGOCIACION INTERNACIONAL">NEGOCIACION INTERNACIONAL</option>
                                    <option value="GESTION DEL TALENTO HUMANO">GESTION DEL TALENTO HUMANO</option>
                                    <option value="GESTION DOCUMENTAL">GESTION DOCUMENTAL</option>
                                    <option value="CONTABILIZACION DE OPERACIONES COMERCIALES Y FINANCIERAS">
                                        CONTABILIZACION DE OPERACIONES COMERCIALES Y FINANCIERAS</option>
                                    <option value="GESTION BANCARIA Y DE ENTIDADES FINANCIERAS">GESTION BANCARIA Y DE
                                        ENTIDADES FINANCIERAS</option>
                                    <option value="PELUQUERIA">PELUQUERIA</option>
                                    <option value="PANIFICACION">PANIFICACION</option>
                                    <option value="COCINA">COCINA</option>
                                    <option value="SERVICIOS FARMACEUTICOS">SERVICIOS FARMACEUTICOS</option>
                                    <option value="SALUD PUBLICA">SALUD PUBLICA</option>
                                    <option value="APOYO ADMINISTRATIVO EN SALUD">APOYO ADMINISTRATIVO EN SALUD
                                    </option>
                                    <option value="OPERACION TURISTICA LOCAL">OPERACION TURISTICA LOCAL</option>
                                    <option value="ANIMACION 3D">ANIMACION 3D</option>
                                    <option value="ANIMACION DIGITAL">ANIMACION DIGITAL</option>
                                    <option value="PROMOCION DE PRODUCTOS">PROMOCION DE PRODUCTOS</option>
                                    <option value="SERVICIOS Y OPERACIONES MICROFINANCIERAS">SERVICIOS Y OPERACIONES
                                        MICROFINANCIERAS</option>
                                    <option value="CUIDADO ESTETICO DE MANOS Y PIES">CUIDADO ESTETICO DE MANOS Y PIES
                                    </option>
                                    <option value="CONTROL DE MOVILIDAD TRANSPORTE Y SEGURIDAD VIAL">CONTROL DE
                                        MOVILIDAD TRANSPORTE Y SEGURIDAD VIAL</option>
                                    <option value="ENFERMERIA">ENFERMERIA</option>
                                    <option value="SISTEMAS">SISTEMAS</option>
                                    <option value="DISTRIBUCION FISICA INTERNACIONAL">DISTRIBUCION FISICA INTERNACIONAL
                                    </option>
                                    <option value="ASESORIA COMERCIAL Y OPERACIONES DE ENTIDADES FINANCIERAS">ASESORIA
                                        COMERCIAL Y OPERACIONES DE ENTIDADES FINANCIERAS</option>
                                    <option value="ATENCION INTEGRAL A LA PRIMERA INFANCIA">ATENCION INTEGRAL A LA
                                        PRIMERA INFANCIA</option>
                                    <option value="ASISTENCIA EN ORGANIZACION DE ARCHIVOS">ASISTENCIA EN ORGANIZACION
                                        DE ARCHIVOS</option>
                                    <option value="DESARROLLO DE OPERACIONES LOGISTICA EN LA CADENA DE ABASTECIMIENTO">
                                        DESARROLLO DE OPERACIONES LOGISTICA EN LA CADENA DE ABASTECIMIENTO</option>
                                    <option value="SERVICIO DE RESTAURANTE Y BAR">SERVICIO DE RESTAURANTE Y BAR
                                    </option>
                                    <option value="OPERACIONES DE COMERCIO EXTERIOR">OPERACIONES DE COMERCIO EXTERIOR
                                    </option>
                                    <option value="DISEÑO E INTEGRACION DE MULTIMEDIA">DISEÑO E INTEGRACION DE
                                        MULTIMEDIA</option>
                                    <option value="INFORMACION Y SERVICIO AL CLIENTE">INFORMACION Y SERVICIO AL CLIENTE
                                    </option>
                                    <option value="SERVICIOS DE AGENCIAS DE VIAJES">SERVICIOS DE AGENCIAS DE VIAJES
                                    </option>
                                    <option value="ASESORIA COMERCIAL">ASESORIA COMERCIAL</option>
                                    <option value="PROCESOS DE PANADERIA">PROCESOS DE PANADERIA</option>
                                    <option value="GESTION COMUNITARIA DEL RIESGO DE DESASTRES">GESTION COMUNITARIA DEL
                                        RIESGO DE DESASTRES</option>
                                    <option value="PROGRAMACION DE APLICACIONES Y SERVICIOS PARA LA NUBE">PROGRAMACION
                                        DE APLICACIONES Y SERVICIOS PARA LA NUBE</option>
                                    <option value="PROGRAMACION DE SOFTWARE">PROGRAMACION DE SOFTWARE</option>
                                    <option value="SERVICIOS DE BARISMO">SERVICIOS DE BARISMO</option>
                                    <option value="GESTION CONTABLE Y DE INFORMACION FINANCIERA">GESTION CONTABLE Y DE
                                        INFORMACION FINANCIERA</option>
                                    <option value="INTEGRACION DE OPERACIONES LOGISTICAS">INTEGRACION DE OPERACIONES
                                        LOGISTICAS</option>
                                    <option value="INTEGRACION DE CONTENIDOS DIGITALES">INTEGRACION DE CONTENIDOS
                                        DIGITALES</option>
                                    <option value="AUXILIAR EN COCINA">AUXILIAR EN COCINA</option>
                                    <option value="PROGRAMACION PARA ANALITICA DE DATOS">PROGRAMACION PARA ANALITICA DE
                                        DATOS</option>
                                    <option value="AGENTE DE TRANSITO Y TRANSPORTE">AGENTE DE TRANSITO Y TRANSPORTE
                                    </option>
                                    <option value="ANALISIS Y DESARROLLO DE SOFTWARE">ANALISIS Y DESARROLLO DE SOFTWARE
                                    </option>
                                    <option value="ATENCION INTEGRAL AL CLIENTE">ATENCION INTEGRAL AL CLIENTE</option>
                                    <option value="CONTROL DE MOVILIDAD, TRANSPORTE Y SEGURIDAD VIAL">CONTROL DE
                                        MOVILIDAD, TRANSPORTE Y SEGURIDAD VIAL</option>
                                    <option value="DESARROLLO DE PROCESOS DE MERCADEO">DESARROLLO DE PROCESOS DE
                                        MERCADEO</option>
                                    <option value="DESARROLLO PUBLICITARIO">DESARROLLO PUBLICITARIO</option>
                                    <option value="GESTION INTEGRAL DEL TRANSPORTE">GESTION INTEGRAL DEL TRANSPORTE
                                    </option>
                                    <option value="ORGANIZACION DE ARCHIVO">ORGANIZACION DE ARCHIVO</option>
                                    <option value="PRESELECCION DE TALENTO HUMANO MEDIADO POR HERRAMIENTAS TIC">
                                        PRESELECCION DE TALENTO HUMANO MEDIADO POR HERRAMIENTAS TIC</option>
                                    <option value="SERVICIOS EN CONTACT CENTER Y BPO">SERVICIOS EN CONTACT CENTER Y BPO
                                    </option>
                                    <option value="COORDINACION DE PROCESOS LOGISTICOS">COORDINACION DE PROCESOS
                                        LOGISTICOS</option>
                                </optgroup>
                            </select>
                        </div>
                        <div>
                            <label for="modalidad" class="block text-sm font-medium text-gray-700">Modalidad de etapa
                                práctica</label>
                            <select id="modalidad" name="modalidad"
                                class="w-full border border-gray-300 rounded-lg p-2.5" required>
                                <option value="" disabled selected>Selecciona una modalidad</option>
                                <option value="pasantia">Pasantía</option>
                                <option value="contrato">Contrato de aprendizaje</option>
                                <option value="vinculacion_laboral">Vinculación laboral</option>
                                <option value="proyecto_productivo">Proyecto productivo</option>
                                <option value="emprendimiento">Emprendimiento</option>
                            </select>
                        </div>
                        <!-- Ficha -->
                        <div>
                            <label for="ficha" class="block text-sm font-medium text-gray-700">Ficha</label>
                            <input type="number" class="w-full border border-gray-300 rounded-lg p-2.5"
                                id="ficha" name="ficha" required>
                        </div>
                    </div>
                </div>


                <!-- Step 3 -->
                <div class="hidden step-content" data-step="3">
                    <h2 class="mb-4 text-lg font-semibold text-gray-700">Asignaciones</h2>
                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <label for="id_company" class="block text-sm font-medium text-gray-700">Empresa</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2.5" id="id_company"
                                name="id_company" required>
                                <!-- Opción por defecto solo una vez -->
                                <option value="">Seleccione una empresa</option> <!-- Opción por defecto -->

                                @foreach ($CompanyDataArray as $company)
                                    <option value="{{ $company['id'] }}">{{ $company['name'] }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div>
                            <label for="id_trainer" class="block text-sm font-medium text-gray-700">Entrenador</label>
                            <select class="w-full border border-gray-300 rounded-lg p-2.5" id="id_trainer"
                                name="id_trainer" required>
                                <option value="">Seleccione un instructor</option>
                                @foreach ($instructorDataArray as $instructor)
                                    @foreach ($instructor['trainer'] as $trainer)
                                        <option value="{{ $trainer['id'] }}">{{ $instructor['name'] }}
                                            {{ $instructor['last_name'] }}</option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="flex justify-between mt-6">
                    <button type="button"
                        class="hidden px-4 py-2 text-gray-700 bg-gray-300 rounded-md btn-prev">Anterior</button>
                    <button type="button"
                        class="px-4 py-2 text-white bg-blue-500 rounded-md btn-next">Siguiente</button>
                    <button type="submit"
                        class="hidden px-4 py-2 text-white bg-green-500 rounded-md btn-submit">Guardar</button>
                </div>
            </form>
        </main>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const steps = document.querySelectorAll('.step');
            const stepContents = document.querySelectorAll('.step-content');
            const btnPrev = document.querySelector('.btn-prev');
            const btnNext = document.querySelector('.btn-next');
            const btnSubmit = document.querySelector('.btn-submit');

            let currentStep = 1;
            const validateStep = () => {
                const currentContent = document.querySelector(`.step-content[data-step="${currentStep}"]`);
                const inputs = currentContent.querySelectorAll('input, select');
                let isValid = true;

                inputs.forEach(input => {
                    const errorSpan = input.nextElementSibling;
                    if (!input.value.trim()) {
                        isValid = false;
                        input.classList.add('border-red-500');


                        if (!errorSpan || !errorSpan.classList.contains('error-message')) {
                            const errorMessage = document.createElement('span');
                            errorMessage.classList.add('error-message', 'text-red-500', 'text-sm');
                            errorMessage.textContent = 'Este campo es obligatorio.';
                            input.parentNode.appendChild(errorMessage);
                        }
                    } else {
                        input.classList.remove('border-red-500');

                        if (errorSpan && errorSpan.classList.contains('error-message')) {
                            errorSpan.remove();
                        }
                    }
                });

                return isValid;
            };

            const updateStep = () => {
                steps.forEach((step, index) => {
                    step.classList.toggle('active', index + 1 === currentStep);
                });
                stepContents.forEach((content) => {
                    content.classList.toggle('hidden', parseInt(content.dataset.step) !== currentStep);
                });
                btnPrev.classList.toggle('hidden', currentStep === 1);
                btnNext.classList.toggle('hidden', currentStep === steps.length);
                btnSubmit.classList.toggle('hidden', currentStep !== steps.length);
            };

            btnNext.addEventListener('click', () => {
                if (validateStep()) {
                    if (currentStep < steps.length) currentStep++;
                    updateStep();
                }
            });

            btnPrev.addEventListener('click', () => {
                if (currentStep > 1) currentStep--;
                updateStep();
            });

            updateStep();
        });
    </script>


</body>

</html>
