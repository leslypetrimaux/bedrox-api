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
     * @return array
     */
    public function card(Users $user): array
    {
        $repo = $this->_em->getRepository(Users::class);
        $find = $repo->find($user);
        return array(
            'user' => $find
        );
    }
}
