<?php
namespace AppBundle\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class OperationHours
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $validStartDate;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $validEndDate;

    /**
     * @ORM\Column(type="time", nullable=false)
     */
    private $openTime;

    /**
     * @ORM\Column(type="time", nullable=false)
     */
    private $closeTime;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $dayOfWeek;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\ContactCard", mappedBy="operationHours")
     */
    private $contactCard;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contactCard = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set validStartDate
     *
     * @param \DateTime $validStartDate
     *
     * @return OperationHours
     */
    public function setValidStartDate($validStartDate)
    {
        $this->validStartDate = $validStartDate;

        return $this;
    }

    /**
     * Get validStartDate
     *
     * @return \DateTime
     */
    public function getValidStartDate()
    {
        return $this->validStartDate;
    }

    /**
     * Set validEndDate
     *
     * @param \DateTime $validEndDate
     *
     * @return OperationHours
     */
    public function setValidEndDate($validEndDate)
    {
        $this->validEndDate = $validEndDate;

        return $this;
    }

    /**
     * Get validEndDate
     *
     * @return \DateTime
     */
    public function getValidEndDate()
    {
        return $this->validEndDate;
    }

    /**
     * Set openTime
     *
     * @param \DateTime $openTime
     *
     * @return OperationHours
     */
    public function setOpenTime($openTime)
    {
        $this->openTime = $openTime;

        return $this;
    }

    /**
     * Get openTime
     *
     * @return \DateTime
     */
    public function getOpenTime()
    {
        return $this->openTime;
    }

    /**
     * Set closeTime
     *
     * @param \DateTime $closeTime
     *
     * @return OperationHours
     */
    public function setCloseTime($closeTime)
    {
        $this->closeTime = $closeTime;

        return $this;
    }

    /**
     * Get closeTime
     *
     * @return \DateTime
     */
    public function getCloseTime()
    {
        return $this->closeTime;
    }

    /**
     * Set dayOfWeek
     *
     * @param integer $dayOfWeek
     *
     * @return OperationHours
     */
    public function setDayOfWeek($dayOfWeek)
    {
        $this->dayOfWeek = $dayOfWeek;

        return $this;
    }

    /**
     * Get dayOfWeek
     *
     * @return integer
     */
    public function getDayOfWeek()
    {
        return $this->dayOfWeek;
    }

    /**
     * Add contactCard
     *
     * @param \AppBundle\Entity\ContactCard $contactCard
     *
     * @return OperationHours
     */
    public function addContactCard(\AppBundle\Entity\ContactCard $contactCard)
    {
        $this->contactCard[] = $contactCard;

        return $this;
    }

    /**
     * Remove contactCard
     *
     * @param \AppBundle\Entity\ContactCard $contactCard
     */
    public function removeContactCard(\AppBundle\Entity\ContactCard $contactCard)
    {
        $this->contactCard->removeElement($contactCard);
    }

    /**
     * Get contactCard
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContactCard()
    {
        return $this->contactCard;
    }
}
