   <?php include_once ('../config/configuracao.php'); 


   //recupera das da url
    $retorno = $_GET['urlRetorno'];
    $funcaoAtual = $_GET['funcao'];

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

    <title>Contas de acesso - Gerencie Mais</title>
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
                        <a href="<?= $retorno ?>" class = "gm-link">
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
                            Crie uma conta
                        </h5>
                    </div>
                </div>

                <div class="gm-box">

<?php

    //recebe os campos do formulário
    $recebeDados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    
    //verifica se existe clique no botao de "enviar"
    if(!empty($recebeDados["enviar"])){

        //recebe os campos do formulários
        $nomecompleto = $recebeDados['nomecompleto'];
        $emailLogin = $recebeDados['emailLogin'];
        $senhaLogin = $recebeDados['senhaLogin'];
        $senhaLoginC = $recebeDados['senhaLoginC'];
        $nivelLogin = $recebeDados['nivelLogin'];


        if($senhaLoginC == $senhaLogin){

          $senhaCrip = password_hash($senhaLogin, PASSWORD_DEFAULT); 


                //remove os espeços do inicio e final dos campos
                $recebeDados = array_map("trim", $recebeDados);

                 //cria um id rotativo
                $idRotativo = rand(000000000,999999999); 
                $identificador = $idRotativo;


                // var_dump($recebeDados);
                $inserir = "INSERT INTO contas (id, status, nome, email, senha, nivel)  
                            VALUES ('$identificador', 'ativo', '$nomecompleto', '$emailLogin', '$senhaCrip', '$nivelLogin')";

                            $acao = $conexao -> prepare ($inserir);
                            $acao -> execute ();

                //verifica se cadastrou
                if($acao -> rowCount()) {

                    echo    "<script type = 'text/JavaScript'>
                            window.location = '". $retorno ."&Status=Ok';
                            </script>";

                }else{
                    echo '      
                          <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                            <strong>Ops!</strong> Erro ao cadastrar a conta, tente mais tarde.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>    
                        ';
                }
        }#if senha
        else{

            echo '      
              <div class="alert alert-warning alert-dismissible fade show mb-3" role="alert">
                <strong>Hum!</strong> As senhas não correspondem.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>    
            ';

        }#if
        
    }

?>                 

                    <!-- formulario -->
                    <form id = "formConteudo" class = "gm-formularios-int" method="post">

                        
                      <div class="mb-3">
                        <label for="nomecompleto" class="form-label">Nome</label> <span class="badge text-bg-light">Obrigatório</span>
                        <input type="text" class="form-control" id="nomecompleto" name="nomecompleto" >
                      </div>

                      <div class="pt-0 pb-3">
                        <hr>
                      </div>

                      <div class="mb-3">
                        <label for="nivelLogin" class="form-label">Nível de acesso</label> <span class="badge text-bg-light">Obrigatório</span>
                        <select class="form-select" name = "nivelLogin" id = "nivelLogin" aria-label="Default select example">
                          <option selected></option>
                          <option value="Administrador">Administrador (Acesso total)</option>
                          <option value="Padrão">Padrão</option>
                        </select>
                      </div>


                      <div class="mb-3">
                        <label for="emailLogin" class="form-label">E-mail</label> <span class="badge text-bg-light">Obrigatório</span>
                        <input type="email" class="form-control" id="emailLogin" name="emailLogin" >
                      </div>

                      <div class="row">
                        <div class="mb-3 col-12 col-sm-6 col-md-6">
                            <label for="senhaLogin" class="form-label">Senha</label> <span class="badge text-bg-light">Obrigatório</span>
                            <input type="password" class="form-control" id="senhaLogin" name="senhaLogin" >
                          </div>

                          <div class="mb-3 col-12 col-sm-6 col-md-6">
                            <label for="senhaLoginC" class="form-label">Confirme a senha</label> <span class="badge text-bg-light">Obrigatório</span>
                            <input type="password" class="form-control" id="senhaLoginC" name="senhaLoginC" >
                          </div>                          
                      </div>

                      <div class="pt-0 pb-3">
                        <hr>
                      </div>


                      <div class="mb-3">
                            <input type="submit" name = "enviar" class = "botao botao-a-min b-pequeno" value = "Criar conta">     
                         </div>

                    </form>

                </div><!-- gm-box -->
