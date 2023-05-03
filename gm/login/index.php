<?php 
session_start();
include_once ('../config/configuracao.php'); ?>
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

    <title>Login - Gerencie Mais</title>
  </head>

  <body class = "f-branco cor-cinza-6">

    <!-- login -->    
    <div class="container pt-5 pb-5 mt-5 mb-5 w-75">
        <div class="row">
          <div class="col-md">
          <?php
                if(isset($_GET['Status'])){

                  if($_GET['Status'] == "LoginInvalido"){

                      echo '
                      
                        <div class="container pt-2">
                                  <div class="row">
                                      <div class="col text-left">
                                          <div class="alert alert-primary show" role="alert">
                                              <strong>Algo deu errado!</strong>
                                              É necessário realizar o login para utilizar o Gerencie Mais.
                                              <button type="button" class="btn-close" data-bs-dismiss="alert" style = "position: absolute; top: 6px; right: 10px; margin: 5px;" aria-label="Close"></button>

                                          </div>
                                      </div>
                                  </div> 
                        </div>
                      
                      ';

                  }

                }
            ?>
          </div>
        </div>

        <div class="row m-auto ">            
            <div class="col-12 col-sm-12 col-md-5 ">

                <img src="<?= $URL_IMG ?>marcas/gerencie_mais/gerencie_mais.png" alt="" class = "img-fluid pb-4" width = "280px">
                <br>

                <div class="gm">              

                    <h5 class = "mb-4">Entrar!</h5>     


                    <div class="gm-msg">

                </div>

                    <!-- formulario -->
                    <form id = "formEntrar" class = "gm-formularios" method="POST" action="">

                      <div class="mb-3">
                        <label for="emailLogin" class="form-label">Seu e-mail</label>
                        <input type="email" class="form-control" id="emailLogin" name="emailLogin"  >
                      </div>

                      <div class="mb-3">
                        <label for="senhaLogin" class="form-label">Sua senha</label>
                        <input type="password" class="form-control" id="senhaLogin" name="senhaLogin"  >
                      </div>

                      <div class="mb-3">
                        <!-- <a class = "gm-link-a" href="esqueci-minha-senha.php?recuperarSenha=ok&urlRetorno=<?= $URL_ATUAL ?>">Ops! Esqueci a senha.</a> -->
                      </div>
                      
                      <div class="mb-3">
                          <button type="submit" class="botao botao-a-min" name = "enviar">Acessar</button>
                          <!-- <input type="submit" name = "enviarLogin" class = "botao botao-a-min b-pequeno" value = "Entrar">    -->
                      </div>

                      <div id = "repostas"></div>

                    </form>

                </div><!-- gm-box -->

            </div>
            <div class="col-12 col-sm-12 col-md-1 centro ">
            </div>
            <div class="col-12 col-sm-12 col-md-5  centro ">
                <img src="<?= $URL_IMG ?>sistema/3189802.jpg" alt="" class = "img-fluid pb-4">
            </div>
        </div>
    </div>
    
    <!-- JS -->    
    <script src="<?= $URL_JS ?>jquery.min.js"></script>
    <script src="<?= $URL_JS ?>popper.min.js"></script>
    <script src="<?= $URL_JS ?>bootstrap.min.js"></script>
    <script src="<?= $URL_JS ?>bootstrap.bundle.min.js"></script>   
    <script src="gm.config.min.js"></script>    

  </body>
</html>