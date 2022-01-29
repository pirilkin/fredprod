<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=gejinsjm_jivica', 'gejinsjm_jivica', 'Kojzgsf123');
$sql = "SELECT * FROM jivicasite WHERE id = (SELECT MAX(id) FROM jivicasite)";
// $sql = "SELECT * FROM jivicatable WHERE id";
$query = $pdo->prepare($sql);
$query->execute();
$array = $query->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Живиця</title>
    <link rel="stylesheet" href="./libs/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="./libs/css/bootstrap-grid.min.css">
    <link href="libs/css/font-awesome.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="css/style.min.css">
    
<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '376977196905588');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=376977196905588&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
    
</head>

<body>
    <section class="contacts contacts-call">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                <?php if(isset($_SESSION['sent'])): ?>
                    <h2 class="contacts-call-title title-blue">Спасибо!</h2>
                    <h3 class="contacts-call-subtitle">Ваш заказ <span class="title-blue">№
                         <?php 
                         echo array_shift(array_slice($array, 0, 1)); 
                         ?>
                    </span> 
                    <?php echo $_SESSION['sent']; unset($_SESSION['sent']); ?>
                    </h3>
                    
                    <p class="contacts-call-content">
                        В течении нескольких минут по указанному номеру<br>
                        с вами свяжется специалист поддержки,<br>
                        проконсультирует по возникшим вопросам<br>
                        и поможет оформить доставку.<br>
                        Ожидайте в течении 15 минут, если менеджер<br>
                        не успеет вам позвонить то вы получите<br>
                        <span class="title-blue">скидку 25 грн.</span><br>
                        Ожидайте и подготовьте телефон.
                    </p>
                <?php endif; ?>
                <?php if(isset($_SESSION['notsent'])): ?>
                    <h2 class="contacts-call-title title-blue">К сожалению Ваше письмо не отправлено</h2>
                    <h3 class="contacts-call-subtitle"><?php echo $_SESSION['notsent']; unset($_SESSION['notsent']); ?></h3>

                <?php endif; ?>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-9 col-sm-12 col-12">
                    <h4 class="contacts-title">Контакты</h4>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2540.6908947271586!2d30.525282315731257!3d50.446857979474885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4ce538be3ed85%3A0xe9612d2e8da0158e!2z0YPQuy4g0JDRgNGF0LjRgtC10LrRgtC-0YDQsCDQk9C-0YDQvtC00LXRhtC60L7Qs9C-LCAxNy8xLCDQmtC40LXQsiwg0KPQutGA0LDQuNC90LAsIDAyMDAw!5e0!3m2!1sru!2s!4v1604941725782!5m2!1sru!2s"
                        frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

                    <div class="contacts-items">
                        <div class="contacts-img">
                            <img src="img/footer-img-2_06.png" alt="">
                        </div>
                        <div class="contacts-item">
                            <div class="contacts-items-mail">
                                <h5 class="contacts-subtitle">Почта</h5>
                                <a href="mazidlyaludey@priroda.ua">mazidlyaludey@priroda.ua</a>
                                <a href="tel:+380668943274"><i class="fa fa-phone-square"></i> + 38 066 894 32 74</a>
                            </div>
                            <div class="contacts-items-social">
                                <h5 class="contacts-subtitle">Мы в социальных сетях</h5>
                                <div class="contacts-items-social-links">
                                    <a href=""><img src="img/footer-social_07.png" alt=""></a>
                                    <a href=""><img src="img/footer-social_08.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xl-4 col-lg-4 col-md-3 contacts-man contacts-call-man">
                    <img class="contacts-call-pot" src="img/call-pot_03.png" alt="">
                    <img src="img/call-man_03.png" alt="">
                </div>
            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-12 footer-items">
                    <img src="img/footer-logo_07.png" alt="">
                </div>
                <div class="col-xl-8 col-lg-8 col-md-6 col-sm-6 col-12 footer-items">
                    <div class="">
                        <a class="footer-policity" href="">Политика конфиденциальности</a>
                        <p class="footer-rights">2020 © Все права защищены.</p>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-12 footer-items footer-social">
                    <a href=""><img src="img/footer-social_07.png" alt=""></a>
                    <a href=""><img src="img/footer-social_08.png" alt=""></a>
                </div>
            </div>
        </div>
    </footer>





    <script src="libs/js/jquery.min.js"></script>
    <script src="libs/js/jquery.maskedinput.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>