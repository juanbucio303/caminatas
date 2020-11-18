<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>
        <link rel="shortcut icon" href="../../img/favicon.png" >
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" href="../../css/mdb.min.css">
        <link rel="stylesheet" href="../../css/normalize.css">
        <link rel="stylesheet" href="../../css/lightbox.css">
        <link rel="stylesheet" href="../../css/styleAdmin.css">
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <script src="../../js/jquery-3.3.1.min.js" charset="utf-8"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="../../js/popper.min.js" charset="utf-8"></script>
        <script src="../../js/mdb.min.js" charset="utf-8"></script>
        <script src="../../js/bootstrap.min.js" charset="utf-8"></script>
        <script src="../../js/fontawesome-all.js" charset="utf-8"></script>
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        <script src="../../js/intern/app.js"></script>
        <script src="../../js/intern/init.js?v=<?php echo(rand()); ?>"></script>
        <script src="../../js/intern/FormSerialize.js"></script>
        <script src="../../js/intern/data.js"></script>
        <script>
            $(document).ready(function(){
                authentication("../../session")
            })
        </script>
    </head>
    <body>
        <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-storage.js"> </script>
        <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-database.js"></script>
        <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-firestore.js"></script>
        <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-messaging.js"></script>
        <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-functions.js"></script>
        <script src="adoption.js"></script>

        <div class="wrapper d-flex align-items-stretch">
            <nav id="sidebar">
                <div class="p-4 pt-5">
                <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.jpg);"></a>
                <ul class="list-unstyled components mb-5">
                    <div class="list-group" id="list-tab" role="tablist">
                        <li>
                            <a href="../">Caminatas caninas</a>
                        </li>
                        <li class="active">
                            <a>Adopciones</a>
                        </li>
                        <li>
                            <a href="../news">Noticias y avisos</a>
                        </li>
                        <li>
                            <a href="../users">Usuarios</a>
                        </li>
                        <li>
                            <a href="../info">Información contacto</a>
                        </li>
                        <li>
                            <a href="../about">Acerca de nosotros</a>
                        </li>
                        <li>
                            <a href="../ayudog">Ayudog</a>
                        </li>
                        <li>
                            <a href="../visual/">Admin visual</a>
                        </li>
                        <li>
                            <a id="logout" style="font-weight: bold;">Cerrar Sesión <i class="fas fa-sign-out-alt"></i></a>
                        </li>
                    </div>
                </ul>

            <div class="footer">
                
            </div>

        </div>
            </nav>

            <!-- Page Content  -->
            <div id="content" class="p-4 p-md-5">
                <a id="saveList" class="float-save text-white d-none">
                    <i class="fa fa-save" style="margin-top: 19px;"></i>
                </a>
                <a id="add" class="float text-white">
                    <i class="fa fa-plus my-float"></i>
                </a>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">

                        <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                        </button>
                        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fa fa-bars"></i>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="../">Caminatas caninas</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Adopciones</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../news">Noticias y avisos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../users">Usuarios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../info">Información contacto</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../about">Acerca de nosotros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../ayudog">Ayudog</a>
                            </li>
                        </ul>
                        </div>
                    </div>
                </nav>
                <style>
                    .item:hover {
                        background-color: #E9760A;
                        color: white;
                    }
                    .table100-head {
                        font-family: OpenSans-Regular;
                        font-size: 18px;
                        color: #fff;
                        line-height: 1.2;
                        font-weight: unset;
                    }
                    .float{
                        position:fixed;
                        width:55px;
                        height:55px;
                        bottom:40px;
                        right:5px;
                        background-color:#FF3547;
                        color:#FFF;
                        border-radius:50px;
                        text-align:center;
                        box-shadow: 2px 2px 3px #999;
                    }
                    .float-save{
                        position:fixed;
                        width:55px;
                        height:55px;
                        bottom:100px;
                        right:5px;
                        font-size: 20px;
                        background-color:#4935ff;
                        color:#FFF;
                        border-radius:50px;
                        text-align:center;
                        box-shadow: 2px 2px 3px #999;
                    }

                    .my-float{
                        margin-top:22px;
                    }
                </style>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list-caminatas-list">
                        <div id="render-content">
                            <h2 class="mb-4">Adopciones</h2>
                            <div class="container-fluid inner">
                                <table class="table table-bordered table-responsive">
                                    <thead class="table100-head" style="background: #36304A;">
                                        <tr class="tableizer-firstrow">
                                            <th>Archivo</th>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Edad</th>
                                            <th>Genero</th>
                                            <th>Tamaño</th>
                                            <th>Vacunado</th>
                                            <th>Desparasitado</th>
                                            <th>Esterilizado</th>
                                            <th>Adoptado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="render"></tbody>
                                    
                                </table>
                            
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--Adopciones-->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <div class="col-12">
                    <div class="row p-3">
                        <div class="col-6">
                            <label for="basic-url">Nombre</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="nombre" aria-describedby="basic-addon3">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="basic-url">Tamaño</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="tamanio" aria-describedby="basic-addon3">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="basic-url">Genero</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="genero" aria-describedby="basic-addon3">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="basic-url">Edad</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="edad" aria-describedby="basic-addon3">
                            </div>
                        </div>
                        <div class="col-3">
                        <label for="basic-url">Vacunado</label>
                        <div class="input-group mb-3">
                            <select class="form-control" name="vacunado" id="vacunado">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <label for="basic-url">Desparasitado</label>
                        <div class="input-group mb-3" >
                            <select class="form-control" name="desparasitado" id="desparasitado">
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <label for="basic-url">Esterilizado</label>
                        <div class="input-group mb-3" >
                            <select class="form-control" name="esterilizado" id="esterilizado">
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <label for="basic-url">Adoptado</label>
                        <div class="input-group mb-3" >
                            <select class="form-control" name="adopted" id="adopted">
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                        <div class="col-12">
                            <label for="basic-url">Imagen</label>
                            <div class="input-group mb-3">
                                <input type="file" id="file-input-adoption" class="form-control" aria-describedby="basic-addon3">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group green-border-focus">
                                <label for="basic-url">Descripción</label>
                                <textarea id="descripcionAdoption" class="form-control" id="exampleFormControlTextarea5" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-12">
                    <button id="accept" type="button" class="btn btn-primary btn-block">Aceptar</button>
                </div>
            </div>
        </div>
        </div>
    </div>

