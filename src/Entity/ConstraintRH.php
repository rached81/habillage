<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ConstraintRHRepository")
 */
class ConstraintRH
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $start_date;

    /**
     * @ORM\Column(type="date")
     */
    private $end_date;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comment;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $attachment;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ConstraintType")
     * @ORM\JoinColumn(nullable=false)
     */
    private $constraint_type_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Agent", inversedBy="constraintRHs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $agent_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->start_date;
    }

    public function setStartDate(\DateTimeInterface $start_date): self
    {
        $this->start_date = $start_date;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->end_date;
    }

    public function setEndDate(\DateTimeInterface $end_date): self
    {
        $this->end_date = $end_date;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getAttachment(): ?string
    {
        return $this->attachment;
    }

    public function setAttachment(?string $attachment): self
    {
        $this->attachment = $attachment;

        return $this;
    }

    public function getConstraintTypeId(): ?ConstraintType
    {
        return $this->constraint_type_id;
    }

    public function setConstraintTypeId(?ConstraintType $constraint_type_id): self
    {
        $this->constraint_type_id = $constraint_type_id;

        return $this;
    }

    public function getAgentId(): ?Agent
    {
        return $this->agent_id;
    }

    public function setAgentId(?Agent $agent_id): self
    {
        $this->agent_id = $agent_id;

        return $this;
    }
}
