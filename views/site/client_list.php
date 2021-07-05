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
                            <span>Список клиентов</span>
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

            <div class="container-fluid page__container">

                <div class="card card-form d-flex flex-column flex-sm-row">
                    <div class="card-form__body card-body-form-group flex">
                        <div class="form-row align-items-center">
                            <div class="col-sm-auto">
                                <?php $form1 = ActiveForm::begin(['id' => 'title_form']); ?>
                                <div class="form-group">
                                    <label for="filter_name">ФИО клиента</label>
                                    <input id="filter_name" type="text" name="fio" class="form-control" placeholder="">
                                </div>
                                <?php ActiveForm::end(); ?>
                            </div>

                            <div class="col-sm-auto">
                                <?php $form2 = ActiveForm::begin(['id' => 'on_shelf_form']); ?>
                                <div class="form-group">
                                    <label for="filter_yes">Наличие книг</label><br>
                                    <select id="filter_yes" class="custom-select" name="is_books">
                                        <option selected disabled>Выберите вариант...</option>
                                        <option value="1">С книгами</option>
                                        <option value="0">Без книг</option>
                                    </select>
                                </div>
                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                    </div>
                    <button class="btn bg-white border-left border-top border-top-sm-0 rounded-top-0 rounded-top-sm rounded-left-sm-0"><i class="material-icons text-primary">refresh</i></button>
                </div>



                <?php foreach ($clients_arr as $item):?>
                    <div class="card stories-card">
                        <div class="stories-card__content d-flex align-items-center flex-wrap">
                            <div class="avatar avatar-lg mr-3">
                                <a href=""><img src="/img/avatar.jpg" alt="avatar" class="avatar-img rounded"></a>
                            </div>
                            <div class="stories-card__title flex">
                                <h5 class="card-title m-0"><a href="" class="headings-color"><?=$item['fio']?></a></h5>
                                <?php if ($item['is_book']):?>
                                    <small class="text-dark-gray">С книгами</small>

                                <?php foreach ($item['books'] as $book):?>
                                        <p><small class="text-dark-gray"><?=$book['title']?> - возврат: <?=$book['date_back']?></small></p>
                                <?php endforeach;?>
                                <?php endif;?>
                                <?php if (!$item['is_book']):?>
                                    <small class="text-dark-gray">Без книг</small>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>

        </div>
        <!-- // END header-layout__content -->

    </div>
    <!-- // END header-layout -->
</div>


