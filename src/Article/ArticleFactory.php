<?php

namespace App\Article;


use App\Entity\Article;

class ArticleFactory
{

    private $sourceId;

    /**
     * ArticleFactory constructor.
     * @param string $sourceId
     */
    public function __construct(string $sourceId)
    {
        $this->sourceId = $sourceId;
    }


    /**
     * Création d'un Objet Article à partir d'un Article Request.
     * Pour insertion en BDD.
     * @param ArticleRequest $request
     * @return Article
     */
    public function createFromArticleRequest(ArticleRequest $request): Article
    {
        return Article::create(
            $request->getId(),
            $request->getTitre(),
            $request->getSlug(),
            $request->getContenu(),
            $request->getFeaturedImage(),
            $request->getSpecial(),
            $request->getSpotlight(),
            $request->getCategorie(),
            $request->getMembre(),
            $request->getDateCreation(),
            $this->sourceId,
            $request->getStatus()
        );
    }
}