   <?php include_once ('../config/configuracao.php'); ?>

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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />

    <title>Painel - Gerencie Mais :: <?= $NOME_CLIENT ?></title>
  </head>

  <body class = " cor-cinza-6">

    <!-- header -->
    <?php 
      include_once ('header.php'); 
    ?>

    <!-- painel -->    
    <div class="container w-50">
        <div class="row">            
            <div class="col-12 col-sm-12 col-md-12 pt-3 pb-3">

                <h5>Painel</h5>

                <div class="gm-box">
                    <div class="centro">
                        <img width = "300px" src="<?= $URL_IMG ?>sistema/2894988.jpg" />
                        <br>
                        <h5>Bem-vindo(a), <?= $nomeUserLogadoS ?>!</h5>
                    </div>
                </div><!-- gm-box -->

            </div>
        </div>
    </div>

    <!-- footer -->
    <?php 
      include_once ('footer.php'); 
    ?>
    
    <!-- JS -->    
    <script src="<?= $URL_JS ?>jquery.min.js"></script>
    <script src="<?= $URL_JS ?>popper.min.js"></script>
    <script src="<?= $URL_JS ?>bootstrap.min.js"></script>
    <script src="<?= $URL_JS ?>bootstrap.bundle.min.js"></script>    

  </body>
</html>