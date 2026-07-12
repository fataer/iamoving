@extends('layouts.iamovingpro')

@section('title', 'Política de Cookies | IAMOVING')
@section('description', 'Política de cookies de IAMOVING. Infórmate sobre qué cookies utilizamos, cómo gestionarlas y tus derechos según el RGPD.')
@section('image', 'https://iamoving.com/img/iamoving.png')

@section('styles')
<style>
    /* Reset y estilos base */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    .cookie-page {
        font-family: 'Nunito', sans-serif;
        background: #f8f9fa;
        color: #1a1a2e;
        line-height: 1.6;
    }
    
    .cookie-container {
        max-width: 1100px;
        margin: 0 auto;
        padding: 40px 20px;
    }
    
    .cookie-policy {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        padding: 40px;
    }
    
    h1 {
        font-size: 2rem;
        margin-bottom: 20px;
        color: #b02c98;
        border-left: 4px solid #b02c98;
        padding-left: 20px;
    }
    
    h2 {
        font-size: 1.5rem;
        margin: 30px 0 15px 0;
        color: #333;
        padding-bottom: 8px;
        border-bottom: 2px solid #f0f0f0;
    }
    
    h3 {
        font-size: 1.2rem;
        margin: 20px 0 10px 0;
        color: #b02c98;
    }
    
    p {
        margin-bottom: 15px;
        color: #4a5568;
    }
    
    ul, ol {
        margin: 15px 0 15px 25px;
        color: #4a5568;
    }
    
    li {
        margin-bottom: 8px;
    }
    
    /* Tabla responsive - Corrección importante */
    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        margin: 20px 0;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
    }
    
    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.9rem;
        min-width: 600px;
    }
    
    table th, table td {
        border: 1px solid #e2e8f0;
        padding: 12px;
        text-align: left;
        vertical-align: top;
    }
    
    table th {
        background: #f7f7f7;
        font-weight: 700;
        color: #b02c98;
    }
    
    .badge {
        display: inline-block;
        background: #b02c98;
        color: white;
        font-size: 0.7rem;
        padding: 2px 8px;
        border-radius: 20px;
        margin-left: 8px;
        vertical-align: middle;
    }
    
    .badge-green {
        background: #2c7a4d;
    }
    
    .badge-blue {
        background: #3182ce;
    }
    
    .note {
        background: #fff3e0;
        border-left: 4px solid #ffb347;
        padding: 15px 20px;
        margin: 20px 0;
        border-radius: 8px;
    }
    
    .button-back {
        display: inline-block;
        margin-top: 30px;
        padding: 12px 24px;
        background: #b02c98;
        color: white;
        text-decoration: none;
        border-radius: 40px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .button-back:hover {
        background: #8a2274;
        transform: translateY(-2px);
        color: white;
        text-decoration: none;
    }
    
    .cookie-footer {
        text-align: center;
        margin-top: 40px;
        padding-top: 20px;
        border-top: 1px solid #e2e8f0;
        font-size: 0.85rem;
        color: #718096;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .cookie-container {
            padding: 20px 15px;
        }
        
        .cookie-policy {
            padding: 25px 20px;
        }
        
        h1 {
            font-size: 1.6rem;
            padding-left: 15px;
        }
        
        h2 {
            font-size: 1.3rem;
        }
        
        h3 {
            font-size: 1.1rem;
        }
        
        .table-responsive {
            margin: 15px 0;
        }
        
        table th, table td {
            padding: 8px 10px;
            font-size: 0.75rem;
        }
        
        .badge {
            font-size: 0.6rem;
            padding: 1px 6px;
        }
        
        .note {
            padding: 12px 15px;
            font-size: 0.85rem;
        }
        
        .button-back {
            display: block;
            text-align: center;
            width: 100%;
        }
    }
    
    /* Para pantallas muy pequeñas */
    @media (max-width: 480px) {
        .cookie-policy {
            padding: 20px 15px;
        }
        
        table th, table td {
            padding: 6px 8px;
            font-size: 0.7rem;
        }
        
        ul, ol {
            margin-left: 20px;
        }
        
        li {
            font-size: 0.85rem;
        }
    }
    
    /* Para tablets en horizontal */
    @media (min-width: 768px) and (max-width: 1024px) {
        .cookie-container {
            padding: 30px;
        }
        
        table th, table td {
            padding: 10px;
            font-size: 0.85rem;
        }
    }
    
    .color-letra {
        color: #2d2e35;
    }
</style>
@endsection

