<!doctype html>
<html>
<head>
	<title>Herois Marvel</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href= "estilo.css" />
</head>
<body>
<div id="header">
	<h1>Marvel Database</h1>
</div>
<form method='GET' action=#>
<div id = "conteudo">
	<h3>Pesquisa de personagens</h3>
	<input type='text' size=20 name='nome' style="background: #FFF8DC;" /><br />
	<input type='submit' name='consulta' value='Pesquisar' />
	
</div>
</form>
</body>
<?php 
$public_Key = '52c6edb68bacdeaa56a8cd91e15d6d37';
$private_Key = 'b545c067ba00d6db0721d9e41969e5a5287aa6e3';

$ts = time();
$hash = md5($ts+$public_Key+$private_Key);
if(isset($_GET['consulta'])){
	$nome = $_GET['nome'];
	//$result =  file_get_contents("https://gateway.marvel.com:443/v1/public/characters?apikey=$public_Key$hash=$hash$&nameStartsWith=$nome");
//	$dados = json_decode($result, true);
	
	/*$result = file_get_contents('marvel.json');
	$json = json_decode($result);
	
	echo "<table>";
	echo "<tr><td>Codigo</td><td>Nome</td></tr>";
	foreach($json as $registro){
		
		echo "<tr><td>".$registro->codigo."</td><td>".$registro->nome."</td></tr><br />";
		
		}
	echo "</table>";*/
	$arquivo = file_get_contents('dados1.json');
	$json = json_decode($arquivo);
	echo $json->data->results[0]->id;
	
	//echo '<pre>';
		//print_r($json);
	//echo '</pre>';
	echo "<table>";
	echo "<tr><td>Codigo</td><td>Nome</td><td>Imagem</td><td>Descrição</td></tr>";
	foreach($json as $registro){
		print_r("<tr><td>".$registro->results[0]->id."</td><td>".$registro->results[0]->name."</td><td><img src=".$registro->results[0]->thumbnail->path."</td><td>".$registro->results[0]->description."</td></tr><br />");
		//echo "<tr><td>".$registro->results[0]->id."</td></tr>";
		
	}
	echo "</table>";
	
}
?>

</html>
 