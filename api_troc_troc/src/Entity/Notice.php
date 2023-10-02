<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\NoticeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NoticeRepository::class)]
#[ApiResource]
class Notice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $note = null;

    #[ORM\Column(length: 255)]
    private ?string $text = null;

    #[ORM\ManyToOne(inversedBy: 'notices')]
    private ?User $publishedBy = null;

    #[ORM\ManyToOne(inversedBy: 'notices')]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): static
    {
        $this->note = $note;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): static
    {
        $this->text = $text;

        return $this;
    }

    public function getPublishedBy(): ?User
    {
        return $this->publishedBy;
    }

    public function setPublishedBy(?User $publishedBy): static
    {
        $this->publishedBy = $publishedBy;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
