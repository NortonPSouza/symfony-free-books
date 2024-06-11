<?php

namespace App\Service\User\Dto;

use App\Helper\ArraySerialization;

final class UserCreateDto implements ArraySerialization
{
    public function __construct(
        private readonly string $name,
        private readonly string $email,
        private ?string $password
    )
    {
    }

    public function fromArray(array $data): UserCreateDto
    {
        
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     * @return $this
     */
    public function setPassword(?string $password): UserCreateDto
    {
        $this->password = $password;
        return $this;
    }


    /**
     * @return array
     */
    public function toArray(): array
    {
        // TODO: Implement toArray() method.
    }
}