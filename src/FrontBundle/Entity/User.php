<?php
namespace FrontBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="FrontBundle\Entity\Hospital", mappedBy="user")
     */
    protected $hospital;

    /**
     * @ORM\OneToOne(targetEntity="FrontBundle\Entity\Patient", mappedBy="user")
     */
    protected $patient;

    /**
     * @ORM\OneToOne(targetEntity="FrontBundle\Entity\Doctor", mappedBy="user")
     */
    protected $doctor;

    /**
     * @var \DateTime
     * @ORM\Column(name="registerDate", type="datetime", nullable=true)
     */
    private $registerDate;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Set hospital
     *
     * @param \FrontBundle\Entity\Hospital $hospital
     *
     * @return User
     */
    public function setHospital(\FrontBundle\Entity\Hospital $hospital = null)
    {
        $this->hospital = $hospital;

        return $this;
    }

    /**
     * Get hospital
     *
     * @return \FrontBundle\Entity\Hospital
     */
    public function getHospital()
    {
        return $this->hospital;
    }

    /**
     * Set patient
     *
     * @param \FrontBundle\Entity\Patient $patient
     *
     * @return User
     */
    public function setPatient(\FrontBundle\Entity\Patient $patient = null)
    {
        $this->patient = $patient;

        return $this;
    }

    /**
     * Get patient
     *
     * @return \FrontBundle\Entity\Patient
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * Set doctor
     *
     * @param \FrontBundle\Entity\Doctor $doctor
     *
     * @return User
     */
    public function setDoctor(\FrontBundle\Entity\Doctor $doctor = null)
    {
        $this->doctor = $doctor;

        return $this;
    }

    /**
     * Get doctor
     *
     * @return \FrontBundle\Entity\Doctor
     */
    public function getDoctor()
    {
        return $this->doctor;
    }

    /**
     * Set registerDate
     *
     * @param \DateTime $registerDate
     *
     * @return User
     */
    public function setRegisterDate($registerDate)
    {
        $this->registerDate = $registerDate;

        return $this;
    }

    /**
     * Get registerDate
     *
     * @return \DateTime
     */
    public function getRegisterDate()
    {
        return $this->registerDate;
    }
}
