<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CustomerRepository::class)
 */
class Customer
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
    private $first_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $last_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $added_at;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $last_mail_at;

    /**
     * @ORM\Column(type="boolean")
     */
    private $has_responded;

    /**
     * @ORM\Column(type="boolean")
     */
    private $has_consumed;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAddedAt(): ?\DateTimeImmutable
    {
        return $this->added_at;
    }

    public function setAddedAt(\DateTimeImmutable $added_at): self
    {
        $this->added_at = $added_at;

        return $this;
    }

    public function getLastMailAt(): ?\DateTimeImmutable
    {
        return $this->last_mail_at;
    }

    public function setLastMailAt(\DateTimeImmutable $last_mail_at): self
    {
        $this->last_mail_at = $last_mail_at;

        return $this;
    }

    public function getHasResponded(): ?bool
    {
        return $this->has_responded;
    }

    public function setHasResponded(bool $has_responded): self
    {
        $this->has_responded = $has_responded;

        return $this;
    }

    public function getHasConsumed(): ?bool
    {
        return $this->has_consumed;
    }

    public function setHasConsumed(bool $has_consumed): self
    {
        $this->has_consumed = $has_consumed;

        return $this;
    }
}
