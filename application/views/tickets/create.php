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
                            <li><a href="<?=base_url()?>admin/entradas">Entradas</a></li>
                            <li class="active"><?php if(!empty($subtitle)): echo $subtitle; endif; ?></li>
                        </ol>
                    </div>
                    <!-- /.breadcrumb -->
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="white-box">
                            <h3 class="box-title">Crear Entrada</h3>
                            <p>Usted esta creando una entrada para algún evento previamente creado.</p>
                            <br>
                            
                            <div id="message"></div>
                            
                            <br>
                            <form class="floating-labels" id="form-user" method="post" action="<?=base_url()?>admin/entradas/store" enctype="multipart/form-data">
                                <div class="form-group m-b-40">
                                    <input type="text" class="form-control" name="name" id="name"><span class="highlight"></span> <span class="bar"></span>
                                    <label for="name">Nombre</label>
                                </div>
                                <div class="form-group m-b-40">
                                    <input type="text" class="form-control" name="type" id="type"><span class="highlight"></span> <span class="bar"></span>
                                    <label for="type">Tipo</label>
                                </div>
                                <div class="form-group m-b-40">
                                    <input type="text" class="form-control" name="price" id="price"><span class="highlight"></span> <span class="bar"></span>
                                    <label for="price">Precio</label>
                                </div>
                                <div class="form-group m-b-40">
                                    <input type="text" class="form-control" name="quantity" id="quantity"><span class="highlight"></span> <span class="bar"></span>
                                    <label for="quantity">Cantidad</label>
                                </div>
                                <div class="form-group m-b-40">
                                    <select class="form-control p-0" name="event_id" id="event_id">
                                        <?php foreach($allEvents as $events): ?>
                                            <option value="<?=$events['id']?>"><?=$events['name']?></option>
                                        <?php endforeach; ?>
                                    </select><span class="highlight"></span> <span class="bar"></span>
                                    <label for="event_id">Evento</label>
                                </div>
                                <div class="block text-center mb-xl-4">
                                    <input name="submit" type="submit" value="Crear Entrada" class="fcbtn btn btn-success btn-outline btn-1d">
                                    <a href="<?=base_url()?>admin/entradas" class="fcbtn btn btn-danger btn-outline btn-1d">Cancelar</a>
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
                                 .append('Entrada registrada con exito!');           

					// reset the form
                    window.setTimeout(function(){

// Move to a new location or you can do something else
window.location.href = "<?=base_url()?>admin/entradas";

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