<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DressingTypeRepository")
 */
class DressingType
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $label_fr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $label_ar;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Dressing", mappedBy="dressingType")
     */
    private $dressings;

    public function __construct()
    {
        $this->dressings = new ArrayCollection();
    }

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

    /**
     * @return Collection|Dressing[]
     */
    public function getDressings(): Collection
    {
        return $this->dressings;
    }

    public function addDressing(Dressing $dressing): self
    {
        if (!$this->dressings->contains($dressing)) {
            $this->dressings[] = $dressing;
            $dressing->setDressingType($this);
        }

        return $this;
    }

    public function removeDressing(Dressing $dressing): self
    {
        if ($this->dressings->contains($dressing)) {
            $this->dressings->removeElement($dressing);
            // set the owning side to null (unless already changed)
            if ($dressing->getDressingType() === $this) {
                $dressing->setDressingType(null);
            }
        }

        return $this;
    }
}
