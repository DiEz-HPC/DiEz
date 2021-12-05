<?php

namespace App\Entity;

use App\Repository\ImageFluidRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ImageFluidRepository::class)
 */
class ImageFluid
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imageName;

    /**
     * @ORM\Column(type="integer")
     */
    private $width;

    /**
     * @ORM\Column(type="integer")
     */
    private $height;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity=FormatImageSize::class, inversedBy="imageFluids")
     * @ORM\JoinColumn(nullable=false)
     */
    private $formatImageSize;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $baseImageName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(string $imageName): self
    {
        $this->imageName = $imageName;

        return $this;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(int $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(int $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getFormatImageSize(): ?FormatImageSize
    {
        return $this->formatImageSize;
    }

    public function setFormatImageSize(?FormatImageSize $formatImageSize): self
    {
        $this->formatImageSize = $formatImageSize;

        return $this;
    }

    public function getBaseImageName(): ?string
    {
        return $this->baseImageName;
    }

    public function setBaseImageName(string $baseImageName): self
    {
        $this->baseImageName = $baseImageName;

        return $this;
    }
}
