<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUsuarioControllerAPIRequest;
use App\Http\Requests\API\UpdateUsuarioControllerAPIRequest;
use App\Models\UsuarioController;
use App\Repositories\UsuarioControllerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class UsuarioControllerController
 * @package App\Http\Controllers\API
 */

class UsuarioControllerAPIController extends AppBaseController
{
    /** @var  UsuarioControllerRepository */
    private $usuarioControllerRepository;

    public function __construct(UsuarioControllerRepository $usuarioControllerRepo)
    {
        $this->usuarioControllerRepository = $usuarioControllerRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/usuarioControllers",
     *      summary="Get a listing of the UsuarioControllers.",
     *      tags={"UsuarioController"},
     *      description="Get all UsuarioControllers",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/UsuarioController")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $usuarioControllers = $this->usuarioControllerRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($usuarioControllers->toArray(), 'Usuario Controllers retrieved successfully');
    }

    /**
     * Store a newly created UsuarioController in storage.
     * POST /usuarioControllers
     *
     * @param CreateUsuarioControllerAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUsuarioControllerAPIRequest $request)
    {
        $input = $request->all();

        $usuarioController = $this->usuarioControllerRepository->create($input);

        return $this->sendResponse($usuarioController->toArray(), 'Usuario Controller saved successfully');
    }

    /**
     * Display the specified UsuarioController.
     * GET|HEAD /usuarioControllers/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UsuarioController $usuarioController */
        $usuarioController = $this->usuarioControllerRepository->find($id);

        if (empty($usuarioController)) {
            return $this->sendError('Usuario Controller not found');
        }

        return $this->sendResponse($usuarioController->toArray(), 'Usuario Controller retrieved successfully');
    }

    /**
     * Update the specified UsuarioController in storage.
     * PUT/PATCH /usuarioControllers/{id}
     *
     * @param int $id
     * @param UpdateUsuarioControllerAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUsuarioControllerAPIRequest $request)
    {
        $input = $request->all();

        /** @var UsuarioController $usuarioController */
        $usuarioController = $this->usuarioControllerRepository->find($id);

        if (empty($usuarioController)) {
            return $this->sendError('Usuario Controller not found');
        }

        $usuarioController = $this->usuarioControllerRepository->update($input, $id);

        return $this->sendResponse($usuarioController->toArray(), 'UsuarioController updated successfully');
    }

    /**
     * Remove the specified UsuarioController from storage.
     * DELETE /usuarioControllers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var UsuarioController $usuarioController */
        $usuarioController = $this->usuarioControllerRepository->find($id);

        if (empty($usuarioController)) {
            return $this->sendError('Usuario Controller not found');
        }

        $usuarioController->delete();

        return $this->sendSuccess('Usuario Controller deleted successfully');
    }
}
