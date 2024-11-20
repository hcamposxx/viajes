@extends('admin.layout')

@section('title', 'Gráfico de Visitas')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Gráfico de Visitas Diarias</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-purple text-white">
                            <h3 class="card-title">
                                <i class="fas fa-chart-line mr-2"></i>
                                Visitas Diarias
                            </h3>
                        </div>
                        <div class="card-body">
                            <canvas id="visitaDiaria"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const ctx = document.getElementById('visitaDiaria').getContext('2d');
            const visitaDiariaChart = new Chart(ctx, {
                type: 'line', // Puedes cambiar el tipo a 'bar', 'pie', etc.
                data: {
                    labels: ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'], // Etiquetas de ejemplo
                    datasets: [{
                        label: 'Visitas',
                        data: [12, 19, 3, 5, 2, 3, 7], // Datos de ejemplo
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Visitas Diarias'
                        }
                    }
                }
            });
        });
    </script>
@endpush
