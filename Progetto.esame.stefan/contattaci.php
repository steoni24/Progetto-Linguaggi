<?php
include("conf/conn.php");
include("inc/chiavi.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$responseContact = "";

if (isset($_POST['email'])) {
    if (isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && isset($_POST['fred']) && $_POST['fred'] == "" && isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response'] != "") {
        $captcha = $_POST['g-recaptcha-response'];
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array('secret' => Config::GOOGLE_RECAPTCHA_SECRET_KEY, 'response' => $captcha);
        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        $responseKeys = json_decode($response, true);
        if ($responseKeys["success"]) {
            $cognome = trim(htmlspecialchars(stripcslashes($_POST['cognome'])));
            $nome = trim(htmlspecialchars(stripcslashes($_POST['nome'])));
            $indirizzo = trim(htmlspecialchars(stripcslashes($_POST['indirizzo'])));
            $email = trim(htmlspecialchars(stripcslashes($_POST['email'])));
            $messaggio = trim(htmlspecialchars(stripcslashes($_POST['messaggio'])));

            $destinatario = $email;

            $fromEmail = $email;
            $fromNameEmail = trim(stripslashes($nome));
            $subject = "Richiesta Conttattaci dal sito web ITA";


            $request = '
               <strong>Cognome:</strong> ' . $cognome . '<br />
               <strong>Nome:</strong> ' . $nome . '<br />
               <strong>Indirizzo:</strong> ' . $indirizzo . '<br />
               <strong>Email:</strong> <a href="mailto:' . $email . '">' . $email . '</a><br />
               <strong>Messaggio:</strong> ' . $messaggio . '';


            $sql = "INSERT INTO mail_ricevute (nome, cognome, indirizzo, email, messaggio) VALUES ('$nome', '$cognome', '$indirizzo', '$email', '$messaggio')";

            if ($conn->query($sql) === TRUE) {
                $responseContact .= '<div class="alert alert-success" role="alert"
                            <h4 class="alert-heading">Molto Bene!</h4>
                            <p>Record Inserito dentro la casella di posta</p>
                            </div>';
            } else {
                $responseContact .= '<div class="alert alert-danger" role="alert"
                            <h4 class="alert-heading">Ops qualcosa e andato storto...</h4>
                            <p>Error: ' . $sql . '<br>' . $conn->error . '</p>
                            </div>';
            }
        }
    }
}


$title = "Contattaci";
include("inc/head.php");
include("inc/header.php");
?>


<section class="main-section pb-4">
    <img width="1920px" height="500px" src="assets/img/contattaci.jpg" class="opacity-50 header-img" alt="" />

    <div class="overlay">
        <div class="inner">
            <h1 class="title text-white text-decoration-none">Contattaci</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white text-decoration-none" href="index.php">Home</a>
                    </li>
                    <li class="breadcrumb-item text-white text-decoration-none"><span>Contattaci</span></li>
                </ol>
            </nav>
        </div>
    </div>

</section>

<main>
    <section class="pb-3 wow fadeInDown">
        <div class="container">
            <h2 class="section-title">Benvenuto questa e la pagina in cui puoi contattarci direttamente</h2>
            <!-- <h3 class="section-subtitle">Home</h3> -->
            <p class="section-description">
                Come anticipato questa e la pagina dove e entri in contatto direttamente con noi attraverso la nostra mail aziendale
            </p>
        </div>
    </section>


    <section class="pb-3">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 align-content-center justify-content-center">
                <div class="col-auto wow bounceInLeft" data-wow-duration="2s" data-wow-delay="1s">
                    <div class="container">
                        <h3>Vuoi dare una mano?</h3>
                        <p> Se sei qui per dare una mano, ti ringraziamo per il tuo spirito di altruismo. Insieme,
                            possiamo fare la differenza.</p>

                        <h3>Unisciti a noi oggi</h3>
                        <p>Unisciti a noi oggi e diventa parte della soluzione.</p>
                        <form id="contact_form" name="contact_form" action="" method="post">
                            <?php
                            if (!empty($request)) {
                                echo $responseContact;
                            }
                            ?>

                            <div class="mb-3">
                                <label for="cognome" class="form-label">Cognome</label>
                                <input type="text" class="form-control" id="cognome" name="cognome">
                            </div>

                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome">
                            </div>

                            <div class="mb-3">
                                <label for="indirizzo" class="form-label">Indirizzo Completo</label>
                                <input type="text" class="form-control" id="indirizzo" name="indirizzo" placeholder="Via, nome località, n*civico, provincia">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>

                            <div class="mb-3">
                                <label for="messaggio" class="form-label">Messaggio</label>
                                <textarea class="form-control" name="messaggio" id="messaggio" name="messaggio"></textarea>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="privacy" name="privacy" value="1">
                                    <label class="form-check-label" for="privacy">
                                        Acconsento il trattamento dei dati nel rispetto delle normative europee vigenti
                                        per la privacy
                                        (GDPR 679/2016).
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <input type="hidden" name="fred" value="" />
                            </div>

                            <div class="mb-3">
                                <button type="button" class="btn btn-primary buttonInvioModulo" onclick="sendContactUsForm();">Invia Messaggio</button>
                            </div>

                        </form>
                    </div>
                </div>

                <div class="col-auto order-first order-md-last wow bounceInRight" data-wow-duration="2s" data-wow-delay="1s">
                    <div class="container rounded w-75 h-100">
                        <video width="100%" height="100%" preload="true" autoplay loop muted playsinline>
                            <source src="assets/video/contattaci7.mp4" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="pb-3">

        <div class="container">
            <div class="d-flex justify-content-center wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.5s">
                <h1 class="">Cosa dicono di noi</h1>
            </div>

            <div class="d-flex justify-content-center p-4 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.5s">
                <p class="text-center">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit amet luctus
                    velit. Mauris ultrices auctor tellus eu convallis. Nunc vehicula tempus risus, lobortis egestas.
                </p>
            </div>

            <div class="row">
                <div class="col-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                    <div id="owl-contattaci" class="owl-carousel">

                        <div class="item active">
                            <div class="card text-center">
                                <div class="d-flex justify-content-center pb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-person-circle d-flex justify-content-center" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                    </svg>
                                </div>
                                <div class="card-body ">
                                    <h5 class="card-title">Recensione 1</h5>
                                    <p class="card-text">Questa è una recensione esemplare.</p>
                                    <div class="rating">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="card text-center">
                                <div class="d-flex justify-content-center pb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-person-circle d-flex justify-content-center" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                    </svg>
                                </div>
                                <div class="card-body ">
                                    <h5 class="card-title">Recensione 2</h5>
                                    <p class="card-text">Questa è una recensione esemplare.</p>
                                    <div class="rating">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="card text-center">
                                <div class="d-flex justify-content-center pb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-person-circle d-flex justify-content-center" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                    </svg>
                                </div>
                                <div class="card-body ">
                                    <h5 class="card-title">Recensione 3</h5>
                                    <p class="card-text">Questa è una recensione esemplare.</p>
                                    <div class="rating">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="card text-center">
                                <div class="d-flex justify-content-center pb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-person-circle d-flex justify-content-center" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                    </svg>
                                </div>
                                <div class="card-body ">
                                    <h5 class="card-title">Recensione 4</h5>
                                    <p class="card-text">Questa è una recensione esemplare.</p>
                                    <div class="rating">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="card text-center">
                                <div class="d-flex justify-content-center pb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-person-circle d-flex justify-content-center" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                    </svg>
                                </div>
                                <div class="card-body ">
                                    <h5 class="card-title">Recensione 5</h5>
                                    <p class="card-text">Questa è una recensione esemplare.</p>
                                    <div class="rating">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="card text-center">
                                <div class="d-flex justify-content-center pb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-person-circle d-flex justify-content-center" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                    </svg>
                                </div>
                                <div class="card-body ">
                                    <h5 class="card-title">Recensione 6</h5>
                                    <p class="card-text">Questa è una recensione esemplare.</p>
                                    <div class="rating">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="card text-center">
                                <div class="d-flex justify-content-center pb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-person-circle d-flex justify-content-center" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                    </svg>
                                </div>
                                <div class="card-body ">
                                    <h5 class="card-title">Recensione 7</h5>
                                    <p class="card-text">Questa è una recensione esemplare.</p>
                                    <div class="rating">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="card text-center">
                                <div class="d-flex justify-content-center pb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-person-circle d-flex justify-content-center" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                    </svg>
                                </div>
                                <div class="card-body ">
                                    <h5 class="card-title">Recensione 8</h5>
                                    <p class="card-text">Questa è una recensione esemplare.</p>
                                    <div class="rating">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main>
<script src="https://www.google.com/recaptcha/api.js?render=<?php echo Config::GOOGLE_RECAPTCHA_SITE_KEY; ?>"></script>
<script type="text/javascript">
    function sendContactUsForm() {
        var ok = true;
        var F = eval("document.contact_form");

        if (ok == true) {
            var cognome = F.cognome.value;
            if (cognome == "") {
                alert("<?php echo html_entity_decode("Cognome obbligatorio", ENT_QUOTES, 'UTF-8'); ?>");
                F.cognome.focus();
                ok = false;
            }
        }

        if (ok == true) {
            var nome = F.nome.value;
            if (nome == "") {
                alert("<?php echo html_entity_decode("Nome obbligatorio", ENT_QUOTES, 'UTF-8'); ?>");
                F.nome.focus();
                ok = false;
            }
        }

        if (ok == true) {
            var indirizzo = F.indirizzo.value;
            if (indirizzo == "") {
                alert("<?php echo html_entity_decode("Indirizzo obbligatorio", ENT_QUOTES, 'UTF-8'); ?>");
                F.indirizzo.focus();
                ok = false;
            }
        }

        if (ok == true) {
            var email = F.email.value;
            if (email == "") {
                alert("<?php echo html_entity_decode("Email obbligatoria", ENT_QUOTES, 'UTF-8'); ?>");
                F.email.focus();
                ok = false;
            }
        }

        var regExp = new RegExp("^([0-9a-zA-Z_]([-\\.\\w]*[0-9a-zA-Z_])*@([0-9a-zA-Z][-\\w]*[0-9a-zA-Z]\\.)+[a-zA-Z]{2,9})$");
        if (ok == true) {
            var email = F.email.value;
            if (!email.match(regExp)) {
                alert("<?php echo html_entity_decode("Formato Email Sbagliato", ENT_QUOTES, 'UTF-8'); ?>");
                F.email.focus();
                ok = false;
            }
        }

        if (ok == true) {
            var messaggio = F.messaggio.value;
            if (messaggio == "") {
                alert("<?php echo html_entity_decode("Messaggio obbligatorio", ENT_QUOTES, 'UTF-8'); ?>");
                F.messaggio.focus();
                ok = false;
            }
        }

        if (ok == true) {
            if ($("input[name='privacy']:checked").val() != '1') {
                alert("<?php echo html_entity_decode("Bisogna accettare i termini per la privacy per proseguire", ENT_QUOTES, 'UTF-8'); ?>");
                ok = false;
            }
        }

        if (ok == true) {
            // nascondo il tasto per evitare che venga inviato più volte il form
            $('.buttonInvioModulo').hide();
            grecaptcha.ready(function() {
                grecaptcha.execute('<?php echo Config::GOOGLE_RECAPTCHA_SITE_KEY; ?>', {
                    action: 'contact_form'
                }).then(function(token) {
                    $('#contact_form').append('<input type="hidden" name="g-recaptcha-response" value="' + token + '">');
                    $('#contact_form').submit();
                });
            });
        }

        return false;
    }
</script>
<?php
include("inc/footer.php");
include("inc/scripts.php");
?>