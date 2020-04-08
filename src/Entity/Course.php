<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CourseRepository")
 */
class Course
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $namecourse;

    /**
     * @ORM\Column(type="text")
     */
    private $shortDesc;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $priceActualHour;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2, nullable=true)
     */
    private $priceActualHourSansTva;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNamecourse(): ?string
    {
        return $this->namecourse;
    }

    public function setNamecourse(string $namecourse): self
    {
        $this->namecourse = $namecourse;

        return $this;
    }

    public function getShortDesc(): ?string
    {
        return $this->shortDesc;
    }

    public function setShortDesc(string $shortDesc): self
    {
        $this->shortDesc = $shortDesc;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPriceActualHour(): ?string
    {
        return $this->priceActualHour;
    }

    public function setPriceActualHour(string $priceActualHour): self
    {
        $this->priceActualHour = $priceActualHour;

        return $this;
    }

    public function getPriceActualHourSansTva(): ?string
    {
        return $this->priceActualHourSansTva;
    }

    public function setPriceActualHourSansTva(?string $priceActualHourSansTva): self
    {
        $this->priceActualHourSansTva = $priceActualHourSansTva;

        return $this;
    }
}
