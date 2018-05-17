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
    /**
     * @dataProvider pricesForFoodProduct
     */
    public function testcompteTVAFoodProduct($price, $expectedTva)
    {
        $product = new Product('Un produit', Product::FOOD_PRODUCT, $price);
        $this->assertSame($expectedTva, $product->compteTVA());
    }

    public function pricesForFoodProduct()
    {
        return [
            [0, 0.0],
            [20, 1.1],
            [100, 5.5]
        ];
    }
    public function testcompteTVAOtherProduct()
    {
        $product = new Product('Un produit', 'Autre type de produit', 20);
        $this->assertSame(3.92, $product->compteTVA());
    }

    public function testNegativePriceComputeTVA()
    {
        $product = new Product('Un produit', Product::FOOD_PRODUCT, -20);
        $this->expectException('LogicException');
        $product->compteTVA();
    }

}