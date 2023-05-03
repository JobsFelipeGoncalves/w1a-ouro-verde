<?php include_once ('config/configuracao.php'); ?>
<!doctype html>
<html lang="pt-br">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author"   content="Gerencie Mais por
                                   Felipe M. Gonçalves
                                   jobs.felipegoncalves@gmail.com"/>

    <!-- CSS -->
    <link href="<?= $URL_CSS ?>bootstrap.min.css" rel="stylesheet">    
    <link href="<?= $URL_CSS ?>fg.min.css" rel="stylesheet">

    <title>Bem-vindo ao Gerencie mais</title>
  </head>
  <body class = "f-branco">

    <!-- carregando recursos -->    
    <div class="container pt-5 pb-5 mt-5 mb-5">
        <div class="row m-auto">
            <div class="col-12 col-sm-12 col-md-12 centro ">

              <img src="<?= $URL_IMG ?>marcas/gerencie_mais/gerencie_mais.png" alt="" class = "img-fluid pb-4" width = "280px">
              <br>
              <h5>Quase lá... Aguarde!</h5>
              <div class="spinner-grow text-danger mt-5" role="status"><span class="visually-hidden">Carregando recursos...</span></div>

            </div>

        </div>
    </div>
    
    <!-- JS -->    
    <script src="<?= $URL_JS ?>jquery.min.js"></script>
    <script src="<?= $URL_JS ?>popper.min.js"></script>
    <script src="<?= $URL_JS ?>bootstrap.min.js"></script>
    <script src="<?= $URL_JS ?>bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
      setTimeout(
        function() {
          window.location.href = "<?= $URL_BASE ?>login/?acao=novaSessao&login=sessaoInvalida";
        }, 
        5000
      );
    </script>
    

  </body>
</html>