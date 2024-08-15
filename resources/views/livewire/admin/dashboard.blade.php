<div>
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                            <div class="stats-icon purple mb-2 d-flex align-items-center">
                                <span>
                                    <i class="bi bi-book-fill"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Total Buku</h6>
                            <h6 class="font-extrabold mb-0">{{ $total_buku }} Buku</h6>
                        </div>
                    </div>

                    <hr style="margin-bottom: -1px !important;">

                    <div class="row">
                        <div class="col-lg-3 col-6 mt-3 d-flex justify-content-center flex-column">
                            <p class="text-center" style="margin-bottom: 2px !important;">{{ $total_buku_rusak }} book
                            </p>
                            <div class="badge bg-info">rusak</div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3 d-flex justify-content-center flex-column">
                            <p class="text-center" style="margin-bottom: 2px !important;">{{ $total_buku_hilang }} book
                            </p>
                            <div class="badge bg-warning">hilang</div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3 d-flex justify-content-center flex-column">
                            <p class="text-center" style="margin-bottom: 2px !important;">{{ $total_buku_musnah }} book
                            </p>
                            <div class="badge bg-danger">musnah</div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3 d-flex justify-content-center flex-column">
                            <p class="text-center" style="margin-bottom: 2px !important;">{{ $total_buku_layak }} book
                            </p>
                            <div class="badge bg-primary">layak</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                            <div class="stats-icon purple mb-2 d-flex align-items-center">
                                <span>
                                    <i class="bi bi-archive-fill"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Total Dokumen</h6>
                            <h6 class="font-extrabold mb-0">{{ $total_document }} dokumen</h6>
                        </div>
                    </div>

                    <hr style="margin-bottom: -1px !important;">

                    <div class="row">
                        <div class="col-lg-3 col-6 mt-3 d-flex justify-content-center flex-column">
                            <p class="text-center" style="margin-bottom: 2px !important;">{{ $total_document_rusak }}
                                doc
                            </p>
                            <div class="badge bg-info">rusak</div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3 d-flex justify-content-center flex-column">
                            <p class="text-center" style="margin-bottom: 2px !important;">{{ $total_document_hilang }}
                                doc
                            </p>
                            <div class="badge bg-warning">hilang</div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3 d-flex justify-content-center flex-column">
                            <p class="text-center" style="margin-bottom: 2px !important;">{{ $total_document_musnah }}
                                doc
                            </p>
                            <div class="badge bg-danger">musnah</div>
                        </div>
                        <div class="col-lg-3 col-6 mt-3 d-flex justify-content-center flex-column">
                            <p class="text-center" style="margin-bottom: 2px !important;">{{ $total_document_layak }}
                                doc
                            </p>
                            <div class="badge bg-primary">layak</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                            <div class="stats-icon purple mb-2 d-flex align-items-center">
                                <span>
                                    <i class="bi bi-collection-fill"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Total Lemari Rak Buku</h6>
                            <h6 class="font-extrabold mb-0">{{ $total_lemari }} Rak buku</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
