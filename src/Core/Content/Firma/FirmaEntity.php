<?php declare(strict_types=1);

namespace BasicPlugin\Core\Content\Firma;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;

class FirmaEntity extends Entity
{


    use EntityIdTrait;

    protected $name;


    protected $number;

    protected $email;

    protected $city;

    protected $country;

    protected $contacts;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }


    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(?string $number): void
    {
        $this->number = $number;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }


    public function setEmail(?string $email): void
    {
        $this->email = $email;
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

    public function getContacts(): ?array
    {
        return $this->contacts;
    }

    public function setContacts(?array $contacts): void
    {
        $this->contacts = $contacts;
    }
}
