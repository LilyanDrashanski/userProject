<?php

namespace App\Controller;

use App\DTO\Request\UserDto;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Uid\Uuid;

class UserController extends AbstractController
{


    #[Route('/v1/users', name: 'user_create', methods: ['POST'])]
    public function createUser(#[MapRequestPayload(validationGroups: ['create'], validationFailedStatusCode: Response::HTTP_BAD_REQUEST)] UserDto $dto): Response
    {
        $id = Uuid::v7();

        return $this->json(["id" => $id], 201);
    }
}
