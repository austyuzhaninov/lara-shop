<?php

/**
 * @OA\Schema(
 *     type="object",
 *     title="Comment showing request",
 *     description="Some simple request store as comment",
 * )
 */
class CommentStoreRequest
{
    /**
     * @OA\Property(
     *     title="article_id",
     *     description="Article id where set comment",
     *     example="1",
     * )
     *
     * @var integer
     */
    public $article_id;

    /**
     * @OA\Property(
     *     title="Name",
     *     description="Commentator's name",
     *     example="API:Foo Fighter!",
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *     title="Text",
     *     description="Comment text",
     *     example="Hello! I've waited here for you.",
     * )
     *
     * @var string
     */
    public $text;


}