<!--Adopciones Editar-->
    <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <form id="form">
                    <div class="col-12">
                        <div class="row p-3">
                            <div class="col-6">
                                <input type="hidden" name="key" id="key">
                                <label for="basic-url">Nombre</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="nombre" class="form-control" id="nombreE" aria-describedby="basic-addon3">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="basic-url">Tamaño</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="tamanio" class="form-control" id="tamanioE" aria-describedby="basic-addon3">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="basic-url">Genero</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="genero" class="form-control" id="generoE" aria-describedby="basic-addon3">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="basic-url">Edad</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="edad" class="form-control" id="edadE" aria-describedby="basic-addon3">
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="basic-url">Vacunado</label>
                                <div class="input-group mb-3">
                                    <select class="form-control" name="vacunado" id="vacunadoE">
                                    <option value="Si">Si</option>
                                    <option value="No" selected>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="basic-url">Desparasitado</label>
                                <div class="input-group mb-3" >
                                    <select class="form-control" name="desparasitado" id="desparasitadoE">
                                        <option value="Si">Si</option>
                                        <option value="No" selected>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="basic-url">Esterilizado</label>
                                <div class="input-group mb-3" >
                                    <select class="form-control" name="esterilizado" id="esterilizadoE">
                                        <option value="Si">Si</option>
                                        <option value="No" selected>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <label for="basic-url">Adoptado</label>
                                <div class="input-group mb-3" >
                                    <select class="form-control" name="adopted" id="adoptedE">
                                        <option value="1">Si</option>
                                        <option value="0" selected>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="basic-url">Imagen</label>
                                <div class="input-group mb-3">
                                    <input type="hidden" name="imageName" id="imageName">
                                    <input type="file" id="file-input-adoption-edit" class="form-control" aria-describedby="basic-addon3">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group green-border-focus">
                                    <label for="basic-url">Descripción</label>
                                    <textarea id="descripcionOptionEdit" name="descripcion" class="form-control" rows="3"></textarea>
                                </div>
                            </div>  
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="col-12">
                    <button id="acceptEdit" type="button" class="btn btn-primary btn-block">Aceptar</button>
                </div>
            </div>
        </div>
        </div>
    </div>

    <div class="modal fade" id="modalUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Subiendo información</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
              <div class="modal-body">
                  <div class="col-12 text-center">
                      <label>Subiendo información por favor espere</label>
                      <div class="row">
                        <div class="offset-1 col-10">
                          <div class="preloader"></div>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
    </div>

    <div class="modal fade" id="modalDeleteConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminando</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
              <div class="modal-body">
                  <div class="col-12 text-center">
                      <label>¿Esta seguro de Eliminar esta publicación?</label>
                      <div class="row">
                        <div class="offset-1 col-10">
                            <div class="row">
                                <div class="col-6">
                                    <a id="yesdelete" class="btn btn-primary btn-block">Si</a>
                                </div>
                                <div class="col-6">
                                    <a id="notDelete" class="btn btn-danger btn-block">No</a>
                                </div>
                            </div>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
    </div>

    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminando</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
              <div class="modal-body">
                  <div class="col-12 text-center">
                      <label>Eliminando información por favor espere</label>
                      <div class="row">
                        <div class="offset-1 col-10">
                          <div class="preloader"></div>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
    </div>

    </body>
</html>