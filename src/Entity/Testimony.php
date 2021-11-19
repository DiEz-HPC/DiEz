<?php

namespace App\Entity;

use App\Repository\TestimonyRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=TestimonyRepository::class)
 */
class Testimony
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
    #[
        Assert\NotNull(
            message: "Nous avons besoin de votre nom"
        ),
        Assert\NotBlank(
            message: "Votre nom est manquant."
        ),
    ]
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[
        Assert\NotNull(
            message: "Nous avons besoin de votre prénom"
        ),
        Assert\NotBlank(
            message: "Votre prénom est manquant."
        ),
    ]
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $company;

    /**
     * @ORM\Column(type="text")
     */
    #[
        Assert\NotNull(
            message: "Nous avons besoin de votre commentaire."
        ),
        Assert\NotBlank(
            message: "Il manque votre commentaire."
        ),
    ]
    private $comment;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPublished = false;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(?string $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

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

    public function getIsPublished(): ?bool
    {
        return $this->isPublished;
    }

    public function setIsPublished(bool $isPublished): self
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    public function getFullName(): string
    {
        return strtoupper($this->lastName) . ' ' . ucfirst($this->firstName);
    }

    public function __toString(): string
    {
        return $this->getFullName();
    }
}
