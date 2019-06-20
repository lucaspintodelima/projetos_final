<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Relatório de Professores</title>
</head>

<body>
	<table border="1" align="center">
    <tr>
        <th colspan="2">RELATÓRIO DE PROFESSORES</th>
    </tr>
    <tr>
    	<th>Matrícula</th> <th>Nome do Professor:</th>
    </tr>
   
    <?php
	 try{
	 $conexao = new PDO('mysql:host=localhost:3307;
	       dbname=banco_apm','root','usbw');
 $consulta = $conexao->query("SELECT * FROM 
 				tabela_professores");
while($campo = $consulta->fetch(PDO::FETCH_ASSOC)){
	echo "<tr>";
	echo "<td>{$campo['matricula']}</td>";
	echo "<td>{$campo['nome']}</td>";
	echo "</tr>";
	
}
}catch(PDOException $e){
		echo "Erro:" . $e->getMessage(); 
	 }	
	?><!-- Fechando um scrpy PHP -->
    </table>
</body>
</html>