<?php 

declare(strict_types = 1);

use PHPUnit\Framework\TestCase;

require_once "./src/Cart.php";

/*
 Un libraire est tombé amoureux de la série Harry Potter et veut faire une campagne de promotion.
Vous devez calculer le taux de réduction accordé en achetant plusieurs livres de la célébre série.
Un livre de la série coûte 8 euros.

Les livres peuvent être acheté en groupe afin d’obtenir des réductions :
L’achat de 1 livre n’apporte aucune réduction
L’achat de 2 livres différents apporte une réduction de 5%
L’achat de 3 livres différents apporte une réduction de 10%
L’achat de 4 livres différents apporte une réduction de 15%
L’achat de 5 livres différents apporte une réduction de 20%
L’achat de 6 livres différents apporte une réduction de 25%
L’achat de 7 livres différents apporte une réduction de 30%

Lors de l’achat d’un ensemble de livres, et pour avoir la plus petite réduction, ces livres sont
regroupés dans différents lots auxquels on applique la réduction appropriée.
Si j’achète les livres 1,2 et 3, j’ai donc une remise de 10% sur l’ensemble.

Voici la liste des titres :
À l’école des sorciers
La Chambre des secrets
Le Prisonnier d'Azkaban
La Coupe de feu
L'Ordre du phénix
Le Prince de sang-mêlé
Les Reliques de la Mort

Exercice

Créer la classe suivante
class Cart
//ajoute un livre au panier
public void addBook(String title)
// calcule le prix du panier
*/

class PotterTest extends TestCase
{
    private $books;
    private $cart;

    public function setUp() :void
    {
        $this->books = [
            "À l’école des sorciers",
            "La Chambre des secrets",
            "Le Prisonnier d'Azkaban",
            "La Coupe de feu",
            "L'Ordre du phénix",
            "Le Prince de sang-mêlé",
            "Les Reliques de la Mort",
        ];

        $this->cart = new Cart;
    }

    public function testIfOneBookInCartShouldReturn8()
    {
        $this->assertEquals($this->cart->addBook($this->books[0]), 8);
    }

    public function testIfTwoSameBooksInCartShouldReturn16()
    {
        $this->assertEquals($this->cart->addBook($this->books[0]), 8);
        $this->assertEquals($this->cart->addBook($this->books[0]), 16);
    }

    public function testIfTwoDifferentBooksInCartShouldReturn15dot2()
    {
        //5% 16 * 0.05;
        $this->assertEquals($this->cart->addBook($this->books[0]), 8);
        $this->assertEquals($this->cart->addBook($this->books[1]), 15.2);
    }

    public function testOfFunctionality()
    {
        $this->assertEquals($this->cart->addBook($this->books[0]), 8);
        $this->assertEquals($this->cart->addBook($this->books[1]), 15.2);
        $this->assertEquals($this->cart->addBook($this->books[2]), 21.6);
        $this->assertEquals($this->cart->addBook($this->books[3]), 27.2);
        $this->assertEquals($this->cart->addBook($this->books[4]), 32);
        $this->assertEquals($this->cart->addBook($this->books[5]), 36);
        $this->assertEquals($this->cart->addBook($this->books[6]), 39.199999999999996);

        $this->assertEquals($this->cart->addBook($this->books[0]), 44.8);
        $this->assertEquals($this->cart->addBook($this->books[0]), 50.4);
        $this->assertEquals($this->cart->addBook($this->books[4]), 56);
    }
}

