<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Blog;

?>

<?= $this->render('//layouts/inc/sidebar') ?>

<?php if($this->beginCache('aside-widget', [
  'duration' => 3600, //(default = 0)
  'dependency' => [
    'class' => 'yii\caching\DbDependency',
    'sql' => 'SELECT MAX(updated_at) FROM ' . Blog::tableName(),
  ],])): ?>
<div class="article row lg-grid-9 md-grid-9 sm-grid-12 xs-grid-12 padded-inner-sides">

    <div class="row">

        <div class="breadcrumbs">

            <a href="<?= Url::home() ?>" class="breadcrumbs-page breadcrumbs-page--home">
                <i class="fa fa-home"></i>
            </a>

            <span class="breadcrumbs-pipe">
                <i class="fa fa-angle-right"></i>
            </span>
            <a href="<?= Url::to(['home/blog']) ?>">Блог</a>
            <span class="breadcrumbs-pipe">
        		<i class="fa fa-angle-right"></i>
      		</span>
            <span class="breadcrumbs-page"><?= $article->title ?></span>
        </div>

    </div>


    <h1 class="article-title content-title"><?= $article->title ?></h1>

    <div class="article-note">

        Опубликовано: <?= \Yii::$app->formatter->asDate($article->created_at); ?>
    </div>

    <div class="row">

        <!--<div class="article-image_container padded-inner-bottom">
      <span class="article-image">
		  <?php /*if (!empty($article->image)) :*/ ?>
          <? /*= Html::img("@web/img/blog/{$article->image}",['title'=>$article->title ]) */ ?>
		  <?php /*else: */ ?>
              <? /*= Html::img("@web/img/blog/no-image.png",['title'=>$article->title ]) */ ?>
		  <?php /*endif; */ ?>
      </span>
        </div>-->


        <div class="article-content editor">
            <p> <?= $article->content ?></p>
        </div>
    </div>

</div>
<?php $this->endCache(); endif; ?>