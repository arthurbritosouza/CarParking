<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistema de Estacionamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    @include('header.headers')
            <main role="main" class="col-md-9 ms-sm-auto col-lg-10 px-4 main-content">
                <div class="header-section">
                    <h2>Visão Geral</h2>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xl-4 mb-4">
                        <div class="card stat-card">
                            <div class="card-header">
                                <i class="fas fa-car"></i> Veículos Estacionados
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{$estacionados}}</h5>
                                <p class="card-text">Número total de veículos estacionados atualmente.</p>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-outline-danger">Ver Mais</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 mb-4">
                        <div class="card stat-card">
                            <div class="card-header">
                                <i class="fas fa-calendar-day"></i> Reservas Pendentes
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{$reservados}}</h5>
                                <p class="card-text">Número total de reservas pendentes.</p>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-outline-danger">Ver Mais</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 mb-4">
                        <div class="card stat-card">
                            <div class="card-header">
                                <i class="fas fa-car"></i> Veículos Devolvidos
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{$devolvidos}}</h5>
                                <p class="card-text">Número total de veículos estacionados atualmente.</p>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-outline-danger">Ver Mais</a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
