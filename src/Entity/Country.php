<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CountryRepository")
 */
class Country
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Stat", mappedBy="country", orphanRemoval=true)
     */
    private $stat;

    public function __construct()
    {
        $this->stat = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Stat[]
     */
    public function getStat(): Collection
    {
        return $this->stat;
    }

    public function addStat(Stat $stat): self
    {
        if (!$this->stat->contains($stat)) {
            $this->stat[] = $stat;
            $stat->setCountry($this);
        }

        return $this;
    }

    public function removeStat(Stat $stat): self
    {
        if ($this->stat->contains($stat)) {
            $this->stat->removeElement($stat);
            // set the owning side to null (unless already changed)
            if ($stat->getCountry() === $this) {
                $stat->setCountry(null);
            }
        }

        return $this;
    }
}
