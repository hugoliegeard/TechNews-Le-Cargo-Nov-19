<?php

namespace App\Membre;


use App\Entity\Membre;
use Symfony\Component\EventDispatcher\Event;

class MembreEvent extends Event
{
    private $membre;

    /**
     * MembreEvent constructor.
     * @param $membre
     */
    public function __construct(Membre $membre)
    {
        $this->membre = $membre;
    }

    /**
     * @return Membre
     */
    public function getMembre(): Membre
    {
        return $this->membre;
    }
}