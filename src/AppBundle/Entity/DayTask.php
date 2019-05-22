<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DayTask
 *
 * @ORM\Table(name="day_tasks")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DayTaskRepository")
 */
class DayTask 
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
     * @ORM\Column(name="description", type="string", length=150)
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="finished", type="boolean")
     */
    private $finished;

    /**
     * @var \DateTime
     * 
     * @ORM\Column(name="date",type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="dayTasks")
     * @ORM\JoinColumn(name="user_id",referencedColumnName="id")
     */
    private $user;


    public function __construct()
{
    $this->setDate(new \DateTime());
    $this->setFinished(false);
}

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
     * Set description
     *
     * @param string $description
     *
     * @return MonthTask
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set finished
     *
     * @param boolean $finished
     *
     * @return MonthTask
     */
    public function setFinished($finished=false)
    {
        $this->finished = $finished;

        return $this;
    }

    /**
     * Get finished
     *
     * @return bool
     */
    public function getFinished()
    {
        return $this->finished;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return MonthTask
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return MonthTask
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
