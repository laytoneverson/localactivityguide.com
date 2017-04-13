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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->telephoneNumbers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->postalAddress = new \Doctrine\Common\Collections\ArrayCollection();
        $this->operationHours = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set cardLabel
     *
     * @param string $cardLabel
     *
     * @return ContactCard
     */
    public function setCardLabel($cardLabel)
    {
        $this->cardLabel = $cardLabel;

        return $this;
    }

    /**
     * Get cardLabel
     *
     * @return string
     */
    public function getCardLabel()
    {
        return $this->cardLabel;
    }

    /**
     * Set emailAddress
     *
     * @param string $emailAddress
     *
     * @return ContactCard
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    /**
     * Get emailAddress
     *
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return ContactCard
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
     * Set contactNotes
     *
     * @param string $contactNotes
     *
     * @return ContactCard
     */
    public function setContactNotes($contactNotes)
    {
        $this->contactNotes = $contactNotes;

        return $this;
    }

    /**
     * Get contactNotes
     *
     * @return string
     */
    public function getContactNotes()
    {
        return $this->contactNotes;
    }

    /**
     * Add telephoneNumber
     *
     * @param \AppBundle\Entity\TelephoneNumber $telephoneNumber
     *
     * @return ContactCard
     */
    public function addTelephoneNumber(\AppBundle\Entity\TelephoneNumber $telephoneNumber)
    {
        $this->telephoneNumbers[] = $telephoneNumber;

        return $this;
    }

    /**
     * Remove telephoneNumber
     *
     * @param \AppBundle\Entity\TelephoneNumber $telephoneNumber
     */
    public function removeTelephoneNumber(\AppBundle\Entity\TelephoneNumber $telephoneNumber)
    {
        $this->telephoneNumbers->removeElement($telephoneNumber);
    }

    /**
     * Get telephoneNumbers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTelephoneNumbers()
    {
        return $this->telephoneNumbers;
    }

    /**
     * Add postalAddress
     *
     * @param \AppBundle\Entity\PostalAddress $postalAddress
     *
     * @return ContactCard
     */
    public function addPostalAddress(\AppBundle\Entity\PostalAddress $postalAddress)
    {
        $this->postalAddress[] = $postalAddress;

        return $this;
    }

    /**
     * Remove postalAddress
     *
     * @param \AppBundle\Entity\PostalAddress $postalAddress
     */
    public function removePostalAddress(\AppBundle\Entity\PostalAddress $postalAddress)
    {
        $this->postalAddress->removeElement($postalAddress);
    }

    /**
     * Get postalAddress
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPostalAddress()
    {
        return $this->postalAddress;
    }

    /**
     * Add operationHour
     *
     * @param \AppBundle\Entity\OperationHours $operationHour
     *
     * @return ContactCard
     */
    public function addOperationHour(\AppBundle\Entity\OperationHours $operationHour)
    {
        $this->operationHours[] = $operationHour;

        return $this;
    }

    /**
     * Remove operationHour
     *
     * @param \AppBundle\Entity\OperationHours $operationHour
     */
    public function removeOperationHour(\AppBundle\Entity\OperationHours $operationHour)
    {
        $this->operationHours->removeElement($operationHour);
    }

    /**
     * Get operationHours
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOperationHours()
    {
        return $this->operationHours;
    }
}
