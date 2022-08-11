@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New Candy Bar') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form id="candy_bar_create_form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
