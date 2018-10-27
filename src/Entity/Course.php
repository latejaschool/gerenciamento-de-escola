<?php
/**
 * Created by PhpStorm.
 * User: Alessandro Feitoza <eu@alessandrofeitoza.eu>
 * Date: 18/10/18
 * Time: 20:30
 */

namespace App\Entity;

use Doctrine\ORM\Mapping\{
    PreUpdate,
    PrePersist,
    HasLifecycleCallbacks,
    GeneratedValue,
    Id,
    Column,
    Table,
    Entity
};
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @Entity()
 * @Table(name="course")
 * @HasLifecycleCallbacks()
 */
class Course
{
    /**
     * @var int
     * @Id()
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Column(length=100)
     */
    private $name;

    /**
     * @var string
     * @Column(length=200)
     */
    private $description;

    /**
     * @var int
     * @Column(type="integer")
     */
    private $workload;

    /**
     * @var \DateTime
     * @Column(type="datetime")
     */
    private $registeredAt;

    /**
     * @var \DateTime
     * @Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @PrePersist()
     */
    public function prePersist()
    {
        $this->registeredAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    /**
     * @PreUpdate()
     */
    public function preUpdate()
    {
        $this->updatedAt = new \DateTime();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getWorkload(): int
    {
        return $this->workload;
    }

    /**
     * @param int $workload
     */
    public function setWorkload(int $workload): void
    {
        $this->workload = $workload;
    }

    /**
     * @return \DateTime
     */
    public function getRegisteredAt(): \DateTime
    {
        return $this->registeredAt;
    }

    /**
     * @param \DateTime $registeredAt
     */
    public function setRegisteredAt(\DateTime $registeredAt): void
    {
        $this->registeredAt = $registeredAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }



}