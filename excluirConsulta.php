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
        include_once("./configs/Consulta.php");
        include_once("./configs/Pet.php");

        if(isset($_GET["idPet"]) and !empty($_GET["idPet"])){
            if(isset($_GET["idCuidador"]) and !empty($_GET["idCuidador"])){
                $idPet = $_GET["idPet"];  
                $idCuidador = $_GET["idCuidador"];

                $existCuidador = Cuidador::getOne($idCuidador);

                if(count($existCuidador) == 0){
                    echo "<h2 class='title'>Cuidador não existe!<h2>";
                    exit;
                }
                else{
                    $existPet = Pet::getOne($idPet);
                    if(count($existPet) == 0){
                        echo "<h2 class='title'>Pet não existe!<h2>";
                        exit;
                    }  
                    else{
                        $result = Consulta::getOne($idPet, $idCuidador);
                        if($result){
                            $pet = $existPet[0];
                            $cuidador = $existCuidador[0];
                        }
                        else{
                            echo "<h2 class='title'>Essa consulta não existe!<h2>";
                            exit; 
                        }
                    }        
                }
            }
        }

        if(isset($_POST["idPet"]) and !empty($_POST["idPet"])){
            if(isset($_POST["idCuidador"]) and !empty($_POST["idCuidador"])){
                $idPet = $_POST["idPet"];  
                $idCuidador = $_POST["idCuidador"];

                $result = Consulta::del($idPet, $idCuidador);

                if($result){
                    echo"<script>window.location.replace('./agendamento.php')</script>";
                }   
                else{
                    echo("<script>Swal.fire({icon: 'error', title: 'Ooops...', text: 'Algo deu errado!'})</script>");
                }
            }
            
        }
        
    ?>
    <form method="POST" class="other-forms">
        <h2 class="form-title">Consulta</h2>
        <p class="form-item">Pet: </p>
        <input type="text" readonly value="<?= $pet["nome"]?>">
        <br>
        <p class="form-item">Cuidador: </p>
        <input type="mail"readonly value="<?= $cuidador["nome"]?>">
        <input hidden value="<?= $idPet?>" name="idPet">
        <input hidden value="<?= $idCuidador?>" name="idCuidador">
        <br><br>
        <button type="submit">Excluir</button>
    </form>
    
    <div class="circle2"></div>
    <div class="circle3"></div>
</body>
</html>