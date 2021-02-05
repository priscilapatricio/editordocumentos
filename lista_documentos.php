<?php
	
	//LISTA DE DOCUMENTOS
		
	//-----------------------------------------------------
	//importar o CSS
	include 'estilos.php';
		  
	//abertura do corpo
	echo'<div class="corpo">';
	
	//título do quadro de edição dos documentos
	echo'<h2 id="h2_lista_documentos">Lista de documentos</h2><hr>';
	
	//-----------------------------------------------------
	//eliminar documentos
	if(isset($_REQUEST['delete']))
	{
		$ficheiro=$_REQUEST['delete'];
		if($ficheiro!=null)
		{
			if(file_exists("documentos/".$ficheiro))
			{
			  unlink("documentos/".$ficheiro);
			}
		}
	}
		
	//-----------------------------------------------------
	//apresenta a lista de documentos disponíveis
	$ficheiros=scandir("documentos");
	
	//-----------------------------------------------------
	//no caso de não haver documentos...
	if(count($ficheiros)==2)
	{
	echo'<div id="nenhum_documento">Não foram encontrados documentos.</div>';
	}
	
	foreach($ficheiros as $ficheiro)
	{
		if($ficheiro!='.' and $ficheiro!='..')
		{
			echo '<div class="corpo_lista">';
			echo '<div class="ficheiro">';
			echo '<a href="editor.php?nome_documento='.$ficheiro.'&editar=1">Editar</a> | ';
			echo '<a href="lista_documentos.php?delete='.$ficheiro.'&editar=1">Apagar</a> | ';
			echo'<strong>'.$ficheiro.'</strong>';
			
			//tamanho do ficheiro (em kbs)
			$tamanho=filesize("documentos/".$ficheiro)/100;
			echo'<small> ('.$tamanho.'Kbs)</small>';
			
			//data de modificação do ficheiro
			$data=fileatime("documentos/".$ficheiro);
			echo'<small> ('.date("d-m-Y",$data).')</small>';
			
			echo '</div>';
			echo '</div>';
		}
	}
		
		//link para voltar
		echo '<a href="index.php">Voltar</a>';
	
	//-----------------------------------------------------
	//rodapé
	include 'rodape.php';
	

	echo'</div>';



?>