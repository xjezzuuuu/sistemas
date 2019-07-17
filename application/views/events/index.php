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
							    <a class="fcbtn btn btn-success btn-outline btn-1d" href="<?=base_url()?>admin/eventos/create">Crear Evento</a>
						    </div>
                            <h3 class="box-title">Gestionar Eventos</h3>
                            <p>Administre los eventos a los cuales se podrá comprar entradas.</p>
                            <div class="table-responsive">
                                <table class="table color-table inverse-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Fecha</th>
                                            <th>Capacidad</th>
                                            <th>Dirección</th>
                                            <th>Ciudad</th>
                                            <th>País</th>
                                            <th class="text-center">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($allEvents as $events): ?>
                                            <tr>
                                                <td><?=$events['id']?></td>
                                                <td><?=$events['name']?></td>
                                                <td><?=$events['date']?></td>
                                                <td><?=$events['capacity']?></td>
                                                <td><?=$events['address']?></td>
                                                <td><?=$events['city']?></td>
                                                <td><?=$events['country']?></td>
                                                <td></td>
                                                <td class="text-center">
                                                    <div class="btn-action-table">
                                                        <a href="<?=base_url()?>admin/eventos/<?=$events['id']?>/edit">
                                                            <span class="btn btn-warning fa fa-pencil"></span>
                                                        </a>
                                                        <a href="<?=base_url()?>admin/eventos/<?=$events['id']?>/delete">
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