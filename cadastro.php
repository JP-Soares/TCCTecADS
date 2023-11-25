<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/style/styleCadastro.css" />
        <link rel="stylesheet" href="assets/style/btnVoltar.css">
        <link rel="icon" href="assets/img/icon.png" type="image/x-icon">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Agdasima&family=M+PLUS+Rounded+1c:wght@900&family=Mitr:wght@300&display=swap" rel="stylesheet">

        <title>HelpOlder||Cadastro</title>

        <?php
            session_start();

            $_SESSION["usuario"] = $_GET['usuario'];
        ?>

    </head>
    <body>
        <h1>Cadastro</h1>

        <div>
            <form id="form" method="POST" name="" action="assets/php/cadastro.php" enctype="multipart/form-data">
                <a class="btnVoltar" onclick="goBack();"><img class="imgBtnVoltar" src="assets/img/voltar.png" /></a>
                <h3>Preencha os campos abaixo:</h3>
                
                <div id="container-dados-pessoais">
                    <label>Nome:</label>
                    <input type="text" name="nome" placeholder="Digite seu nome completo" required /><br><br>
                    <label>CPF:</label>
                    <input type="text" id="txtCpf" name="cpf" placeholder="___.___.___-__" maxlength="14" oninput="formatCpf();" required /><br><br>
                    <?php if($_SESSION["usuario"] == "cuidador"){ ?><label>Registro Profissional (Exemplo: CRM):</label>
                    <input type="text" name="registroProfissional" placeholder="Digite os números aqui" required /><br><br><?php } ?>
                    <label class="file-input-wrapper">
                        <input type="file" name="fotoPerfil" id="foto" />
                        <img id="imagemPreview" name="imgPrev" src="" alt="Clique aqui!" style="max-width: 100%;">
                    </label><br><br>
                    <label>Sexo:</label><br>
                    <label>Masculino</label><input type="radio" name="sexo" value="Masculino" checked required />
                    <label>Feminino</label><input type="radio" name="sexo" value="Feminino" required /><br><br>
                    <label>Data de nascimento:</label>
                    <input type="date" name="dtNasc" id="txtDtNasc" onclick="validarDtNasc();" required /><br>
                    <span id="spDtNasc">Data de nascimento inválida!</span>

                    <label>Telefone:</label>
                    <input type="tel" id="txtTel" name="telefone" oninput="formatTel();" onclick="formatTel();" placeholder="()____-____" maxlength="13" required /><br><br>
                    <label>Descrição:</label>
                    <textarea name="descricao" id="txtDescricao" placeholder="Escreva um pouco sobre você..."></textarea>

                </div>
                
                <h3>Preencha seus dados de endereço:</h3>
                <div id="container-dados-endereco">
                    
                    <label>Estado:</label><select id="estado" name="estado">
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

                    <label>Cidade:</label>
                    <input type="text" name="cidade" placeholder="Digite a cidade aqui" required/><br><br>
                    <label>Bairro:</label>
                    <input type="text" name="bairro" placeholder="Digite o bairro aqui" required/><br><br>
                    <label>Rua:</label>
                    <input type="text" name="rua" placeholder="Digite a rua aqui" required/><br><br>
                    <label>Número:</label>
                    <input type="text" name="numero" placeholder="Digite o número da residência aqui" required/><br><br>
                    <label>Complemento:</label>
                    <input type="text" name="complemento" placeholder="Digite o complemento aqui"/><br><br>

                </div>

                <h3>Estamos Terminando!</h3>
                <h3>Preencha seus dados de login:</h3>
                <div id="container-dados-login">
                    

                    <label>E-mail:</label>
                    <input type="email" name="email" placeholder="Digite o E-mail aqui" required/><br><br>
                    <label>Senha:</label>
                    <input type="password" id="txtSenha" name="senha" oninput="validarSenha();" placeholder="Digite uma senha forte aqui" required/><br>
                    <span id="spSenha">A senha deve conter no mínimo 8 caracteres!</span><br>
                    <label>Confirme a senha:</label>
                    <input type="password" id="txtConfirmaSenha" name="confirmaSenha" oninput="confirmarSenha();" placeholder="Confirme a senha aqui" required/><br>
                    <span id="spConfirmaSenha">As senhas precisam ser iguais!</span><br><br>
                    <button id="btnEnviar" type="submit">Cadastrar!</button>

                    <p id="msgErro"><?php echo isset($_SESSION['msgErro']); ?></p>
                </div>


            </form>
        </div>

        <style>
            #spSenha, #spDtNasc, #spConfirmaSenha{
                display: none;
            }
        </style>

        <script src="assets/js/formato.js"></script>
        <script src="assets/js/foto.js"></script>
        <script src="assets/js/validador.js"></script>
        <script src="assets/js/btnVoltar.js"></script>

    </body>
</html>