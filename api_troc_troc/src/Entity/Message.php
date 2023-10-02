<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\MessageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessageRepository::class)]
#[ApiResource]
class Message
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $text = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $dateSend = null;

    #[ORM\ManyToOne(inversedBy: 'messages')]
    private ?User $sendBy = null;

    #[ORM\ManyToOne(inversedBy: 'messages')]
    private ?Chat $chat = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDateSend(): ?\DateTimeImmutable
    {
        return $this->dateSend;
    }

    public function setDateSend(\DateTimeImmutable $dateSend): static
    {
        $this->dateSend = $dateSend;

        return $this;
    }

    public function getSendBy(): ?User
    {
        return $this->sendBy;
    }

    public function setSendBy(?User $sendBy): static
    {
        $this->sendBy = $sendBy;

        return $this;
    }

    public function getChat(): ?Chat
    {
        return $this->chat;
    }

    public function setChat(?Chat $chat): static
    {
        $this->chat = $chat;

        return $this;
    }
}
