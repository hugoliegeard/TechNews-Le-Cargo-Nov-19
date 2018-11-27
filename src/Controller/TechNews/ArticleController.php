<?php

namespace App\Controller\TechNews;

use App\Article\ArticleRequest;
use App\Article\ArticleRequestHandler;
use App\Article\ArticleRequestUpdateHandler;
use App\Article\ArticleType;
use App\Article\ArticleWorkflowHandler;
use App\Controller\HelperTrait;
use App\Entity\Article;
use App\Entity\Categorie;
use App\Entity\Membre;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Asset\Packages;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Workflow\Exception\LogicException;

class ArticleController extends Controller
{

    use HelperTrait;

    /**
     * Démonstration de l'ajout d'une
     * article avec Doctrine. (Data Mapper).
     *
     * @Route("test/article/add", name="article_test")
     */
    public function test()
    {
        // Création d'une catégorie
        $categorie = new Categorie();
        $categorie->setNom('Economie');
        $categorie->setSlug('economie');

        // Création du Membre (Auteur de l'article)
        $membre = new Membre();
        $membre->setPrenom('Fabien');
        $membre->setNom('BRIVE');
        $membre->setEmail('f.brive@tech.news');
        $membre->setPassword('monchatfaitdescalins');
        $membre->setRoles(['ROLE_AUTEUR']);

        // Création de l'article
        $article = new Article();
        $article->setTitre('WF3 rachète un vidéo-projecteur');
        $article->setSlug('wf3-rachete-un-video-projecteur');
        $article->setContenu("<p>Il était enfin temps d'acheter un nouveau vidéo projecteur pour la formation de Nicolas.</p>");
        $article->setFeaturedImage('7.jpg');
        $article->setSpecial(0);
        $article->setSpotlight(1);

        // On associe une catégorie et un auteur à l'article
        $article->setCategorie($categorie);
        $article->setMembre($membre);

        // On sauvegarde le tout avec Doctrine
        $em = $this->getDoctrine()->getManager();
        $em->persist($categorie);
        $em->persist($membre);
        $em->persist($article);
        $em->flush();

        return new Response(
            'Nouvel Article ID : '
            . $article->getId()
            . ' dans la catégorie : '
            . $categorie->getNom()
            . ' de l\'auteur '
            . $membre->getPrenom()
        );
    }

