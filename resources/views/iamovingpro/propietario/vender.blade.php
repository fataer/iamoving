@extends('layouts.iamovingpro')
@section('title', 'IAMOVING - Busca tu casa')
@section('description', '¡Busca tu casa!')
@section('image', 'https://iamoving.com/img/iamoving.png')

@section('content')
    <div class="row mt-3">
        <div class="col-md-2"></div>
        <div class="col-md-8 text-center mb-3">
            <img src="/img/owner.png" width="70" height="70" style="margin-bottom:10px;" alt="vendedor">
        </div>
        <div class="col-md-2"></div>
    </div>

    <h2 class="card-text text-center mb-5">¿ERES PROPIETARIO?</h2>

    <div class="row mt-3">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="pricing-box">
                <div class="text-center mx-4 my-0" style="padding-top: 0px;padding-bottom: 0px;">
                    <h5 class="text-center mb-4">
                        <b>Descubre los 10 pasos clave para vender tu casa por tu cuenta, de forma rápida, segura y totalmente gratuita.</b>
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>

    <section class="collapse-content">
        <div class="container my-0 mt-3">
            <div class="collapse-item">
                <button class="btn-collapse text-left" style="cursor:pointer;width:100%;border: none;outline:none;" data-toggle="collapse" href="#collapse-busqueda90" role="button" aria-expanded="false" aria-controls="collapse-busqueda90">
                    1. IMAGEN DE TU CASA
                </button>
                <div class="collapse" id="collapse-busqueda90">
                    <div class="content-collapse">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <span class="text-muted">
                                    ¿Te gustaría tener una cita con alguien después de ver que sus fotos tienen un montón de filtros, maquillaje o quizás ni siquiera tiene fotos donde se vea bien?
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="text-muted">
                                    Claro que la respuesta es NO.
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="text-muted">
                                    No se trata de mostrar algo que no eres u ocultar defectos para conseguir más citas, se trata de encontrar un comprador, igual que cuando encontras el AMOR…donde nuestras "imperfecciones" es la perfección para el otro.
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="text-muted">
                                    Por eso, la apariencia de nuestra casa debe ser sincera, ni más ni menos de lo que realmente es. No necesitas fotos profesionales ni filtros para esconder los defectos, solo fotos bien hechas con tu móvil, donde se vean bien los espacios, la luz, y cómo es tu casa de verdad.
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="collapse-item">
                <button class="btn-collapse text-left" style="cursor:pointer;width:100%;border: none;outline:none;" data-toggle="collapse" href="#collapse-busqueda190" role="button" aria-expanded="false" aria-controls="collapse-busqueda190">
                    2. PUBLICIDAD
                </button>
                <div class="collapse" id="collapse-busqueda190">
                    <div class="content-collapse">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <span class="text-muted">
                                    Una vez que tienes las fotos listas, es hora de publicar tu casa en los portales inmobiliarios. ¿En qué portal deberías publicar? Hoy en día hay miles de portales, ¿entonces tengo que publicar en todos?
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="text-muted">
                                    Respuesta: NO
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="text-muted">
                                    Porque alguien que quiere comprar una casa puede que mire todos los portales o puede que no, pero siempre, siempre mirará en Idealista. Así que no hay necesidad de publicar en otros sitios que no sean Idealista. Te puedo asegurar que si tu casa está en Idealista, tendrá la misma eficacia que si estuviera en todos los portales.
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="text-muted">
                                    ¿Ah, pero publicar en Idealista es muy caro?
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="text-muted">
                                    Respuesta: Sí, tienes razón, te sale unos 300€ aproximadamente, pero sin duda en este caso lo barato te saldrá caro.
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="collapse-item">
                <button class="btn-collapse text-left" style="cursor:pointer;width:100%;border: none;outline:none;" data-toggle="collapse" href="#collapse-busqueda390" role="button" aria-expanded="false" aria-controls="collapse-busqueda390">
                    3. PRECIO
                </button>
                <div class="collapse" id="collapse-busqueda390">
                    <div class="content-collapse">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <span class="text-muted">
                                    ¡Cuidado! Un error muy común es cuando el propietario pone el precio por encima de lo que realmente quiere vender su casa, pensando en la típica frase <b>"para bajar el precio siempre hay tiempo"</b>. Esto es un fallo muy grande porque:
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="text-muted">
                                    Cuando buscamos comprar una casa en los portales, lo hacemos usando filtros. Por ejemplo, si tu idea es vender tu casa por 500.000€ pero la anuncias a 520.000€, estarás perdiendo a todos los compradores que han puesto en su búsqueda "busco comprar hasta los 500.000€".
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="text-muted">
                                    Sé que puedes pensar que luego el comprador querrá regatear y por eso necesitas poner un precio más alto, ¿verdad?
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="text-muted">
                                    Respuesta: Hoy en día ya no funciona así. Una casa que está en su precio justo no es negociable, y para evitar pérdidas de tiempo y visitas innecesarias, cuando estamos filtrando las visitas, simplemente hay que mencionar que el precio no es negociable bajo ningún concepto y listo.
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="text-muted">
                                    Así eliminamos ese tipo de comprador que solo quiere tantear o hacer una oferta por debajo del precio anunciado. De esta manera aumentamos muchísimo la cantidad de interesados sin tocar el precio de venta.
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="text-muted">
                                    Además, lo que antes funcionaba, hoy ya no funciona.
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="text-muted">
                                    Eso de mostrar que bajas el precio de un inmueble para atraer más compradores, hoy en día tiene el efecto contrario: está mostrando tu desesperación por vender y automáticamente desvalorizando tu propiedad.
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="text-muted">
                                    Por esta razón, es súper importante que el precio que publiques sea el correcto desde el principio, porque luego es difícil arreglar este error y te puede costar miles de euros
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="collapse-item">
                <button class="btn-collapse text-left" style="cursor:pointer;width:100%;border: none;outline:none;" data-toggle="collapse" href="#collapse-busqueda990" role="button" aria-expanded="false" aria-controls="collapse-busqueda990">
                    4. ¿QUÉ PRECIO PONGO?
                </button>
                <div class="collapse" id="collapse-busqueda990">
                    <div class="content-collapse">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <span class="text-muted">
                                    Si no sabes qué precio poner a tu casa, haz clic en el botón de ayuda que está abajo y nos pondremos en contacto contigo lo antes posible para echarte una mano con esto, totalmente gratis.
                                </span>
                            </li>
                        </ul>
                        <p class="my-4 text-center">
