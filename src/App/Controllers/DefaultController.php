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
        $find = $repo->find('5c69236cc9dd2');
        return array(
            'this' => $this,
            'users' => $findAll,
            'user' => $find
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
            'this' => $this,
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
            'this' => $this,
            'user' => $user
        );
    }
}