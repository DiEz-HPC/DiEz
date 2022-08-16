<?php

namespace App\Entity;

use App\Interface\ContactMessageInterface;
use App\Repository\CalendarRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CalendarRepository::class)
 */
class Calendar implements ContactMessageInterface
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
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $start;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $end;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $color;

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

    public function getStart(): ?string
    {
        return $this->start;
    }

    public function setStart(string $start): self
    {
        $this->start = $start;

        return $this;
    }

    public function getEnd(): ?string
    {
        return $this->end;
    }

    public function setEnd(string $end): self
    {
        $this->end = $end;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }
    // Needed to work with interface ContactMessageInterface
    public function getNom(): ?string
    {
        return $this->title;
    }

    public function getEmail(): ?string
    {
        return 'contact@deviteasy.fr';
    }

    public function getMessage(): ?string
    {
       return ' Nouvel évènement ' . $this->title . ' du ' . date_format(New DateTime($this->start), "d/m/Y H:i") . ' au ' . date_format(New DateTime($this->end), "d/m/Y H:i");
    }
}
