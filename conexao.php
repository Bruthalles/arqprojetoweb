<?php
define('HOST', 'localhost');
define('DBNAME', 'cadastro');
define('USER','root');
define('PASSWORD','');

$conn = mysqli_connect(HOST, USER, PASSWORD, DBNAME) or die('Não foi possível conectar.');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

// Suponha que você tenha variáveis contendo dados do usuário
$nome = "";
$senha = "";

// Verificar se o registro já existe
$verificar_sql = "SELECT id FROM login WHERE nome = '$nome'";

$result = mysqli_query($conn, $verificar_sql);

if (mysqli_num_rows($result) == 0) {
    // O registro não existe, então insira os dados
    $inserir_sql = "INSERT INTO login (nome, senha) VALUES ('$nome', '$senha')";

    if (mysqli_query($conn, $inserir_sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $inserir_sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "O registro já existe no banco de dados.";
}



// Encerrando a conexão
mysqli_close($conn);
?>
