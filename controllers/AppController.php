<?php


namespace app\controllers;


use app\models\Info;
use app\models\Menu;
use yii\web\Controller;

class AppController extends Controller
{

    public function beforeAction($action)
    {
        $this->view->title = \Yii::$app->name;

        $this->view->params['menu'] = \Yii::$app->cache->get('menu');

        if (!$this->view->params['menu']){

        $this->view->params['menu'] = Menu::find()->orderBy(['id' => SORT_DESC])->all();

    }
        \Yii::$app->cache->set('menu', $this->view->params['menu'], 3600);

        $this->view->params['info'] = Info::findOne($id = 1);


        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }

    protected function setMeta($title = null, $keywords = null, $description = null)
    {
        $this->view->title = $title;
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
        $this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);
    }


}