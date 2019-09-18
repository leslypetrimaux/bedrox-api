<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

/**
 * @Entity
 * @Table(name="users")
 */
class Users
{
    /**
     * @Id
     * @Column(type="string", name="id")
     */
    public $id;

    /**
     * @Column(type="string", name="email")
     */
    public $email;

    /**
     * @Column(type="string", name="password")
     */
    public $password;

    /**
     * @Column(type="string", name="fullname")
     */
    public $fullname;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $email
     * @return Users
     */
    public function setEmail(string $email): Users
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $password
     * @return Users
     */
    public function setPassword(string $password): Users
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $fullname
     * @return Users
     */
    public function setFullname(string $fullname): Users
    {
        $this->fullname = $fullname;
        return $this;
    }

    /**
     * @return string
     */
    public function getFullname(): string
    {
        return $this->fullname;
    }
}
