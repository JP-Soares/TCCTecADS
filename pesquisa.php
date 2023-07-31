<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HelpOlder||Pesquisa</title>
    </head>
    <body>

        <h1>Pesquisa</h1>
        <form name="" method="POST" action="">

            <input type="text" name="nome" placeholder="Buscar por nome"/><br><br>
            <input type="text" name="cidade" placeholder="Buscar por cidade"/><br><br>
            <select id="estado" name="estado">
                        <option value="null">Buscar por estado</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
            </select><br><br>

            <button type="submit">Buscar!</button>

        </form>

    </body>
</html>

<?php

session_start();

include_once("assets/php/conexao.php");

if(isset($_POST['nome']) && isset($_POST['cidade']) && isset($_POST['estado'])){

    $nome = mysqli_real_escape_string($con, trim($_POST['nome']));
    $cidade = mysqli_real_escape_string($con, trim($_POST['cidade']));
    $estado = mysqli_real_escape_string($con, trim($_POST['estado']));

    //Seleciona o nome digitado
    $sqlNome = mysqli_query($con, "SELECT id_cuidador FROM cuidador WHERE nome='$nome'");

    while($dadosUsuario = mysqli_fetch_assoc($sqlNome)){

        $id[] = $dadosUsuario['id_cuidador'];

    }

    //Seleciona a cidade digitada
    $sqlCidade = mysqli_query($con, "SELECT id_cuidador FROM cuidador WHERE cidade='$cidade'");

    while($dadosUsuario = mysqli_fetch_assoc($sqlCidade)){

        $id[] = $dadosUsuario['id_cuidador'];

    }

    //Seleciona o estado digitado
    $sqlEstado = mysqli_query($con, "SELECT id_cuidador FROM cuidador WHERE estado='$estado'");

    while($dadosUsuario = mysqli_fetch_assoc($sqlEstado)){

        $id[] = $dadosUsuario['id_cuidador'];

    }

    for($i = 0; $i < count($id); $i++){
        //Seleciona os dados do usuário
        $sqlDados = mysqli_query($con, "SELECT nome, email FROM cuidador WHERE id_cuidador='$id[$i]'");

        while($dadosUsuario = mysqli_fetch_assoc($sqlDados)){

            $nome = $dadosUsuario['nome'];
            $email = $dadosUsuario['email'];

            ?> 
            <div>
                <p>Nome: <?php echo$nome; ?></p>
                <p>E-mail: <?php echo$email; ?></p>
                <p><a href="perfilBusca.php?idCuidador=<?php echo$id[$i]; ?>">Contratar!</a></p><br><br>
            </div>
            <?php

        } 
    }   
}
?>