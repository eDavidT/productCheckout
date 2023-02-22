<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Doctrine\ORM\Tools\Console\Command\EnsureProductionSettingsCommand;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CheckoutController extends AbstractController
{
    #[Route('/', name: 'app_checkout')]
    public function index(ProductRepository $productRepository, CategoryRepository $categoryRepository): Response
    {
        $products = $productRepository->findAll();
        dump($products);

        $categories = $categoryRepository->findAll();
        dump($categoryRepository);
        
        return $this->render('order/product_page.html.twig',
        array(
            'categories' => $categories
        ));
    }
}
