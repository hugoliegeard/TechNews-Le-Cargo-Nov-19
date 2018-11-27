<?php

namespace App\Article\Source;


use App\Article\ArticleAbstractSource;
use App\Entity\Article;
use Doctrine\Common\Persistence\ObjectManager;

class DoctrineSource extends ArticleAbstractSource
{

    protected $sourceId;
    private $repository;
    private $entity = Article::class;

    public function __construct(ObjectManager $manager, string $sourceId)
    {
        $this->repository = $manager->getRepository($this->entity);
        $this->sourceId = $sourceId;
    }

    /**
     * Permet de convertir un tableau en Article
     * @param iterable $article
     * @return Article|null
     */
    protected function createArticleFromArray(iterable $article): ?Article
    {
        return null;
    }

    /**
     * Permet de Retourner un article
     * grâce à son identifiant unique.
     * @param int $id
     * @param int|null $sourceId
     * @return Article|null
     */
    public function find(int $id, ?int $sourceId = null): ?Article
    {
        $article = $this->repository->find($id);
        $article->setSourceId($this->sourceId);
        return $article;
    }

    /**
     * Récupérer la liste de
     * tous les articles.
     * @return iterable|null
     */
    public function findAll(): ?iterable
    {
        $articles = $this->repository->findAll();
        foreach ($articles as &$article) {
            $article->setSourceId($this->sourceId);
        }
        return $articles;
    }

    /**
     * Retourne les derniers articles
     * depuis l'ensemble de nos sources.
     * @return iterable|null
     */
    public function findLatestArticles(): ?iterable
    {
        $articles = $this->repository->findLatestArticles();
        foreach ($articles as &$article) {
            $article->setSourceId($this->sourceId);
        }
        return $articles;
    }

    /**
     * Retourne le nombre d'articles
     * de chaque sources. Pour stats.
     * @return int
     */
    public function count(): int
    {
        return $this->repository->countArticles();
    }
}