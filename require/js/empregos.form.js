//recebe o formulario
const cadForm = document.getElementById('formularioEmprego');

//acessa o if se existir o formulario
if(cadForm){

	//quando clica no botao
	cadForm.addEventListener("submit", async (e) => {

		//bloqueia o carregamento da página
		e.preventDefault();

		//receber arquivo
		var arquivo = document.getElementById('arquivo').files[0];
		//console.log(arquivo);

		if(arquivo['type'] != "application/pdf"){
			document.getElementById('msg').innerHTML = "<div class = 'respostas-retorno centro alert alert-warning'> Seu currículo deve ser .PDF!</div>"
			//limpar o campo do arquivo
				document.getElementById('arquivo').value = '';
		}else{
			//cria um objeto para receber os dados do formulario
			var dadosForm =  new FormData();

			//atribui as informações do arquivo para o objeto que sera senviado para o phgp
			dadosForm.append("arquivo", arquivo);

			//envia dos dados para o arquivo php
			const dados = await fetch("app/empregos.form.php", {
				method: "POST",
				body: dadosForm
			});

			//ler os dados retornando do php
			const resposta = await dados.json();
			//console.log(resposta);

			if(resposta['status']){
				document.getElementById('msg').innerHTML = resposta['msg'];

			}else{
				document.getElementById('msg').innerHTML = resposta['msg'];
			}
		}

	});
}