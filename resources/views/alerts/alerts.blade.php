@if (!empty($errors) && $errors->any())
    <div class="alert alert-danger alert-dismissable">
        <div class="alert-container">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="fa fa-exclamation-triangle pr10"></i>
            @if ($errors->count() == 1)
                {{ $errors->first() }}
            @else
                Errors
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@elseif (session('error'))
    <div class="alert alert-danger alert-dismissable">
        <div class="alert-container">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="fa fa-exclamation-triangle pr10"></i>
            {!! session('error') !!}
        </div>
    </div>
@elseif (session('warning'))
    <div class="alert alert-warning alert-dismissable">
        <div class="alert-container">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="fa fa-warning pr10"></i>
            {!! session('warning') !!}
        </div>
    </div>
@elseif (session('success'))
    <div class="alert alert-success alert-dismissable">
        <div class="alert-container">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="fa fa-check pr10"></i>
            {!! session('success') !!}
        </div>
    </div>
@elseif (session('status'))
    <div class="alert alert-success alert-dismissable">
        <div class="alert-container">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="fa fa-check pr10"></i>
            {!! session('status') !!}
        </div>
    </div>
@elseif (session('info'))
    <div class="alert alert-info alert-dismissable">
        <div class="alert-container">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="fa fa-info-circle pr10"></i>
            {!! session('info') !!}
        </div>
    </div>
@endif
