<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="style.css">
    <title>Cuidadores</title>
</head>
<body>
    <header>
        <?php include_once("./parts/menu.php") ?>
    </header>

    <?php 
        include_once("./configs/Cuidador.php");

        if(isset($_POST["nome"]) and !empty($_POST["nome"])){
            if(isset($_POST["email"]) and !empty($_POST["email"])){
           
                $nome = $_POST["nome"];
                $email = $_POST["email"];
                $exists = Cuidador::getEmail($email);
                
                if(count($exists) == 0){
                    $result = Cuidador::add($nome, $email);
                    if($result){
                        echo("<script>Swal.fire({icon: 'success', title: 'Sucesso!', text: 'Cuidador adicionado!'})</script>");
                    }
                    else{
                        echo("<script>Swal.fire({icon: 'error', title: 'Ooops...', text: 'Algo deu errado!'})</script>");
                    }
                }
                else{
                    echo("<script>Swal.fire({icon: 'error', title: 'Ooops...', text: 'Este email já está em uso!'})</script>");
                }
            }
        }
    ?>

    <form method="POST" class="main-forms">
        <h2 class="form-title">Cuidador</h2>
        <p class="form-item">Nome: </p>
        <input type="text" name="nome" required autocomplete="off">
        <br>
        <p class="form-item">Email:  </p>
        <input type="email" name="email" required autocomplete="off">
        <br>
        <button type="submit">Cadastrar</button>
    </form>

    <?php 
        require_once("./configs/Cuidador.php");
        $cuidadores = Cuidador::all();
        require_once("./parts/cuidadorTable.php");
    ?>
    
    <div class="circle2"></div>
    <div class="circle3"></div>
</body>
</html>