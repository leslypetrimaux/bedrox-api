<?php

namespace App\Services;

use App\Entity\Users;
use Bedrox\Core\Service;

class AppService extends Service
{
    public $repoUsers;

    /**
     * UsersService constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->repoUsers = $this->_em->getRepository(Users::class);
    }
}
