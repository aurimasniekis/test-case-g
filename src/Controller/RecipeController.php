<?php

namespace App\Controller;

use App\Entity\Recipe;
use App\Repository\RecipeRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class RecipeController
 *
 * @package App\Controller
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 *
 * @Route("/api/recipes")
 */
class RecipeController extends BaseController
{
    /**
     * @var RecipeRepository
     */
    private $repository;

    public function __construct(RecipeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     *
     * @Route("/", methods={"GET"}, name="api_recipe_list")
     */
    public function list(Request $request): JsonResponse
    {
        $cuisine = $request->query->get('cuisine');
        $offset  = $request->query->get('from', 0);
        $limit   = $request->query->get('size', 20);

        if ($limit > 20) {
            $limit = 20;
        } elseif ($limit < 1) {
            $limit = 1;
        }

        if ($offset < 0) {
            $offset = 0;
        }

        $result = $this->repository->loadAll($cuisine, $offset, $limit);

        return $this->jsonDataView($result);
    }

    /**
     * @param int $id
     *
     * @return JsonResponse
     *
     * @Route("/{id}", methods={"GET"}, name="api_recipe_get", requirements={"id" : "\d+"})
     */
    public function show(int $id): JsonResponse
    {
        $recipe = $this->repository->find($id);

        if (null === $recipe) {
            return $this->error('Not Found', 404);
        }

        return $this->jsonDataView($recipe);
    }

    /**
     *
     * @return JsonResponse
     *
     * @Route("/", methods={"POST"}, name="api_recipe_create")
     */
    public function create(Request $request): JsonResponse
    {
        $recipe = $this->mapRequestToRecipe($request->request);

        $this->repository->save($recipe);

        return $this->jsonDataView($recipe);
    }

    /**
     * @param int $id
     *
     * @return JsonResponse
     *
     * @Route("/{id}", methods={"PUT"}, name="api_recipe_update", requirements={"id" : "\d+"})
     */
    public function update(int $id, Request $request): JsonResponse
    {
        $recipe = $this->repository->find($id);

        if (null === $recipe) {
            return $this->error('Not Found', 404);
        }

        $recipe = $this->mapRequestToRecipe($request->request);

        $this->repository->save($recipe);

        return $this->success();
    }

    /**
     * @param int $id
     *
     * @return JsonResponse
     *
     * @Route("/{id}", methods={"DELETE"}, name="api_recipe_delete", requirements={"id" : "\d+"})
     */
    public function delete(int $id): JsonResponse
    {
        $recipe = $this->repository->find($id);

        if (null === $recipe) {
            return $this->error('Not Found', 404);
        }

        $this->repository->delete($recipe);

        return $this->success();
    }

    protected function mapRequestToRecipe(ParameterBag $bag, Recipe $recipe = null): Recipe
    {
        if (null === $recipe) {
            $recipe = new Recipe();
        }

        if ($bag->has('id')) {
            $recipe->setId($bag->get('id'));
        }

        if ($bag->has('created_at')) {
            $recipe->setCreatedAt($bag->get('createdAt'));
        }

        if ($bag->has('updated_at')) {
            $recipe->setUpdatedAt($bag->get('updated_at'));
        }

        if ($bag->has('box_type')) {
            $recipe->setBoxType($bag->get('box_type'));
        }

        if ($bag->has('title')) {
            $recipe->setTitle($bag->get('title'));
        }

        if ($bag->has('slug')) {
            $recipe->setSlug($bag->get('slug'));
        }

        if ($bag->has('short_title')) {
            $recipe->setShortTitle($bag->get('short_title'));
        }

        if ($bag->has('marketing_description')) {
            $recipe->setMarketingDescription($bag->get('marketing_description'));
        }

        if ($bag->has('calories_kcal')) {
            $recipe->setCaloriesKcal($bag->get('calories_kcal'));
        }

        if ($bag->has('protein_grams')) {
            $recipe->setProteinGrams($bag->get('protein_grams'));
        }

        if ($bag->has('fat_grams')) {
            $recipe->setFatGrams($bag->get('fat_grams'));
        }

        if ($bag->has('carbs_grams')) {
            $recipe->setCarbsGrams($bag->get('carbs_grams'));
        }

        if ($bag->has('bulletpoint1')) {
            $recipe->setBulletpoint1($bag->get('bulletpoint1'));
        }

        if ($bag->has('bulletpoint2')) {
            $recipe->setBulletpoint2($bag->get('bulletpoint2'));
        }

        if ($bag->has('bulletpoint3')) {
            $recipe->setBulletpoint3($bag->get('bulletpoint3'));
        }

        if ($bag->has('recipe_diet_type_id')) {
            $recipe->setRecipeDietTypeId($bag->get('recipe_diet_type_id'));
        }

        if ($bag->has('season')) {
            $recipe->setSeason($bag->get('season'));
        }

        if ($bag->has('base')) {
            $recipe->setBase($bag->get('base'));
        }

        if ($bag->has('protein_source')) {
            $recipe->setProteinSource($bag->get('protein_source'));
        }

        if ($bag->has('preparation_time_minutes')) {
            $recipe->setPreparationTimeMinutes($bag->get('preparation_time_minutes'));
        }

        if ($bag->has('shelf_life_days')) {
            $recipe->setShelfLifeDays($bag->get('shelf_life_days'));
        }

        if ($bag->has('equipment_needed')) {
            $recipe->setEquipmentNeeded($bag->get('equipment_needed'));
        }

        if ($bag->has('origin_country')) {
            $recipe->setOriginCountry($bag->get('origin_country'));
        }

        if ($bag->has('recipe_cuisine')) {
            $recipe->setRecipeCuisine($bag->get('recipe_cuisine'));
        }

        if ($bag->has('in_your_box')) {
            $recipe->setInYourBox($bag->get('in_your_box'));
        }

        if ($bag->has('gousto_reference')) {
            $recipe->setGoustoReference($bag->get('gousto_reference'));
        }

        return $recipe;
    }
}