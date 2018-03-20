<?php

namespace App\Entity;

use DateTime;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class RecipeRating
 *
 * @package App\Entity
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 *
 * @ORM\Table(name="recipeRating")
 * @ORM\Entity(repositoryClass="App\Repository\RecipeRatingRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class RecipeRating
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
     * @var Recipe
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Recipe", inversedBy="ratings")
     */
    private $recipe;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $rating;

    /**
     * @var DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @var DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    public function __construct()
    {
    }

    /**
     * @ORM\PrePersist
     */
    public function generateCreatedAt(): void
    {
        $this->createdAt = new DateTime();
    }

    /**
     * @ORM\PreUpdate
     */
    public function generateUpdatedAt(): void
    {
        $this->updatedAt = new DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Recipe
     */
    public function getRecipe(): ?Recipe
    {
        return $this->recipe;
    }

    /**
     * @param Recipe $recipe
     *
     * @return RecipeRating
     */
    public function setRecipe(Recipe $recipe): RecipeRating
    {
        $this->recipe = $recipe;

        return $this;
    }

    /**
     * @return int
     */
    public function getRating(): ?int
    {
        return $this->rating;
    }

    /**
     * @param int $rating
     *
     * @return RecipeRating
     */
    public function setRating(int $rating): RecipeRating
    {
        $this->rating = $rating;

        return $this;
    }


    /**
     * @return DateTime
     */
    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime $createdAt
     *
     * @return RecipeRating
     */
    public function setCreatedAt(DateTime $createdAt): RecipeRating
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTime $updatedAt
     *
     * @return RecipeRating
     */
    public function setUpdatedAt(DateTime $updatedAt): RecipeRating
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}