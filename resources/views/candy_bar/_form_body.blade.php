<div class="row">
    <div class="col-sm-6">
        <label for="image" class="col-form-label text-md-end">{{ __('Image') }}</label>
        <div>
            <div id="dropzone_id_image" class="dropzone field dropzone-250x250"
                 data-image="{{ !empty($candyBar->image) ? asset('media/images/'.$candyBar->image) : '' }}"
                 data-id="image"
                 data-old-image-name="{{ !empty($candyBar->old_image) ? asset('media/images/'.$candyBar->old_image) : '' }}"
                 data-required="{{ empty($candyBar->image) }}"
                 data-model_name="{{ \App\Models\CandyBar::class }}"
                 data-field_name="image"
                 data-path="'candy_bars/"
                 data-width="500"
                 data-height="500"
                 data-originalsize="false"
                 data-resize="true"
                 data-url="{{ route($params['upload_route'] ?? 'ajax_upload_image') }}"
                 data-removeurl="{{ route($params['remove_route'] ?? 'ajax_delete_image') }}"
                 data-token="{{ csrf_token() }}">
                <input class="dropzone-input-file" type="file" name="file_name_image" id="file_id_image" />
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-8 col-xs-12">
        <label for="name" class="col-form-label text-md-end">{{ __('Name') }}</label>
        <input id="name" type="text" class="form-control @error('email') is-invalid @enderror" name="name" value="{{ $candyBar->name ?? old('name') }}" required autocomplete="name" autofocus>

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-sm-4 col-xs-6">
        <label for="rating" class="col-form-label text-md-end">{{ __('Rating') }}</label>
        <input id="rating" type="text" class="form-control @error('email') is-invalid @enderror" name="rating" value="{{ $candyBar->rating ?? old('rating') }}" required autocomplete="rating" autofocus>

        @error('rating')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="row">
    <div class="col-sm-12 mt-4">
        <button type="submit" class="btn btn-primary">
            {{ __('Save') }}
        </button>
    </div>
</div>

