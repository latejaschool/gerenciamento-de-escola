<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Entity;

/**
 * @Entity()
 * @Table(name="teacher")
 */
class Teacher
{
    /**
     * @var User
     * @Id()
     * @OneToOne(targetEntity="User", cascade={"all"})
     * @JoinColumn()
     */
    private $user;

    /**
     * @var string
     * @Column(length=30)
     */
    private $formation;

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getFormation(): string
    {
        return $this->formation;
    }

    /**
     * @param string $formation
     */
    public function setFormation(string $formation): void
    {
        $this->formation = $formation;
    }


}