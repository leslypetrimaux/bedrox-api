<?php

namespace App\Services;

use App\Entity\Users;
use Bedrox\Core\Service;
use Doctrine\ORM\EntityRepository;

class AppService extends Service
{
    /** @var EntityRepository $repoUsers */
    public $repoUsers;
    public $request;

    public function __construct()
    {
        parent::__construct();
        $this->repoUsers = $this->_em->getRepository(Users::class);
        $this->request = $this->_req;
    }

    /**
     * Customized constructor
     */
    public function __self()
    {
        // TODO: Create a fully customized constructor
    }
}
