<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * @OA\Get(
     *     path="/article",
     *     operationId="articleAll",
     *     tags={"Pages"},
     *     summary="Отображение всех статей",
     *     security={
     *       {"api_key": {}},
     *     },
     *     @OA\Response(
     *         response="200",
     *         description="Request completed successfully"
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Article not found"
     *     ),
     * )
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() : JsonResponse
    {
        $model = Article::query()->get();
        return response()->json($model);
    }

    /**
     * @OA\Post(
     *     path="/article",
     *     operationId="articleCreate",
     *     tags={"Pages"},
     *     summary="Create yet another article record",
     *     security={
     *       {"api_key": {}},
     *     },
     *     @OA\Response(
     *         response="200",
     *         description="Request completed successfully"
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ArticleStoreRequest")
     *     ),
     * )
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\ArticleRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ArticleRequest $request)
    {
        $model = new Article();
        $model->fill($request->all());
        $model->save();

        return response('Article successfully inserted', 201);
    }

    /**
     * @OA\Get(
     *     path="/article/{id}",
     *     operationId="articleGet",
     *     tags={"Pages"},
     *     summary="Get article by ID",
     *     security={
     *       {"api_key": {}},
     *     },
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="The ID of article",
     *         required=true,
     *         example="1",
     *         @OA\Schema(
     *             type="integer",
     *         ),
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Request completed successfully",
     *         @OA\JsonContent(ref="#/components/schemas/ArticleShowRequest")
     *     ),
     * )
     *
     * Display a listing of the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id) : JsonResponse
    {
        $model = Article::query()->findOrFail($id);
        return response()->json($model);
    }

    /**
     * @OA\Put(
     *     path="/article/{id}",
     *     operationId="articleUpdate",
     *     tags={"Pages"},
     *     summary="Update article by ID",
     *     security={
     *       {"api_key": {}},
     *     },
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="The ID of article",
     *         required=true,
     *         example="1",
     *         @OA\Schema(
     *             type="integer",
     *         ),
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Request completed successfully",
     *         @OA\JsonContent(ref="#/components/schemas/ArticleShowRequest")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ArticleStoreRequest")
     *     ),
     * )
     *
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request     $request
     * @param  int                          $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $params = $request->all();
        $model  = Article::query()->findOrFail($id);
        $model->fill($params);
        $model->save();

        return response()->json($model);
    }

    /**
     * @OA\Delete(
     *     path="/article/{id}",
     *     operationId="articleDelete",
     *     tags={"Pages"},
     *     summary="Delete article by ID",
     *     security={
     *       {"api_key": {}},
     *     },
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="The ID of article",
     *         required=true,
     *         example="1",
     *         @OA\Schema(
     *             type="integer",
     *         ),
     *     ),
     *     @OA\Response(
     *         response="202",
     *         description="Deleted",
     *     ),
     * )
     *
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id): Response
    {
        $model = Article::query()->findOrFail($id);
        $model->delete();

        return response(null, \HttpResponse::HTTP_ACCEPTED);
    }
}