<button type="button" 
        id="btn_ayuda" 
        name="btn_ayuda" 
        class="btn btn-iamoving btn-lg" 
        style="color:default;" 
        data-toggle="modal" 
        data-target="#modalVenta">
    <!-- Versión escritorio -->
    <span class="d-none d-sm-inline">
        AYUDA
    </span> 
    <!-- Versión móvil con icono -->
    <span class="d-inline d-sm-none">
        <i class="fab fa-whatsapp" style="font-size: 1.2em; vertical-align: middle;"></i>
        <span style="vertical-align: middle;"> AYUDA</span>
    </span>   
</button> 
                        </p>
                    </div>
                </div>
            </div>

            <div class="collapse-item">
                <button class="btn-collapse text-left" style="cursor:pointer;width:100%;border: none;outline:none;" data-toggle="collapse" href="#collapse-busqueda11901" role="button" aria-expanded="false" aria-controls="collapse-busqueda11901">
                    5. LLAMADAS Y CORREOS
                </button>
                <div class="collapse" id="collapse-busqueda11901">
                    <div class="content-collapse">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <span class="text-muted">
                                    Una vez que publicamos el anuncio en Idealista, con buenas fotos y precio adecuado... empezarás a recibir todo tipo de contactos: desde OKUPAS y curiosos, hasta madres, tías y abuelas llamando para sus hijos, sobrinos o nietos. También te contactarán supuestos interesados que ni han leído el anuncio completo para ver si la casa realmente les conviene, o que ni siquiera han comprobado si pueden permitirse comprarla.
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="text-muted">
                                    En este punto, lo normal es querer gritar ¡SOCORRO! El proceso puede ser agotador: te preocupas por los okupas y pierdes muchísimo tiempo con visitas y llamadas que no llevan a ninguna parte.
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="text-muted">
                                    Sin embargo, es crucial responder a todos los mensajes y llamadas lo antes posible, aunque muchas veces sientas que estás perdiendo el tiempo. Recuerda que entre todos esos contactos habrá alguien a quien tu casa le va como anillo al dedo, y lo último que quieres es que esa persona acabe comprando otra vivienda similar a la tuya.
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="collapse-item">
                <button class="btn-collapse text-left" style="cursor:pointer;width:100%;border: none;outline:none;" data-toggle="collapse" href="#collapse-busqueda11903" role="button" aria-expanded="false" aria-controls="collapse-busqueda11903">
                    6. VISITAS
                </button>
                <div class="collapse" id="collapse-busqueda11903">
                    <div class="content-collapse">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <span class="text-muted">
                                    Lamentablemente, hoy en día cuando alguien ve una casa en Idealista, simplemente pulsa un botón y a ti ya te aparece que "fulanito está interesado en comprar tu casa y quiere visitarla". Pero la realidad es bien distinta: muchas veces esa persona ni siquiera recuerda la casa que ha solicitado visitar. Por eso, es necesario filtrar al máximo para que solo vengan compradores reales y no perder el tiempo con visitas que no van a ninguna parte.
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="text-muted">
                                    Hay una gran diferencia entre querer y buscar... tu papel es identificar quién realmente quiere de verdad tu casa. Cuando de verdad nos interesa algo, hacemos un esfuerzo por conseguirlo.
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="text-muted">
                                    Así que provoca este esfuerzo en el supuesto "interesado" pidiéndole que rellene un pequeño formulario con sus datos. Esto no solo te ayudará a filtrar, sino que también es una cuestión de seguridad: necesitas saber a quién metes en tu casa con la excusa de visitar un piso para comprar. De esta manera, podrás separar a los que realmente están interesados en comprar tu casa de los que simplemente quieren curiosear.
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="collapse-item">
                <button class="btn-collapse text-left" style="cursor:pointer;width:100%;border: none;outline:none;" data-toggle="collapse" href="#collapse-busqueda11904" role="button" aria-expanded="false" aria-controls="collapse-busqueda11904">
                    7. SEGUIMIENTO
                </button>
                <div class="collapse" id="collapse-busqueda11904">
                    <div class="content-collapse">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <span class="text-muted">
                                    Una cosa importante es dar toda la atención necesaria al comprador después de la visita. En el 99% de los casos, el comprador sabe exactamente lo que quiere: si le gusta tu casa, te pedirá una segunda visita o directamente te hará una oferta.
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="text-muted">
                                    Pero cuando el vendedor va persiguiendo al comprador, solo consigue una cosa: depreciar el valor de su vivienda y, como es natural, espantar al comprador.
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="collapse-item">
                <button class="btn-collapse text-left" style="cursor:pointer;width:100%;border: none;outline:none;" data-toggle="collapse" href="#collapse-busqueda11905" role="button" aria-expanded="false" aria-controls="collapse-busqueda11905">
                    8. OFERTA DE COMPRAVENTA
                </button>
                <div class="collapse" id="collapse-busqueda11905">
                    <div class="content-collapse">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <span class="text-muted">
                                    Una vez que hemos sobrevivido a todo esto y tenemos un comprador interesado en nuestra casa, necesitamos formalizar su interés.
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="text-muted">
                                    ¿Esto se hace con un contrato de arras? ¡NO! Todavía no.
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="text-muted">
                                    Ten en cuenta que preparar un contrato de arras puede tardar varios días o incluso una semana. Durante este tiempo seguiremos recibiendo llamadas y emails de otros compradores interesados. Imagina que dejamos de enseñar la casa durante estos días y, cuando llega el momento de firmar el contrato de arras, después de tenerlo todo listo, el comprador te dice que ya no le interesa tu casa. Esto se convierte en un verdadero problema: has perdido tiempo y dinero redactando un contrato que al final no ha servido para nada, además de todos los posibles compradores que has perdido en los días que la casa estaba "reservada" de palabra.
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="text-muted">
                                    Lamentablemente, mientras no haya un compromiso económico, la gente sigue buscando otras opciones. Por eso, debemos formalizar su oferta a través de una señal económica, así si este comprador se echa atrás antes de la firma de arras, perderá la señal entregada. De esta manera evitamos estos problemas que nos generan muchísimo estrés y pérdidas económicas.
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="collapse-item">
                <button class="btn-collapse text-left" style="cursor:pointer;width:100%;border: none;outline:none;" data-toggle="collapse" href="#collapse-busqueda11906" role="button" aria-expanded="false" aria-controls="collapse-busqueda11906">
                    9. CONTRATO DE ARRAS
                </button>
                <div class="collapse" id="collapse-busqueda11906">
                    <div class="content-collapse">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <span class="text-muted">
                                    Un contrato de arras es simplemente un acuerdo inicial donde una de las partes (normalmente el comprador) entrega una cantidad de dinero a la otra (el vendedor) como garantía de que completará la compra más adelante. Este contrato establece las condiciones para la venta, incluyendo el precio, cómo se pagará y otros detalles importantes.
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="text-muted">
                                    Lo más común son las arras penitenciales: estas permiten que cualquiera de las partes pueda echarse atrás, pero con consecuencias. Si el comprador se retira, pierde el dinero entregado. Si es el vendedor quien se echa atrás, debe devolver el doble de lo que recibió.
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="text-muted">
                                    El contrato de arras es muy útil en la compraventa porque formaliza el compromiso entre ambas partes y da cierta seguridad hasta que se firmen las escrituras en la notaría. Te recomendamos que estos contratos los redacte un profesional para asegurarte de que cumplen con todas las leyes y protegen los intereses de ambas partes.
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="collapse-item">
                <button class="btn-collapse text-left" style="cursor:pointer;width:100%;border: none;outline:none;" data-toggle="collapse" href="#collapse-busqueda11907" role="button" aria-expanded="false" aria-controls="collapse-busqueda11907">
                    10. NOTARÍA
                </button>
                <div class="collapse" id="collapse-busqueda11907">
                    <div class="content-collapse">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <span class="text-muted">
                                    La firma de escritura en la notaría es el momento clave donde se oficializa la compra de tu piso o casa con un documento legal ante notario.
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="text-muted">
                                    ¿Qué implica realmente este proceso?
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="text-muted">
                                    · Es la formalización oficial: La escritura recoge todos los acuerdos entre el comprador y el vendedor - el precio, cómo es la vivienda, si tiene cargas pendientes y todos los demás detalles importantes.
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="text-muted">
                                    · El papel del notario: Su trabajo es verificar quiénes sois, comprobar que no hay problemas legales (como hipotecas sin pagar o embargos) y dar fe de que ambos estáis de acuerdo con la compraventa.
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="text-muted">
                                    · El gran momento: Cuando se firma la escritura, normalmente es cuando se paga el total del precio acordado y se entregan las llaves de la casa a la parte compradora.
                                </span>
                            </li>
                           <!-- <li class="list-group-item">
                                <span class="text-muted">
                                    · Inscripción en el Registro: Después de firmar, la escritura debe registrarse oficialmente. Esto es súper importante porque te protege como nuevo propietario frente a cualquier problema que pueda surgir.
                                </span>
                            </li>-->
							
                            <li class="list-group-item">
                                <span class="text-muted">
                                    · Impuestos y gastos: Con la firma llegan algunas obligaciones fiscales, como el pago del impuesto de transmisiones o la famosa "plusvalía".
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="text-muted">
                                    · Papeles necesarios: Para este día, tanto el comprador como el vendedor necesitarán llevar documentos como DNI, escrituras anteriores, certificados de estar al día con los pagos, etc.
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="text-muted">
                                    En definitiva, la escritura ante notario es el paso definitivo para vender tu casa. Te da toda la seguridad legal y confirma que la compraventa cumple con la ley.
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <br>

    <div class="row mt-3">
        <div class="col-md-2"></div>
        <div class="col-md-8 text-center mb-3">
            <img src="/img/frustracion.png" width="70" height="70" style="margin-bottom:10px;" alt="playa">
        </div>
        <div class="col-md-2"></div>
    </div>

    <div class="text-center mx-md-4 my-0" style="padding-top: 0px;padding-bottom: 0px;">
        <h5 class="text-center mb-4">
            <b>¿Todo esto te suena complicado o simplemente no tienes tiempo para ocuparte de todos estos trámites?</b>
        </h5>

        <div class="container my-3">
            <div class="section-title text-center my-0" style="padding-top: 0px;padding-bottom: 0px;">
                <h3 class="text-center mb-5">
                    <b><font face="Agency FB">¡NOSOTROS NOS OCUPAMOS DE TODO POR TI!</font></b>
                </h3>
            </div>
        </div>

        <div class="col-12">
            <div class="animated bounceInLeft fast">
                <div class="row mt-0">
                    <div class="col-md-3"></div>

                    <div class="col-md-6 d-none d-sm-none d-md-block">
                        <div class="text-center">
                            <ul class="list-unstyled">
                                <li class="d-flex align-items-center justify-content-center mb-2">
                                    <span class="mr-2">•</span>
                                    <h5 class="display-5 mb-0">Totalmente gratis.</h5>
                                </li>
                                <li class="d-flex align-items-center justify-content-center mb-2">
                                    <span class="mr-2">•</span>
                                    <h5 class="display-5 mb-0">No tienes que firmar nada.</h5>
                                </li>
                                <li class="d-flex align-items-center justify-content-center">
                                    <span class="mr-2">•</span>
                                    <h5 class="display-5 mb-0">Y sin exclusivas.</h5>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 d-block d-sm-block d-md-none">
                        <div class="text-center">
                            <ul class="list-unstyled">
                                <li class="d-flex align-items-center justify-content-center mb-2">
                                    <ion-icon name="checkmark-circle-outline" class="mr-2"></ion-icon>
                                    <h5 class="display-5 mb-0">Totalmente gratis.</h5>
                                </li>
                                <li class="d-flex align-items-center justify-content-center mb-2">
                                    <ion-icon name="checkmark-circle-outline" class="mr-2"></ion-icon>
                                    <h5 class="display-5 mb-0">No tienes que firmar nada.</h5>
                                </li>
                                <li class="d-flex align-items-center justify-content-center">
                                    <ion-icon name="checkmark-circle-outline" class="mr-2"></ion-icon>
                                    <h5 class="display-5 mb-0">Y sin exclusivas.</h5>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>

        <p class="my-4 text-center">
