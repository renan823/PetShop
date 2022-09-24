<div class="data">
    <?php 
        require_once "configs/Pet.php";
        require_once "configs/Cuidador.php";
        require_once "configs/Consulta.php";
    ?>
    <div class="box">
        <?php echo(Pet::count() . " pets ajudados") ?>
    </div>
    <div class="box">
        <?php echo(Cuidador::count() . " cuidadores") ?>
    </div>
    <div class="box">
        <?php echo(Consulta::count() . " consultas") ?>
    </div>
</div>
