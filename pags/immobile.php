<?php include 'breadcrumb.php'; ?>

<div class="col col-md-4 col-sm-5 col-lg-3 alert alert-primary alert-list">
    <div class="row">
    <i class="fa fa-building"></i> <h4>Cadastro de imóvel!</h4>
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
        
        
        <fieldset class="form-group">
            <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Transação</legend>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="transacao" id="vender" value="1" checked>
                        <label class="form-check-label" for="vender">
                            Vender
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="transacao" id="alugar" value="2">
                        <label class="form-check-label" for="alugar">
                            Alugar
                        </label>
                    </div>
                </div>
            </div>
        </fieldset>
        
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">CEP</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Cidade</label>
            <div class="col-sm-10">
                <select id="cidade" name="cidade" class="custom-select">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Bairro</label>
            <div class="col-sm-10">
                <select id="bairro" name="bairro" class="custom-select">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Endereço</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Complemento</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Complemento">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Número</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="numero" name="numero" placeholder="Número">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Quartos</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="quartos" name="quartos" placeholder="Quartos">
            </div>
            
            <label for="inputEmail3" class="col-sm-2 col-form-label">Suítes</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="suites" name="suites" placeholder="Suítes">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Vagas de Garagem</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="garagem" name="garagem" placeholder="Vagas de Garagem">
            </div>
            
            <label for="inputEmail3" class="col-sm-2 col-form-label">Banheiros</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="banheiros" name="banheiros" placeholder="Banheiros">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Área Total</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="total" name="total" placeholder="Área Total">
            </div>
            
            <label for="inputEmail3" class="col-sm-2 col-form-label">Área Útil</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="util" name="util" placeholder="Área Útil">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Descrição</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="descricao" name="descricao" rows="5" placeholder="Descrição"></textarea>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Valor</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="valor" name="valor" placeholder="Valor">
            </div>
        </div>
        
        <input type="hidden" name="id" id="id" value="<?=$id_global?>">
        
        <button type="submit" class="btn btn-primary" name="btn-cadastrar2"><i class="fa fa-save"></i> Salvar e Continuar</button>
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