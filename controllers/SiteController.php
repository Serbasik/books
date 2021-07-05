<?php

namespace app\controllers;

use app\models\AddBookForm;
use app\models\AddClientForm;
use app\models\AddEmployForm;
use app\models\Books;
use app\models\Client;
use app\models\Conditions;
use app\models\Employ;
use app\models\GiveOut;
use app\models\GiveOutForm;
use app\models\ReturnsBookForm;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'index', 'addemploy', 'addclient', 'giveout', 'returns', 'booklist', 'clientlist'],
                'rules' => [
                    [
                        'actions' => ['logout', 'index', 'addemploy', 'addclient', 'giveout', 'returns', 'booklist', 'clientlist'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post', 'get'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new AddBookForm();
        if ($model->load(Yii::$app->request->post()))
        {
            if($model->validate())
            {
                $book = new Books();
                $date = explode('-', $model->date_in);
                $book->date_in = mktime(0,0, 0, $date[1],$date[2],$date[0]);
                $book->title = $model->title;
                $book->art = $model->art;
                $book->avtor = $model->avtor;
                $book->save();
                Yii::$app->session->setFlash('success', "Книга успешно добавлена!");
                return $this->redirect(Url::to('/'));

            }
        }
       return $this->render('add_book', compact('model'));
    }

    public function actionAddemploy()
    {
        $model = new AddEmployForm();
        if ($model->load(Yii::$app->request->post()))
        {
            if($model->validate())
            {
                $employ = new Employ();
                $employ->fio = $model->fio;
                $employ->post = $model->post;
                $employ->save();
                Yii::$app->session->setFlash('success', "Новый сотрудник успешно добавлен!");
                return $this->redirect(Url::to('/site/addemploy'));
            }
        }
        return $this->render('add_employ', compact('model'));
    }

    public function actionAddclient()
    {
        $model = new AddClientForm();
        if ($model->load(Yii::$app->request->post()))
        {
            if($model->validate())
            {
                $client = new Client();
                $client->fio = $model->fio;
                $client->ser = $model->ser;
                $client->num = $model->num;
                $client->save();
                Yii::$app->session->setFlash('success', "Новый клиент успешно добавлен!");
                return $this->redirect(Url::to('/site/addclient'));
            }
        }
        return $this->render('add_client', compact('model'));
    }

    public function actionGiveout()
    {
        $model = new GiveOutForm();
        $books = Books::find()->asArray()->all();
        $employs = Employ::find()->asArray()->all();

        if ($model->load(Yii::$app->request->post()))
        {
            if($model->validate())
            {
                $giveout = new GiveOut();
                $date = explode('-', $model->date_out);
                $giveout->date_out = mktime(0,0, 0, $date[1],$date[2],$date[0]);
                $giveout->book_id = $model->book_id;
                $giveout->employ_id = $model->employ_id;
                $date = explode('-', $model->date_back);
                $giveout->date_back = mktime(0,0, 0, $date[1],$date[2],$date[0]);
                $giveout->save();
                Yii::$app->session->setFlash('success', "Выдача книги оформлена!");
                return $this->redirect(Url::to('/site/giveout'));
            }
        }

        return $this->render('give_out', compact('model', 'books', 'employs'));
    }

    public function actionReturns()
    {
        $model = new ReturnsBookForm();
        $books = Books::find()->asArray()->all();
        $employs = Employ::find()->asArray()->all();
        $conditions = Conditions::find()->asArray()->all();

        if ($model->load(Yii::$app->request->post()))
        {
            if($model->validate())
            {
                $book = GiveOut::find()->where(['book_id' => $model->book_id])->andWhere(['is_return' => null])->one();
                if (!$book)
                {
                    Yii::$app->session->setFlash('error', "Эта книга никому ещё не выдана!");
                    return $this->redirect(Url::to('/site/returns'));
                }
                else
                {
                    $book->is_return = 1;
                    $book->condition = $model->condition;
                    $date = explode('-', $model->date_back);
                    $book->return_date = mktime(0,0, 0, $date[1],$date[2],$date[0]);
                    $book->employ_id_ret = $model->employ_id;
                    $book->save();

                    Yii::$app->session->setFlash('success', "Книга успешно возвращена!");
                    return $this->redirect(Url::to('/site/returns'));
                }

            }
        }
        return $this->render('returns', compact('model', 'books', 'employs', 'conditions'));
    }

    public function actionBooklist()
    {
        $books = Books::find()->asArray()->all();
        if (Yii::$app->request->post())
        {
            if (isset($_POST['title']))
            {
                $books = Books::find()->where(['like','title', $_POST['title']])->asArray()->all();
            }
            if (isset($_POST['on_shelf']))
            {
                if ($_POST['on_shelf'] == 1)
                $books = Books::find()->leftJoin('give_out', 'give_out.book_id = books.id')->where('give_out.is_return = 1')->orWhere(['give_out.book_id' => null])->all();
                if ($_POST['on_shelf'] == 0)
                    $books = Books::find()->leftJoin('give_out', 'give_out.book_id = books.id')->where(['>','give_out.book_id', 0])->andWhere(['give_out.is_return' => null])->all();
            }
        }
        $books_arr = array();
        $n = 0;
        foreach ($books as $item)
        {
            $out = GiveOut::find()->where(['book_id' => $item['id']])->andWhere(['is_return' => null])->one();
            if ($out)
            {
                $books_arr[$n] = array(
                    'title' => $item['title'],
                    'on_shelf' => false
            );
            }
            if (!$out)
            {
                $books_arr[$n] = array(
                    'title' => $item['title'],
                    'on_shelf' => true
            );
            }
            $n ++;

        }
        return $this->render('book_list', compact('books_arr'));
    }
    public function actionClientlist()
    {
        $clients = Client::find()->asArray()->all();
        if (Yii::$app->request->post())
        {
            if (isset($_POST['fio']))
            {
                $clients = Client::find()->where(['like','fio', $_POST['fio']])->asArray()->all();
            }

            if (isset($_POST['is_books']))
            {
                if ($_POST['is_books'] == 1)
                {
                    $clients = Client::find()->leftJoin('give_out', 'give_out.client_id = client.id')->where(['>','give_out.book_id', 0])->andWhere(['give_out.is_return' => null])->asArray()->all();
                }
                if ($_POST['is_books'] == 0)
                {
                    $clients = Client::find()->leftJoin('give_out', 'give_out.client_id = client.id')->orwhere('give_out.is_return = 1')->Where(['give_out.book_id' => null])->asArray()->all();
                }

            }
        }
        $clients_arr = array();
        $n = 0;
        foreach ($clients as $item)
        {
            $is_book = GiveOut::find()->where(['client_id' => $item['id']])->andWhere(['is_return' => null])->asArray()->all();
            if (!$is_book)
            {
                $clients_arr[$n] = array(
                  'fio' => $item['fio'],
                  'is_book' => false
                );
            }
            if ($is_book)
            {

                    $c = 0;
                foreach ($is_book as $out_book)
                {
                    $book = Books::find()->where(['id' => $out_book['book_id']])->one();
                    $books[$c] = array(
                        'title' => $book->title,
                        'date_back' => date('d.m.Y', $out_book['date_back']),
                    );
                    $c ++;
                }
                $clients_arr[$n] = array(
                    'fio' => $item['fio'],
                    'is_book' => true,
                    'books' => $books
                );
            }
            $n ++;
        }

        return $this->render('client_list', compact('clients_arr'));
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
