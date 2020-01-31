<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SerieRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Serie
{
    const SLUG = [
        1 => 'série',
        2 => 'exposition'
    ];

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=155)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="text")
     */
    private $tech;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $creation_date;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $id_img;

    /**
     * @ORM\Column(type="integer")
     */
    private $slug;

    /**
     * @ORM\Column(type="integer", nullable=true, options={"default" : 0})
     */
    private $slide_on;

    /**
     * @ORM\Column(type="string")
     */
    private $serie_img;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTech(): ?string
    {
        return $this->tech;
    }

    public function setTech(string $tech): self
    {
        $this->tech = $tech;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creation_date;
    }

    public function setCreationDate(\DateTimeInterface $creation_date): self
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    public function getIdImg(): ?int
    {
        return $this->id_img;
    }

    public function setIdImg(?int $id_img): self
    {
        $this->id_img = $id_img;

        return $this;
    }

    public function getSlugType(): string
    {
        return self::SLUG[$this->slug];
    }

    public function getSlug(): ?int
    {
        return $this->slug;
    }

    public function setSlug(?int $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getSlideOn(): ?int
    {
        return $this->slide_on;
    }

    public function setSlideOn(int $slide_on): self
    {
        $this->slide_on = $slide_on;

        return $this;
    }

    public function getSerieImg(): ?string
    {
        return $this->serie_img;
    }

    public function setSerieImg(string $serie_img)
    {
        $this->serie_img = $serie_img;

        return $this;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function createDate()
    {
        if($this->getCreationDate() == null)
        {
            $this->setCreationDate(new \DateTime('now'));
        }

    }

}
