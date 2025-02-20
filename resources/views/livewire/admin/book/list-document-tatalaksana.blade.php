<div>
    <div class="d-flex justify-content-between">
        <button class="btn btn-success">
            <i class="bi bi-file-earmark-text-fill"></i>
            Dokumen Tatalaksana
        </button>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#info">
            <i class="bi bi-plus-circle-fill"></i>
            Tambah Data
        </button>
    </div>
    <div class="card mt-3">
        <div class="card-header">
            <h5 class="text-info">List dokumen tatalaksana</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">No</th>
                            <th class="px-4 py-2">No dokumen</th>
                            <th class="px-4 py-2">Judul dokumen</th>
                            <th class="px-4 py-2">Deskripsi</th>
                            <th class="px-4 py-2">Tahun</th>
                            <th class="px-4 py-2">Pengirim</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($this->getData as $dokumen)
                            <tr>
                                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="border px-4 py-2">{{ $dokumen->no }}</td>
                                <td class="border px-4 py-2">{{ $dokumen->title }}</td>
                                <td class="border px-4 py-2 w-25">
                                    {{ Illuminate\Support\Str::limit($dokumen->desc, 100, '...') }}
                                </td>
                                <td class="border px-4 py-2">{{ $dokumen->year }}</td>
                                <td class="border px-4 py-2">{{ $dokumen->sender }}</td>
                                <td class="border px-4 py-2">
                                    @if ($dokumen->status == 'rusak')
                                        <span class="badge bg-danger">Rusak</span>
                                    @elseif ($dokumen->status == 'musnah')
                                        <span class="badge bg-warning">Musnah</span>
                                    @else
                                        <span class="badge bg-success">Layak</span>
                                    @endif
                                </td>
                                <td class="border px-4 py-2">
                                    <button wire:click="edit({{ $dokumen->id }})" class="btn btn-warning"
                                        data-bs-toggle="modal" data-bs-target="#info">Edit</button>

                                    <button onclick="confirmDelete({{ $dokumen->id }})"
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
                                <td colspan="8" class="text-center">No data available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-between">
                    {{ $this->getData->links() }}
                </div>
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
                                <option value="rusak">Rusak</option>
                                <option value="musnah">Musnah</option>
                                <option value="layak">Layak</option>
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

                        <div class="d-flex justify-content-end gap-3 mt-3">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="button" wire:click.prevent="{{ $editMode ? 'update' : 'store' }}"
                                class="btn btn-md btn-primary" data-bs-dismiss="modal" wire:loading.attr="disabled"
                                wire:target="{{ $editMode ? 'update' : 'store' }}" onclick="showAlert()">
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
