<h1>{{ $modo  }} estudiante</h1>

@if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach( $errors->all() as $error )
            <li>{{ $error }}</li>
            @endforeach     
        </ul>
    </div>
@endif

<div class="form-group">
    <label for="Nombre"> Nombre </label>
        <input class="form-control" type="text" name="Nombre" value="{{ isset($estudiante->Nombre)?$estudiante->Nombre:'' }}" id="Nombre">

</div>

<div class="form-group">
    <label for="Apellido"> Apellido </label>
    <input class="form-control" type="text" name="Apellido" value="{{ isset($estudiante->Apellido)?$estudiante->Apellido:'' }}" id="Apellido">
</div>

<div class="form-group">
    <label for="Cedula"> Cedula </label>
    <input class="form-control" type="text" name="Cedula" value="{{ isset($estudiante->Cedula)?$estudiante->Cedula:'' }}" id="Cedula">
</div>

<div class="form-group input-group">
    <label for="Telefono"> Telefono </label>
    <select class="form-control" name="Operadora" id="Operadora">
        <option value=""></option>
        <option value="0414">0414</option>
        <option value="0424">0424</option>
        <option value="0412">0412</option>
        <option value="0416">0416</option>
        <option value="0426">0426</option>
    </select>
    <span class="input-group-addon">-</span>
    <input class="form-control" type="text" name="Telefono" value="{{ isset($estudiante->Telefono)?$estudiante->Telefono:'' }}" id="Telefono">
</div>

<div class="form-group">
    <label for="Correo"> Correo </label>
    <input class="form-control" type="email" name="Correo" value="{{ isset($estudiante->Correo)?$estudiante->Correo:'' }}" id="Correo">
</div>

<div class="form-group">
    <label for="Direccion"> Direccion </label>
    <input class="form-control" type="text" name="Direccion" value="{{ isset($estudiante->Direccion)?$estudiante->Direccion:'' }}" id="Direccion">
</div>

<div class="form-group">
    <label for="Estado"> Estado </label>
    <select class="form-control" type="text" name="Estado" value="{{ isset($estudiante->Estado)?$estudiante->Estado:'' }}" id="Estado">
        <option value=""></option>
        <option value="Carabobo">Carabobo</option>
        <option value="Aragua">Aragua</option>
        <option value="Caracas">Caracas</option>
    </select>
</div>


<div class="form-group">
    <label for="Municipio"> Municipio </label>
    <select class="form-control" type="text" name="Municipio" value="{{ isset($estudiante->Municipio)?$estudiante->Municipio:'' }}" id="Municipio">
        <option value='' disabled hidden selected>Seleccione Municipio</option>
    </select>
</div> 

<div class="form-group">
    <label for="FechaDeNacimiento"> Fecha de Nacimiento </label>
    <input class="form-control" type="date" name="FechaDeNacimiento" value="{{ isset($estudiante->FechaDeNacimiento)?$estudiante->FechaDeNacimiento:'' }}" id="FechaDeNacimiento">
</div>

<div class="form-group">
    <label for="MateriasCursadas"> Materias Cursadas </label>
    <input class="form-control" type="text" name="MateriasCursadas" value="{{ isset($estudiante->MateriasCursadas)?$estudiante->MateriasCursadas:'' }}" id="MateriasCursadas">
</div>

<div class="form-group">
    <label for="Foto"> Foto </label>
    @if(isset($estudiante->foto))
    <img src="{{ asset('storage').'/'.$estudiante->foto }}" width="100" alt="">
    @endif
    <input class="form-control" type="file" name="Foto" value="" id="Foto">
</div>
    <input class="btn btn-success" type="submit" value="{{ $modo }} datos">
    <a href="{{ url('estudiante') }}" class="btn btn-primary">Regresar</a>

<script>
    window.addEventListener('load',()=>{
        let estado = null
        const const municipios = {
        aragua: [
            'Bolívar',
            'Camatagua',
            'Francisco Linares Alcántara',
            'Girardot',
            'José Ángel Lamas',
            'José Félix Ribas',
            'José Rafael Revenga',
            'Libertador',
            'Mario Briceño Iragorry',
            'Ocumare de la Costa de Oro',
            'San Casimiro',
            'San Francisco de Asís',
            'San Sebastián',
            'Santiago Mariño',
            'Santos Michelena',
            'Sucre',
            'Tovar',
            'Urdaneta',
            'Zamora',
        ],
        carabobo: [
            'Bejuma',
            'Carlos Arvelo',
            'Diego Ibarra',
            'Guacara',
            'Juan José Mora',
            'Libertador',
            'Los Guayos',
            'Miranda',
            'Montalbán',
            'Naguanagua',
            'Puerto Cabello',
            'San Diego',
            'San Joaquín',
            'Valencia',
        ],
        distritoCapital: [
            'Libertador',
            'Chacao',
            'Baruta',
            'El Hatillo',
            'Sucre',
        ],
        };

        const handleChange = ({target:{value}}) => {
            estado = value  
            
        }

        const estadoElement = document.getElementById('Estado');
        const municipioElement = document.getElementById('Municipio')

        estadoElement.addEventListener('change', handleChange)

    });
</script>