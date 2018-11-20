<?php

namespace App\Article;


interface ArticleCatalogueInterface extends ArticleRepositoryInterface
{
    public function addSource(ArticleAbstractSource $source):void;
    public function setSources(iterable $sources):void;
    public function getSources():iterable;
}
