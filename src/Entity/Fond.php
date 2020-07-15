<?php

namespace App\Entity;

use App\Repository\FondRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FondRepository::class)
 */
class Fond
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $amountcash;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $amountcoins;

    


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


    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getAmountcash(): ?string
    {
        return $this->amountcash;
    }

    public function setAmountcash(string $amountcash): self
    {
        $this->amountcash = $amountcash;

        return $this;
    }

    public function getAmountcoins(): ?string
    {
        return $this->amountcoins;
    }

    public function setAmountcoins(string $amountcoins): self
    {
        $this->amountcoins = $amountcoins;

        return $this;
    }

    
}