<button type="button" 
        id="btn_me_interesa_1" 
        name="btn_me_interesa_1" 
        class="btn btn-iamoving btn-lg" 
        style="color:default;" 
        data-toggle="modal" 
        data-target="#modalVenta">
    <!-- Versión escritorio -->
    <span class="d-none d-sm-inline">
        ME INTERESA
    </span>
    
    <!-- Versión móvil con icono -->
    <span class="d-inline d-sm-none">
        <i class="fab fa-whatsapp" style="font-size: 1.2em; vertical-align: middle;"></i>
        <span style="vertical-align: middle;"> Me interesa</span>
    </span>
</button>            
        </p>

        <div class="row mt-3">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="pricing-box">
                    <p class="ml-0 text-center">
                        <img src="/img/mobile.png" width="70" height="70" style="margin-bottom:10px;" alt="diana">
                    </p>
                    <h4 class="text-center mb-4"><b>¿CÓMO FUNCIONA?</b></h4>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>

        <section class="collapse-content">
            <div class="container my-0 mt-3">
                <div class="collapse-item">
                    <button class="btn-collapse text-left" style="cursor:pointer;width:100%;border: none;outline:none;" data-toggle="collapse" href="#collapse-busqueda" role="button" aria-expanded="false" aria-controls="collapse-busqueda">
                        1. COMPRADORES
                    </button>
                    <div class="collapse" id="collapse-busqueda">
                        <div class="content-collapse">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <span class="text-muted">
                                        Atendiendo la solicitud de nuestros compradores, les presentamos tu vivienda.
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="collapse-item">
                    <button class="btn-collapse text-left" style="cursor:pointer;width:100%;border: none;outline:none;" data-toggle="collapse" href="#collapse-busqueda1" role="button" aria-expanded="false" aria-controls="collapse-busqueda1">
                        2. PUBLICITAMOS
                    </button>
                    <div class="collapse" id="collapse-busqueda1">
                        <div class="content-collapse">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <span class="text-muted">
                                        Creamos un anuncio con información detallada de tu inmueble y lo difundimos estratégicamente en múltiples canales: nuestra plataforma propia, las redes sociales de IAMOVING (Instagram, Facebook, YouTube y TikTok), Yaencontré e Idealista. De esta forma, maximizamos el alcance de tu propiedad sin que esto te genere ninguna molestia, compromiso o coste adicional.
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="collapse-item">
                    <button class="btn-collapse text-left" style="cursor:pointer;width:100%;border: none;outline:none;" data-toggle="collapse" href="#collapse-busqueda3" role="button" aria-expanded="false" aria-controls="collapse-busqueda3">
                        3. VISITAS FILTRADAS
                    </button>
                    <div class="collapse" id="collapse-busqueda3">
                        <div class="content-collapse">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item" style="text-align: left;">
                                    <span class="text-muted">
                                        1. El 80% de las visitas realizadas a través del modelo tradicional son innecesarias, ya que la mayoría de los interesados ni siquiera han leído toda la información y características de tu inmueble anunciado, por lo que tu propiedad no se ajusta realmente a sus necesidades.
                                    </span>
                                </li>
                                <li class="list-group-item" style="text-align: left;">
                                    <span class="text-muted">
                                        2. Sin contar que muchos tampoco han realizado un estudio financiero previo para conocer su capacidad máxima de compra.
                                    </span>
                                </li>
                                <li class="list-group-item" style="text-align: left;">
                                    <span class="text-muted">
                                        3. Y por último, la seguridad: Durante los últimos años han aparecido complicaciones derivadas de las visitas para comprar viviendas, por ejemplo, okupas que visitan pisos vacíos para posteriormente ocuparlos.
                                    </span>
                                </li>
                                <li class="list-group-item" style="text-align: left;">
                                    <span class="text-muted">
                                        <b>Pensando en este problema, nuestro sistema informático solo permite solicitudes de visitas presenciales una vez que:</b>
                                    </span>
                                </li>
                                <li class="list-group-item" style="text-align: left;">
                                    <span class="text-muted">
                                        · Nuestro usuario haya visualizado todos los contenidos del anuncio donde le facilitamos todo tipo de información de tu propiedad (por seguridad no mencionamos el número del portal en el anuncio).
                                    </span>
                                </li>
                                <li class="list-group-item" style="text-align: left;">
                                    <span class="text-muted">
                                        · Nos haya informado cuál sería su forma de pago:
                                    </span>
                                </li>
                                <li class="list-group-item" style="text-align: left; padding-left: 40px;">
                                    <span class="text-muted">
                                        - Si ya dispone del dinero y no necesita un crédito.
                                    </span>
                                </li>
                                <li class="list-group-item" style="text-align: left; padding-left: 40px;">
                                    <span class="text-muted">
                                        - Si ya ha realizado un estudio financiero y dispone de un crédito hipotecario aprobado por el valor de tu vivienda.
                                    </span>
                                </li>
                                <li class="list-group-item" style="text-align: left; padding-left: 40px;">
                                    <span class="text-muted">
                                        - O si aún no ha realizado un estudio financiero, pero ya está buscando casas.
                                    </span>
                                </li>
                                <li class="list-group-item" style="text-align: left;">
                                    <span class="text-muted">
                                        · Y por último, nuestro usuario tiene que facilitarnos sus datos personales para saber quién accede a tu propiedad.
                                    </span>
                                </li>
                                <li class="list-group-item" style="text-align: left;">
                                    <span class="text-muted">
                                        De esta manera, recibirás peticiones de visitas de nuestros usuarios compradores, donde tú podrás conocer su perfil antes de cada visita y confirmarla si te interesa o, en caso contrario, rechazarla.
                                    </span>
                                </li>
                                <li class="list-group-item" style="text-align: left;">
                                    <span class="text-muted">
                                        Escoge el día, la hora y el comprador que tú prefieras para enseñarle el piso y conocerle en persona.
                                    </span>
                                </li>
                                <li class="list-group-item" style="text-align: left;">
                                    <span class="text-muted">
                                        De esta manera, nadie pierde el tiempo visitando o recibiendo visitas que no aportan valor; nuestro usuario solo visita los inmuebles que realmente le interesan y eliminamos las visitas sin potencial de compra.
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="collapse-item">
                    <button class="btn-collapse text-left" style="cursor:pointer;width:100%;border: none;outline:none;" data-toggle="collapse" href="#collapse-busqueda9" role="button" aria-expanded="false" aria-controls="collapse-busqueda9">
                        4. ASESORÍA JURÍDICA
                    </button>
                    <div class="collapse" id="collapse-busqueda9">
                        <div class="content-collapse">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <span class="text-muted">
                                        Redacción del contrato de arras.
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <span class="text-muted">
                                        Redacción y/o Revisión y/o Asesoramiento para la formalización de la Escritura de Compraventa.
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <span class="text-muted">
                                        Resolución de consultas relativas al contrato de arras y/o escritura de compraventa por escrito, mediante correo electrónico.
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <span class="text-muted">
                                        Redacción y envío de todas aquellas comunicaciones que deban ser remitidas a la parte compradora y hasta la formalización de la escritura de compraventa.
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="collapse-item">
                    <button class="btn-collapse text-left" style="cursor:pointer;width:100%;border: none;outline:none;" data-toggle="collapse" href="#collapse-busqueda10" role="button" aria-expanded="false" aria-controls="collapse-busqueda10">
                        5. VENDE GRATIS
                    </button>
                    <div class="collapse" id="collapse-busqueda10">
                        <div class="content-collapse">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <span class="text-muted">
                                        VENDE tu casa con IAMOVING, totalmente gratuito, fácil y seguro.
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <span class="text-muted">
                                        La parte vendedora no tiene ningún compromiso de exclusividad con IAMOVING. No tienes que firmar contrato ni pagarnos absolutamente nada.
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <span class="text-muted">
                                        Nuestros honorarios los pagan los compradores que utilizan nuestro servicio.
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <p class="my-4 text-center">
<button type="button" 
        id="btn_me_interesa_2" 
        name="btn_me_interesa_2" 
        class="btn btn-iamoving btn-lg" 
        style="color:default;" 
        data-toggle="modal" 
        data-target="#modalVenta">
    <!-- Versión escritorio -->
    <span class="d-none d-sm-inline">
        ME INTERESA
    </span> 
    <!-- Versión móvil con icono -->
    <span class="d-inline d-sm-none">
        <i class="fab fa-whatsapp" style="font-size: 1.2em; vertical-align: middle;"></i>
        <span style="vertical-align: middle;"> Me interesa</span>
    </span> 
