<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="style.css">
    <title>My Little Pet</title>
</head>
<body>
    <header>
        <?php include_once("./parts/menu.php") ?>
    </header>
    <?php 
        include_once("./configs/Cuidador.php");

        if(isset($_GET["id"]) and !empty($_GET["id"])){
            $id = $_GET["id"];  
            $exists = Cuidador::getOne($id);

            if(count($exists) == 0){
                echo "<h2 class='title'>Cuidador não existe!<h2>";
                exit;
            }
            else{
                $cuidadores = $exists[0];          
            }
        }

        function alert($result){
            if($result){
                echo"<script>window.location.replace('./cuidadores.php')</script>";
            }   
            else{
                echo("<script>Swal.fire({icon: 'error', title: 'Ooops...', text: 'Algo deu errado!'})</script>");
            }
        }

        if(isset($_POST["nome"]) and !empty($_POST["nome"])){
            if(isset($_POST["email"]) and !empty($_POST["email"])){
                if(isset($_POST["id"]) and !empty($_POST["id"])){
                    $nome = $_POST["nome"];
                    $email = $_POST["email"];
                    $id = $_POST["id"];

                    $verifyEmail = Cuidador::getEmail($email);
                    $result;

                    if(count($verifyEmail) == 0){
                        $result = Cuidador::edit($nome, $email, $id);
                        alert($result);
                    }
                    elseif(count($verifyEmail) == 1){
                        if($verifyEmail[0]["id"] == $id){
                            $result = Cuidador::edit($nome, $email, $id);
                            alert($result);
                        }
                        else{
                            echo("<script>Swal.fire({icon: 'error', title: 'Ooops...', text: 'Esse email já está em uso!'})</script>");
                        }
                    }
                    else{
                        echo("<script>Swal.fire({icon: 'error', title: 'Ooops...', text: 'Esse email já está em uso!'})</script>");
                    }
                }
            }
        }
        
    ?>
    <form method="POST" class="other-forms">
        <h2 class="form-title">Cuidador</h2>
        <p class="form-item">Nome: </p>
        <input type="text" name="nome" required autocomplete="off" value="<?= $cuidadores["nome"]?>">
        <br>
        <p class="form-item">Email: </p>
        <input type="mail" name="email" required autocomplete="off" value="<?= $cuidadores["email"]?>">
        <input hidden value="<?= $id?>" name="id">
        <br><br>
        <button type="submit">Editar</button>
    </form>
    
    <div class="circle2"></div>
    <div class="circle3"></div>
</body>
</html>