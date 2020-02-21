<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NetworksRepository")
 */
class Networks
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $labelFr;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $labelAr;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabelFr(): ?string
    {
        return $this->labelFr;
    }

    public function setLabelFr(string $labelFr): self
    {
        $this->labelFr = $labelFr;

        return $this;
    }

    public function getLabelAr(): ?string
    {
        return $this->labelAr;
    }

    public function setLabelAr(string $labelAr): self
    {
        $this->labelAr = $labelAr;

        return $this;
    }
}
