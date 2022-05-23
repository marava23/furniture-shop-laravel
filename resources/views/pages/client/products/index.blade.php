@extends ('layouts.user')
@section('bodyTag')
    id="product-sidebar-left" class="product-grid-sidebar-left"
@endsection
@section('content')
    <!-- main content -->
    <div class="main-content">
        <div id="wrapper-site">
            <div id="content-wrapper" class="full-width">
                <div id="main">
                    <div class="page-home">
                        <!-- breadcrumb -->
                        <div class="container">
                            <div class="content">
                                <div class="row">
                                    <div class="sidebar-3 sidebar-collection col-lg-3 col-md-4 col-sm-4">
                                        <div class="products-sort-order dropdown">
                                            <form action="{{route('products.index')}}" method="get">
                                            <div class="sidebar-block">
                                                <div class="title-block">Catalog</div>
                                                <input class="form-control form-control-sm ml-3 mb-3 w-75" name="search" type="text" placeholder="Search"
                                                    @if(isset($qs["search"])) value="{{$qs["search"]}}" @endif   aria-label="Search">
                                                <select name="sort" class="select-title">
                                                    <option value=" ">Sort by</option>
                                                    <option value="name-asc" @if(isset($qs["sort"]) && $qs["sort"] == "name-asc") selected @endif>Name, A to Z</option>
                                                    <option value="name-desc" @if(isset($qs["sort"]) && $qs["sort"] == "name-desc") selected @endif>Name, Z to A</option>
                                                    <option value="price-asc" @if(isset($qs["sort"])  && $qs["sort"] == "price-asc") selected @endif>Price, low to high</option>
                                                    <option value="price-desc" @if(isset($qs["sort"]) && $qs["sort"] == "price-desc") selected @endif>Price, high to low</option>
                                                </select>
                                                <div class="new-item-content">
                                                    <h3 class="title-product">categories</h3>
                                                    <ul class="scroll-product">
                                                        @include('partials.categories')
                                                    </ul>
                                                </div>
                                                <div class="new-item-content">
                                                    <h3 class="title-product">Product tags</h3>
                                                    <ul class="scroll-product">
                                                        @include('partials.tags')
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- best seller -->


                                            <!-- product tag -->
                                                <input type="submit" class="btn btn-secondary"  value="Apply">
                                            </form>
                                        </div>

                                    </div>
                                    <div class="col-sm-8 col-lg-9 col-md-8 product-container">
                                        <div class="js-product-list-top firt nav-top">
                                            <div class="d-flex justify-content-around row mb-4">

                                            </div>
                                        </div>
                                        <div class="tab-content product-items">
                                            <div id="grid" class="related tab-pane fade in active show">
                                                <div class="row">
                                                    @include('partials.products')
                                                </div>
                                            </div>
                                        </div>

                                        <!-- pagination -->
                                        {{$products->links('pagination::bootstrap-4')}}
                                    </div>

                                    <!-- end col-md-9-1 -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
