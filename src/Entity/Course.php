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
     * @ORM\Column(type="string", length=100)
     */
    private $namecourse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $shortDesc;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2)
     */
    private $priceActualHour;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2, nullable=true)
     */
    private $priceActualHourSansTva;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $coursePhoto;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\Approach", inversedBy="courses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $approach;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LessonOrderLine", mappedBy="course")
     */
    private $lessonOrderLines;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="course")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="course")
     */
    private $comments;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DataFile", mappedBy="course")
     */
    private $dataFiles;

    public function __construct()
    {
        $this->lessonOrderLines = new ArrayCollection();
        $this->comments = new ArrayCollection();
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

    public function getCoursePhoto()
    {
        return $this->coursePhoto;
    }

    public function setCoursePhoto( $coursePhoto)
    {
        $this->coursePhoto = $coursePhoto;

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

    public function getApproach(): ?Approach
    {
        return $this->approach;
    }

    public function setApproach(?Approach $approach): self
    {
        $this->approach = $approach;

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
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setCourse($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->contains($comment)) {
            $this->comments->removeElement($comment);
            // set the owning side to null (unless already changed)
            if ($comment->getCourse() === $this) {
                $comment->setCourse(null);
            }
        }

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


    public function __toString(){
        // to show the name of the Course in the select
        return $this->namecourse;
        // to show the id of the Category in the select
        // return $this->id;
    }
}
