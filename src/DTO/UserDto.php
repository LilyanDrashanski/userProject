<?php

namespace App\DTO\Request;

use DateTimeInterface;
use Symfony\Component\Validator\Constraints as Assert;

class UserDto
{
    #[Assert\NotBlank(message: "Email should not be blank", groups: ['create'])]
    #[Assert\Email(message: "Email should be valid", groups: ['create'])]
    public string $email;
    #[Assert\NotBlank(message: "First name should not be blank", groups: ['create'])]
    #[Assert\Length(min: 3, groups: ['create'])]
    #[Assert\Type(type: "alpha", groups: ['create'])]
    public string $firstName;
    #[Assert\Type(type: "alpha", groups: ['create'])]
    #[Assert\Length(min: 3, groups: ['create'])]
    public string $middleName;
    #[Assert\Type(type: "alpha", groups: ['create'])]
    #[Assert\NotBlank(message: "Last name should not be blank", groups: ['create'])]
    #[Assert\Length(min: 3, groups: ['create'])]
    public string $lastName;
    #[Assert\NotBlank(message: "Country should not be blank", groups: ['create'])]
    #[Assert\Country(groups: ['create'])]
    public string $country;
    #[Assert\NotBlank(message: "Date of birth should not be blank", groups: ['create', 'update'])]
    #[Assert\LessThan('-18 years', message: "User should be 18 years old", groups: ['create'])]
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

    public function getMiddleName(): string
    {
        return $this->middleName;
    }

    public function setMiddleName(string $middleName): void
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