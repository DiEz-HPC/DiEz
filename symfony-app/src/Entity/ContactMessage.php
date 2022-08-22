<?php

namespace App\Entity;

use App\Interface\ContactMessageInterface;
use App\Repository\ContactMessageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ContactMessageRepository::class)
 */
class ContactMessage implements ContactMessageInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    #[
        Assert\NotNull(
            message: "Nous avons besoin de votre nom"
        ),
        Assert\NotBlank(
            message: "Votre nom ne doit pas être vide"
        ),
        ]
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    #[
        Assert\NotNull(
            message: "Nous avons besoin de votre email"
        ),
        Assert\NotBlank(
            message: "Nous avons besoin de votre email"
        ),
        Assert\Email(
            message: "Nous avons besoin d'un email valide"
        )
    ]
    private $email;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    #[
        Assert\NotNull(
            message: "Donnez nous plus d'information"
        ),
        Assert\Length(
            min: 20,
            minMessage: "Votre message doit faire au moins {{ limit }} caractères"
        )
    ] 
    private $message;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }
}
