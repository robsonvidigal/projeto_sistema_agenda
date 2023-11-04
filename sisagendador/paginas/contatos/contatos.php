<header>

    <h3><i class="bi bi-person-square"></i> Contatos</h3>

</header>

<div>
    <a class="btn btn-outline-secondary mb-2" href="index.php?menuop=cad-contatos"><i class="bi bi-person-fill-add"></i> Novo Contato</a>
</div>

<div>
    <form action="index.php?menuop=contatos" method="post">
        <div class="input-group">
            <input class="form-control" type="text" name="txt_pesquisa">
            <button class="btn btn-outline-success btn-sm" type="submit"><i class="bi bi-search"></i> Pesquisar</button>
        </div>

    </form>
</div>

<div class="tabela">

    <table class="table table-striped table-dark table-hover table-bordered table-sm">

        <thead>

            <tr>
                <th scope="col" class="align-middle text-uppercase">ID</th>
                <th scope="col" class="align-middle text-uppercase">Nome</th>
                <th scope="col" class="align-middle text-uppercase">E-mail</th>
                <th scope="col" class="align-middle text-uppercase">Tetefone</th>
                <th scope="col" class="align-middle text-uppercase">Endereço</th>
                <th scope="col" class="align-middle text-uppercase">Sexo</th>
                <th scope="col" class="align-middle text-uppercase">Data de Nasc.</th>
                <th scope="col" class="align-middle text-uppercase">Editar</th>
                <th scope="col" class="align-middle text-uppercase">Excluir</th>
            </tr>

        </thead>

        <tbody>

        <?php

            $quantidade = 5;

            $pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;

            $inicio = ($quantidade * $pagina) - $quantidade;

            $txt_pesquisa = (isset($_POST["txt_pesquisa"])) ? $_POST["txt_pesquisa"] : "";

            $sql = "SELECT 
            idContato,
            upper(nomeContato) as nomeContato,
            lower(emailContato) as emailContato,
            telefoneContato,
            upper(enderecoContato) as enderecoContato,
            CASE 
                WHEN sexoContato='F' THEN 'FEMININO'
                WHEN sexoContato='M' THEN 'MASCULINO'
                WHEN sexoContato='I' THEN 'IDEFINIDO'
            ELSE 
                'NÃO ESPECIFICADO'
            END as sexoContato,
            DATE_FORMAT(dataNascContato, '%d/%m/%Y') as dataNascContato             
            FROM tbcontatos 
            WHERE idContato='{$txt_pesquisa}' or nomeContato LIKE '%{$txt_pesquisa}%' or emailContato LIKE '%$txt_pesquisa%'
            ORDER BY idContato ASC
            LIMIT $inicio, $quantidade
            ";

            $rs = mysqli_query($conexao, $sql) or die ("Erro ao executar a consulta!" . mysqli_error($conexao));
            while($dados = mysqli_fetch_assoc($rs) ) {

        ?>
                <tr>
                    <td class="text-nowrap align-middle"><?=$dados["idContato"] ?></td>
                    <td class="text-nowrap align-middle"><?=$dados["nomeContato"] ?></td>
                    <td class="text-nowrap align-middle"><?=$dados["emailContato"] ?></td>
                    <td class="text-nowrap align-middle"><?=$dados["telefoneContato"] ?></td>
                    <td class="text-nowrap align-middle"><?=$dados["enderecoContato"] ?></td>
                    <td class="align-middle"><?=$dados["sexoContato"] ?></td>
                    <td class="text-nowrap align-middle"><?=$dados["dataNascContato"] ?></td>
                    <td class="text-center align-middle"><a class="btn btn-outline-warning btn-sm" href="index.php?menuop=editar-contato&idContato=<?=$dados["idContato"] ?>"><i class="bi bi-pencil-square"></i></a></td>
                    <td class="text-center align-middle"><a class="btn btn-outline-danger btn-sm" href="index.php?menuop=excluir-contato&idContato=<?=$dados["idContato"] ?>"><i class="bi bi-trash-fill"></i></a></td>
                </tr>
        <?php
            }
        ?>

        </tbody>

    </table>

</div>

<ul class="pagination justify-content-center">

    <?php

        $sqlTotal = "SELECT idContato FROM tbcontatos";
        $qrTotal = mysqli_query($conexao, $sqlTotal) or die(mysqli_error($conexao));
        $numTotal = mysqli_num_rows($qrTotal);
        $totalPagina = ceil($numTotal / $quantidade);

        echo "<li class='page-item disabled'><span class='page-link'>Total de registros: " . $numTotal . "</span></li>";

        if($pagina > 1) {
            echo "<li class='page-item'><a class='page-link' href=\"?menuop=contatos&pagina=1\">Primeira página</a></li>";
        }
    ?>
    <?php
            if($pagina > 6) {
                ?>
                    <li class="page-item"><a class="page-link" href="?menuop=contatos&pagina=<?php echo $pagina-1 ?>"> &laquo; </a></li>
                <?php
            }

            for($i = 1; $i <= $totalPagina; $i++) {

                if($i >=($pagina - 3) && $i <= ($pagina + 3)) {

                    if($i==$pagina) {
                        echo "<li class='page-item active'><span class='page-link'>$i</span></li>";
                    }else{
                        echo "<li class='page-item'><a class='page-link' href=\"?menuop=contatos&pagina=$i\">$i</a></li>";
                    }
                }

            }

            if($pagina < $totalPagina-5) {
                ?>
                    <li class="page-item"><a class="page-link" href="?menuop=contatos&pagina=<?php echo $pagina+1 ?>"> &raquo; </a></li>
                <?php
            }
            ?>
            
            <?php
            if($pagina < $totalPagina) {
                echo "<li class='page-item'><a class='page-link' href=\"?menuop=contatos&pagina=$totalPagina\">Última página</a></li>";
            }
    ?>

</ul>