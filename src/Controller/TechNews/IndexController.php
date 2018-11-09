<?php

namespace App\Controller\TechNews;

use App\Article\Provider\YamlProvider;
use App\Entity\Article;
use App\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends Controller
{
    /**
     * Page d'accueil de notre site internet.
     *
     * @param YamlProvider $yamlProvider
     *
     * @return Response
     */
    public function index(YamlProvider $yamlProvider)
    {
        $repository = $this->getDoctrine()
            ->getRepository(Article::class);

        // Récupération des Articles depuis YamlProvider
        // $articles = $yamlProvider->getArticles();
        $articles = $repository->findAll();
        $spotlight = $repository->findSpotlightArticles();
        // dump($articles);

        // return new Response("<html><body><h1>PAGE D'ACCUEIL</h1></body></html>");
        return $this->render('index/index.html.twig', [
            'articles' => $articles,
            'spotlight' => $spotlight,
        ]);
    }

    /**
     * Page permettant d'afficher les articles
     * d'une catégorie.
     *
     * @Route("/categorie/{slug<\w+>}",
     *     name="index_categorie",
     *     defaults={"slug":"breaking-news"},
     *     requirements={"slug"="\w+"},
     *     methods={"GET"})
     *
     * @param Categorie $categorie
     * @param $slug
     *
     * @return Response
     */
    public function categorie(Categorie $categorie = null, $slug)
    {
        // Récupération de la catégorie

        // 1ère méthode
        // $categorie = $this->getDoctrine()
        //     ->getRepository(Categorie::class)
        //     ->findOneBy(['slug' => $categorie]);

        // 2ème méthode
        // $articles = $this->getDoctrine()
        //     ->getRepository(Categorie::class)
        //     ->findOneBySlug($slug)
        //     ->getArticles()
        // ;

        if (null === $categorie) {
            // On redirige l'utilisateur sur la page d'accueil
            return $this->redirectToRoute('index', [], Response::HTTP_MOVED_PERMANENTLY);
        }

        // Récupérer les articles de la catégorie
        $articles = $categorie->getArticles();

        return $this->render('index/categorie.html.twig', [
            'categorie' => $categorie,
            'articles' => $articles,
        ]);
        // return new Response("<html><body><h1>PAGE CATEGORIE : $categorie</h1></body></html>");
    }

    /**
     * Afficher un Article.
     *
     * @Route("/{categorie<\w+>}/{slug}_{id<\d+>}.html",
     *     name="index_article")
     *
     * @param Article $article
     *
     * @return Response
     */
    public function article(Article $article = null, $id)
    {
        // Exemple d'url
        ///politique/le-marechal-petain-a-ete-un-grand-soldat_4567898.html

        // $article = $this->getDoctrine()
        //     ->getRepository(Article::class)
        //     ->find($id);

        if (null === $article) {
            // On génère une exception...
            // throw $this->createNotFoundException(
            //     'Nous n\'avons pas trouvé votre article ID : ' . $id
            // );

            // Ou, on redirige l'utilisateur sur la page d'accueil
            return $this->redirectToRoute('index', [], Response::HTTP_MOVED_PERMANENTLY);

            // On pourrait vérifier également, l'intégrité de l'url.
        }

        // Récupération des suggestions
        $suggestions = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findArticlesSuggestions($article->getId(), $article->getCategorie()->getId());

        // Transmission des données à la vue
        return $this->render('index/article.html.twig', [
            'article' => $article,
            'suggestions' => $suggestions,
        ]);
    }

    public function sidebar()
    {
        // Récupération du Repository
        $repository = $this->getDoctrine()
            ->getRepository(Article::class);

        // Récupérer les 5 derniers articles
        $articles = $repository->findLatestArticles();

        // Récupérer les articles à la position "special"
        $specials = $repository->findSpecialArticles();

        // Rendu de la vue
        return $this->render('components/_sidebar.html.twig', [
            'articles' => $articles,
            'specials' => $specials,
        ]);
    }
}
