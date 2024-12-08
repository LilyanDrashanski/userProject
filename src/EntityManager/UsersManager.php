<?php

namespace App\EntityManager;

use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;

class UsersManager
{

    public EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function createUser($dto): void
    {
        $this->entityManager->persist($dto);
        $this->entityManager->flush();
    }

    public function updateUser(Users $user): void
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    public function deleteUser($token): void
    {
        $this->entityManager->remove($token);
        $this->entityManager->flush();
    }

}