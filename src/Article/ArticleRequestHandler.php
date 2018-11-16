<?php

namespace App\Article;


use App\Controller\HelperTrait;
use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ArticleRequestHandler
{

    use HelperTrait;

    private $em, $articleAssetsDir, $articleFactory, $dispatcher;

    /**
     * ArticleRequestHandler constructor.
     * @param EntityManagerInterface $entityManager
     * @param ArticleFactory $articleFactory
     * @param EventDispatcherInterface $dispatcher
     * @param string $articleAssetsDir
     */
    public function __construct(EntityManagerInterface $entityManager,
                                ArticleFactory $articleFactory,
                                EventDispatcherInterface $dispatcher,
                                string $articleAssetsDir)
    {
        $this->em = $entityManager;
        $this->dispatcher = $dispatcher;
        $this->articleFactory = $articleFactory;
        $this->articleAssetsDir = $articleAssetsDir;
    }

    public function handle(ArticleRequest $request): ?Article
    {
        # Traitement de l'upload de l'image
        /** @var UploadedFile $image */
        $image = $request->getFeaturedImage();

        if (null !== $image) {
            # Nom du Fichier
            $fileName = $this->slugify($request->getTitre())
                . '.' . $image->guessExtension();

            try {
                $image->move(
                    $this->articleAssetsDir,
                    $fileName
                );
            } catch (FileException $e) {
                // ... handle exception if something happens during file upload
            }

            # Mise à jour de l'image
            $request->setFeaturedImage($fileName);
        } else {
            return null;
        }

        # Mise à jour du slug
        $request->setSlug($this->slugify($request->getTitre()));

        # Appel de la Factory
        $article = $this->articleFactory->createFromArticleRequest($request);

        # Dispatch
        $this->dispatcher->dispatch(ArticleEvents::ARTICLE_CREATED, new ArticleEvent($article));

        # Sauvegarde Doctrine
        $this->em->persist($article);
        $this->em->flush();

        return $article;
    }
}