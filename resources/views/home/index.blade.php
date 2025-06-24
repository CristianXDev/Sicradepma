@extends('sources-home')

@section('title')

<!-- Website Title -->
<title>SICRADEPMA23 - ESCUELA PRESIDENTE MEDINA ANGARITA</title>

@endsection

@section('content')
<!-- Header -->
<header id="header" class="header">
    <div class="header-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container">
                        <h1>Sistema De Resguardo De Información</h1>
                        <p class="p-large">Fácil de usar para la gestión y respaldo de los datos estudiantiles.</p>
                        <a class="btn-solid-lg page-scroll" href="sign-up.html">INICIAR SESIÓN</a>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <div class="image-container">
                        <div>
                            <img class="img-fluid bg-white rounded-circle mt-3" src="{{ asset('static/images/alumno.gif') }}" alt="alternative">
                        </div> <!-- end of img-wrapper -->
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of header-content -->
</header> <!-- end of header -->
<svg class="header-frame" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1920 310"><defs><style>.cls-1{fill:#5f4def;}</style></defs><title>header-frame</title><path class="cls-1" d="M0,283.054c22.75,12.98,53.1,15.2,70.635,14.808,92.115-2.077,238.3-79.9,354.895-79.938,59.97-.019,106.17,18.059,141.58,34,47.778,21.511,47.778,21.511,90,38.938,28.418,11.731,85.344,26.169,152.992,17.971,68.127-8.255,115.933-34.963,166.492-67.393,37.467-24.032,148.6-112.008,171.753-127.963,27.951-19.26,87.771-81.155,180.71-89.341,72.016-6.343,105.479,12.388,157.434,35.467,69.73,30.976,168.93,92.28,256.514,89.405,100.992-3.315,140.276-41.7,177-64.9V0.24H0V283.054Z"/></svg>
<!-- end of header -->

<!-- Description -->
<div class="cards-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="above-heading">FUNCIONES</div>
                <h2 class="h2-heading">Aquí un listado de las funciones con las que cuenta el sistema.</h2>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
        <div class="row">
            <div class="col-lg-12">

                <!-- Card -->
                <div class="card">
                    <div class="card-image">
                        <img class="img-fluid" src="{{ asset('static/images/Inteligencia.gif') }}" alt="alternative">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Inteligencia artificial integrada.</h4>
                        <p>Se cuenta con la integración de Gemini IA para agilizar los procesos dentro del sistema.</p>
                    </div>
                </div>
                <!-- end of card -->

                <!-- Card -->
                <div class="card">
                    <div class="card-image">|
                        <img class="img-fluid" src="{{ asset('static/images/ojo.gif') }}" alt="alternative">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Análisis de imagen.</h4>
                        <p>Mediante inteligencia artificial se pueden subir imagenes para ser interpretadas, de esta forma se puede agilizar la carga de información.</p>
                    </div>
                </div>
                <!-- end of card -->

                <!-- Card -->
                <div class="card">
                    <div class="card-image">
                        <img class="img-fluid" src="{{ asset('static/images/servidor.gif') }}" alt="alternative">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Respaldo de la base de datos.</h4>
                        <p>Resguarda la información de la base de datos facilmente.</p>
                    </div>
                </div>
                <!-- end of card -->

                <!-- Card -->
                <div class="card">
                    <div class="card-image">
                        <img class="img-fluid" src="{{ asset('static/images/notas.gif') }}" alt="alternative">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Carga de notas.</h4>
                        <p>Gestiona las calificaciones de los estudiantes y consulta en tiempo real.</p>
                    </div>
                </div>
                <!-- end of card -->

                <!-- Card -->
                <div class="card">
                    <div class="card-image">
                        <img class="img-fluid" src="{{ asset('static/images/graduacion.gif') }}" alt="alternative">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Generar certificados.</h4>
                        <p>La posibilidad de poder generar certificados de graduación de 6to grado.</p>
                    </div>
                </div>
                <!-- end of card -->


            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of cards-1 -->
<!-- end of description -->


<!-- Features -->
<div id="features" class="tabs">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="above-heading">HISTORIA</div>
                <h2 class="h2-heading">E.B.N.B "PDTE. MEDINA ANGARITA"</h2>
                <p class="p-heading">La Unidad Educativa Presidente” Medina Angarita”, tiene como visión el desarrollo integral de niños, niñas y adolescentes en los subsistemas de Educación Inicial, y Educación Primaria fomentando así los valores éticos, morales de pertenencia, compromiso histórico y social orientando a desarrollar el potencial creativo y su personalidad.</p>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
        <div class="row">
            <div class="col-lg-12">

                <!-- Tabs Links -->
                <ul class="nav nav-tabs" id="argoTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="nav-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true"><i class="fas fa-seedling"></i>Fundación</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nav-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false"><i class="fas fa-search"></i>Ubicación</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nav-tab-3" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false"><i class="fab fa-instagram"></i>
                        Redes Sociales</a>
                    </li>
                </ul>
                <!-- end of tabs links -->

                <!-- Tabs Content -->
                <div class="tab-content" id="argoTabsContent">

                    <!-- Tab -->
                    <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="image-container">
                                    <img class="img-fluid mt-4 rounded" src="{{ asset('static/images/escuela.jpg') }}" alt="alternative">
                                </div> <!-- end of image-container -->
                            </div> <!-- end of col -->
                            <div class="col-lg-6">
                                <div class="text-container">
                                    <h3>¿Cuando Fue Fundada?</h3>
                                    <p>La Unidad Educativa “Presidente Medina Angarita” <span class="blue">fue fundada en el año 1959</span>. Decretada su construcción durante la dictadura del General Marcos Pérez Jiménez y fundada durante la gestión del Contralmirante Wolfang Larrazabal en Enero de 1959.</p>

                                    <p>A la Institución le asignaron el nombre de Presidente Medina Angarita, <span class="blue">en honor del ex-presidente del país, el General Isaías Medina Angarita</span>. En el año de 1941, el Congreso Nacional lo nombra Presidente de Venezuela por el período 1941 hasta 1945. Fue un gobierno de amplias libertades democráticas donde se garantizó la libertad de expresión.</p>
                                </div> <!-- end of text-container -->
                            </div> <!-- end of col -->
                        </div> <!-- end of row -->
                    </div> <!-- end of tab-pane -->
                    <!-- end of tab -->

                    <!-- Tab -->
                    <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="image-container">

                                  <iframe class="rounded" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3926.585071991611!2d-67.42535832573324!3d10.214310889902311!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e8020e3eeffffff%3A0xa22c56eff8c277bc!2sEscuela%20B%C3%A1sica%20Medina%20Angarita!5e0!3m2!1ses!2sve!4v1735238828801!5m2!1ses!2sve" width="550" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                              </div> <!-- end of image-container -->
                          </div> <!-- end of col -->
                          <div class="col-lg-6">
                            <div class="text-container">
                                <h3>Ubicación</h3>
                                <p>Está ubicada al sur del Sector Barrio Belén, en la Calle Villapol S/N, cruce con Calle Ayacucho parte Oeste, Calle Cedeño parte Este y por la parte Norte Calle El Canal, en la histórica población de San Mateo, Municipio Bolívar del Estado Aragua.</p>
                                <a class="btn-solid-reg" target="_blank" href="https://maps.app.goo.gl/xnrcL3uymrvfMA3C7">Ver en Google Maps</a>
                            </div> <!-- end of text-container -->
                        </div> <!-- end of col -->
                    </div> <!-- end of row -->
                </div> <!-- end of tab-pane -->
                <!-- end of tab -->

                <!-- Tab -->
                <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="d-flex justify-content-center">
                                <img class="img-fluid w-75 rounded" src="{{ asset('static/images/redes.png') }}" alt="alternative">
                            </div> <!-- end of image-container -->
                        </div> <!-- end of col -->
                        <div class="col-lg-6">
                            <div class="text-container">
                                <h3>¿Como nos puedes contactar?</h3>
                                <p>Si tienes algún problema o tienes alguna duda, no dudes en contactarnos a traves de alguna de nuestras redes sociales:</p>
                                <ul class="list-unstyled li-space-lg">
                                    <li class="media">
                                        <i class="fas fa-square"></i>
                                        <div class="media-body"><a href="https://www.facebook.com/uenbpdteisaias.medinaangarita/" target="_blank" class="blue">Facebook</a></div>
                                    </li>
                                    <li class="media">
                                        <i class="fas fa-square"></i>
                                        <div class="media-body"><a href="#" target="_blank" class="blue">Instagram</a></div>
                                    </li>
                                </ul>
                            </div> <!-- end of text-container -->
                        </div> <!-- end of col -->
                    </div> <!-- end of row -->
                </div> <!-- end of tab-pane -->
                <!-- end of tab -->

            </div> <!-- end of tab content -->
            <!-- end of tabs content -->

        </div> <!-- end of col -->
    </div> <!-- end of row -->
