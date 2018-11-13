<?php

namespace App\Controller;


use Behat\Transliterator\Transliterator;

trait HelperTrait
{
    /**
     * Permet de générer un slug à partir
     * d'un string.
     * @param $text
     * @return string
     */
    public function slugify(string $text): string
    {
        return Transliterator::transliterate($text);
    }
}