@extends('layouts.app')

@section('content')
    <div class="container py-5 text-center">
        <div class="card mx-auto" style="max-width: 500px; padding: 30px;">
            <h2 class="mb-4 text-success">{{ __('checkout.success_title') }}</h2>
            <p class="mb-4">{{ __('checkout.success_message') }}</p>

            <a href="{{ url('/') }}" class="btn btn-primary">{{ __('checkout.back_home') }}</a>
        </div>
    </div>
@endsection