</div> <!-- end of container -->
</div> <!-- end of tabs -->
<!-- end of features -->


<!-- Details Lightboxes -->
<!-- Details Lightbox 1 -->
<div id="details-lightbox-1" class="lightbox-basic zoom-anim-dialog mfp-hide">
    <div class="container">
        <div class="row">
            <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
            <div class="col-lg-8">
                <div class="image-container">
                    <img class="img-fluid" src="{{ asset('static/images/details-lightbox.png') }}" alt="alternative">
                </div> <!-- end of image-container -->
            </div> <!-- end of col -->
            <div class="col-lg-4">
                <h3>List Building</h3>
                <hr>
                <h5>Core service</h5>
                <p>It's very easy to start using Tivo. You just need to fill out and submit the Sign Up Form and you will receive access to the app.</p>
                <ul class="list-unstyled li-space-lg">
                    <li class="media">
                        <i class="fas fa-square"></i><div class="media-body">List building framework</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i><div class="media-body">Easy database browsing</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i><div class="media-body">User administration</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i><div class="media-body">Automate user signup</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i><div class="media-body">Quick formatting tools</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i><div class="media-body">Fast email checking</div>
                    </li>
                </ul>
                <a class="btn-solid-reg mfp-close" href="sign-up.html">SIGN UP</a> <a class="btn-outline-reg mfp-close as-button" href="#screenshots">BACK</a>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of lightbox-basic -->
<!-- end of details lightbox 1 -->

<!-- Details Lightbox 2 -->
<div id="details-lightbox-2" class="lightbox-basic zoom-anim-dialog mfp-hide">
    <div class="container">
        <div class="row">
            <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
            <div class="col-lg-8">
                <div class="image-container">
                    <img class="img-fluid" src="{{ asset('static/images/details-lightbox.png" alt="alternative') }}">
                </div> <!-- end of image-container -->
            </div> <!-- end of col -->
            <div class="col-lg-4">
                <h3>Campaign Monitoring</h3>
                <hr>
                <h5>Core service</h5>
                <p>It's very easy to start using Tivo. You just need to fill out and submit the Sign Up Form and you will receive access to the app.</p>
                <ul class="list-unstyled li-space-lg">
                    <li class="media">
                        <i class="fas fa-square"></i><div class="media-body">List building framework</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i><div class="media-body">Easy database browsing</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i><div class="media-body">User administration</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i><div class="media-body">Automate user signup</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i><div class="media-body">Quick formatting tools</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i><div class="media-body">Fast email checking</div>
                    </li>
                </ul>
                <a class="btn-solid-reg mfp-close" href="sign-up.html">SIGN UP</a> <a class="btn-outline-reg mfp-close as-button" href="#screenshots">BACK</a>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of lightbox-basic -->
<!-- end of details lightbox 2 -->

