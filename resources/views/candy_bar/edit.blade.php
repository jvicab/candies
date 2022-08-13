@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Candy Bar') }}</div>
                    <div class="card-body">
                        @include('alerts.alerts')
                        <form id="candy_bar_form" action="{{ route('candy_bar_update', ['candy_bar' => $candyBar->id]) }}" method="POST" class="admin-form">
                            @csrf
                            {{ method_field('PATCH') }}
                            <input id="image" name="image" type="hidden" value="{{ $candyBar->image ?? null }}">
                            <input id="old_image" name="old_image" type="hidden" value="{{ $candyBar->image ?? null }}">
                            @include('candy_bar._form_body')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
