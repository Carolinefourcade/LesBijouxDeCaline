<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
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
     * @ORM\OneToMany(targetEntity="App\Entity\Jewelry", mappedBy="category")
     */
    private $jewelries;

    public function __construct()
    {
        $this->jewelries = new ArrayCollection();
    }

    /**
     * @return Collection|Jewelry[]
     *
     */
    public function getJewelries(): Collection
    {
        return $this->jewelries;
    }

    /**
     * @param Jewelry $jewelry
     * @return Category
     */
    public function addJewelry(Jewelry $jewelry): self
    {
        if (!$this->jewelries->contains($jewelry)) {
            $this->jewelries[] = $jewelry;
            $jewelry->setCategory($this);
        }
        return $this;
    }

    /**
     * @param Jewelry $jewelry
     * @return Category
     */
    public function removeJewelry(Jewelry $jewelry): self
    {
        if ($this->jewelries->contains($jewelry)) {
            $this->jewelries->removeElement($jewelry);

            if ($jewelry->getCategory() === $this) {
                $jewelry->setCategory(null);
            }
        }
        return $this;
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
}
