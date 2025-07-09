<?php
$title = "Error 404"; 
include("inc/head.php");
include("inc/header.php");
?>
<section class="main-section pb-4">
     <img width="100%" height="500px" src="assets/img/error/error404.gif" class="opacity-50 header-img" alt="" />

     <div class="overlay">
          <div class="inner">
               <h1 class="title text-white text-decoration-none">Error 404</h1>
               <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a class="text-white text-decoration-none" href="index.php">Home</a></li>
                         <li class="breadcrumb-item text-white text-decoration-none"><span>Error 404</span></li>
                    </ol>
               </nav>
          </div>

     </div>
</section>

<main>
     <section class="pb-3">
          <div class="container text-center">
               <h1 class="wow bounceInDown" data-wow-delay="2s" data-wow-duration="1s">Mi dispiace ma la pagina non e stata trovata</h1>
               <p class="wow bounceInDown" data-wow-delay="2s" data-wow-duration="1.5s">Ci stiamo impegnado per trovarla</p>
               <p class="wow bounceInDwon" data-wow-delay="2s" data-wow-duration="2s">Per ritornare alla home clicca questo bottone</p>
               <a href="index.php" class="btn btn-outline-light wow bounceInDown" data-wow-delay="2s" data-wow-duration="2.5s" style="background-color: #ff5e14;">Ritorno Home Page</a>
          </div>
     </section>
</main>

<?php
include("inc/footer.php");
include("inc/scripts.php");
?>