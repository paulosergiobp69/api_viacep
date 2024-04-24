<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateContatoControllerAPIRequest;
use App\Http\Requests\API\UpdateContatoControllerAPIRequest;
use App\Models\ContatoController;
use App\Repositories\ContatoControllerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ContatoControllerController
 * @package App\Http\Controllers\API
 */

class ContatoControllerAPIController extends AppBaseController
{
    /** @var  ContatoControllerRepository */
    private $contatoControllerRepository;

    public function __construct(ContatoControllerRepository $contatoControllerRepo)
    {
        $this->contatoControllerRepository = $contatoControllerRepo;
    }

    /**
     * Display a listing of the ContatoController.
     * GET|HEAD /contatoControllers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $contatoControllers = $this->contatoControllerRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($contatoControllers->toArray(), 'Contato Controllers retrieved successfully');
    }

    /**
     * Store a newly created ContatoController in storage.
     * POST /contatoControllers
     *
     * @param CreateContatoControllerAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateContatoControllerAPIRequest $request)
    {
        $input = $request->all();

        $contatoController = $this->contatoControllerRepository->create($input);

        return $this->sendResponse($contatoController->toArray(), 'Contato Controller saved successfully');
    }

    /**
     * Display the specified ContatoController.
     * GET|HEAD /contatoControllers/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ContatoController $contatoController */
        $contatoController = $this->contatoControllerRepository->find($id);

        if (empty($contatoController)) {
            return $this->sendError('Contato Controller not found');
        }

        return $this->sendResponse($contatoController->toArray(), 'Contato Controller retrieved successfully');
    }

    /**
     * Update the specified ContatoController in storage.
     * PUT/PATCH /contatoControllers/{id}
     *
     * @param int $id
     * @param UpdateContatoControllerAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContatoControllerAPIRequest $request)
    {
        $input = $request->all();

        /** @var ContatoController $contatoController */
        $contatoController = $this->contatoControllerRepository->find($id);

        if (empty($contatoController)) {
            return $this->sendError('Contato Controller not found');
        }

        $contatoController = $this->contatoControllerRepository->update($input, $id);

        return $this->sendResponse($contatoController->toArray(), 'ContatoController updated successfully');
    }

    /**
     * Remove the specified ContatoController from storage.
     * DELETE /contatoControllers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ContatoController $contatoController */
        $contatoController = $this->contatoControllerRepository->find($id);

        if (empty($contatoController)) {
            return $this->sendError('Contato Controller not found');
        }

        $contatoController->delete();

        return $this->sendSuccess('Contato Controller deleted successfully');
    }
}
