 <?php 
    session_start(); 
    if(!$_SESSION['admin']){
   header("location:index.php");
   die;
}
    ?>
<?php 
include "header.php";
include "menu.php";
 ?>
 <?php
 include "config.php";
 ?>
        <div class="grid_10">
            <div class="box round first">
                <h2>
                    Adicionar Produto</h2>
                <div class="block">
                    <form name="form1" action="add_product.php" method="post" enctype="multipart/form-data">
                    	<table border="1">
                    		<tr>
                    			<td>Produto</td>
                    			<td><input type="text" name="pnm" required=""></td>
                    		</tr>
                    			<tr>
                    			<td>Preço</td>
                    			<td><input type="text" name="pprice" required=""></td>
                    		</tr>
                    			<tr>
                    			<td>Quantidade</td>
                    			<td><input type="text" name="pqty" required=""></td>
                    		</tr>
                    			<tr>
                    			<td>Imagem</td>
                    			<td> <input type="file" name="pimage" required=""/></td>
                    		</tr>
                    			<tr>
                    			<td>Categoria</td>
                    			<td>
                    				<select name="pcategory" required="">
                    					<option>
                    						Selecionar Categoria
                    					</option>
                    					<?php 
                                        $sql = "SELECT * FROM categoria";
                                        $res = mysqli_query($link, $sql);
                                        while($r = mysqli_fetch_assoc($res)){
                                        ?>

                                        <option value="<?php echo $r['name']; ?>"><?php echo $r['name']; ?></option>
                                        
                                        <?php }?>
                    				</select>
                    			</td>
                    		</tr>
                    		<tr>
                    			<td>Descrição</td>
                    			<td>
                    				<textarea cols="15" rows="10" name="pdesc"></textarea>
                    			</td>
                    		</tr>
                    		<tr>
                    		<td colspan="2" align="center"><input type="submit" name="submit1" value="Enviar"></td>
                    	</tr>
                    	</table>
                    </form>
<?php
if (isset($_POST['submit1'])) {
	
	//Criar nomes rand para imagens
	$v1=rand(1111,9999);
	$v2=rand(1111,9999);

	$v3=$v1.$v2;

	$v3=md5($v3);
//Inserir os arquivos 
	$fnm=$_FILES["pimage"]["name"];
	$dst="./product_image/".$v3.$fnm;
	//Inserir no banco de dadosuct.php
	$dst1="product_image/".$v3.$fnm;
	move_uploaded_file($_FILES["pimage"]["tmp_name"], $dst);

//Insere os dados no db
	mysqli_query($link, "INSERT INTO product VALUES('','$_POST[pnm]',$_POST[pprice],$_POST[pqty],'$dst1','$_POST[pcategory]','$_POST[pdesc]')");
	?>
	<script type="text/javascript">
                       alert("Produto adicionado com sucesso!");
                   </script>
	<?php
}

?>        
                </div>
            </div>
        </div>        
<?php include "footer.php"; ?>