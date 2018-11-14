<?php

namespace App\Article;


use App\Entity\Article;
use App\Entity\Membre;
use Symfony\Component\Asset\Packages;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;

class ArticleRequest
{
    private $id;

    /**
     * @Assert\NotBlank(message="Vous devez saisir un titre")
     * @Assert\Length(
     *     max="255",
     *     maxMessage="Votre titre est trop long. Pas plus de {{ limit }} caractères."
     * )
     */
    private $titre;
    private $slug;

    /**
     * @Assert\NotBlank(message="N'oubliez pas votre article. Ce serait ballot...")
     */
    private $contenu;

    /**
     * @Assert\Image(
     *     mimeTypesMessage="Vérifiez le format de votre fichier. Uniquement des images.",
     *     maxSize="2M", maxSizeMessage="Votre image est trop lourde. Pas plus de 2M."
     * )
     */
    private $featuredImage;
    private $imageUrl;
    private $special;
    private $spotlight;

    /**
     * @Assert\NotNull(message="N'oubliez pas de choisir une catégorie")
     */
    private $categorie;
    private $membre;
    private $dateCreation;

    /**
     * ArticleRequest constructor.
     * @param $membre
     */
    public function __construct(Membre $membre)
    {
        $this->membre = $membre;
        $this->dateCreation = new \DateTime();
    }

    /**
     * Permet de créer un ArticleRequest depuis un Article
     * @param Article $article
     * @param string $articlesDir
     * @param string $articleAssetsDir
     * @param Packages $packages
     * @return ArticleRequest
     */
    public static function createFromArticle(
        Article $article,
        string $articlesDir,
        string $articleAssetsDir,
        Packages $packages
    ): self
    {
        $ar = new self($article->getMembre());
        $ar->id = $article->getId();
        $ar->titre = $article->getTitre();
        $ar->slug = $article->getSlug();
        $ar->contenu = $article->getContenu();
        $ar->featuredImage = new File($articleAssetsDir . '/' . $article->getFeaturedImage());
        $ar->imageUrl = $packages->getUrl($articlesDir . '/' . $article->getFeaturedImage());
        $ar->special = $article->getSpecial();
        $ar->spotlight = $article->getSpotlight();
        $ar->dateCreation = $article->getDateCreation();
        $ar->categorie = $article->getCategorie();

        return $ar;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre): void
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     */
    public function setSlug($slug): void
    {
        $this->slug = $slug;
    }

    /**
     * @return mixed
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param mixed $contenu
     */
    public function setContenu($contenu): void
    {
        $this->contenu = $contenu;
    }

    /**
     * @return mixed
     */
    public function getFeaturedImage()
    {
        return $this->featuredImage;
    }

    /**
     * @param mixed $featuredImage
     */
    public function setFeaturedImage($featuredImage): void
    {
        $this->featuredImage = $featuredImage;
    }

    /**
     * @return mixed
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * @param mixed $imageUrl
     */
    public function setImageUrl($imageUrl): void
    {
        $this->imageUrl = $imageUrl;
    }

    /**
     * @return mixed
     */
    public function getSpecial()
    {
        return $this->special;
    }

    /**
     * @param mixed $special
     */
    public function setSpecial($special): void
    {
        $this->special = $special;
    }

    /**
     * @return mixed
     */
    public function getSpotlight()
    {
        return $this->spotlight;
    }

    /**
     * @param mixed $spotlight
     */
    public function setSpotlight($spotlight): void
    {
        $this->spotlight = $spotlight;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie): void
    {
        $this->categorie = $categorie;
    }

    /**
     * @return Membre
     */
    public function getMembre(): Membre
    {
        return $this->membre;
    }

    /**
     * @param Membre $membre
     */
    public function setMembre(Membre $membre): void
    {
        $this->membre = $membre;
    }

    /**
     * @return \DateTime
     */
    public function getDateCreation(): \DateTime
    {
        return $this->dateCreation;
    }

    /**
     * @param \DateTime $dateCreation
     */
    public function setDateCreation(\DateTime $dateCreation): void
    {
        $this->dateCreation = $dateCreation;
    }


}