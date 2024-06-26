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
  .main-cart{
    width: 70%;
        position: relative;
        left: 7rem;
        background: #fefefe;
        padding: 10px;
        box-shadow: 0 0 1px #000;
        margin: 10px auto;
  }

  #chart-container {
        width: 100%;
        position: relative;
        /* left: 7rem; */
        background: #fefefe;
        padding: 10px;
        box-shadow: 0 0 1px #d1d1d1;
        margin: 10px auto;

    }

    #employmentChart {
        width: 100%;
        height: 400px;
    }
    .chart-title{
        text-align: center;
        font-size: 25px;
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
<div class="main-cart">
    <div class="chart-title">Semi-Annual Report on Alumni Employment Status</div>
    <div id="chart-container">
        <canvas id="employmentChart"></canvas>
    </div>
</div>

</div>

@endsection
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const employedCount = @json($employedCount);
        const unEmployedCount = @json($unEmployedCount);
        const withJobOfferCount = @json($withJobOfferCount);

        // Function to generate a random color
        function getRandomColor() {
            const letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        // Generate a unique random color for each bar
        const employedColor = getRandomColor();
        const unEmployedColor = getRandomColor();
        const withJobOfferColor = getRandomColor();

        const ctx = document.getElementById('employmentChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Employed', 'Not Employed', 'With Job Offer'],
                datasets: [{
                    data: [employedCount, unEmployedCount, withJobOfferCount],
                    backgroundColor: [employedColor, unEmployedColor, withJobOfferColor],
                    borderColor: [employedColor, unEmployedColor, withJobOfferColor],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    });
</script>
