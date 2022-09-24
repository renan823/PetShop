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
        include_once("./configs/Pet.php");

        if(isset($_GET["id"]) and !empty($_GET["id"])){
            $id = $_GET["id"];  
            $exists = Pet::getOne($id);

            if(count($exists) == 0){
                echo "<h2 class='title'>Pet não existe!<h2>";
                exit;
            }
            else{
                $pets = $exists[0];          
            }
        }

        if(isset($_POST["nome"]) and !empty($_POST["nome"])){
            if(isset($_POST["desc"]) and !empty($_POST["desc"])){
                if(isset($_POST["tel"]) and !empty($_POST["tel"])){
                    if(isset($_POST["id"]) and !empty($_POST["id"])){
                        $nome = $_POST["nome"];
                        $desc = $_POST["desc"];
                        $tel = $_POST["tel"];

                        $result = Pet::edit($nome, $desc, $tel, $_POST["id"]);

                        if($result){
                            echo"<script>window.location.replace('./pets.php')</script>";
                        }   
                        else{
                            echo("<script>Swal.fire({icon: 'error', title: 'Ooops...', text: 'Algo deu errado!'})</script>");
                        }
                    }

                }
            }
        }
        
    ?>
    <form method="POST" class="other-forms">
        <h2 class="form-title">Pet</h2>
        <p class="form-item">Nome: </p>
        <input type="text" name="nome" required autocomplete="off" value="<?= $pets["nome"]?>">
        <br>
        <p class="form-item">Descrição: </p>
        <input type="text" name="desc" required autocomplete="off" value="<?= $pets["descricao"]?>">
        <br>
        <p class="form-item">Telefone (apenas números): </p>
        <input type="text" name="tel" required minlength="8" maxlength="8" autocomplete="off" value="<?= $pets["telTutor"]?>">
        <input hidden value="<?= $id?>" name="id">
        <br><br>
        <button type="submit">Editar</button>
    </form>
    
    <div class="circle2"></div>
    <div class="circle3"></div>
</body>
</html>