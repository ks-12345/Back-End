
<?php 

$anofabric = readline("Digite o ano de fabricação:  ");

function anocarro($anofabric) {
    $anoAtual = date("Y");
    $teste = $anoAtual - $anofabric;

    if ($teste < 3) {
        echo "True";
    } else {
        echo "False";
    }
}

anocarro($anofabric);

?>