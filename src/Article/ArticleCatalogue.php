<?php

namespace App\Article;


use App\Entity\Article;
use App\Exception\DuplicateCatalogueArticleException;
use Tightenco\Collect\Support\Collection;

class ArticleCatalogue implements ArticleCatalogueInterface
{

    private $sources = [];

    public function addSource($source): void
    {
        if (!in_array($source, $this->sources)) {
            $this->sources[] = $source;
        }
    }

    public function setSources(iterable $sources): void
    {
        $this->sources = $sources;
    }

    public function getSources(): iterable
    {
        return $this->sources;
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
        $articles = new Collection();

        /** @var ArticleAbstractSource $source */
        foreach ($this->sources as $source) {

            if (null !== $sourceId) {
                if ($source->getSourceId() == $sourceId) {
                    return $source->find($id);
                }
            }

            $article = $source->find($id);

            # Si ma source ne renvoi pas null
            # alors je l'ajoute au tableau
            if (null !== $article) {
                $articles[] = $article;
            }

            # Vérification des doublons
            if ($articles->count() > 1) {
                throw new DuplicateCatalogueArticleException(sprintf(
                    'Return value of %s cannot return more than one record on line %s',
                    get_class($this) . '::' . __FUNCTION__ . '()', __LINE__
                ));
            }
        }

        # Je retourne l'article de la dernière source
        return $articles->pop();

    }

    /**
     * Récupérer la liste de
     * tous les articles.
     * @return iterable|null
     */
    public function findAll(): ?iterable
    {
        return $this->sourcesIterator('findAll')
            ->sortByDesc(function ($col) {
                return $col->getDateCreation();
            });
    }

    /**
     * Retourne les derniers articles
     * depuis l'ensemble de nos sources.
     * @return iterable|null
     */
    public function findLatestArticles(): ?iterable
    {
        return $this->sourcesIterator('findLatestArticles')
            ->sortByDesc(function ($col) {
                return $col->getDateCreation();
            })
            ->slice(-5);
    }

    /**
     * Retourne le nombre d'articles
     * de chaque sources. Pour stats.
     * @return int
     */
    public function count(): int
    {
        return count($this->sources);
    }

    /**
     * Parcours les sources
     * @param string $callback Méthode à appeler sur les sources
     * @internal param string $functionToCall
     * @return Collection
     */
    private function sourcesIterator(string $callback): Collection
    {
        $articles = new Collection();
        /** @var ArticleAbstractSource $source */
        /** @var Article $article */
        foreach ($this->sources as $source) {
            foreach ($source->$callback() as $article) {
                $articles[] = $article;
            }
        }

        return $articles;
    }
}