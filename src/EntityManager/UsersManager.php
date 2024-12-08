<?php

namespace App\EntityManager;

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

}