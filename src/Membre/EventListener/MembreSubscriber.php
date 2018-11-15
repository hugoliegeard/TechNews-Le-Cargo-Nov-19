<?php

namespace App\Membre\EventListener;


use App\Entity\Membre;
use App\Entity\Newsletter;
use App\Membre\MembreEvent;
use App\Membre\MembreEvents;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Http\SecurityEvents;

class MembreSubscriber implements EventSubscriberInterface
{

    private $manager;

    /**
     * MembreSubscriber constructor.
     * @param $manager
     */
    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    public static function getSubscribedEvents()
    {
        return [
            SecurityEvents::INTERACTIVE_LOGIN => 'onSecurityInteractiveLogin',
            MembreEvents::MEMBRE_CREATED => 'onMembreCreated'
        ];
    }

    /**
     * @param MembreEvent $event
     */
    public function onMembreCreated(MembreEvent $event)
    {
        $newsletter = new Newsletter();
        $newsletter->setEmail($event->getMembre()->getEmail());
        $this->manager->persist($newsletter);
        $this->manager->flush();
    }

    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
    {
        # Récupération de l'utilisateur
        $membre = $event->getAuthenticationToken()->getUser();

        # Mettre à jour la date de dernière connexion
        if ($membre instanceof Membre) {

            # Mise à jour du Timestamp
            $membre->setDerniereConnexion();

            # Sauvegarde en BDD
            $this->manager->flush();

        }

    }
}