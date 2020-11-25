<?php

namespace App\Domain\User\UseCase\Register;

interface RegisterPresenterInterface
{
    public function present(RegisterResponse $response): void;
}
