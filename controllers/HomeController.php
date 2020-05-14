<?php


    namespace app\controllers;


    use app\models\Blog;
    use app\models\Category;
    use app\models\Menu;
    use app\models\Product;
    use yii\data\Pagination;

    class HomeController extends AppController
    {

        public function actionIndex($id = 1)
        {
            $categories = Category::find()->all();
            $hits = Product::find()->where(['hits' => 1])->limit(4)->all();
            $offers = Product::find()->where(['sale' => 1])->limit(4)->all();

            $category = Category::findOne($id);
            $this->setMeta(\Yii::$app->name, $category->keywords, $category->description);




            $query = Product::find();
            $pages = new Pagination(['totalCount'    => $query->count(), 'pageSize' => 8, 'forcePageParam' => false,
                                     'pageSizeParam' => false]);
            $products = $query->offset($pages->offset)->limit($pages->limit)->all();
            return $this->render('index', compact('categories', 'products', 'hits', 'offers', 'pages'));
        }

        public function actionDelivery()
        {
            $this->view->title = 'Доставка и оплата';
            return $this->render('delivery');
        }

        public function actionContact()
        {
            $this->view->title = 'Контакты';
            return $this->render('contact');
        }

        public function actionShop()
        {
            $this->view->title = 'О магазине';
            return $this->render('shop');
        }

        public function actionBlog()
        {
            $this->view->title = 'Блог';
            $this->view->params['news']= Blog::find()->all();
            $news =  $this->view->params['news'];

            return $this->render('blog',compact('news'));
        }
    }