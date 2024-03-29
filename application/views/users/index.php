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
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                                <h3 class="box-title m-b-0">Gestión de Usuarios</h3>
                                <p class="text-muted m-b-30">Usuarios que pueden administrar la plataforma.</p>
                            <div class="form-group">
                                <a href="<?=base_url()?>admin/usuarios/create" class="btn btn-outline btn-primary btn-sm">
                                    <i class="icon wb-plus" aria-hidden="true"></i>
                                        Agregar Usuario
                                </a>
                            </div>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Email</th>
                                            <th>Acciones</th>
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
                                                        <a href="<?=base_url()?>admin/usuarios/<?=$user['id']?>/delete">
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
                <!-- /.row -->
            </div>