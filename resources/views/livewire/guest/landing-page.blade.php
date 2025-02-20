<div class="container mt-5">

    <h2 class="text-center">
        Selamat datang di Sistem Informasi <br> kumpulan arsip bagian organisasi
    </h2>

    <div class="mb-4 mt-5">
        <input type="text" wire:model="searchTerm" placeholder="Cari dokumen..." class="form-control" />
        <button wire:click="searchDocuments" class="btn btn-primary mt-2">Cari</button>
        <button wire:click="resetSearch" class="btn btn-secondary mt-2">Reset</button>
    </div>

    @if ($documents->isNotEmpty())
        <h3>Hasil Pencarian</h3>
        <div class="row">
            @foreach ($documents as $document)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card border-0 shadow-lg rounded-4">

                        <div class="card-body p-4">
                            <div class="d-flex justify-content-end">
                                <small
                                    class="badge bg-primary mb-3">{{ ucfirst(str_replace('_', ' ', $document->tipe_doc)) }}</small>
                            </div>
                            <h5 class="card-title fw-bold text-info">{{ $document->title }}</h5>
                            <p class="card-text mb-2">️#️⃣<strong>No:</strong>
                                {{ $document->no }}</p>
                            <p class="card-text mb-2">📩<strong>Pengirim:</strong>
                                {{ $document->sender }}</p>
                            {{-- <p class="card-text mb-2">📂 <strong>Tipe
                                Dokumen:</strong>
                            
                        </p> --}}
                            <p class="card-text mb-3">🗓️ <strong>Tahun:</strong>
                                {{ $document->year }}</p>
                            <a href="{{ asset($document->file) }}"
                                class="btn btn-primary w-100 d-flex align-items-center justify-content-center"
                                target="_blank">
                                📌Lihat Dokumen
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        @if ($searchTerm)
            <p>Tidak ada dokumen yang ditemukan.</p>
        @else
            <h3>Dokumen Terbaru</h3>
            @if ($latestDocuments->isNotEmpty())
                <div class="row">
                    @foreach ($latestDocuments as $document)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card border-0 shadow-lg rounded-4">

                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-end">
                                        <small
                                            class="badge bg-primary mb-3">{{ ucfirst(str_replace('_', ' ', $document->tipe_doc)) }}</small>
                                    </div>
                                    <h5 class="card-title fw-bold text-info">{{ $document->title }}</h5>
                                    <p class="card-text mb-2">️#️⃣<strong>No:</strong>
                                        {{ $document->no }}</p>
                                    <p class="card-text mb-2">📩<strong>Pengirim:</strong>
                                        {{ $document->sender }}</p>
                                    {{-- <p class="card-text mb-2">📂 <strong>Tipe
                                            Dokumen:</strong>
                                        
                                    </p> --}}
                                    <p class="card-text mb-3">🗓️ <strong>Tahun:</strong>
                                        {{ $document->year }}</p>
                                    <a href="{{ asset($document->file) }}"
                                        class="btn btn-primary w-100 d-flex align-items-center justify-content-center"
                                        target="_blank">
                                        📌Lihat Dokumen
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination Links -->
                {{ $latestDocuments->links() }}
            @else
                <p>Tidak ada dokumen terbaru.</p>
            @endif
        @endif
    @endif
</div>
