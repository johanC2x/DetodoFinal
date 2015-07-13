
				<h1>Nueva Entrada</h1>
					<center>
						<form role="form" action="validarPost.php" method="POST" >
							<table>
								<tr>
									<div class="form-group" style="width:600px;"> 
										<td style="width:100px;padding:10px"><label for="txtTituloPost">Nombre</label></td>
										<td style="width:200px">
											<input type="text" class="form-control" id="txtTituloPost" 
					                        placeholder="Ingrese Titulo" name="txtTituloPost">
					               		</td>
					               		<td style="width:100px;padding:10px">
											<label class="control-label" for="txtFile">Tipo Post</label>
										</td>
										<td style="width:200px">
											<select class="form-control" id="sel1" name="cboTipoArchivo">
						                    <option>Seleccionar</option> 
						                        <?php
						                            while($resultCodigoPost=mysql_fetch_array($codigoPost)) {
						                        ?>
						                    <option value="<?php echo $resultCodigo['idcodigo']; ?>">
						                        <?php echo $resultCodigoPost['descripcion']; ?>
						                    </option>
						                        <?php
						                            }
						                        ?>
						                    </select>
										</td>
					                </div>
								</tr>
								<br>
							</table>
							<br>
							<table>
								<tr>
					                <td>
					                    <div class="form-group" style="width:650px;"> 
					                        <label for="txtDesPost">Contenido</label>
					                        <textarea id="descripcion" class="descripcion" name="descripcion" rows="400" cols="400" ></textarea>
					                        <script type="text/javascript">
					                            CKEDITOR.replace( 'descripcion' );
					                        </script>
					                    </div>
					                </td>
					            </tr>
							</table>
						</form>
					</center>