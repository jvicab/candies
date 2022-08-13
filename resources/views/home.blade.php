@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="top-candy-bars">
                    <h1 class="cb-header">{{ __('Top Candy Bars') }}</h1>
                    <div class="card-body">
                        <div class="row items-container">
                            @foreach ($candyBars as $candyBar)
                                <div class="col-sm-4 col-md-3 item-container">
                                    <div class="item-box">
                                        <img src="{{ asset('media/images/'.$candyBar->image) }}" alt="">
                                        <h3 class="item-name">{{  $candyBar->name }}</h3>
                                        <h4 class="item-rating">rating: <span>{{  $candyBar->rating }}</span></h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center">
                            {!! $candyBars->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

