<?php

namespace App\Domain\User\Repository;

use App\Domain\User\Entity\User;

interface UserRepositoryInterface
{
    public function getUserByEmail(string $email): ?User;

    public function getUserById(string $id): ?User;

    public function addUser(User $user): ?User;

    public function deleteUser(string $id): void;
}
