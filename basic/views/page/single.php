<?php

use yii\helpers\Url;
use yii\web\ForbiddenHttpException;
use app\components\RatingWidget;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<?php
if(Yii::$app->user->isGuest):
    if($article->status == 'guest'):

?>
<div class="content-body">

        <h1><a href="<?= Url::toRoute(['/page/view', 'slug'=>$article->slug]); ?>"><?= $article->title; ?></a></h1>
        <h4><a href="<?= Url::toRoute(['/page/category', 'slug'=>$article->category->slug]); ?>"><?= $article->category->title; ?></a></h4>
        <p><?= $article->date_create; ?></p>
        <p><?= $article->content; ?></p>
        <p id="slug"><?= $article->slug; ?></p>
        <div class="tags">
            <h4>Рейтинг статьи:</h4>
            <?php $form = ActiveForm::begin(); ?>
                    <div class="rating" id="rating">
                        <?php
                                    for ($i=5; $i > $userRating; $i--) {
                                        echo Html::tag("span", "☆", ['value' => $i]);
                                    }
                                    for ($i=$userRating; $i > 0; $i--) {
                                        echo Html::tag("span", "☆", ['value' => $i, 'class' => 'star-active']);
                                    }
                                 ?>
                                <div id="result-ajax"></div>
                    </div>


            <?php ActiveForm::end(); ?>

            <h4>Теги:</h4>
            <ul>
                <?php foreach($tags as $id => $tag):?>
                    <li> <a href="<?= Url::toRoute(['/page/tag', 'slug'=>$tag->slug]); ?>"><?= $tag->title ?></a></li>
                 <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <?php elseif ($article->status == 'admin' || $article->status == 'user'): ?>
        <?php throw new ForbiddenHttpException('You are not allowed to access this page.');?>
<?php endif; ?>
    <?php elseif(Yii::$app->user->identity->username == 'admin'): ?>
    <div class="content-body">

            <h1><a href="<?= Url::toRoute(['/page/view', 'slug'=>$article->slug]); ?>"><?= $article->title; ?></a></h1>
            <h4><a href="<?= Url::toRoute(['/page/category', 'slug'=>$article->category->slug]); ?>"><?= $article->category->title; ?></a></h4>
            <p><?= $article->date_create; ?></p>
            <p><?= $article->content; ?></p>
            <p id="slug"><?= $article->slug; ?></p>
            <div class="tags">
                <h4>Рейтинг статьи:</h4>
                <?php $form = ActiveForm::begin(); ?>
                        <div class="rating" id="rating">
                            <?php
                                for ($i=5; $i > $userRating; $i--) {
                                    echo Html::tag("span", "☆", ['value' => $i]);
                                }
                                for ($i=$userRating; $i > 0; $i--) {
                                    echo Html::tag("span", "☆", ['value' => $i, 'class' => 'star-active']);
                                }
                           ?>
                            <div id="result-ajax"></div>
                        </div>


                <?php ActiveForm::end(); ?>
                <h4>Теги:</h4>
                <ul>
                    <?php foreach($tags as $id => $tag):?>
                        <li> <a href="<?= Url::toRoute(['/page/tag', 'slug'=>$tag->slug]); ?>"><?= $tag->title ?></a></li>
                     <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php else: ?>
        <?php if($article->status == 'guest' || $article->status == 'user'):?>
        <div class="content-body">

                <h1><a href="<?= Url::toRoute(['/page/view', 'slug'=>$article->slug]); ?>"><?= $article->title; ?></a></h1>
                <h4><a href="<?= Url::toRoute(['/page/category', 'slug'=>$article->category->slug]); ?>"><?= $article->category->title; ?></a></h4>
                <p><?= $article->date_create; ?></p>
                <p><?= $article->content; ?></p>
                <p id="slug"><?= $article->slug; ?></p>
                <div class="tags">
                    <h4>Рейтинг статьи:</h4>
                    <?php $form = ActiveForm::begin(); ?>
                            <div class="rating" id="rating">
                                <?php
                                        for ($i=5; $i > $userRating; $i--) {
                                            echo Html::tag("span", "☆", ['value' => $i]);
                                        }
                                        for ($i=$userRating; $i > 0; $i--) {
                                            echo Html::tag("span", "☆", ['value' => $i, 'class' => 'star-active']);
                                        }
                                     ?>
                                    <div id="result-ajax"></div>
                            </div>


                    <?php ActiveForm::end(); ?>
                    <h4>Теги:</h4>
                    <ul>
                        <?php foreach($tags as $id => $tag):?>
                            <li> <a href="<?= Url::toRoute(['/page/tag', 'slug'=>$tag->slug]); ?>"><?= $tag->title ?></a></li>
                         <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php elseif ($article->status == 'admin'): ?>
            <?php throw new ForbiddenHttpException('You are not allowed to access this page.');?>
        <?php endif; ?>
<?php endif; ?>
