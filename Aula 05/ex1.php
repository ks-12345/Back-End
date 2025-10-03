<?php
Class Cachorro {
    public $nome;
    public $idade;
    public $raca;
    public $castrado;
    public $sexo;
    public $latir;
 public $territorio;


    public function __construct($nome, $idade, $raca, $castrado, $sexo, $latir, $territorio) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->raca = $raca;
        $this->castrado = $castrado;
        $this->sexo = $sexo;
        $this ->latir = $latir;
        $this ->territorio = $territorio;
    }
    
     public function latir() {
       echo "{$this->nome} está latindo: Au Au!";
     }
    
     public function territorio() {
       echo "{$this->nome} marcou territorio!";
     }
    }

$Cachorro1 = new Cachorro("Rex", 5, "Labrador", true, "Macho", true, true);
$Cachorro2 = new Cachorro( "Bella", 3, "Poodle", false, "Fêmea", true, true);
$cachorro3 = new Cachorro( "Max", 4, "Bulldog", true, "Macho", false, true);
$Cachorro4 = new Cachorro( "Lucy", 2, "Beagle", false, "Fêmea", true, true);
$Cachorro5 = new Cachorro( "Duke", 6, "Boxer", true, "Macho", true, true);
$Cachorro5 = new Cachorro( "Molly", 1, "Dachshund", false, "Fêmea", false, true);
$Cachorro6 = new Cachorro( "Rocky", 7, "Rottweiler", true, "Macho", true, true);
$Cachorro7 = new Cachorro( "Luna", 2, "Chihuahua", false, "Fêmea", true, true);
$Cachorro8 = new Cachorro( "Charlie", 3, "Golden Retriever", true, "Macho", false, true);
$Cachorro9 = new Cachorro( "Sadie", 4, "Shih Tzu", false, "Fêmea", false, true);
$Cachorro10 = new Cachorro( "Buddy", 5, "Cocker Spaniel", true, "Macho", true, true);

class Usuario {//criando classe (molde para criação de objetos)

    public $Nome; 
    public $CPF; 
    public $Sexo;
    public $Email; 
    public $EstadoCivil; 
    public $Cidade; 
    public $Estado; 
    public $Endereço; 
    public $CEP; 

    public function __construct($Nome, $CPF, $Sexo, $Email, $EstadoCivil, $Cidade, $Estado, $Endereço, $CEP) {
        
        $this->Nome = $Nome; 
        $this->CPF =  $CPF; 
        $this->Sexo = $Sexo;
        $this->Email = $Email; 
        $this->EstadoCivil = $EstadoCivil; 
        $this->Cidade = $Cidade; 
        $this->Estado = $Estado; 
        $this->Endereço = $Endereço; 
        $this->CEP = $CEP; 
    }
}

    $usuario1 = new Usuario(
    "Josenildo Afonso Souza",
    "100.200.300-40", 
    "Masculino",
    "josenewdo.souza@gmail.com",
    "Casado",
    "Xique-Xique",
    "Bahia",
    "Rua da amizade, 99",
    "40123-98"
);

$usuario2 = new Usuario(
    "Valentina Passos Scherrer",
    "070.070.060-70", 
    "Feminino",
    "scherrer.valen@outlook.com",
    "Divorciada",
    "Iracemápolis",
    "São Paulo",
    "Avenida da saudade, 1942",
    "23456-24"
);

$usuario3 = new Usuario(
    "Claudio Braz Nepumoceno",
    "575.575.242-32", 
    "Masculino",
    "Clauclau.nepumoceno@gmail.com",
    "Solteiro",
    "Piripiri",
    "Piauí",
    "Estrada 3, 33",
    "12345-99"
);

$cachorro3 -> latir();
$Cachorro5 -> territorio();
?>