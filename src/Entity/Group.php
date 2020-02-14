<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GroupRepository")
 */
class Group
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
    private $label_fr;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $label_ar;

    /**
     * @ORM\Column(type="integer")
     */
    private $year;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\District", inversedBy="groups")
     */
    private $district;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Season", inversedBy="groups")
     * @ORM\JoinColumn(nullable=false)
     */
    private $season;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\RollerType")
     */
    private $rollerType;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TourProgram", mappedBy="groupe")
     */
    private $tourPrograms;

    public function __construct()
    {
        $this->tourPrograms = new ArrayCollection();
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

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getDistrict(): ?District
    {
        return $this->district;
    }

    public function setDistrict(?District $district): self
    {
        $this->district = $district;

        return $this;
    }

    public function getSeason(): ?Season
    {
        return $this->season;
    }

    public function setSeason(?Season $season): self
    {
        $this->season = $season;

        return $this;
    }

    public function getRollerType(): ?RollerType
    {
        return $this->rollerType;
    }

    public function setRollerType(?RollerType $rollerType): self
    {
        $this->rollerType = $rollerType;

        return $this;
    }

    /**
     * @return Collection|TourProgram[]
     */
    public function getTourPrograms(): Collection
    {
        return $this->tourPrograms;
    }

    public function addTourProgram(TourProgram $tourProgram): self
    {
        if (!$this->tourPrograms->contains($tourProgram)) {
            $this->tourPrograms[] = $tourProgram;
            $tourProgram->setGroupe($this);
        }

        return $this;
    }

    public function removeTourProgram(TourProgram $tourProgram): self
    {
        if ($this->tourPrograms->contains($tourProgram)) {
            $this->tourPrograms->removeElement($tourProgram);
            // set the owning side to null (unless already changed)
            if ($tourProgram->getGroupe() === $this) {
                $tourProgram->setGroupe(null);
            }
        }

        return $this;
    }
}
