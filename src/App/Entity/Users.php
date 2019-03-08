<?php

namespace App\Entity;

use Bedrox\Core\Entity;

/**
 * @DB\Table users
 * @DB\Primary id
 */
class Users extends Entity
{
    /**
     * @var string
     * @DB\Column {name="id", type="string", length="50"}
     * @DB\Strategy uuid
     */
    public $id;

    /**
     * @var string
     * @DB\Column {name="email", type="string", length="255"}
    */
    public $email;

    /**
     * @var string
     * @DB\Column {name="is_admin", type="bool"}
    */
    public $isAdmin;

    /**
     * @var string
     * @DB\Column {name="fullname", type="string", length="255"}
    */
    public $fullname;

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Users|null
     */
    public function setEmail(string $email): ?self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->isAdmin;
    }

    /**
     * @param bool $isAdmin
     * @return Users|null
     */
    public function setAdmin(bool $isAdmin): ?self
    {
        $this->isAdmin = $isAdmin;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getFullname(): ?string
    {
        return $this->fullname;
    }

    /**
     * @param string $fullname
     * @return Users|null
     */
    public function setFullname(string $fullname): ?self
    {
        $this->fullname = $fullname;
        return $this;
    }
}