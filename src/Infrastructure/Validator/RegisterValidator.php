<?php

namespace App\Infrastructure\Validator;

use App\Domain\User\UseCase\Register\RegisterRequest;
use App\Domain\User\Validator\RegisterValidatorInterface;

class RegisterValidator implements RegisterValidatorInterface
{
    public function validate(RegisterRequest $request): array
    {
        return [];
    }
}
