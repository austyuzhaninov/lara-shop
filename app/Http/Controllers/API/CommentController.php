<?php

namespace App\Http\Controllers\API;

use App\Models\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class CommentController extends Controller
{
    /**
     * @OA\Get(
     *     path="/comment",
     *     operationId="commentAll",
     *     tags={"Comment"},
     *     summary="Display all comments",
     *     security={
     *       {"api_key": {}},
     *     },
     *     @OA\Response(
     *         response="200",
     *         description="Request completed successfully"
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Comment not found"
     *     ),
     * )
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() : JsonResponse
    {
        $model = Comment::query()->get();
        return response()->json($model);
    }

    /**
     * @OA\Post(
     *     path="/comment",
     *     operationId="commentCreate",
     *     tags={"Comment"},
     *     summary="Create yet another comment record",
     *     security={
     *       {"api_key": {}},
     *     },
     *     @OA\Response(
     *         response="200",
     *         description="Request completed successfully"
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CommentStoreRequest")
     *     ),
     * )
     *
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\CommentRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CommentRequest $request)
    {
        $model = new Comment();
        $model->fill($request->all());
        $model->save();

        return response('Comment successfully inserted', 201);
    }

    /**
     * @OA\Get(
     *     path="/comment/{id}",
     *     operationId="commentGet",
     *     tags={"Comment"},
     *     summary="Get comment by ID",
     *     security={
     *       {"api_key": {}},
     *     },
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="The ID of comment",
     *         required=true,
     *         example="1",
     *         @OA\Schema(
     *             type="integer",
     *         ),
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Request completed successfully",
     *         @OA\JsonContent(ref="#/components/schemas/CommentShowRequest")
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
        $model = Comment::query()->findOrFail($id);
        return response()->json($model);
    }

    /**
     * @OA\Put(
     *     path="/comment/{id}",
     *     operationId="commentUpdate",
     *     tags={"Comment"},
     *     summary="Update comment by ID",
     *     security={
     *       {"api_key": {}},
     *     },
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="The ID of comment",
     *         required=true,
     *         example="1",
     *         @OA\Schema(
     *             type="integer",
     *         ),
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Request completed successfully",
     *         @OA\JsonContent(ref="#/components/schemas/CommentShowRequest")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CommentStoreRequest")
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
        $model  = Comment::query()->findOrFail($id);
        $model->fill($params);
        $model->save();

        return response()->json($model);
    }

    /**
     * @OA\Delete(
     *     path="/comment/{id}",
     *     operationId="commentDelete",
     *     tags={"Comment"},
     *     summary="Delete comment by ID",
     *     security={
     *       {"api_key": {}},
     *     },
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="The ID of comment",
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
        $model = Comment::query()->findOrFail($id);
        $model->delete();

        return response('Deleted', HttpResponse::HTTP_ACCEPTED);
    }
}
