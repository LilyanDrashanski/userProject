<?php

namespace App\Controller;

use App\Builder\UserBuilder;
use App\DTO\UserDto;
use App\EntityManager\UsersManager;
use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;

class UserController extends AbstractController
{

    private UsersManager $usersManager;

    private UsersRepository $usersRepository;


    public function __construct(UsersManager $usersManager, UsersRepository $usersRepository)
    {
        $this->usersManager = $usersManager;
        $this->usersRepository = $usersRepository;
    }


    #[Route('/v1/users', name: 'user_create', methods: ['POST'])]
    public function createUser(#[MapRequestPayload(validationGroups: ['create'], validationFailedStatusCode: Response::HTTP_BAD_REQUEST)] UserDto $dto): Response
    {

        $user = UserBuilder::buildCreateUserDto($dto);

        $this->usersManager->createUser($user);

        return $this->json(["token" => $user->getToken()], 201);
    }

    #[Route('/v1/users/{token}', name: 'user_update', methods: ['PUT'], format: 'json')]
    public function updateUser(#[MapRequestPayload(validationGroups: ['update'] ,validationFailedStatusCode: Response::HTTP_BAD_REQUEST)] UserDto $dto, string $token): Response
    {

        $user = $this -> usersRepository->findOneByToken($token);

        if ($user == null) {
            throw new NotFoundHttpException(message: "User with id $token not found");
        }

        $user = UserBuilder::buildUpdateUser($user,$dto);

        $this->usersManager->updateUser($user);

        return $this->json(null, 204);

    }

    #[Route('/v1/users/{token}', name: 'user_delete', methods: ['DELETE'])]
    public function deleteUser(string $token): Response
    {
        $user = $this -> usersRepository->findOneByToken($token);

        if ($user == null) {
            throw new NotFoundHttpException(message: "User with id token not found");
        }

        $this->usersManager->deleteUser($user);

        return $this->json([], 204);
    }

    #[Route('/v1/users/{token}', name: 'user_details', methods: ['GET'])]
    public function userDetails(string $token): Response
    {
        $user = $this -> usersRepository->findOneByToken($token);

        if ($user == null) {
            throw new NotFoundHttpException(message: "User with id $token not found");
        }

        $user = UserBuilder::buildGetUserDto($user);

        return $this->json($user,200,[],[AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);
    }

}