<!-- Details Lightbox 3 -->
<div id="details-lightbox-3" class="lightbox-basic zoom-anim-dialog mfp-hide">
    <div class="container">
        <div class="row">
            <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
            <div class="col-lg-8">
                <div class="image-container">
                    <img class="img-fluid" src="{{ asset('static/images/details-lightbox.png') }}" alt="alternative">
                </div> <!-- end of image-container -->
            </div> <!-- end of col -->
            <div class="col-lg-4">
                <h3>Analytics Tools</h3>
                <hr>
                <h5>Core service</h5>
                <p>It's very easy to start using Tivo. You just need to fill out and submit the Sign Up Form and you will receive access to the app.</p>
                <ul class="list-unstyled li-space-lg">
                    <li class="media">
                        <i class="fas fa-square"></i><div class="media-body">List building framework</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i><div class="media-body">Easy database browsing</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i><div class="media-body">User administration</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i><div class="media-body">Automate user signup</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i><div class="media-body">Quick formatting tools</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i><div class="media-body">Fast email checking</div>
                    </li>
                </ul>
                <a class="btn-solid-reg mfp-close" href="sign-up.html">SIGN UP</a> <a class="btn-outline-reg mfp-close as-button" href="#screenshots">BACK</a>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of lightbox-basic -->
<!-- end of details lightbox 3 -->
<!-- end of details lightboxes -->


<!-- Details -->
<div id="details" class="basic-1">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="text-container">
                    <h2>¿Sobre que trata este sistema?</h2>
                    <p>Somos una plataforma de última generación diseñada para revolucionar la administración de la información estudiantil, optimizando procesos y brindando una experiencia personalizada a la comunidad educativa. Vamos más allá de un simple registro de datos, integrando tecnologías avanzadas para ofrecer una gestión proactiva y eficiente.</p>
                    <ul class="list-unstyled li-space-lg">

                        <h5 class="text-muted">Nuestro sistema incluye:</h5>

                        <li class="media">
                            <i class="fas fa-square"></i>
                            <div class="media-body">Copias de seguridad automáticas, recuperación rápida de datos y alta seguridad.</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i>
                            <div class="media-body">Una interfaz intuitiva, validación de datos, importación masiva y seguimiento del progreso estudiantil.</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i>
                            <div class="media-body">¡Y mucho más!.</div>
                        </li>
                    </ul>
                </div> <!-- end of text-container -->
            </div> <!-- end of col -->

            <div class="col-md-6">
                <div class="image-container mt-n5">
                    <img class="img-fluid" src="{{ asset('static/images/pregunta.gif') }}" alt="alternative" height="350">
                </div> <!-- end of image-container -->
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of basic-1 -->
<!-- end of details -->


<!-- Video -->
<div id="video" class="basic-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="text-center mb-4">
                    <h2>¿Sabes Que Es Gemini IA?</h2>
                </div>

                <!-- Video Preview -->
                <div class="image-container my-5">
                    <div class="video-wrapper">
                        <img class="img-fluid" src="{{ asset('static/images/gemini.png') }}" alt="alternative">
                    </div> <!-- end of video-wrapper -->
                </div> <!-- end of image-container -->
                <!-- end of video preview -->

                <div class="p-heading">Gemini es un modelo de lenguaje grande y multimodal desarrollado por Google DeepMind. Esto significa que es una inteligencia artificial muy avanzada capaz de entender y generar diferentes tipos de información, como texto, código, imágenes y más.</div>        
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of basic-2 -->
<!-- end of video -->

<!-- Newsletter -->
<div class="form">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-container">
                    <div class="above-heading">¿LLEGASTE HASTA AQUÍ?</div>
                    <h2 class="mt-2">¡Nuestra plataforma está esperando por ti!</h2>

                    <!-- Newsletter Form -->
                    <form id="newsletterForm" data-toggle="validator" data-focus="false">
                        <div class="form-group">
                            <button type="submit" class="form-control-submit-button">INICIAR SESIÓN</button>
                        </div>
                        <div class="form-message">
                            <div id="nmsgSubmit" class="h3 text-center hidden"></div>
                        </div>
                    </form>
                    <!-- end of newsletter form -->

                </div> <!-- end of text-container -->
            </div> <!-- end of col -->
        </div> <!-- end of row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="icon-container">
                    <span class="fa-stack">
                        <a href="https://www.facebook.com/uenbpdteisaias.medinaangarita/">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-facebook-f fa-stack-1x"></i>
                        </a>
                    </span>
                    <span class="fa-stack">
                        <a href="#">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-instagram fa-stack-1x"></i>
                        </a>
                    </span>
                </div> <!-- end of col -->
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of form -->
<!-- end of newsletter -->
@endsection