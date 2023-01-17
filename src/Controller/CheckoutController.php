<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\ORM\Tools\Console\Command\EnsureProductionSettingsCommand;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CheckoutController extends AbstractController
{
    #[Route('/', name: 'app_checkout')]
    public function index(): Response
    {
        $productCategory = new Category();
        $productCategory->setName("Category");

        $product1 = new Product();
        $product1->setName('Shampoo');
        $product1->setDescription('Test Product');
        $product1->setPrice('3.99');

        $product2 = new Product();
        $product2->setName('Conditioner');
        $product2->setDescription('Test product');
        $product2->setPrice('3.99');

        $productCategory->addProduct($product1);
        $productCategory->addProduct($product2);

        $productCategory2 = new Category();
        $productCategory2->setName("Category 2");

        $product3 = new Product();
        $product3->setName('Shampoo');
        $product3->setDescription('Test Product');
        $product3->setPrice('3.99');

        $product4 = new Product();
        $product4->setName('Conditioner');
        $product4->setDescription('Test product');
        $product4->setPrice('3.99');

        $productCategory2->addProduct($product3);
        $productCategory2->addProduct($product4);
        
        return $this->render('order/product_page.html.twig',
        array(
            'categories' => [$productCategory, $productCategory2]
        ));
    }
}
