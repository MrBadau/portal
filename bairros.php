<?php

//conexÃo
require_once 'connection.php';

$id = $_POST['id'];

$sql = "SELECT id, nome FROM bairro WHERE cidade = '$id' ORDER BY nome";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
?>
            
    <div class="form-group col col-md-12">
        <select class="form-control" id="bairro" name="bairro">
            <option value="">Selecione o Bairro</option>
            <?php do {  ?>
                <option value="<?=$row['id'];?>"><?=$row['nome']?></option>
            <?php } while($row = mysqli_fetch_assoc($result)); ?>
        </select>
    </div>