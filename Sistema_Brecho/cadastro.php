<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Cadastro de Usuário</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />

  <style>
    body {
      background-color: #FFF5ED;
    }

    .login-card {
      background-color: #FFE8D6;
      border: 2px solid #FFBC8A;
      border-radius: 10px;
      padding: 30px;
      color: #7a5946;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      transition: .2s;
    }

    .login-card:hover {
      transform: scale(1.02);
    }

    .btn-custom {
      background-color: #FFBC8A;
      color: #7a5946;
      border: none;
      transition: .2s;
    }

    .btn-custom:hover {
      background-color: #FFDAC1;
      transform: scale(1.03);
    }

    a {
      color: #7a5946;
      font-weight: bold;
    }

    a:hover {
      color: #A67B5B;
    }

    .text-center p {
      margin: 0;
    }
  </style>
</head>

<body>

  <div class="d-flex justify-content-center align-items-center vh-100">
    <div class="login-card">
      <?php if (isset($erroCadastro)): ?>
        <p class="text-danger text-center"><?= $erroCadastro ?></p>
      <?php endif; ?>


      <?php
      require("conexao.php");

      if (isset($_GET['cadastro'])) {
        $cadastro = $_GET['cadastro'];
        echo $cadastro
          ? "<p class='text-success text-center'>Cadastro realizado com sucesso!</p>"
          : "<p class='text-danger text-center'>Erro ao realizar o cadastro!</p>";
      }

      if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);

        try {
          $stmt = $pdo->prepare("INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)");
          if ($stmt->execute([$nome, $email, $senha])) {
            header("location: index.php?cadastro=true");
            exit;
          } else {
            $erroCadastro = "Erro ao realizar o cadastro. Tente novamente.";
          }

        } catch (Exception $e) {
          echo "<p class='text-danger text-center'>Erro ao executar o comando SQL: " . $e->getMessage() . "</p>";
        }
      }
      ?>

      <h3 class="text-center mb-4"><i class="bi bi-person-plus"></i> Cadastro de Usuário</h3>

      <form method="POST">
        <div class="mb-3">
          <label for="nomeCadastro" class="form-label">Nome</label>
          <input type="text" class="form-control" id="nomeCadastro" name="nome" placeholder="Digite seu nome completo"
            required />
        </div>
        <div class="mb-3">
          <label for="emailCadastro" class="form-label">Email</label>
          <input type="email" class="form-control" id="emailCadastro" name="email" placeholder="Digite seu email"
            required />
        </div>
        <div class="mb-3">
          <label for="senhaCadastro" class="form-label">Senha</label>
          <input type="password" class="form-control" id="senhaCadastro" name="senha" placeholder="Digite uma senha"
            required />
        </div>
        <button type="submit" class="btn btn-custom w-100">Cadastrar</button>
      </form>

      <p class="mt-3 text-center">
        Já tem uma conta?<br>
        <a href="index.php">Faça login aqui</a>
      </p>

    </div>
  </div>

</body>

</html>