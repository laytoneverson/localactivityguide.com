<?php
namespace AppBundle\Entity;
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
     * @ORM\Column(type="integer", nullable=false, options={"default":"Mon =1 , Sun = 7"})
     */
    private $dayOfWeek;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\ContactCard", mappedBy="operationHours")
     */
    private $contactCard;
}