   <?php 

    include_once ('../config/configuracao.php');
    //recupera das da url
    $retorno = $_GET['urlRetorno'];

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

    <title>Editando depoimento - Gerencie Mais :: <?= $NOME_CLIENT ?></title>
  </head>

  <body class = "f-branco cor-cinza-6">

    <!-- header -->
    <?php 
      include_once ('header.php'); 
    ?>

    <!-- painel -->    
    <div class="container w-50">
        <div class="row">            
            <div class="col-12 col-sm-12 col-md-12 pt-3 pb-3">

                <!-- titulo de páginas -->
                <div class="row" class = "gm-navegacao-pag">
                     <div class="col-md mb-2">                                   
                        <a href="depoimentos.php?aba=publicado&acao=lista" class = "gm-link">
                            <span class="material-symbols-rounded f-16 negrito">
                                arrow_back
                            </span>
                            <span class=" maiusculo" style = "margin-top: -40px !important;">
                                voltar
                            </span>
                        </a>
                    </div>
                </div>

<?php
      
    if(isset($_GET['funcao'])){
     $funcaoAtual = $_GET['funcao'];
     if($funcaoAtual == "novo"){


?>

                <!-- titulo de páginas -->
                <div class="row" class = "gm-navegacao-pag">
                     <div class="col-md">                                   
                        <h5>
                            Criando um vídeo
                        </h5>
                    </div>
                </div>

                <div class="gm-box">


<?php

    //recebe os campos do formulário
    $recebeDados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    
    //verifica se existe clique no botao de "enviar"
    if(!empty($recebeDados["enviar"])){

        //remove os espeços do inicio e final dos campos
        $recebeDados = array_map("trim", $recebeDados);

         //cria um id rotativo
        $idRotativo = rand(000000000,999999999); 
        $identificador = $idRotativo;

        //recebe os campos do formulários
        $titulo = $recebeDados['nome'];
        $descricao = $recebeDados['depoimentos'];

        //geração da data da publicação
        $dia = date('d'); $mes = date('m'); $ano = date('Y');
        $meses = array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
        date_default_timezone_set('America/Campo_Grande'); $hora = date('H:i:s');
        $data = $dia." de ".$meses[$mes-1]." de ".$ano." às ".$hora;

        // var_dump($recebeDados);
        $inserir = "INSERT INTO depoimentos (id, nome_completo, depoimentos, status)  
                    VALUES ('$identificador', '$titulo', '$descricao', 'publicado')";

                    $acao = $conexao -> prepare ($inserir);
                    $acao -> execute ();

        //verifica se cadastrou
        if($acao -> rowCount()) {

            echo    "<script type = 'text/JavaScript'>
                    window.location = '". $retorno ."&Status=Ok';
                    </script>";

        }else{

            echo "não cadastrado";

        }
        
    }

?>
                    


                    <!-- formulario -->
                    <form id = "formConteudo" class = "gm-formularios-int" method="post">

                      <div class="mb-3">
                        <label for="nome" class="form-label">Nome completo</label> <span class="badge text-bg-light">Obrigatório</span>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                        
                      </div>

                      <div class="mb-3">
                        <label for="depoimentos" class="form-label">Depoimentos</label> <span class="badge text-bg-light">Obrigatório</span>
                         <textarea class="form-control" id="depoimentos" name = "depoimentos" rows="3" required></textarea>
                          
                      </div>

                      <div class="pt-0 pb-3">
                        <hr>
                      </div>


                      <div class="mb-3">
                          <input type="submit" name = "enviar" class = "botao botao-a-min b-pequeno" value = "Salvar e publicar">
                      </div>

                    </form>

                </div><!-- gm-box -->

<?php 
  }
}#se funcao for igual a novo ================================================================================
if( $funcaoAtual == "editar" ){


        $idSelecao = $_GET['id'];
        $seleciona = "SELECT * FROM depoimentos WHERE id = '$idSelecao' LIMIT 1";
        $consulta = $conexao -> prepare($seleciona);
        $consulta -> execute();

            if(($consulta) AND ($consulta -> rowCount () != 0)){

                while($registoSelecao = $consulta -> fetch(PDO::FETCH_ASSOC)){
  
?>


                <!-- titulo de páginas -->
                <div class="row" class = "gm-navegacao-pag">
                     <div class="col-md">                                   
                        <h5>
                            Editando um vídeo
                        </h5>
                    </div>
                </div>

                <div class="gm-box">


<?php

    //recebe os campos do formulário
    $recebeDados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    
    //verifica se existe clique no botao de "enviar"
    if(!empty($recebeDados["enviar"])){

        //remove os espeços do inicio e final dos campos
        $recebeDados = array_map("trim", $recebeDados);

        $retorno = $recebeDados['retorno'];
        $idSelecao = $recebeDados['idSelecao'];
        
        //recebe os campos do formulários
        $titulo = $recebeDados['nome'];
        $descricao = $recebeDados['depoimentos'];

        // var_dump($recebeDados);
        $inserir = "UPDATE depoimentos SET nome_completo = '$titulo', depoimentos = '$descricao' WHERE id = '$idSelecao'";
          $acao = $conexao -> prepare ($inserir);
          $acao -> execute ();

        //verifica se cadastrou
        if($acao -> rowCount()) {

            echo    "<script type = 'text/JavaScript'>
                    window.location = '". $retorno ."&Status=Ok';
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

?>
                    


                    <!-- formulario -->
                    <form id = "formConteudo" class = "gm-formularios-int" method="post">

                      <div class="mb-3">
                        <label for="nome" class="form-label">Nome completo</label> <span class="badge text-bg-light">Obrigatório</span>
                        <input type="text" class="form-control" id="nome" name="nome" required value="<?= $registoSelecao['nome_completo'] ?>">
                        
                      </div>

                      <div class="mb-3">
                        <label for="depoimentos" class="form-label">Descrição</label> <span class="badge text-bg-light">Obrigatório</span>
                         <textarea class="form-control" id="depoimentos" name = "depoimentos" rows="3" required ><?= $registoSelecao['depoimentos'] ?></textarea>
                          
                      </div>

                      <div class="pt-0 pb-3">
                        <hr>
                      </div>

                      <div class="mb-3">
                        
                          <input type="hidden" name = "idSelecao" class = "botao botao-a-min" value = "<?= $idSelecao ?>">
                          <input type="hidden" name = "retorno" class = "botao botao-a-min" value = "<?= $retorno ?>">
                          <input type="submit" name = "enviar" class = "botao botao-a-min b-pequeno" value = "Editar e salvar">
                      </div>

                    </form>

                </div><!-- gm-box -->
<?php
      }#while
    }#if da consulta
  }#se funcao for igual a edicao
  
?>

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