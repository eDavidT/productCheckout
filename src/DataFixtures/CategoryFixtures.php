<?php

namespace App\DataFixtures;

use App\DataFixtures\ProductFixtures as DataFixturesProductFixtures;
use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $category = new Category('Shampoo');
        $category->setDescription('Shampoo category description');
        $category->addProduct($this->getReference(ProductFixtures::PRODUCT1));
        $category->addProduct($this->getReference(ProductFixtures::PRODUCT2));
        $manager->persist($category);

        $category = new Category('Conditioner');
        $category->setDescription('Conditioner category description');
        $category->addProduct($this->getReference(ProductFixtures::PRODUCT1));
        $category->addProduct($this->getReference(ProductFixtures::PRODUCT2));
        $manager->persist($category);
        
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ProductFixtures::class,
        ];
    }
}
