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
                            <li><a href="<?=base_url()?>admin/eventos">Eventos</a></li>
                            <li class="active"><?php if(!empty($subtitle)): echo $subtitle; endif; ?></li>
                        </ol>
                    </div>
                    <!-- /.breadcrumb -->
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="white-box">
                            <h3 class="box-title">Crear Evento</h3>
                            <p>Usted esta creando un nuevo evento al cual se podrá asistir y comprar entradas.</p>
                            <br>

                            <div id="message"></div>

                            <br><br>
                            <form class="floating-labels" id="form-user" method="post" action="<?=base_url()?>admin/eventos/store" enctype="multipart/form-data">  
                                <div class="form-group m-b-40">
                                    <input type="text" class="form-control" name="name" id="name"><span class="highlight"></span> <span class="bar"></span>
                                    <label for="name">Nombre</label>
                                </div>
                                <div class="form-group m-b-40">
                                    <input type="text" class="form-control" name="date" id="date"><span class="highlight"></span> <span class="bar"></span>
                                    <label for="last_name_p">Fecha</label>
                                </div>
                                <div class="form-group m-b-40">
                                    <input type="text" class="form-control" name="capacity" id="capacity"><span class="highlight"></span> <span class="bar"></span>
                                    <label for="last_name_p">Capacidad</label>
                                </div>
                                <div class="form-group m-b-40">
                                    <input type="text" class="form-control" name="address" id="address"><span class="highlight"></span> <span class="bar"></span>
                                    <label for="address">Dirección</label>
                                </div>
                                <div class="form-group m-b-40">
                                    <input type="city" class="form-control" name="city" id="city"><span class="highlight"></span> <span class="bar"></span>
                                    <label for="city">Ciudad</label>
                                </div>
                                <div class="form-group m-b-40">
                                    <input type="text" class="form-control" name="country" id="country"><span class="highlight"></span> <span class="bar"></span>
                                    <label for="country">País</label>
                                </div>
                                <div class="block text-center mb-xl-4">
                                    <input name="submit" type="submit" value="Crear Evento" class="fcbtn btn btn-success btn-outline btn-1d">
                                    <a href="<?=base_url()?>admin/eventos" class="fcbtn btn btn-danger btn-outline btn-1d">Cancelar</a>
                                </div>
                            </form>
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
                                 .append('Evento registrado con exito!');           

					// reset the form
                    window.setTimeout(function(){

// Move to a new location or you can do something else
window.location.href = "<?=base_url()?>admin/eventos";

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