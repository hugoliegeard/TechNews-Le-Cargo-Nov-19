<?php

namespace App\Membre;


use App\Entity\Membre;
use Doctrine\Common\Persistence\ObjectManager;

class MembreRequestHandler
{

    private $manager, $membreFactory;

    /**
     * MembreRequestHandler constructor.
     * @param $manager
     * @param $membreFactory
     */
    public function __construct(ObjectManager $manager, MembreFactory $membreFactory)
    {
        $this->manager = $manager;
        $this->membreFactory = $membreFactory;
    }

    public function handle(MembreRequest $request): Membre
    {
        # Création de l'objet membre
        $membre = $this->membreFactory->createFromMembreRequest($request);

        # On sauvegarde dans la BDD le nouveau membre
        $this->manager->persist($membre);
        $this->manager->flush();

        # On retourne le nouvel utilisateur
        return $membre;

    }
}