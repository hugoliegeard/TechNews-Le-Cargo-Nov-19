<?php

namespace App\Article;


use App\Entity\Article;

interface ArticleRepositoryInterface
{
    /**
     * Permet de Retourner un article
     * grâce à son identifiant unique.
     * @param $id
     * @param $sourceId
     * @return Article|null
     */
    public function find(int $id, ?int $sourceId = null): ?Article;

    /**
     * Récupérer la liste de
     * tous les articles.
     * @return iterable|null
     */
    public function findAll(): ?iterable;

    /**
     * Retourne les derniers articles
     * depuis l'ensemble de nos sources.
     * @return iterable|null
     */
    public function findLatestArticles(): ?iterable;

    /**
     * Retourne le nombre d'articles
     * de chaque sources. Pour stats.
     * @return int
     */
    public function count(): int;

    # public function findBy();
    # public function findOneBy();
}