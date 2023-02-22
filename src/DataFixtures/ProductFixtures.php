<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public const PRODUCT1 = 'product1';
    public const PRODUCT2 = 'product2';

    public function load(ObjectManager $manager): void
    {
        $product1 = new Product();
        $product1->setName('Redken Shampoo');
        $product1->setPrice(17.99);
        $manager->persist($product1);

        $product2 = new Product();
        $product2->setName('Redken Shampoo');
        $product2->setPrice(17.99);
        $manager->persist($product2);

        $manager->flush();

        $this->addReference(self::PRODUCT1, $product1);
        $this->addReference(self::PRODUCT2, $product2);
    }
}
