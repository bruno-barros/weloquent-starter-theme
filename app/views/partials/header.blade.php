<header id="header">

    <div class="container">

        <div class="row">

            <div class="col-sm-4">

                <a href="{{ get_home_url() }}" class="brand" title="w.eloquent">
                    <img src="{{ assets('img/weloquent-o.svg') }}" alt="w.eloquent" class="img-responsive"/>
                </a>

            </div>

            <div class="col-sm-8"></div>

        </div>

    </div>

    <nav class="navbar" role="navigation">
        <div class="container">
            <div class="row">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    {{ Menu::render('primary') }}

                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </nav>


</header>