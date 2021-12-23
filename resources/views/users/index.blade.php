<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">       
            <div class="col-md-8 mx-auto">
                <!-- En caso de haber errores los recorre y muetra en pantalla -->
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif
                <div class="card  border-0 shadow">
                    <div class="card-body">
                        <form action="{{route('users.store')}}" method="POST">
                            <div class="row">
                                <div class="col-sm-3">
                                    <input type="text" name="name" id="name" placeholder="Nombre" class="form-control" value="{{old('name')}}">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="email" id="email" placeholder="Email" class="form-control" value="{{old('email')}}">
                                </div>
                                <div class="col-sm-3">
                                    <input type="password" name="password" id="password" placeholder="Contraseña" class="form-control">
                                </div>
                                <div class="col-auto">
                                    <!-- Token de seguridad para el envio de datos al controlador -->
                                    @csrf
                                    <input type="submit" class="btn btn-primary" value="Guardar">
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actualizar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Recorre todos los usuarios y muestras los datos -->
                        @foreach($users as $user)
                        <tr>
                            <!-- Ruta a la cual se derigira al hacer click en el boton, 
                                en este caso al controlador junto al usuario pertinente
                            -->
                            <form action="{{ route('users.update', $user) }}" method="POST">
                            <td>{{$user->id}} </td>
                            <td> <input name="nameUpdate" type="text" value="{{$user->name}}" class="form-control"> </td>
                            <td> <input name ="emailUpdate" type="text" value="{{$user->email}}" class="form-control"> </td>
                            
                            <td>
                                    <!-- Indica el metodo con el que se recibiran los datos -->
                                    @method('PUT')
                                    <!-- Token de seguridad para el envio de datos al controlador -->
                                    @csrf
                                    <input 
                                        type="submit" 
                                        value="Editar" 
                                        class="btn btn-sm btn-success"
                                    >
                                </form>
                            </td>
                            <td>
                                <!-- Ruta a la cual se derigira al hacer click en el boton, 
                                    en este caso al controlador junto al usuario pertinente
                                 -->
                                <form action="{{ route('users.destroy', $user) }}" method="POST">
                                    <!-- Indica el metodo con el que se recibiran los datos -->
                                    @method('DELETE')
                                    <!-- Token de seguridad para el envio de datos al controlador -->
                                    @csrf
                                    <input 
                                        type="submit" 
                                        value="Eliminar" 
                                        class="btn btn-sm btn-danger"
                                    >
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>

    </div>
</body>
</html>