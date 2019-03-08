<?php

namespace App\Controllers;

use Bedrox\Core\Controller;
use App\Entity\Users;

class DefaultController extends Controller
{
    /**
     * @return array
     */
    public function default(): array
    {
        $em = $this->getEntityManager();
        $repo = $em->getRepo('users');
        $findAll = $repo->findAll();
        $u = $repo->find('5c7ed8776285a2.74644033');
        return array(
            'this' => $this,
            'users' => $findAll,
            'user' => $u
        );
    }
    /**
     * @return array
     */
    public function list(): array
    {
        $em = $this->getEntityManager();
        $repo = $em->getRepo('users');
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
        return array(
            'user' => $user
        );
    }
}