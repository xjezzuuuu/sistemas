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
							    <a class="fcbtn btn btn-success btn-outline btn-1d" href="<?=base_url()?>admin/clientes/create">Crear Cliente</a>
						    </div>
                            <h3 class="box-title">Gestionar Clientes</h3>
                            <p>Administre los clientes que podrán realizar la compra de entradas.</p>
                            <div class="table-responsive">
                                <table class="table color-table inverse-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Rut</th>
                                            <th>Nombre</th>
                                            <th>Apellido Paterno</th>
                                            <th>Apellido Materno</th>
                                            <th>Correo</th>
                                            <th>Género</th>
                                            <th>Edad</th>
                                            <th class="text-center">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($allClients as $clients): ?>
                                            <tr>
                                                <td><?=$clients['id']?></td>
                                                <td><?=$clients['rut']?></td>
                                                <td><?=$clients['name']?></td>
                                                <td><?=$clients['last_name_p']?></td>
                                                <td><?=$clients['last_name_m']?></td>
                                                <td><?=$clients['email']?></td>
                                                <td><?=$clients['gender']?></td>
                                                <td><?=$clients['age']?></td>
                                                <td class="text-center">
                                                    <div class="btn-action-table">
                                                        <a href="<?=base_url()?>admin/clientes/<?=$clients['id']?>/edit">
                                                            <span class="btn btn-warning fa fa-pencil"></span>
                                                        </a>
                                                        <a href="<?=base_url()?>admin/clientes/<?=$clients['id']?>/delete">
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
                <!-- .row -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                <a href="javascript:void(0)"><img src="<?=asset()?>images/users/varun.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="<?=asset()?>images/users/genu.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="<?=asset()?>images/users/ritesh.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="<?=asset()?>images/users/arijit.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="<?=asset()?>images/users/govinda.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="<?=asset()?>images/users/hritik.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="<?=asset()?>images/users/john.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="<?=asset()?>images/users/pawandeep.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.right-sidebar -->
            </div>