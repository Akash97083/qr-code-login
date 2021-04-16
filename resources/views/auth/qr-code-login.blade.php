@extends('layouts.app')

@push('script-link')
    <script type="text/javascript" src="{{ asset('js/qr-code/html5-qrcode.min.js') }}"></script>
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Qr-Code Login') }}</div>

                    <div class="card-body">
                        <div style="width: 500px" id="reader"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        let html5QrcodeScanner = new Html5QrcodeScanner("reader",
            {
                fps: 10,
                qrbox: 250
            }
        );

        function onScanSuccess(qrCodeToken) {
            axios.post('{{ route('qr-code.login') }}', {
                qr_code_token: qrCodeToken
            })
                .then(function (res) {
                    location.href = '{{ route('home') }}'
                })
                .catch(function (err) {
                    alert(err.response.data.message)
                });
        }

        html5QrcodeScanner.render(onScanSuccess);
    </script>
@endsection
