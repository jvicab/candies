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
                        <i class="fa fa-plus me-1"></i>
                        {{ __('New') }}
                    </a>

                    <table class="table table-bordered list-table">
                        <thead>
                        <tr class="table-primary">
                            <th scope="col" class="td-image">Image</th>
                            <th scope="col" class="">Name</th>
                            <th scope="col" class="td-rating">Rating</th>
                            <th scope="col" class="td-actions">Actions</th>
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
                                <td class="td-actions">
                                    <a href="{{ route('candy_bar_edit', ['candy_bar' => $candyBar->id]) }}" class="btn btn-info me-1" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="javascript:" class="action-delete btn btn-danger" data-url="{{ route('candy_bar_delete', ['candy_bar' => $candyBar->id]) }}" title="Delete"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center cb-paginator">
                        {!! $candyBars->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form id="delete_form" action="#" method="POST" class="d-none">
        @csrf
        {{ method_field('DELETE') }}
    </form>
</div>
@endsection
