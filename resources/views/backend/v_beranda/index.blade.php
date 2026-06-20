@extends('backend.v_layouts.app') @section('content')
    <!-- contentAwal -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body border-top">
                    <h5 class="card-title"> {{ $judul }}</h5>
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading"> Selamat Datang, {{ Auth::user()->nama }}</h4> Aplikasi Toko Online dengan
                        hak akses yang anda miliki sebagai <b>
                            @if (Auth::user()->role == 1)
                                Super Admin
                            @elseif(Auth::user()->role == 0)
                                Admin
                            @endif
                        </b> ini adalah halaman utama dari aplikasi Web Programming. Studi Kasus Toko Online.
                        <hr>
                        <p class="mb-0">Kuliah..? BSI Aja !!!</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- column -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                Latest Posts
                            </h4>
                        </div>
                        <div class="comment-widgets scrollable">
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row m-t-0">
                                <div class="p-2">
                                    <img alt="user" class="rounded-circle" src="assets/images/users/1.jpg"
                                        width="50" />
                                </div>
                                <div class="comment-text w-100">
                                    <h6 class="font-medium">
                                        James Anderson
                                    </h6>
                                    <span class="m-b-15 d-block">
                                        Lorem Ipsum is simply dummy text of
                                        the printing and type setting industry.
                                    </span>
                                    <div class="comment-footer">
                                        <span class="text-muted float-right">
                                            April 14, 2016
                                        </span>
                                        <button class="btn btn-cyan btn-sm" type="button">
                                            Edit
                                        </button>
                                        <button class="btn btn-success btn sm" type="button">
                                            Publish
                                        </button>
                                        <button class="btn btn-danger btn sm" type="button">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row">
                                <div class="p-2">
                                    <img alt="user" class="rounded-circle" src="assets/images/users/4.jpg"
                                        width="50" />
                                </div>
                                <div class="comment-text active w-100">
                                    <h6 class="font-medium">
                                        Michael Jorden
                                    </h6>
                                    <span class="m-b-15 d-block">
                                        Lorem Ipsum is simply dummy text of
                                        the printing and type setting industry.
                                    </span>
                                    <div class="comment-footer">
                                        <span class="text-muted float-right">
                                            May 10, 2016
                                        </span>
                                        <button class="btn btn-cyan btn-sm" type="button">
                                            Edit
                                        </button>
                                        <button class="btn btn-success btn sm" type="button">
                                            Publish
                                        </button>
                                        <button class="btn btn-danger btn sm" type="button">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row">
                                <div class="p-2">
                                    <img alt="user" class="rounded-circle" src="assets/images/users/5.jpg"
                                        width="50" />
                                </div>
                                <div class="comment-text w-100">
                                    <h6 class="font-medium">
                                        Johnathan Doeting
                                    </h6>
                                    <span class="m-b-15 d-block">
                                        Lorem Ipsum is simply dummy text of
                                        the printing and type setting industry.
                                    </span>
                                    <div class="comment-footer">
                                        <span class="text-muted float-right">
                                            August 1, 2016
                                        </span>
                                        <button class="btn btn-cyan btn-sm" type="button">
                                            Edit
                                        </button>
                                        <button class="btn btn-success btn sm" type="button">
                                            Publish
                                        </button>
                                        <button class="btn btn-danger btn sm" type="button">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                To Do List
                            </h4>
                            <div class="todo-widget scrollable" style="height:450px;">
                                <ul class="list-task todo-list list-group m-b-0" data-role="tasklist">
                                    <li class="list-group-item todo-item" data-role="task">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="customCheck" type="checkbox" />
                                            <label class="custom-control-label todo-label" for="customCheck">
                                                <span class="todo-desc">
                                                    Lorem Ipsum is simply dummy
                                                    text of the printing and typesetting industry.
                                                </span>
                                                <span class="badge badge-pill badge danger float-right">
                                                    Today
                                                </span>
                                            </label>
                                        </div>
                                        <ul class="list-style-none assignedto">
                                            <li class="assignee">
                                                <img alt="user" class="rounded-circle" data-original-title="Steave"
                                                    data-placement="top" data-toggle="tooltip"
                                                    src="assets/images/users/1.jpg" title="" width="40" />
                                            </li>
                                            <li class="assignee">
                                                <img alt="user" class="rounded-circle" data-original-title="Jessica"
                                                    data-placement="top" data-toggle="tooltip"
                                                    src="assets/images/users/2.jpg" title="" width="40" />
                                            </li>
                                            <li class="assignee">
                                                <img alt="user" class="rounded-circle" data-original-title="Priyanka"
                                                    data-placement="top" data-toggle="tooltip"
                                                    src="assets/images/users/3.jpg" title="" width="40" />
                                            </li>
                                            <li class="assignee">
                                                <img alt="user" class="rounded-circle" data-original-title="Selina"
                                                    data-placement="top" data-toggle="tooltip"
                                                    src="assets/images/users/4.jpg" title="" width="40" />
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="list-group-item todo-item" data-role="task">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="customCheck1" type="checkbox" />
                                            <label class="custom-control-label todo-label" for="customCheck1">
                                                <span class="todo-desc">
                                                    Lorem Ipsum is simply dummy
                                                    text of the printing
                                                </span>
                                                <span class="badge badge-pill badge-primary float-right">
                                                    1 week
                                                </span>
                                            </label>
                                        </div>
                                        <div class="item-date">
                                            26 jun 2017
                                        </div>
                                    </li>
                                    <li class="list-group-item todo-item" data-role="task">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="customCheck2" type="checkbox" />
                                            <label class="custom-control-label todo-label" for="customCheck2">
                                                <span class="todo-desc">
                                                    Give Purchase report to
                                                </span>
                                                <span class="badge badge-pill badge-info float-right">
                                                    Yesterday
                                                </span>
                                            </label>
                                        </div>
                                        <ul class="list-style-none assignedto">
                                            <li class="assignee">
                                                <img alt="user" class="rounded-circle" data-original-title="Priyanka"
                                                    data-placement="top" data-toggle="tooltip"
                                                    src="assets/images/users/3.jpg" title="" width="40" />
                                            </li>
                                            <li class="assignee">
                                                <img alt="user" class="rounded-circle" data-original-title="Selina"
                                                    data-placement="top" data-toggle="tooltip"
                                                    src="assets/images/users/4.jpg" title="" width="40" />
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="list-group-item todo-item" data-role="task">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="customCheck3" type="checkbox" />
                                            <label class="custom-control-label todo-label" for="customCheck3">
                                                <span class="todo-desc">
                                                    Lorem Ipsum is simply dummy
                                                    text of the printing
                                                </span>
                                                <span class="badge badge-pill badge-warning float-right">
                                                    2
                                                    weeks
                                                </span>
                                            </label>
                                        </div>
                                        <div class="item-date">
                                            26 jun 2017
                                        </div>
                                    </li>
                                    <li class="list-group-item todo-item" data-role="task">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="customCheck4" type="checkbox" />
                                            <label class="custom-control-label todo-label" for="customCheck4">
                                                <span class="todo-desc">
                                                    Give Purchase report to
                                                </span>
                                                <span class="badge badge-pill badge-info float-right">
                                                    Yesterday
                                                </span>
                                            </label>
                                        </div>
                                        <ul class="list-style-none assignedto">
                                            <li class="assignee">
                                                <img alt="user" class="rounded-circle" data-original-title="Priyanka"
                                                    data-placement="top" data-toggle="tooltip"
                                                    src="assets/images/users/3.jpg" title="" width="40" />
                                            </li>
                                            <li class="assignee">
                                                <img alt="user" class="rounded-circle" data-original-title="Selina"
                                                    data-placement="top" data-toggle="tooltip"
                                                    src="assets/images/users/4.jpg" title="" width="40" />
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- card -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title m-b-0">
                                Progress Box
                            </h4>
                            <div class="m-t-20">
                                <div class="d-flex no-block align-items-center">
                                    <span>
                                        81% Clicks
                                    </span>
                                    <div class="ml-auto">
                                        <span>
                                            125
                                        </span>
                                    </div>
                                </div>
                                <div class="progress">
                                    <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="10"
                                        class="progress-bar progress-bar-striped" role="progressbar" style="width: 81%">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex no-block align-items-center m-t-25">
                                    <span>
                                        72% Uniquie Clicks
                                    </span>
                                    <div class="ml-auto">
                                        <span>
                                            120
                                        </span>
                                    </div>
                                </div>
                                <div class="progress">
                                    <div aria="" aria-valuemin="0" aria-valuenow="25"
                                        class="progress-bar progress-bar-striped bg-success" role="progressbar"
                                        style="width: 72%" valuemax="100">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex no-block align-items-center m-t-25">
                                    <span>
                                        53% Impressions
                                    </span>
                                    <div class="ml-auto">
                                        <span>
                                            785
                                        </span>
                                    </div>
                                </div>
                                <div class="progress">
                                    <div aria="" aria-valuemin="0" aria-valuenow="50"
                                        class="progress-bar progress-bar-striped bg-info" role="progressbar"
                                        style="width: 53%" valuemax="100">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex no-block align-items-center m-t-25">
                                    <span>
                                        3% Online Users
                                    </span>
                                    <div class="ml-auto">
                                        <span>
                                            8
                                        </span>
                                    </div>
                                </div>
                                <div class="progress">
                                    <div aria="" aria-valuemin="0" aria-valuenow="75"
                                        class="progress-bar progress-bar-striped bg-danger" role="progressbar"
                                        style="width: 3%" valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- card new -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title m-b-0">
                                News Updates
                            </h4>
                        </div>
                        <ul class="list-style-none">
                            <li class="d-flex no-block card-body">
                                <i class="fa fa-check-circle w-30px m-t-5">
                                </i>
                                <div>
                                    <a class="m-b-0 font-medium p-0" href="#">
                                        Lorem ipsum dolor sit
                                        amet, consectetur adipiscing elit.
                                    </a>
                                    <span class="text-muted">
                                        dolor sit amet, consectetur
                                        adipiscing
                                    </span>
                                </div>
                                <div class="ml-auto">
                                    <div class="tetx-right">
                                        <h5 class="text-muted m-b-0">
                                            20
                                        </h5>
                                        <span class="text-muted font-16">
                                            Jan
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex no-block card-body border-top">
                                <i class="fa fa-gift w-30px m-t-5">
                                </i>
                                <div>
                                    <a class="m-b-0 font-medium p-0" href="#">
                                        Congratulation Maruti,
                                        Happy Birthday
                                    </a>
                                    <span class="text-muted">
                                        many many happy returns of the day
                                    </span>
                                </div>
                                <div class="ml-auto">
                                    <div class="tetx-right">
                                        <h5 class="text-muted m-b-0">
                                            11
                                        </h5>
                                        <span class="text-muted font-16">
                                            Jan
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex no-block card-body border-top">
                                <i class="fa fa-plus w-30px m-t-5">
                                </i>
                                <div>
                                    <a class="m-b-0 font-medium p-0" href="#">
                                        Maruti is a Responsive
                                        Admin theme
                                    </a>
                                    <span class="text-muted">
                                        But already everything was solved. It will
                                        ...
                                    </span>
                                </div>
                                <div class="ml-auto">
                                    <div class="tetx-right">
                                        <h5 class="text-muted m-b-0">
                                            19
                                        </h5>
                                        <span class="text-muted font-16">
                                            Jan
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex no-block card-body border-top">
                                <i class="fa fa-leaf w-30px m-t-5">
                                </i>
                                <div>
                                    <a class="m-b-0 font-medium p-0" href="#">
                                        Envato approved Maruti
                                        Admin template
                                    </a>
                                    <span class="text-muted">
                                        i am very happy to approved by TF
                                    </span>
                                </div>
                                <div class="ml-auto">
                                    <div class="tetx-right">
                                        <h5 class="text-muted m-b-0">
                                            20
                                        </h5>
                                        <span class="text-muted font-16">
                                            Jan
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex no-block card-body border-top">
                                <i class="fa fa-question-circle w-30px m-t-5">
                                </i>
                                <div>
                                    <a class="m-b-0 font-medium p-0" href="#">
                                        I am alwayse here if you
                                        have any question
                                    </a>
                                    <span class="text-muted">
                                        we glad that you choose our
                                        template
                                    </span>
                                </div>
                                <div class="ml-auto">
                                    <div class="tetx-right">
                                        <h5 class="text-muted m-b-0">
                                            15
                                        </h5>
                                        <span class="text-muted font-16">
                                            Jan
                                        </span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- column -->
                <div class="col-lg-6">
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                Chat Option
                            </h4>
                            <div class="chat-box scrollable" style="height:475px;">
                                <!--chat Row -->
                                <ul class="chat-list">
                                    <!--chat Row -->
                                    <li class="chat-item">
                                        <div class="chat-img">
                                            <img alt="user" src="assets/images/users/1.jpg" />
                                        </div>
                                        <div class="chat-content">
                                            <h6 class="font-medium">
                                                James Anderson
                                            </h6>
                                            <div class="box bg-light-info">
                                                Lorem Ipsum is simply dummy
                                                text of the printing &amp; type setting industry.
                                            </div>
                                        </div>
                                        <div class="chat-time">
                                            10:56 am
                                        </div>
                                    </li>
                                    <!--chat Row -->
                                    <li class="chat-item">
                                        <div class="chat-img">
                                            <img alt="user" src="assets/images/users/2.jpg" />
                                        </div>
                                        <div class="chat-content">
                                            <h6 class="font-medium">
                                                Bianca Doe
                                            </h6>
                                            <div class="box bg-light-info">
                                                It’s Great opportunity to
                                                work.
                                            </div>
                                        </div>
                                        <div class="chat-time">
                                            10:57 am
                                        </div>
                                    </li>
                                    <!--chat Row -->
                                    <li class="odd chat-item">
                                        <div class="chat-content">
                                            <div class="box bg-light-inverse">
                                                I would love to join the
                                                team.
                                            </div>
                                            <br />
                                        </div>
                                    </li>
                                    <!--chat Row -->
                                    <li class="odd chat-item">
                                        <div class="chat-content">
                                            <div class="box bg-light-inverse">
                                                Whats budget of the new
                                                project.
                                            </div>
                                            <br />
                                        </div>
                                        <div class="chat-time">
                                            10:59 am
                                        </div>
                                    </li>
                                    <!--chat Row -->
                                    <li class="chat-item">
                                        <div class="chat-img">
                                            <img alt="user" src="assets/images/users/3.jpg" />
                                        </div>
                                        <div class="chat-content">
                                            <h6 class="font-medium">
                                                Angelina Rhodes
                                            </h6>
                                            <div class="box bg-light-info">
                                                Well we have good budget for
                                                the project
                                            </div>
                                        </div>
                                        <div class="chat-time">
                                            11:00 am
                                        </div>
                                    </li>
                                    <!--chat Row -->
                                </ul>
                            </div>
                        </div>
                        <div class="card-body border-top">
                            <div class="row">
                                <div class="col-9">
                                    <div class="input-field m-t-0 m-b-0">
                                        <textarea class="form-control border-0" id="textarea1" placeholder="Type and enter"></textarea>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <a class="btn-circle btn-lg btn-cyan float-right text-white"
                                        href="javascript:void(0)">
                                        <i class="fas fa-paper-plane">
                                        </i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- card -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                Our partner (Box with Fix height)
                            </h4>
                        </div>
                        <div class="comment-widgets scrollable" style="max-height: 130px;">
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row m-t-0">
                                <div class="p-2">
                                    <img alt="user" class="rounded-circle" src="assets/images/users/1.jpg"
                                        width="50" />
                                </div>
                                <div class="comment-text w-100">
                                    <h6 class="font-medium">
                                        James Anderson
                                    </h6>
                                    <span class="m-b-15 d-block">
                                        Lorem Ipsum is simply dummy text of
                                        the printing and type setting industry.
                                    </span>
                                    <div class="comment-footer">
                                        <span class="text-muted float-right">
                                            April 14, 2016
                                        </span>
                                        <button class="btn btn-cyan btn-sm" type="button">
                                            Edit
                                        </button>
                                        <button class="btn btn-success btn sm" type="button">
                                            Publish
                                        </button>
                                        <button class="btn btn-danger btn sm" type="button">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row">
                                <div class="p-2">
                                    <img alt="user" class="rounded-circle" src="assets/images/users/4.jpg"
                                        width="50" />
                                </div>
                                <div class="comment-text active w-100">
                                    <h6 class="font-medium">
                                        Michael Jorden
                                    </h6>
                                    <span class="m-b-15 d-block">
                                        Lorem Ipsum is simply dummy text of
                                        the printing and type setting industry.
                                    </span>
                                    <div class="comment-footer">
                                        <span class="text-muted float-right">
                                            May 10, 2016
                                        </span>
                                        <button class="btn btn-cyan btn-sm" type="button">
                                            Edit
                                        </button>
                                        <button class="btn btn-success btn sm" type="button">
                                            Publish
                                        </button>
                                        <button class="btn btn-danger btn sm" type="button">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row">
                                <div class="p-2">
                                    <img alt="user" class="rounded-circle" src="assets/images/users/5.jpg"
                                        width="50" />
                                </div>
                                <div class="comment-text w-100">
                                    <h6 class="font-medium">
                                        Johnathan Doeting
                                    </h6>
                                    <span class="m-b-15 d-block">
                                        Lorem Ipsum is simply dummy text of
                                        the printing and type setting industry.
                                    </span>
                                    <div class="comment-footer">
                                        <span class="text-muted float-right">
                                            August 1, 2016
                                        </span>
                                        <button class="btn btn-cyan btn-sm" type="button">
                                            Edit
                                        </button>
                                        <button class="btn btn-success btn sm" type="button">
                                            Publish
                                        </button>
                                        <button class="btn btn-danger btn sm" type="button">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- accoridan part -->
                    <div class="accordion" id="accordionExample">
                        <div class="card m-b-0">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <a aria="" aria-controls="collapseOne" data-target="#collapseOne"
                                        data-toggle="collapse" expanded="true">
                                        <i aria-hidden="true" class="m-r-5 fa fa-magnet">
                                        </i>
                                        <span>
                                            Accordion Example 1
                                        </span>
                                    </a>
                                </h5>
                            </div>
                            <div aria-labelledby="headingOne" class="collapse show" data-parent="#accordionExample"
                                id="collapseOne">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                    terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                    brunch.
                                    Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a
                                    bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
                                    helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan
                                    excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim
                                    aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable
                                    VHS.
                                </div>
                            </div>
                        </div>
                        <div class="card m-b-0 border-top">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <a aria-controls="collapseTwo" aria-expanded="false" class="collapsed"
                                        data-target="#collapseTwo" data-toggle="collapse">
                                        <i aria-hidden="true" class="m-r-5 fa fa-magnet">
                                        </i>
                                        <span>
                                            Accordion Example 2
                                        </span>
                                    </a>
                                </h5>
                            </div>
                            <div aria-labelledby="headingTwo" class="collapse" data="" id="collapseTwo"
                                parent="#accordionExample">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                    terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                    brunch.
                                    Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a
                                    bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
                                    helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan
                                    excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim
                                    aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable
                                    VHS.
                                </div>
                            </div>
                        </div>
                        <div class="card m-b-0 border-top">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <a aria-controls="collapseThree" aria-expanded="false" class="collapsed"
                                        data="" data-toggle="collapse" target="#collapseThree">
                                        <i aria-hidden="true" class="m-r-5 fa fa-magnet">
                                        </i>
                                        <span>
                                            Accordion Example 3
                                        </span>
                                    </a>
                                </h5>
                            </div>
                            <div aria-labelledby="headingThree" class="collapse" data-parent="#accordionExample"
                                id="collapseThree">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                    terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                    brunch.
                                    Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a
                                    bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
                                    helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan
                                    excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim
                                    aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable
                                    VHS.
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- toggle part -->
                    <div id="accordian-4">
                        <div class="card m-t-30">
                            <a aria-controls="Toggle-1" aria-expanded="true" class="card-header link"
                                data-parent="#accordian
