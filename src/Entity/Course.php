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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LessonOrderLine", mappedBy="course")
     */
    private $lessonOrderLines;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Approach", inversedBy="courses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $approach;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Language", inversedBy="courses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $language;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Level", inversedBy="courses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $level;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\AvatarCourse", inversedBy="courses")
     */
    private $avatar;

     /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="courses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $teacher;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DataFile", mappedBy="course")
     */
    private $dataFiles;

   

    public function __construct()
    {
        $this->lessonOrderLines = new ArrayCollection();
        $this->dataFiles = new ArrayCollection();
    }

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

    public function getApproach(): ?Approach
    {
        return $this->approach;
    }

    public function setApproach(?Approach $approach): self
    {
        $this->approach = $approach;

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

    public function getLevel(): ?Level
    {
        return $this->level;
    }

    public function setLevel(?Level $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getAvatar(): ?AvatarCourse
    {
        return $this->avatar;
    }

    public function setAvatar(?AvatarCourse $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * @return Collection|DataFile[]
     */
    public function getDataFiles(): Collection
    {
        return $this->dataFiles;
    }

    public function addDataFile(DataFile $dataFile): self
    {
        if (!$this->dataFiles->contains($dataFile)) {
            $this->dataFiles[] = $dataFile;
            $dataFile->setCourse($this);
        }

        return $this;
    }

    public function removeDataFile(DataFile $dataFile): self
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

    public function getTeacher(): ?User
    {
        return $this->teacher;
    }

    public function setTeacher(?User $teacher): self
    {
        $this->teacher = $teacher;

        return $this;
    }
}
