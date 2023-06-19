@extends('templates.admin')
@section('content')
    <div class="row">
        <div class="col-md-8 col-sm-12 mb-20 col-lg-12">
            <div class="card-box ">
                <div class="col-md-12 d-flex justify-content-center">
                    <div class="pd-20">
                        <form action="{{ route('app.link.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form-group mb-3 row">
                                <label class="col-12  col-form-label"> Destination <span class="text-danger">*</span></label>
                                <div class="col-12 ">
                                    <div class="input-group mb-0">
                                        <input type="text" class="form-control number-input" name="link[destination]"
                                            placeholder="https://example.com/my-long-url" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <div class="col-12 space-bottom">
                                    <div class="row">
                                        <label class="col-12  col-form-label">Title</label>
                                        <div class="col-12">
                                            <input type="text" class="form-control" name="link[title]"
                                                placeholder="Insert Product Name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <div class="col-lg-6 col-md-6 col-sm-12 space-bottom">
                                    <div class="row">
                                        <label class="col-12  col-form-label">Domain</label>
                                        <div class="col-12">
                                            <div class="input-group mb-0">
                                                <input type="text" class="form-control" name=""
                                                    placeholder="shorti.fy" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row">
                                        <label class="col-1  col-form-label"></label>
                                        <label class="col-11  col-form-label">Custom Back Half</label>
                                        <label class="col-1  col-form-label">
                                            <h6>/</h6>
                                        </label>
                                        <div class="col-11">
                                            <input type="text" class="form-control" name="link[shorted]" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 mt-2 d-flex justify-content-end">
                                    <button class="btn btn-primary " type="submit"><i class="bi bi-save"></i>
                                        Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @push('js')
    @endpush
@endsection
