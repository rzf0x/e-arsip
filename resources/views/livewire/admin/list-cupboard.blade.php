<div>
    <div class="d-flex justify-content-end">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#info">
            <span>
                <i class="bi bi-plus me-1 fs-5"></i>
            </span>
            <span>Tambah Data</span>
        </button>
    </div>

    <div class="card mt-3">
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
                            <th>No</th>
                            <th>Nama Lemari</th>
                            <th>Deskripsi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($listRakLemari as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->number }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-warning" wire:click="edit({{ $item->id }})"
                                            data-bs-toggle="modal" data-bs-target="#info">Edit</button>
                                        <button class="btn btn-danger"
                                            wire:click="delete({{ $item->id }})">Delete</button>
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

                {{ $listRakLemari->links() }}
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade text-left" id="info" tabindex="-1" wire:ignore.self role="dialog"
        aria-labelledby="myModalLabel130" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-info">Tambah data lemari</h5>
                </div>
                <div class="modal-body">
                    <form class="d-flex flex-column gap-2"
                        wire:submit.prevent="{{ $rakLemariId ? 'update' : 'store' }}">
                        <div wire:loading wire:target="{{ $rakLemariId ? 'update' : 'store' }}">
                            Loading...
                        </div>

                        <div class="mb-3">
                            <label class="fw-bold">Nama Lemari</label>
                            <input type="text" class="form-control @error('number') is-invalid @enderror"
                                wire:model="number">
                            @error('number')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="fw-bold">Deskripsi</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror"
                                wire:model="description">
                            @error('description')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
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
