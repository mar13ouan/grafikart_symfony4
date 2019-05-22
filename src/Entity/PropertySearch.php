<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

class PropertySearch
{
    /**
     * max price
     *
     * @var int|null
     */
    private $maxPrice;

    /**
     * surface minimum
     *
     * @var int|null
     * @Assert\Range(min=10, max =400) 
     */
    private $minSurface;

    /**
     * 
     *
     * @var ArrayCollection
     */
    private $options;

    /**
     * @var Integer|null
     */
    private $distance;


    /**
     * @var Float|null
     */
    private $lat;

    /**
     * @var Float|null
     */
    private $lng;

    /**
     *
     *  @var String|null
     */
    private $address;


    public function __construct()
    {
        $this->options = new ArrayCollection();
    }

    /**
     * Get max price
     *
     * @return  int|null
     */
    public function getMaxPrice()
    {
        return $this->maxPrice;
    }

    /**
     * Set max price
     *
     * @param  int|null  $maxPrice  max price
     *
     * @return  self
     */
    public function setMaxPrice($maxPrice)
    {
        $this->maxPrice = $maxPrice;

        return $this;
    }

    /**
     * Get surface minimum
     * @return  int|null
     */
    public function getMinSurface()
    {
        return $this->minSurface;
    }

    /**
     * Set surface minimum
     * 
     * @param  int|null  $minSurface  surface minimum
     *
     * @return  self
     */
    public function setMinSurface($minSurface)
    {
        $this->minSurface = $minSurface;

        return $this;
    }

    /**
     * Get the value of options
     *
     * @return  ArrayCollection
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Set the value of options
     *
     * @param  ArrayCollection  $options
     *
     * @return  self
     */
    public function setOptions(ArrayCollection $options)
    {
        $this->options = $options;

        return $this;
    }



    /**
     * Get the value of distance
     *
     * @return  Integer|null
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * Set the value of distance
     *
     * @param  Integer|null  $distance
     *
     * @return  self
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;

        return $this;
    }

    /**
     * Get the value of lat
     *
     * @return  Float|null
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set the value of lat
     *
     * @param  Float|null  $lat
     *
     * @return  self
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Get the value of lng
     *
     * @return  Float|null
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * Set the value of lng
     *
     * @param  Float|null  $lng
     *
     * @return  self
     */
    public function setLng($lng)
    {
        $this->lng = $lng;

        return $this;
    }

    /**
     * Get the value of address
     *
     * @return  String|null
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @param  String|null  $address
     *
     * @return  self
     */ 
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }
}
