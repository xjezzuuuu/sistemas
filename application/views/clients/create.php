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
                            <li><a href="<?=base_url()?>admin/clientes">Clientes</a></li>
                            <li class="active"><?php if(!empty($subtitle)): echo $subtitle; endif; ?></li>
                        </ol>
                    </div>
                    <!-- /.breadcrumb -->
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="white-box">
                            <h3 class="box-title">Crear Cliente</h3>
                            <p>Usted esta creando un cliente los cuales podrán realizar la compra de entradas.</p>
                            <br>
                            <form class="floating-labels" method="post" action="<?=base_url()?>admin/clientes/store" enctype="multipart/form-data">  
                                <div class="form-group m-b-40">
                                    <input type="text" class="form-control" name="rut" id="rut" required><span class="highlight"></span> <span class="bar"></span>
                                    <label for="rut">Rut</label>
                                </div>
                                <div class="form-group m-b-40">
                                    <input type="text" class="form-control" name="name" id="name" required><span class="highlight"></span> <span class="bar"></span>
                                    <label for="name">Nombre</label>
                                </div>
                                <div class="form-group m-b-40">
                                    <input type="text" class="form-control" name="last_name_p" id="last_name_p" required><span class="highlight"></span> <span class="bar"></span>
                                    <label for="last_name_p">Apellido Paterno</label>
                                </div>
                                <div class="form-group m-b-40">
                                    <input type="text" class="form-control" name="last_name_m" id="last_name_m" required><span class="highlight"></span> <span class="bar"></span>
                                    <label for="last_name_m">Apellido Materno</label>
                                </div>
                                <div class="form-group m-b-40">
                                    <input type="email" class="form-control" name="email" id="email" required><span class="highlight"></span> <span class="bar"></span>
                                    <label for="email">E-mail</label>
                                </div>
                                <div class="form-group m-b-40">
                                    <select class="form-control p-0" name="gender" id="gender" required>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                    </select><span class="highlight"></span> <span class="bar"></span>
                                    <label for="gender">Género</label>
                                </div>
                                <div class="form-group m-b-40">
                                    <input type="text" class="form-control" name="age" id="age" required><span class="highlight"></span> <span class="bar"></span>
                                    <label for="age">Edad</label>
                                </div>
                                <div class="block text-center mb-xl-4">
                                    <input name="submit" type="submit" value="Crear Cliente" class="fcbtn btn btn-success btn-outline btn-1d">
                                    <a href="<?=base_url()?>admin/clientes" class="fcbtn btn btn-danger btn-outline btn-1d">Cancelar</a>
                                </div>
                            </form>
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