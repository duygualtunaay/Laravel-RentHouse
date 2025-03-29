<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-toggle">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>

        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">


                <li class="nav-item">
                    @auth
                    <a class="nav-link" href="#pablo"><i class="now-ui-icons users_single-02"></i>{{Auth::user()->name}}</a>
                </li>
                <li>

                        <a href="{{route('admin_logout')}}"><i class="now-ui-icons media-1_button-power"></i></a>
                    @endauth
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="panel-header panel-header-lg" style="height: 30px">

</div>
