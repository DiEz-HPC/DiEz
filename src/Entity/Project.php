<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ProjectRepository::class)
 * @Vich\Uploadable
 */
class Project
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
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageName;

    /**
     * @Vich\UploadableField(mapping="uploaded_image", fileNameProperty="imageName")
     * @var File|null
     */
    private $imageFile;

    /**
     * @ORM\Column(type="text")
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $language;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $created_at;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $updated_at;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $issue_number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $visibility;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $lastSave;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $githubId;

    /**
     * @ORM\Column(type="boolean")
     */
    private $homeVisible = false;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $link;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="project")
     */
    private $client;


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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
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
            $this->updated_at = (new DateTimeImmutable())->format('Y-m-d h-i-s');
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    public function setCreatedAt(string $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(string $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getIssueNumber(): ?string
    {
        return $this->issue_number;
    }

    public function setIssueNumber(string $issue_number): self
    {
        $this->issue_number = $issue_number;

        return $this;
    }

    public function getVisibility(): ?string
    {
        return $this->visibility;
    }

    public function setVisibility(string $visibility): self
    {
        $this->visibility = $visibility;

        return $this;
    }

    public function getLastSave(): ?\DateTimeInterface
    {
        return $this->lastSave;
    }

    public function setLastSave(?\DateTimeInterface $lastSave): self
    {
        $this->lastSave = $lastSave;

        return $this;
    }

    public function getGithubId(): ?int
    {
        return $this->githubId;
    }

    public function setGithubId(?int $githubId): self
    {
        $this->githubId = $githubId;

        return $this;
    }

    public function getHomeVisible(): ?bool
    {
        return $this->homeVisible;
    }

    public function setHomeVisible(bool $homeVisible): self
    {
        $this->homeVisible = $homeVisible;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }

}
