<?php

namespace App\Builder;

use App\DTO\UserDto;
use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Uid\Uuid;

class  UserBuilder
{

    public static function buildGetUserDto(Users $user): UserDto
    {
        $response = new UserDto();
        $response->setEmail($user->getEmail());
        $response->setFirstName($user->getFirstName());
        $response->setLastName($user->getLastName());
        $response->setMiddleName($user->getMiddleName());
        $response->setCountry($user->getCountry());
        $response->setDateOfBirth($user->getDateOfBirth());

        return $response;
    }

    public static function buildCreateUserDto(UserDto $dto): Users
    {
        $user = new Users();
        $user -> setToken(Uuid::v7());
        $user->setEmail($dto->getEmail());
        $user->setFirstName($dto->getFirstName());
        $user->setMiddleName($dto->getMiddleName());
        $user->setLastName($dto->getLastName());
        $user->setCountry($dto->getCountry());
        $user->setDateOfBirth($dto->getDateOfBirth());

        return $user;

    }

    public static function buildUpdateUser(Users $user,UserDto $dto): Users
    {
        $user->setEmail($dto->getEmail());
        $user->setFirstName($dto->getFirstName());
        $user->setMiddleName($dto->getMiddleName());
        $user->setLastName($dto->getLastName());
        $user->setCountry($dto->getCountry());
        $user->setDateOfBirth($dto->getDateOfBirth());

        return $user;

    }
}