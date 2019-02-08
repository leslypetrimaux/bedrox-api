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
     * @var int 
     * @DB\Column id
     */
    public $id;

    /** 
     * @var string 
     * @DB\Column email
    */
    public $email;

    /** 
     * @var string 
     * @DB\Column password
    */
    public $password;

    /** 
     * @var string 
     * @DB\Column full_name
    */
    public $fullname;

    /**
     * @return int|null
     */
    public function getId(): ?int
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
     * @return null|string
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return Users|null
     */
    public function setPassword(string $password): ?self
    {
        $this->password = $password;
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