<?php

namespace App\Entity;

use App\Repository\ExperienceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExperienceRepository::class)
 */
class Experience
{
    public const WORK = "work";
    public const FREELANCE = "freelance";
    public const EDUCATION = "education";

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $schoolName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $description;

    /**
     * @ORM\Column(type="datetime", length=255)
     */
    private $fromDate;

    /**
     * @ORM\Column(type="datetime", length=255)
     */
    private $toDate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private string $type;

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

    public function getSchoolName(): ?string
    {
        return $this->schoolName;
    }

    public function setSchoolName(string $schoolName): self
    {
        $this->schoolName = $schoolName;

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

    /**
     * @return \DateTime
     */
    public function getFromDate(): \DateTime
    {
        return $this->fromDate;
    }

    public function getFromDateToString(): string
    {
        return $this->fromDate->format("Y");
    }

    /**
     * @param mixed $fromDate
     */
    public function setFromDate($fromDate): self
    {
        $this->fromDate = $fromDate;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getToDate()
    {
        return $this->toDate;
    }

    public function getToDateToString(): string
    {
        return $this->toDate->format("Y");
    }

    /**
     * @param mixed $toDate
     */
    public function setToDate($toDate): self
    {
        $this->toDate = $toDate;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