@section('content')
<div class="cookie-page">
    <div class="cookie-container">
        <div class="cookie-policy">
            <h1>🍪 Política de Cookies</h1>
            <p><strong>Última actualización: 24 de marzo de 2026</strong></p>
            
            <p>En <strong>IAMOVING ONLINE, S.L.</strong> (en adelante, "IAMOVING") utilizamos cookies y tecnologías similares para mejorar tu experiencia de navegación, analizar el tráfico y ofrecerte contenido personalizado. La presente Política de Cookies explica qué son, cómo las utilizamos y cómo puedes gestionarlas.</p>
            
            <!-- ==================== QUÉ SON LAS COOKIES ==================== -->
            <h2>1. ¿Qué son las cookies?</h2>
            <p>Las cookies son pequeños archivos de texto que se almacenan en tu dispositivo (ordenador, tablet, smartphone) cuando visitas una página web. Estas permiten que el sitio web recuerde información sobre tu visita, como tus preferencias de idioma, o que pueda analizar tu comportamiento de navegación para mejorar los servicios ofrecidos.</p>
            <p>Las cookies son esenciales para el funcionamiento de muchos servicios en Internet y no dañan tu equipo. En IAMOVING utilizamos cookies para ofrecerte una experiencia más fluida y personalizada.</p>
            
            <!-- ==================== TIPOS DE COOKIES QUE UTILIZAMOS ==================== -->
            <h2>2. Tipos de cookies que utilizamos</h2>
            <p>En IAMOVING clasificamos las cookies según su finalidad y la entidad que las gestiona:</p>
            
            <h3>2.1 Según la entidad que las gestiona</h3>
            <ul>
                <li><strong>Cookies propias:</strong> Son aquellas enviadas a tu dispositivo desde nuestros propios servidores. Solo IAMOVING tiene acceso a la información recopilada.</li>
                <li><strong>Cookies de terceros:</strong> Son aquellas gestionadas por entidades externas que prestan servicios para IAMOVING (como Google Analytics, Meta, etc.). Estas cookies nos permiten analizar el tráfico y medir la efectividad de nuestras campañas publicitarias.</li>
            </ul>
            
            <h3>2.2 Según su finalidad</h3>
            
            <div class="table-responsive">
                 <table>
                    <thead>
                        <tr><th>Tipo de cookie</th><th>Descripción</th><th>Ejemplos</th>\\
                    </thead>
                    <tbody>
                         <tr>
                            <td><strong>Cookies necesarias</strong> <span class="badge badge-green">Siempre activas</span></td>
                            <td>Son imprescindibles para el correcto funcionamiento de la web. Permiten la navegación, el acceso a áreas seguras, la gestión de sesiones de usuario, etc. No requieren consentimiento del usuario.</td>
                            <td>Sesión de usuario, carrito de favoritos, seguridad CSRF</td>
                         </tr>
                         <tr>
                            <td><strong>Cookies analíticas</strong> <span class="badge">Requieren consentimiento</span></td>
                            <td>Nos permiten cuantificar el número de visitantes y analizar estadísticamente el uso que hacen los usuarios de nuestros servicios. Nos ayudan a mejorar la web identificando qué páginas son más útiles.</td>
                            <td>Google Analytics (_ga, _gid), comportamiento de navegación</td>
                         </tr>
                         <tr>
                            <td><strong>Cookies publicitarias</strong> <span class="badge">Requieren consentimiento</span></td>
                            <td>Gestionan los espacios publicitarios que se muestran en nuestra web. Pueden mostrar publicidad basada en tus intereses y hábitos de navegación.</td>
                            <td>Meta Pixel (Facebook), cookies de retargeting</td>
                         </tr>
                    </tbody>
                </table>
            </div>
            
            <h3>2.3 Según el plazo de permanencia</h3>
            <ul>
                <li><strong>Cookies de sesión:</strong> Permanecen activas mientras navegas por nuestra web y se eliminan automáticamente al cerrar el navegador.</li>
                <li><strong>Cookies persistentes:</strong> Se almacenan en tu dispositivo durante un período determinado (días, meses o años) y nos permiten reconocerte en futuras visitas para ofrecerte una experiencia personalizada.</li>
            </ul>
            
            <!-- ==================== LISTADO DETALLADO DE COOKIES ==================== -->
            <h2>3. Listado detallado de cookies utilizadas</h2>
            <p>A continuación, detallamos las cookies que utilizamos en IAMOVING, su finalidad y los plazos de conservación:</p>
            
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Proveedor</th>
                            <th>Finalidad</th>
                            <th>Plazo</th>
                            <th>Tipo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>iamoving_session</td>
                            <td>IAMOVING</td>
                            <td>Mantiene la sesión del usuario autenticado</td>
                            <td>Sesión</td>
                            <td>Necesaria</td>
                        </tr>
                        <tr>
                            <td>XSRF-TOKEN</td>
                            <td>IAMOVING</td>
                            <td>Protección contra ataques CSRF</td>
                            <td>Sesión</td>
                            <td>Necesaria</td>
                        </tr>
                        <tr>
                            <td>iamoving_cookie_consent</td>
                            <td>IAMOVING</td>
                            <td>Guarda las preferencias de consentimiento de cookies del usuario</td>
                            <td>365 días</td>
                            <td>Necesaria</td>
                        </tr>
                        <tr>
                            <td>_ga</td>
                            <td>Google Analytics</td>
                            <td>Identifica a los usuarios únicos y analiza el tráfico</td>
                            <td>2 años</td>
                            <td>Analítica</td>
                        </tr>
                        <tr>
                            <td>_gid</td>
                            <td>Google Analytics</td>
                            <td>Distingue a los usuarios para el análisis estadístico</td>
                            <td>24 horas</td>
                            <td>Analítica</td>
                        </tr>
                        <tr>
                            <td>_fbp</td>
                            <td>Meta (Facebook)</td>
                            <td>Almacena información para publicidad personalizada</td>
                            <td>90 días</td>
                            <td>Publicitaria</td>
                        </tr>
                        <tr>
                            <td>fr</td>
                            <td>Meta (Facebook)</td>
                            <td>Publicidad, medición y retargeting</td>
                            <td>90 días</td>
                            <td>Publicitaria</td>
                        </tr>
                        <tr>
                            <td>NID, CONSENT, 1P_JAR</td>
                            <td>Google (Maps)</td>
                            <td>Permite mostrar el mapa de ubicación del inmueble y recordar preferencias de visualización</td>
                            <td>6 meses - 2 años</td>
                            <td>Analítica</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <!-- ==================== CÓMO GESTIONAR LAS COOKIES ==================== -->
            <h2>4. ¿Cómo puedes gestionar las cookies?</h2>
            <p>En IAMOVING te ofrecemos diferentes opciones para gestionar tus preferencias sobre cookies:</p>
            
            <h3>4.1 A través de nuestro banner de cookies</h3>
            <p>Al acceder a nuestra web por primera vez, se muestra un banner donde puedes:</p>
            <ul>
                <li><strong>Aceptar todas las cookies</strong>: Activa tanto cookies analíticas como publicitarias.</li>
                <li><strong>Rechazar no esenciales</strong>: Solo se activan las cookies necesarias.</li>
            </ul>
            <p>Puedes modificar tus preferencias en cualquier momento. Para ello, pulsa el enlace <strong>"Configurar cookies"</strong> que encontrarás en el pie de página de nuestra web.</p>
            
            <h3>4.2 A través de la configuración de tu navegador</h3>
            <p>También puedes gestionar las cookies mediante la configuración de tu navegador. La mayoría de navegadores te permiten:</p>
            <ul>
                <li>Bloquear todas las cookies (incluidas las necesarias, lo que puede afectar al funcionamiento de la web).</li>
                <li>Eliminar las cookies ya almacenadas.</li>
                <li>Configurar notificaciones antes de instalar cookies.</li>
            </ul>
            <p>Consulta cómo hacerlo en tu navegador:</p>
            <ul>
                <li><a href="https://support.google.com/chrome/answer/95647" target="_blank" rel="noopener noreferrer">Google Chrome</a></li>
                <li><a href="https://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies-sitios-web-rastrear-preferencias" target="_blank" rel="noopener noreferrer">Mozilla Firefox</a></li>
                <li><a href="https://support.apple.com/es-es/guide/safari/sfri11471/mac" target="_blank" rel="noopener noreferrer">Safari</a></li>
                <li><a href="https://support.microsoft.com/es-es/help/17442/windows-internet-explorer-delete-manage-cookies" target="_blank" rel="noopener noreferrer">Internet Explorer / Microsoft Edge</a></li>
            </ul>
            
            <div class="note">
                <strong>⚠️ Nota importante:</strong> Si decides deshabilitar las cookies necesarias, es posible que algunas funcionalidades de la web no estén disponibles correctamente (por ejemplo, el acceso a tu cuenta de usuario).
            </div>
            
            <!-- ==================== PLAZOS DE CONSERVACIÓN ==================== -->
            <h2>5. Plazos de conservación</h2>
            <p>Los plazos de conservación de las cookies varían según su tipo y finalidad:</p>
            <ul>
                <li><strong>Cookies de sesión:</strong> Se eliminan automáticamente al cerrar el navegador.</li>
                <li><strong>Cookies persistentes:</strong> Permanecen en tu dispositivo durante el tiempo indicado en la tabla anterior (desde 24 horas hasta 2 años).</li>
                <li>La cookie que almacena tus preferencias de consentimiento (<code>iamoving_cookie_consent</code>) se conserva durante 365 días. Pasado este período, volveremos a solicitar tu consentimiento.</li>
            </ul>
            <p>En cualquier caso, puedes eliminar las cookies en cualquier momento a través de la configuración de tu navegador.</p>
            
            <!-- ==================== DERECHOS DEL USUARIO ==================== -->
            <h2>6. Tus derechos</h2>
            <p>Como usuario, tienes reconocidos los siguientes derechos en materia de protección de datos:</p>
            <ul>
                <li><strong>Derecho de acceso:</strong> Conocer qué datos personales estamos tratando.</li>
                <li><strong>Derecho de rectificación:</strong> Solicitar la corrección de datos inexactos.</li>
                <li><strong>Derecho de supresión:</strong> Solicitar la eliminación de tus datos cuando ya no sean necesarios.</li>
                <li><strong>Derecho de oposición:</strong> Oponerte al tratamiento de tus datos para fines específicos.</li>
                <li><strong>Derecho de limitación:</strong> Solicitar la suspensión del tratamiento en determinadas circunstancias.</li>
                <li><strong>Derecho a la portabilidad:</strong> Recibir tus datos en un formato estructurado.</li>
                <li><strong>Derecho a retirar el consentimiento:</strong> En cualquier momento, sin afectar a la licitud del tratamiento previo.</li>
            </ul>
            <p>Para ejercer estos derechos, puedes contactarnos a través de:</p>
            <ul>
                <li><strong>Email:</strong> <a href="mailto:info@iamoving.com">info@iamoving.com</a></li>
                <li><strong>Dirección postal:</strong> IAMOVING ONLINE, S.L., su domicilio social está en: Calle Serrano 93, 3º E. 28006 - Madrid - España (AVISO IMPORTANTE: IAMOVING ONLINE es una plataforma online. Todas las gestiones se realizan de manera online. No atendemos físicamente, solo bajo cita previa)</li>
            </ul>
            <p>También tienes derecho a presentar una reclamación ante la <strong>Agencia Española de Protección de Datos (AEPD)</strong> si consideras que no hemos atendido correctamente tus derechos.</p>
            
            <!-- ==================== TRANSFERENCIAS INTERNACIONALES ==================== -->
            <h2>7. Transferencias internacionales de datos</h2>
            <p>Algunos de los servicios de terceros que utilizamos (como Google Analytics y Meta) pueden implicar transferencias internacionales de datos a países fuera del Espacio Económico Europeo. Estas transferencias se realizan bajo el amparo del <strong>Marco de Privacidad de Datos UE-EE.UU.</strong> o mediante cláusulas contractuales tipo aprobadas por la Comisión Europea, garantizando un nivel de protección adecuado.</p>
            
            <!-- ==================== ACTUALIZACIONES ==================== -->
            <h2>8. Actualizaciones de la Política de Cookies</h2>
            <p>Podemos actualizar esta Política de Cookies en cualquier momento para reflejar cambios en nuestras prácticas o en la normativa aplicable. Te recomendamos revisar esta página periódicamente. En caso de cambios significativos, te lo notificaremos a través de nuestra web o por correo electrónico si estás registrado.</p>
            
            <p><strong>Fecha de la última revisión:</strong> 24 de marzo de 2026</p>
            
            <a href="/" class="button-back">← Volver a IAMOVING</a>
        </div>
        
        <div class="cookie-footer">
            <p>© <span id="currentYear">2025</span> IAMOVING ONLINE, S.L. - Todos los derechos reservados</p>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Actualizar automáticamente el año en el copyright
    document.addEventListener('DOMContentLoaded', function() {
        const yearElement = document.getElementById('currentYear');
        if (yearElement) {
            yearElement.textContent = new Date().getFullYear();
        }
    });
</script>
@endsection