<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class MainController
 *
 * @package App\Controller
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class MainController extends BaseController
{
    /**
     * @return Response
     * @throws \InvalidArgumentException
     *
     * @Route("/", name="api_docs")
     */
    public function apiDoc(): Response
    {
        $apiDocIndex = __DIR__ . '/../../public/api_doc.html';

        if (file_exists($apiDocIndex) && is_readable($apiDocIndex)) {
            return new Response(
                file_get_contents($apiDocIndex)
            );
        }

        return $this->error('Not Found', 404);
    }
}