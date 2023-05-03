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

    <title>Contas de acesso - Gerencie Mais</title>
  </head>

  <body class = "f-branco cor-cinza-6">

    <!-- header -->
    <?php 
      include_once ('header.php'); 

      if(isset($_GET['aba'])){
                  
                    $abaAtual = $_GET['aba'];
                    //colocar um if geral de "publicado" ou "lixeira"
                    //ABAS MARCADAS

                    //STATUS
               
    ?>

    <!-- painel -->    
    <div class="container w-50">
        <div class="row">            
            <div class="col-12 col-sm-12 col-md-12 pt-3 pb-3">

                <div class="row">
                    <div class="col-sm-9 col-md-9">             
                        <h5>Contas</h5>
                    </div>
                    <div class="col-sm-3 col-md-3 mb-2">
                        <?php if($nivelUserLogadoS == "Administrador"){  ?>
                        <a href="contas_.php?funcao=novo&urlRetorno=<?= $URL_ATUAL ?>" class = "botao botao-a-min b-pequeno float-end" >Nova conta</a>
                        <?php } ?>
                    </div>
                </div>


                <div class="gm-box">

                    <!-- abas -->
                    <div class="gm-aba-navegacao">
                        <div class="row ">
                            <div class="col-sm-9">
                         

                                <ul class="nav abas-navegacao">
                                  <li class="nav-item">
                                    <a class="nav-link <?= $abaAtual == "ativo" ? "active" : ""; ?>" href="contas.php?aba=ativo&acao=lista">Contas ativas</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link <?= $abaAtual == "inativo" ? "active" : ""; ?>" href="contas.php?aba=inativo&acao=lista">Contas inativas</a>
                                  </li>
                                   <li class="nav-item">
                                    <a class="nav-link <?= $abaAtual == "lixeira" ? "active" : ""; ?>" href="contas.php?aba=lixeira&acao=lista">Lixeira</a>
                                  </li>
                                </ul>

                            </div>
                            <div class="col-sm">

                                

                            </div>
                        </div>
                    </div>
                    <?php
                    $seleciona = "SELECT * FROM contas WHERE status = '$abaAtual' ORDER BY ordem DESC";
                        $consulta = $conexao -> prepare($seleciona);
                        $consulta -> execute();

                        if(($consulta) AND ($consulta -> rowCount () != 0)){

                            while($registo = $consulta -> fetch(PDO::FETCH_ASSOC)){
                    ?>

                    <div class = "gm-box-item mb-2 mt-2">
                        <div class="row f-14">
                            <div class="col">
                                <span ><?= $registo['nome'] ?>  <span class="badge text-bg-light f-12"><?= $registo['nivel'] ?></span></span><br>
                                <span class = "f-12">  E-mail de acesso: <?= $registo['email'] ?></span>
                            </div>
                            <div class="col col-sm-2 d-flex align-items-center">
                                <span class="badge text-bg-success "><?= $registo['status'] ?></span>
                            </div>
                            <div class="col col-sm-1 d-flex align-items-center">

<?php

if($registo['id'] != "629051831"){

?>

                                <div class="dropdown">
                                      <button class="gm-menu-acoes botao d-flex d-md-flex justify-content-md-end" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="material-symbols-rounded ">
                                        more_horiz
                                        </span>
                                      </button>
                                      <ul class="dropdown-menu f-12">
                                        <?php if($abaAtual == "ativo"){ ?>
                                        <li><a class="dropdown-item" href="contas.php?botao=lixeira&id=<?= $registo['id'] ?>&urlRetorno=<?= $URL_ATUAL ?>">Mover para o lixo</a></li>
                                        <li><a class="dropdown-item" href="contas.php?botao=inativo&id=<?= $registo['id'] ?>&urlRetorno=<?= $URL_ATUAL ?>">Inativar conta</a></li>
                                        <?php }elseif($abaAtual == "inativo"){ ?>
                                        <li><a class="dropdown-item" href="contas.php?botao=ativo&id=<?= $registo['id'] ?>&urlRetorno=<?= $URL_ATUAL ?>">Ativar conta</a></li>
                                        <li><a class="dropdown-item" href="contas.php?botao=lixeira&id=<?= $registo['id'] ?>&urlRetorno=<?= $URL_ATUAL ?>">Mover para o lixo</a></li>
                                        <?php }elseif($abaAtual == "lixeira") {?>
                                        
                                        <li><a class="dropdown-item" href="contas.php?botao=restaurar&id=<?= $registo['id'] ?>&urlRetorno=<?= $URL_ATUAL ?>">Restaurar</a></li>
                                        <li><a class="dropdown-item" href="#"  data-bs-toggle="modal" data-bs-target="#previa<?= $registo['id'] ?>">Excluir conta</a></li>
                                            <?php } ?>
                                        <li><a class="dropdown-item" href="contas_.php?funcao=editar&id=<?= $registo['id'] ?>&urlRetorno=<?= $URL_ATUAL ?>">Editar</a></li>
                                      </ul>
                                </div> <!-- dropdown -->

                                
<!--                                 href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
 -->

                                            <!-- Modal exluir -->
                                            <div class="modal fade" id="previa<?= $registo['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                              <div class="modal-dialog  modal-dialog-scrollable">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Tem certeza disso?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                  </div>

                                                      <div class="modal-body">

                                                        <p class = "f-14">
                                                            Ao fazer essa ação, você irá excluir permanentemente o "<?= $registo['nome'] ?>" da lixeira e não poderá recuperá-lo. Tem centeza que quer fazer esta ação?
                                                        </p>

                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="botao b-pequeno botao-b-min" data-bs-dismiss="modal">Cancelar</button>
                                                        <a href="contas.php?botao=excluir&id=<?= $registo['id'] ?>&urlRetorno=<?= $URL_ATUAL ?>" type="button" class="botao b-pequeno botao-a-min">Sim! Excluir.</a>
                                                      </div>
                                                </div>
                                              </div>
                                            </div>
                                            <!-- modal btn exluir -->



<?php }else{ echo "Sem opção";} ?>           
                            </div>
                        </div>
                    </div><!-- gm-box-item -->

                    <?php

                        }#while
                        
                    }#if  
                    else{
                    ?>
                         <!-- caso esteja vzaio -->
                    <div class="centro p-5">                        
                        <p class = "f-16 negrito">Nenhuma conta com esses status.</p>
                        <img width = "300px" src="<?= $URL_IMG ?>sistema/32980671.jpg" />                        
                    </div>
                    <?php 

                    }

                    ?>


                    

                        <!-- caso esteja vzaio -->
                       <!--  <div class="centro p-5">                        
                            <p class = "f-16 negrito">Ocorreu algum erro em carregar o conteúdo.</p>
                            <a href="dash.php?acao=Inicio&retorno=Erro" class = "botao botao-a-min b-pequeno">Voltar ao início</a><br>
                            <img width = "350px" src="<?= $URL_IMG ?>sistema/3054292.jpg" />                        
                        </div>
 -->
                </div><!-- gm-box -->

                <?php 
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
    <script src="<?= $URL_JS ?>bootstrap.min.js"></script>
    <script src="<?= $URL_JS ?>popper.min.js"></script>
    <script src="<?= $URL_JS ?>bootstrap.bundle.min.js"></script>    
    <script type="text/javascript">
         $(function () {
            $('.dropdown-toggle').dropdown();
            }); 
    </script>

  </body>
</html>
<?php

//adicionar funções dos botoes

  //Edicao dos botoes
        //verifica se existe a tag ação da url
        if (isset($_GET['botao'])) {

            //recebendo valores das tags pela URL
            $acaoBotao = $_GET['botao'];
            $acaoRetorno = $_GET['urlRetorno'];
            $acoRotativo = $_GET['id'];

             //OCUTANDO conteúdo
            if ($acaoBotao == "inativo") {
                //========
                $selecionaAcao = "UPDATE contas SET status = 'inativo' WHERE id = '$acoRotativo'";
                $consultaAcao = $conexao -> prepare($selecionaAcao);
                $consultaAcao -> execute();

                if($consultaAcao){ echo "<script type = 'text/JavaScript'>window.location = '".$acaoRetorno."&notificao=ok';</script>"; }
                else{ echo "algo deu errado"; }
           }

            //OCUTANDO conteúdo
            if ($acaoBotao == "ativo") {
                //========
                $selecionaAcao = "UPDATE contas SET status = 'ativo' WHERE id = '$acoRotativo'";
                $consultaAcao = $conexao -> prepare($selecionaAcao);
                $consultaAcao -> execute();

                if($consultaAcao){ echo "<script type = 'text/JavaScript'>window.location = '".$acaoRetorno."&notificao=ok';</script>"; }
                else{ echo "algo deu errado"; }
           }

            //OCUTANDO conteúdo
            if ($acaoBotao == "lixeira") {
                //========
                $selecionaAcao = "UPDATE contas SET status = 'lixeira' WHERE id = '$acoRotativo'";
                $consultaAcao = $conexao -> prepare($selecionaAcao);
                $consultaAcao -> execute();

                if($consultaAcao){ echo "<script type = 'text/JavaScript'>window.location = '".$acaoRetorno."&notificao=ok';</script>"; }
                else{ echo "algo deu errado"; }
           }

            //DESOCUTANDO conteúdo
            if ($acaoBotao == "restaurar") {

               // echo "Ok! Vamos ocultar conteúdo";
                $selecionaAcao = "UPDATE contas SET status = 'ativo' WHERE id = '$acoRotativo'";
                $consultaAcao = $conexao -> prepare($selecionaAcao);
                $consultaAcao -> execute();

                if($consultaAcao){ echo "<script type = 'text/JavaScript'>window.location = '".$acaoRetorno."&notificao=ok';</script>"; }
                else{ echo "algo deu errado"; }

            }

            //MOVENDO PRA LIXEIRA conteúdo
            if ($acaoBotao == "excluir") {

                // echo "Ok! Vamos ocultar conteúdo";
                $selecionaAcao = "DELETE FROM contas WHERE id = '$acoRotativo'";
                $consultaAcao = $conexao -> prepare($selecionaAcao);
                $consultaAcao -> execute();
 
                if($consultaAcao){ echo "<script type = 'text/JavaScript'>window.location = '".$acaoRetorno."&notificao=ok';</script>"; }
                else{ echo "algo deu errado"; }

            }

        }

?>