    <div class="row mt-4 d-flex align-items-center flex-wrap justify-content-center">
        <div class="col-md-6">
            <div class="card-box mb-30 shadow">
                <div class="pd-20">
                    <form action="{{ route('app.link.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <img src="{{ asset('assets/images/Logo2.png') }}" alt="Foto Logo"/>
                        {{-- <img src="{{asset('storage/image/Logo2.png')}}" alt="Logo"> --}}
                        <br>
                        <h3 class="text-center mt-4 mb-4">"Link Simpler, Reach Faster"</h3>
                        <div class="input-group mb-3 h-100">
                            <input type="text" class="form-control rounded-start-pill text-center" placeholder="https://example.com/my-long-url" aria-label="Example text with button addon" aria-describedby="button-addon1" required name="link[destination]">
                            <button type="submit" class="btn btn-info rounded-start rounded-5" type="button" id="button-addon1">Shorten</button>
                        </div>
                        <div class="input-group mb-3 h-100">
                            <button class="btn btn-success rounded-end rounded-5" type="button" id="button-addon1">Copy</button>
                            <input type="text" class="form-control rounded-end-pill text-center" placeholder="Shortened link shown here" aria-label="Example text with button addon" aria-describedby="button-addon1" readonly>
                        </div>
                        {{-- <div class="form-group mb-3 row">
                            <label class="col-12  col-form-label"> Destination <span class="text-danger">*</span></label>
                            <div class="col-12 ">
                                <div class="input-group mb-0">
                                    <input type="text" class="form-control number-input" name="link[destination]"
                                        placeholder="https://example.com/my-long-url" required>
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
                                    Shorten!</button>
                            </div>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>