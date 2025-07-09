<?php
include("conf/conn.php");
include("inc/chiavi.php");

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
            $email = trim(htmlspecialchars(stripcslashes($_POST['email'])));


            //$destinatario = $tmp['email'];

            //$fromEmail = $tmp['email'];
            //$fromNameEmail = trim(stripslashes($_POST['nome']));
            //$subject = "Richiesta Conttattaci dal sito web (" . $linguaSito . ")";

            $request = '
               <strong>Nome:</strong> ' . $cognome . '<br />
               <strong>Nome:</strong> ' . $nome . '<br />
               <strong>Email:</strong> <a href="mailto:' . $email . '">' . $email . '</a><br />';


            $sql = "INSERT INTO newsletter (nome, cognome, email) VALUES ('$nome', '$cognome', '$email')";
            //$sql = "INSERT INTO newsletter (email) VALUES ('$email')";

            if ($conn->query($sql) === TRUE) {
                $responseContact .= '<div class="alert alert-success" role="alert"
                            <h4 class="alert-heading">Molto Bene!</h4>
                            <p>Complimenti da oggi fai parte della nostra Newsletter!</p>
                            </div>';
            } else {
                $responseContact .= '<div class="alert alert-danger" role="alert"
                            <h4 class="alert-heading">Ops qualcosa e andato storto...</h4>
                            <p>Error: ' . $sql . '<br>' . $conn->error . '</p>
                            </div>';
            }
            echo $rersponseContact;
        }
    }
}

$title = "Newsletter";
include("inc/head.php");
include("inc/header.php");
?>

<section class="main-section pb-4">
    <img width="1920px" height="500px" src="assets/img/newsletter/envelopes.jpg" class="opacity-50 header-img" alt="" />

    <div class="overlay">
        <div class="inner">
            <h1 class="title text-white text-decoration-none">Newsletter</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white text-decoration-none" href="index.php">Home</a></li>
                    <li class="breadcrumb-item text-white text-decoration-none"><span>Newsletter</span></li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<main>
    <section class="pb-3 wow fadeInDown">
        <div class="container">
            <h2 class="section-title">Resta Informato</h2>
            <!-- <h3 class="section-subtitle">Home</h3> -->
            <p class="section-description">
                Siamo entusiasti di avere voi, i nostri preziosi abbonati, con noi. Questa pagina è il vostro portale per rimanere aggiornati su tutte le ultime notizie, gli aggiornamenti e le offerte speciali che abbiamo in serbo per voi.

                La nostra newsletter è molto più di un semplice aggiornamento; è un modo per voi di entrare a far parte della nostra comunità. Vi forniremo contenuti esclusivi, approfondimenti dietro le quinte e anche qualche sorpresa lungo il cammino!

                Per assicurarvi di non perdere nulla, assicuratevi di controllare questa pagina regolarmente. Non vediamo l’ora di condividere con voi tutto ciò che abbiamo in programma!

                Grazie per essere con noi. Non vediamo l’ora di connetterci con voi attraverso la nostra newsletter.
            </p>
        </div>
    </section>

    <section class="pb-3">
        <div class="container border rounded shadow p-3 p-md-4 p-lg-5">
            <h3 class="wow bounce" data-wow-delay="1s">Inscriviti alla Newsletter</h3>
            <p class="wow fadeInLeft" data-wow-delay="1s">Non dimenticatevi di iscriverti ai nostri nuovi feed, compila gentilmente il modulo sottostante.</p>

            <form id="newsletter" name="newsletter" class="wow fadeInDown" data-wow-delay="1s" action="" method="POST">
                <?php
                if (!empty($request)) {
                    echo $responseContact;
                }
                ?>
                <div class="mb-3">
                    <label for="cognome">Cognome</label>
                    <input type="text" class="form-control" id="cognome" name="cognome">
                </div>
                <div class="mb-3">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome">
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <input type="hidden" name="fred" value="" />
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="privacy" name="privacy" value="1">
                        <label class="form-check-label" for="privacy">
                            Acconsento il trattamento dei dati nel rispetto delle normative europee vigenti
                            per la privacy (GDPR 679/2016).
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <button type="button" onclick="sendNewsletterForm();" class="btn btn-outline-light buttonInvioModulo" style="background-color:#ff5e14;">
                        Iscriviti
                    </button>
                </div>

            </form>
        </div>
    </section>
</main>

<script>
    $(document).ready(function() {
        /*
        ################
        Add navbar background color when scrolled
        */
        $(window).scroll(function() {
            if ($(window).scrollTop() > 56) {
                $(".navbar").addClass("bg-dark");
            } else {
                $(".navbar").removeClass("bg-dark");
            }
        });

        // If Mobile, add background color when toggler is clicked
        $(".navbar-toggler").click(function() {
            if (!$(".navbar-collapse").hasClass("show")) {
                $(".navbar").addClass("bg-dark");
            } else {
                if ($(window).scrollTop() < 56) {
                    $(".navbar").removeClass("bg-dark");

                } else {

                }
            }
        });

    });
</script>

<script src="https://www.google.com/recaptcha/api.js?render=<?php echo Config::GOOGLE_RECAPTCHA_SITE_KEY; ?>"></script>
<script>
    function sendNewsletterForm() {
        var ok = true;
        var F = eval("document.newsletter");

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
            var email = F.email.value;
            if (email == "") {
                alert("Email obbligatoria", ENT_QUOTES, 'UTF-8');
                F.email.focus();
                ok = false;
            }
        }

        var regExp = new RegExp("^([0-9a-zA-Z_]([-\\.\\w]*[0-9a-zA-Z_])*@([0-9a-zA-Z][-\\w]*[0-9a-zA-Z]\\.)+[a-zA-Z]{2,9})$");
        if (ok == true) {
            var email = F.email.value;
            if (!email.match(regExp)) {
                alert("Formato Email Sbagliato", ENT_QUOTES, 'UTF-8');
                F.email.focus();
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
                    action: 'newsletter'
                }).then(function(token) {
                    $('#newsletter').append('<input type="hidden" name="g-recaptcha-response" value="' + token + '">');
                    $('#newsletter').submit();
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