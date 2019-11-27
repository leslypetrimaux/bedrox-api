<?php

namespace App\Controllers;

use App\Entity\Users;
use App\Services\UsersService;
use Bedrox\Core\Controller;
use Bedrox\Core\Render;

class DefaultController extends Controller
{
    /**
     * @return Render
     */
    public function default(): Render
    {
        return new Render([
            'this' => $this,
            'auth' => $this->getAuth(),
            'token' => $this->getToken()
        ]);
    }

    /**
     * @param Users $user
     * @param string $data
     * @return Render
     */
    public function custom(Users $user, string $data): Render
    {
        return new Render([
            'user' => $user,
            'string' => $data
        ]);
    }

    /**
     * @param UsersService $usersService
     * @return Render
     */
    public function list(UsersService $usersService): Render
    {
        return new Render([
            'users' => $usersService->list()
        ]);
    }

    /**
     * @param Users $user
     * @return Render
     */
    public function card(Users $user): Render
    {
        return new Render([
            'user' => $user
        ]);
    }
}
