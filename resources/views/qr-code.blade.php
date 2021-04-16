@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Qr Code') }}</div>

                <div class="card-body">
                    Your qr code
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
