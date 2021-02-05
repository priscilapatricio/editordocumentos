<?php

	//GRAVAR DOCUMENTO
		
	//-----------------------------------------------------
	//importar o CSS
	include 'estilos.php';
		  
	//abertura do corpo
	echo'<div class="corpo">';	
		  
	//-----------------------------------------------------
	//gravar o documento
	if(isset($_REQUEST['nome_documento']) and isset($_REQUEST['text_documento']))
	{
		//define variáveis
		$nome_documento=$_REQUEST['nome_documento'];
		$texto=$_REQUEST['text_documento'];
		
		//grava o ficheiro
		$file=fopen("documentos/".$nome_documento, "w");
		fwrite($file, $texto);
		fclose($file);
		
		//informa que o documento foi gravado com sucesso
		echo '<p class="gravado_sucesso">Ficheiro gravado com sucesso.</p>';
		echo '<a href="index.php">Voltar</a>';
	}
	
	//inserir o redapé
	include 'rodape.php';

	echo'</div>';	

?>