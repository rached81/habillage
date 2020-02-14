<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StationLineRepository")
 */
class StationLine
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Line", inversedBy="stationLines")
     */
    private $line;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Station", inversedBy="stationLines")
     */
    private $Station;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLine(): ?Line
    {
        return $this->line;
    }

    public function setLine(?Line $line): self
    {
        $this->line = $line;

        return $this;
    }

    public function getStation(): ?Station
    {
        return $this->Station;
    }

    public function setStation(?Station $Station): self
    {
        $this->Station = $Station;

        return $this;
    }
}
