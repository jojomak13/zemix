@extends('layouts.admin.master')

@section('breadcrumb')
    <li class="breadcrumb-item">Dashboard</li>    
@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.css">
@endsection

@section('content')
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card prod-p-card card-green">
           <div class="card-body">
              <div class="row align-items-center m-b-30">
                 <div class="col">
                    <h6 class="m-b-5 text-white">Total Profit</h6>
                    <h3 class="m-b-0 f-w-700 text-white">@money($monthStats->shipping_fees)</h3>
                 </div>
                 <div class="col-auto">
                    <i class="fas fa-money-bill-alt text-c-green f-18"></i>
                 </div>
              </div>
           </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card prod-p-card card-blue">
            <div class="card-body">
                <div class="row align-items-center m-b-30">
                    <div class="col">
                        <h6 class="m-b-5 text-white">Total Amount</h6>
                        <h3 class="m-b-0 f-w-700 text-white">@money($monthStats->total_amount)</h3>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-database text-c-blue f-18"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card prod-p-card card-yellow">
            <div class="card-body">
                <div class="row align-items-center m-b-30">
                    <div class="col">
                        <h6 class="m-b-5 text-white">Total Transactions</h6>
                        <h3 class="m-b-0 f-w-700 text-white">{{ $monthStats->total_transactions }}</h3>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-cubes text-c-yellow f-18"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card prod-p-card card-red">
            <div class="card-body">
                <div class="row align-items-center m-b-30">
                    <div class="col">
                        <h6 class="m-b-5 text-white">Sellers Fees</h6>
                        <h3 class="m-b-0 f-w-700 text-white">@money($monthStats->seller_fees)</h3>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-money-bill-alt text-c-red f-18"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-12">
        <div class="card prod-p-card">
            <div class="card-body">
                <canvas id="chart"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script>

const ctx = document.getElementById('chart').getContext('2d');
const MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
const config = {
    type: 'line',
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'Total Amount',
            backgroundColor: "#36A2EB",
            borderColor: "#36A2EB",
            data: Array(12),
            fill: false,
        }, {
            label: 'Total Profit',
            fill: false,
            backgroundColor: "#2ED8B6",
            borderColor: "#2ED8B6",
            data: Array(12),
        }, {
            label: 'Seller Fees',
            fill: false,
            backgroundColor: "#FF5370",
            borderColor: "#FF5370",
            data: Array(12),
        }]
    },
    options: {
        responsive: true,
        title: {
            display: true,
            text: `statistics of ${new Date().getFullYear()}`
        },
        tooltips: {
            mode: 'index',
            intersect: false,
        },
        hover: {
            mode: 'nearest',
            intersect: true
        },
        scales: {
            xAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'Month'
                }
            }],
            yAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'Value in EGP'
                },
                ticks: {
                    min: 0,
                    // max: 100,
                    // forces step size to be 5 units
                    stepSize: 1000
                }
            }]
        }
    }
};

const datasets = config.data.datasets;

fetch('{{ route('admin.home.chart') }}')
    .then(res => res.json())
    .then(data => {
        data.forEach(el => {
            datasets[0].data[el.month - 1] = el.total_amount
            datasets[1].data[el.month - 1] = el.shipping_fees
            datasets[2].data[el.month - 1] = el.seller_fees
        })
        new Chart(ctx, config);
    })
</script>
@endsection