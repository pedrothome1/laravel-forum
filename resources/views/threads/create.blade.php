@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card border-0">
                <div class="card-header custom-card-header text-white bg-primary">
                    <i class="fa fa-commenting fa-lg"></i> Novo tópico
                </div>

                <div class="card-body">
                    <form method="POST" action="/threads">
                        @include('threads.form', ['button' => 'Publicar'])
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            @include('layouts.sidebar')
        </div>
    </div>
@endsection
