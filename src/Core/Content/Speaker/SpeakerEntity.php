<?php declare(strict_types=1);

namespace  BasicPlugin\Content\Speaker;


use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;

class SpeakerEntity extends Entity
{
use EntityIdTrait;

/**
* @var string|null
*/
protected $name;

/**
* @var string|null
*/
protected $nationality;

public function getName(): ?string
{
return $this->name;
}

public function setName(?string $name): void
{
$this->name = $name;
}

public function getNationality(): ?string
{
return $this->nationality;
}

public function setNationality(?string $nationality): void
{
$this->nationality = $nationality;
}
}