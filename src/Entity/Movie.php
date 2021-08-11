<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MovieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=MovieRepository::class)
 */
class Movie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $genre;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $studio;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $score;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $profit;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $rotten;


    /**
     * @ORM\Column(type="string", length=10)
     */
    private $year;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $gross;

    // Notice the "cascade" option below, this is mandatory if you want Doctrine to automatically persist the related entity
    /**
     * @var Actor[]|ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Actor", mappedBy="movie", cascade={"persist"})
     */
    public $actors;

    public function __construct()
    {
        $this->actors = new ArrayCollection(); // Initialize $offers as a Doctrine collection
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getStudio(): ?string
    {
        return $this->studio;
    }

    public function setStudio(string $studio): self
    {
        $this->studio = $studio;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(?int $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getProfit(): ?int
    {
        return $this->profit;
    }

    public function setProfit(?int $profit): self
    {
        $this->profit = $profit;

        return $this;
    }

    public function getRotten(): ?int
    {
        return $this->rotten;
    }

    public function setRotten(?int $rotten): self
    {
        $this->rotten = $rotten;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year): void
    {
        $this->year = $year;
    }

    /**
     * @return mixed
     */
    public function getGross()
    {
        return $this->gross;
    }

    /**
     * @param mixed $gross
     */
    public function setGross($gross): void
    {
        $this->gross = $gross;
    }

    // Adding both an adder and a remover as well as updating the reverse relation is mandatory
    // if you want Doctrine to automatically update and persist (thanks to the "cascade" option) the related entity
    public function addOffer(Actor $actor): void
    {
        $actor->movie = $this;
        $this->actors->add($actor);
    }

    public function removeOffer(Actor $actor): void
    {
        $actor->movie = null;
        $this->actors->removeElement($actor);
    }
}
