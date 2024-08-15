<div>
    <div class="d-flex justify-content-end mb-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#documentModal">
            <span><i class="bi bi-plus me-1 fs-5"></i></span>
            <span>Tambah Data</span>
        </button>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            @if (session()->has('message'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 2500)" class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Tahun</th>
                            <th>Pengirim</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($documents as $document)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $document->no }}</td>
                                <td>{{ $document->title }}</td>
                                <td>{{ $document->desc }}</td>
                                <td>{{ $document->year }}</td>
                                <td>{{ $document->sender }}</td>
                                <td>
                                    <div
                                        class="btn
                                        @if ($document->status == 'rusak') btn-danger
                                        @elseif ($document->status == 'hilang') btn-info 
                                        @elseif ($document->status == 'musnah') btn-warning
                                        @else btn-primary @endif">
                                        {{ $document->status }}
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-warning" wire:click="edit({{ $document->id }})"
                                            data-bs-toggle="modal" data-bs-target="#documentModal">Edit</button>
                                        <button class="btn btn-danger"
                                            wire:click="delete({{ $document->id }})">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">No data available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $documents->links() }}
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div wire:ignore.self class="modal fade" id="documentModal" tabindex="-1" aria-labelledby="documentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}">
                        <div wire:loading wire:target="{{ $updateMode ? 'update' : 'store' }}">Loading...</div>
                        <div class="mt-2">
                            <label class="fw-bold form-label">Judul</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                wire:model="title">
                            @error('title')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label class="fw-bold form-label">Deskripsi</label>
                            <textarea class="form-control @error('desc') is-invalid @enderror" wire:model="desc"></textarea>
                            @error('desc')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label class="fw-bold form-label">Tahun</label>
                            <input type="number" class="form-control @error('year') is-invalid @enderror"
                                wire:model="year">
                            @error('year')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label class="fw-bold form-label">Pengirim</label>
                            <input type="text" class="form-control @error('sender') is-invalid @enderror"
                                wire:model="sender">
                            @error('sender')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label class="fw-bold form-label">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" wire:model="status">
                                <option value="">-- Pilih Status --</option>
                                <option value="rusak">Rusak</option>
                                <option value="hilang">Hilang</option>
                                <option value="musnah">Musnah</option>
                                <option value="layak">Layak</option>
                            </select>
                            @error('status')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end gap-3 mt-3">
                            <button type="submit" class="btn btn-md btn-primary"
                                data-bs-dismiss="modal">SIMPAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('closeModal', function() {
                var myModal = new bootstrap.Modal(document.getElementById('documentModal'));
                myModal.hide();
            });
        });
    </script>
@endpush
