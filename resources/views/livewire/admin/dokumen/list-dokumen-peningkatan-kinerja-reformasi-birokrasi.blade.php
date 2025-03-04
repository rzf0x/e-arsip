<div>

    @if ($selectedYear)
        <div class="alert alert-info">
            Hanya memunculkan data untuk tahun {{ $selectedYear }} saja.
        </div>
    @endif

    <div class="d-flex justify-content-end mb-3" data-bs-toggle="modal" data-bs-target="#info">
        <button class="btn btn-success">
            📄 Tambah Data
        </button>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="mb-3 d-flex align-items-center">
                <input type="text" wire:model="search" class="form-control me-2" placeholder="Search..." />

                <select wire:model="selectedYear" class="form-select ms-3 me-3" aria-label="Select Year">
                    <option value="">Select Year</option>
                    @foreach ($this->getYear() as $year)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endforeach
                </select>

                <button wire:click="loadDocuments" class="btn btn-primary">Search</button>
                @if ($search || $selectedYear)
                    <button wire:click="resetSearch" class="btn btn-secondary ms-2">Reset</button>
                @endif
            </div>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        {{-- <th wire:click="sortBy('id')" style="cursor: pointer;">
                            ID
                            @if ($sortField === 'id')
                                <span class="ms-1">{{ $sortDirection === 'asc' ? '▲' : '▼' }}</span>
                            @endif
                        </th> --}}
                        <th wire:click="sortBy('no')" style="cursor: pointer;">No</th>
                        <th wire:click="sortBy('title')" style="cursor: pointer;">Title</th>
                        <th wire:click="sortBy('desc')" style="cursor: pointer;">Description</th>
                        <th wire:click="sortBy('year')" style="cursor: pointer;">Year</th>
                        <th wire:click="sortBy('sender')" style="cursor: pointer;">Sender</th>
                        <th wire:click="sortBy('status')" style="cursor: pointer;">Status</th>
                        <th>File</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($documents as $document)
                        <tr>
                            <td>{{ $document->no }}</td>
                            <td>{{ $document->title }}</td>
                            <td>{{ $document->desc }}</td>
                            <td>{{ $document->year }}</td>
                            <td>{{ $document->sender }}</td>
                            <td>
                                @if ($document->status === 'aktif')
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-danger">Inaktif</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ asset('storage/' . $document->file) }}" target="_blank"
                                    class="btn btn-info">Lihat</a>
                            </td>
                            <td>
                                <button wire:click="edit({{ $document->id }})" class="btn btn-warning"
                                    data-bs-toggle="modal" data-bs-target="#info">Edit</button>

                                <button onclick="confirmDelete({{ $document->id }})"
                                    class="btn btn-danger">Hapus</button>
                                <script>
                                    function confirmDelete(id) {
                                        Swal.fire({
                                            title: 'Apakah Anda yakin?',
                                            text: "Data ini akan dihapus!",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#d33',
                                            cancelButtonColor: '#3085d6',
                                            confirmButtonText: 'Ya, hapus!',
                                            cancelButtonText: 'Batal'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                @this.delete(id);
                                                Swal.fire(
                                                    'Dihapus!',
                                                    'Data telah dihapus.',
                                                    'success'
                                                );
                                            }
                                        });
                                    }
                                </script>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Dokumen tidak ada.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination Links -->
            <div class="mt-3">
                {{ $documents->links() }}
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal modal-xl fade text-left" id="info" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel130" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-info">Halaman input data dokumen</h5>
                </div>
                <div class="modal-body">
                    <form class="row">
                        <div class="col-lg-6 col-12 mt-3">
                            <label class="fw-bold">Judul Dokumen</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                wire:model="title">
                            @error('title')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-lg-6 col-12 mt-3">
                            <label class="fw-bold">Tahun Dokumen</label>
                            <input type="number" class="form-control @error('year') is-invalid @enderror"
                                wire:model="year">
                            <small class="mt-1">*Gunakan format tahun 2020</small>
                            @error('year')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-lg-6 col-12 mt-3">
                            <label class="fw-bold">Pengirim Dokumen</label>
                            <input type="text" class="form-control @error('sender') is-invalid @enderror"
                                wire:model="sender">
                            @error('sender')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-lg-6 col-12 mt-3">
                            <label class="fw-bold">Status Dokumen</label>
                            <select id="status" wire:model="status" class="form-select">
                                <option value="">-- Pilih status --</option>
                                <option value="aktif">Aktif</option>
                                <option value="inaktif">Inaktif</option>
                            </select>
                        </div>

                        <div class="col-12 mt-3">
                            <label class="fw-bold">Deskripsi Dokumen</label>
                            <textarea wire:model="desc" id="" cols="20" rows="5"
                                class="form-control @error('desc') is-invalid @enderror">
                            {{ $desc }}
                        </textarea>
                            @error('desc')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-12 mt-3">
                            <label class="fw-bold">Upload File</label>
                            <input type="file" class="form-control @error('file') is-invalid @enderror"
                                wire:model="file">
                            @error('file')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end gap-3 mt-3">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="button" wire:click.prevent="{{ $editMode ? 'update' : 'store' }}"
                                class="btn btn-md btn-primary" data-bs-dismiss="modal" wire:loading.attr="disabled"
                                wire:target="file" onclick="showAlert()">
                                {{ $editMode ? 'Update' : 'Simpan' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function showAlert() {
            // Menunggu Livewire untuk menyelesaikan aksi
            Livewire.on('actionCompleted', (message) => {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: message,
                    confirmButtonText: 'OK'
                });
            });
        }
    </script>

</div>
