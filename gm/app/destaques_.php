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

    <title>Editando destaques - Gerencie Mais :: <?= $NOME_CLIENT ?></title>
     <style type="text/css">
                                   
        .exibir{
            display: block;
        }
        .esconder{
            display: none;
        }
    </style>
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

                <!-- titulo de páginas -->
                <div class="row" class = "gm-navegacao-pag">
                     <div class="col-md mb-2">                                   
                        <a href="destaques.php?aba=publicado&acao=lista" class = "gm-link">
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
                            Criando destaque ...
                        </h5>
                    </div>
                </div>

                <div class="gm-box">


<?php
    
    //verifica se existe clique no botao de "enviar"
    if(isset($_POST["enviar"])){

         //cria um id rotativo
        $idRotativo = rand(000000000,999999999); 
        $identificador = $idRotativo;

        //geração da data da publicação
        $dia = date('d'); $mes = date('m'); $ano = date('Y');
        $meses = array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
        date_default_timezone_set('America/Campo_Grande'); $hora = date('H:i:s');
        $data = $dia." de ".$meses[$mes-1]." de ".$ano." às ".$hora;


        //recebe os campos do formulários
        $titulo = $_POST['titulo'];
        $subtitulo = $_POST['subtitulo'];
        $img_desc = $_FILES['img_destaque']['name'];
        $texto_botao = $_POST['texto_botao'];
        $link_botao = $_POST['link_botao'];

        $move_imagem = move_uploaded_file($_FILES['img_destaque']['tmp_name'], '../img/slide/'. $_FILES['img_destaque']['name']);

        if($move_imagem){
            $inserir = "INSERT INTO slides_simples (id, titulo, subtitulo, img, link_botao, texto_botao,  status)  
                        VALUES ('$identificador', '$titulo', '$titulo', '$img_desc', '$link_botao', '$texto_botao', 'publicado')";

                        $acao = $conexao -> prepare ($inserir);
                        $acao -> execute ();

                //verifica se cadastrou
                if($acao -> rowCount()) { echo "<script type = 'text/JavaScript'> window.location = '". $retorno ."&Status=Ok'; </script>"; }
                else{ echo "não cadastrado"; }
        }        
    }

?>
                    


                    <!-- formulario -->
                    <form id = "formConteudo" class = "gm-formularios-int" method="post" enctype="multipart/form-data">

                    <h5 class = "mb-3">Configure seu destaque</h5>
                      <div class="mb-3">
                        <label for="titulo" class="form-label">Titulo</label> <span class="badge text-bg-light">Obrigatório</span>
                        <input type="text" class="form-control" id="titulo" name="titulo" required>
                      </div>

                      <div class="mb-3">
                        <label for="subtitulo" class="form-label">Subtitulo</label> <span class="badge text-bg-light">Obrigatório</span>
                        <input type="text" class="form-control" id="subtitulo" name="Subtitulo" >
                      </div>

                      <div class="row">  
                          <div class="mb-3 col">
                              <label for="img_destaque" class="form-label">Imagem de destaque</label><span class="badge text-bg-light">Obrigatório</span>
                              <input class="form-control" type="file" name = "img_destaque" id="img_destaque" required>
                            </div>
                      </div>
                        


                      <div class="pt-0 pb-3">
                        <hr>
                      </div>
                      <h5 class = "mb-3">Botão do destaque</h5>

                       <div class="mb-3 col">
                            <label for="texto_botao" class="form-label">Texto do botão</label><span class="badge text-bg-light">Obrigatório</span> 
                            <input type="text" class="form-control" id="texto_botao" name="texto_botao" required>
                          </div>  

                      <div class="row">
                            
                         <div class="mb-3 col">
                            <label for="link_botao" class="form-label">Link do botão</label> <span class="badge text-bg-light">Obrigatório</span>
                            <input type="link" class="form-control" id="link_botao" name="link_botao" required>
                          </div>

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
        $seleciona = "SELECT * FROM slides_simples WHERE id = '$idSelecao' LIMIT 1";
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

    //verifica se existe clique no botao de "enviar"
    if( isset($_POST['editar']) ){

        $retorno = $_POST['retorno'];
        $idSelecao = $_POST['idSelecao'];

        //recebe os campos do formulários
        $titulo = $_POST['titulo'];
        $subtitulo = $_POST['subtitulo'];
        @$opcaoTrocar = $_POST['opcaoTrocar'];
        $img_desc = $_FILES['img_destaque']['name'];        
        $texto_botao = $_POST['texto_botao'];
        $link_botao = $_POST['link_botao'];

        if($opcaoTrocar != ""){
            $move_imagem = move_uploaded_file($_FILES['img_destaque']['tmp_name'], '../img/slide/'. $_FILES['img_destaque']['name']);

            if($move_imagem){
                $inserir = "UPDATE slides_simples SET titulo = '$titulo', subtitulo = '$subtitulo', img = '$img_desc', texto_botao = '$texto_botao', link_botao = '$link_botao', status = 'publicado'  WHERE id = '$idSelecao'";
                $acao = $conexao -> prepare ($inserir);
                $acao -> execute ();

                if($acao -> rowCount()) { echo "<script type = 'text/JavaScript'> window.location = '". $retorno ."&Status=Ok'; </script>";}
                else{ echo ' <div class="alert alert-warning alert-dismissible fade show mb-3" role="alert"> <strong>Ops!</strong> Você não editou nada para salvar. <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';}
            }else{
                echo "Sua imagem não foi enviada para a pasta.";
            }
            
        }else{
            $inserir = "UPDATE slides_simples SET titulo = '$titulo', subtitulo = '$subtitulo', texto_botao = '$texto_botao', link_botao = '$link_botao', status = 'publicado'  WHERE id = '$idSelecao'";
            $acao = $conexao -> prepare ($inserir);
            $acao -> execute ();

            if($acao -> rowCount()) { echo "<script type = 'text/JavaScript'> window.location = '". $retorno ."&Status=Ok'; </script>";}
            else{ echo ' <div class="alert alert-warning alert-dismissible fade show mb-3" role="alert"> <strong>Ops!</strong> Você não editou nada para salvar. <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';}
        }
        
    }