    /**
     * Formulaire pour ajouter un Article.
     *
     * @Route({
     *     "fr": "/creer-un-article",
     *     "en": "/new-article"
     * }, name="article_new")
     * @Security("has_role('ROLE_AUTEUR')")
     * @param Request $request
     * @param ArticleRequestHandler $articleRequestHandler
     * @return Response
     */
    public function newArticle(Request $request,
                               ArticleRequestHandler $articleRequestHandler)
    {
        # Récupération de l'auteur | ou en session
        # $membre = $this->getDoctrine()
        #     ->getRepository(Membre::class)
        #     ->find(1);

        # Création d'un Article
        # $article = new Article();
        # $article->setMembre($membre);
        # $article->setTitre('Symfony c\'est génial !');
        $article = new ArticleRequest($this->getUser());

        # Créer un Formulaire permettant l'ajout d'un Article
        $form = $this->createForm(ArticleType::class, $article)
            ->handleRequest($request);

        # Traitement des données POST
        # $form->handleRequest($request);

        # Vérification des données du Formulaire
        if ($form->isSubmitted() && $form->isValid()) {

            # Récupération des données
            /** @var Article $article */
            # $article = $form->getData();
            # dump($article);

            /**
             * Une fois le formulaire soumit et valide,
             * on passe nos données directement au service
             * qui se chargera du traitement de l'article.
             */
            $article = $articleRequestHandler->handle($article);

            # On s'assure que l'article n'est pas null
            if (null !== $article) {
                # Flash Messages
                $this->addFlash('notice',
                    'Félicitations, votre article est en ligne !');

                # Redirection vers l'article
                return $this->redirectToRoute('index_article', [
                    'categorie' => $article->getCategorie()->getSlug(),
                    'slug' => $article->getSlug(),
                    'id' => $article->getId(),
                    'sourceId' => $article->getSourceId()
                ]);
            } else {

                # Flash Messages
                $this->addFlash('error',
                    'Une erreur est survenue. Vérifiez vos informations.');

            }


        }

        # Affichage du Formulaire dans la Vue
        return $this->render('article/form.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * Editer / Modifier un Article
     * @Route({
     *     "fr": "/editer-un-article/{id<\d+>}",
     *     "en": "/edit-article/{id<\d+>}"
     * }, name="article_edit")
     * @Security("article.isAuteur(user) or has_role('ROLE_EDITEUR')    ")
     * @param Article $article
     * @param Request $request
     * @param Packages $packages
     * @param ArticleRequestUpdateHandler $updateHandler
     * @return Response
     */
    public function editArticle(
        Article $article,
        Request $request,
        Packages $packages,
        ArticleRequestUpdateHandler $updateHandler
    )
    {

        # Récupération de ArticleRequest depuis Article
        $ar = ArticleRequest::createFromArticle(
            $article,
            $this->getParameter('articles_dir'),
            $this->getParameter('articles_assets_dir'),
            $packages
        );

        # Création du Formulaire
        $options = [
            'image_url' => $ar->getImageUrl()
        ];

        $form = $this->createForm(ArticleType::class, $ar, $options)
            ->handleRequest($request);

        # Vérification des données du Formulaire
        if ($form->isSubmitted() && $form->isValid()) {

            # Traitement et Sauvegarde des données
            $article = $updateHandler->handle($ar, $article);

            # Flash Message
            $this->addFlash('notice', 'Modification Effectuée !');

            return $this->redirectToRoute('article_edit', [
                'id' => $article->getId()
            ]);
        }

        # Affichage du Formulaire dans la vue
        return $this->render('article/form.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * Afficher les articles en attente de soumission
     * @Route({
     *     "fr" : "/mes-articles/en-attente",
     *     "en" : "/my-articles/pending"
     * }, name="article_pending")
     * @Security("has_role('ROLE_AUTEUR')")
     */
    public function pendingArticles() {

        # Récupération de l'auteur
        $membre = $this->getUser();

        # Récupération des Articles
        $articles = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findAuthorArticlesByStatus($membre->getId(), 'review');

        # Affichage dans la vue
        return $this->render('article/articles.html.twig', [
            'articles' => $articles,
            'titre'    => 'Mes Articles en Attente'
        ]);
    }

    /**
 * Afficher les articles en attente de soumission
 * @Route({
 *     "fr" : "/mes-articles",
 *     "en" : "/my-articles"
 * }, name="article_published")
 * @Security("has_role('ROLE_AUTEUR')")
 */
    public function publishedArticles() {

        # Récupération de l'auteur
        $membre = $this->getUser();

        # Récupération des Articles
        $articles = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findAuthorArticlesByStatus($membre->getId(), 'published');

        # Affichage dans la vue
        return $this->render('article/articles.html.twig', [
            'articles' => $articles,
            'titre'    => 'Mes Articles en Publiés'
        ]);
    }

    /**
 * Afficher les articles en attente de validation
 * @Route({
 *     "fr" : "/les-articles/en-attente-de-validation",
 *     "en" : "/articles/pending-approval"
 * }, name="article_approval")
 * @Security("has_role('ROLE_EDITEUR')")
 */
    public function approvalArticles() {

        # Récupération des Articles
        $articles = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findArticlesByStatus('editor');

        # Affichage dans la vue
        return $this->render('article/articles.html.twig', [
            'articles' => $articles,
            'titre'    => 'En Attente de Validation'
        ]);
    }

    /**
     * Afficher les articles en attente de correction
     * @Route({
     *     "fr" : "/les-articles/en-attente-de-correction",
     *     "en" : "/articles/pending-correction"
     * }, name="article_corrector")
     * @Security("has_role('ROLE_CORRECTEUR')")
     */
    public function correctorArticles() {

        # Récupération des Articles
        $articles = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findArticlesByStatus('corrector');

        # Affichage dans la vue
        return $this->render('article/articles.html.twig', [
            'articles' => $articles,
            'titre'    => 'En Attente de Correction'
        ]);
    }

    /**
     * Afficher les articles en attente de publication
     * @Route({
     *     "fr" : "/les-articles/en-attente-de-publication",
     *     "en" : "/articles/pending-publication"
     * }, name="article_publisher")
     * @Security("has_role('ROLE_PUBLISHER')")
     */
    public function publisherArticles() {

        # Récupération des Articles
        $articles = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findArticlesByStatus('publisher');

        # Affichage dans la vue
        return $this->render('article/articles.html.twig', [
            'articles' => $articles,
            'titre'    => 'En Attente de Publication'
        ]);
    }

    /**
     * Permet de changer le statut d'un article
     * @Route("/workflow/{status}/{id}", name="article_workflow")
     * @Security("has_role('ROLE_AUTEUR')")
     * @param $status
     * @param Article $article
     * @param Request $request
     * @param ArticleWorkflowHandler $awh
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function workflow($status,
                             Article $article,
                             Request $request,
                             ArticleWorkflowHandler $awh)
    {
        # Traitement du Workflow
        try {

            $awh->handle($article, $status);

            # Notification
            $this->addFlash('notice',
                'Votre article à bien été transmis. Merci.');

        } catch (LogicException $e) {

            # Notification
            $this->addFlash('error',
                'Changement de status impossible.');

        }

        # Récupération du Redirect
        $redirect = $request->get('redirect') ?? 'index';

        # On redirige l'utilisateur sur la bonne page
        return $this->redirectToRoute($redirect);

    }

}
