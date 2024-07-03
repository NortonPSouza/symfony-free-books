<?php

namespace App\Service\User\storage;
//
use App\Entity\Login;
use App\Entity\User;
use App\Helper\NotificationError;
use App\Service\User\Dto\UserCreateDto;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

final class UserStorage
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager
    )
    {
    }

    public function create(NotificationError $notificationError, UserCreateDto $userCreateDto): bool
    {
        try{
            $userEntity = new User();
            $userEntity->setEmail($userCreateDto->getEmail());
            $userEntity->setName($userCreateDto->getName());
            $loginEntity = new Login();
            $passwordCrypt = password_hash($userCreateDto->getPassword(),"SHA256");
            $loginEntity->setPassword($passwordCrypt);
            $this->entityManager->persist($userEntity);
            $this->entityManager->persist($loginEntity);
            $this->entityManager->flush();
            return true;
        }catch (\Exception $exception){
            $notificationError
                ->setErrors(["internal" => "internal server error"])
                ->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
            return false;
        }
    }

}