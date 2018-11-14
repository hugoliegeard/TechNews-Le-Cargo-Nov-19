<?php

namespace App\Membre;


use App\Entity\Membre;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class MembreFactory
{

    private $encoders;

    public function __construct(EncoderFactoryInterface $encoders)
    {
        $this->encoders = $encoders;
    }

    /**
     * Permet de créer un Membre à partir d'une Requète
     * @param MembreRequest $request
     * @return Membre
     */
    public function createFromMembreRequest(MembreRequest $request): Membre
    {
        return $membre = Membre::create(
            null,
            $request->getPrenom(),
            $request->getNom(),
            $request->getEmail(),
            $this->encodePassword($request->getPassword()),
            $request->getRoles(),
            $request->getDateInscription()
        );
    }

    /**
     * Encodage du mot de passe d'un membre
     * Autre possibilité : UserPasswordEncoderInterface
     * @param string $password
     * @return string
     */
    private function encodePassword(string $password): string
    {
        $encoder = $this->encoders->getEncoder(Membre::class);
        return $encoder->encodePassword($password, null);
    }
}