@extends('layouts.iamovingto')
@section('title', 'IAMOVING to Spain')
@section('description', 'IAMOVING to Spain')
@section('image', 'https://iamoving.com/img/iamoving.png')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Message') }}</div>

                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <p>{{ __('If you need further assistance, please contact our support team.') }}</p>

                    <a href="{{ route('iamovingtospain.index') }}" class="btn btn-primary">
                        {{ __('Return to IAMOVING to Spain Homepage') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection