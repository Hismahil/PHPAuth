<?php

namespace PHPAuth\Models\Repositories;
use Doctrine\ORM\EntityRepository;

class RoleRepository extends EntityRepository
{
    public function getAll(){
    	return $this->_em->createQuery("SELECT r FROM PHPAuth\Models\Role r")->getResult();
    }
}