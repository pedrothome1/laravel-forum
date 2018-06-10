@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/admin/categories">
                        @include('categories.form', ['button' => 'Criar'])
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            @include('categories.actions')
        </div>
    </div>
@endsection