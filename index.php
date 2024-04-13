<?php
include ("./conexao.php");

if(isset($_POST['email']) || isset($_POST['senha'])){

    if(strlen($_POST[ 'email' ]) == 0){
        echo "Digite o e-mail!";
    }
    else if(strlen($_POST['senha']) == 0){
        echo "Digite a senha!";
    }else{

        $email = $mysql->real_escape_string($_POST['email']);
        $senha = $mysql->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM `usuarios` WHERE $email = '$email' AND $senha = '$senha'";
        $sql_query = $mysql->query($sql_code) or die("falha" . $mysql->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1){
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)){
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header('Location: painel.php');

        }else{
            echo "Falha ao Logar! Email ou Senha incorretos.";
        }

    }
    

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="header">
        <h1>Rede Social</h1>
        <h2>Login com PHP</h2>
    </div>
    <div class="container">
        <form action="index.php" method="post">
            <label for="email">Email:</label>
            <input type="text" name="email">
            <br> <br>
            <label for="senha">Senha:</label>
            <input type="password" name="senha">
            <br><br>
            <button type="submit">Entrar</button>
        </form>
        <?php
           
            
        
        
        
        
        ?>
    </div>
</body>
</html>

<?php
    
?>