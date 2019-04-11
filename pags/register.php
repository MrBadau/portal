<?php include 'breadcrumb.php'; ?>

<div class="col col-md-4 col-sm-5 col-lg-3 alert alert-primary alert-list">
    <div class="row">
    <i class="fa fa-user"></i> <h4>Finalize o seu cadastro!</h4>
        </div>
</div>

<div class="content-din">

    <form class="form form-search form-ds" id="form-cadastrar2" action="valida-cadastro-total.php" method="POST">
        <?php
        $sql1 = "SELECT  nome, email, senha FROM usuario WHERE id = '$id_global'";
        $result1 = mysqli_query($connect, $sql1);
        $row1 = mysqli_fetch_assoc($result1);
        $str = $row1['nome'];
        ?>
        
        <div class="row input-form">
            <div class="form-group col col-md-3">
                <input type="text" id="nome" name="nome" maxlength="200" value="<?php echo strip_tags($str);?>" class="form-control" placeholder="Nome Completo">
            </div>
            <div class="form-group col col-md-3">
                <input type="text" id="email" maxlength="200" name="email" value="<?=strip_tags($row1['email']);?>" class="form-control" placeholder="E-mail">
            </div>
            <div class="form-group col col-md-3">
                <input type="password" id="senha" maxlength="10" value="123456" name="senha" class="form-control" placeholder="Senha">
            </div>
            <div class="form-group col col-md-3">
                <input type="password" id="senha2" maxlength="10" value="123456" name="senha2" class="form-control" placeholder="Confirmar Senha">
            </div>
        </div>
        
        <div class="row input-form">
            <div class="form-group col col-md-4">
                <input type="text" id="documento" name="documento" maxlength="11" class="form-control" placeholder="CPF (Somente Números)" autofocus>
            </div>
            <div class="form-group col col-md-4">
                <input type="text" id="fixo" name="fixo" maxlength="11" class="form-control" placeholder="Fixo">
            </div>
            <div class="form-group col col-md-4">
                <input type="text" id="telefone" name="telefone" maxlength="11" class="form-control" placeholder="Telefone">
            </div>
        </div>
        
        <div class="row input-form">
            <div class="form-group col col-md-5">
                <input type="text" id="endereco" maxlength="200" name="endereco" class="form-control" placeholder="Endereço">
            </div>
            <div class="form-group col col-md-2">
                <input type="text" id="numero" name="numero" maxlength="10" class="form-control" placeholder="Número" maxlength="10">
            </div>
            <div class="form-group col col-md-5">
                <input type="text" id="complemento" name="complemento" maxlength="200" class="form-control" placeholder="Complemento">
            </div>
        </div>
        
        <div class="row input-form">
            <div class="form-group col col-md-4">
                <input type="text" id="cep" name="cep" maxlength="8" class="form-control" placeholder="CEP">
            </div>
            
            <?php
            $sql = "SELECT id, nome FROM cidade ORDER BY nome";
            $result = mysqli_query($connect, $sql);
            $row = mysqli_fetch_assoc($result);
            ?>
            
            <div class="form-group col col-md-4">
                <select class="form-control" id="cidade" name="cidade">
                    <option value="">Selecione a Cidade</option>
                    <?php do {  ?>
                        <option value="<?=$row['id'];?>"><?=$row['nome'];?></option>
                    <?php } while($row = mysqli_fetch_assoc($result)); ?>
                </select>
            </div>
            
            <div class="form-group col col-md-4" id="select-bairro">
                <select class="form-control" id="bairro" name="bairro" disabled>
                    <option value="">Selecione a Cidade</option>
                </select>
            </div>
        </div>
        <input type="hidden" name="id" id="id" value="<?=$id_global?>">
        <button type="submit" class="btn btn-primary" name="btn-cadastrar2"><i class="fa fa-save"></i> Salvar</button>
    </form>

</div>
<script src="js/jquery.validate.min.js"></script>
<script src="js/additional-methods.min.js"></script>
<script src="js/localization/messages_pt_BR.js"></script>
<script>
    $(document).ready(function(){
        
        $("#cidade").change(function(){
            var id = $("#cidade").val();
            $.ajax({
                url: 'bairros.php',
                data: {id : id},
                type: 'POST',
                dataType: 'html',
                success: function(retorno){
                    $("#select-bairro").html(retorno);
                },
                error: function(){
                    
                }
            });
        });
        
        jQuery.validator.addMethod("cpf", function(value, element) {
           value = jQuery.trim(value);

            value = value.replace('.','');
            value = value.replace('.','');
            cpf = value.replace('-','');
            while(cpf.length < 11) cpf = "0"+ cpf;
            var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
            var a = [];
            var b = new Number;
            var c = 11;
            for (i=0; i<11; i++){
                a[i] = cpf.charAt(i);
                if (i < 9) b += (a[i] * --c);
            }
            if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11-x }
            b = 0;
            c = 11;
            for (y=0; y<10; y++) b += (a[y] * c--);
            if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11-x; }

            var retorno = true;
            if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) retorno = false;

            return this.optional(element) || retorno;

        }, "Informe um CPF válido");
        
        $("#form-cadastrar2").validate({
            rules:{
                nome: {
                    required: true,
                    rangelength:[5,100],
                    minWords: 2
                },
                email: {
                    required: true,
                    rangelength:[4,100],
                    email: true
                },
                senha: {
                    required:true, 
                    rangelength:[5,10]
                },
                senha2: {
                    required: true,
                    equalTo: "#senha"
                },
                documento:{
                    cpf: true,
                    required:true
                },
                fixo:{
                    rangelength:[7,11],
                    number: true
                },
                telefone:{
                    rangelength:[7,11],
                    number: true,
                    required: true
                },
                endereco:{
                    rangelength:[4,200],
                    required: true
                },
                numero:{
                    rangelength:[2,10],
                    required: true
                },
                cep:{
                    rangelength:[8,8],
                    number: true,
                    required: true
                },
                cidade:{
                    number: true,
                    required: true
                },
                bairro:{
                    number: true,
                    required: true
                }
            }
        });
        
        
    });

</script>