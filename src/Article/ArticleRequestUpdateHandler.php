<?php

namespace App\Article;


use App\Controller\HelperTrait;
use App\Entity\Article;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ArticleRequestUpdateHandler
{

    use HelperTrait;

    private $em, $articleAssetsDir;

    public function __construct(
        ObjectManager $manager,
        string $articleAssetsDir
    )
    {
        $this->em = $manager;
        $this->articleAssetsDir = $articleAssetsDir;
    }

    public function handle(ArticleRequest $request, Article $article): Article
    {

        # Traitement de l'upload de l'image
        /** @var UploadedFile $image */
        $image = $request->getFeaturedImage();

        /* TODO : Pensez à supprimer l'image sur le serveur */
        # On vérifie si l'utilisateur à soumis une nouvelle image.
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
            $request->setFeaturedImage($article->getFeaturedImage());
        }

        # Vérification du Slug
        if( null === $request->getSlug() ) {
            $request->setSlug($this->slugify($request->getTitre()));
        }

        # Mise à jour des données
        $article->update(
          $request->getTitre(),
          $request->getSlug(),
          $request->getContenu(),
          $request->getFeaturedImage(),
          $request->getSpecial(),
          $request->getSpotlight(),
          $request->getCategorie()
        );

        # Sauvegarde en BDD
        $this->em->flush();

        # On retourne notre Article
        return $article;

    }

}