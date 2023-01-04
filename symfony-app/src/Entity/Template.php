<?php

namespace App\Entity;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use App\Repository\TemplateRepository;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=TemplateRepository::class)
 * @Vich\Uploadable
 */
class Template
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
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $templateName;

    /**
     * @Vich\UploadableField(mapping="uploaded_templates", fileNameProperty="templateName")
     * @var File|null
     */
    private $templateFile;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $templateScreenshot;

    /**
     * @Vich\UploadableField(mapping="uploaded_image", fileNameProperty="templateScreenshot")
     * @var File|null
     */
    private $templateScreenshotFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $templateType;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $templateDescription;

    public function __construct()
    {
        $this->createdAt = new DateTimeImmutable();
    }

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

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }


    public function getTemplateName(): ?string
    {
        return $this->templateName;
    }

    public function setTemplateName(?string $templateName): self
    {
        $this->templateName = $templateName;

        return $this;
    }

    /**
     * @param File|null $templateFile
     */
    public function setTemplateFile(?File $templateFile = null): void
    {
        $this->templateFile = $templateFile;

        if (null !== $templateFile) {
            $this->updatedAt = new DateTimeImmutable();
        }
    }

    public function getTemplateFile(): ?File
    {
        return $this->templateFile;
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


    public function getTemplateScreenshot(): ?string
    {
        return $this->templateScreenshot;
    }

    public function setTemplateScreenshot(?string $templateScreenshot): ?self
    {
        $this->templateScreenshot = $templateScreenshot;

        return $this;
    }

     /**
     * @param File|null $templateScreenshotFile
     */
    public function setTemplateScreenshotFile(?File $templateScreenshotFile = null): void
    {
        $this->templateScreenshotFile = $templateScreenshotFile;

        if (null !== $templateScreenshotFile) {
            $this->updatedAt = new DateTimeImmutable();
        }
    }

    public function getTemplateScreenshotFile(): ?File
    {
        return $this->templateScreenshotFile;
    }

    public function getTemplateType(): ?string
    {
        return $this->templateType;
    }

    public function setTemplateType(?string $templateType): ?self
    {
        $this->templateType = $templateType;

        return $this;
    }

    public function getTemplateDescription(): ?string
    {
        return $this->templateDescription;
    }

    public function setTemplateDescription(?string $templateDescription): ?self
    {
        $this->templateDescription = $templateDescription;

        return $this;
    }
}
