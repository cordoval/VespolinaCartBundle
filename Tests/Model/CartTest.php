<?php
/**
 * (c) 2012 Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Vespolina\CartBundle\Tests\Model;

use Symfony\Bundle\DoctrineMongoDBBundle\Tests\TestCase;

use Vespolina\CartBundle\Tests\Fixtures\Document\Cartable;
use Vespolina\CartBundle\Tests\CartTestCommon;

/**
 * @author Richard D Shank <develop@zestic.com>
 */
class CartTest extends CartTestCommon
{
    public function testTotalCartItems()
    {
        $cart = $this->createCart('testCart');
        $cartable1 = $this->createCartableItem('cartable1', 1);
        $this->addItemToCart($cart, $cartable1);

        $this->assertSame(1, $cart->getSubTotal());
        $this->assertSame(1, $cart->getTotal());

        $cartable1 = $this->createCartableItem('cartable1', 2);
        $item = $this->addItemToCart($cart, $cartable1);
        $item->setQuantity(3);

        $this->assertSame(7, $cart->getSubTotal());
        $this->assertSame(7, $cart->getTotal());

        // todo: add taxes, discount, and shipping type item
    }

    public function testRemoveItemFromCart()
    {
        $cart = $this->createCart('testCart');
        $cartable1 = $this->createCartableItem('cartable1', 1);
        $item = $this->addItemToCart($cart, $cartable1);
        $item->setQuantity(3);

        $this->assertSame(3, $cart->getSubTotal());
        $this->assertSame(3, $cart->getTotal());

        $this->removeItemFromCart($cart, $item);

        $this->assertSame(0, $cart->getSubTotal());
        $this->assertSame(0, $cart->getTotal());
    }

    public function testRemovesOneUnitOfItemFromCart()
    {
        $this->markTestIncomplete('We have removed item completely but not by quantity, next step is to write method to remove quantity');
    }
}
