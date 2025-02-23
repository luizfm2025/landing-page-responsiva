<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Requisição POST aceita!";
} else {
    echo "Erro: Requisição não permitida!";
}
?>
<form action="test_post.php" method="post">
    <button type="submit">Testar POST</button>
</form>
