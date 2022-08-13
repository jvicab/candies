@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Candy Bars') }}</div>
                <div class="card-body">
                    @include('alerts.alerts')

                    <a href="{{ route('candy_bar_create') }}" class="btn btn-success">
                        <i class="fa fa-plus"></i>
                        {{ __('New') }}
                    </a>

                    <table class="table table-bordered list-table">
                        <thead>
                        <tr class="table-success">
                            <th scope="col" class="td-image">Image</th>
                            <th scope="col" class="">Name</th>
                            <th scope="col" class="td-rating">Rating</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($candyBars as $candyBar)
                            <tr scope="row">
                                <td class="td-image">
                                    <img src="{{ asset('media/images/'.$candyBar->image) }}" alt="">
                                </td>
                                <td>{{ $candyBar->name }}</td>
                                <td class="td-rating">{{ $candyBar->rating }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {!! $candyBars->links() !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
