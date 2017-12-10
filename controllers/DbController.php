<?php

namespace app\controllers;

use app\models\Post;
use yii\helpers\Html;
use yii\web\Controller;

class DbController extends Controller {

//    public function actionIndex()
//    {
//        $post = new Post();
//
//        $post->title = 'Post #' . rand(1, 1000);
//        $post->text = 'text';
//        $post->save();
//
//        $posts = Post::find()->all();
//
//        echo Html::tag('h1', 'Posts');
//        echo Html::ul(ArrayHelper::getColumn($posts, 'title')); // pluck
//
//        $comment = new Comment();
//        $comment->post_id = $post->id;
//        $comment->text = "comment #" . rand(1, 1000);
//        $comment->save();
//
//        $comments = Comment::find()->all();
//
//        echo Html::tag('h1', 'Comments');
//        echo Html::ul(ArrayHelper::getColumn($comments, 'text'));
//    }

    public function actionIndex()
    {
        // Get posts written in default application language
        $posts = Post::find()->all();

        echo Html::tag('h1', 'Default language');
        foreach ($posts as $post) {
            echo Html::tag('h2', $post->title);
            echo $post->text;
        }

        // Get posts written in German
        $posts = Post::find()->lang('de')->all();

        echo Html::tag('h1', 'German');
        foreach ($posts as $post) {
            echo Html::tag('h2', $post->title);
            echo $post->text;
        }
    }
}