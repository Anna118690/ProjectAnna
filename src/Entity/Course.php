<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private $coursename;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2)
     */
    private $priceActualHourTva;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2, nullable=true)
     */
    private $priceActualHour;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Level", inversedBy="courses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $level;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Language", inversedBy="courses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $language;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DataFiles", mappedBy="course")
     */
    private $dataFiles;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LessonOrderLine", mappedBy="course")
     */
    private $lessonOrderLines;

    public function __construct()
    {
        $this->dataFiles = new ArrayCollection();
        $this->lessonOrderLines = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCoursename(): ?string
    {
        return $this->coursename;
    }

    public function setCoursename(string $coursename): self
    {
        $this->coursename = $coursename;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPriceActualHourTva(): ?string
    {
        return $this->priceActualHourTva;
    }

    public function setPriceActualHourTva(string $priceActualHourTva): self
    {
        $this->priceActualHourTva = $priceActualHourTva;

        return $this;
    }

    public function getPriceActualHour(): ?string
    {
        return $this->priceActualHour;
    }

    public function setPriceActualHour(?string $priceActualHour): self
    {
        $this->priceActualHour = $priceActualHour;

        return $this;
    }

    public function getLevel(): ?Level
    {
        return $this->level;
    }

    public function setLevel(?Level $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getLanguage(): ?Language
    {
        return $this->language;
    }

    public function setLanguage(?Language $language): self
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @return Collection|DataFiles[]
     */
    public function getDataFiles(): Collection
    {
        return $this->dataFiles;
    }

    public function addDataFile(DataFiles $dataFile): self
    {
        if (!$this->dataFiles->contains($dataFile)) {
            $this->dataFiles[] = $dataFile;
            $dataFile->setCourse($this);
        }

        return $this;
    }

    public function removeDataFile(DataFiles $dataFile): self
    {
        if ($this->dataFiles->contains($dataFile)) {
            $this->dataFiles->removeElement($dataFile);
            // set the owning side to null (unless already changed)
            if ($dataFile->getCourse() === $this) {
                $dataFile->setCourse(null);
            }
        }

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
            $lessonOrderLine->setCourse($this);
        }

        return $this;
    }

    public function removeLessonOrderLine(LessonOrderLine $lessonOrderLine): self
    {
        if ($this->lessonOrderLines->contains($lessonOrderLine)) {
            $this->lessonOrderLines->removeElement($lessonOrderLine);
            // set the owning side to null (unless already changed)
            if ($lessonOrderLine->getCourse() === $this) {
                $lessonOrderLine->setCourse(null);
            }
        }

        return $this;
    }
}
