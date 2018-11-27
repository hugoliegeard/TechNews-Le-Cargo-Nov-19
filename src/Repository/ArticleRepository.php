<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]|iterable findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{

    const MAX_RESULTS = 5;
    const MAX_SUGGESTIONS = 3;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Article::class);
    }

    /**
     * Récupère les derniers articles
     */
    public function findLatestArticles()
    {
        return $this->createQueryBuilder('a')
            ->orderBy('a.id', 'DESC')
            ->setMaxResults(self::MAX_RESULTS)
            ->getQuery()
            ->getResult();
    }

    public function findArticlesSuggestions($idArticle, $idCategorie)
    {
        return $this->createQueryBuilder('a')
            # Tous les articles d'une catégorie ($idCategorie)
            ->where('a.categorie = :category_id')
            ->setParameter('category_id', $idCategorie)
            # sauf un article ($idArticle)
            ->andWhere('a.id != :article_id')
            ->setParameter('article_id', $idArticle)
            # 3 Articles maximum
            ->setMaxResults(self::MAX_SUGGESTIONS)
            # par ordre décroissant
            ->orderBy('a.id', 'DESC')
            # On finalise
            ->getQuery()
            ->getResult();
    }

    /**
     * Récupérer les articles en Spotlight
     * @return mixed
     */
    public function findSpotlightArticles()
    {
        return $this->createQueryBuilder('a')
            ->where('a.spotlight = 1')
            ->orderBy('a.id', 'DESC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }

    /**
     * Récupérer les articles "special" de la sidebar
     * @return mixed
     */
    public function findSpecialArticles()
    {
        return $this->createQueryBuilder('a')
            ->where('a.special = 1')
            ->orderBy('a.id', 'DESC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }

    /**
     * Compte le nombre d'article
     * dans la BDD.
     */
    public function countArticles()
    {
        try {
            return $this->createQueryBuilder('a')
                ->select('COUNT(a)')
                ->getQuery()
                ->getSingleScalarResult();
        } catch (NonUniqueResultException $e) {
            return 0;
        }
    }

    /**
     * Récupérer tous les articles d'un Auteur par Statut
     * @param int $idMembre
     * @param string $status
     * @return mixed
     */
    public function findAuthorArticlesByStatus(int $idMembre, string $status)
    {
        return $this->createQueryBuilder('a')
            ->where('a.membre = :membre_id')
            ->setParameter('membre_id', $idMembre)
            ->andWhere('a.status LIKE :status')
            ->setParameter('status', "%$status%")
            ->orderBy('a.id', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Récupérer tous les articles par Statut
     * @param string $status
     * @return mixed
     */
    public function findArticlesByStatus(string $status)
    {
        return $this->createQueryBuilder('a')
            ->where('a.status LIKE :status')
            ->setParameter('status', "%$status%")
            ->orderBy('a.id', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Compter les articles d'un Auteur par Statut
     * @param int $idMembre
     * @param string $status
     * @return mixed
     */
    public function countAuthorArticlesByStatus(int $idMembre, string $status)
    {
        try {
            return $this->createQueryBuilder('a')
                ->select('COUNT(a)')
                ->where('a.membre = :membre_id')
                ->setParameter('membre_id', $idMembre)
                ->andWhere('a.status LIKE :status')
                ->setParameter('status', "%$status%")
                ->getQuery()
                ->getSingleScalarResult();
        } catch (NonUniqueResultException $e) {
            return 0;
        }
    }

    /**
     * Compter les articles par Statut
     * @param string $status
     * @return mixed
     */
    public function countArticlesByStatus(string $status)
    {
        try {
            return $this->createQueryBuilder('a')
                ->select('COUNT(a)')
                ->where('a.status LIKE :status')
                ->setParameter('status', "%$status%")
                ->getQuery()
                ->getSingleScalarResult();
        } catch (NonUniqueResultException $e) {
            return 0;
        }
    }

}
