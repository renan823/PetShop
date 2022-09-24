<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="style.css">
    <title>Tutores</title>
</head>
<body>
    <header>
        <?php include_once("./parts/menu.php") ?>
    </header>

    <?php 
        include_once("./configs/Pet.php");

        if(isset($_POST["telTutor"]) and !empty($_POST["telTutor"])){
            $results = Pet::allTutores($_POST["telTutor"]);
            echo"<table class='main-tables'><thead><tr><th>Nome</th><th>Descrição</th><th>Telefone</th></tr></thead><tbody>";

            foreach($results as $result){
                echo "<tr>";
                echo "<td>".$result["nome"]."</td>";
                echo "<td>".$result["descricao"]."</td>";
                echo "<td>".$result["telTutor"]."</td>";
                echo "</tr>";
            }

            echo"</tbody></table>";
        }
    ?>
    <form method="POST" class="main-forms">
        <h2 class="form-title">Tutor</h2>
        <p class="form-item">Telefone: </p>
        <select name="telTutor">
            <option value=""></option>
            <?php 
                $pets = Pet::getTutor();
                foreach($pets as $pet){
                    echo "<option value='".$pet["telTutor"]."'>".$pet["telTutor"]."</option>";
                }
            ?>
        </select>
        <br><br>
        <button type="submit">Pesquisar</button>
    </form>
    

    <div class="circle2"></div>
    <div class="circle3"></div>
</body>
</html>