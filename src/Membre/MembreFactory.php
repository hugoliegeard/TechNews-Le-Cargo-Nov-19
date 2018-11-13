<?php

namespace App\Membre;


use App\Entity\Membre;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class MembreFactory
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function createFromMembreRequest(MembreRequest $request): Membre
    {
        $membre = new Membre();
        $membre->setPrenom($request->getPrenom());
        $membre->setNom($request->getNom());
        $membre->setEmail($request->getEmail());
        $membre->setRoles($request->getRoles());
        $membre->setPassword(
            $this->encoder->encodePassword(
                $membre,
                $request->getPassword()
            )
        );

        return $membre;
    }
}