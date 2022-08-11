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

                    <form id="candy_bar_create_form" action="{{ route('candy_bar_store') }}" method="POST" class="">
                        @csrf

                        <div class="row">
                            <div class="col-sm-6">

                                <div id="dropzone_id_image" class="dropzone field dropzone-250x250"
                                     data-image="{{ !empty($candyBar->image) ? asset('public/candy_bars').$candyBar->image : '' }}"
                                     data-id="image"
                                     data-old-image-name="{{ !empty($candyBar->old_image) ? asset('public/candy_bars').$candyBar->old_image : '' }}"
                                     data-required="true"
                                     data-model_name="{{ \App\Models\CandyBar::class }}"
                                     data-field_name="image"
                                     data-path="{{ $path }}"
                                     data-width="500"
                                     data-height="500"
                                     data-originalsize="false"
                                     data-resize="true"
                                     data-url="{{ route($params['upload_route'] ?? 'ajax_upload_image') }}"
                                     data-removeurl="{{ route($params['remove_route'] ?? 'ajax_delete_image') }}"
                                     data-token="{{ csrf_token() }}">
                                    <input class="dropzone-input-file" type="file" name="file_name_image" id="file_id_image" required="required" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('email') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            {{ __('Save') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
