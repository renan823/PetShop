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
            Desenvolvido por<br>
            <span class="name">Renan =)</span>
        </h2>
        
        <section>
            <article class="info">
                <div class="box">
                    <a href="https://github.com/renan823" target="_blank">Github</a>
                </div>
            </article>
            <article class="info">
                <p>
                    Este site foi desenvolvido para a disciplina de DSW2,
                    ministrada pelo professor Trojahn.
                    O sistema é baseado em PHP, que compõe seu backend.
                    O frontend conta com HTML, CSS e JS.
                </p>
                <p>
                   O banco de dados é relacional, e usa a linguagem MySQL.
                   A estrutura do banco de dados foi contruida por meio 
                   dos conhecimentos adquiridos nas aulas da disciplina de BDD.

                </p>
                <p>
                   Esta aplicação possui as funcionalidades 
                   de um CRUD, e é destinada para fins educativos, apenas.
                </p>
                <p>
                    Agradecimento especial à Juan, pela ajuda com o design =)
                </p>
            </article>
        </section>
    </main>
    <div>
        <div class="circle"></div>
    </div>
</body>
</html>