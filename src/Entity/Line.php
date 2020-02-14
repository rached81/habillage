<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LineRepository")
 */
class Line
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $label_fr;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $label_ar;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\District", inversedBy="lines_by_district")
     */
    private $district_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeLine")
     */
    private $type_line_id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TourProgram", mappedBy="line")
     */
    private $tourPrograms;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Dressing", mappedBy="line")
     */
    private $dressings;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\StationLine", mappedBy="line")
     */
    private $stationLines;

    public function __construct()
    {
        $this->tourPrograms = new ArrayCollection();
        $this->dressings = new ArrayCollection();
        $this->stationLines = new ArrayCollection();
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

    public function getDistrictId(): ?District
    {
        return $this->district_id;
    }

    public function setDistrictId(?District $district_id): self
    {
        $this->district_id = $district_id;

        return $this;
    }

    public function getTypeLineId(): ?TypeLine
    {
        return $this->type_line_id;
    }

    public function setTypeLineId(?TypeLine $type_line_id): self
    {
        $this->type_line_id = $type_line_id;

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
            $tourProgram->setLine($this);
        }

        return $this;
    }

    public function removeTourProgram(TourProgram $tourProgram): self
    {
        if ($this->tourPrograms->contains($tourProgram)) {
            $this->tourPrograms->removeElement($tourProgram);
            // set the owning side to null (unless already changed)
            if ($tourProgram->getLine() === $this) {
                $tourProgram->setLine(null);
            }
        }

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
            $dressing->setLine($this);
        }

        return $this;
    }

    public function removeDressing(Dressing $dressing): self
    {
        if ($this->dressings->contains($dressing)) {
            $this->dressings->removeElement($dressing);
            // set the owning side to null (unless already changed)
            if ($dressing->getLine() === $this) {
                $dressing->setLine(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|StationLine[]
     */
    public function getStationLines(): Collection
    {
        return $this->stationLines;
    }

    public function addStationLine(StationLine $stationLine): self
    {
        if (!$this->stationLines->contains($stationLine)) {
            $this->stationLines[] = $stationLine;
            $stationLine->setLine($this);
        }

        return $this;
    }

    public function removeStationLine(StationLine $stationLine): self
    {
        if ($this->stationLines->contains($stationLine)) {
            $this->stationLines->removeElement($stationLine);
            // set the owning side to null (unless already changed)
            if ($stationLine->getLine() === $this) {
                $stationLine->setLine(null);
            }
        }

        return $this;
    }
}
