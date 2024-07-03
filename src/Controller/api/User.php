<?php

namespace App\Controller\api;

use App\Helper\NotificationError;
use App\Helper\VerifyToken;
use App\Service\User\Validate\UserForm;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route("api/v1/user")]
final class User
{

    #[Route("/", methods: ["POST"])]
    public function create(Request $request): Response
    {
        $notificationError = new NotificationError();
        $hasPermission = VerifyToken::verify($notificationError, $request->headers->get("Authorization"));
        if (!$hasPermission) {
            return new JsonResponse($notificationError->getErrors(), $notificationError->getStatusCode());
        }
        $data = [
            "name" => (string)$request->get("name"),
            "email" => (string)$request->get("email"),
            "password" => (string)$request->get("password"),
        ];
        $dataIsValid = UserForm::validateCreate($notificationError, $data);
        if (!$dataIsValid) {
            return new JsonResponse($notificationError->getErrors(), $notificationError->getStatusCode());
        }
        return new Response("", Response::HTTP_CREATED);
    }
}