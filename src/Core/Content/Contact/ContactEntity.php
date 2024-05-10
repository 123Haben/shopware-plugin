<?php declare(strict_types=1);

namespace BasicPlugin\Core\Content\Contact;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;

class ContactEntity extends Entity
{


    use EntityIdTrait;

    /**
     * {@inheritdoc}
     */
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return null;
    }

    protected $name;

    protected $nachname;

    protected $age;

    protected $email;

        protected $telefon;

    protected $street;


    protected $number;


    protected $postcode;


    protected $city;


    protected $country;


    protected $active = false;

    /** @var string */
    protected $firmaId;



    public function __toString(): string
    {
        return $this->isActive() ? 'active' : 'inactive';
    }


    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }


    public function getNachname(): ?string
    {
        return $this->nachname;
    }

    public function setNachname(?string $nachname): void
    {
        $this->nachname = $nachname;
    }

    public function getAge(): ?string
    {
        return $this->age;
    }

    public function setAge(?string $age): void
    {
        $this->age = $age;
    }
    public function getEmail(): ?string
    {
        return $this->email;
    }


    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getTelefon(): ?string
    {
        return $this->telefon;
    }

    public function setTelefon(?string $telefon): void
    {
        $this->telefon = $telefon;
    }


    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(?string $street): void
    {
        $this->street = $street;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(?string $number): void
    {
        $this->number = $number;
    }

    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    public function setPostcode(?string $postcode): void
    {
        $this->postcode = $postcode;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): void
    {
        $this->country = $country;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    public function getFirmaId(): string
    {
        return $this->firmaId;
    }

    public function setFirmaId(string $firmaId): void
    {
        $this->firmaId = $firmaId;
    }
}