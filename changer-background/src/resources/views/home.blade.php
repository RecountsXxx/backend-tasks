@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('History') }}</div>

                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            @foreach ($files as $file)
                                <div class="col-md-4 mb-3">
                                    <img src="{{ asset(str_replace('public', 'storage', $file)) }}" class="img-fluid" alt="Image">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
