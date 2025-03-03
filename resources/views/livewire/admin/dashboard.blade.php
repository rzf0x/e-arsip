<div>
    <div class="row">
        {{-- Graphic Chart --}}
        <div class="col-lg-6 col-md-12 col-12 mb-5">
            <div class="card shadow-lg" style="height: 100%;">
                <div class="card-body" style="height: 100%;">
                    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
                    <div id="chart" style="height: 75vh;"></div>

                    <script>
                        var options = {
                            series: [{
                                name: "Total Dokumen",
                                data: @json($pendapatanBulanan) // Menggunakan data dari database
                            }],
                            chart: {
                                type: 'bar',
                                height: '100%' // Mengatur tinggi chart ke 100% dari elemen induk
                            },
                            plotOptions: {
                                bar: {
                                    columnWidth: '50%',
                                    distributed: true
                                }
                            },
                            xaxis: {
                                categories: @json($years), // Menggunakan tahun yang diambil dari database
                                labels: {
                                    style: {
                                        fontSize: '14px'
                                    }
                                }
                            },
                            title: {
                                text: "Total Dokumen Pertahun",
                                align: "center"
                            }
                        };

                        var chart = new ApexCharts(document.querySelector("#chart"), options);
                        chart.render();
                    </script>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-12">
            <div class="row">
                <div class="col-lg-6">
                    <x-card title="Sub Bag Tatalaksana dan Pelayanan Publik"
                        route="{{ route('list-dokumen-tatalaksana-pelayanan-publik') }}"
                        buttonText="📂 Klik untuk melihat detail"
                        footerText="📑 Total jumlah dokumen tersedia : {{ $totalDokumentatalaksanaPelayananPublik }}" />

                </div>
                <div class="col-lg-6">
                    <x-card title="Sub Bag Peningkanan Kinerja dan Reformasi Birokrasi"
                        route="{{ route('list-dokumen-peningkatan-kinerja-reformasi-birokrasi') }}"
                        buttonText="📂 Klik untuk melihat detail"
                        footerText="📑 Total jumlah dokumen tersedia : {{ $totalDokumenPeningkatanKinerjaReformasiBirokrasi }}" />

                </div>
                <div class="col-lg-6">
                    <x-card title="Sub Bag Kelembagaan dan Anjab" route="{{ route('list-dokumen-kelembagaan-anjab') }}"
                        buttonText="📂 Klik untuk melihat detail"
                        footerText="📑 Total jumlah dokumen tersedia : {{ $totalDokumenKelembagaanAnjab }}" />

                </div>

                <div class="col-lg-6">
                    <x-card title="Data Inovasi Pelayanan publik"
                        route="{{ route('list-dokumen-data-inovasi-pelayanan-publik') }}"
                        buttonText="📂 Klik untuk melihat detail"
                        footerText="📑 Total jumlah dokumen tersedia : {{ $totalDokumenInovasiPelayananPublik }}" />

                </div>

                <div class="col-lg-12">
                    <x-card title="Jumlah Lemari" route="{{ route('list-lemari') }}"
                        buttonText="📂 Klik untuk melihat detail"
                        footerText="📑 Total jumlah dokumen tersedia : {{ $totalLemari }}" />

                </div>

            </div>
        </div>
    </div>

</div>
