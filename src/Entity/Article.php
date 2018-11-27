<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="text")
     */
    private $contenu;

    /**
     * @ORM\Column(type="string", length=180)
     */
    private $featuredImage;

    /**
     * @ORM\Column(type="boolean")
     */
    private $special;

    /**
     * @ORM\Column(type="boolean")
     */
    private $spotlight;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categorie",
     *     inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Membre",
     *     inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $membre;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreation;

    private $sourceId = '644751';

    /**
     * @ORM\Column(type="array")
     */
    private $status;

    /**
     * Article constructor.
     */
    public function __construct()
    {
    }

    /**
     * Créer et Retourne un Objet Article
     * @param int|null $id
     * @param string $titre
     * @param string $slug
     * @param string $contenu
     * @param string $featuredImage
     * @param bool $special
     * @param bool $spotlight
     * @param Categorie $categorie
     * @param Membre $membre
     * @param \DateTime $dateCreation
     * @param int|null $sourceId
     * @param iterable $status
     * @return Article
     */
    public static function create(
        ?int $id = null,
        string $titre,
        string $slug,
        string $contenu,
        string $featuredImage,
        bool $special,
        bool $spotlight,
        Categorie $categorie,
        Membre $membre,
        \DateTime $dateCreation,
        ?int $sourceId = null,
        iterable $status = []
    )
    {
        $article = new self();

        $article->id = $id;
        $article->titre = $titre;
        $article->slug = $slug;
        $article->contenu = $contenu;
        $article->featuredImage = $featuredImage;
        $article->special = $special;
        $article->spotlight = $spotlight;
        $article->categorie = $categorie;
        $article->membre = $membre;
        $article->dateCreation = $dateCreation;
        $article->sourceId = $sourceId;
        $article->status = $status;

        return $article;
    }

    public function update(
        string $titre,
        string $slug,
        string $contenu,
        string $featuredImage,
        bool $special,
        bool $spotlight,
        Categorie $categorie
    )
    {
        $this->titre = $titre;
        $this->slug = $slug;
        $this->contenu = $contenu;
        $this->featuredImage = $featuredImage;
        $this->special = $special;
        $this->spotlight = $spotlight;
        $this->categorie = $categorie;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getFeaturedImage(): ?string
    {
        return $this->featuredImage;
    }

    public function setFeaturedImage(string $featuredImage): self
    {
        $this->featuredImage = $featuredImage;

        return $this;
    }

    public function getSpecial(): ?bool
    {
        return $this->special;
    }

    public function setSpecial(bool $special): self
    {
        $this->special = $special;

        return $this;
    }

    public function getSpotlight(): ?bool
    {
        return $this->spotlight;
    }

    public function setSpotlight(bool $spotlight): self
    {
        $this->spotlight = $spotlight;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
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
     * @return mixed
     */
    public function getMembre()
    {
        return $this->membre;
    }

    /**
     * @param mixed $membre
     */
    public function setMembre($membre): void
    {
        $this->membre = $membre;
    }

    public function isAuteur(?Membre $membre = null): bool {
        return $membre && $this->getMembre()->getId() === $membre->getId();
    }

    /**
     * @return mixed
     */
    public function getSourceId()
    {
        return $this->sourceId;
    }

    /**
     * @param mixed $sourceId
     */
    public function setSourceId($sourceId)
    {
        $this->sourceId = $sourceId;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
}