?>
                    


                    <!-- formulario -->
                    <form id = "formConteudo" class = "gm-formularios-int" method="post" enctype="multipart/form-data">



                      <h5 class = "mb-3">Configure seu destaque</h5>
                      <div class="mb-3">
                        <label for="titulo" class="form-label">Titulo</label> <span class="badge text-bg-light">Obrigatório</span>
                        <input type="text" class="form-control" id="titulo" name="titulo" required value="<?= $registoSelecao['titulo'] ?>">
                      </div>

                      <div class="mb-3">
                        <label for="subtitulo" class="form-label">Subtitulo</label> <span class="badge text-bg-light">Obrigatório</span>
                        <input type="text" class="form-control" id="subtitulo" name="subtitulo" required value="<?= $registoSelecao['subtitulo'] ?>">
                      </div>



                      <div class="row"> 
                            <div class="col-md-5">
                                <img src="<?= $URL_IMG ?>slide/<?= $registoSelecao['img'] ?>" class = "img-fluid">
                            </div>       

                            <div class="col pt-3">
                                <div class="form-check form-switch d-flex align-items-center ">
                                  <input class="form-check-input" type="checkbox" name = "opcaoTrocar" role="switch" id="opcaoTrocar" >
                                  <label class="form-check-label" for="opcaoTrocar" style = "margin-top: 10px;">Mudar imagem de destaque</label>
                                </div>


                                <div class="mb-3 col-md-12 esconder" style="" id = "campoTrocar">
                                  <label for="img_destaque" class="form-label">Imagem de destaque</label><span class="badge text-bg-light">Obrigatório</span>
                                  <input class="form-control" type="file" name = "img_destaque" id="img_destaque" >
                                </div>

                               


                            </div>
                      </div>

                      <div class="pt-0 pb-3">
                        <hr>
                      </div>
                      <h5 class = "mb-3">Botão do destaque</h5>

                       <div class="mb-3 col">
                            <label for="texto_botao" class="form-label">Texto do botão</label><span class="badge text-bg-light">Obrigatório</span> 
                            <input type="text" class="form-control" id="texto_botao" name="texto_botao" required value="<?= $registoSelecao['texto_botao'] ?>">
                          </div>  

                      <div class="row">
                            
                         <div class="mb-3 col">
                            <label for="link_botao" class="form-label">Link do botão</label> <span class="badge text-bg-light">Obrigatório</span>
                            <input type="link" class="form-control" id="link_botao" name="link_botao" required value="<?= $registoSelecao['link_botao'] ?>">
                          </div>

                      </div>

                      <div class="pt-0 pb-3">
                        <hr>
                      </div>


                      <div class="mb-3">
                        
                          <input type="hidden" name = "idSelecao" class = "botao botao-a-min" value = "<?= $idSelecao ?>">
                          <input type="hidden" name = "retorno" class = "botao botao-a-min" value = "<?= $retorno ?>">
                          <input type="submit" name = "editar" class = "botao botao-a-min b-pequeno" value = "Editar e salvar">
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
    <script type="text/javascript">
    $('#opcaoTrocar').change(function(){
        var marcaCheck = document.getElementById('opcaoTrocar');
        if(marcaCheck.checked){
            $('#campoTrocar').removeClass('esconder');
            $('#campoTrocar').addClass('exibir');
        }else{
            $('#campoTrocar').removeClass('exibir');
            $('#campoTrocar').addClass('esconder');
        }

    });


// let checkbox = document.getElementById('opcaoTrocar');
// if(checkbox.checked) {
//     console.log("O cliente marcou o checkbox");
// } else {
//     console.log("O cliente não marcou o checkbox");
// }

    </script>

  </body>
</html>