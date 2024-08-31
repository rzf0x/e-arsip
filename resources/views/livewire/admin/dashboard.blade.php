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

        <div class="col-lg-3">
            <div class="card">
                <div class="card-body py-4 px-4">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="{{ asset('dist/assets/compiled/jpg/1.jpg') }}" alt="Face 1">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold">{{ Auth::user()->name }}</h5>
                            <h6 class="text-muted mb-0">{{ Auth::user()->email }} </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-header fs-4 fw-semibold text-info">
                    List Buku Terbaru
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success" wire:loading>
                            {{ session('message') }}
                        </div>
                    @endif

                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">No</th>
                                    <th class="px-4 py-2">No Book</th>
                                    <th class="px-4 py-2">Title</th>
                                    <th class="px-4 py-2">Year</th>
                                    <th class="px-4 py-2">Publisher</th>
                                    <th class="px-4 py-2">Status</th>
                                    <th class="px-4 py-2">Photo</th>
                                    <th class="px-4 py-2">Cupboard Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($this->listBook as $book)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $loop->index + 1 }}</td>
                                        <td class="border px-4 py-2">{{ $book->no_book }}</td>
                                        <td class="border px-4 py-2">{{ $book->title_book }}</td>
                                        <td class="border px-4 py-2">{{ $book->year_publish }}</td>
                                        <td class="border px-4 py-2">{{ $book->book_publisher }}</td>
                                        <td class="border px-4 py-2">{{ $book->status }}</td>
                                        <td class="border px-4 py-2">
                                            <img src="{{ asset($book->foto) }}" width="50" height="50"
                                                alt="{{ $book->title_book }}">
                                        </td>
                                        <td class="border px-4 py-2">{{ $book->cupboardNumber->number }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">No data available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-header fs-4 fw-semibold text-info">
                    List Dokumen Terbaru
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success" wire:loading>
                            {{ session('message') }}
                        </div>
                    @endif

                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">No</th>
                                    <th class="px-4 py-2">No Dokumen</th>
                                    <th class="px-4 py-2">Judul</th>
                                    <th class="px-4 py-2">Deskripsi</th>
                                    <th class="px-4 py-2">Tahun</th>
                                    <th class="px-4 py-2">Pengirim</th>
                                    <th class="px-4 py-2">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($this->listDocument as $book)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                        <td class="border px-4 py-2">{{ $book->no }}</td>
                                        <td class="border px-4 py-2">{{ $book->title }}</td>
                                        <td class="border px-4 py-2">{{ $book->desc }}</td>
                                        <td class="border px-4 py-2">{{ $book->year }}</td>
                                        <td class="border px-4 py-2">{{ $book->sender }}</td>
                                        <td class="border px-4 py-2">{{ $book->status }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">No data available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
