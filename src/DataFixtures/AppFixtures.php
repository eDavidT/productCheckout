<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $category = new Category();
        $category->setName('Shampoo');
        $category->setDescription('Shampoo category description');
        $manager->persist($category);

        $product = new Product();
        $product->setName('Redken Shampoo');
        $product->addCategory($category);
        $product->setPrice(17.99);
        $manager->persist($product);

        $manager->flush();
    }
}
