<?php

namespace App\Controllers;

use App\Entity\Users;
use App\Services\UsersService;
use Bedrox\Core\Controller;
use Bedrox\Core\Render;

class DefaultController extends Controller
{

    /**
     * Customized constructor
     */
    public function __self()
    {
        // TODO: Create a fully customized constructor
    }

    /**
     * @return Render
     */
    public function usersCustom(): Render
    {
        return $this->render([
            'custom' => 'users folder'
        ]);
    }

    /**
     * @return Render
     */
    public function default(): Render
    {
        return $this->render();
    }

    /**
     * @param string $data
     * @return Render
     */
    public function custom(string $data): Render
    {
        return $this->render([
            'string' => $data
        ]);
    }

    /**
     * @param UsersService $usersService
     * @return Render
     */
    public function list(UsersService $usersService): Render
    {
        return $this->render([
            'users' => $usersService->list()
        ]);
    }

    /**
     * @param Users $user
     * @return Render
     */
    public function card(Users $user): Render
    {
        return $this->render([
            'user' => $user
        ]);
    }
}
