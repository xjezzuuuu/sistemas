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
                                <h3 class="box-title m-b-0">Gestión de Entradas</h3>
                                <p class="text-muted m-b-30">Gestione las entradas para los diferentes eventos creados.</p>
                            <div class="form-group">
                                <a href="<?=base_url()?>admin/entradas/create" class="btn btn-outline btn-primary btn-sm">
                                    <i class="icon wb-plus" aria-hidden="true"></i>
                                        Agregar entrada
                                </a>
                            </div>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Tipo</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>Evento</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($allTickets as $tickets): ?>
                                            <tr>
                                                <td><?=$tickets['id']?></td>
                                                <td><?=$tickets['name']?></td>
                                                <td><?=$tickets['type']?></td>
                                                <td><?=$tickets['price']?></td>
                                                <td><?=$tickets['quantity']?></td>
                                                <td><?php foreach($allEvents as $events): ?>
                                                <?php if ($tickets['event_id'] === $events['id']): ?>
                                                    <?=$events['name']?>
                                                <?php endif; ?>
                                                    
                                                <?php endforeach; ?>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-action-table">
                                                        <a href="<?=base_url()?>admin/entradas/<?=$tickets['id']?>/edit">
                                                            <span class="btn btn-warning fa fa-pencil"></span>
                                                        </a>
                                                        <a href="<?=base_url()?>admin/entradas/<?=$tickets['id']?>/delete">
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
            </div></div></div>