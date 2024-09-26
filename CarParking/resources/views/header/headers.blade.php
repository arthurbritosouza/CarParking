<style>
        /* Seu estilo customizado */
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar {
            background-color: #dc3545;
        }
        .navbar-brand {
            color: #fff;
            font-weight: bold;
        }
        .sidebar {
            background-color: #222;
            color: #fff;
            min-height: 100vh;
            padding-top: 2rem;
        }
        .sidebar a {
            color: #fff;
            padding: 0.75rem 1rem;
            display: block;
            text-decoration: none;
            border-radius: 0.5rem;
        }
        .sidebar a:hover, .sidebar .active {
            background-color: #dc3545;
            color: #fff;
        }
        .main-content {
            padding: 2rem;
        }
        .header-section {
            margin-bottom: 2rem;
        }
    </style>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">Sistema de Estacionamento</a>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                    <li class="nav-item">
                            <a class="nav-link" href="/dashboard">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <a class="nav-link" href="/veiculos">
                                <i class="fas fa-car"></i> Veículos
                            </a>
                            <!-- Botão de "+" ao lado do item "Veículos" -->
                            <button type="button" class="btn btn-sm btn-outline-light add-button" data-bs-toggle="modal" data-bs-target="#cadastroVeiculoModal">
                                <i class="fas fa-plus"></i>
                            </button>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/veiculos_devolvidos">
                                <i class="fas fa-car"></i> Veículos Devolvidos
                            </a>
                        </li>
               
                        <li class="nav-item d-flex align-items-center">
                            <a class="nav-link" href="/reservas">
                                <i class="fas fa-calendar-alt"></i> Reservas
                            </a>
                            <!-- Botão de "+" ao lado do item "Veículos" -->
                            <button type="button" class="btn btn-sm btn-outline-light add-button" data-bs-toggle="modal" data-bs-target="#reserva">
                                <i class="fas fa-plus"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </nav>

    

    <!-- Modal de Cadastro de Veículo -->
    <div class="modal fade" id="cadastroVeiculoModal" tabindex="-1" aria-labelledby="cadastroVeiculoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cadastroVeiculoModalLabel">Cadastro de Veículo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <form action="/cadastrar_veiculos" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="placa" class="form-label">Placa do Veículo</label>
                            <input type="text" class="form-control" id="placa" name="placa" required>
                        </div>
                        <div class="mb-3">
                            <label for="modelo" class="form-label">Modelo do Veículo</label>
                            <input type="text" class="form-control" id="modelo" name="modelo" required>

                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-danger">Salvar Veículo</button>
                        </div>
                                </div>
                    </form>
                </div>
               
            </div>
        </div>
    </div>


     <!-- Modal de Cadastro de Veículo -->
     <div class="modal fade" id="reserva" tabindex="-1" aria-labelledby="reservaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cadastroVeiculoModalLabel">Cadastro de Veículo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <form action="/cadastrar_reserva" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="placa" class="form-label">Placa do Veículo</label>
                            <input type="text" class="form-control" id="placa" name="placa" required>
                        </div>
                        <div class="mb-3">
                            <label for="modelo" class="form-label">Modelo do Veículo</label>
                            <input type="text" class="form-control" id="modelo" name="modelo" required>
                        </div>

                        <div class="mb-3">
                            <label for="data_reserva" class="form-label">Data da reserva</label>
                            <input type="text" class="form-control" id="data_reserva" name="data_reserva" required>
                        </div>

                        <div class="mb-3">
                            <label for="hora_reserva" class="form-label">Hora da reserva</label>
                            <input type="text" class="form-control" id="hora_reserva" name="hora_reserva" required>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-danger">Salvar Veículo</button>
                                </div>
                    </form>
                </div>
               
            </div>
        </div>
    </div>
