  <div class="row d-flex justify-content-center">
            @if(Auth::user()->roll == 1)
                        <div class="col-12 col-sm-6 col-md-3 raton" onclick="llamarComponente('get/usuarios','visorCompontes');">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Usuarios</span>
                                    <span class="info-box-number">
                                       {{count($datos['usuarios'])}}
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
            @endif
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3 raton" onClick="llamarComponente('get/marcas','visorCompontes');">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i
                                        class="fas fa-tags"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Marcas</span>
                                    <span class="info-box-number">{{count($datos['marcas'])}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>

                        <div class="col-12 col-sm-6 col-md-3 raton" onClick="llamarComponente('get/modelos','visorCompontes');">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-car"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Modelos</span>
                                    <span class="info-box-number">{{count($datos['modelos'])}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="clearfix hidden-md-up"></div>

                        <div class="col-12 col-sm-6 col-md-3 raton" onClick="llamarComponente('get/grafica','visorCompontes');">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-chart-line"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Grafica</span>

                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                    </div>
