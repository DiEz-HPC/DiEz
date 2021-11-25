<?php

namespace App\Entity;

use App\Repository\VisitorCounterRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VisitorCounterRepository::class)
 */
class VisitorCounter
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
    private $IpAdress;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $Date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIpAdress(): ?string
    {
        return $this->IpAdress;
    }

    public function setIpAdress(string $IpAdress): self
    {
        $this->IpAdress = $IpAdress;

        return $this;
    }

    public function getDate(): ?\DateTimeImmutable
    {
        return $this->Date;
    }

    public function setDate(\DateTimeImmutable $Date): self
    {
        $this->Date = $Date;

        return $this;
    }
}
