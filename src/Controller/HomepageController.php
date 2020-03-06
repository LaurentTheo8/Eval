<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage.index")
     */
    public function index(ArticleRepository $articleRepository)
    {
        $results = $articleRepository->findAll();

		return $this->render('homepage/index.html.twig',[
            'results'=> $results
        ]);
    }
}
