
<?php
$numero = readline(prompt:"Digite um numero Final: ");

for ($i = $numero; $i >= 1; $i--) {
    if ($i %2== 0) {
    echo  $i . "  ";
}
}
?>