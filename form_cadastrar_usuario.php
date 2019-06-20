<?php // Tag de abertura <?php, que diz ao PHP para iniciar a interpretação do código.
 if(isset($_GET['cadastrar'])){
	 	 try{
		$conexao = new PDO('mysql:host=localhost:3307;dbname=banco_apm','root','usbw');
		$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$id = 0;
		$nome = $_GET['nome']; 
		$login = $_GET['login'];
		$senha = $_GET['senha'];
		$tipo = $_GET['tipo'];
		$comando_sql = "INSERT INTO tabela_usuario(id,login,senha,nome,tipo)VALUES(?,?,?,?,?)";
		$stmt = $conexao->prepare($comando_sql);
		$stmt->bindParam(1,$id);
		$stmt->bindParam(2,$login);
		$stmt->bindParam(3,$senha);
		$stmt->bindParam(4,$nome);
		$stmt->bindParam(5,$tipo);
		$rs = $stmt->execute();		
		if($rs){
			echo "<script>alert('Usuário gravado com sucesso!');</script>";	
		}else{
			
			echo var_dump($stmt->errorInfo());	
		}
			
		 } catch(PDOException $e) 
		 	{			 
			 	echo "Erro:" . $e->getMessage();
			} 
 }
 
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cadastro de Usuário	</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<link href="css/estilo_do_menu.css" rel="stylesheet" type="text/css">
</head>
<body>
	<header>
    	<h1>CADASTRO DE USUÁRIO</h1>
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
      <fieldset id="pelicula">
      <legend>Cadastro de Usuario:</legend>
		<form action="#" method="get">
            <p><label>Nome:</label></p>
            <p><input type="text" name="matricula" size="5" required></p>   
                             
            <p><label>Senha:</label></p>
            <p><input type="text" name="nome" size="50"	required></p>
            
            <p><label>longin:</label></p>
            <p><input type="text" name="email" size="50"	required></p> 
            
            <label>Tipo:</label>
            <select name="tipo" type="text">
            		<option selected disabled>escolha um tipo</option>
                   <option value="c"> Usuario Comum </option>
                   <option value="s"> Super Usuário</option>
                   </select>
            
                               
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