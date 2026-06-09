<?php
require("cabecalho.php");
?>

<style>
.dashboard {
    min-height: 100vh;
    background: linear-gradient(135deg, #1b1f24, #232a33);
    padding: 40px;
}

.dashboard-card {
    background: #000;
    border: 1px solid #FFC107;
    border-radius: 15px;
    transition: all .3s ease;
    height: 100%;
}

.dashboard-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 0 25px rgba(255,193,7,.35);
}

.dashboard-icon {
    font-size: 3rem;
    margin-bottom: 15px;
}

.dashboard-card h4 {
    color: #FFC107;
    font-weight: bold;
}

.dashboard-card p {
    color: #ddd;
}

.btn-dashboard {
    background: #afda39;
    color: #000;
    font-weight: bold;
    border: none;
}

.btn-dashboard:hover {
    background: #97d329;
}
</style>

<div class="row g-3">

    <div class="col-lg-4 col-md-6">
        <div class="card dashboard-card">
            <div class="card-body text-center p-4">
                <div class="dashboard-icon">🚌</div>
                <h4>Linhas</h4>
                <p>Cadastro e gerenciamento das linhas.</p>
                <a href="novaLinha.php" class="btn btn-dashboard">
                    Acessar
                </a>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="card dashboard-card">
            <div class="card-body text-center p-4">
                <div class="dashboard-icon">👤</div>
                <h4>Passageiros</h4>
                <p>Cadastro e gerenciamento de passageiros.</p>
                <a href="novoPassageiro.php" class="btn btn-dashboard">
                    Acessar
                </a>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="card dashboard-card">
            <div class="card-body text-center p-4">
                <div class="dashboard-icon">🏢</div>
                <h4>Estações</h4>
                <p>Controle das estações de saída.</p>
                <a href="novaEstacao.php" class="btn btn-dashboard">
                    Acessar
                </a>
            </div>
        </div>
    </div>

</div>

<div class="row g-4 mt-3">

    <div class="col-lg-6">
        <div class="card dashboard-card">
            <div class="card-body text-center p-4">
                <div class="dashboard-icon">🛣️</div>
                <h4>Viagens</h4>
                <p>Registrar e gerenciar viagens.</p>
                <a href="novaViagem.php" class="btn btn-dashboard">
                    Acessar
                </a>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card dashboard-card">
            <div class="card-body text-center p-4">
                <div class="dashboard-icon">📋</div>
                <h4>Relatórios</h4>
                <p>Consultas e análises do sistema.</p>
                <a href="relatorios.php" class="btn btn-dashboard">
                    Acessar
                </a>
            </div>
        </div>
    </div>

</div>

<?php
require("rodape.php");
?>