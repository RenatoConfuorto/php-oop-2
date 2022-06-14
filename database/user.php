<?php
require_once __DIR__ . '/server.php';

class User {

  public $nome;
  public $cognome;
  public $email;
  public $carrello;
  private $indirizzo;
  public $registrato;
  private $password;

  function __construct($_nome, $_cognome, $_email, $_indirizzo){
    $this->nome = $_nome;
    $this->cognome = $_cognome;
    $this->email = $_email;
    $this->carrello = [];
    $this->indirizzo = $_indirizzo;

    $this->registrato = false;
    $this->password = null;

  }
  function addToCart($_item, $q = 1){
    for($i = 0; $i < $q; $i++){
      $this->carrello[] = $_item;
    }
  }

  function getTotal(){
    $cart = $this->carrello;
    $totale = 0;

    foreach($cart as $item){
      $totale += intval($item->costo);
    }

    if($this->registrato){
      $totale = $totale - (($totale / 100) * 20);
    }

    return $totale;
  }

  function signUp($_password){
    $this->password = $_password;
    $this->registrato = true;
  }

}