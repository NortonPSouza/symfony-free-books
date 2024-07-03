<?php

namespace App\Service\User;

use App\Helper\NotificationError;
use App\Service\User\Dto\UserCreateDto;
use App\Service\User\storage\UserStorage;
use Doctrine\ORM\EntityManagerInterface;

class UserService
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private readonly UserStorage $userStorage
    )
    {
    }

    public function create(NotificationError $notificationError, UserCreateDto $userCreateDto): bool
    {
        return $this->userStorage->create($notificationError, $userCreateDto);
    }

}