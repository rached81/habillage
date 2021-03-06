<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DistrictRepository")
 */
class District
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
    private $label_ar;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $label_fr;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $alias;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Line", mappedBy="district")
     */
    private $lines_by_district;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\District", mappedBy="district")
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Groupe", mappedBy="district")
     */
    private $groupes;

    public function __construct()
    {
        $this->lines_by_district = new ArrayCollection();
        $this->groupes = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLabelFr(): ?string
    {
        return $this->label_fr;
    }

    public function setLabelFr(string $label_fr): self
    {
        $this->label_fr = $label_fr;

        return $this;
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

    public function getAlias(): ?string
    {
        return $this->alias;
    }

    public function setAlias(string $alias): self
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * @return Collection|Line[]
     */
    public function getLinesByDistrict(): Collection
    {
        return $this->lines_by_district;
    }

    public function addLinesByDistrict(Line $linesByDistrict): self
    {
        if (!$this->lines_by_district->contains($linesByDistrict)) {
            $this->lines_by_district[] = $linesByDistrict;
            $linesByDistrict->setDistrict($this);
        }

        return $this;
    }

    public function removeLinesByDistrict(Line $linesByDistrict): self
    {
        if ($this->lines_by_district->contains($linesByDistrict)) {
            $this->lines_by_district->removeElement($linesByDistrict);
            // set the owning side to null (unless already changed)
            if ($linesByDistrict->getDistrict() === $this) {
                $linesByDistrict->setDistrict(null);
            }
        }

        return $this;
    }



    /**
     * @return Collection|Groupe[]
     */
    public function getGroupes(): Collection
    {
        return $this->groupes;
    }

    public function addGroupe(Groupe $groupe): self
    {
        if (!$this->groupes->contains($groupe)) {
            $this->groupes[] = $groupe;
            $groupe->setDistrict($this);
        }

        return $this;
    }

    public function removeGroupe(Groupe $groupe): self
    {
        if ($this->groupes->contains($groupe)) {
            $this->groupes->removeElement($groupe);
            // set the owning side to null (unless already changed)
            if ($groupe->getDistrict() === $this) {
                $groupe->setDistrict(null);
            }
        }

        return $this;
    }



    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setDistrict($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getDistrict() === $this) {
                $user->setDistrict(null);
            }
        }

        return $this;
    }
}
