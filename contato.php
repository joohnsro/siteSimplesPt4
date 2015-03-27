<h1>Contato</h1>

<?php if(isset($_POST["nome"])){ ?>
    <div class="alert alert-success text-center" role="alert">
        Dados enviados com sucesso, abaixo seguem os dados que você enviou.
    </div>
    <p>
        <strong>Nome:</strong> <?php echo $_POST["nome"]; ?><br />
        <strong>E-mail:</strong> <?php echo $_POST["email"]; ?><br />
        <strong>Assunto:</strong> <?php echo $_POST["assunto"]; ?><br />
        <strong>Mensagem:</strong> <?php echo $_POST["mensagem"]; ?>
    </p>
<?php } else { ?>

<form class="form-horizontal" method="post" action="contato">
    <div class="form-group">
        <label for="nome" class="col-sm-2 control-label">Nome</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome..." required="required">
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">E-mail</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail..." required="required">
        </div>
    </div>
    <div class="form-group">
        <label for="assunto" class="col-sm-2 control-label">Assunto</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="assunto" name="assunto" placeholder="Assunto..." required="required">
        </div>
    </div>
    <div class="form-group">
        <label for="mensagem" class="col-sm-2 control-label">Mensagem</label>
        <div class="col-sm-10">
            <textarea class="form-control" id="mensagem" name="mensagem" rows="3" placeholder="Mensagem..." required="required"></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
</form>

<?php } ?>