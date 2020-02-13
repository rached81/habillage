<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StationRepository")
 */
class Station
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $label_fr;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $label_ar;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $alias;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabelFr(): ?string
    {
        return $this->label_fr;
    }

    public function setLabelFr(string $label_fr): self
    {
        $this->label_fr = $label_fr;

        return $this;
    }

    public function getLabelAr(): ?string
    {
        return $this->label_ar;
    }

    public function setLabelAr(string $label_ar): self
    {
        $this->label_ar = $label_ar;

        return $this;
    }

    public function getAlias(): ?string
    {
        return $this->alias;
    }

    public function setAlias(string $alias): self
    {
        $this->alias = $alias;

        return $this;
    }
}
