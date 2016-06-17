<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Model\PostmanTrackingInterface;

/**
 * PostmanTracking
 *
 * @ORM\Table(name="postman_tracking")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PostmanTrackingRepository")
 */
class PostmanTracking implements PostmanTrackingInterface
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
     * @var float
     *
     * @ORM\Column(name="lat", type="float")
     */
    private $lat;

    /**
     * @var float
     *
     * @ORM\Column(name="lang", type="float")
     */
    private $lang;

    /**
     * @var int
     *
     * @ORM\Column(name="distance", type="integer")
     */
    private $distance;

    /**
     * @var int
     *
     * @ORM\Column(name="postman_id", type="integer")
     */
    private $postmanId;


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
     * Set lat
     *
     * @param float $lat
     *
     * @return PostmanTracking
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    
        return $this;
    }

    /**
     * Get lat
     *
     * @return float
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set lang
     *
     * @param float $lang
     *
     * @return PostmanTracking
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
    
        return $this;
    }

    /**
     * Get lang
     *
     * @return float
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Set distance
     *
     * @param integer $distance
     *
     * @return PostmanTracking
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;
    
        return $this;
    }

    /**
     * Get distance
     *
     * @return integer
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * Set postmanId
     *
     * @param integer $postmanId
     *
     * @return PostmanTracking
     */
    public function setPostmanId($postmanId)
    {
        $this->postmanId = $postmanId;
    
        return $this;
    }

    /**
     * Get postmanId
     *
     * @return integer
     */
    public function getPostmanId()
    {
        return $this->postmanId;
    }
}

