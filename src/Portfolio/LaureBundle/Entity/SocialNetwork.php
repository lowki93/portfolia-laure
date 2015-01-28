<?php

namespace Portfolio\LaureBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SocialNetwork
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class SocialNetwork
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="socialNetwork", type="string", length=255)
     */
    private $socialNetwork;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;


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
     * Set socialNetwork
     *
     * @param string $socialNetwork
     * @return SocialNetwork
     */
    public function setSocialNetwork($socialNetwork)
    {
        $this->socialNetwork = $socialNetwork;

        return $this;
    }

    /**
     * Get socialNetwork
     *
     * @return string 
     */
    public function getSocialNetwork()
    {
        return $this->socialNetwork;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return SocialNetwork
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }
}
