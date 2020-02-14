<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SessionRepository")
 */
class Session
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="time")
     */
    private $startTime;

    /**
     * @ORM\Column(type="time")
     */
    private $endTime;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SessionType", inversedBy="sessions")
     */
    private $sessionType;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TourProgram", inversedBy="sessions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tourProgram;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypicalDay")
     */
    private $typicalDay;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartTime(): ?\DateTimeInterface
    {
        return $this->startTime;
    }

    public function setStartTime(\DateTimeInterface $startTime): self
    {
        $this->startTime = $startTime;

        return $this;
    }

    public function getEndTime(): ?\DateTimeInterface
    {
        return $this->endTime;
    }

    public function setEndTime(\DateTimeInterface $endTime): self
    {
        $this->endTime = $endTime;

        return $this;
    }

    public function getSessionType(): ?SessionType
    {
        return $this->sessionType;
    }

    public function setSessionType(?SessionType $sessionType): self
    {
        $this->sessionType = $sessionType;

        return $this;
    }

    public function getTourProgram(): ?TourProgram
    {
        return $this->tourProgram;
    }

    public function setTourProgram(?TourProgram $tourProgram): self
    {
        $this->tourProgram = $tourProgram;

        return $this;
    }

    public function getTypicalDay(): ?TypicalDay
    {
        return $this->typicalDay;
    }

    public function setTypicalDay(?TypicalDay $typicalDay): self
    {
        $this->typicalDay = $typicalDay;

        return $this;
    }
}
