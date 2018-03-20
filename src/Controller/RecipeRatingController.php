<?php

namespace App\Controller;

use App\Entity\RecipeRating;
use App\Repository\RecipeRatingRepository;
use App\Repository\RecipeRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class RecipeRatingController
 *
 * @package App\Controller
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class RecipeRatingController extends BaseController
{
    /**
     * @var RecipeRepository
     */
    private $recipeRepository;

    /**
     * @var RecipeRatingRepository
     */
    private $ratingRepository;

    public function __construct(RecipeRepository $recipeRepository, RecipeRatingRepository $ratingRepository)
    {
        $this->recipeRepository = $recipeRepository;
        $this->ratingRepository = $ratingRepository;
    }

    /**
     * @param int $recipeId
     * @param int $rating
     *
     * @return JsonResponse
     *
     * @Route("/api/recipes/{recipeId}/{rating}", name="api_recipe_rating", requirements={"id": "[1-5]"})
     */
    public function rate(int $recipeId, int $rating): JsonResponse
    {
        $recipe = $this->recipeRepository->find($recipeId);

        if (null === $recipe) {
            return $this->error('Not Found', 404);
        }

        $recipeRating = new RecipeRating();

        $recipeRating->setRecipe($recipe)
            ->setRating($rating);

        $this->ratingRepository->save($recipeRating);

        return $this->success();
    }
}