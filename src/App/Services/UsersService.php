<?php

namespace App\Services;

use App\Entity\Users;

class UsersService extends AppService
{
    /**
     * UsersService constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return array
     */
    public function list(): array
    {
        return $this->repoUsers->findAll();
    }

    public function get(string $id): ?Users
    {
        if (!empty($id)) {
            /** @var Users $user */
            $user = $this->repoUsers->find($id);
            return $user;
        }
        return null;
    }
}
