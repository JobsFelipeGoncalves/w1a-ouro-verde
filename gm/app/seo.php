   <?php 

    include_once ('../config/configuracao.php');

   ?>

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

    <title>SEO - Gerencie Mais :: <?= $NOME_CLIENT ?></title>
  </head>

  <body class = "cor-cinza-6">

    <!-- header -->
    <?php 
      include_once ('header.php'); 

        $seleciona = "SELECT * FROM seo";
        $consulta = $conexao -> prepare($seleciona);
        $consulta -> execute();

            if(($consulta) AND ($consulta -> rowCount () != 0)){

                while($registoSelecao = $consulta -> fetch(PDO::FETCH_ASSOC)){
    ?>

    <!-- painel -->    
    <div class="container w-50">
        <div class="row">            
            <div class="col-12 col-sm-12 col-md-12 pt-3 pb-3">


                <!-- titulo de páginas -->
                <div class="row" class = "gm-navegacao-pag">
                     <div class="col-md">                                   
                        <h5>
                            Otimização de busca
                        </h5>
                    </div>
                </div>

                <div class="gm-box">

                    <p class = "mb-3">Otimize a busca pelo seu site no Google e em outros buscadores. Use palavras que facilitem que seu cliente encontre você.</p>


                    <div class="gm-box mb-5">
                      <div class="row">
                        
                        <div class="col-12 col-sm-12 col-md"  style = "font-family: arial, sans-serif;">
                            <span class = "f-14 preto"><?= $URL_BASE_CLIENT ?> &#9662; </span><br>
                            <span class = "f-20" style = "color: #1a0dab;">
                              <?php $titulo_menor =$registoSelecao['titulo']; echo substr($titulo_menor, 0, 70); ?></span><br>
                            <span class="f-14 c-cinza-9">
                              <?php $desc_menor = $registoSelecao['descricao'];  
                              echo substr($desc_menor, 0, 200)."..."; ?></span>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12">
                          <hr>
                          <p class = "f-14">Essa é uma demonstração de como as pessoas estão vendo o seu site nas pesquisas do Google.</p>
                          
                        </div>
                      </div>
                    
                        
                    </div>

                      <div class="pt-0 pb-3">
                        <hr>
                      </div>

<?php


    //recebe os campos do formulário
    $recebeDados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    
    //verifica se existe clique no botao de "enviar"
    if(!empty($recebeDados["enviar"])){

        //remove os espeços do inicio e final dos campos
        $recebeDados = array_map("trim", $recebeDados);

        $retorno = $recebeDados['retorno'];

        //recebe os campos do formulários
        $titulo = $recebeDados['titulo'];
        $descricao = $recebeDados['descricao'];
        $palavraChave = $recebeDados['palavraChave'];

        // var_dump($recebeDados);
        $inserir = "UPDATE seo SET titulo = '$titulo', descricao = '$descricao', palavras_chave = '$palavraChave' WHERE id = 9938773";
          $acao = $conexao -> prepare ($inserir);
          $acao -> execute ();

        //verifica se cadastrou
        if($acao -> rowCount()) {

          echo "ok";

           echo    "<script type = 'text/JavaScript'>
                     window.location = 'seo.php?acao=lista&Status=Ok';
                    </script>";

            

        }else{

            echo '      
              <div class="alert alert-warning alert-dismissible fade show mb-3" role="alert">
                <strong>Ops!</strong> Você não editou nada para salvar.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>    
            ';

        }
        
    }


                        //MENSAGEM DE OK DO FORMULÁRIO
                        if(isset($_GET['Status'])){
                            $statusCont = $_GET['Status'];
                            if( $statusCont == "Ok"){
                               echo '      
                                    <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                                      <strong>Prontinho!</strong> Conteúdo alterado.
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>    
                                  ';
                            }

                        }

?>
                    
                    

                    <!-- formulario -->
                    <form id = "formConteudo" class = "gm-formularios-int" method="post">
                      

                      <div class="mb-3">
                        <label for="titulo" class="form-label">Título</label> <span class="badge text-bg-light">Obrigatório</span>
                        <input type="text" class="form-control" id="titulo" name="titulo" required value="<?= $registoSelecao['titulo'] ?>">
                        
                      </div>

                      <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição</label> <span class="badge text-bg-light">Obrigatório</span>
                         <textarea class="form-control" id="descricao" name = "descricao" rows="3" required ><?= $registoSelecao['descricao'] ?></textarea>
                          
                      </div>

                      <div class="mb-3">
                        <label for="palavraChave" class="form-label">Palavra-chave</label> <span class="badge text-bg-light">Obrigatório</span>
                         <textarea class="form-control" id="palavraChave" name = "palavraChave" rows="3" required ><?= $registoSelecao['palavras_chave'] ?></textarea>
                         <div class="form-text">Separe as palavras com virgulas.</div>   
                          
                      </div>



                      <div class="mb-3">
                          <input type="hidden" name = "retorno" class = "botao botao-a-min" value = "<?= $retorno ?>">
                          <input type="submit" name = "enviar" class = "botao botao-a-min b-pequeno" value = "Salvar">
                      </div>

                    </form>




                </div><!-- gm-box -->



            </div>
        </div>
    </div>

    <!-- footer -->
    <?php 
                }#while
          }#if da consulta
  
      include_once ('footer.php'); 
    ?>
    
    <!-- JS -->    
    <script src="<?= $URL_JS ?>jquery.min.js"></script>
    <script src="<?= $URL_JS ?>popper.min.js"></script>
    <script src="<?= $URL_JS ?>bootstrap.min.js"></script>
    <script src="<?= $URL_JS ?>bootstrap.bundle.min.js"></script>    

  </body>
</html>