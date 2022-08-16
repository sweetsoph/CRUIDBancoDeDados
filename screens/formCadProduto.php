<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
        <link href="../styles/styleForms.css" rel="stylesheet" />
        <link href="../styles/formCadCliente.css" rel="stylesheet" />

        <title>CADASTRO DE CLIENTE</title>

        <script src='../buscaCep.js'></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
        <script src="jquery.maskMoney.min.js" type="text/javascript"></script>
        <script>
        $(function(){
            $('#vlPreco').maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: true});
        })
    </script>
    </head>

    <body>
        <header>
            <section id='logo'>
                <a href='menu.php'>
                    <div><img src="../assets/sophia-verardo.png" width="60"></div>
                    <div>SophDev</div>
                </a>
            </section>
            <nav>
                <li id='cadastro'><a>Cadastro</a>
                    <ul>
                        <li><a href='formCadCliente.php'>Clientes</a></li>
                        <li><a href='formCadFuncionario.php'>Funcionários</a></li>
                        <li><a href='formCadFornecedor.php'>Fornecedores</a></li>
                        <li><a href='formCadProduto.php'>Produtos</a></li>
                        <li><a href='formCadUsuario.php'>Usuários</a></li>
                    </ul>
                </li>
                <li id='consulta'><a>Consulta</a>
                    <ul>
                        <li><a href='consulta-clientes.php'>Clientes</a></li>
                        <li><a href='consulta-funcionarios.php'>Funcionários</a></li>
                        <li><a href='consulta-fornecedores.php'>Fornecedores</a></li>
                        <li><a href='consulta-produtos.php'>Produtos</a></li>
                        <li><a href='consulta-usuarios.php'>Usuários</a></li>
                    </ul>
                </li>
                <li><a href='login.php'>Sair</a></li>
            </nav>
        </header>
        <main>
            <section id='form'>
                <article>
                    <img src="https://i.imgur.com/acOlOuc.gif">
                </article>
                <article id='form-container'>
                    <h1>Cadastro de Cliente</h1>
                    <form action="#" method="POST">
                        <div id='form-cad'>
                            <div class='form-group'>
                                <label>Nome: </label>
                                <input type="text" id="nomeProduto" name="nomeProduto" maxlength="50" required>
                            </div>
                            <div class='form-group'>
                                <label>Preço: </label>
                                <input type="text" id="vlPreco" name="vlPreco" required>
                            </div>
                            <div class='form-group'>
                                <label>Em Estoque: </label>
                                <input type="text" id="qtEstoque" name="qtEstoque" onkeypress="$(this).mask('#')" maxlength='20' required>
                            </div>
                        </div>
                        <div>
                            <input type="submit" name="Cadastrar" class="form-button">
                            <input type="reset" name="Limpar" class="form-button">
                        </div>
                    </form>
                </article>
            </section>
        </main>
    </body>
</html>

<?php

if (!empty($_POST)) {
    $nome = $_POST['nomeProduto'];
    $cpf = $_POST['vlPreco'];
    $rg = $_POST['qtEstoque'];

    include_once('../conexao.php');

    try {

        $stmt = $conn->prepare("INSERT INTO cliente (nome, cpf, rg, cep, numero, celular, email)
	  	                      VALUES (:nome, :cpf, :rg, :cep, :numero, :celular, :email)");

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':rg', $rg);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':numero', $num);
        $stmt->bindParam(':celular', $celular);
        $stmt->bindParam(':email', $email);

        $stmt->execute();

        echo "<script>alert('Cadastrado com Sucesso');</script>";
    } catch (PDOException $e) {
        echo "Erro ao cadastrar: " . $e->getMessage();
    }
    $conn = null;
}
?>