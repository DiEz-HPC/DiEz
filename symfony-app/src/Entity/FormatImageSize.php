<?php

namespace App\Entity;

use App\Repository\FormatImageSizeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FormatImageSizeRepository::class)
 */
class FormatImageSize
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
    private $formatName;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $width;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $height;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $percent;

    /**
     * @ORM\Column(type="integer")
     */
    private $quality;

    /**
     * @ORM\OneToMany(targetEntity=ImageFluid::class, mappedBy="formatImageSize", orphanRemoval=true)
     */
    private $imageFluids;

    public function __construct()
    {
        $this->imageFluids = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFormatName(): ?string
    {
        return $this->formatName;
    }

    public function setFormatName(string $formatName): self
    {
        $this->formatName = $formatName;

        return $this;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(?int $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(?int $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getPercent(): ?int
    {
        return $this->percent;
    }

    public function setPercent(?int $percent): self
    {
        $this->percent = $percent;

        return $this;
    }

    public function getQuality(): ?int
    {
        return $this->quality;
    }

    public function setQuality(int $quality): self
    {
        $this->quality = $quality;

        return $this;
    }

    /**
     * @return Collection|ImageFluid[]
     */
    public function getImageFluids(): Collection
    {
        return $this->imageFluids;
    }

    public function addImageFluid(ImageFluid $imageFluid): self
    {
        if (!$this->imageFluids->contains($imageFluid)) {
            $this->imageFluids[] = $imageFluid;
            $imageFluid->setFormatImageSize($this);
        }

        return $this;
    }

    public function removeImageFluid(ImageFluid $imageFluid): self
    {
        if ($this->imageFluids->removeElement($imageFluid)) {
            // set the owning side to null (unless already changed)
            if ($imageFluid->getFormatImageSize() === $this) {
                $imageFluid->setFormatImageSize(null);
            }
        }

        return $this;
    }
}
