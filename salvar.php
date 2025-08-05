<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cde_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$categoria = $_POST['categoria'] ?? '';
$envolvido = $_POST['envolvido'] ?? '';
$local = $_POST['local'] ?? '';
$urgencia = $_POST['urgencia'] ?? '';
$data = $_POST['data'] ?? '';
$denuncia = $_POST['denuncia'] ?? '';

$stmt = $conn->prepare("INSERT INTO denuncias (categoria, envolvido, local_ocorrencia, urgencia, data_ocorrencia, texto_denuncia) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $categoria, $envolvido, $local, $urgencia, $data, $denuncia);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Denúncia enviada com sucesso!";
} else {
    echo "Erro ao enviar denúncia.";
}

$stmt->close();
$conn->close();
?>