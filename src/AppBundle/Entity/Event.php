<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Event
 *
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EventRepository")
 */
class Event
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
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="starts", type="datetime")
     */
    private $starts;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ends", type="datetime", nullable=true)
     */
    private $ends;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=7, nullable=true)
     * @Assert\Choice(callback="getColors")
     */
    private $color;

    /**
     * @var Boolean
     * @ORM\Column(name="all_day", type="boolean")
     */
    private $allDay = false;

    /**
     * @var string
     * @ORM\Column(name="venue", type="string", nullable=true)
     */
	private $venue;
	
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="dayTasks")
     * @ORM\JoinColumn(name="user_id",referencedColumnName="id")
     */
    private $user;


    public static function getColors()
    {
        return ['red', 'blue', 'yellow', 'black', 'green', 'purple'];
    }

    public function __construct()
    {
        return ['red', 'blue', 'yellow', 'black', 'green', 'purple'];
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
     * Set title
     *
     * @param string $title
     *
     * @return Event
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
     * Set comment
     *
     * @param string $description
     *
     * @return Event
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set starts
     *
     * @param \DateTime $starts
     *
     * @return Event
     */
    public function setStarts($starts)
    {
        $this->starts = $starts;

        return $this;
    }

    /**
     * Get starts
     *
     * @return \DateTime
     */
    public function getStarts()
    {
        return $this->starts;
    }

    /**
     * Set ends
     *
     * @param \DateTime $ends
     *
     * @return Event
     */
    public function setEnds($ends)
    {
        $this->ends = $ends;

        return $this;
    }

    /**
     * Get ends
     *
     * @return \DateTime
     */
    public function getEnds()
    {
        return $this->ends;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Event
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @return boolean
     */
    public function isAllDay()
    {
        return $this->allDay;
    }

    /**
     * @param boolean $allDay
     * @return Event
     */
    public function setAllDay($allDay)
    {
        $this->allDay = $allDay;

        return $this;
    }

    /**
     * @return string
     */
    public function getVenue()
    {
        return $this->venue;
    }

    /**
     * @param string $venue
     * @return Event
     */
    public function setVenue(string $venue)
    {
        $this->venue = $venue;

        return $this;
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
