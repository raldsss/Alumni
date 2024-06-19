@extends('template.main')

@section('title', 'Dashboard')
<style>
     .card {
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    width: 300px;
    margin: 15px;
    padding: 20px;
    transition: transform 0.3s ease;
  }

  .card:hover {
    transform: translateY(-5px);
  }

  .card h3 {
    margin-top: 0;
    font-size: 24px;
    position: relative;
    top: -2rem;
  }

  .card p {
    color: #666;
    font-size: 20px;
    position: relative;
    top: -2rem;
  }

  .card .icon {
    font-size: 48px;
    color: #ffffff;
    align-self: flex-end;
    position: relative;
    opacity: 0.5;
    top: 1.5rem;
  }
  .container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding: 20px;
  }

  #chart-container {
        width: 70%;
        position: relative;
        left: 7rem;
        background: #fefefe;
        padding: 10px;
        box-shadow: 0 0 1px #000;
        margin: 10px auto;

    }

    #employmentChart {
        width: 100%;
        height: 400px;
    }
</style>
@section('content')
    <div class="content-header">
        <div class="container-fluid">
                    <h1 class="m-0">@yield('title')</h1>
                </div>
            </div>


<div class="container">
    <div class="card bg-info">
        <i class="icon fas fa-users"></i>
        <h3 class="card-title" style="color: #fefefe; font-weight:800">{{ $alumni }}</h3>
        <p class="card-text" style="color: #fefefe">Total Alumni Registered</p>
    </div>
    <div class="card bg-success">
        <i class="icon fa-solid fa-arrows-rotate"></i>
        <h3 class="card-title" style="color: #fefefe;  font-weight:800">{{ $pendingAlumniCount }}</h3>
        <p class="card-text" style="color: #fefefe">Pending Alumni Employment Data</p>
    </div>
    <div class="card bg-warning">
        <i class="icon fas fa-users"></i>
        <h3 class="card-title" style="  font-weight:800">{{ $employmentdata }}</h3>
        <p class="card-text">Total Alumni Employment Data</p>

    </div>



        </div>
    </div>


</div>
</div>
<div id="chart-container">
    <canvas id="employmentChart"></canvas>
</div>
</div>

@endsection

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const employedCount = {{ $employedCount }};
        const unEmployedCount = {{ $unEmployedCount }};
        const withJobOfferCount = {{ $withJobOfferCount }};

        const ctx = document.getElementById('employmentChart').getContext('2d');
        const employmentChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Employed', 'Not Employed', 'With Job Offer'],
                datasets: [{
                    label: 'Alumni Employment Status',
                    data: [employedCount, unEmployedCount, withJobOfferCount],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(75, 192, 192, 0.6)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>


