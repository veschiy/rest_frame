<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorCollection;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(new AuthorCollection(Author::all()), Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param Author $author
     * @return AuthorResource
     */
    public function show(Author $author): AuthorResource
    {
        return new AuthorResource($author);
    }
}
