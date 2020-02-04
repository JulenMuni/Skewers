<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Skewer
 *
 * @ORM\Table(name="skewer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SkewerRepository")
 */
class Skewer
{
    /**
 * @ORM\ManyToOne(targetEntity="Categories", inversedBy="Skewer")
 * @ORM\JoinColumn(name="id", referencedColumnName="id")
 */
 private $skewerCategory;
 
      /**
 * @ORM\ManyToOne(targetEntity="User", inversedBy="userSkewer")
 * @ORM\JoinColumn(name="id", referencedColumnName="id")
 */
 private $user;
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
     * @ORM\Column(name="Name", type="string", length=255)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="Calories", type="integer")
     */
    private $calories;

    /**
    * @ORM\ManyToOne(targetEntity="Categories", inversedBy="skewer")
    * @ORM\JoinColumn(name="id", referencedColumnName="id")
    */
    private $category;
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Skewer
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set calories
     *
     * @param integer $calories
     *
     * @return Skewer
     */
    public function setCalories($calories)
    {
        $this->calories = $calories;

        return $this;
    }

    /**
     * Get calories
     *
     * @return int
     */
    public function getCalories()
    {
        return $this->calories;
    }
    function getSkewerCategory() {
        return $this->skewerCategory;
    }

    function getUser() {
        return $this->user;
    }

    function getCategory() {
        return $this->category;
    }

    function setSkewerCategory(SkewerCategory $skewerCategory) {
        $this->skewerCategory = $skewerCategory;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function setCategory($category) {
        $this->category = $category;
    }
}

