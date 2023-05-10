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

    <title>Destaques - Gerencie Mais :: <?= $NOME_CLIENT ?></title>
  </head>

  <body class = "cor-cinza-6">

    <!-- header -->
    <?php 
      include_once ('header.php'); 
    ?>

    <!-- painel -->    
    <div class="container w-50">
        <div class="row">            
            <div class="col-12 col-sm-12 col-md-12 pt-3 pb-3">

                <?php
//MENSAGEM DE OK DO FORMULÁRIO
    if(isset($_GET['Status']) || isset($_GET['notificao'])){
        @$statusCont = $_GET['Status'];
        @$notifyCont = $_GET['notificao'];
        if( $statusCont == "Ok" || $notifyCont == "ok"){
           echo '      
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                  <strong>Prontinho!</strong> Ação realizada.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>    
              ';
        }

    }
?>

                

                <div class="row">
                    <div class="col-sm-9 col-md-9">             
                        <h5>Destaques</h5>
                    </div>
                    <div class="col-sm-3 col-md-3 mb-2">
                        <a href="destaques_.php?funcao=novo&urlRetorno=<?= $URL_ATUAL ?>" class = "botao botao-a-min b-pequeno float-end">Criar um novo</a>
                    </div>
                </div>


                <div class="gm-box">
                <?php 
                if(isset($_GET['aba'])){
                  
                    $abaAtual = $_GET['aba'];
                    //colocar um if geral de "publicado" ou "lixeira"
                    //ABAS MARCADAS

                    //STATUS
               
                ?>

                    <!-- abas -->
                    <div class="gm-aba-navegacao">
                        <div class="row ">
                            <div class="col-sm-9">
                         

                                <ul class="nav abas-navegacao">
                                  <li class="nav-item">
                                    <a class="nav-link <?= $abaAtual == "publicado" ? "active" : ""; ?>" href="destaques.php?aba=publicado&acao=lista">Publicados</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link <?= $abaAtual == "lixeira" ? "active" : ""; ?>" href="destaques.php?aba=lixeira&acao=lista">Lixeira</a>
                                  </li>
                                </ul>

                            </div>
                        </div>
                    </div>

                    <?php


                    //recebe a paginacao
                    $paginaAtual = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);
                    $paginaRecebida = (!empty($paginaAtual)) ? $paginaAtual : 1; 

                    //quatindade de registro
                    $limiteRegistro = 10;

                    //calculo do inico da visualização
                    $inicio =  ($limiteRegistro * $paginaRecebida) - $limiteRegistro;

                        $seleciona = "SELECT * FROM slides_simples WHERE status = '$abaAtual' ORDER BY ordem DESC LIMIT $inicio, $limiteRegistro  ";
                        $consulta = $conexao -> prepare($seleciona);
                        $consulta -> execute();

                            if(($consulta) AND ($consulta -> rowCount () != 0)){

                                while($registo = $consulta -> fetch(PDO::FETCH_ASSOC)){
                    ?>



                    <div class = "gm-box-item mb-2 mt-2">
                        <div class="row f-14">
                            <div class="col">
                                <span ><?= $registo['titulo'] ?></span><br>
                            </div>
                            <div class="col col-sm-2 d-flex align-items-center">
                                <span class="badge text-bg-success "><?= $registo['status'] ?></span>
                            </div>
                            <div class="col col-sm-1">
                                <div class="dropdown ">
                                      <button class="gm-menu-acoes" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="material-symbols-rounded ">
                                        more_vert
                                        </span>
                                      </button>
                                      <ul class="dropdown-menu f-14">
                                        <li><a class="dropdown-item" href="destaques_.php?funcao=editar&id=<?= $registo['id'] ?>&urlRetorno=<?= $URL_ATUAL ?>">Editar</a></li>
                                        <?php if($abaAtual != "lixeira"){ ?> 
                                        <li><a class="dropdown-item" href="destaques.php?botao=lixeira&id=<?= $registo['id'] ?>&urlRetorno=<?= $URL_ATUAL ?>">Mover para o lixo</a></li>
                                        <?php }elseif($abaAtual == "lixeira"){ ?> 
                                        <li><a class="dropdown-item" href="destaques.php?botao=restaurar&id=<?= $registo['id'] ?>&urlRetorno=<?= $URL_ATUAL ?>">Restaurar</a></li>
                                        <li><a class="dropdown-item" href="#"  data-bs-toggle="modal" data-bs-target="#staticBackdrop">Excluir para sempre</a></li>
                                        <?php }?>
                                      </ul>
                                    </div>
                            </div>
                        </div>
                    </div><!-- gm-box-item -->
                                            <!-- Modal exluir -->
                                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Quase lá.</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                  </div>

                                                      <div class="modal-body">

                                                        <p class = "f-14">
                                                            Ao fazer essa ação, você irá excluir permanentemente o "<?= $registo['titulo'] ?>" da lixeira e não poderá recuperá-lo. Tem centeza que quer fazer esta ação?
                                                        </p>

                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="botao b-pequeno botao-b-min" data-bs-dismiss="modal">Cancelar</button>
                                                        <a href="destaques.php?botao=excluir&id=<?= $registo['id'] ?>&urlRetorno=<?= $URL_ATUAL ?>" type="button" class="botao b-pequeno botao-a-min">Sim! Excluir.</a>
                                                      </div>
                                                </div>
                                              </div>
                                            </div>
                                            <!-- modal btn exluir -->


                    <?php
                        }#while
                    }#if consulta
                    else{
                        if($abaAtual == "lixeira"){
                    ?>
                   <!-- caso esteja vzaio -->
                       <div class="centro p-5">                        
                            <p class = "f-16 negrito">Nenhum item para listar</p>
                            <img width = "300px" src="<?= $URL_IMG ?>sistema/3024051.jpg" />                        
                        </div>
                    <?php
                        }#if da liexeira
                        elseif($abaAtual == "publicado"){
                    ?>

                        <!-- caso esteja vzaio -->
                       <div class="centro p-5">                        
                            <p class = "f-16 negrito">Você ainda não tem item publicado!</p>
                            <a href="destaques_.php?funcao=novo&urlRetorno=<?= $URL_ATUAL ?>" class = "botao botao-a-min b-pequeno">Adicione agora</a><br>
                            <img width = "280px" src="<?= $URL_IMG ?>sistema/32980671.jpg" />                        
                        </div>


                    <?php
                     } #if do publicado

                    }#else se não tiver registro

                    ?>


                    <nav class = "gm-paginacao mt-4">
                      <ul class="pagination pagination-sm justify-content-end">
                        <?php                        

                            //Conta a quantidade de registo no meu banco
                            $contaRegisto = "SELECT COUNT(id) AS numeroAchado FROM slides_simples";
                            $quantidadeRegistros = $conexao -> prepare($contaRegisto);
                            $quantidadeRegistros -> execute();
                            $quantidadePesquisa = $quantidadeRegistros -> fetch(PDO::FETCH_ASSOC);

                            //arredondo valor
                            $quantidadePagina = ceil (($quantidadePesquisa['numeroAchado'] / $limiteRegistro) );

                            //maximo de link para exibir antes e depois do atual
                            $maximoDeLink = 2;
                        ?>
                            <?php for ($paginaAnterior = $paginaRecebida - $maximoDeLink; $paginaAnterior <= $paginaRecebida - 1; $paginaAnterior ++) { if($paginaAnterior >= 1){ ?>
                            <li class="page-item"><a class="page-link" href="?aba=<?= $abaAtual ?>&acao=lista&pagina=<?= $paginaAnterior ?>"><?= $paginaAnterior ?></a></li>
                            <?php } }#fim "if" e "for" anterior ?>

                            <li class="page-item active"><a class="page-link " href="#"><?= $paginaRecebida ?></a></li>

                            <?php for($proximaPagina =  $paginaRecebida + 1; $proximaPagina <= $paginaRecebida + $maximoDeLink; $proximaPagina ++){ if($proximaPagina <= $quantidadePagina){ ?>
                            <li class="page-item"><a class="page-link" href="?aba=<?= $abaAtual ?>&acao=lista&pagina=<?= $proximaPagina ?>"><?= $proximaPagina ?></a></li>
                            <?php } }#fim "if" e "for" proximo ?>
                      </ul>
                    </nav>

                    
                    

                    <?php


                    }else{ #if verifica se "aba" existe
                    ?>
                        <!-- caso esteja vzaio -->
                        <div class="centro p-5">                        
                            <p class = "f-16 negrito">Ocorreu algum erro em carregar o conteúdo.</p>
                            <a href="dash.php?acao=Inicio&retorno=Erro" class = "botao botao-a-min b-pequeno">Voltar ao início</a><br>
                            <img width = "350px" src="<?= $URL_IMG ?>sistema/3054292.jpg" />                        
                        </div>
                    <?php
                    }#else verifica se "aba" existe
                    ?>


                   

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
            if ($acaoBotao == "lixeira") {
                //========
                $selecionaAcao = "UPDATE slides_simples SET status = 'lixeira' WHERE id = '$acoRotativo'";
                $consultaAcao = $conexao -> prepare($selecionaAcao);
                $consultaAcao -> execute();

                if($consultaAcao){ echo "<script type = 'text/JavaScript'>window.location = '".$acaoRetorno."&notificao=ok';</script>"; }
                else{ echo "algo deu errado"; }
           }

            //DESOCUTANDO conteúdo
            if ($acaoBotao == "restaurar") {

               // echo "Ok! Vamos ocultar conteúdo";
                $selecionaAcao = "UPDATE slides_simples SET status = 'publicado' WHERE id = '$acoRotativo'";
                $consultaAcao = $conexao -> prepare($selecionaAcao);
                $consultaAcao -> execute();

                if($consultaAcao){ echo "<script type = 'text/JavaScript'>window.location = '".$acaoRetorno."&notificao=ok';</script>"; }
                else{ echo "algo deu errado"; }

            }

            //MOVENDO PRA LIXEIRA conteúdo
            if ($acaoBotao == "excluir") {

                // echo "Ok! Vamos ocultar conteúdo";
                $selecionaAcao = "DELETE FROM slides_simples WHERE id = '$acoRotativo'";
                $consultaAcao = $conexao -> prepare($selecionaAcao);
                $consultaAcao -> execute();
 
                if($consultaAcao){ echo "<script type = 'text/JavaScript'>window.location = '".$acaoRetorno."&notificao=ok';</script>"; }
                else{ echo "algo deu errado"; }

            }

        }

?>