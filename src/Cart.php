<?php
declare(strict_types = 1);

class Cart
{
    private $books;
    private $discount;
    private $total = 0;

    public const BOOK_PRICE = 8;

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
    
    public function addBook(string $title) :float
    {
        if (array_key_exists($title, $this->books)) {
            $this->books[$title] = $this->books[$title] + 1;
        }

        $this->resetTotal();
        $differentBooks = $this->countDifferentBooks();
        $this->parseCartTotal();

        if ($this->isDifferentBooks($differentBooks)) {
            return $this->calculateTotal($differentBooks);
        }

        return $this->total * self::BOOK_PRICE;
    }

    private function countDifferentBooks() :int
    {
        $differentBooks = 0;

        foreach ($this->books as $bookName => $bookNumberInCart) {
            if ($bookNumberInCart >= 1) {
                $differentBooks++;
            }
        }

        return $differentBooks;
    }

    private function parseCartTotal() :void
    {
        foreach ($this->books as $bookName => $bookNumberInCart) {
            $this->total += $bookNumberInCart;
        }
    }

    private function resetTotal() :void
    {
        $this->total = 0;
    }

    private function isDifferentBooks(int $books) :bool
    {
        return $books > 1 ? true : false;
    }

    private function calculateDiscount($differentBooks) :void
    {
        $differentBooks--;
        $this->discount = 1 - ((5 * $differentBooks) / 100);
    }

    private function calculateTotal($differentBooks) :float
    {
        $this->calculateDiscount($differentBooks);
        return ($this->total * self::BOOK_PRICE) * $this->discount;
    }
}
