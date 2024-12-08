<?php

namespace App\Builder;

use App\DTO\UserDto;

class  UserBuilder
{

    public static function buildGetUserDto(): UserDto
    {
        $user = new UserDto();
        $user->setEmail("lilyandrashanski@gmail.com");
        $user->setFirstName("Lilyan");
        $user->setLastName("Drashanski");
        $user->setCountry("BG");
        $user->setDateOfBirth(new \DateTime("2004-08-11"));

        return $user;
    }
}