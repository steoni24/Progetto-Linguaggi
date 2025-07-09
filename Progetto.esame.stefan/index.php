<?php
$title = "KPA | Home Page";
include("inc/head.php");
include("inc/header.php");
?>

<section class="main-section pb-4">
    <video width="1920px" height="500px" preload="true" autoplay loop muted playsinline>
        <source src="assets/video/home.mp4?mute=1" type="video/mp4">
    </video>

    <div class="overlay">
        <div class="inner">
            <h1 class="title text-light">Keep People Alive</h1>
            <p class="subtitle text-light">Do you need more information?</p>
            <a type="button" href="contattaci.php" class="fw-bold text-decoration-none" style="color: #ff5e14;">Contattaci</a>
        </div>
    </div>

</section>

<main>
    <section class="pb-3 wow fadeInDown">
        <div class="container" >
            <h1 class="section-title">Benvenuti a Keep Pepole Alive, dove l’empatia incontra l’azione.</h1>
            <p class="section-subtitle">Siamo una organizzazione no-profit dedicata a fornire aiuto e formazione a coloro che si trovano in situazioni di difficoltà. Crediamo fermamente nel potere della solidarietà e dell’educazione come strumenti per superare le sfide e costruire un futuro migliore.</p>
            <h2>La nostra missione</h2>
            <p> La nostra missione è semplice: migliorare la vita delle persone. Lo facciamo attraverso programmi di formazione personalizzati, supporto diretto e collaborazioni con altre organizzazioni che condividono la nostra visione.</p>
        </div>
    </section>

    <section class="pb-3">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col wow bounceInLeft">
                    <img src="assets/img/circle-3629683_1280.jpg" class="img-fluid rounded" width="500" height="500" alt="Home Paragraph Image" />
                </div>

                <div class="col align-content-center wow bounceInRight">
                    <h2 class="" style="color: #ff5e14;">Azienda</h2>
                    <h3 class="">#La nostra Storia</h3>
                    <p>La nostra azienda è stata fondata con l’obiettivo di fare la differenza nel mondo. Da quando abbiamo aperto le nostre porte, abbiamo accolto con gratitudine coloro che sono venuti a darci una mano. Il loro spirito di altruismo ha alimentato la nostra missione e ci ha permesso di espanderci e crescere. Ogni giorno, lavoriamo insieme per creare soluzioni innovative che rispondano alle esigenze del nostro mondo in continua evoluzione. Se sei qui per dare una mano, ti ringraziamo per il tuo spirito di altruismo. Insieme, possiamo fare la differenza.</p>
                    <a href="azienda.php" class="fw-bold text-decoration-none" style="color: #ff5e14;">Continue</a>
                </div>
            </div>
        </div>
    </section>


    <section class="pb-3">
        <div class="container">
            <div class="d-flex justify-content-center wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.3s">
                <h1 class="">I nostri servizi</h1>
            </div>

            <div class="d-flex justify-content-center p-4 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.3s">
                <p class="text-center">
                    La nostra azienda è dedicata a fornire soluzioni sostenibili e formazione su energie rinnovabili. Aiutiamo le persone in difficoltà a diventare autosufficienti, promuovendo l’uso di tecnologie verdi per un futuro più luminoso e sostenibile.
                </p>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3 mb-5">
                        <div class="col d-flex wow fadeInUp">
                            <div class="card">
                                <a href="serv_supporto.php" class="">
                                    <img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="assets/img/servizi/support.jpg" alt="Servizio uno">
                                </a>
                                <div class="card-body p-4">
                                    <h4 class="card-title">Supporto alle nuove generazioni:</h4>
                                    <p class="card-text">Forniamo supporto alle nuove generazioni, in particolare a quelle che stanno affrontando difficoltà e non riescono ad avere le cure necessarie.</p>
                                    <a href="serv_supporto.php" class="text-decoration-none" style="color: #ff5e14;">Leggi tutto</a>
                                </div>
                            </div>
                        </div>

                        <div class="col d-flex wow fadeInUp">
                            <div class="card">
                                <a href="serv_innovazione.php" class="">
                                    <img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="assets/img/servizi/idea.png" alt="Servizio Due">
                                </a>
                                <div class="card-body p-4">
                                    <h4 class="card-title">Innovazione per la qualità della vita:</h4>
                                    <p class="card-text">Lavoriamo per creare e implementare nuove idee che possano migliorare la qualità della vita delle persone in difficoltà.</p>
                                    <a href="serv_innovazione.php" class="text-decoration-none" style="color: #ff5e14;">Leggi tutto</a>
                                </div>
                            </div>
                        </div>

                        <div class="col d-flex wow fadeInUp">
                            <div class="card">
                                <a href="serv_rinnovabili.php" class="">
                                    <img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="assets/img/servizi/energy.jpg" alt="Servizio Tre">
                                </a>
                                <div class="card-body p-4">
                                    <h4 class="card-title">Formazione sull’energia rinnovabile:</h4>
                                    <p class="card-text">Offriamo formazione continua ai futuri membri della nostra organizzazione sull’uso dell’energia rinnovabile e su come può contribuire a un futuro più sostenibile.</p>
                                    <a href="serv_rinnovabili.php" class="text-decoration-none" style="color: #ff5e14;">Leggi tutto</a>
                                </div>
                            </div>
                        </div>

                        <div class="col d-flex wow fadeInUp">
                            <div class="card">
                                <a href="serv_social.php" class="">
                                    <img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="assets/img/servizi/man_social.jpg" alt="Servizio Quattro">
                                </a>
                                <div class="card-body p-4">
                                    <h4 class="card-title">Campagne sui social media:</h4>
                                    <p class="card-text">Lanciamo campagne sui social media per sensibilizzare il pubblico sulle questioni relative alla salute, all’energia rinnovabile e alla sostenibilità.</p>
                                    <a href="serv_social.php" class="text-decoration-none" style="color: #ff5e14;">Leggi tutto</a>
                                </div>
                            </div>
                        </div>

                        <div class="col d-flex wow fadeInUp">
                            <div class="card">
                                <a href="serv_volontariato.php" class="">
                                    <img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="assets/img/servizi/volunteer.jpg" alt="Servizio Cinque">
                                </a>
                                <div class="card-body p-4">
                                    <h4 class="card-title">Volontariato:</h4>
                                    <p class="card-text">Promuoviamo opportunità di volontariato per coloro che desiderano contribuire attivamente alla nostra missione e aiutare le persone in difficoltà.</p>
                                    <a href="serv_volontariato.php" class="text-decoration-none" style="color: #ff5e14;">Leggi tutto</a>
                                </div>
                            </div>
                        </div>

                        <div class="col d-flex wow fadeInUp">
                            <div class="card">
                                <a href="serv_sostenibilita.php" class="">
                                    <img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="assets/img/servizi/earth-day.png" alt="Servizio Sei">
                                </a>
                                <div class="card-body p-4">
                                    <h4 class="card-title">Sostenibilità energetica e riduzione degli sprechi:</h4>
                                    <p class="card-text">Forniamo consulenza su come raggiungere la sostenibilità energetica e ridurre gli sprechi, sia a livello individuale che organizzativo.</p>
                                    <a href="serv_sostenibilita.php" class="text-decoration-none" style="color: #ff5e14;">Leggi tutto</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 d-flex justify-content-center">
                        <a href="#caricaAltriServizi" class="btn btn-light border">Carica Altri Servizi</a>
                    </div>

                </div>
            </div>
    </section>

</main>

<?php
include("inc/footer.php");
include("inc/scripts.php");
?>
