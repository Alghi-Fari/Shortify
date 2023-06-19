@extends('templates.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 mb-20">
            <div class="card-box mb-30">
                <div class="pd-20">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>

    @include('components.modal')

    @push('js')
        {{ $dataTable->scripts() }}
        <script>
            async function copyText(text) {
                try {
                    await navigator.clipboard.writeText(text);
                    swal({
                        text: 'Text copied to clipboard',
                        type: 'success',
                    })
                } catch (err) {
                    swal({
                        text: 'Text failed copied to clipboard',
                        type: 'error',
                    })
                }
            }
        </script>
    @endpush
@endsection
