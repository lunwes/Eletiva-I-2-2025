<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login</title>
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
  </style>
</head>

<body>

  <div class="d-flex justify-content-center align-items-center vh-100">
    <div class="login-card">

      <?php
      require("conexao.php");

      if (isset($_GET['cadastro'])) {
        $mensagem = $_GET['cadastro'] == "true"
          ? "<p class='text-success text-center'>Cadastro realizado com sucesso!</p>"
          : "<p class='text-danger text-center'>Erro ao realizar o cadastro!</p>";
        echo $mensagem;
      }


      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        try {
          $stmt = $pdo->prepare("SELECT * FROM usuario WHERE email = ?");
          $stmt->execute([$email]);
          $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

          if ($usuario && password_verify($senha, $usuario['senha'])) {
            session_start();
            $_SESSION['acesso'] = true;
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['email'] = $usuario['email'];
            header('location: principal.php');
          } else {
            echo "<p class='text-danger'>Credenciais inválidas!</p>";
          }
        } catch (Exception $e) {
          echo "Erro: " . $e->getMessage();
        }
      }
      ?>

      <h3 class="text-center mb-4"><i class="bi bi-person-circle"></i> Acesso ao Sistema</h3>

      <form action="index.php" method="POST">
        <div class="mb-3">
          <label for="emailLogin" class="form-label">Email</label>
          <input type="email" class="form-control" id="emailLogin" name="email" placeholder="Digite seu email"
            required />
        </div>

        <div class="mb-3">
          <label for="senhaLogin" class="form-label">Senha</label>
          <input type="password" class="form-control" id="senhaLogin" name="senha" placeholder="Digite sua senha"
            required />
        </div>

        <button type="submit" class="btn btn-custom w-100">Entrar</button>
      </form>

      <p class="mt-3 text-center">
        Ainda não tem uma conta?<br>
        <a href="cadastro.php">Cadastre-se aqui</a>
      </p>

    </div>
  </div>

</body>

</html>