<?php

namespace App\Entity;

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
    private $dateLessonOrder;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2)
     */
    private $priceTotal;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2, nullable=true)
     */
    private $priceTotalSansTva;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $paymentType;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="lessonOrders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $student;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateLessonOrder(): ?\DateTimeInterface
    {
        return $this->dateLessonOrder;
    }

    public function setDateLessonOrder(\DateTimeInterface $dateLessonOrder): self
    {
        $this->dateLessonOrder = $dateLessonOrder;

        return $this;
    }

    public function getPriceTotal(): ?string
    {
        return $this->priceTotal;
    }

    public function setPriceTotal(string $priceTotal): self
    {
        $this->priceTotal = $priceTotal;

        return $this;
    }

    public function getPriceTotalSansTva(): ?string
    {
        return $this->priceTotalSansTva;
    }

    public function setPriceTotalSansTva(?string $priceTotalSansTva): self
    {
        $this->priceTotalSansTva = $priceTotalSansTva;

        return $this;
    }

    public function getPaymentType(): ?string
    {
        return $this->paymentType;
    }

    public function setPaymentType(?string $paymentType): self
    {
        $this->paymentType = $paymentType;

        return $this;
    }

    public function getStudent(): ?User
    {
        return $this->student;
    }

    public function setStudent(?User $student): self
    {
        $this->student = $student;

        return $this;
    }
}
