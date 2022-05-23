
<!DOCTYPE html>
<html lang="en">
<head>
    @include('fixed.admin.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>
    @include('fixed.admin.navigation')    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('Title')</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">

                @yield('content')


            </div>
        </section>

    </div>
    <aside class="control-sidebar control-sidebar-dark">

    </aside>

</div>
@include('fixed.admin.scripts')


</body>
</html>
