<h3>Lista de permisos</h3>
<div class="form-group">
 <ul class="list-unstyled">
     @foreach ($permissions as $permission)
        <li>
            <label>
                {!! Form::checkbox('permissions[]', $permission->id, null) !!}
                {{$permission->description}}
            </label>
        </li>
     @endforeach
 </ul>
</div>