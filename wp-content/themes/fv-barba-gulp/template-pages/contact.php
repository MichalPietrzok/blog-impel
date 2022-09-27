<?php /* Template Name: Contact */
get_header();
?>

<?php 
$tytul_strony = get_field( "tytul_strony" );

$title_1_kolumna = get_field( "title_1_kolumna" );
$telefon_1 = get_field( "telefon_1" );
$email = get_field( "email" );
$telefon_2 = get_field( "telefon_2" );
$fax = get_field( "fax" );

$title_kolumna_2 = get_field( "title_kolumna_2" );
$adres_1 = get_field( "adres_1" );
$adres_2 = get_field( "adres_2" );
$adres_3 = get_field( "adres_3" );

$title_kolumna_3 = get_field( "title_kolumna_3" );
$imie_i_nazwisko = get_field( "imie_i_nazwisko" );
$telefon_3 = get_field( "telefon_3" );
$email_2 = get_field( "email_2" );
?>
<div class="main-info" data-barba="container"  data-barba-namespace="contact">
  <section class="contact">
    <div class="contact__container container container--medium">
      <h1 class="contact__title">Kontakt</h1>
      <div class="contact__wrap row">
        <div class="contact__box col-12 col-lg-6 col-xl-3">
          <h2 class="contact__subtitle"><?php echo $tytul_strony; ?></h2>
        </div>
        <div class="contact__box contact__box--info col-12 col-lg-6 col-xl-3">
          <h3 class="contact__box-title"><?php echo $title_1_kolumna; ?></h3>
          <dl class="contact__box-dl">
            <dt class="contact__box-dt"><?php if( $telefon_1 ) { echo "Tel:";} ?></dt>
            <dd class="contact__box-dd"><a class="contact__box-link" href="tel:<?php echo $telefon_1; ?>"><?php echo $telefon_1; ?></a></dd>
            <dt class="contact__box-dt"><?php if( $email ) { echo "E-mail:";} ?></dt>
            <dd class="contact__box-dd"><a class="contact__box-link" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></dd>
            <dt class="contact__box-dt"><br class="d-none d-xl-block"><?php if( $telefon_2 ) { echo "Tel:";} ?></dt>
            <dd class="contact__box-dd"><a class="contact__box-link" href="tel:<?php echo $telefon_2; ?>"><?php echo $telefon_2; ?></a></dd>
            <dt class="contact__box-dt"><br class="d-none d-xl-block"><?php if( $fax ) { echo "Fax:";} ?></dt>
            <dd class="contact__box-dd"><a class="contact__box-link" href="tel:<?php echo $fax; ?>"><?php echo $fax; ?></a></dd>
          </dl>
        </div>
        <div class="contact__box contact__box--info col-12 col-lg-6 col-xl-2">
          <h3 class="contact__box-title"><?php echo $title_kolumna_2; ?></h3>
          <ul class="contact__box-list">
            <li class="contact__box-item"><?php echo $adres_1; ?></li>
            <li class="contact__box-item"><?php echo $adres_2; ?></li>
            <li class="contact__box-item"><?php echo $adres_3; ?></li>
          </ul>
        </div>
        <div class="contact__box contact__box--info col-12 col-lg-6 col-xl-4">
          <h3 class="contact__box-title"><?php echo $title_kolumna_3; ?></h3>
          <dl class="contact__box-dl">
            <dt class="contact__box-dt"><?php echo $imie_i_nazwisko; ?></dt>
            <dd class="contact__box-dd"></dd>
            <dt class="contact__box-dt"><?php if( $telefon_3 ) { echo "Tel:";} ?></dt>
            <dd class="contact__box-dd"><a class="contact__box-link" href="tel:<?php echo $telefon_3; ?>"><?php echo $telefon_3; ?></a></dd>
            <dt class="contact__box-dt"><?php if( $email_2 ) { echo "E-mail:";} ?></dt>
            <dd class="contact__box-dd"><a class="contact__box-link" href="mailto:<?php echo $email_2; ?>"><?php echo $email_2; ?></a></dd>
          </dl>
        </div>
      </div>
    </div>
    <div class="contact__map">
      <iframe 
        class="contact__map-iframe"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2037.8254326080687!2d17.02286145630831!3d51.0823054405333!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470fc2454518a4a5%3A0xfc488742390bb24a!2sImpel%20S.A.!5e0!3m2!1spl!2spl!4v1603225272801!5m2!1spl!2spl"
        height="366"
        frameborder="0"
        style="border:0;"
        allowfullscreen=""
        aria-hidden="false"
        tabindex="0">
      </iframe>
    </div>
  </section>
</div>

<?php get_footer(); ?>
