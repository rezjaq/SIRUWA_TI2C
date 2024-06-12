@extends('template-admin.template')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between" style="background-color: #03774A;">
            <div class="card-header bg-custom text-white">
                <h4 class="mb-0">{{ $page->title }}</h4>
            </div>
        </div>
        <div class="card-body">
            <h5>Selamat datang di Dashboard RT</h5>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-header bg-info text-white">
                            <h5 class="card-title mb-0">Jumlah Warga</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Jumlah warga di RT ini: <span class="fw-bold">{{ $jumlahWarga }}</span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <h5 class="card-title mb-0">Jumlah Keluarga</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Jumlah keluarga di RT ini: <span class="fw-bold">{{ $jumlahKeluarga }}</span></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-header bg-warning text-white">
                            <h5 class="card-title mb-0">Jumlah Warga Pindahan</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Jumlah warga pindahan di RT ini: <span class="fw-bold">{{ $jumlahWargaPindahanMasuk }}</span></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
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
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            border-radius: 15px 15px 0 0;
            background-color: #03774A;
        }

        .card-title {
            color: white;
        }

        .card-footer {
            border-radius: 0 0 15px 15px;
        }

        .btn-secondary {
            background-color: #03774A;
            border-color: #03774A;
            width: 150px;
        }

        .btn-secondary:hover {
            background-color: #026a41;
            border-color: #026a41;
        }

        .table th,
        .table td {
            vertical-align: middle !important;
        }

        .fw-bold {
            color: #03774A;
        }

        .btn-light {
            background-color: #f8f9fa;
            border-color: #f8f9fa;
        }

        .btn-light:hover {
            background-color: #e2e6ea;
            border-color: #dae0e5;
        }

        .modal-header {
            background-color: #03774A;
            color: white;
        }

        .btn-close {
            background-color: white;
        }

        .table-dark th {
            background-color: #03774A;
            color: white;
        }

        .col-lg-8 {
            max-width: 800px;
            width: 100%;
            margin: auto;
        }

        .btn-primary-1 {
            background-color: #03774A;
            border-color: #03774A;
            color: white;
            width: 100%;
        }

        /* Tambahan agar responsif */
        #pie-chart-container {
            max-width: 100%;
            height: auto;
        }
    </style>
@endpush
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const pieDataTypeSelector = document.getElementById('pie-data-type-selector');
            const pieTotalCountElement = document.getElementById('pie-total-count');
            let pieChart;

            function fetchPieData(dataType) {
                let url;
                if (dataType === 'gender') {
                    url = '{{ route('rt.genderSpread') }}';
                } else if (dataType === 'age') {
                    url = '{{ route('rt.ageSpread') }}';
                } else if (dataType === 'marital-status') {
                    url = '{{ route('rt.maritalStatusSpread') }}';
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
                                height: 'auto',
                                width: '100%',
                                responsive: [{
                                    breakpoint: 768,
                                    options: {
                                        chart: {
                                            width: '100%'
                                        },
                                        legend: {
                                            position: 'bottom'
                                        }
                                    }
                                }]
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

            // Initial fetch untuk chart pie
            fetchPieData(pieDataTypeSelector.value);

            // Fetch data pada perubahan pilihan
            pieDataTypeSelector.addEventListener('change', function() {
                fetchPieData(this.value);
            });
        });
    </script>
@endpush
