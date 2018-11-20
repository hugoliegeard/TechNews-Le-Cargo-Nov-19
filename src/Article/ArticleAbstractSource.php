<?php

namespace App\Article;


use App\Entity\Article;

abstract class ArticleAbstractSource implements ArticleRepositoryInterface
{

    protected $sourceId = '';

    /**
     * @return string
     */
    public function getSourceId(): string
    {
        return $this->sourceId;
    }

    /**
     * Permet de convertir un tableau en Article
     * @param iterable $article
     * @return Article|null
     */
    abstract protected function createArticleFromArray(iterable $article): ?Article;
}