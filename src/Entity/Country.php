<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(indexes={@ORM\Index(name="code__idx", columns={"code"})})
 */
class Country
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $areaId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $code;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $rate;

    /**
     * @ORM\Column(type="boolean")
     */
    private $registrable;

    /**
     * @ORM\Column(type="boolean")
     */
    private $supported;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prefix;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $exchangeRate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $currency;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $currencySymbol;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $capital;

    /**
     * @ORM\Column(type="boolean")
     */
    private $linked;

    /**
     * @ORM\Column(type="boolean")
     */
    private $happyDestination;

    /**
     * @ORM\Column(type="boolean")
     */
    private $r2r;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Park", mappedBy="country")
     */
    private $parks;

    public function __construct()
    {
        $this->parks = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return int|null
     */
    public function getAreaId(): ?int
    {
        return $this->areaId;
    }

    /**
     * @param int $areaId
     *
     * @return $this
     */
    public function setAreaId(int $areaId): self
    {
        $this->areaId = $areaId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param string $code
     *
     * @return $this
     */
    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRate(): ?string
    {
        return $this->rate;
    }

    /**
     * @param string $rate
     *
     * @return $this
     */
    public function setRate(string $rate): self
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getRegistrable(): ?bool
    {
        return $this->registrable;
    }

    /**
     * @param bool $registrable
     *
     * @return $this
     */
    public function setRegistrable(bool $registrable): self
    {
        $this->registrable = $registrable;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getSupported(): ?bool
    {
        return $this->supported;
    }

    /**
     * @param bool $supported
     *
     * @return $this
     */
    public function setSupported(bool $supported): self
    {
        $this->supported = $supported;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPrefix(): ?string
    {
        return $this->prefix;
    }

    /**
     * @param string $prefix
     *
     * @return $this
     */
    public function setPrefix(string $prefix): self
    {
        $this->prefix = $prefix;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getExchangeRate(): ?string
    {
        return $this->exchangeRate;
    }

    /**
     * @param string $exchangeRate
     *
     * @return $this
     */
    public function setExchangeRate(string $exchangeRate): self
    {
        $this->exchangeRate = $exchangeRate;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     *
     * @return $this
     */
    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCurrencySymbol(): ?string
    {
        return $this->currencySymbol;
    }

    /**
     * @param string $currencySymbol
     *
     * @return $this
     */
    public function setCurrencySymbol(string $currencySymbol): self
    {
        $this->currencySymbol = $currencySymbol;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCapital(): ?string
    {
        return $this->capital;
    }

    /**
     * @param string $capital
     *
     * @return $this
     */
    public function setCapital(string $capital): self
    {
        $this->capital = $capital;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getLinked(): ?bool
    {
        return $this->linked;
    }

    /**
     * @param bool $linked
     *
     * @return $this
     */
    public function setLinked(bool $linked): self
    {
        $this->linked = $linked;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHappyDestination(): ?bool
    {
        return $this->happyDestination;
    }

    /**
     * @param bool $happyDestination
     *
     * @return $this
     */
    public function setHappyDestination(bool $happyDestination): self
    {
        $this->happyDestination = $happyDestination;

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
            $park->setCountry($this);
        }

        return $this;
    }

    public function removePark(Park $park): self
    {
        if ($this->parks->contains($park)) {
            $this->parks->removeElement($park);
            // set the owning side to null (unless already changed)
            if ($park->getCountry() === $this) {
                $park->setCountry(null);
            }
        }

        return $this;
    }
}
