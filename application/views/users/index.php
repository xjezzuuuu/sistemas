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
                            <li class="active"><?php if(!empty($subtitle)): echo $subtitle; endif; ?></li>
                        </ol>
                    </div>
                    <!-- /.breadcrumb -->
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <div class="block pull-right mb-xl-4">
							    <a class="fcbtn btn btn-success btn-outline btn-1d" href="<?=base_url()?>admin/usuarios/create">Crear Usuario </a>
						    </div>
                            <h3 class="box-title">Gestionar Usuarios</h3>
                            <p>Administre los usuarios que podrán administrar la plataforma.</p>
                            <div class="table-responsive">
                                <table class="table color-table inverse-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Correo</th>
                                            <th class="text-center">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($allUsers as $user): ?>
                                            <tr>
                                                <td><?=$user['id']?></td>
                                                <td><?=$user['name']?></td>
                                                <td><?=$user['last_name']?></td>
                                                <td><?=$user['email']?></td>
                                                <td class="text-center">
                                                    <div class="btn-action-table">
                                                        <a href="<?=base_url()?>admin/usuarios/<?=$user['id']?>/edit">
                                                            <span class="btn btn-warning fa fa-pencil"></span>
                                                        </a>
                                                        <a class="delete-user">
                                                            <span class="btn btn-danger fa fa-times"></span>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<script>
//Parameter
$('.delete-user').click(function(){
swal({   
title: "Estas seguro?",   
text: "No podrás recuperar esté usuario imaginario.!",   
type: "warning",   
showCancelButton: true,   
confirmButtonColor: "#DD6B55",   
confirmButtonText: "Si, borralo!",   
cancelButtonText: "No, cancelaló!",   
closeOnConfirm: false,   
closeOnCancel: false 
}, function(isConfirm){   
if (isConfirm) {
window.setTimeout(function(){

// Move to a new location or you can do something else
window.location.href = "<?=base_url()?>admin/usuarios/<?=$user['id']?>/delete";

}, 1000);
swal("Eliminado!", "El usuario ha sido eliminado.", "success");   
} else {     
swal("Cancelado", "El usuario esta seguro :)", "error");   
} 
});
});
</script>