</button>     
        </p>
    </div>

    <br>

    <section class="feature-section" style="padding-top: 20px; padding-bottom: 60px;">
        <div class="container">
            @include('partials.testimonios')
        </div>
    </section>

    <br/>

    @include('iamovingpro.propietario.includes.anuncia')
    @include('iamovingpro.propietario.includes.venta')
    @include('iamovingpro.propietario.includes.ayuda')



@endsection 

@section('styles')
    <link rel="stylesheet" href="photon/fonts/icomoon/style.css">
    <link rel="stylesheet" href="photon/css/owl.carousel.min.css">
    <link rel="stylesheet" href="photon/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="photon/css/swiper.css">
    <link rel="stylesheet" href="photon/css/style.css">
    <link rel="stylesheet" href="{{ asset('css/testimonios.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vender.css') }}">

@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.form.min.js') }}" defer></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}" defer></script>
    <script src="photon/js/jquery-3.3.1.min.js"></script>
    <script src="photon/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="photon/js/owl.carousel.min.js"></script>
    <script src="photon/js/jquery.stellar.min.js"></script>
    <script src="photon/js/jquery.countdown.min.js"></script>
    <script src="photon/js/jquery.magnific-popup.min.js"></script>
    <script src="photon/js/swiper.min.js"></script>
    <script src="photon/js/aos.js"></script>
    <script src="photon/js/main.js"></script>

@include('iamovingpro.propietario.includes.vender-scripts')
@endsection
