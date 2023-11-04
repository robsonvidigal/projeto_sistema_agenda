<?php

    $idContato = $_GET["idContato"];
    
    $sql = "SELECT * FROM tbcontatos WHERE idContato={$idContato}";
    $rs = mysqli_query($conexao, $sql) or die("Erro ao recuperar os dados do registro." . mysqli_error($conexao));
    $dados = mysqli_fetch_assoc($rs);
?>

<header>
    <h3><i class="bi bi-person-gear"></i> Editar Contato</h3>
</header>

<div>

    <form action="index.php?menuop=atualizar-contato" method="post">
        <div class="row">
            <div class="mb-3 col-2">
                <label for="idContato" class="form-label">ID</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-pencil-fill"></i></span>
                    <input type="text" class="form-control" name="idContato" value="<?=$dados["idContato"] ?>">
                </div>
            </div>

            <div class="mb-3 col-10">
                <label for="nomeContato" class="form-label">Nome</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-people-fill"></i></span>
                    <input type="text" class="form-control" name="nomeContato" value="<?=$dados["nomeContato"] ?>">
                </div>
            </div>
        </div>



        <div class="row">
            <div class="mb-3 col-8">
                <label for="emailContato" class="form-label">E-mail</label>
                <div class="input-group">
                    <span class="input-group-text">@</span>
                    <input type="email" class="form-control" name="emailContato" value="<?=$dados["emailContato"] ?>">
                </div>
            </div>

            <div class="mb-3 col-4">
                <label for="telefoneContato" class="form-label">Telefone</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                    <input type="text" class="form-control" name="telefoneContato" value="<?=$dados["telefoneContato"] ?>">
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="enderecoContato" class="form-label">Endereço</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-mailbox2"></i></span>
                <input type="text" class="form-control" name="enderecoContato" value="<?=$dados["enderecoContato"] ?>">
            </div>
        </div>

        <div class="row">
            <div class="mb-3 col-4">
                <label for="sexoContato" class="form-label">Sexo</label>
                <div class="input-group">
                <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
                    <select name="sexoContato" id="sexoContato" class="form-control">
                        <option selected><?=$dados["sexoContato"] ?></option>
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 col-4">
                <label for="dataNascContato" class="form-label">Data Nascimento</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-calendar3"></i></span>
                    <input type="date" class="form-control" name="dataNascContato" value="<?=$dados["dataNascContato"] ?>">
                </div>
            </div>
        </div>

        <div class="mb-3">
            <input type="submit" value="Atualizar" name="btnAtualizar" class="btn btn-warning">
        </div>

    </form>

</div>