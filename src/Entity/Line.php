<?php

namespace App\Entity;

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
}
