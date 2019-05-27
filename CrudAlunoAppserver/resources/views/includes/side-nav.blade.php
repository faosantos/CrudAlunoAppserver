<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-users"></i>
            <span>Alunos</span>
        </a>
    </li>
    <li class="nav-item active">
        <a href="/turmas" class="nav-link">
            <i class="fas fa-fw fa-car-alt"></i>
            <span>Turmas</span>
        </a>
    </li>
    <li class="nav-item active">
        <a href="/agenda" class="nav-link">
            <i class="fas fa-fw fa-book"></i>
            <span>Agenda</span>
        </a>
    </li>
    @if (Auth::user()->email == "admin@gettrack.com.br")
        <li class="nav-item active">
            <a href="/create-user" class="nav-link">
                <i class="fas fa-fw fa-user"></i>
                <span>Adicionar Técnico</span>
            </a>
        </li>
    @endif
</ul>