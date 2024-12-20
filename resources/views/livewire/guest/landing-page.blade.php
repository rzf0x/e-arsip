<div>

    <div class="w-100">
        <div class="d-flex justify-content-center mt-5 mx-5">
            <div>
                <h1 class="mb-2">Cari buku yang kamu butuhkan </h1>

                <input type="text" class="form-control mb-2" wire:model="query" placeholder="Masukkan nama buku">

                <div class="d-flex justify-content-end">
                    <button wire:click="searchBook" class="btn btn-primary">Cari buku</button>
                    @if ($book)
                        <button wire:click="resetBook" class="btn ms-2 btn-primary">Reset Pencarian</button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if ($book)
        @if ($book->isEmpty())
            <div class="text-center mt-5">
                <h2>Hasil Pencarian :</h2>
                <p>Buku yang kamu cari tidak ada </p>
            </div>
        @else
            <h2 class="ms-5 mt-5">Hasil pencarian buku :</h2>
            <div class="row gap-4 mx-5 mt-5">
                @foreach ($book as $item)
                    <div class="card col-lg-2 col-md-6 col-12">
                        <div class="card-content">
                            <img src="{{ asset($item->foto) }}" class="img-thumbnail" alt="singleminded">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mt-1">{{ $item->title_book }}</h5>

                                    <div
                                        class="btn
                                                    @if ($item->status == 'rusak') btn-danger
                                                    @elseif ($item->status == 'hilang') btn-info 
                                                    @elseif ($item->status == 'musnah') btn-warning
                                                    @else btn-primary @endif">
                                        {{ $item->status }}
                                    </div>
                                </div>
                                <p class="card-text mt-2">
                                    Rincian buku :
                                </p>
                                <ul class="">
                                    <li>Tahun terbit : {{ $item->year_publish }}</li>
                                    <li>Publisher buku : {{ $item->book_publisher }}</li>
                                    <li>Rak Lemari : <strong>{{ $item->cupboardNumber->number }}</strong></li>
                                </ul>
                                {{-- </p> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    @else
        <div class="row gap-4 mx-5 mt-5">
            @forelse ($listBook as $item)
                <div class="card col-lg-2 col-md-6 col-12">
                    <div class="card-content">
                        <img src="{{ asset($item->foto) }}" class="card-img-top img-fluid" alt="singleminded">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title mt-1">{{ $item->title_book }}</h5>

                                <div
                                    class="btn
                                                @if ($item->status == 'rusak') btn-danger
                                                @elseif ($item->status == 'hilang') btn-info 
                                                @elseif ($item->status == 'musnah') btn-warning
                                                @else btn-primary @endif">
                                    {{ $item->status }}
                                </div>
                            </div>
                            <p class="card-text mt-2">
                                Rincian buku :
                            </p>
                            <ul class="">
                                <li>Tahun terbit : {{ $item->year_publish }}</li>
                                <li>Publisher buku : {{ $item->book_publisher }}</li>
                                <li>Rak Lemari : <strong>{{ $item->cupboardNumber->number }}</strong></li>
                            </ul>
                            {{-- </p> --}}
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center fs-4">Belum ada buku yang di tambahkan <br> Silahkan tunggu admin untuk upload
                    dulu</p>
            @endforelse
        </div>
    @endif

    {{-- <p>{{ $item->title_book }}</p>
    @endforeach --}}


</div>
