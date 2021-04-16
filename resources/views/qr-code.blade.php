@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Qr Code') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <input id="text" type="hidden" value="http://jindo.dev.naver.com/collie"
                               style="width:80%"/><br/>

                        <div class="text-center">
                            <div id="qrcode"></div>
                            <a href="{{ route('qr-code.regenerate') }}" class="btn btn-sm btn-success mt-4">Re Generate Qr-Code</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        new QRCode("qrcode", {
            // text: document.getElementById("text").value,
            text: '{{ auth()->user()->qr_code_token }}',
            width: 200,
            height: 200
        });

        // function makeCode() {
        //     let elText = document.getElementById("text");
        //     qrcode.makeCode(elText.value);
        // }
        //
        // makeCode();

    </script>
@endsection
