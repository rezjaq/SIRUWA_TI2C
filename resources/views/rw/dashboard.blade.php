@extends('template-admin.template')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <select id="data-type-selector" class="form-control w-auto">
                                    <option value="warga">Sebaran Warga</option>
                                    <option value="warga-pindahan">Sebaran Warga Pindahan</option>
                                    <option value="keluarga">Sebaran Keluarga</option>
                                </select>
                            </div>
                            <div id="chart-container"></div>
                            <div id="total-container" class="mt-4">
                                <h5>Total: <span id="total-count">0</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <!-- Tambahkan div baru untuk diagram bar penerima bansos -->
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <select id="bansos-type-selector" class="form-control w-auto">
                                    <option value="penerima">Penerima Bansos</option>
                                    <option value="pengajuan">Pengajuan Bansos</option>
                                    <option value="ditolak">Bansos Ditolak</option>
                                </select>
                            </div>
                            <div id="bansos-chart-container"></div>
                            <div id="bansos-total-container" class="mt-4">
                                <h5>Total: <span id="bansos-total-count">0</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <select id="pie-data-type-selector" class="form-control w-auto">
                                    <option value="gender">Penyebaran Jenis Kelamin</option>
                                    <option value="age">Penyebaran Usia</option>
                                    <option value="marital-status">Penyebaran Status Kawin</option>
                                </select>
                            </div>
                            <div id="pie-chart-container"></div>
                            <div id="pie-total-container" class="mt-4">
                                <h5>Total: <span id="pie-total-count">0</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        #chart-container, #pie-chart-container, #bansos-chart-container {
            width: 100%;
            height: 300px;
        }
    </style>
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dataTypeSelector = document.getElementById('data-type-selector');
            const totalCountElement = document.getElementById('total-count');
            const pieDataTypeSelector = document.getElementById('pie-data-type-selector');
            const pieTotalCountElement = document.getElementById('pie-total-count');
            const bansosTypeSelector = document.getElementById('bansos-type-selector');
            const bansosTotalCountElement = document.getElementById('bansos-total-count');
            let chart, pieChart, bansosChart;

            function fetchData(dataType) {
                let url;
                if (dataType === 'warga') {
                    url = '{{ route('rw.wargaSpread') }}';
                } else if (dataType === 'warga-pindahan') {
                    url = '{{ route('rw.wargaPindahanSpread') }}';
                } else if (dataType === 'keluarga') {
                    url = '{{ route('rw.familySpread') }}';
                }

                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data); // Log data to console for debugging
                        const chartData = data.map(item => item.count);
                        const categories = data.map(item => 'RT ' + item.rt);

                        // Hitung total
                        const totalCount = chartData.reduce((sum, count) => sum + count, 0);

                        // Update total count
                        totalCountElement.textContent = totalCount;

                        // Konfigurasi chart batang
                        const options = {
                            series: [{
                                name: 'Jumlah',
                                data: chartData
                            }],
                            chart: {
                                type: 'bar',
                                height: 300
                            },
                            plotOptions: {
                                bar: {
                                    horizontal: false,
                                }
                            },
                            xaxis: {
                                categories: categories,
                            },
                            title: {
                                text: dataType === 'warga' ? 'Diagram Penyebaran Warga per RT' : 
                                      dataType === 'warga-pindahan' ? 'Diagram Penyebaran Warga Pindahan per RT' :
                                      'Diagram Penyebaran Keluarga per RT'
                            }
                        };

                        // Hapus chart sebelumnya jika ada
                        if (chart) {
                            chart.destroy();
                        }

                        // Render chart batang
                        chart = new ApexCharts(document.querySelector("#chart-container"), options);
                        chart.render();
                    })
                    .catch(error => console.error('Error:', error));
            }

            function fetchPieData(dataType) {
                let url;
                if (dataType === 'gender') {
                    url = '{{ route('rw.genderSpread') }}';
                } else if (dataType === 'age') {
                    url = '{{ route('rw.ageSpread') }}';
                } else if (dataType === 'marital-status') {
                    url = '{{ route('rw.maritalStatusSpread') }}';
                }

                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data); // Log data to console for debugging
                        const chartData = Object.values(data);
                        const categories = Object.keys(data);

                        // Hitung total
                        const totalCount = chartData.reduce((sum, count) => sum + count, 0);

                        // Update total count
                        pieTotalCountElement.textContent = totalCount;

                        // Konfigurasi chart pie
                        const options = {
                            series: chartData,
                            chart: {
                                type: 'pie',
                                height: 300
                            },
                            labels: categories,
                            title: {
                                text: dataType === 'gender' ? 'Diagram Penyebaran Jenis Kelamin' : 
                                      dataType === 'age' ? 'Diagram Penyebaran Usia' :
                                      'Diagram Penyebaran Status Kawin'
                            }
                        };

                        // Hapus chart sebelumnya jika ada
                        if (pieChart) {
                            pieChart.destroy();
                        }

                        // Render chart pie
                        pieChart = new ApexCharts(document.querySelector("#pie-chart-container"), options);
                        pieChart.render();
                    })
                    .catch(error => console.error('Error:', error));
            }

            function fetchBansosData(bansosType) {
                let url;
                if (bansosType === 'penerima') {
                    url = '{{ route('rw.bansosSpread') }}';
                } else if (bansosType === 'pengajuan') {
                    url = '{{ route('rw.bansosSubmissionSpread') }}';
                } else if (bansosType === 'ditolak') {
                    url = '{{ route('rw.bansosRejectedSpread') }}';
                }

                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data); // Log data to console for debugging
                        const chartData = data.map(item => item.count);
                        const categories = data.map(item => 'RT ' + item.rt);

                        // Hitung total
                        const totalCount = chartData.reduce((sum, count) => sum + count, 0);

                        // Update total count
                        bansosTotalCountElement.textContent = totalCount;

                        // Konfigurasi chart batang untuk bansos
                        const options = {
                            series: [{
                                name: bansosType === 'penerima' ? 'Jumlah Penerima Bansos' : 
                                      bansosType === 'pengajuan' ? 'Jumlah Pengajuan Bansos' : 
                                      'Jumlah Bansos Ditolak',
                                data: chartData
                            }],
                            chart: {
                                type: 'bar',
                                height: 300
                            },
                            plotOptions: {
                                bar: {
                                    horizontal: false,
                                }
                            },
                            xaxis: {
                                categories: categories,
                            },
                            title: {
                                text: bansosType === 'penerima' ? 'Diagram Penyebaran Penerima Bansos per RT' : 
                                      bansosType === 'pengajuan' ? 'Diagram Penyebaran Pengajuan Bansos per RT' :
                                      'Diagram Penyebaran Bansos Ditolak per RT'
                            }
                        };

                        // Hapus chart sebelumnya jika ada
                        if (bansosChart) {
                            bansosChart.destroy();
                        }

                        // Render chart batang untuk bansos
                        bansosChart = new ApexCharts(document.querySelector("#bansos-chart-container"), options);
                        bansosChart.render();
                    })
                    .catch(error => console.error('Error:', error));
            }

            // Initial fetch untuk chart batang
            fetchData(dataTypeSelector.value);

            // Initial fetch untuk chart pie
            fetchPieData(pieDataTypeSelector.value);

            // Initial fetch untuk chart bansos
            fetchBansosData(bansosTypeSelector.value);

            // Fetch data pada perubahan pilihan
            dataTypeSelector.addEventListener('change', function() {
                fetchData(this.value);
            });

            pieDataTypeSelector.addEventListener('change', function() {
                fetchPieData(this.value);
            });

            bansosTypeSelector.addEventListener('change', function() {
                fetchBansosData(this.value);
            });
        });
    </script>
@endpush
