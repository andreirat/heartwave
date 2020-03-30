<?php

namespace FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PatientMeasurements
 *
 * @ORM\Table(name="patient_measurements")
 * @ORM\Entity(repositoryClass="FrontBundle\Repository\PatientMeasurementsRepository")
 */
class PatientMeasurements
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
     * @ORM\Column(name="pacientid", type="integer")
     */
    private $pacientid;

    /**
     * @var string
     *
     * @ORM\Column(name="heart_chest_pain", type="string", length=255)
     */
    private $heartChestPain;

    /**
     * @var float
     *
     * @ORM\Column(name="heart_rest_bpress", type="float")
     */
    private $heartRestBpress;

    /**
     * @var float
     *
     * @ORM\Column(name="blood_sugar_value", type="float")
     */
    private $bloodSugarValue;

    /**
     * @var bool
     *
     * @ORM\Column(name="blood_sugar", type="boolean")
     */
    private $bloodSugar;

    /**
     * @var string
     *
     * @ORM\Column(name="heart_rest_electro", type="string", length=255)
     */
    private $heartRestElectro;

    /**
     * @var int
     *
     * @ORM\Column(name="heart_max_heart_rate", type="integer")
     */
    private $heartMaxHeartRate;

    /**
     * @var bool
     *
     * @ORM\Column(name="heart_disease", type="boolean")
     */
    private $heartDisease;

    /**
     * @var int
     *
     * @ORM\Column(name="pulse_frequency", type="integer")
     */
    private $pulseFrequency;

    /**
     * @var string
     *
     * @ORM\Column(name="pulse_type", type="string", length=255)
     */
    private $pulseType;

    /**
     * @var float
     *
     * @ORM\Column(name="body_temp", type="float")
     */
    private $bodyTemp;

    /**
     * @var int
     *
     * @ORM\Column(name="big_t", type="integer")
     */
    private $bigT;

    /**
     * @var int
     *
     * @ORM\Column(name="small_t", type="integer")
     */
    private $smallT;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="measurement_timestamp", type="datetime")
     */
    private $measurementTimestamp;


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
     * Set pacientid
     *
     * @param integer $pacientid
     *
     * @return PatientMeasurements
     */
    public function setPacientid($pacientid)
    {
        $this->pacientid = $pacientid;

        return $this;
    }

    /**
     * Get pacientid
     *
     * @return int
     */
    public function getPacientid()
    {
        return $this->pacientid;
    }

    /**
     * Set heartChestPain
     *
     * @param string $heartChestPain
     *
     * @return PatientMeasurements
     */
    public function setHeartChestPain($heartChestPain)
    {
        $this->heartChestPain = $heartChestPain;

        return $this;
    }

    /**
     * Get heartChestPain
     *
     * @return string
     */
    public function getHeartChestPain()
    {
        return $this->heartChestPain;
    }

    /**
     * Set heartRestBpress
     *
     * @param float $heartRestBpress
     *
     * @return PatientMeasurements
     */
    public function setHeartRestBpress($heartRestBpress)
    {
        $this->heartRestBpress = $heartRestBpress;

        return $this;
    }

    /**
     * Get heartRestBpress
     *
     * @return float
     */
    public function getHeartRestBpress()
    {
        return $this->heartRestBpress;
    }

    /**
     * Set bloodSugarValue
     *
     * @param float $bloodSugarValue
     *
     * @return PatientMeasurements
     */
    public function setBloodSugarValue($bloodSugarValue)
    {
        $this->bloodSugarValue = $bloodSugarValue;

        return $this;
    }

    /**
     * Get bloodSugarValue
     *
     * @return float
     */
    public function getBloodSugarValue()
    {
        return $this->bloodSugarValue;
    }

    /**
     * Set bloodSugar
     *
     * @param boolean $bloodSugar
     *
     * @return PatientMeasurements
     */
    public function setBloodSugar($bloodSugar)
    {
        $this->bloodSugar = $bloodSugar;

        return $this;
    }

    /**
     * Get bloodSugar
     *
     * @return bool
     */
    public function getBloodSugar()
    {
        return $this->bloodSugar;
    }

    /**
     * Set heartRestElectro
     *
     * @param string $heartRestElectro
     *
     * @return PatientMeasurements
     */
    public function setHeartRestElectro($heartRestElectro)
    {
        $this->heartRestElectro = $heartRestElectro;

        return $this;
    }

    /**
     * Get heartRestElectro
     *
     * @return string
     */
    public function getHeartRestElectro()
    {
        return $this->heartRestElectro;
    }

    /**
     * Set heartMaxHeartRate
     *
     * @param integer $heartMaxHeartRate
     *
     * @return PatientMeasurements
     */
    public function setHeartMaxHeartRate($heartMaxHeartRate)
    {
        $this->heartMaxHeartRate = $heartMaxHeartRate;

        return $this;
    }

    /**
     * Get heartMaxHeartRate
     *
     * @return int
     */
    public function getHeartMaxHeartRate()
    {
        return $this->heartMaxHeartRate;
    }

    /**
     * Set heartDisease
     *
     * @param boolean $heartDisease
     *
     * @return PatientMeasurements
     */
    public function setHeartDisease($heartDisease)
    {
        $this->heartDisease = $heartDisease;

        return $this;
    }

    /**
     * Get heartDisease
     *
     * @return bool
     */
    public function getHeartDisease()
    {
        return $this->heartDisease;
    }

    /**
     * Set pulseFrequency
     *
     * @param integer $pulseFrequency
     *
     * @return PatientMeasurements
     */
    public function setPulseFrequency($pulseFrequency)
    {
        $this->pulseFrequency = $pulseFrequency;

        return $this;
    }

    /**
     * Get pulseFrequency
     *
     * @return int
     */
    public function getPulseFrequency()
    {
        return $this->pulseFrequency;
    }

    /**
     * Set pulseType
     *
     * @param string $pulseType
     *
     * @return PatientMeasurements
     */
    public function setPulseType($pulseType)
    {
        $this->pulseType = $pulseType;

        return $this;
    }

    /**
     * Get pulseType
     *
     * @return string
     */
    public function getPulseType()
    {
        return $this->pulseType;
    }

    /**
     * Set bodyTemp
     *
     * @param float $bodyTemp
     *
     * @return PatientMeasurements
     */
    public function setBodyTemp($bodyTemp)
    {
        $this->bodyTemp = $bodyTemp;

        return $this;
    }

    /**
     * Get bodyTemp
     *
     * @return float
     */
    public function getBodyTemp()
    {
        return $this->bodyTemp;
    }

    /**
     * Set bigT
     *
     * @param integer $bigT
     *
     * @return PatientMeasurements
     */
    public function setBigT($bigT)
    {
        $this->bigT = $bigT;

        return $this;
    }

    /**
     * Get bigT
     *
     * @return int
     */
    public function getBigT()
    {
        return $this->bigT;
    }

    /**
     * Set smallT
     *
     * @param integer $smallT
     *
     * @return PatientMeasurements
     */
    public function setSmallT($smallT)
    {
        $this->smallT = $smallT;

        return $this;
    }

    /**
     * Get smallT
     *
     * @return int
     */
    public function getSmallT()
    {
        return $this->smallT;
    }

    /**
     * Set measurementTimestamp
     *
     * @param \DateTime $measurementTimestamp
     *
     * @return PatientMeasurements
     */
    public function setMeasurementTimestamp($measurementTimestamp)
    {
        $this->measurementTimestamp = $measurementTimestamp;

        return $this;
    }

    /**
     * Get measurementTimestamp
     *
     * @return \DateTime
     */
    public function getMeasurementTimestamp()
    {
        return $this->measurementTimestamp;
    }
}

