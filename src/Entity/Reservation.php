<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReservationRepository")
 */
class Reservation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $time;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Course", inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $course;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ordercourse", mappedBy="reservation")
     */
    private $ordercourses;

    public function __construct()
    {
        $this->ordercourses = new ArrayCollection();
    }

 

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTime(): ?\DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(?\DateTimeInterface $time): self
    {
        $this->time = $time;

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

    /**
     * @return Collection|Ordercourse[]
     */
    public function getOrdercourses(): Collection
    {
        return $this->ordercourses;
    }

    public function addOrdercourse(Ordercourse $ordercourse): self
    {
        if (!$this->ordercourses->contains($ordercourse)) {
            $this->ordercourses[] = $ordercourse;
            $ordercourse->setReservation($this);
        }

        return $this;
    }

    public function removeOrdercourse(Ordercourse $ordercourse): self
    {
        if ($this->ordercourses->contains($ordercourse)) {
            $this->ordercourses->removeElement($ordercourse);
            // set the owning side to null (unless already changed)
            if ($ordercourse->getReservation() === $this) {
                $ordercourse->setReservation(null);
            }
        }

        return $this;
    }

   
}
