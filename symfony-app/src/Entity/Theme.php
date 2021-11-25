<?php

namespace App\Entity;

use App\Repository\ThemeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ThemeRepository::class)
 */
class Theme
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private  $primaryColor;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private  $secondaryColor;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private  $darkColor;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private  $lightColor;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive = false;

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

    public function getPrimaryColor(): ?string
    {
        return $this->primaryColor;
    }

    public function setPrimaryColor(string  $primaryColor): self
    {
        $this->primaryColor =  $primaryColor;

        return $this;
    }

    public function getSecondaryColor(): ?string
    {
        return $this->secondaryColor;
    }

    public function setSecondaryColor(string  $secondaryColor): self
    {
        $this->secondaryColor =  $secondaryColor;

        return $this;
    }

    public function getDarkColor(): ?string
    {
        return $this->darkColor;
    }

    public function setDarkColor(?string  $darkColor): self
    {
        $this->darkColor =  $darkColor;

        return $this;
    }

    public function getLightColor(): ?string
    {
        return $this->lightColor;
    }

    public function setLightColor(string  $lightColor): self
    {
        $this->lightColor =  $lightColor;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }
}
