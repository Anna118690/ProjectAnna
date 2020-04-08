<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LessonOrderLineRepository")
 */
class LessonOrderLine
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
    private $date;

    /**
     * @ORM\Column(type="time")
     */
    private $hour;

    /**
     * @ORM\Column(type="integer")
     */
    private $durationMin;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2)
     */
    private $priceFullLesson;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2, nullable=true)
     */
    private $priceFullLessonSansTva;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getHour(): ?\DateTimeInterface
    {
        return $this->hour;
    }

    public function setHour(\DateTimeInterface $hour): self
    {
        $this->hour = $hour;

        return $this;
    }

    public function getDurationMin(): ?int
    {
        return $this->durationMin;
    }

    public function setDurationMin(int $durationMin): self
    {
        $this->durationMin = $durationMin;

        return $this;
    }

    public function getPriceFullLesson(): ?string
    {
        return $this->priceFullLesson;
    }

    public function setPriceFullLesson(string $priceFullLesson): self
    {
        $this->priceFullLesson = $priceFullLesson;

        return $this;
    }

    public function getPriceFullLessonSansTva(): ?string
    {
        return $this->priceFullLessonSansTva;
    }

    public function setPriceFullLessonSansTva(?string $priceFullLessonSansTva): self
    {
        $this->priceFullLessonSansTva = $priceFullLessonSansTva;

        return $this;
    }
}
