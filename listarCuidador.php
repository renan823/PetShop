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
        include_once("./configs/Pet.php");

        if(isset($_GET["id"]) and !empty($_GET["id"])){
            if(isset($_GET["name"]) and !empty($_GET["name"])){
                $id = $_GET["id"];  
                $name = $_GET["name"];
                echo "<h2 class='title'> Cuidadores da(o) pet ".$name."</h2>";
                $exists = Pet::getOne($id);

                if(count($exists) == 0){
                    echo "<h2 class='title'>Pet não existe!<h2>";
                    exit;
                }
                else{
                    $cuidadores = Pet::petCuidadores($id);          
                }
            }
        }
        
    ?>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($cuidadores as $cuidador){
                    echo "<tr>";
                    echo "<td>".$cuidador["nome"]."</td>";
                    echo "<td>".$cuidador["email"]."</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <div class="circle2"></div>
    <div class="circle3"></div>
</body>
</html>