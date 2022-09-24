<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="style.css">
    <title>Pets</title>
</head>
<body>
    <header>
        <?php include_once("./parts/menu.php") ?>
    </header>

    <?php 
        include_once("./configs/Pet.php");
        
        if(isset($_POST["nome"]) and !empty($_POST["nome"])){
            if(isset($_POST["desc"]) and !empty($_POST["desc"])){
                if(isset($_POST["tel"]) and !empty($_POST["tel"])){
                    $nome = $_POST["nome"];
                    $desc = $_POST["desc"];
                    $tel = $_POST["tel"];
                    $result = Pet::add($nome, $desc, $tel);
                
                    if($result){
                        echo("<script>Swal.fire({icon: 'success', title: 'Sucesso!', text: 'Pet adicionado!'})</script>");
                    }   
                    else{
                        echo("<script>Swal.fire({icon: 'error', title: 'Ooops...', text: 'Algo deu errado!'})</script>");
                    }
                }
            }
        }
    ?>

    <form method="POST" class="main-forms">
        <h2 class="form-title">Pet</h2>
        <p class="form-item">Nome: </p>
        <input type="text" name="nome" required autocomplete="off">
        <br>
        <p class="form-item">Descrição: </p>
        <input type="text" name="desc" required autocomplete="off">
        <br>
        <p class="form-item">Telefone (apenas números): </p>
        <input type="text" name="tel" required minlength="8" maxlength="8" autocomplete="off">
        <br><br>
        <button type="submit">Cadastrar</button>
    </form>

    <?php 
        require_once("./configs/Pet.php");
        $pets = Pet::all();
        require_once("./parts/petTable.php");
    ?>

    <div class="circle2"></div>
    <div class="circle3"></div>
</body>
</html>