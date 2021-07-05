<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Учет книг v0.1</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    <!-- Simplebar -->
    <link type="text/css" href="/css/simplebar.min.css" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="/css/app.css" rel="stylesheet">
    <link type="text/css" href="/css/app.rtl.css" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="/css/vendor-material-icons.css" rel="stylesheet">
    <link type="text/css" href="/css/vendor-material-icons.rtl.css" rel="stylesheet">

    <!-- Font Awesome FREE Icons -->
    <link type="text/css" href="/css/vendor-fontawesome-free.css" rel="stylesheet">
    <link type="text/css" href="/css/vendor-fontawesome-free.rtl.css" rel="stylesheet">

    <!-- ion Range Slider -->
    <link type="text/css" href="/css/vendor-ion-rangeslider.css" rel="stylesheet">
    <link type="text/css" href="/css/vendor-ion-rangeslider.rtl.css" rel="stylesheet">

        <!-- Flatpickr -->
    <link type="text/css" href="/css/vendor-flatpickr.css" rel="stylesheet">
    <link type="text/css" href="/css/vendor-flatpickr.rtl.css" rel="stylesheet">
    <link type="text/css" href="/css/vendor-flatpickr-airbnb.css" rel="stylesheet">
    <link type="text/css" href="/css/vendor-flatpickr-airbnb.rtl.css" rel="stylesheet">

    <!-- Vector Maps -->
    <link type="text/css" href="/css/jqvmap.min.css" rel="stylesheet">

</head>

<body class="layout-default">
<?php $this->beginBody() ?>
<div class="preloader"></div>

<div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px" data-fullbleed>

    <?= $content ?>


    <div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="start">
        <div class="mdk-drawer__content">
            <div class="sidebar sidebar-dark sidebar-left simplebar bg-dark" data-simplebar>
                <div class="d-flex align-items-center sidebar-p-a border-bottom sidebar-account flex-shrink-0">
                    <a href="index.html" class="flex d-flex align-items-center text-underline-0 text-body">
                            <span class="mr-3">
                                <img src="/img/logo.svg" width="43" height="43" alt="avatar">
                            </span>
                        <span class="flex d-flex flex-column">
                                <strong class="h5 text-body mb-0">Учет книг</strong>
                                <small class="text-muted text-uppercase">v0.1</small>
                            </span>
                    </a>
                    <div class="dropdown ml-auto">
                        <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">keyboard_arrow_down</i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-item-text dropdown-item-text--lh">
                                <div><strong>Сергей Сластёнов</strong></div>
                                <div>@serbas</div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item active" href="index.html">Главная</a>
                            <a class="dropdown-item" href="profile.html">Мой профиль</a>
                            <a class="dropdown-item" href="edit-account.html">Настройки</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/site/logout">Выход</a>
                        </div>
                    </div>
                </div>

                <div class="py-4 text-center flex-shrink-0">
                    <a href="/" class="btn btn-primary w-90">Добавить книгу <i class="material-icons ml-1">add</i></a>
                </div>
                <div class="py-4 text-center flex-shrink-0">
                    <a href="/site/addemploy" class="btn btn-primary w-90">Добавить сотрудника <i class="material-icons ml-1">add</i></a>
                </div>
                <div class="py-4 text-center flex-shrink-0">
                    <a href="/site/addclient" class="btn btn-primary w-90">Добавить клиента <i class="material-icons ml-1">add</i></a>
                </div>


                <div class="tab-content">
                    <div id="sm-menu" class="tab-pane show active" role="tabpanel" aria-labelledby="sm-menu-tab">
                        <ul class="sidebar-menu flex">
                            <li class="sidebar-menu-item active">
                                <a class="sidebar-menu-button" href="/site/giveout">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i>
                                    <span class="sidebar-menu-text">Выдача книг</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="/site/returns">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i>
                                    <span class="sidebar-menu-text">Возврат книг</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="/site/booklist">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i>
                                    <span class="sidebar-menu-text">Список книг</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="/site/clientlist">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i>
                                    <span class="sidebar-menu-text">Список клиентов</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>

                <div class="mt-auto sidebar-p-a sidebar-b-t d-flex flex-column flex-shrink-0">

                    <a class="sidebar-link" href="/site/logout">
                        Выход
                        <i class="sidebar-menu-icon ml-2 material-icons icon-16pt">exit_to_app</i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- // END drawer-layout -->

