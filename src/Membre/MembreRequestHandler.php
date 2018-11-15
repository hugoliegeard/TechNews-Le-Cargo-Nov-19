<?php

namespace App\Membre;


use App\Entity\Membre;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class MembreRequestHandler
{

    private $manager, $membreFactory, $dispatcher;

    /**
     * MembreRequestHandler constructor.
     * @param ObjectManager $manager
     * @param EventDispatcherInterface $dispatcher
     * @param MembreFactory $membreFactory
     */
    public function __construct(ObjectManager $manager,
                                EventDispatcherInterface $dispatcher,
                                MembreFactory $membreFactory)
    {
        $this->manager = $manager;
        $this->membreFactory = $membreFactory;
        $this->dispatcher = $dispatcher;
    }

    public function handle(MembreRequest $request): Membre
    {
        # Création de l'objet membre
        $membre = $this->membreFactory->createFromMembreRequest($request);

        # On sauvegarde dans la BDD le nouveau membre
        $this->manager->persist($membre);
        $this->manager->flush();

        # On emet notre évènement
        $this->dispatcher->dispatch(MembreEvents::MEMBRE_CREATED,
            new MembreEvent($membre));

        # On retourne le nouvel utilisateur
        return $membre;

    }
}