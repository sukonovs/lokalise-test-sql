<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Country", inversedBy="users")
     * @ORM\JoinColumn(nullable=false)
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $phoneNumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $token;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $secret;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pin;

    /**
     * @ORM\Column(type="datetime")
     */
    private $registeredAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $authenticatedAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mya2billingCode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $newPhoneNumber;

    /**
     * @ORM\Column(type="integer")
     */
    private $carrierId;

    /**
     * @ORM\Column(type="datetime")
     */
    private $notifiedAt;

    /**
     * @ORM\Column(type="smallint")
     */
    private $balanceNotifications;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prevPin;

    /**
     * @ORM\Column(type="datetime")
     */
    private $lastParkRequestAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $selectedDidId;

    /**
     * @ORM\Column(type="datetime")
     */
    private $promotionExpiresAt;

    /**
     * @ORM\Column(type="smallint")
     */
    private $promotionStatus;

    /**
     * @ORM\Column(type="boolean")
     */
    private $admin;

    /**
     * @ORM\Column(type="boolean")
     */
    private $r2r;

    /**
     * @ORM\Column(type="boolean")
     */
    private $f2g;

    /**
     * @ORM\Column(type="boolean")
     */
    private $useSip;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Park", mappedBy="user")
     */
    private $parks;

    public function __construct()
    {
        $this->parks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     *
     * @return $this
     */
    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * @param string $token
     *
     * @return $this
     */
    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSecret(): ?string
    {
        return $this->secret;
    }

    /**
     * @param string $secret
     *
     * @return $this
     */
    public function setSecret(string $secret): self
    {
        $this->secret = $secret;

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
    public function getAuthenticatedAt(): ?\DateTimeInterface
    {
        return $this->authenticatedAt;
    }

    /**
     * @param \DateTimeInterface $authenticatedAt
     *
     * @return $this
     */
    public function setAuthenticatedAt(\DateTimeInterface $authenticatedAt): self
    {
        $this->authenticatedAt = $authenticatedAt;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMya2billingCode(): ?string
    {
        return $this->mya2billingCode;
    }

    /**
     * @param string $mya2billingCode
     *
     * @return $this
     */
    public function setMya2billingCode(string $mya2billingCode): self
    {
        $this->mya2billingCode = $mya2billingCode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return $this
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNewPhoneNumber(): ?string
    {
        return $this->newPhoneNumber;
    }

    /**
     * @param string $newPhoneNumber
     *
     * @return $this
     */
    public function setNewPhoneNumber(string $newPhoneNumber): self
    {
        $this->newPhoneNumber = $newPhoneNumber;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCarrierId(): ?int
    {
        return $this->carrierId;
    }

    /**
     * @param int $carrierId
     *
     * @return $this
     */
    public function setCarrierId(int $carrierId): self
    {
        $this->carrierId = $carrierId;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getNotifiedAt(): ?\DateTimeInterface
    {
        return $this->notifiedAt;
    }

    /**
     * @param \DateTimeInterface $notifiedAt
     *
     * @return $this
     */
    public function setNotifiedAt(\DateTimeInterface $notifiedAt): self
    {
        $this->notifiedAt = $notifiedAt;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getBalanceNotifications(): ?int
    {
        return $this->balanceNotifications;
    }

    /**
     * @param int $balanceNotifications
     *
     * @return $this
     */
    public function setBalanceNotifications(int $balanceNotifications): self
    {
        $this->balanceNotifications = $balanceNotifications;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPrevPin(): ?string
    {
        return $this->prevPin;
    }

    /**
     * @param string $prevPin
     *
     * @return $this
     */
    public function setPrevPin(string $prevPin): self
    {
        $this->prevPin = $prevPin;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getLastParkRequestAt(): ?\DateTimeInterface
    {
        return $this->lastParkRequestAt;
    }

    /**
     * @param \DateTimeInterface $lastParkRequestAt
     *
     * @return $this
     */
    public function setLastParkRequestAt(\DateTimeInterface $lastParkRequestAt): self
    {
        $this->lastParkRequestAt = $lastParkRequestAt;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSelectedDidId(): ?string
    {
        return $this->selectedDidId;
    }

    /**
     * @param string $selectedDidId
     *
     * @return $this
     */
    public function setSelectedDidId(string $selectedDidId): self
    {
        $this->selectedDidId = $selectedDidId;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getPromotionExpiresAt(): ?\DateTimeInterface
    {
        return $this->promotionExpiresAt;
    }

    /**
     * @param \DateTimeInterface $promotionExpiresAt
     *
     * @return $this
     */
    public function setPromotionExpiresAt(\DateTimeInterface $promotionExpiresAt): self
    {
        $this->promotionExpiresAt = $promotionExpiresAt;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPromotionStatus(): ?int
    {
        return $this->promotionStatus;
    }

    /**
     * @param int $promotionStatus
     *
     * @return $this
     */
    public function setPromotionStatus(int $promotionStatus): self
    {
        $this->promotionStatus = $promotionStatus;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAdmin(): ?bool
    {
        return $this->admin;
    }

    /**
     * @param bool $admin
     *
     * @return $this
     */
    public function setAdmin(bool $admin): self
    {
        $this->admin = $admin;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getR2r(): ?bool
    {
        return $this->r2r;
    }

    /**
     * @param bool $r2r
     *
     * @return $this
     */
    public function setR2r(bool $r2r): self
    {
        $this->r2r = $r2r;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getF2g(): ?bool
    {
        return $this->f2g;
    }

    /**
     * @param bool $f2g
     *
     * @return $this
     */
    public function setF2g(bool $f2g): self
    {
        $this->f2g = $f2g;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUseSip(): ?int
    {
        return $this->useSip;
    }

    /**
     * @param int $useSip
     *
     * @return $this
     */
    public function setUseSip(int $useSip): self
    {
        $this->useSip = $useSip;

        return $this;
    }

    /**
     * @return Collection|Park[]
     */
    public function getParks(): Collection
    {
        return $this->parks;
    }

    public function addPark(Park $park): self
    {
        if (!$this->parks->contains($park)) {
            $this->parks[] = $park;
            $park->setUser($this);
        }

        return $this;
    }

    public function removePark(Park $park): self
    {
        if ($this->parks->contains($park)) {
            $this->parks->removeElement($park);
            // set the owning side to null (unless already changed)
            if ($park->getUser() === $this) {
                $park->setUser(null);
            }
        }

        return $this;
    }
}
