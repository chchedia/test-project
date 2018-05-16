<?php
/**
 * Created by PhpStorm.
 * User: chedia
 * Date: 17/01/2018
 * Time: 01:03
 */

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testcompteTVAFoodProduct()
    {
        $product = new Product('Un produit', Product::FOOD_PRODUCT, 20);
        $this->assertSame(1.1, $product->compteTVA());
    }

    public function testcompteTVAOtherProduct()
    {
        $product = new Product('Un produit', 'Autre type de produit', 20);
        $this->assertSame(3.92, $product->compteTVA());
    }

}