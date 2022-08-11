@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Candy Bars') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('candy_bar_create') }}" type="submit" class="btn btn-success">
                        {{ __('New') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
