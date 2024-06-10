<?php

namespace App\Controller;

use App\Helper\NotificationError;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route("api/v1/user")]
final class User
{

    #[Route("/", methods: [ "POST" ])]
    public function create(Response $response): Response
    {
        $notificationError = new NotificationError();

    }
}