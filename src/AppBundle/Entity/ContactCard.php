<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class ContactCard
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $cardLabel;

    /**
     * @another\Anotation(some="thing", yes="notNo")
     * @ORM\Column(type="string", nullable=false)
     */
    private $emailAddress;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $contactNotes;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\TelephoneNumber", mappedBy="contactCard")
     */
    private $telephoneNumbers;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\PostalAddress", inversedBy="contactCard")
     * @ORM\JoinTable(
     *     name="PostalAddress2ContactCard",
     *     joinColumns={@ORM\JoinColumn(name="contact_card_id", referencedColumnName="id", nullable=false)},
     *     inverseJoinColumns={@ORM\JoinColumn(name="postal_address_id", referencedColumnName="id", nullable=false)}
     * )
     */
    private $postalAddress;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\OperationHours", inversedBy="contactCard")
     * @ORM\JoinTable(
     *     name="OperationHours2ContactCard",
     *     joinColumns={@ORM\JoinColumn(name="contact_card_id", referencedColumnName="id", nullable=false)},
     *     inverseJoinColumns={@ORM\JoinColumn(name="operation_hours_id", referencedColumnName="id", nullable=false)}
     * )
     */
    private $operationHours;
}
