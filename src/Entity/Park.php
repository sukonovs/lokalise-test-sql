<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(indexes={@ORM\Index(name="status__idx", columns={"status"})})
 */
class Park
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="parks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="integer")
     */
    private $proxyId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Country", inversedBy="parks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $country;

    /**
     * @ORM\Column(type="datetime")
     */
    private $schedule;

    /**
     * @ORM\Column(type="integer")
     */
    private $plannedOutgoingCalls;

    /**
     * @ORM\Column(type="integer")
     */
    private $plannedIncomingCalls;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $registeredNumber;

    /**
     * @ORM\Column(columnDefinition="SMALLINT NOT NULL CHECK (status IN (1, 2, 3, 4))"))
     */
    private $status;

    /**
     * @ORM\Column(type="datetime")
     */
    private $scheduledAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $registeredAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $cancelledAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $alreadyAbroad;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getProxyId(): ?int
    {
        return $this->proxyId;
    }

    public function setProxyId(int $proxyId): self
    {
        $this->proxyId = $proxyId;

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getSchedule(): ?\DateTimeInterface
    {
        return $this->schedule;
    }

    public function setSchedule(\DateTimeInterface $schedule): self
    {
        $this->schedule = $schedule;

        return $this;
    }

    public function getPlannedOutgoingCalls(): ?int
    {
        return $this->plannedOutgoingCalls;
    }

    public function setPlannedOutgoingCalls(int $plannedOutgoingCalls): self
    {
        $this->plannedOutgoingCalls = $plannedOutgoingCalls;

        return $this;
    }

    public function getPlannedIncomingCalls(): ?int
    {
        return $this->plannedIncomingCalls;
    }

    public function setPlannedIncomingCalls(int $plannedIncomingCalls): self
    {
        $this->plannedIncomingCalls = $plannedIncomingCalls;

        return $this;
    }

    public function getPin(): ?string
    {
        return $this->pin;
    }

    public function setPin(string $pin): self
    {
        $this->pin = $pin;

        return $this;
    }

    public function getRegisteredNumber(): ?string
    {
        return $this->registeredNumber;
    }

    public function setRegisteredNumber(string $registeredNumber): self
    {
        $this->registeredNumber = $registeredNumber;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getScheduledAt(): ?\DateTimeInterface
    {
        return $this->scheduledAt;
    }

    public function setScheduledAt(\DateTimeInterface $scheduledAt): self
    {
        $this->scheduledAt = $scheduledAt;

        return $this;
    }

    public function getRegisteredAt(): ?\DateTimeInterface
    {
        return $this->registeredAt;
    }

    public function setRegisteredAt(\DateTimeInterface $registeredAt): self
    {
        $this->registeredAt = $registeredAt;

        return $this;
    }

    public function getCancelledAt(): ?\DateTimeInterface
    {
        return $this->cancelledAt;
    }

    public function setCancelledAt(?\DateTimeInterface $cancelledAt): self
    {
        $this->cancelledAt = $cancelledAt;

        return $this;
    }

    public function getAlreadyAbroad(): ?bool
    {
        return $this->alreadyAbroad;
    }

    public function setAlreadyAbroad(bool $alreadyAbroad): self
    {
        $this->alreadyAbroad = $alreadyAbroad;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
