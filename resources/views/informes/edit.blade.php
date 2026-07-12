@extends('voyager::master')
{{-- @extends('voyager::master')  de esta forma estiedo la plantilla --}}

@section('page_title', 'Informe Edit')
{{-- cambio los textos --}}

@section('page_header')
<h1 class="page-title">
        <i class="voyager-credit-card"></i> Editar informe detallado
    </h1>
@include('voyager::multilingual.language-selector')
{{-- hago el include para poder hacer la traducion de esta sesssion --}}
@stop

@section('content')
<div class="container">
    <div class="panel" id="app"  style="padding: 1.5rem;">
        <nav role="searchbox">
            <label>Referencia</label>
            <v-select label="id" :filterable="false" v-model="reference" :options="options" @search="onSearch"> 
                <template slot="no-options">Buscando referencia..</template>
                <template slot="option" slot-scope="option">
                    <div class="d-center">@{{option.id}}</div>
                </template>
                <template slot="selected-option" scope="option">
                    <div class="selected d-center">@{{option.id}}</div>
                </template>
            </v-select>
        </nav>
        <section class="panel-content" v-if="reference">
            <h1 class="text-center" v-text="reference.is_sale == 1 ? 'Venta' : 'Alquiler'"></h1>
			<h1 class="text-center" v-if="reference.tipo_inmueble == 'Pisos y casas'">Pisos y casas</h1>
			<h1 class="text-center" v-if="reference.tipo_inmueble == 'Habitaciones'">Habitaciones</h1>
			<h1 class="text-center" v-if="reference.tipo_inmueble == 'Local/Oficina'">Local/Oficina</h1>
            @include('informes.includes.form-edit')
        </section>
    </div>
</div>
@stop

@section('css')
    <style>
    
        legend {
            border-bottom: none;
            padding-top: 1rem;
        }
        .form-fieldset fieldset:not(:first-child) legend {
            border-top: 1px solid #e5e5e5;
        }
        
        /* Estilos para el feedback de subida */
        .spinning {
            animation: spin 1s infinite linear;
            display: inline-block;
            margin-right: 8px;
        }
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        /* Bloqueador móvil - BAJO z-index */
        .mobile-blocker {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9998; /* MENOR que el progreso */
            background: rgba(0, 0, 0, 0.02); /* Muy transparente */
            pointer-events: all; /* Bloquea toques */
            backdrop-filter: none; /* Eliminamos el blur que causaba borrosidad */
        }
        
        /* Mensaje de progreso - ALTO z-index */
        #upload-progress {
            position: relative;
            z-index: 9999; /* MAYOR que el bloqueador */
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            margin: 20px 0;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        
        .upload-stats {
            background-color: #f8f9fa;
            border-left: 4px solid #17a2b8;
            margin: 15px 0;
            padding: 15px;
            border-radius: 4px;
        }
        
        .progress {
            height: 20px;
            margin-bottom: 15px;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.2);
            overflow: hidden;
        }
        
        .progress-bar {
            background-color: #4CAF50;
            border-radius: 10px;
            transition: width 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9em;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }
        
        .upload-info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 10px;
            margin-top: 15px;
        }
        
        .upload-info-item {
            background: rgba(255, 255, 255, 0.1);
            padding: 10px;
            border-radius: 6px;
            text-align: center;
            backdrop-filter: blur(5px);
        }
        
        .upload-info-item .label {
            font-size: 0.8em;
            opacity: 0.9;
            display: block;
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .upload-info-item .value {
            font-weight: bold;
            font-size: 1.1em;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }
        
        .speed-meter {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 10px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            font-size: 0.9em;
        }
        
        .speed-icon {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { opacity: 0.7; }
            50% { opacity: 1; }
            100% { opacity: 0.7; }
        }
        
        .mobile-blocker {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: rgba(0, 0, 0, 0.05);
            backdrop-filter: blur(2px);
            pointer-events: all;
        }
        
        .upload-status {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
            font-size: 1.1em;
        }
        
        .btn-primary:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }
        
        .btn-success {
            background-color: #28a745 !important;
            border-color: #28a745 !important;
        }
        
        .btn-warning {
            background-color: #ffc107 !important;
            border-color: #ffc107 !important;
            color: #212529 !important;
        }
        /* Asegurar que el contenido del formulario tenga z-index normal */
        #app {
            position: relative;
            z-index: 1;
        }
        
        /* Cuando hay subida, el contenido se desenfoca un poco */
        .mobile-blocker.active ~ #app {
            filter: blur(1px);
            transition: filter 0.3s ease;
        }        
        /* Estilos para el modal de éxito */
        .swal-button--confirm {
            background-color: #28a745;
        }
        
        .swal-button--copy {
            background-color: #17a2b8;
            color: white;
            margin-right: 10px;
        }
        
        .swal-button--copy:hover {
            background-color: #138496;
        }
        
        .swal-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        /* Estilos para la notificación de copiado */
        .copy-notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #28a745;
            color: white;
            padding: 15px 20px;
            border-radius: 5px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            z-index: 10000;
            animation: slideIn 0.3s ease;
            display: flex;
            align-items: center;
        }
        
        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        @keyframes fadeOut {
            from {
                opacity: 1;
            }
            to {
                opacity: 0;
            }
        }
        
        /* Estilo para el botón de copiar en el modal */
        .copy-ref-btn {
            transition: all 0.3s ease;
        }
        
        .copy-ref-btn.copied {
            background-color: #28a745 !important;
            color: white !important;
        }
    </style>
@stop

@section('javascript')
    <script src="/js/application.js"></script>
    <script src="/js/map.js"></script>
    <script src="https://unpkg.com/vue-select@latest"></script>
    <script src="https://unpkg.com/vue-upload-component"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="/js/form-edit.js"></script>
@stop
