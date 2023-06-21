@extends('templates.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 mb-20">
            <div class="card-box mb-30">
                <div class="pd-20">
                    @if (count($links) !== 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">No</th>
                                    <th scope="col">Link</th>
                                    <th scope="col" width="15%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($links as $link)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td> <a class='text-primary' href='/{{ $link->shorted_link }}'
                                                target="_blank">shorti.fy/{{ $link->shorted_link }}</a>
                                            <br>
                                            <p>{{ $link->created_at }}</p>
                                        </td>
                                        <td>
                                            <a class="btn btn-outline-secondary btn-sm mx-2"
                                                href="{{ route('app.link.edit', $link->id) }}"><i
                                                    class="icon-copy dw dw-pencil text-dark"></i></a>
                                            <a class=" btn btn-outline-secondary btn-sm mx-2" id='deleteModalBtn'
                                                data-url='{{ route('app.link.destroy', $link->id) }}' data-toggle='modal'
                                                data-id='{{ $link->id }}' data-target='#deleteModal_{{ $link->id }}'
                                                style='cursor: pointer;' onClick='handleDelete(this)'><i
                                                    class="icon-copy dw dw-trash text-dark"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="col-12 text-center">
                            <a href="{{ route('home') }}" class="text-primary ">Create a new shorted link!</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class='modal fade' id='deleteModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'
        aria-hidden='true'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Delete</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <form action="" method='POST' id="formDelete">
                    @method('DELETE')
                    @csrf
                    <div class='modal-body'>
                        Are you sure to delete this item?
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                        <button type='submit' class='btn btn-primary'>Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('js')
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

            function handleDelete(target) {
                let formDelete = document.querySelector("#formDelete");
                let deleteModal = document.querySelector("#deleteModal");
                const deleteModalBtn = document.querySelectorAll("#deleteModalBtn");

                deleteModalBtn.forEach((data) => {
                    data.addEventListener("click", function(e) {
                        deleteModal.setAttribute("id", `deleteModal_${data.dataset.id}`);
                        formDelete.setAttribute("action", data.dataset.url);
                    });
                });
            }
        </script>
    @endpush
@endsection
