<?php

namespace App\Entity;

class Meridian
{
    /** @var string */
    private $code;

    /** @var string */
    private $nom;

    /** @var string */
    private $element;

    /** @var int */
    private $yin;

    public function __construct(string $code, string $nom, string $element, int $yin)
    {
        $this->code = $code;
        $this->nom = $nom;
        $this->element = $element;
        $this->yin = $yin;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @return string
     */
    public function getElement(): string
    {
        return $this->element;
    }

    /**
     * @return int
     */
    public function getYin(): int
    {
        return $this->yin;
    }
}
