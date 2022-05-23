@extends('layouts.user')
@section('bodyTag')
    id="product-sidebar-left" class="product-grid-sidebar-left"
@endsection
@section('content')
    <div class="main-content">
        <div id="wrapper-site">
            <div id="content-wrapper">
                <div class="container">
                    <div class="row">
                        <h2>O autoru :</h2>
                        <h4>Zovem se Miloš Maravić (broj indeksa: 269/19), student sam Visoke škole strukovnih studija za infromacione i komunikacione tehnologije. Moje veštine i projekte možete videti na sledećem linku.</h4>
                        <div class="col-6 justify-center">
                            <img src="{{asset('img/other/me.jpg')}}" alt="autor" width="400px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
