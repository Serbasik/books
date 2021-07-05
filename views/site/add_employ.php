<?php
use yii\bootstrap\ActiveForm;
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
                            <span>Добавление сотрудника</span>
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

                <div class="card card-form">
                    <div class="row no-gutters">
                        <div class="col-lg-4 card-body">
                            <p><strong class="headings-color">Форма добавления сотрудника</strong></p>
                            <p class="text-muted">Для добавления сотрудника заполните все поля.</p>
                        </div>
                        <div class="col-lg-8 card-form__body card-body">
                            <?php $form = ActiveForm::begin(['id' => 'employ-form', 'options'=>[]]); ?>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="fio">Ф.И.О.</label>
                                            <?= $form->field($model, 'fio', [])->textInput(['id' => 'fio', 'class' => 'form-control'])->label(false); ?>
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="dol">Должность</label>
                                            <?= $form->field($model, 'post', [])->textInput(['id' => 'post', 'class' => 'form-control'])->label(false); ?>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary" type="submit">Сохранить</button>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- // END header-layout__content -->

    </div>
    <!-- // END header-layout -->
</div>

