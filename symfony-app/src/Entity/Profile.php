<?php

namespace App\Entity;

use App\Repository\ProfileRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\Ignore;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ProfileRepository::class)
 * @Vich\Uploadable
 */
class Profile
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
    #[Groups(['user:read'])]
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['user:read'])]
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    #[Groups(['user:read'])]
    private $linkedin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['user:read'])]
    private $Status;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    #[Groups(['user:read'])]
    private $imageName;

    /**
     * @Vich\UploadableField(mapping="uploaded_image", fileNameProperty="imageName")
     * @var File|null
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="boolean")
     */
    #[Groups(['user:read'])]
    private $isShow = false;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="profile", cascade={"persist"})
     */
    #[Ignore]
    private $user;


    public function getFullName(): string
    {
        return strtoupper($this->lastName) . ' ' . ucfirst($this->firstName);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(?string $imageName): self
    {
        $this->imageName = $imageName;

        return $this;
    }


    /**
     * @param File|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            $this->updatedAt = new DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function __toString()
    {
        return $this->getFullName();
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

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getLinkedin(): ?string
    {
        return $this->linkedin;
    }

    public function setLinkedin(?string $linkedin): self
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->Status;
    }

    public function setStatus(string $Status): self
    {
        $this->Status = $Status;

        return $this;
    }

    public function getEmail(): string
    {
        if ($this->getUser()) {
            return $this->user->getEmail();
        }

        return '';
    }

    public function getIsShow(): ?bool
    {
        return $this->isShow;
    }

    public function setIsShow(bool $isShow): self
    {
        $this->isShow = $isShow;

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

}
