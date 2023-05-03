<?php
  include_once ('connection/connection.php');
?>
<!doctype html>
<html lang="pt-br">
<head>
<?php
  
  $seleciona = "SELECT * FROM seo";
    $consulta = $conexao -> prepare($seleciona);
    $consulta -> execute();

      if(($consulta) AND ($consulta -> rowCount () != 0)){
          while($registo = $consulta -> fetch(PDO::FETCH_ASSOC)){

            $tituloSeo = $registo['titulo'];
            $descricaoSeo = $registo['descricao'];
            $palavrasSeo = $registo['palavras_chave'];

          }
      }

?>

  <title><?= $tituloSeo ?></title>
  <meta charset="UTF-8">
  <meta name="viewport"              content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description"           content="<?= $descricaoSeo ?>"/>
  <meta name="keywords"              content="<?= $palavrasSeo ?>"/>
  <meta name="robots"                content="index, follow" />
  <meta name="author"              content="W1 Agência / dev: Felipe Gonçalves - jobs.felipegoncalves@gmail.com"/>


  <meta property="og:locale"       content="pt_BR">
  <meta property="og:site_name"    content="Ouro Verde">
  <meta property="og:url"          content="<?= BASE ?>" />
  <meta property="og:type"         content="website" />
  <meta property="og:title"        content="<?= $tituloSeo ?>" />
  <meta property="og:description"  content="<?= $descricaoSeo ?>" />
  <meta property="og:image"        content="<?= BASE_IMG ?>marcas/logo-fatcred.png" />


  <link rel="canonical" href="<?= BASE ?>">
  <link rel="icon" href="<?= BASE_IMG ?>marcas/favicon.png">
  <link rel="stylesheet" href="<?= BASE_CSS ?>bootstrap.min.css">
  <link rel="stylesheet" href="<?= BASE_CSS ?>global.min.css">  
  <link rel="stylesheet" href="<?= BASE_CSS ?>fg.min.css">  
  <!-- <link rel="stylesheet" href="<?= BASE_CSS ?>estilo.responsivo.min.css"> -->
  <link rel="stylesheet" href="<?= BASE_CSS ?>owl.carousel.min.css">




</head>
<body id = "pagina-inicial">

  <!-- Header -->
  <?php require "components/header.php"; ?>

      <!-- body -->
          <!-- === Apresentação === -->
          <section id = "apresentacao" class = "">
            <div class="owl-carousel owl-theme">

  <?php
        $seleciona = "SELECT * FROM destaques WHERE status = 'publicado' ";
        $consulta = $conexao -> prepare($seleciona);
        $consulta -> execute();

          if(($consulta) AND ($consulta -> rowCount () != 0)){

              while($registo = $consulta -> fetch(PDO::FETCH_ASSOC)){
  ?>
              <div class="item m-auto">
                        <div class="container-fluid  pb-5 pt-5" style = "background-color: <?= $registo['img_fundo'] ?>;">
                          <div class="row mt-5 mb-5 pt-5 pb-5" >
                            <div class="col-12 col-sm-2 col--lg-2"></div>
                            <div class="col-12 col-sm-4 col-lg-4 d-flex">   
                              <div class="adfox  align-self-center">
                                <h1 class="display-3 negrito branco">
                                  <?= $registo['titulo'] ?>
                                </h1>
                                <p class = "mt-4">
                                  <a href="<?= $registo['link_botao'] ?>" class = "botao botao-grande f-20" style = "color: fff; background-color: <?= $registo['cor_botao'] ?>;"><?= $registo['texto_botao'] ?></a>
                                </p> 
                              </div>                 
                            </div>

                            <div class="col-12 col-sm-4 col-lg-4 d-flex">
                                <img  src = "<?= BASE ?>gm/img/slide/<?= $registo['img'] ?>" class = "d-flex align-self-center img-fluid"/>
                            </div>
                            <div class="col-12 col-sm-2 col-lg-2"></div>
                          </div>
                        </div>
              </div>
<?php }} ?>
            </div>                                
            <div class = " owl-theme MB-5">
              <div class="owl-controls"><div class="custom-nav owl-nav"></div></div>
            </div>
          </section>


<!-- quem somos -------->
<section>
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12 col-lg-12 mb-3 pt-5 pb-5">
          
          <div class="row">
            <div class="col-12 col-sm-12">
              <h1 class="negrito mb-3">
                Quem somos?
              </h1>

              <p>
                Fundada há mais de 25 anos a Ouro Verde Guindastes,  na direção do Sr Lademar, sempre com bom atendimento e atendimento rápido, tem se posicionado neste mercado, de maneira sólida e promissora, tendo suas parcerias firmada com clientes e assim, mantendo a liderança na região da Grandourados.
              </p>
            </div>
          </div>

          <div class="row">
            <div class="col-12 col-sm-6 col-lg-6">
              <h1 class="negrito mb-3">
                Missão
              </h1>

              <p>
                Nossa principal missão é suprir as necessidades do mercado em foco, dentro da nossa área de atuação, zelando pela qualidade de vida da nossa equipe e aprimoramento constante; tendo como alicerce a experiência e tradição.
              </p>
            </div>

            <div class="col-12 col-sm-6 col-lg-6">
              <h1 class="negrito mb-3">
                Valores
              </h1>

              <p>
                -Manter nossos métodos e visão de trabalho.<br>
                -Valorizar nossa equipe de colaboradores.<br>
                -Manter parceria com nossos clientes e fornecedores.<br>
                -Investir em produtos que resultem qualidade e crescimento.<br>
                -Manter nossa marca, tornando-a cada vez mais conhecida como líder de mercado.
              </p>
            </div>
          </div>

      </div>
    </div>
  </div>
