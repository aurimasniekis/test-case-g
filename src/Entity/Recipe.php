<?php

namespace App\Entity;

use DateTime;
use JsonSerializable;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Recipe
 *
 * @package App\Entity
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 *
 * @ORM\Table(name="recipes")
 * @ORM\Entity(repositoryClass="App\Repository\RecipeRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Recipe implements JsonSerializable
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;


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


    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $boxType;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $shortTitle;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $marketingDescription;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $caloriesKcal;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $proteinGrams;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $fatGrams;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $carbsGrams;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $bulletpoint1;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $bulletpoint2;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $bulletpoint3;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $recipeDietTypeId;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $season;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $base;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $proteinSource;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $preparationTimeMinutes;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $shelfLifeDays;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $equipmentNeeded;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $originCountry;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $recipeCuisine;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $inYourBox;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $goustoReference;


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
     * @param int $id
     *
     * @return Recipe
     */
    public function setId($id): Recipe
    {
        $this->id = $id;

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
     * @return string
     */
    public function getBoxType(): ?string
    {
        return $this->boxType;
    }

    /**
     * @param string $boxType
     *
     * @return Recipe
     */
    public function setBoxType(string $boxType): Recipe
    {
        $this->boxType = $boxType;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return Recipe
     */
    public function setTitle(string $title): Recipe
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     *
     * @return Recipe
     */
    public function setSlug(string $slug): Recipe
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return string
     */
    public function getShortTitle(): ?string
    {
        return $this->shortTitle;
    }

    /**
     * @param string $shortTitle
     *
     * @return Recipe
     */
    public function setShortTitle(string $shortTitle): Recipe
    {
        $this->shortTitle = $shortTitle;

        return $this;
    }

    /**
     * @return string
     */
    public function getMarketingDescription(): ?string
    {
        return $this->marketingDescription;
    }

    /**
     * @param string $marketingDescription
     *
     * @return Recipe
     */
    public function setMarketingDescription(string $marketingDescription): Recipe
    {
        $this->marketingDescription = $marketingDescription;

        return $this;
    }

    /**
     * @return int
     */
    public function getCaloriesKcal(): ?int
    {
        return $this->caloriesKcal;
    }

    /**
     * @param int $caloriesKcal
     *
     * @return Recipe
     */
    public function setCaloriesKcal(int $caloriesKcal): Recipe
    {
        $this->caloriesKcal = $caloriesKcal;

        return $this;
    }

    /**
     * @return int
     */
    public function getProteinGrams(): ?int
    {
        return $this->proteinGrams;
    }

    /**
     * @param int $proteinGrams
     *
     * @return Recipe
     */
    public function setProteinGrams(int $proteinGrams): Recipe
    {
        $this->proteinGrams = $proteinGrams;

        return $this;
    }

    /**
     * @return int
     */
    public function getFatGrams(): ?int
    {
        return $this->fatGrams;
    }

    /**
     * @param int $fatGrams
     *
     * @return Recipe
     */
    public function setFatGrams(int $fatGrams): Recipe
    {
        $this->fatGrams = $fatGrams;

        return $this;
    }

    /**
     * @return int
     */
    public function getCarbsGrams(): ?int
    {
        return $this->carbsGrams;
    }

    /**
     * @param int $carbsGrams
     *
     * @return Recipe
     */
    public function setCarbsGrams(int $carbsGrams): Recipe
    {
        $this->carbsGrams = $carbsGrams;

        return $this;
    }

    /**
     * @return string
     */
    public function getBulletpoint1(): ?string
    {
        return $this->bulletpoint1;
    }

    /**
     * @param string $bulletpoint1
     *
     * @return Recipe
     */
    public function setBulletpoint1(string $bulletpoint1): Recipe
    {
        $this->bulletpoint1 = $bulletpoint1;

        return $this;
    }

    /**
     * @return string
     */
    public function getBulletpoint2(): ?string
    {
        return $this->bulletpoint2;
    }

    /**
     * @param string $bulletpoint2
     *
     * @return Recipe
     */
    public function setBulletpoint2(string $bulletpoint2): Recipe
    {
        $this->bulletpoint2 = $bulletpoint2;

        return $this;
    }

    /**
     * @return string
     */
    public function getBulletpoint3(): ?string
    {
        return $this->bulletpoint3;
    }

    /**
     * @param string $bulletpoint3
     *
     * @return Recipe
     */
    public function setBulletpoint3(string $bulletpoint3): Recipe
    {
        $this->bulletpoint3 = $bulletpoint3;

        return $this;
    }

    /**
     * @return int
     */
    public function getRecipeDietTypeId(): ?int
    {
        return $this->recipeDietTypeId;
    }

    /**
     * @param int $recipeDietTypeId
     *
     * @return Recipe
     */
    public function setRecipeDietTypeId($recipeDietTypeId): Recipe
    {
        $this->recipeDietTypeId = $recipeDietTypeId;

        return $this;
    }

    /**
     * @return string
     */
    public function getSeason(): ?string
    {
        return $this->season;
    }

    /**
     * @param string $season
     *
     * @return Recipe
     */
    public function setSeason(string $season): Recipe
    {
        $this->season = $season;

        return $this;
    }

    /**
     * @return string
     */
    public function getBase(): ?string
    {
        return $this->base;
    }

    /**
     * @param string $base
     *
     * @return Recipe
     */
    public function setBase(string $base): Recipe
    {
        $this->base = $base;

        return $this;
    }

    /**
     * @return string
     */
    public function getProteinSource(): ?string
    {
        return $this->proteinSource;
    }

    /**
     * @param string $proteinSource
     *
     * @return Recipe
     */
    public function setProteinSource(string $proteinSource): Recipe
    {
        $this->proteinSource = $proteinSource;

        return $this;
    }

    /**
     * @return int
     */
    public function getPreparationTimeMinutes(): ?int
    {
        return $this->preparationTimeMinutes;
    }

    /**
     * @param int $preparationTimeMinutes
     *
     * @return Recipe
     */
    public function setPreparationTimeMinutes(int $preparationTimeMinutes): Recipe
    {
        $this->preparationTimeMinutes = $preparationTimeMinutes;

        return $this;
    }

    /**
     * @return int
     */
    public function getShelfLifeDays(): ?int
    {
        return $this->shelfLifeDays;
    }

    /**
     * @param int $shelfLifeDays
     *
     * @return Recipe
     */
    public function setShelfLifeDays(int $shelfLifeDays): Recipe
    {
        $this->shelfLifeDays = $shelfLifeDays;

        return $this;
    }

    /**
     * @return string
     */
    public function getEquipmentNeeded(): ?string
    {
        return $this->equipmentNeeded;
    }

    /**
     * @param string $equipmentNeeded
     *
     * @return Recipe
     */
    public function setEquipmentNeeded(string $equipmentNeeded): Recipe
    {
        $this->equipmentNeeded = $equipmentNeeded;

        return $this;
    }

    /**
     * @return string
     */
    public function getOriginCountry(): ?string
    {
        return $this->originCountry;
    }

    /**
     * @param string $originCountry
     *
     * @return Recipe
     */
    public function setOriginCountry(string $originCountry): Recipe
    {
        $this->originCountry = $originCountry;

        return $this;
    }

    /**
     * @return string
     */
    public function getRecipeCuisine(): ?string
    {
        return $this->recipeCuisine;
    }

    /**
     * @param string $recipeCuisine
     *
     * @return Recipe
     */
    public function setRecipeCuisine(string $recipeCuisine): Recipe
    {
        $this->recipeCuisine = $recipeCuisine;

        return $this;
    }

    /**
     * @return string
     */
    public function getInYourBox(): ?string
    {
        return $this->inYourBox;
    }

    /**
     * @param string $inYourBox
     *
     * @return Recipe
     */
    public function setInYourBox(string $inYourBox): Recipe
    {
        $this->inYourBox = $inYourBox;

        return $this;
    }

    /**
     * @return int
     */
    public function getGoustoReference(): ?int
    {
        return $this->goustoReference;
    }

    /**
     * @param int $goustoReference
     *
     * @return Recipe
     */
    public function setGoustoReference(int $goustoReference): Recipe
    {
        $this->goustoReference = $goustoReference;

        return $this;
    }
    /**
     * @param DateTime|string $createdAt
     *
     * @return Recipe
     */
    public function setCreatedAt($createdAt): Recipe
    {
        if (\is_string($createdAt)) {
            $createdAt = DateTime::createFromFormat('d/m/Y H:i:s', $createdAt);
        }

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
     * @param DateTime|string $updatedAt
     *
     * @return Recipe
     */
    public function setUpdatedAt($updatedAt): Recipe
    {
        if (\is_string($updatedAt)) {
            $updatedAt = DateTime::createFromFormat('d/m/Y H:i:s', $updatedAt);
        }

        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'created_at' => $this->getCreatedAt(),
            'updated_at' => $this->getUpdatedAt(),
            'box_type' => $this->getBoxType(),
            'title' => $this->getTitle(),
            'slug' => $this->getSlug(),
            'short_title' => $this->getShortTitle(),
            'marketing_description' => $this->getMarketingDescription(),
            'calories_kcal' => $this->getCaloriesKcal(),
            'protein_grams' => $this->getProteinGrams(),
            'fat_grams' => $this->getFatGrams(),
            'carbs_grams' => $this->getCarbsGrams(),
            'bulletpoint1' => $this->getBulletpoint1(),
            'bulletpoint2' => $this->getBulletpoint2(),
            'bulletpoint3' => $this->getBulletpoint3(),
            'recipe_diet_type_id' => $this->getRecipeDietTypeId(),
            'season' => $this->getSeason(),
            'base' => $this->getBase(),
            'protein_source' => $this->getProteinSource(),
            'preparation_time_minutes' => $this->getPreparationTimeMinutes(),
            'shelf_life_days' => $this->getShelfLifeDays(),
            'equipment_needed' => $this->getEquipmentNeeded(),
            'origin_country' => $this->getOriginCountry(),
            'recipe_cuisine' => $this->getRecipeCuisine(),
            'in_your_box' => $this->getInYourBox(),
            'gousto_reference' => $this->getGoustoReference(),
        ];
    }
}