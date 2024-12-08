<?php

namespace App\DTO;

use DateTimeInterface;
use Symfony\Component\Validator\Constraints as Assert;

class UserDto
{

    #[Assert\NotBlank(message: "Email should not be blank",groups: ['update','create'])]
    #[Assert\Email(message: "Email should be valid", groups: ['update','create'])]
    public string $email;

    #[Assert\NotBlank(message: "First name should not be blank",groups: ['update','create'])]
    #[Assert\Length(min: 3, groups: ['update','create'])]
    #[Assert\Type(type: "alpha", groups: ['update','create'])]
    public string $firstName;

    #[Assert\Type(type: "alpha", groups: ['update','create'])]
    #[Assert\Length(min: 3, groups: ['update','create'])]
    public ?string $middleName = null;

    #[Assert\Type(type: "alpha", groups: ['update','create'])]
    #[Assert\NotBlank(message: "Last name should not be blank",groups: ['update','create'])]
    #[Assert\Length(min: 3, groups: ['update','create'])]
    public string $lastName;

    #[Assert\NotBlank(message: "Country should not be blank",groups: ['update','create'])]
    #[Assert\Country(groups: ['update','create'])]
    public string $country;

    #[Assert\NotBlank(message: "Date of birth should not be blank",groups: ['create','update'])]
    #[Assert\LessThan('-18 years', message: "User should be 18 years old", groups: ['update','create'])]
    protected DateTimeInterface $dateOfBirth;


    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getMiddleName(): ?string
    {
        return $this->middleName;
    }

    public function setMiddleName(?string $middleName): void
    {
        $this->middleName = $middleName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    public function getDateOfBirth(): DateTimeInterface
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(DateTimeInterface $dateOfBirth): void
    {
        $this->dateOfBirth = $dateOfBirth;
    }
}
