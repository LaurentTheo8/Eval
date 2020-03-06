<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends AbstractController
{
    /**
     * @Route("/articles", name="article.index")
     */
    public function index(ArticleRepository $articleRepository)
    {
        $results = $articleRepository->findAll();
        //pour voir les resultats		dd($results); *

        return $this->render('article/index.html.twig',[
            'results'=> $results
        ]);
    }

    /**
     * @Route("/article/{slug}", name="article.details")
     */

    public function details(string $slug, ArticleRepository $articleRepository):Response
    {
        /*
         * findOneBy nécessite une liste de conditions sur les propriétés de l'entité
         *      clé est l'une des propriétés de l'entité
         */
        $article = $articleRepository->findOneBy([
            'slug' => $slug
        ]);

        return $this->render('article/details.html.twig', [
            'article' => $article
        ]);
    }
}
