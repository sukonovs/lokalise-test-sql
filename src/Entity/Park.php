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

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     *
     * @return $this
     */
    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getProxyId(): ?int
    {
        return $this->proxyId;
    }

    /**
     * @param int $proxyId
     *
     * @return $this
     */
    public function setProxyId(int $proxyId): self
    {
        $this->proxyId = $proxyId;

        return $this;
    }

    /**
     * @return Country|null
     */
    public function getCountry(): ?Country
    {
        return $this->country;
    }

    /**
     * @param Country|null $country
     *
     * @return $this
     */
    public function setCountry(?Country $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getSchedule(): ?\DateTimeInterface
    {
        return $this->schedule;
    }

    /**
     * @param \DateTimeInterface $schedule
     *
     * @return $this
     */
    public function setSchedule(\DateTimeInterface $schedule): self
    {
        $this->schedule = $schedule;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPlannedOutgoingCalls(): ?int
    {
        return $this->plannedOutgoingCalls;
    }

    /**
     * @param int $plannedOutgoingCalls
     *
     * @return $this
     */
    public function setPlannedOutgoingCalls(int $plannedOutgoingCalls): self
    {
        $this->plannedOutgoingCalls = $plannedOutgoingCalls;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPlannedIncomingCalls(): ?int
    {
        return $this->plannedIncomingCalls;
    }

    /**
     * @param int $plannedIncomingCalls
     *
     * @return $this
     */
    public function setPlannedIncomingCalls(int $plannedIncomingCalls): self
    {
        $this->plannedIncomingCalls = $plannedIncomingCalls;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPin(): ?string
    {
        return $this->pin;
    }

    /**
     * @param string $pin
     *
     * @return $this
     */
    public function setPin(string $pin): self
    {
        $this->pin = $pin;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRegisteredNumber(): ?string
    {
        return $this->registeredNumber;
    }

    /**
     * @param string $registeredNumber
     *
     * @return $this
     */
    public function setRegisteredNumber(string $registeredNumber): self
    {
        $this->registeredNumber = $registeredNumber;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * @param int $status
     *
     * @return $this
     */
    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getScheduledAt(): ?\DateTimeInterface
    {
        return $this->scheduledAt;
    }

    /**
     * @param \DateTimeInterface $scheduledAt
     *
     * @return $this
     */
    public function setScheduledAt(\DateTimeInterface $scheduledAt): self
    {
        $this->scheduledAt = $scheduledAt;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getRegisteredAt(): ?\DateTimeInterface
    {
        return $this->registeredAt;
    }

    /**
     * @param \DateTimeInterface $registeredAt
     *
     * @return $this
     */
    public function setRegisteredAt(\DateTimeInterface $registeredAt): self
    {
        $this->registeredAt = $registeredAt;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getCancelledAt(): ?\DateTimeInterface
    {
        return $this->cancelledAt;
    }

    /**
     * @param \DateTimeInterface|null $cancelledAt
     *
     * @return $this
     */
    public function setCancelledAt(?\DateTimeInterface $cancelledAt): self
    {
        $this->cancelledAt = $cancelledAt;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAlreadyAbroad(): ?bool
    {
        return $this->alreadyAbroad;
    }

    /**
     * @param bool $alreadyAbroad
     *
     * @return $this
     */
    public function setAlreadyAbroad(bool $alreadyAbroad): self
    {
        $this->alreadyAbroad = $alreadyAbroad;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTimeInterface $createdAt
     *
     * @return $this
     */
    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
