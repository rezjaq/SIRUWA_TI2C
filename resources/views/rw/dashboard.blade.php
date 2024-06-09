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
                                    <option value="bansos">Sebaran Penerima Bansos</option>
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
        #chart-container, #pie-chart-container {
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
            let chart, pieChart;

            function fetchData(dataType) {
                let url;
                if (dataType === 'warga') {
                    url = '{{ route('rw.wargaSpread') }}';
                } else if (dataType === 'warga-pindahan') {
                    url = '{{ route('rw.wargaPindahanSpread') }}';
                } else if (dataType === 'bansos') {
                    url = '{{ route('rw.bansosSpread') }}';
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
                                      'Diagram Penyebaran Penerima Bansos per RT'
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

    // Initial fetch untuk chart batang
    fetchData(dataTypeSelector.value);

    // Initial fetch untuk chart pie
    fetchPieData(pieDataTypeSelector.value);

    // Fetch data pada perubahan pilihan
    dataTypeSelector.addEventListener('change', function() {
        fetchData(this.value);
    });

    pieDataTypeSelector.addEventListener('change', function() {
        fetchPieData(this.value);
    });
});
</script>
@endpush
