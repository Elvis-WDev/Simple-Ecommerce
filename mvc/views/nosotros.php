<link rel="stylesheet" href="../../assets/css/general/style_home.css">
<link rel="stylesheet" href="../../assets/css/font_icons/all.min.css">
<link rel="stylesheet" href="../../assets/css/fields_design/style_fields_design.css">
<link rel="stylesheet" href="../../assets/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="../../assets/css/general/styles_nosotros.css">
<link rel="stylesheet" href="../../assets/css/general/style_home.css">
<?php

include("header_Web/header.php");

?>

<section class="section_nosotros">

    <div>
        <h1>Presentación</h1>
        <p class="text_intro_nosotros_page">
            Somos un negocio que se encuentra ubicado en santa Rosa, El Oro.
            Hemos estado vendiendo y entregado ropa al mejor precio del mercado
            y con la mejor calidad, desde hace 4 años, poco a poco hemos
            expandiendonos a ser muy conocidos no solo en la ciudad de santa rosa.
            <br><br>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae rem fuga
            , nulla esse obcaecati officiis ad neque aperiam at voluptatibus
            necessitatibus dolore ducimus atque! Quae quaerat cupiditate commodi
            reprehenderit laudantium!
        </p>
        <div class="img_nosotros">
            <img src="../../assets/img/testfullres.jpeg" alt="img.png">
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.link_header_button').click(function() {
            value_link = $(this).attr('data-value');
            console.log(value_link);
            if (value_link == 1) {
                window.location.href = "home";
            }
        });
    });
</script>