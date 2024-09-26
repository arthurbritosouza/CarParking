<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veículos Devolvidos - Sistema de Estacionamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    @include('header.headers')
            <main role="main" class="col-md-9 ms-sm-auto col-lg-10 px-4 main-content">
                <div class="header-section">
                    <h2>Veículos Devolvidos</h2>
                </div>
                <table class="table table-striped mt-4">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Placa</th>
                            <th>Modelo</th>
                            <th>Data da reserva</th>
                            <th>Hora da reserva</th>    
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($reserva as $res)

                        <tr>
                            <td>{{$res->id}}</td>
                            <td>{{$res->placa}}</td>
                            <td>{{$res->modelo}}</td>
                            <td>{{$res->data_reserva}}</td>
                            <td>{{$res->hora_reserva}}</td>
                            <td><span class="badge bg-warning">Reserva</span></td>
                            <td>
                                <a href="/excluir_carros/{{$res->id}}" class="btn btn-danger">
                                    <span class="fas fa-trash"></span> <!-- Corrigido para incluir a classe corretamente -->
                                </a>
                                <a href="/estacionado/{{$res->id}}" class="btn btn-success">Estacionado</a>
                            </td>
                            </tr>
                        @endforeach
                        <!-- Outros veículos -->
                    </tbody>
                </table>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