</section>


<!-- serviços -->
<section>
  <div class="container">
    <div class="row">
      <div class="col">
        <h1 class="negrito">
          Nossos serviços
        </h1>
      </div>
    </div>

    <div class="row">
      <div class="col-12 col-sm-4 col-lg-4 text-center mb-4">
        <img src="" class="img-fluid">
        <br>
        <h5>SERVIÇOS DE GUINDASTE</h5>
      </div>
      <div class="col-12 col-sm-4 col-lg-4 text-center mb-4">
        <img src="" class="img-fluid">
        <br>
        <h5>SERVIÇOS DE MUNCK</h5>
      </div>
      <div class="col-12 col-sm-4 col-lg-4 text-center mb-4">
        <img src="" class="img-fluid">
        <br>
        <h5>LOCAÇÃO E REMOÇÃO</h5>
      </div>
    </div>
  </div>

</section>


<!-- serviços -->
<section>
  <div class="container">
    <div class="row">
      <div class="col">
        <h1 class="negrito">
          Portfólio de serviços
        </h1>
      </div>
    </div>

    <div class="row">
      <div class="col-12 col-sm-4 col-lg-4 text-center mb-4">
        <img src="" class="img-fluid">
        <br>
        <h5>REMOÇÃO DE ÁRVORES</h5>
      </div>
      <div class="col-12 col-sm-4 col-lg-4 text-center mb-4">
        <img src="" class="img-fluid">
        <br>
        <h5>INSTALAÇÃO DE PLACAS</h5>
      </div>
      <div class="col-12 col-sm-4 col-lg-4 text-center mb-4">
        <img src="" class="img-fluid">
        <br>
        <h5>INSTALAÇÃO DE POSTES</h5>
      </div>
    </div>
  </div>
</section>

<!-- whatsapp -->
<section>
  <div class="container">

    <div class="row">
      <div class="col-12 col-sm-4 col-lg-4 text-center mb-4">
        <img src="" class="img-fluid">
      </div>

      <div class="col-12 col-sm-4 col-lg-4 text-center mb-4">
        <img src="" class="img-fluid">
        <br>
        <h5>INSTALAÇÃO DE PLACAS</h5>
      </div>

      <div class="col-12 col-sm-4 col-lg-4 text-center mb-4">
        <img src="" class="img-fluid">
        <br>
        <h5>INSTALAÇÃO DE POSTES</h5>
      </div>
    </div>
  </div>
</section>


      <!-- body - fim -->

  <!-- Footer -->
  <?php require "components/footer.php"; ?>

  <script src="<?= BASE_JS ?>jquery.min.js"></script>
  <script src="<?= BASE_JS ?>popper.min.js"></script>
  <script src="<?= BASE_JS ?>owl.carousel.min.js"></script>
  <script src="<?= BASE_JS ?>bootstrap.min.js"></script>
  <script src="<?= BASE_JS ?>jquery.mask.min.js"></script>
    <script src="<?= BASE_JS ?>jquery.mask.min.js"></script>
  <script>
    jQuery(function () {

      jQuery(window).scroll(function () {
        var height = $('header').outerHeight(true);
        if (jQuery(this).scrollTop() > 0) {
         $("#header-espaco").addClass("header-espaco");
         $("header").addClass("header-fixo");
        } else {
         $("#header-espaco").removeClass("header-espaco");
         $("header").removeClass("header-fixo");
        }
      });



      $("#fone").mask("(99) 9 9999-9999");

      $('#formularioHome').submit(function(){
        $.ajax({
           url: 'app/index.form.php',
           type: 'POST',
           data: $('#formularioHome').serialize(),
           success: function(data){
                $('#repostas').html(data);
                $("#repostas").show('fast');
              setTimeout(function(){
                $('#repostas').html(data);
                $("#repostas").hide('show');
              }, 10000);
               //$('#repostas').html(data); 3000
           }
        });
        return false;
      });



    $('#apresentacao .owl-carousel').owlCarousel({
          loop:true,
          nav:true,
          navText:[
            '<img src="<?= BASE_IMG ?>extra/previous.png" alt="Seta esquerda" class="img-fluid" width="45">',
            '<img src="<?= BASE_IMG ?>extra/next.png" alt="Seta direita" class="img-fluid"  width="45">'
            ],
          responsive:{
              0:{
                  items: 1
              },

              375:{
                  items: 1
              },

              500:{
                  items:1
              },

              600:{
                  items:1
              },

              1000:{
                  items:1
              }
          }
      });


    $('#depoimento .owl-carousel').owlCarousel({
          loop:true,
          nav:true,
          navText:[
            '<img src="<?= BASE_IMG ?>extra/previous.png" alt="Seta esquerda" class="img-fluid" width="45">',
            '<img src="<?= BASE_IMG ?>extra/next.png" alt="Seta direita" class="img-fluid"  width="45">'
            ],
          responsive:{
              0:{
                  items: 1
              },

              375:{
                  items: 1
              },

              500:{
                  items:1
              },

              600:{
                  items:1
              },

              1000:{
                  items:1
              }
          }
      });

    });
  </script>

</body>
</html>
