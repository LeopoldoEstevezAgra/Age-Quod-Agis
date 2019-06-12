<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * subgoal
 *
 * @ORM\Table(name="subgoal")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SubgoalRepository")
 */
class Subgoal
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var bool
     *
     * @ORM\Column(name="complete", type="boolean")
     */
    private $complete=false;

    /**
     * @ORM\ManyToOne(targetEntity="Goal", inversedBy="subgoals")
     * @ORM\JoinColumn(name="goal_id",referencedColumnName="id")
     */
    private $goal;

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
     * Set title
     *
     * @param string $title
     *
     * @return subgoal
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Set complete
     *
     * @param boolean $complete
     *
     * @return Goal
     */
    public function setComplete($complete)
    {
        $this->complete = $complete;

        return $this;
    }

    /**
     * Get complete
     *
     * @return bool
     */
    public function getComplete()
    {
        return $this->complete;
    }

    /**
     * Set goal
     *
     * @param \AppBundle\Entity\Goal $goal
     *
     * @return Goal
     */
    public function setGoal(\AppBundle\Entity\Goal $goal = null)
    {
        $this->goal = $goal;

        return $this;
    }

    /**
     * Get goal
     *
     * @return \AppBundle\Entity\Goal
     */
    public function getGoal()
    {
        return $this->goal;
    }
}

