<div>

    {{-- CTA --}}
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
                            <th class="px-4 py-2">No</th>
                            <th class="px-4 py-2">No Book</th>
                            <th class="px-4 py-2">Title</th>
                            <th class="px-4 py-2">Year</th>
                            <th class="px-4 py-2">Publisher</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Photo</th>
                            <th class="px-4 py-2">Cupboard Number</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($listBooks as $book)
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
                                <td class="border px-4 py-2">
                                    <button wire:click="edit({{ $book->id }})" class="btn btn-warning"
                                        data-bs-toggle="modal" data-bs-target="#info">Edit</button>
                                    <button wire:click="delete({{ $book->id }})"
                                        class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">No data available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{ $listBooks->links() }}
            </div>
        </div>
    </div>



    {{-- Modal --}}
    <div class="modal fade text-left" id="info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="d-flex flex-column gap-2">
                        <div class="mb-2">
                            <label class="fw-bold">Nama Buku</label>
                            <input type="text" class="form-control @error('title_book') is-invalid @enderror"
                                wire:model="title_book">
                            @error('title_book')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="fw-bold">Tahun Publish</label>
                            <input type="number" class="form-control @error('year_publish') is-invalid @enderror"
                                wire:model="year_publish">
                            @error('year_publish')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="fw-bold">Publisher Buku</label>
                            <input type="text" class="form-control @error('book_publisher') is-invalid @enderror"
                                wire:model="book_publisher">
                            @error('book_publisher')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="fw-bold">Status Buku</label>
                            <select id="status" wire:model="status" class="form-select">
                                <option value="">-- Pilih status --</option>
                                <option value="rusak">Rusak</option>
                                <option value="hilang">Hilang</option>
                                <option value="musnah">Musnah</option>
                                <option value="layak">Layak</option>
                            </select>
                        </div>

                        <div class="mb-2">
                            <label class="fw-bold">No Rak Lemari</label>
                            <select id="cupboard_number_id" wire:model="cupboard_number_id" class="form-select">
                                <option value="">-- Pilih lemari --</option>
                                @foreach ($cupboards as $item)
                                    <option value="{{ $item->id }}">{{ $item->number }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-2">
                            <label class="fw-bold">Foto Buku</label>
                            <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                wire:model="foto">

                            @if ($foto instanceof \Illuminate\Http\UploadedFile)
                                <img src="{{ $foto->temporaryUrl() }}" class="w-25">
                            @else
                                <img src="{{ asset('storage/' . $foto) }}" class="w-25">
                            @endif


                            @error('foto')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end gap-3 mt-3">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" wire:click.prevent="store()" class="btn btn-md btn-primary"
                                data-bs-dismiss="modal">{{ $editMode ? 'Update' : 'Simpan' }}</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
