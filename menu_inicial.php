<?php
	
	//MENU INICIAL
	
	//-----------------------------------------------------
	//importar o CSS
	include 'estilos.php';
		  
	//abertura do corpo
	echo'<div class="corpo">';	
		  
		//-----------------------------------------------------	  
		//apresenta o logotipo
		echo '<img src="imagens/logo_editor.jpg" class="logotipo">';
		
		//-----------------------------------------------------	  
		//formulário para criação de novo documento
		echo'<form name="novo_ficheiro" method="post" action="editor.php">
		Novo documento:
		<input type="text" name="nome_documento" size="30">
		<input type="submit" value="Criar documento" name="btnsubmit">
		</form>
		';
		
		//-----------------------------------------------------	 
		//link para lista de documentos
		echo '<br><a href="lista_documentos.php">Lista de documentos</a>';
	
	//inserir o redapé
	include 'rodape.php';

	echo'</div>';

?>