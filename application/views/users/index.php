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
                            <h1 align="center">JUpload PHP Sample Page</h1>
<div align="center">
<APPLET
    CODE="wjhk.jupload2.JUploadApplet"
    NAME="JUpload"
    ARCHIVE="C:\Program Files\DigitalPersona\One Touch SDK\Java\Samples\Console\dist\ConsoleSample.jar"
    WIDTH="640"
    HEIGHT="300"
    MAYSCRIPT="true"
    ALT="The java pugin must be installed.">
    <param name="postURL" value="ftp://username:password@host:21/testupload" />
    <param name="ftpCreateDirectoryStructure" value="true" />
    <param name="showLogWindow" value="onError">
    <param name="afterUploadURL" value="javascript:alert('Upload done');">
    <param name="debugLevel" value="99">
    <param name="showStatusBar" value="True">
    <param name="maxFileSize" value="25000000">
    <param name="maxChunkSize" value="25000000">
    <param name="httpUploadParameterType" value="iteration">
    <param name="nbFilesPerRequest" value="100">
    <param name="stringUploadSuccess" value="SUCCESS">
    <param name="stringUploadWarning" value="WARNING">
    <param name="stringUploadError" value="ERROR">

    Java 1.5 or higher plugin required. 

</APPLET>
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