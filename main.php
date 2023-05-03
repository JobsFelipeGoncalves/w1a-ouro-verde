<?php
include('url_response.php');
	$urlpatterns = array(


		'/trabalhe-conosco' => 'empregos.php',


		'/' => 'index.php'

		//CONFIGURAÇÃO DE URL'S PADRÕES
		// '/trabalhe-conosco?(?P<ads>\S+)' => 'index.php',
		
		

	);
url_response($urlpatterns);
?>
