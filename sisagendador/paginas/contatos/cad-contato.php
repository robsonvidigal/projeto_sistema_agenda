<header>
    <h3><i class="bi bi-person-square"></i> Cadastro de Contato</h3>
</header>

<div>

    <form action="index.php?menuop=inserir-contato" method="post">
        
        <div class="mb-3">
            <label for="nomeContato" class="form-label">Nome</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-people-fill"></i></span>
                <input type="text" name="nomeContato" class="form-control">
            </div>            
        </div>

        <div class="row">
            <div class="mb-3 col-8">
                <label for="emailContato" class="form-label">E-mail</label>
                <div class="input-group">
                    <span class="input-group-text">@</span>
                    <input type="email" name="emailContato" class="form-control">
                </div>
            </div>

            <div class="mb-3 col-4">
                <label for="telefoneContato" class="form-label">Telefone</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                    <input type="text" name="telefoneContato" class="form-control">
                </div>            
            </div>
        </div>

        <div class="mb-3">
            <label for="enderecoContato" class="form-label">Endereço</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-mailbox2"></i></span>
                <input type="text" name="enderecoContato" class="form-control">
            </div>            
        </div>

        <div class="row">
            <div class="mb-3 col-4">
                <label for="sexoContato" class="form-label">Sexo</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
                    <select name="sexoContato" id="sexoContato" class="form-control">
                        <option selected>Selecione o sexo do aluno</option>
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 col-4">
                <label for="dataNascContato" class="form-label">Data Nascimento</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-calendar3"></i></span>
                    <input type="date" name="dataNascContato" class="form-control">
                </div>            
            </div>
        </div>


        <div  class="mb-3">
            <input type="submit" value="Adicionar" name="btnAdicionar" class="btn btn-success">
        </div>

    </form>

</div>