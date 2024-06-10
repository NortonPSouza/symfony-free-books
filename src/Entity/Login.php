<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Login
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(nullable: false)]
    private string $password;

    #[ORM\Column(nullable: false)]
    private string $token;

    #[ORM\Column(nullable: false)]
    private int $expiresIn;

    #[ORM\OneToOne(targetEntity: "User")]
    #[ORM\JoinColumn(name: "id_user", referencedColumnName: "id")]
    private User $user;

}