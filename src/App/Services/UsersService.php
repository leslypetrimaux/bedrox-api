<?php

namespace App\Services;

use App\Entity\Users;

class UsersService extends AppService
{

    /**
     * Customized constructor
     */
    public function __self()
    {
        // TODO: Create a fully customized constructor
    }

    /**
     * @return array
     */
    public function list(): array
    {
        return $this->repoUsers->findAll();
    }

    /**
     * @param string $id
     * @return Users|null
     */
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
