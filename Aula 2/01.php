<?php  
$nota1 = 3;
$nota2 = 1;
$presença = 75;

$media = ($nota1 + $nota2) / 2;

if ($media >= 7 && $presença >= 75) {
    echo"Sua media foi $media Aprovado";
}
else{
    echo"Aluno reprovado com media $media";
}

?>