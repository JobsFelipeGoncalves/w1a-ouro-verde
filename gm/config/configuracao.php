<?php
    @session_start();
    @ob_start();

    $VERSAO_GM = '3.0';

    //inclui minha conexao com o bando de dados
    include_once ("conexao.php");

    //url do cliente
    //$URL_BASE_CLIENT = "http://localhost/w1agencia/ouro-verde/";
    $URL_BASE_CLIENT = "http://www.ouroverdeguindastes.com.br/demo/";

    //nome do cliente
    $NOME_CLIENT = "Ouro Verde Guindastes";

    //bases Gerencie mais
    //$URL_BASE = $URL_BASE_CLIENT."gerenciemais/";
    $URL_BASE = $URL_BASE_CLIENT."gm/";
    $URL_IMG = $URL_BASE."img/";
    $URL_CSS = $URL_BASE."scripts/css/";
    $URL_JS  = $URL_BASE."scripts/js/";
    

    //url gerado pelo servidor
    $URL_ATUAL = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    //verifica o suauário que esta logado
    if(isset($_SESSION['idSessao'])){

        //recupera os dados da sessao
        $idSessaoR = $_SESSION['idSessao'];

        $selecionaSessao = "SELECT * FROM contas WHERE id  = '". $idSessaoR ."'";
        $acaoSessao = $conexao -> prepare($selecionaSessao);
        $acaoSessao -> execute();

            if(($acaoSessao) AND ($acaoSessao -> rowCount () != 0)){

                while($registoSessao = $acaoSessao -> fetch(PDO::FETCH_ASSOC)){

                    $nomeUserLogado = $registoSessao['nome'];
                    $emailUserLogado = $registoSessao['email'];
                    $nivelUserLogado = $registoSessao['nivel'];
                    $idUserLogado = $registoSessao['id'];

                    $USUARIO_ATUAL = $registoSessao['nome'];
                }
            }
                $nomeUserLogadoS =  $nomeUserLogado;
                $emailUserLogadoS = $emailUserLogado;
                $nivelUserLogadoS = $nivelUserLogado;
    }
    

?>