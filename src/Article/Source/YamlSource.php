<?php

namespace App\Article\Source;


use App\Article\ArticleAbstractSource;
use App\Article\Provider\YamlProvider;
use App\Controller\HelperTrait;
use App\Entity\Article;
use App\Entity\Categorie;
use App\Entity\Membre;
use Tightenco\Collect\Support\Collection;

class YamlSource extends ArticleAbstractSource
{

    use HelperTrait;

    private $articles;
    protected $sourceId = '644750';

    /**
     * YamlSource constructor.
     * @param YamlProvider $yamlProvider
     * @internal param $articles
     */
    public function __construct(YamlProvider $yamlProvider)
    {
        $this->articles = new Collection($yamlProvider->getArticles());

        #foreach ($this->articles as &$article){
        #    $article = $this->createArticleFromArray($article);
        #}
    }


    /**
     * Permet de convertir un tableau en Article
     * @param iterable $article
     * @return Article|null
     */
    protected function createArticleFromArray(iterable $article): ?Article
    {
        $tmp = (object)$article;

        # Construire l'objet Categorie
        // TODO : Attention aux ID qui risque d'etre différent
        $categorie = new Categorie();
        $categorie->setId($tmp->categorie['id']);
        $categorie->setNom($tmp->categorie['libelle']);
        $categorie->setSlug($this->slugify($tmp->categorie['libelle']));

        # Construire l'objet Auteur
        $membre = Membre::create(
          $tmp->auteur['id'],
          $tmp->auteur['prenom'],
          $tmp->auteur['nom'],
          $tmp->auteur['email'],
          '',
          []
        );

        # Construire l'objet Article
        $date = new \DateTime();
        return Article::create(
            $tmp->id,
            $tmp->titre,
            $this->slugify($tmp->titre),
            $tmp->contenu,
            $tmp->featuredimage,
            $tmp->special,
            $tmp->spotlight,
            $categorie,
            $membre,
            $date->setTimestamp($tmp->datecreation),
            $this->sourceId
        );
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
        $article = $this->articles->firstWhere('id', $id);
        return $article == null ? null : $this->createArticleFromArray($article);
    }

    /**
     * Récupérer la liste de
     * tous les articles.
     * @return iterable|null
     */
    public function findAll(): ?iterable
    {
        $articles = new Collection();

        foreach ($this->articles as $article) {
            $articles[] = $this->createArticleFromArray($article);
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
        /** @var Collection $articles */
        $articles = $this->findAll();
        return $articles->sortBy('datecreation')
            ->slice(-5);
    }

    /**
     * Retourne le nombre d'articles
     * de chaque sources. Pour stats.
     * @return int
     */
    public function count(): int
    {
        $this->articles->count();
    }
}