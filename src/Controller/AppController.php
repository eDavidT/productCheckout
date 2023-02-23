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

class AppController extends AbstractController
{
    #[Route('/', name: 'productCatalog')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        $productCategories = $categoryRepository->findAll();
        
        return $this->render('order/product_page.html.twig',
        array(
            'productCategories' => $productCategories
        ));
    }
}
