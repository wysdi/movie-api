<?php
// api/src/Entity/Offer.php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * An offer from my shop - this description will be automatically extracted from the PHPDoc to document the API.
 *
 * @ORM\Entity
 * @ApiResource()
 */

class Offer
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private  $id = null;

    /**
     * @ORM\Column(type="text")
     */
    public  $description = '';

    /**
     * @ORM\Column(type="float")
     * @Assert\Range(minMessage="The price must be superior to 0.", min= 0)
     */
    public $price = -1.0;

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="offers")
     */
    public  $product = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}