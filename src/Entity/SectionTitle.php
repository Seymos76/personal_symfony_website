<?php

namespace App\Entity;

use App\Repository\SectionTitleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SectionTitleRepository::class)
 */
class SectionTitle
{
    public const ALIGN_LEFT = "left";
    public const ALIGN_CENTER = "center";
    public const ALIGN_RIGHT = "right";

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $subTitle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $align;

    /**
     * @ORM\OneToOne(targetEntity=Section::class, mappedBy="sectionTitle", cascade={"persist", "remove"})
     */
    private $section;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSubTitle(): ?string
    {
        return $this->subTitle;
    }

    public function setSubTitle(string $subTitle): self
    {
        $this->subTitle = $subTitle;

        return $this;
    }

    public function getAlign(): ?string
    {
        return $this->align;
    }

    public function setAlign(string $align): self
    {
        $this->align = $align;

        return $this;
    }

    public function getSection(): ?Section
    {
        return $this->section;
    }

    public function setSection(?Section $section): self
    {
        $this->section = $section;

        // set (or unset) the owning side of the relation if necessary
        $newSectionTitle = null === $section ? null : $this;
        if ($section->getSectionTitle() !== $newSectionTitle) {
            $section->setSectionTitle($newSectionTitle);
        }

        return $this;
    }
}
