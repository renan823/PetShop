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
    <main>
        <h2 class="slogan">
            A saúde do seu pet não é negociável.<br>
            <span class="name">My Little Pet</span>, seu pet levado a sério.
        </h2>
        <section>
            <?php include_once("./parts/cards.php") ?>
            <article class="info">
                <p>
                    Aqui na <span>My Little Pet</span>, seu melhor amigo recebe todos os cuidados
                    necessários para viver uma vida digna de pet. Traga-o para uma consulta experimental
                    e avalie com seus próprios olhos a qualidade dos serviços.
                </p>
            </article>
            <article class="info">
                <div class="box">
                    <a href="sobre.php">Sobre</a>
                </div>
            </article>
        </section>
    </main>
    <div>
        <div class="circle"></div>
        <img class="polaroid" width="230" height="230" src="https://static1.patasdacasa.com.br/articles/5/15/85/@/7589-conheca-algumas-racas-de-gatos-brancos-q-200x200-2.jpg"/>
        <img class="polaroid2" width="230" height="230" src="https://boasmart.com/wp-content/uploads/2021/05/cachorro-200x200.jpg"/>
        <img class="polaroid3" width="230" height="230" src="https://portaldoscaesegatos.com.br/wp-content/uploads/2018/03/filhotes-de-cachorro-200x200.jpg"/>
    </div>
</body>
</html>
<!--
    
Listar todos os cuidadores
Listar todos os pets.
Exibir em ordem alfabética os cuidadores de um determinado pet.
Exibir em ordem alfabética os pets que determinado cuidador cuida.
Listas os pets que determinado tutor (dono) possui (pets com telTutor iguais).
Editar os cuidadores e os pets (trocar nome, descrição, email, etc...)
Retirar ou colocar um pet a um determinado cuidador.
Remover o pet do sistema
Remover o cuidador do sistema (cuidado: os pets que o cuidador estava cuidando NÃO DEVEM SER REMOVIDOS!!!).
A data de cadastro de ambas as tabelas deve ser preenchida com o horário exato de quando o registro foi criado. Esse valor não pode ser modificado em nenhum momento!!!

-->