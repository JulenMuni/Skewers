<?php

namespace AppBundle\Repository;

/**
 * SkewerRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SkewerRepository extends \Doctrine\ORM\EntityRepository
{
    public function findAllOrder(){        
        return $this->getEntityManager()->createQuery(
                "SELECT FROM AppBundle:Skewer ORDER BY DESC")->getResult();
    }
}
