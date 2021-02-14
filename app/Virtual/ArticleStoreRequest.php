
<?php

/**
 * @OA\Schema(
 *     type="object",
 *     title="Article storring request",
 *     description="Some simple request create as article",
 * )
 */
class ArticleStoreRequest
{
    /**
     * @OA\Property(
     *     title="Head",
     *     description="Header of article",
     *     example="API: Red apples extend life",
     * )
     *
     * @var string
     */
    public $head;

    /**
     * @OA\Property(
     *     title="Text",
     *     description="Article text",
     *     example="British scientists have proven ...",
     * )
     *
     * @var string
     */
    public $text;

    /**
     * @OA\Property(
     *     title="user_id",
     *     description="User id who created article",
     *     example="1",
     * )
     *
     * @var integer
     */
    public $user_id;

}
