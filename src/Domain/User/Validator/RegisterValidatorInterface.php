<?php

namespace App\Domain\User\Validator;

use App\Domain\User\Entity\User;
use App\Domain\User\UseCase\Register\RegisterRequest;

interface RegisterValidatorInterface
{
    public function validate(RegisterRequest $request): ?array;
}
