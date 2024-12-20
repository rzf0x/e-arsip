<div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center text-info">Bagian Tatalaksana</h5>
                </div>
                <div class="card-body text-center">
                    <a href="{{ route('list-dokumen-tatalaksana') }}">
                        <button class="btn btn-primary">
                            Klik
                        </button>
                    </a>
                    <br>
                    <br>
                    <small>Total dokumen tersedia {{ $totalDokumentatalaksana }}</small>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center text-info">Bagian Pelayanan Publik</h5>
                </div>
                <div class="card-body text-center">
                    <a href="{{ route('list-dokumen-pelayanan-public') }}">
                        <button class="btn btn-primary">
                            Klik
                        </button>
                    </a>
                    <br>
                    <br>
                    <small>Total dokumen tersedia {{ $totalDokumenPelayananPublic }}</small>
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
                                    <th class="px-4 py-2">No Lemari</th>
                                    <th class="px-4 py-2">Deskripsi Lemari</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($this->listCupBoard as $lemari)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                        <td class="border px-4 py-2">{{ $lemari->number }}</td>
                                        <td class="border px-4 py-2">{{ $lemari->description }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No data available</td>
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
