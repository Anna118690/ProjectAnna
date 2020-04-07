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
    private $time;

    /**
     * @ORM\Column(type="decimal", precision=3, scale=1)
     */
    private $duration;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2)
     */
    private $priceFullLessonTva;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2)
     */
    private $priceFullLesson;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\LessonOrder", inversedBy="lessonOrderLines")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lessonOrder;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Course", inversedBy="lessonOrderLines")
     * @ORM\JoinColumn(nullable=false)
     */
    private $course;

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

    public function getTime(): ?\DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(\DateTimeInterface $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getPriceFullLessonTva(): ?string
    {
        return $this->priceFullLessonTva;
    }

    public function setPriceFullLessonTva(string $priceFullLessonTva): self
    {
        $this->priceFullLessonTva = $priceFullLessonTva;

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

    public function getLessonOrder(): ?LessonOrder
    {
        return $this->lessonOrder;
    }

    public function setLessonOrder(?LessonOrder $lessonOrder): self
    {
        $this->lessonOrder = $lessonOrder;

        return $this;
    }

    public function getCourse(): ?Course
    {
        return $this->course;
    }

    public function setCourse(?Course $course): self
    {
        $this->course = $course;

        return $this;
    }
}
