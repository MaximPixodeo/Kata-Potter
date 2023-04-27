<?php
declare(strict_types = 1);

class Cart
{
    private $books;
    private $cart = [];
    private $discount;
    private $total = 0;

    public function __construct()
    {
        $this->books = [
            "À l’école des sorciers" => 0,
            "La Chambre des secrets" => 0,
            "Le Prisonnier d'Azkaban" => 0,
            "La Coupe de feu" => 0,
            "L'Ordre du phénix" => 0,
            "Le Prince de sang-mêlé" => 0,
            "Les Reliques de la Mort" => 0,
        ];
    }
    
    //ajoute un livre au panier
    public function addBook(string $title) :float
    {

        if (array_key_exists($title, $this->books)) {
            $this->books[$title] = $this->books[$title] + 1;
        }

        $differentBooks = 0;
        $this->total = 0;
        foreach ($this->books as $key => $value) {
            $this->total += $value;
            if ($value == 1){
                $differentBooks++;
            }
        }

        if ($differentBooks > 1) {
            $differentBooks--;
            $this->discount = 1 - ((5 * $differentBooks) / 100);
            return ($this->total * 8) * $this->discount;
        }
        return $this->total * 8;
    }
}