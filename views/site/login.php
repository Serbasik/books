<?php
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;


$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="mdk-drawer-layout__content">
    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout" data-has-scrolling-region>

        <!-- Header -->

        <div id="header" class="mdk-header js-mdk-header m-0" data-fixed data-effects="waterfall" data-retarget-mouse-scroll="false">
            <div class="mdk-header__content">

                <div class="navbar navbar-expand-sm navbar-main navbar-light bg-white pl-md-0 pr-0" id="navbar" data-primary>
                    <div class="container-fluid page__container pr-0">

                        <!-- Navbar toggler -->
                        <button class="navbar-toggler navbar-toggler-custom d-lg-none d-flex mr-navbar" type="button" data-toggle="sidebar">
                            <span class="material-icons">short_text</span>
                        </button>

                        <!-- Navbar Brand -->
                        <a href="index.html" class="navbar-brand flex ">
                            <span>Авторизация в системе</span>
                        </a>


                        <form class="ml-auto search-form search-form--light d-none d-sm-flex flex" action="index.html">
                            <input type="text" class="form-control" placeholder="Search">
                            <button class="btn" type="submit"><i class="material-icons">search</i></button>
                        </form>

                    </div>
                </div>

            </div>
        </div>

        <!-- // END Header -->
        <!-- Header Layout Content -->

        <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page">
            <?php if (Yii::$app->session->hasFlash('success')):?>
                <div class="alert alert-success alert-dismissible show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong><?php echo Yii::$app->session->getFlash('success');?></strong>
                </div>
            <?php endif;?>
            <div class="container-fluid page__container">

                <div class="site-login">
                    <h1><?= Html::encode($this->title) ?></h1>

                    <p>Please fill out the following fields to login:</p>

                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'layout' => 'horizontal',
                        'fieldConfig' => [
                            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                            'labelOptions' => ['class' => 'col-lg-1 control-label'],
                        ],
                    ]); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <?= $form->field($model, 'rememberMe')->checkbox([
                        'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                    ]) ?>

                    <div class="form-group">
                        <div class="col-lg-offset-1 col-lg-11">
                            <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>


                </div>

            </div>

        </div>
        <!-- // END header-layout__content -->

    </div>
    <!-- // END header-layout -->
</div>





