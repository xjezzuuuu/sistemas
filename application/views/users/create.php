<div id="wrapper">
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"><?php if(!empty($subtitle)): echo $subtitle; endif; ?></h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="<?=base_url()?>">Inicio</a></li>
                            <li><a href="<?=base_url()?>admin/clientes">Usuarios</a></li>
                            <li class="active"><?php if(!empty($subtitle)): echo $subtitle; endif; ?></li>
                        </ol>
                    </div>
                    <!-- /.breadcrumb -->
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="white-box">
                            <h3 class="box-title">Crear Usuario</h3>
                            <p>Usted esta creando un usuario, el cual podrá administrar la plataforma.</p>
                            <br>
                            
                            <div id="message"></div>
                            
                            <br>
                            <form class="floating-labels" id="form-user" method="post" action="<?=base_url()?>admin/usuarios/store" enctype="multipart/form-data">
                                <div class="form-group m-b-40">
                                    <input type="text" class="form-control" name="name" id="name"><span class="highlight"></span> <span class="bar"></span>
                                    <label for="name">Nombre</label>
                                </div>
                                <div class="form-group m-b-40">
                                    <input type="text" class="form-control" name="last_name" id="last_name"><span class="highlight"></span> <span class="bar"></span>
                                    <label for="last_name">Apellido</label>
                                </div>
                                <div class="form-group m-b-40">
                                    <input type="email" class="form-control" name="email" id="email"><span class="highlight"></span> <span class="bar"></span>
                                    <label for="email">E-mail</label>
                                </div>
                                <div class="form-group m-b-40">
                                    <input type="password" class="form-control" name="password" id="password"><span class="highlight"></span> <span class="bar"></span>
                                    <label for="password">Contraseña</label>
                                </div>
                                <div class="form-group m-b-40">
                                    <input type="password" class="form-control" name="password_confirm" id="password_confirm"><span class="highlight"></span> <span class="bar"></span>
                                    <label for="password_confirm">Confirmar contraseña</label>
                                </div>
                                <div class="block text-center mb-xl-4">
                                    <input name="submit" type="submit" value="Crear Usuario" class="fcbtn btn btn-success btn-outline btn-1d">
                                    <a href="<?=base_url()?>admin/usuarios" class="fcbtn btn btn-danger btn-outline btn-1d">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script>
	$('#form-user').submit(function(e) {
		e.preventDefault();

		var me = $(this);

		// perform ajax
		$.ajax({
			url: me.attr('action'),
			type: 'post',
			data: me.serialize(),
			dataType: 'json',
			success: function(response) {
				if (response.success == true) {
                    $('.text').remove();
                    
					// if success we would show message
					// and also remove the error class
					$('.form-group').removeClass('has-error')
									.removeClass('has-success');
                    $('#message').removeClass('alert alert-danger')  
                                 .addClass('alert alert-success') 
                                 .append('Usuario registrado con exito!');           

					// reset the form
                    window.setTimeout(function(){

// Move to a new location or you can do something else
window.location.href = "<?=base_url()?>admin/usuarios";

}, 1000);

				} else {
                    $('.text').remove();
					$.each(response.messages, function(key, value) {
                        var element = $('#' + key);
						
                        element
                        .closest('div.form-group')
                        .removeClass('has-error')
                        .removeClass('has-success')
						.addClass(value.length > 0 ? 'has-error' : 'has-success'); 
                        
                        $('#message').append(value)
                            .addClass('alert alert-danger');
					});
				}
			}
		});
	});
</script>