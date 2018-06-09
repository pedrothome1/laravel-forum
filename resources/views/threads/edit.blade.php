@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ $thread->path() }}">
                        @method('PATCH')

                        @include('threads.form', ['button' => 'Editar'])
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            @include('layouts.sidebar')
        </div>
    </div>
@endsection
