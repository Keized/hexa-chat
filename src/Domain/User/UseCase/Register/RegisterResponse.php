<?php

namespace App\Domain\User\UseCase\Register;

use App\Domain\User\Entity\User;

class RegisterResponse
{
    public User $user;

    public array $errors;
}
