<form action="/create-user" method="post" class="">
    @csrf
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="username" id="name" class="form-control" placeholder="Nome" name="name"/>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" class="form-control" placeholder="Email" name="email"/>
    </div>
    <div class="form-group">
        <label for="type">Tipo de usuário</label>
            <select id="type" name="type" class="form-control">
                <option value="adm">Administrador</option>
                <option value="tec">Cliente</option>
            </select>
    </div>
    <div class="form-row">
        <div class="form-group mr-2">
            <label for="password">Senha</label>
            <input type="password" id="password" class="form-control" placeholder="Senha" name="password"/>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirmar Senha</label>
            <input type="password" id="password_confirmation" class="form-control" placeholder="Confirmar Senha" name="password_confirmation"/>
        </div>
    </div>
    <div class="row">
        <button class="btn btn-outline-success mx-auto" type="submit">
            <i class="far fa-paper-plane"></i>
            <span class="text-uppercase">enviar</span>
        </button>
    </div>
</form>