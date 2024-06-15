<?php

namespace App\Service\User;

use App\Helper\NotificationError;
use App\Service\User\Dto\UserCreateDto;
use Doctrine\ORM\EntityManagerInterface;

class UserService
{
    public function __construct(
        private EntityManagerInterface $entityManager
    )
    {
    }

    public function create(NotificationError $notificationError, array $data): bool
    {
        $userDto = UserCreateDto::fromArray($notificationError, $data);
        if(!$userDto){
            return false;
        }
        return false;
    }

}