<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AgentRepository")
 */
class Agent
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
    private $matricule;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $first_name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $last_name;



    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ConstraintRH", mappedBy="agent_id")
     */
    private $constraintRHs;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_birth;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Dressing", mappedBy="agent")
     */
    private $dressings;

    public function __construct()
    {
        $this->constraintRHs = new ArrayCollection();
        $this->dressings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }
    
    /**
     * @return Collection|ConstraintRH[]
     */
    public function getConstraintRHs(): Collection
    {
        return $this->constraintRHs;
    }

    public function addConstraintRH(ConstraintRH $constraintRH): self
    {
        if (!$this->constraintRHs->contains($constraintRH)) {
            $this->constraintRHs[] = $constraintRH;
            $constraintRH->setAgentId($this);
        }

        return $this;
    }

    public function removeConstraintRH(ConstraintRH $constraintRH): self
    {
        if ($this->constraintRHs->contains($constraintRH)) {
            $this->constraintRHs->removeElement($constraintRH);
            // set the owning side to null (unless already changed)
            if ($constraintRH->getAgentId() === $this) {
                $constraintRH->setAgentId(null);
            }
        }

        return $this;
    }

    public function getDateBirth(): ?\DateTimeInterface
    {
        return $this->date_birth;
    }

    public function setDateBirth(?\DateTimeInterface $date_birth): self
    {
        $this->date_birth = $date_birth;

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
            $dressing->setAgent($this);
        }

        return $this;
    }

    public function removeDressing(Dressing $dressing): self
    {
        if ($this->dressings->contains($dressing)) {
            $this->dressings->removeElement($dressing);
            // set the owning side to null (unless already changed)
            if ($dressing->getAgent() === $this) {
                $dressing->setAgent(null);
            }
        }

        return $this;
    }
}
