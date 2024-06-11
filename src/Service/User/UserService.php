<?php

namespace App\Service\User;

use App\Helper\NotificationError;
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
        return false;
    }

}