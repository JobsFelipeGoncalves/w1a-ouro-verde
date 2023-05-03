
<!doctype html>
<html lang="pt-br">
<head>

  <title>Trabalhe conosco - Fatcred Empréstimos e Financiamentos</title>
  <meta charset="UTF-8">
  <meta name="viewport"              content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description"           content="Faça parte a equipe da Fatcred Empréstimos e Financiamentos"/>
  <meta name="keywords"              content=" index, MS, mato grosso do sul"/>
  <meta name="robots"                content="index, follow" />
  <meta name="author"              content="W1 Agência / dev: Felipe Gonçalves - jobs.felipegoncalves@gmail.com"/>


  <meta property="og:locale"       content="pt_BR">
  <meta property="og:site_name"    content="Fatcred">
  <meta property="og:url"          content="<?= BASE ?>" />
  <meta property="og:type"         content="website" />
  <meta property="og:title"        content="Fatcred Empréstimos e Financiamentos" />
  <meta property="og:description"  content="Faça parte a equipe da Fatcred Empréstimos e Financiamentos" />
  <meta property="og:image"        content="<?= BASE_IMG ?>marcas/logo-fatcred.png" />


  <link rel="canonical" href="<?= BASE ?>">
  <link rel="icon" href="<?= BASE_IMG ?>marcas/logo_icone.png">
  <link rel="stylesheet" href="<?= BASE_CSS ?>bootstrap.min.css">
  <link rel="stylesheet" href="<?= BASE_CSS ?>fg.min.css">  
  <link rel="stylesheet" href="<?= BASE_CSS ?>estilo.responsivo.min.css">




</head>
<body id = "pagina-inicial">

  <!-- Header -->
  <?php require "components/header.php"; ?>

      <!-- body -->
<!--         <div style = 'width: 100%;
                      height: 100vh;
                      padding: 5%;
                      text-align: center;
                      background-color: #ededed;
            '>
          
          <img src='<?= BASE ?>require/img/marcas/logo_c.png' width = '200px' style = 'margin: 30px;''>
          <h1>Formulario enviado com sucesso!</h1><br>
          <p> Seu currículo já esta em nosso banco de talentos.</p><br>
          <a href = 'http://fatcred.com.br/' 
             style ='
             padding: 6px 18px;
            font-size: var(--f-14);
            color: #fff;
            background-color: #F37135;
            font-weight: 500;
            line-height: 1.5;
            text-align: center;
            text-decoration: none;
            border-radius: 6px;
            display: inline-block;
            vertical-align: middle;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
             '>Voltar a página inicial</a>
        </div>
 -->
  
          <!-- === mensagem === -->
          <section id = "mensagem" class = "pt-5 pb-5">
            <div class="container pt-5 pb-5 mb-5">
              <div class="row pt-5 mt-5">
                <div class="col-12 col-sm-12 col-lg-12 centro branco negrito">
                  <h1 class="display-5">Envie seu <b>currículo!</b></h1>

                  <p class="f-20">Junte-se a nossa equipe de profissionais.</p>
                </div>
              </div>


              <div class="row mt-5 mb-5 pt-4">
                <div class="col">
                    
                    <form id = "formularioEmprego" action="<?= BASE ?>app/empregos.form.php" method="POST" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-12 col-sm-12 col-lg-12 centro">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-11 col-sm-11 col-lg-6">
                            
                            <div class="mb-3 col-12">
                              <label for="nome" class="form-label branco">Nome completo</label>
                              <input type="text" class="form-control" name = "nome" id="nome" placeholder="Seu nome completo" required >
                            </div>

                            <div class="mb-3 col-12">
                              <label for="email" class="form-label branco">E-mail</label>
                              <input type="email" class="form-control" name = "email" id="email" placeholder="Seu e-mail" required>
                            </div>

                            <div class="mb-3 col-12">
                              <label for="fone" class="form-label branco">Telefone</label>
                              <input type="tel" class="form-control" name = "fone" id="fone" placeholder="Seu WhatsApp" required >
                            </div>

                        </div>

                        <div class="col-11 col-sm-11 col-lg-6">
                            
                            <div class="mb-3 col-12">
                              <label for="msg" class="form-label branco">Escreva sobre você</label>
                              <textarea class="form-control" name = "msg" id="msg" placeholder="Escreva sua mensagem" style = "height: 180px !important;" required></textarea>
                            </div>

                            <div class="mb-3 col-12">
                              <label for="arquivo" class="form-label branco">Seu currículo em PDF</label>
                              <input class="form-control" type="file" name = "arquivo" id="arquivo" required>
                            </div>

                        </div>
                      </div>
                      <div class="row">
                        <div class="col mt-3">
                              <input type="hidden" name="img_url" value = "<?= BASE_IMG ?>">
                              <input type="hidden" name="base_url" value = "<?= BASE ?>">
                              <input type="submit" class = "botao b-laranja botao-total" name="acao" value = "Cadastrar">
                                <!-- <button type="submit" id = "formularioEmpregoBotao" class="botao b-laranja botao-total negrito f-18 mb-3">Enviar meu contato</button> -->
                        </div>
                      </div>
                    </form>

                </div>
              </div>
            </div>
          </section>


      <!-- body - fim -->

  <!-- Footer -->
  <?php require "components/footer.php"; ?>

  <script src="<?= BASE_JS ?>jquery.min.js"></script>
  <script src="<?= BASE_JS ?>popper.min.js"></script>
  <script src="<?= BASE_JS ?>bootstrap.min.js"></script>
  <script src="<?= BASE_JS ?>jquery.mask.min.js"></script>
  <script src="<?= BASE_JS ?>jquery.mask.min.js"></script>
  <!-- <script src="<?= BASE_JS ?>empregos.form.js"></script> -->
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

      // $('#formularioHome').submit(function(){
      //   $.ajax({
      //      url: 'app/empregos.form.php',
      //      type: 'POST',
      //      async: false,
      //      cache: false,
      //      enctype: 'multipart/form-data',
      //      data: $('#formularioHome').serialize(),
      //      success: function(data){
      //           $('#repostas').html(data);
      //           $("#repostas").show('fast');
      //         setTimeout(function(){
      //           $('#repostas').html(data);
      //           $("#repostas").hide('show');
      //         }, 10000);
      //          //$('#repostas').html(data); 3000
      //      }
      //   });
      //   return false;
      // });

  
    });
  </script>

</body>
</html>
