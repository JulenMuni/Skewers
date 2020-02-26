<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tmp
 *
 * @ORM\Table(name="tmp")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TmpRepository")
 */
class Tmp
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="asd", type="string", length=255)
     */
    private $asd;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set asd.
     *
     * @param string $asd
     *
     * @return Tmp
     */
    public function setAsd($asd)
    {
        $this->asd = $asd;

        return $this;
    }

    /**
     * Get asd.
     *
     * @return string
     */
    public function getAsd()
    {
        return $this->asd;
    }
}
