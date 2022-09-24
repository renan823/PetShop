<table class="main-tables">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Telefone</th>
            <th>Cadastro em</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach($pets as $pet){
                $name = $pet["nome"];
                echo "<tr>";
                echo "<td>".$name."</td>";
                echo "<td>".$pet["descricao"]."</td>";
                echo "<td>".$pet["telTutor"]."</td>";
                echo "<td>".$pet["dataCadastro"]."</td>";
                $id = $pet["id"];
                echo "<td><a href='excluirPet.php?id=$id' class='table-actions'>Excluir</a></td>";
                echo "<td><a href='editarPet.php?id=$id' class='table-actions'>Editar</a></td>";
                echo "<td><a href='listarCuidador.php?id=$id&name=$name' class='table-actions'>Cuidadores</a></td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>