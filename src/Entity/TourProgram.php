<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TourProgramRepository")
 */
class TourProgram
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
    private $code;

    /**
     * @ORM\Column(type="time")
     */
    private $amplitude;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $driverPaidHours;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $receiverPaidHours;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Groupe", inversedBy="tourPrograms")
     * @ORM\JoinColumn(nullable=false)
     */
    private $groupe;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Line", inversedBy="tourPrograms")
     */
    private $line;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Session", mappedBy="tourProgram")
     */
    private $sessions;

    public function __construct()
    {
        $this->sessions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getAmplitude(): ?\DateTimeInterface
    {
        return $this->amplitude;
    }

    public function setAmplitude(\DateTimeInterface $amplitude): self
    {
        $this->amplitude = $amplitude;

        return $this;
    }

    public function getDriverPaidHours(): ?string
    {
        return $this->driverPaidHours;
    }

    public function setDriverPaidHours(string $driverPaidHours): self
    {
        $this->driverPaidHours = $driverPaidHours;

        return $this;
    }

    public function getReceiverPaidHours(): ?string
    {
        return $this->receiverPaidHours;
    }

    public function setReceiverPaidHours(string $receiverPaidHours): self
    {
        $this->receiverPaidHours = $receiverPaidHours;

        return $this;
    }

    public function getGroupe(): ?Groupe
    {
        return $this->groupe;
    }

    public function setGroupe(?Groupe $groupe): self
    {
        $this->groupe = $groupe;

        return $this;
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

    /**
     * @return Collection|Session[]
     */
    public function getSessions(): Collection
    {
        return $this->sessions;
    }

    public function addSession(Session $session): self
    {
        if (!$this->sessions->contains($session)) {
            $this->sessions[] = $session;
            $session->setTourProgram($this);
        }

        return $this;
    }

    public function removeSession(Session $session): self
    {
        if ($this->sessions->contains($session)) {
            $this->sessions->removeElement($session);
            // set the owning side to null (unless already changed)
            if ($session->getTourProgram() === $this) {
                $session->setTourProgram(null);
            }
        }

        return $this;
    }
}
