<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DayUnit
 *
 * @ORM\Table(name="day_unit")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DayUnitRepository")
 */
class DayUnit
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
     * @var int
     *
     * @ORM\Column(name="hourId", type="integer")
     */
    private $hourId;

    /**
     * @var integer
     *
     * @ORM\Column(name="amount", type="integer")
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=100)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="monthAt", type="string", length=255)
     */
    private $monthAt;

    /**
     * @var string
     *
     * @ORM\Column(name="yearAt", type="string", length=255)
     */
    private $yearAt;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="dayUnits")
     * @ORM\JoinColumn(name="user_id",referencedColumnName="id")
     */
    private $user;

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
     * Set hourId
     *
     * @param integer $hourId
     *
     * @return DayUnit
     */
    public function setHourId($hourId)
    {
        $this->hourId = $hourId;

        return $this;
    }

    /**
     * Get hourId
     *
     * @return int
     */
    public function getHourId()
    {
        return $this->hourId;
    }

    /**
     * Set amount
     *
     * @param integer $amount
     *
     * @return DayUnit
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amoutn
     *
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return DayUnit
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set monthAt
     *
     * @param string $monthAt
     *
     * @return DayUnit
     */
    public function setMonthAt($monthAt)
    {
        $this->monthAt = $monthAt;

        return $this;
    }

    /**
     * Get monthAt
     *
     * @return string
     */
    public function getMonthAt()
    {
        return $this->monthAt;
    }

    /**
     * Set yearAt
     *
     * @param string $yearAt
     *
     * @return DayUnit
     */
    public function setYearAt($yearAt)
    {
        $this->yearAt = $yearAt;

        return $this;
    }

    /**
     * Get yearAt
     *
     * @return string
     */
    public function getYearAt()
    {
        return $this->yearAt;
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

