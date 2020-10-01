<?php 
  include "userController.php";
  $userController = new UserController();

  $users = $userController->get();
  echo json_encode($users);
 ?>
<!DOCTYPE html>
<html>

<head>

	<title>Bootstrap</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>

<body>

	<div class="container">

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Monas chinas</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
     
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </div>
</nav>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Home</li>
  </ol>
</nav>





<div class="row">
	<div class="col-12">
		<div class="mb-4">
			<div class="card">
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
    <p class="card-text">Lista de usuarios registrados</p>
    <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-secondary float-right">Añadir usuario</button>
  </div>
</div>

<table class="table table-border table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">email</th>
      <th scope="col">contraseña</th>
      <th scope="col">Estatus</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>
        <a href="otto@example.com">
          otto@example.com
        </a>
      </td>
      <td>@mdo</td>
      <td>
        <button type="button" class="btn btn-warning" data-toggle='modal' data-target='#exampleModal'>
        <i class=" fa fa-pencil"> </i>Editar
      </button>
        <button  onclick="remove(1)" type="button" class="btn btn-danger">
        <i class=" fa fa-trash"> </i> Eliminar
      </button>

      </td>
    </tr>


    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>

		</div>
	</div>
</div>

</nav>

	


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <div class="modal-body">

        <form onsubmit="return validateRegister()">
              <div class="form-group">
                <label for="exampleInputEmail1">Usuario</label>
                
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                  </div>
                  <input type="text" class="form-control" id="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required="">
                </div>

                <small id="emailHelp" class="form-text text-muted">No ingresar números</small>
              </div>
              <div class="form-group">

                <label >Correo electrónico</label>

                
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">E</span>
                    </div>
                    <input type="text" class="form-control" id="email" placeholder="ejemplo@ejemplo.com" aria-label="" aria-describedby="basic-addon1">
                </div>
d
                <label for="exampleInputPassword1">Contraseña</label>
                
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">*</span>
                    </div>
                    <input type="password" class="form-control" placeholder="****" id="password" aria-label="" aria-describedby="basic-addon1">
                </div>

                <label for="exampleInputPassword1">Verificar contraseña</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">*</span>
                    </div>
                    <input type="password" class="form-control" id="password2" placeholder="****" aria-label="" aria-describedby="basic-addon1">
                </div>

              </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
              
            </form>


      </div>

    </div>
  </div>
</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


  <script type="text/javascript">
           
            function validateRegister(){

              if($("#password").val() == $("#password2").val() ){
                return true
              }else{
                $("#password").addClass('is-invalid')
                $("#password2").addClass('is-invalid')
                swal({
                      title: "Error",
                      text: "Las contraseñas no coinciden",
                      icon: "error",
                      button: "Aceptar",
                    });
                return false
              }
            }

            function remove(id){
              swal({
                      title: "Are you sure?",
                      text: "Once deleted, you will not be able to recover this imaginary file!",
                      icon: "warning",
                      buttons: true,
                      dangerMode: true,
                    })
                    .then((willDelete) => {
                      if (willDelete) {
                        swal("Poof! Your imaginary file has been deleted!", {
                          icon: "success",
                        });
                      } else {
                        swal("Your imaginary file is safe!");
                      }
                    });
            }
              
  </script>
            }

</body>

</html>