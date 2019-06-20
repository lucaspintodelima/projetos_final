<?php
 if(isset($_GET['cadastrar']))
 {
 try{
  $conexao = new PDO('mysql:host=localhost:3307;dbname=banco_apm','root','usbw');
  // Recuperando dados do formulário
  $matricula = $_GET['matricula'];
  $nome = $_GET['nome'];
  $sql = "INSERT INTO tabela_aluno(matricula,nome)VALUES(:parametro1,:parametro2)";
  $stmt = $conexao->prepare($sql);
  $stmt->bindParam(':parametro1',$matricula);
  $stmt->bindParam(':parametro2',$nome);
  $resultado = $stmt->execute();
  if($resultado)
  {
	  echo "<script>alert('Ok!');</script>";
  }
  else
  {
	  echo var_dump($stmt->errorInfo());
  }
  
 }catch(PDOException $e)
 {
 	echo "Erro:" . $e->getMessage();
 }
 }

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Formulário de Cadastro de Alunos</title>
</head>
<body>
 <form action="#" method="get">
 <p><label>Número de matrícula:</label></p>
 <p><input type="number" size="5" name="matricula" required></p>
 
 <p><label>Nome completo do aluno:</label></p>
 <p><input type="text" size="50" name="nome" required></p>
 
 <p><input type="submit" value="Cadastrar" 
 			name="cadastrar"></p>
 
 </form>
	
</body>
</html>