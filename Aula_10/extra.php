<?php
 namespace Aula_10;

// Interface Veiculo
interface Movel{
    public function Mover();
}

interface Abastecivel{
    public function Abastecer($Quantidade);
}

interface Manutenivel{
    public function fazerManutençao();
}

Class Carro  implements Movel, Abastecivel{
 public function Mover() {
    echo " O Carro esta andando. 🚗💨";
 }
 public function Abastecer($Quantidade){
echo "O tanque esta Cheio. ";
 }

}

Class Bicicleta  implements Movel, Manutenivel{
 public function Mover() {
    echo " A bicicleta esta pedalando. ";
 }
 public function fazerManutençao(){
echo "A bicicleta foi Lubrificada.";
 }
}

Class Onibus  implements Movel,Abastecivel, Manutenivel{
 public function Mover() {
    echo " O onibus esta Trasportando Passageiros ";
 }
 public function Abastecer($Quantidade){
echo "O tanque esta pela metade.";
 }

 public function fazerManutençao(){
echo "O onibus esta passando por revisao";
 }

}

$carro = new Carro();
$Bicicleta = new Bicicleta();
$Onibus = new Onibus();

$carro->Mover();
echo PHP_EOL;
$carro->Abastecer(50);
echo PHP_EOL;

$Bicicleta->Mover();
echo PHP_EOL;
$Bicicleta->fazerManutençao();
echo PHP_EOL;

$Onibus->Mover();
echo PHP_EOL;
$Onibus->Abastecer(30);
echo PHP_EOL;
$Onibus->fazerManutençao();
echo PHP_EOL;
?>
