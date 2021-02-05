<?php
	
	//EDITOR DOS DOCUMENTOS
	
	//-----------------------------------------------------
	//importar o CSS
	include 'estilos.php';
		  
	//abertura do corpo
	echo'<div class="corpo">';
	
	//título do quadro de edição dos documentos
	echo'<h2 id="h2_editor">Editor de documentos</h2><hr>';
	
	//verificar se foi introduzido um nome de documentos
	$documento="";
	if(isset($_REQUEST['nome_documento']))
	{
		$documento=$_REQUEST['nome_documento'];
		
		//verifica se foi introduzido nome válido
		if(strlen($documento)<3)
		{
			echo '<br><p>O nome do documento é inexistente ou muito curto.</p>';
			echo '<br><a href="index.php">Voltar</a><br>';
			include 'rodape.php';
			exit;
		}
		
		//-----------------------------------------------------
		//verificar se o utilizador introduziu o termo '.txt' no fim do documento
		//documento.txt
		$extensao=substr($documento, strlen($documento)-4);
		if($extensao!='.txt')
		{
			$documento.='.txt';
		}
			
		//-----------------------------------------------------
		//verificar se existe um documento com o mesmo nome
		//NOTA: só pode acontecer esta verificação, quando está a ser criado um novo documento.
		if(!isset($_REQUEST['editar']))
		{
			//verificar se existe o documento
			if(file_exists("documentos/".$documento))
			{
				echo'<br><p>Já existe um documento com o mesmo nome.</p>';
				echo '<br><a href="index.php">Voltar</a><br>';
				include 'rodape.php';
				exit;
			}
		}
	
	//-----------------------------------------------------
	//apresentar o nome do documento
	echo '<div class="nome_documento">Documento: <span>'.$documento.'</span></div>';
	}
	else
	{
		echo'<br><p>Aconteceu um erro inesperado.</p>';
		echo '<br><a href="index.php">Voltar</a><br>';
		include 'rodape.php';
		exit;
	}
	
	
	//verifica se é para apresentar o texto a editar
	$texto="";
	$editar=false;
	if(file_exists("documentos/".$documento))
	{
		$texto=implode(file("documentos/".$documento));
		$editar=true;
	}
	
	//apresenta o formulário para editar/inserir o texto
	echo'
		<form name="form_editor" method="post" action="gravar_documento.php">
		<input type="hidden" name="nome_documento" value="'.$documento.'">
		<textarea rows="10" cols="80" name="text_documento">'.$texto.'</textarea><br>
		<input type="submit" value="Gravar" name="btnsubmit">
		</form>
		';
		
		if($editar)
		{
			echo'<a href="lista_documentos.php">Voltar</a><br>';
		}
		else
		{
			echo'<a href="index.php">Voltar</a><br>';
		}
		
	
	//-----------------------------------------------------
	//rodapé
	include 'rodape.php';
	

	echo'</div>';	


?> 