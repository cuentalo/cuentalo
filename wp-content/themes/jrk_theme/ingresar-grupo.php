<?php
/*
Template Name: Agregar Grupo
*/
?>
<?php get_header(); ?>

<section class="py-5 bg-gris">
	<div class="container">
		
		<form>
			<h2 class="pb-1 mb-3 line-title2 font-weight-bold">Registrar grupo</h2>
			<div class="row">
			  <div class="col">
			  	<div class="bg-items p-5 grupo-campos card title-color-site">
				<h5 class="mb-4 font-weight-bold">Información General</h5>
				<div class="form-group">
					<label for="inputEmail4 ">Nombre del Grupo</label>
					<input type="text" class="form-control">
				</div>

				<div class="form-group">
					<label for="exampleFormControlFile1">Imagen de portada</label>
					<input type="file" class="form-control-file" id="exampleFormControlFile1">
				</div>

				<div class="form-group">
					<label for="exampleFormControlTextarea1">Descripción</label>
					<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
				</div>

				<div class="form-group">
					<label for="exampleFormControlTextarea1">Dirección</label>
					<input type="text" class="form-control">
				</div>

				<div class="form-group">
					<label for="exampleFormControlTextarea1">Poblacion</label>
					<input type="text" class="form-control">
				</div>

				<div class="form-group">
					<label for="exampleFormControlTextarea1">URL Video</label>
					<input type="text" class="form-control">
				</div>

				<div class="form-group">
					<label for="exampleFormControlTextarea1">Etiquetas</label>
					<input type="text" class="form-control">
					<small id="emailHelp" class="form-text text-muted">Separar etiquetas con el signo coma ","</small>
				</div>
							
			  </div>
			</div>
			  <div class="col">
					<div class="bg-items p-5 grupo-campos card title-color-site">
						<h5 class="mb-4 font-weight-bold">Información de Contacto</h5>
						<div class="form-group">
							<label for="inputEmail4">Correo Electrónico</label>
							<input type="text" class="form-control">
						</div>
											
						<div class="form-group">
							<label for="exampleFormControlTextarea1">URL Pagina Web</label>
							<input type="text" class="form-control">
						</div>
			
						<div class="form-group">
							<label for="exampleFormControlTextarea1">Facebook</label>
							<input type="text" class="form-control">
						</div>
			
						<div class="form-group">
							<label for="exampleFormControlTextarea1">Twitter</label>
							<input type="text" class="form-control">
						</div>
			
						<div class="form-group">
							<label for="exampleFormControlTextarea1">Instagram</label>
							<input type="text" class="form-control">
						</div>
						<div class="form-group">
								<button type="button" class="btn btn-primary">Registrar</button>
								<button type="button" class="btn btn-secondary">Cancelar</button>
						</div>
			
							
					 </div>
			  </div>
			</div>
		  </form>
	</div>
   </section>

<?php get_footer(); ?>
