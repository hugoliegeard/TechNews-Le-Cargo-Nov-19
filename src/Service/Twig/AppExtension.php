<?php

namespace App\Service\Twig;


use App\Entity\Article;
use App\Entity\Categorie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Twig\Extension\AbstractExtension;

class AppExtension extends AbstractExtension
{

    private $em, $session, $membre;
    public const NB_SUMMARY_CHAR = 170;

    /**
     * AppExtension constructor.
     * @param EntityManagerInterface $manager
     * @param TokenStorageInterface $tokenStorage
     * @param SessionInterface $session
     * @internal param SessionInterface $session
     */
    public function __construct(EntityManagerInterface $manager,
                                TokenStorageInterface $tokenStorage,
                                SessionInterface $session)
    {
        # Récupération du EntityManager de Doctrine
        $this->em = $manager;

        # Récupération de la session
        $this->session = $session;

        # Récupération du membre, si Token...
        if($tokenStorage->getToken()) {
            $this->membre = $tokenStorage->getToken()->getUser();
        }
    }

    public function getFunctions()
    {
        return [
            new \Twig_Function('getCategories', function () {
                return $this->em->getRepository(Categorie::class)
                    ->findCategoriesHavingArticles();
            }),
            new \Twig_Function('isUserInvited', function () {
                return $this->session->get('inviteUserModal');
            }),
            new \Twig_Function('pendingArticles', function () {
                return $this->em->getRepository(Article::class)
                    ->countAuthorArticlesByStatus($this->membre->getId(), 'review');
            }),
            new \Twig_Function('publishedArticles', function () {
                return $this->em->getRepository(Article::class)
                    ->countAuthorArticlesByStatus($this->membre->getId(), 'published');
            }),
            new \Twig_Function('approvalArticles', function () {
                return $this->em->getRepository(Article::class)
                    ->countArticlesByStatus('editor');
            }),
            new \Twig_Function('correctorArticles', function () {
                return $this->em->getRepository(Article::class)
                    ->countArticlesByStatus('corrector');
            }),
            new \Twig_Function('publisherArticles', function () {
                return $this->em->getRepository(Article::class)
                    ->countArticlesByStatus('publisher');
            }),
        ];
    }

    public function getFilters()
    {
        return [
            new \Twig_Filter('summary', function ($text) {

                # Suppresion des balises HTML
                $string = strip_tags($text);

                # Si mon string est supérieur à 170, je continue
                if (strlen($string) > self::NB_SUMMARY_CHAR) {

                    # Je coupe ma chaine à 170
                    $stringCut = substr($string, 0, self::NB_SUMMARY_CHAR);

                    # Je m'assure de ne pas couper un mot
                    $string = substr($stringCut, 0, strrpos($stringCut, ' ')). '...';

                }

                return $string;

            },['is_safe' => ['html']])
        ];
    }


}