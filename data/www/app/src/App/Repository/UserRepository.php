<?php

namespace App\Repository;

use App\Entity\User;
use Beaver\Repository\AbstractRepository;

class UserRepository extends AbstractRepository
{
    public function getUserByEmail(string $email): ?User
    {
        return $this->getOne(
            $this->getByRow('email', $email)
        );
    }
}