<div class="mdk-drawer js-mdk-drawer" id="events-drawer" data-align="end">
    <div class="mdk-drawer__content">
        <div class="sidebar sidebar-light sidebar-left simplebar" data-simplebar>




            <small class="text-dark-gray px-3 py-1">
                <strong>Thursday, 28 Feb</strong>
            </small>

            <div class="list-group list-group-flush">

                <div class="list-group-item bg-light">
                    <div class="row">
                        <div class="col-auto d-flex flex-column">
                            <small>12:30 PM</small>
                            <small class="text-dark-gray">2 hrs</small>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-column flex">
                                <a href="#" class="text-body"><strong class="text-15pt">Marketing Team Meeting</strong></a>

                                <small class="text-muted d-flex align-items-center"><i class="material-icons icon-16pt mr-1">location_on</i> 16845 Hicks Road</small>


                            </div>
                            <div class="avatar-group mt-2">

                                <div class="avatar avatar-xs">
                                    <img src="assets/images/256_joao-silas-636453-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                </div>

                                <div class="avatar avatar-xs">
                                    <img src="assets/images/256_jeremy-banks-798787-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                </div>

                                <div class="avatar avatar-xs">
                                    <img src="assets/images/256_daniel-gaffey-1060698-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <small class="text-dark-gray px-3 py-1">
                <strong>Wednesday, 27 Feb</strong>
            </small>

            <div class="list-group list-group-flush">

                <div class="list-group-item bg-light">
                    <div class="row">
                        <div class="col-auto d-flex flex-column">
                            <small>07:48 PM</small>
                            <small class="text-dark-gray">30 min</small>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-column flex">
                                <a href="#" class="text-body"><strong class="text-15pt">Call Alex</strong></a>


                                <small class="text-muted d-flex align-items-center"><i class="material-icons icon-16pt mr-1">phone</i> 202-555-0131</small>

                            </div>



                        </div>
                    </div>
                </div>

            </div>

            <small class="text-dark-gray px-3 py-1">
                <strong>Tuesday, 26 Feb</strong>
            </small>

            <div class="list-group list-group-flush">

                <div class="list-group-item bg-light">
                    <div class="row">
                        <div class="col-auto d-flex flex-column">
                            <small>03:13 PM</small>
                            <small class="text-dark-gray">2 hrs</small>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-column flex">
                                <a href="#" class="text-body"><strong class="text-15pt">Design Team Meeting</strong></a>

                                <small class="text-muted d-flex align-items-center"><i class="material-icons icon-16pt mr-1">location_on</i> 16845 Hicks Road</small>


                            </div>
                            <div class="avatar-group mt-2">

                                <div class="avatar avatar-xs">
                                    <img src="assets/images/256_rsz_1andy-lee-642320-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                </div>

                                <div class="avatar avatar-xs">
                                    <img src="assets/images/256_michael-dam-258165-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                </div>

                                <div class="avatar avatar-xs">
                                    <img src="assets/images/256_luke-porter-261779-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                </div>

                                <div class="avatar avatar-xs">
                                    <img src="assets/images/stories/256_rsz_clem-onojeghuo-193397-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <small class="text-dark-gray px-3 py-1">
                <strong>Monday, 25 Feb</strong>
            </small>

            <div class="list-group list-group-flush">

                <div class="list-group-item bg-light">
                    <div class="row">
                        <div class="col-auto d-flex flex-column">
                            <small>12:30 PM</small>
                            <small class="text-dark-gray">2 hrs</small>
                        </div>
                        <div class="col d-flex">
                            <div class="d-flex flex-column flex">
                                <a href="#" class="text-body"><strong class="text-15pt">Call Wendy</strong></a>


                                <small class="text-muted d-flex align-items-center"><i class="material-icons icon-16pt mr-1">phone</i> 202-555-0131</small>

                            </div>


                            <div class="avatar avatar-xs">
                                <img src="assets/images/256_michael-dam-258165-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                            </div>


                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- App Settings FAB -->
<div id="app-settings">
    <app-settings></app-settings>
</div>

<!-- jQuery -->
<script src="/js/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>

<!-- Simplebar -->
<script src="/js/simplebar.min.js"></script>

<!-- DOM Factory -->
<script src="/js/dom-factory.js"></script>

<!-- MDK -->
<script src="/js/material-design-kit.js"></script>

<!-- Range Slider -->
<script src="/js/ion.rangeSlider.min.js"></script>
<script src="/js/ion-rangeslider.js"></script>

<!-- App -->
<script src="/js/toggle-check-all.js"></script>
<script src="/js/check-selected-row.js"></script>
<script src="/js/dropdown.js"></script>
<script src="/js/sidebar-mini.js"></script>
<script src="/js/app.js"></script>
<!-- Flatpickr -->
<script src="/js/flatpickr.min.js"></script>
<script src="/js/flatpickr.js"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/ru.js"></script>
<script>
    flatpickr('input#validationSample03, input#date_out, input#date_back', {
        "locale": "ru"  // locale for this instance only
    });
</script>

<!-- Global Settings -->
<script src="/js/settings.js"></script>

<!-- Chart.js -->
<script src="/js/Chart.min.js"></script>

<!-- App Charts JS -->
<script src="/js/chartjs-rounded-bar.js"></script>
<script src="/js/charts.js"></script>

<!-- Vector Maps -->
<script src="/js/jquery.vmap.min.js"></script>
<script src="/js/jquery.vmap.world.js"></script>
<script src="/js/vector-maps.js"></script>

<!-- Chart Samples -->
<script src="/js/page.dashboard.js"></script>

<script>
    $("#filter_name").on('change', function(){
        $('#title_form').submit();
    });
    $("#filter_yes").on('change', function(){
        $('#on_shelf_form').submit();
    });
</script>
<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>