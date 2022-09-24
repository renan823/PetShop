<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            if(isset($_GET["name"]) and !empty($_GET["name"])){
                $id = $_GET["id"];  
                $name = $_GET["name"];
                echo "<h2 class='title'> Pets cuidados por ".$name."</h2>";
                $exists = Cuidador::getOne($id);

                if(count($exists) == 0){
                    echo "<h2 class='title'>Cuidador não existe!<h2>";
                    exit;
                }
                else{
                    $pets = Cuidador::cuidadorPets($id);          
                }
            }
        }
        
    ?>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Telefone</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($pets as $pet){
                    echo "<tr>";
                    echo "<td>".$pet["nome"]."</td>";
                    echo "<td>".$pet["descricao"]."</td>";
                    echo "<td>".$pet["telTutor"]."</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <div class="circle2"></div>
    <div class="circle3"></div>
</body>
</html>