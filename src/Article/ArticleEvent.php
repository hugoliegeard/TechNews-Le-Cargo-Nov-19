<?php

namespace App\Article;


use App\Entity\Article;
use Symfony\Component\EventDispatcher\Event;

class ArticleEvent extends Event
{
    private $article;

    /**
     * ArticleEvent constructor.
     * @param $article
     */
    public function __construct(Article $article)
    {
        $this->membre = $article;
    }

    /**
     * @return Article
     */
    public function getArticle(): Article
    {
        return $this->article;
    }
}