<?php

namespace Portfolio\LaureBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * Portfolio
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Portfolio
{
    use ORMBehaviors\Timestampable\Timestampable;
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
     * @ORM\Column(name="videoLinkHeader", type="string", length=255, nullable=true)
     */
    private $videoLinkHeader;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionDetail", type="string", length=255, nullable=true)
     */
    private $descriptionDetail;

    /**
     * @var string
     *
     * @ORM\Column(name="videoLink", type="string", length=255, nullable=true)
     */
    private $videoLink;

    /**
     * @var string
     *
     * @ORM\Column(name="siteLink", type="string", length=255, nullable=true)
     */
    private $siteLink;

    /**
    * @var string
    *
    * @ORM\Column(name="portfolioType", type="string", length=255 )
    */
    private $portfolioType;

    /**
     * @ORM\OneToMany(targetEntity="Portfolio\LaureBundle\Entity\Image", mappedBy="portfolio", cascade={"all"})
     */
    private $images;


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
     * Set videoLinkHeader
     *
     * @param string $videoLinkHeader
     * @return Portfolio
     */
    public function setVideoLinkHeader($videoLinkHeader)
    {
        $this->videoLinkHeader = $videoLinkHeader;

        return $this;
    }

    /**
     * Get videoLinkHeader
     *
     * @return string 
     */
    public function getVideoLinkHeader()
    {
        return $this->videoLinkHeader;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Portfolio
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Portfolio
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Portfolio
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
     * Set descriptionDetail
     *
     * @param string $descriptionDetail
     * @return Portfolio
     */
    public function setDescriptionDetail($descriptionDetail)
    {
        $this->descriptionDetail = $descriptionDetail;

        return $this;
    }

    /**
     * Get descriptionDetail
     *
     * @return string 
     */
    public function getDescriptionDetail()
    {
        return $this->descriptionDetail;
    }

    /**
     * Set videoLink
     *
     * @param string $videoLink
     * @return Portfolio
     */
    public function setVideoLink($videoLink)
    {
        $this->videoLink = $videoLink;

        return $this;
    }

    /**
     * Get videoLink
     *
     * @return string 
     */
    public function getVideoLink()
    {
        return $this->videoLink;
    }

    /**
     * Set siteLink
     *
     * @param string $siteLink
     * @return Portfolio
     */
    public function setSiteLink($siteLink)
    {
        $this->siteLink = $siteLink;

        return $this;
    }

    /**
     * Get siteLink
     *
     * @return string 
     */
    public function getSiteLink()
    {
        return $this->siteLink;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add images
     *
     * @param \Portfolio\LaureBundle\Entity\Image $images
     * @return Portfolio
     */
    public function addImage(\Portfolio\LaureBundle\Entity\Image $images)
    {
        $this->images[] = $images;

        return $this;
    }

    /**
     * Remove images
     *
     * @param \Portfolio\LaureBundle\Entity\Image $images
     */
    public function removeImage(\Portfolio\LaureBundle\Entity\Image $images)
    {
        $this->images->removeElement($images);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @return string
     */
    public function getPortfolioType()
    {
        return $this->portfolioType;
    }

    /**
     * @param string $portfolioType
     */
    public function setPortfolioType($portfolioType)
    {
        $this->portfolioType = $portfolioType;
    }
}
