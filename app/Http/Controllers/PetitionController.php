<?php

namespace App\Http\Controllers;

use App\Http\Resources\PetitionCollection;
use App\Http\Resources\PetitionResource;
use App\Models\Petition;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(new PetitionCollection(Petition::all()), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return PetitionResource
     */
    public function store(Request $request): PetitionResource
    {
        $petition = Petition::create($request->only([
            'title', 'description', 'category', 'author', 'signees'
        ]));

        return new PetitionResource($petition);
    }

    /**
     * Display the specified resource.
     *
     * @param Petition $petition
     * @return PetitionResource
     */
    public function show(Petition $petition): PetitionResource
    {
        return new PetitionResource($petition);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Petition $petition
     * @return PetitionResource
     */
    public function update(Request $request, Petition $petition): PetitionResource
    {
        $petition->update($request->only([
            'title', 'description', 'category', 'author', 'signees'
        ]));

        return new PetitionResource($petition);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Petition $petition
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Petition $petition): JsonResponse
    {
        $petition->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
