<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="style.css">
    <title>Pet</title>
</head>
<body>
    <header>
        <?php include_once("./parts/menu.php") ?>
    </header>
    
    <?php 
        include_once("./configs/Consulta.php");
        include_once("./configs/Cuidador.php");
        include_once("./configs/Pet.php");

        if(isset($_POST["pet"]) and !empty($_POST["pet"])){
            if(isset($_POST["cuidador"]) and !empty($_POST["cuidador"])){
                $petName = $_POST["pet"];
                $cuidadorName = $_POST["cuidador"];
                $exists = Consulta::getOne($petName, $cuidadorName);
                if(count($exists) == 0){
                    $result = Consulta::add($petName, $cuidadorName);
                    if($result){
                        echo("<script>Swal.fire({icon: 'success', title: 'Sucesso!', text: 'Consulta agendada!'})</script>");
                    }
                    else{
                        echo("<script>Swal.fire({icon: 'error', title: 'Ooops...', text: 'Algo deu errado!'})</script>");
                    }
                }
                else{
                    echo("<script>Swal.fire({icon: 'error', title: 'Ooops...', text: 'Essa consulta já existe!'})</script>");
                }
            }
        }
    ?>

    <form method="POST" class="main-forms">
        <h2 class="form-title">Consulta</h2>
        <p class="form-item">Pet: </p>
        <select name="pet">
            <option value=""></option>
            <?php 
                $pets = Pet::all();
                foreach($pets as $pet){
                    echo "<option value='".$pet["id"]."'>".$pet["nome"]."</option>";
                }
            ?>
        </select>
        <br>
        <p class="form-item">Cuidador: </p>
        <select name="cuidador">
            <option value=""></option>
            <?php 
                $cuidadores = Cuidador::all();
                foreach($cuidadores as $cuidador){
                    echo "<option value='".$cuidador["id"]."'>".$cuidador["nome"]."</option>";
                }
            ?>
        </select>
        <br><br>
        <button type="submit">Cadastrar</button>
    </form>

    <table class="main-tables">
        <thead>
            <tr>
                <th>Cuidador</th>
                <th>Pet</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                require_once("./configs/Consulta.php");
                $consultas = Consulta::allWithNames();
                foreach($consultas as $consulta){
                    echo "<tr>";
                    echo "<td>".$consulta["cuidador"]."</td>";
                    echo "<td>".$consulta["pet"]."</td>";
                    $idPet = $consulta["idPet"];
                    $idCuidador = $consulta["idCuidador"];
                    echo "<td><a href='excluirConsulta.php?idPet=$idPet&idCuidador=$idCuidador' class='table-actions'>Excluir</a></td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

    <div class="circle2"></div>
    <div class="circle3"></div>
</body>
</html>