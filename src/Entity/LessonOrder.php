<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LessonOrderRepository")
 */
class LessonOrder
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateOrder;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2)
     */
    private $priceTotalTva;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2, nullable=true)
     */
    private $priceTotal;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="lessonsOrder")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LessonOrderLine", mappedBy="lessonOrder")
     */
    private $lessonOrderLines;

    public function __construct()
    {
        $this->lessonOrderLines = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateOrder(): ?\DateTimeInterface
    {
        return $this->dateOrder;
    }

    public function setDateOrder(\DateTimeInterface $dateOrder): self
    {
        $this->dateOrder = $dateOrder;

        return $this;
    }

    public function getPriceTotalTva(): ?string
    {
        return $this->priceTotalTva;
    }

    public function setPriceTotalTva(string $priceTotalTva): self
    {
        $this->priceTotalTva = $priceTotalTva;

        return $this;
    }

    public function getPriceTotal(): ?string
    {
        return $this->priceTotal;
    }

    public function setPriceTotal(?string $priceTotal): self
    {
        $this->priceTotal = $priceTotal;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|LessonOrderLine[]
     */
    public function getLessonOrderLines(): Collection
    {
        return $this->lessonOrderLines;
    }

    public function addLessonOrderLine(LessonOrderLine $lessonOrderLine): self
    {
        if (!$this->lessonOrderLines->contains($lessonOrderLine)) {
            $this->lessonOrderLines[] = $lessonOrderLine;
            $lessonOrderLine->setLessonOrder($this);
        }

        return $this;
    }

    public function removeLessonOrderLine(LessonOrderLine $lessonOrderLine): self
    {
        if ($this->lessonOrderLines->contains($lessonOrderLine)) {
            $this->lessonOrderLines->removeElement($lessonOrderLine);
            // set the owning side to null (unless already changed)
            if ($lessonOrderLine->getLessonOrder() === $this) {
                $lessonOrderLine->setLessonOrder(null);
            }
        }

        return $this;
    }
}