<?php

}
if($funcaoAtual == "editar"){

    

    $idSelecao = $_GET['id'];
    $seleciona = "SELECT * FROM contas WHERE id = '$idSelecao' LIMIT 1";
    $consulta = $conexao -> prepare($seleciona);
    $consulta -> execute();

        if(($consulta) AND ($consulta -> rowCount () != 0)){

            while($registoSelecao = $consulta -> fetch(PDO::FETCH_ASSOC)){


?>                  <!-- titulo de páginas -->
                <div class="row" class = "gm-navegacao-pag">
                     <div class="col-md">                                   
                        <h5>
                            Editando uma conta
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
        $nome = $recebeDados['nomecompleto'];
        $email = $recebeDados['emailLogin'];
        @$nivel = $recebeDados['nivelLogin'];

        // var_dump($recebeDados);
        $inserir = "UPDATE contas SET nome = '$nome', email = '$email', nivel = '$nivel' WHERE id = '$idSelecao'";
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
                        <label for="nomecompleto" class="form-label">Nome</label> <span class="badge text-bg-light">Obrigatório</span>
                        <input type="text" class="form-control" id="nomecompleto" name="nomecompleto" required value="<?= $registoSelecao ['nome'] ?>">
                      </div>

                      <div class="pt-0 pb-3">
                        <hr>
                      </div>

                      <div class="mb-3">
                        <label for="nivelLogin" class="form-label">Nível de acesso</label> <span class="badge text-bg-light">Obrigatório</span>
                        <select class="form-select" name = "nivelLogin" id = "nivelLogin" aria-label="Default select example" <?php if($nivelUserLogado != "Administrador"){ echo 'disabled="disabled" title = "Não é possível alterar esse campo" '; }  ?>>
                          <optgroup label = "Atual">
                             <option value ="<?= $registoSelecao ['nivel'] ?>"><?= $registoSelecao ['nivel'] ?></option>    
                          </optgroup>
                          <optgroup label="Mudar para">
                            <?php
                              if($registoSelecao ['nivel'] == "Administrador"){
                            ?>
                              <option value="Administrador">Administrador (Acesso total)</option>
                              <option value="Padrão">Padrão</option>
                            <? } ?>
                          </optgroup>
                          
                        </select>
                      </div>

                      <div class="mb-3">
                        <label for="emailLogin" class="form-label">E-mail</label> <span class="badge text-bg-light">Obrigatório</span>
                        <input type="email" class="form-control" id="emailLogin" name="emailLogin" value="<?= $registoSelecao ['email'] ?>">
                      </div>

                      <div class="row">
                        <div class="mb-3 col-12 col-sm-6 col-md-6">
                            <label for="emailLogin" class="form-label">Senha</label><br>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class = "botao botao-b-min b-pequeno " >Troque a senha</a>
                         </div>                          
                      </div>

                      <div class="pt-0 pb-3">
                        <hr>
                      </div>


                      <div class="mb-3">
                            <input type="hidden" name = "idSelecao" class = "botao botao-a-min" value = "<?= $idSelecao ?>">
                            <input type="hidden" name = "retorno" class = "botao botao-a-min" value = "<?= $retorno ?>">
                            <input type="submit" name = "enviar" class = "botao botao-a-min b-pequeno" value = "Salvar conta">     
                         </div>

                    </form>

                </div><!-- gm-box -->

                                <!-- Modal resetar -->
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Quase lá.</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>

                                          <?php

                                            //recebe os campos do formulário
                                            $recebeDados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                                            
                                            //verifica se existe clique no botao de "enviar"
                                            if(!empty($recebeDados["enviar_senha"])){

                                                //remove os espeços do inicio e final dos campos
                                                $recebeDados = array_map("trim", $recebeDados);

                                                $retorno = $recebeDados['retorno'];
                                                $idSelecao = $recebeDados['idSelecao'];

                                                //recebe os campos do formulários
                                                $senhaLoginN = $recebeDados['senhaLoginN'];
                                                $senhaCrip = md5($senhaLoginN); 


                                                // var_dump($recebeDados);
                                                $inserir = "UPDATE contas SET senha = '$senhaCrip' WHERE id = '$idSelecao'";
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
                                        <form id = "formLogin" class = "gm-formularios" method="post">
                                          <div class="modal-body">

                                              <div class="mb">
                                                <label for="senhaLoginN" class="form-label">Insira a nova senha</label><span class="badge text-bg-light">Obrigatório</span>
                                                <input type="password" class="form-control" id="senhaLoginN" name="senhaLoginN" required>
                                              </div>

                                          </div>
                                          <div class="modal-footer">
                                                <input type="hidden" name = "idSelecao" class = "botao botao-a-min" value = "<?= $idSelecao ?>">
                                                <input type="hidden" name = "retorno" class = "botao botao-a-min" value = "<?= $retorno ?>">
                                                <button type="button" class="botao b-pequeno botao-b-min" data-bs-dismiss="modal">Cancelar</button>
                                                <input type="submit" name = "enviar_senha" class = "botao botao-a-min b-pequeno" value = "Salvar nova senha">     

                                          </div>

                                      </form>
                                    </div>
                                  </div>
                                </div>
                                            <!-- modal btn resetar -->

<?php

    
        } #while

    }#if da consulta
      
   }#if principal
}

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