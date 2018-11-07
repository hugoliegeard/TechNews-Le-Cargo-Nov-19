<?php

namespace App\Controller\TechNews;


use App\Article\Provider\YamlProvider;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Yaml\Yaml;

class IndexController extends Controller
{
    /**
     * Page d'accueil de notre site internet
     * @param YamlProvider $yamlProvider
     * @return Response
     */
    public function index(YamlProvider $yamlProvider)
    {

        # Récupération des Articles depuis YamlProvider
        $articles = $yamlProvider->getArticles();
        # dump($articles);

        # return new Response("<html><body><h1>PAGE D'ACCUEIL</h1></body></html>");
        return $this->render('index/index.html.twig', [
            'articles' => $articles
        ]);
    }

    /**
     * Page permettant d'afficher les articles
     * d'une catégorie.
     * @Route("/categorie/{categorie<\w+>}",
     *     name="index_categorie",
     *     defaults={"categorie":"breaking-news"},
     *     requirements={"categorie"="\w+"},
     *     methods={"GET"})
     * @param $categorie
     * @return Response
     */
    public function categorie($categorie)
    {
        return $this->render('index/categorie.html.twig');
        # return new Response("<html><body><h1>PAGE CATEGORIE : $categorie</h1></body></html>");
    }

    /**
     * Afficher un Article
     * @Route("/{categorie<\w+>}/{slug}_{id<\d+>}.html",
     *     name="index_article")
     * @param $categorie
     * @param $slug
     * @param $id
     * @return Response
     */
    public function article($categorie, $slug, $id)
    {
        #/politique/le-marechal-petain-a-ete-un-grand-soldat_4567898.html
        return $this->render("index/article.html.twig");
    }
}