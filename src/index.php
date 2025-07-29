
<?php include "conexao.php"; ?>
<h2>Envie sua denúncia (anônimo)</h2>
<form method="post">
    <label>Tipo:</label>
    <select name="tipo">
        <option>Bullying</option>
        <option>Vandalismo</option>
        <option>Violência</option>
        <option>Outros</option>
    </select><br><br>
    <label>Mensagem:</label><br>
    <textarea name="mensagem" required rows="5" cols="40"></textarea><br><br>
    <button type="submit">Enviar</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST['tipo'];
    $mensagem = $_POST['mensagem'];

    $stmt = $conn->prepare("INSERT INTO denuncias (tipo, mensagem) VALUES (?, ?)");
    $stmt->bind_param("ss", $tipo, $mensagem);
    $stmt->execute();   

    echo "<p>Denúncia enviada com sucesso!</p>";
}
?>
