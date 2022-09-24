<table class="main-tables">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Cadastro em</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach($cuidadores as $cuidador){
                $name = $cuidador["nome"];
                echo "<tr>";
                echo "<td>".$cuidador["nome"]."</td>";
                echo "<td>".$cuidador["email"]."</td>";
                echo "<td>".$cuidador["dataCadastro"]."</td>";
                $id = $cuidador["id"];
                echo "<td><a href='excluirCuidador.php?id=$id' class='table-actions'>Excluir</a></td>";
                echo "<td><a href='editarCuidador.php?id=$id' class='table-actions'>Editar</a></td>";
                echo "<td><a href='listarPet.php?id=$id&name=$name' class='table-actions'>Pets</a></td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>