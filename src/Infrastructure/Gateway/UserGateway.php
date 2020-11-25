<?php

namespace App\Infrastructure\Gateway;

use App\Domain\User\Entity\User;
use App\Domain\User\Repository\UserRepositoryInterface;

class UserGateway implements UserRepositoryInterface
{
    public function getUserByEmail(string $email): ?User
    {
        return null;
    }

    public function getUserById(string $id): ?User
    {
        return null;
    }

    public function addUser(User $user): ?User
    {
        $user->setUuid(uniqid());
        return $user;
    }

    public function deleteUser(string $id): void
    {
        // TODO: Implement deleteUser() method.
    }
}
