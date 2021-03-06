<?php
/**
 *  * Created by PhpStorm.
 * User: Dawid Bednarz( dawid@bednarz.pl )
 */
declare(strict_types=1);

namespace DawBed\PHPUser\Model\User;

use DawBed\PHPContext\ContextInterface;
use DawBed\PHPUser\User;
use DawBed\PHPUser\UserInterface;
use DawBed\PHPUser\UserStatusInterface;

abstract class BaseModel
{
    protected $entity;

    function __construct(
        UserInterface $entity,
        UserStatusInterface $userStatus,
        ContextInterface $status
    )
    {
        $this->entity = $entity;
        $userStatus
            ->setUser($entity)
            ->setStatus($status);
        $this->entity->addStatus($userStatus);
    }

    public function getEntity(): User
    {
        return $this->entity;
    }

}