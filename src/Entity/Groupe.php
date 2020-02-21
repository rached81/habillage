<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GroupeRepository")
 */
class Groupe
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
    private $label_ar;

    /**
     * @ORM\Column(type="integer")
     */
    private $year;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\District", inversedBy="groupes")
     */
    private $district;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\RollerType", inversedBy="groupes")
     */
    private $rollerType;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Season", inversedBy="groupes")
     */
    private $season;

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

    public function getRollerType(): ?RollerType
    {
        return $this->rollerType;
    }

    public function setRollerType(?RollerType $rollerType): self
    {
        $this->rollerType = $rollerType;

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
}
