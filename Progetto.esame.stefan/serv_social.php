<?php
$title = "Servizi | Social";
include("inc/head.php");
include("inc/header.php");
?>

<section class="main-section pb-4">
    <img width="1920px" height="500px" src="assets/img/servizi/social/social_media.jpg" class="opacity-50 header-img" alt="" />

    <div class="overlay">
        <div class="inner">
            <h1 class="title text-white text-decoration-none">Campagne sui social media</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white text-decoration-none" href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white text-decoration-none" href="servizi.php">Servizi</a></li>
                    <li class="breadcrumb-item text-white text-decoration-none"><span>Campagne sui social media</span></li>
                </ol>
            </nav>
        </div>

    </div>
</section>


<main>
    <section class="pb-3 wow fadeInDown">
        <div class="container">
            <h2 class="section-title">SocialSphere: L’Orizzonte Digitale</h2>
            <!-- <h3 class="section-subtitle">Social Media</h3> -->
            <p class="section-description">
                Entra nel cuore pulsante della comunicazione moderna con SocialSphere, la tua bussola nel vasto universo dei social media. Qui, ogni click ti apre le porte a infinite possibilità: dall’espandere la tua rete professionale, al condividere momenti preziosi con amici e familiari, fino a scoprire contenuti che accendono la tua creatività. SocialSphere è più di una piattaforma; è una comunità vibrante dove le voci si intrecciano, le idee prendono vita e le distanze si annullano. Siamo l’incrocio dove tecnologia e umanità si incontrano per creare un’esperienza di social media senza precedenti.
            </p>
        </div>
    </section>

    <section class="pb-3 wow bounceInUp">
        <div class="container">
            <div class="btn-group filter-button-group d-flex flex-wrap pb-5">
                <button class="btn btn-outline-light" style="background-color: #ff5e14;" data-filter="*">Tutti</button>
                <button class="btn btn-outline-light" style="background-color: #ff5e14;" data-filter=".facebook">Facebook</button>
                <button class="btn btn-outline-light" style="background-color: #ff5e14;" data-filter=".twitter">Twitter / X</button>
                <button class="btn btn-outline-light" style="background-color: #ff5e14;" data-filter=".linkedin">Linkedin</button>
                <button class="btn btn-outline-light" style="background-color: #ff5e14;" data-filter=".youtube">Youtube</button>
            </div>

            <div class="grid gap-3">
                <div class="col col-sm-12 col-md-6 col-lg-4 p-2 g-col-6 facebook">
                    <div class="card">
                        <a href="#" class="">
                            <img class="card-img-top w-100 d-block fit-cover" style="height: 250px;" src="assets/img/servizi/social/facebook-post.png" alt="Facebook">
                        </a>
                        <div class="card-body p-4">
                            <h4 class="card-title">Seguici su Facebook</h4>
                            <p class="card-text">

                            </p>
                        </div>
                    </div>
                </div>

                <div class="col col-sm-12 col-md-6 col-lg-4 p-2 g-col-6 twitter">
                    <div class="card">
                        <a href="#" class="">
                            <img class="card-img-top w-100 d-block fit-cover " style="height: 250px;" src="assets/img/servizi/social/twitter-post.jpg" alt="Twitter / X">
                        </a>
                        <div class="card-body p-4">
                            <h4 class="card-title">Vieni a trovarci su Twitter / X</h4>
                            <p class="card-text">

                            </p>
                        </div>
                    </div>
                </div>

                <div class="col col-sm-12 col-md-6 col-lg-4 p-2 g-col-6 linkedin">
                    <div class="card">
                        <a href="#" class="">
                            <img class="card-img-top w-100 d-block fit-cover " style="height: 250px;" src="assets/img/servizi/social/linkedin_post.png" alt="Linkedin">
                        </a>
                        <div class="card-body p-4">
                            <h4 class="card-title">Seguici su Linkedin</h4>
                            <p class="card-text">

                            </p>
                        </div>
                    </div>
                </div>

                <div class="col col-sm-12 col-md-6 col-lg-4 p-2 g-col-6 youtube">
                    <div class="card">
                        <a href="#" class="">
                            <img class="card-img-top w-100 d-block fit-cover " style="height: 250px;" src="assets/img/servizi/social/youtube_frame.png" alt="Youtube">
                        </a>
                        <div class="card-body p-4">
                            <h4 class="card-title">Guarda i nostri video</h4>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

</main>

<?php
include("inc/footer.php");
include("inc/scripts.php");
?>