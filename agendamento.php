<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $leitura_id = $_POST['leitura_id'];
    $data_consulta = $_POST['data_consulta'];
    $horario = $_POST['horario'];

    $checkUser = "SELECT id FROM usuarios WHERE email = '$email'";
    $result = $conn->query($checkUser);

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
        $usuario_id = $usuario['id'];
    } else {
        $conn->query("INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '')");
        $usuario_id = $conn->insert_id;
    }

   
    $sql = "INSERT INTO agendamentos (usuario_id, leitura_id, data_consulta, horario) 
            VALUES ('$usuario_id', '$leitura_id', '$data_consulta', '$horario')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:gold; background:#222; padding:20px; text-align:center;'>Agendamento realizado com sucesso!<br>
              <a href='index.html' style='color:white;'>Voltar para a página inicial</a></p>";
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>
