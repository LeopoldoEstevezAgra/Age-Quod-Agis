<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25, unique=true)
     */
    private $username;

    /**
     * @Assert\NotBlank
     * @Assert\Length(max=4096)
     */
    private $plainPassword;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=254, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @ORM\Column(name="roles",type="string",length=255)
     */
    private $roles;

    /**
     * @ORM\OneToMany(targetEntity="MonthTask",mappedBy="user")
     */
    private $monthTasks;

    /**
     * @ORM\OneToMany(targetEntity="DayTask",mappedBy="user")
     */
    private $dayTasks;

    /**
     * @ORM\OneToMany(targetEntity="Event",mappedBy="user")
     */
    private $events;

    public function __construct()
    {
        $this->isActive = true;
        $this->monthTasks = new ArrayCollection();
        $this->dayTasks = new ArrayCollection();
        $this->events= new ArrayCollection();
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email= $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password= $password;
    }

    public function getRoles()
    {
        $roles = json_decode($this->roles);
        return $roles;
    }

    public function setRoles($roles)
    {
        $roles_json = json_encode($roles);
        return $this->roles=$roles_json;
    }

    public function eraseCredentials()
    { }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize([
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ]);
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized, ['allowed_classes' => false]);
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Add monthTask
     *
     * @param \AppBundle\Entity\MonthTask $monthTask
     *
     * @return User
     */
    public function addMonthTask(\AppBundle\Entity\MonthTask $monthTask)
    {
        $this->monthTasks[] = $monthTask;

        return $this;
    }

    /**
     * Remove monthTask
     *
     * @param \AppBundle\Entity\MonthTask $monthTask
     */
    public function removeMonthTask(\AppBundle\Entity\MonthTask $monthTask)
    {
        $this->monthTasks->removeElement($monthTask);
    }

    /**
     * Get monthTasks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMonthTasks()
    {
        return $this->monthTasks;
    }

    /**
     * Add dayTask
     *
     * @param \AppBundle\Entity\DayTask $dayTask
     *
     * @return User
     */
    public function addDayTask(\AppBundle\Entity\DayTask $dayTask)
    {
        $this->dayTasks[] = $dayTask;

        return $this;
    }

    /**
     * Remove dayTask
     *
     * @param \AppBundle\Entity\DayTask $dayTask
     */
    public function removeDayTask(\AppBundle\Entity\DayTask $dayTask)
    {
        $this->dayTasks->removeElement($dayTask);
    }

    /**
     * Get dayTasks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDayTasks()
    {
        return $this->dayTasks;
    }

    /**
     * Add event 
     *
     * @param \AppBundle\Entity\Event $event
     *
     * @return User
     */
    public function addEvent(\AppBundle\Entity\Event $event)
    {
        $this->events[] = $event;

        return $this;
    }

    /**
     * Remove event 
     *
     * @param \AppBundle\Entity\Event $event
     */
    public function removeEvent(\AppBundle\Entity\Event $event)
    {
        $this->events->removeElement($event);
    }

    /**
     * Get event
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEvents()
    {
        return $this->events;
    }
}
