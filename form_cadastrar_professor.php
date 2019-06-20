<?php
if(isset($_POST['cadastrar'])){
 try{
$conexao = new PDO('mysql:host=localhost:3307;
						dbname=banco_apm','root','usbw');
$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$matricula = $_POST['matricula'];
$nome = $_POST['nome']; 
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$celular = $_POST['celular'];
$valor = $_POST['valor'];
$data = $_POST['data'];
// Recebendo dados do arquivo
$arquivo = $_FILES['arquivo'];
$foto = $_FILES['arquivo']['name'];
$extensao = explode(".",$foto);
$nome_final = md5(time()) . ".". $extensao[1];
$pasta = "fotos/";
$comando_sql = "INSERT INTO tabela_professores(matricula,nome,email,telefone,celular,data,valor,foto)
VALUES(?,?,?,?,?,?,?,?);";
$stmt = $conexao->prepare($comando_sql);
$stmt->bindParam(1,$matricula);
$stmt->bindParam(2,$nome);
$stmt->bindParam(3,$email);
$stmt->bindParam(4,$telefone);
$stmt->bindParam(5,$celular);
$stmt->bindParam(6,$data);
$stmt->bindParam(7,$valor);	
$stmt->bindParam(8,$nome_final);	
$rs = $stmt->execute();		
 if($rs and move_uploaded_file($arquivo['tmp_name'],$pasta.$nome_final))
  {
	echo "<script>alert('Dados gravados com sucesso!');</script>";	
  }else{
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
<title>Cadastro de Professor</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<link href="css/estilo_do_menu.css" rel="stylesheet" type="text/css">
</head>
<body>
	<header>
    	<h1>CADASTRO DE PROFESSOR</h1>
    </header>
    <nav>
    	<ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="#news">News</a></li>
          <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Dropdown</a>
            <div class="dropdown-content">
              <a href="#">Link 1</a>
              <a href="#">Link 2</a>
              <a href="#">Link 3</a>
            </div>
          </li>
        </ul>
       </nav>
	<main>
   <section>
   <fieldset>
    <legend>Cadastro de Professor:</legend>
	<form action="#" method="post" enctype="multipart/form-data">
     <p><label>Matrícula:</label></p>
     <p><input type="number" name="matricula" size="5" required></p>   
                             
     <p><label>Nome do Professor(a):</label></p>
     <p><input type="text" name="nome" size="50"	required></p>
     
     <p><label>Secione um foto:</label></p>
     <p><input type="file" name="arquivo"></p>
            
     <p><label>E-mail:</label></p>
     <p><input type="text" name="email" size="50"	required></p> 
            
     <p><label>Telefone:</label></p>
     <p><input type="tel" name="telefone" size="15"	required></p>
            
     <p><label>Celular:</label></p>
     <p><input type="tel" name="celular" size="15"	required></p>
            
     <p><label>Data de contribuição:</label></p>
     <p><input type="date" name="data" 	required></p>
            
            <p><label>Valor da contribuição:</label></p>
            <p><input type="text" name="valor" size="10"	required></p>
            
                               
            <p><input type="submit" value="Cadastrar Professor(a)" name="cadastrar"></p>    
        </form>
       </fieldset>
    </section>
    </main>
    <footer>
    	<p></p>
    </footer>
</body>
</html>