4" data-toggle="collapse" href="#Toggle-1">
                                <i aria-hidden="true" class="seticon fa fa-arrow-right">
                                </i>
                                <span>
                                    Toggle, Open by default
                                </span>
                            </a>
                            <div class="collapse show multi-collapse" id="Toggle-1">
                                <div class="card-body widget-content">
                                    This box is opened by default, paragraphs and is full of waffle to
                                    pad out the comment. Usually, you just wish these sorts of comments would come to an
                                    end.
                                </div>
                            </div>
                            <a aria-controls="Toggle-2" aria-expanded="false" class="card-header link border-top"
                                data="" data-toggle="collapse" href="#Toggle-2" parent="#accordian-4">
                                <i aria-hidden="true" class="seticon fa fa-times">
                                </i>
                                <span>
                                    Toggle, Closed by default
                                </span>
                            </a>
                            <div class="multi-collapse collapse" id="Toggle-2" style="">
                                <div class="card-body widget-content">
                                    This box is now open
                                </div>
                            </div>
                            <a aria-controls="Toggle-3" aria-expanded="false"
                                class="card-header collapsed link border-top" data-parent="#accordian-4"
                                data-toggle="collapse" href="#Toggle-3">
                                <i aria-hidden="true" class="seticon fa fa-times">
                                </i>
                                <span>
                                    Toggle, Closed by default
                                </span>
                            </a>
                            <div class="collapse multi-collapse" id="Toggle-3">
                                <div class="card-body widget-content">
                                    This box is now open
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tabs -->
                    <div class="card">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                                    <span class="hidden-sm-up">
                                    </span>
                                    <span class="hidden-xs down">
                                        Tab1
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#profile" role="tab">
                                    <span class="hidden-sm-up">
                                    </span>
                                    <span class="hidden-xs-down">
                                        Tab2
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#messages" role="tab">
                                    <span class="hidden-sm-up">
                                    </span>
                                    <span class="hidden-xs down">
                                        Tab3
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content tabcontent-border">
                            <div class="tab-pane active" id="home" role="tabpanel">
                                <div class="p-20">
                                    <p>
                                        And is full of waffle to It has multiple paragraphs and is full
                                        of waffle to pad out the comment. Usually, you just wish these sorts of comments
                                        would come
                                        to an end.multiple paragraphs and is full of waffle to pad out the comment..
                                    </p>
                                    <img class="img-fluid" src="assets/images/background/img4.jpg" />
                                </div>
                            </div>
                            <div class="tab-pane p-20" id="profile" role="tabpanel">
                                <div class="p-20">
                                    <img class="img-fluid" src="assets/images/background/img4.jpg" />
                                    <p class="m-t-10">
                                        And is full of waffle to It has multiple
                                        paragraphs and is full of waffle to pad out the comment. Usually, you just wish
                                        these sorts
                                        of comments would come to an end.multiple paragraphs and is full of waffle to pad
                                        out the
                                        comment..
                                    </p>
                                </div>
                            </div>
                            <div class="tab-pane p-20" id="messages" role="tabpanel">
                                <div class="p-20">
                                    <p>
                                        And is full of waffle to It has multiple paragraphs and is full
                                        of waffle to pad out the comment. Usually, you just wish these sorts of comments
                                        would come
                                        to an end.multiple paragraphs and is full of waffle to pad out the comment..
                                    </p>
                                    <img class="img-fluid" src="assets/images/background/img4.jpg" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div> <!-- contentAkhir -->
@endsection
