<?php

namespace App\Controllers;

use App\Entity\Users;
use Bedrox\Core\Controller;

class DefaultController extends Controller
{
    /**
     * @return array
     */
    public function default(): array
    {
        $repo = $this->_em->getRepository(Users::class);
        $findAll = $repo->findAll();
        dump($findAll);
        return array(
            'this' => $this,
        );
    }
    /**
     * @return array
     */
    public function list(): array
    {
        $repo = $this->_em->getRepository(Users::class);
        $findAll = $repo->findAll();
        return array(
            'users' => $findAll
        );
    }

    /**
     * @param Users $user
     * @param int $int
     * @return array
     */
    public function card(Users $user, int $int): array
    {
        return array(
            'user' => $user,
            'int' => $int
        );
    }
}
