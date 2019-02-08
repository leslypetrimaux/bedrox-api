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
        $queryBuilder = $this->getEntityManager()
            ->getRepo('users')
            ->createQueryBuilder()
            ->query('select id, email, full_name from users');
        return array(
            'this' => $this,
            '$queryBuilder' => $queryBuilder
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