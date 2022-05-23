<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{route('home')}}" class="brand-link">
        <span class="brand-text font-weight-light">Home</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @foreach($menu as $m)
                <li class="nav-item menu-open">
                    <a href="{{route($m["route"])}}" class="nav-link @if((request()->routeIs($m["route"]))) active @endif">
                        <p>
                            {{$m["name"]}}
                        </p>
                    </a>
                </li>
                @endforeach
            </ul>
        </nav>

    </div>

</aside>
