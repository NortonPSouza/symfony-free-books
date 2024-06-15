<?php

namespace App\Service\User\Validate;

use App\Helper\NotificationError;
use Respect\Validation\Validator as v;
use Symfony\Component\HttpFoundation\Response;

abstract class UserForm
{
    public static function validateCreate(NotificationError $notificationError, array $data): bool
    {
        $validate = v::allOf(
            v::key("name", v::stringType()->notEmpty()->setName("name")),
            v::key("email", v::stringType()->notEmpty()->email()->setName("email")),
            v::key("password", v::stringType()->notEmpty()->setName("password")),
        );
        try {
            $validate->assert($data);
        } catch (\InvalidArgumentException $e) {
            $notificationError
                ->setStatusCode(Response::HTTP_BAD_REQUEST)
                ->setErrors([
                    "error" => "invalid params"
                ]);
            return false;
        }
        return $validate->validate($data);
    }
}