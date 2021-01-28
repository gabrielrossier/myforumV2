@extends ('layout')

@section ('content')
    <h1 class="text-center p-5">List Role</h1>
    <br>
    <tr>
        <th>Pseudo</th>
        <th>Role</th>
    </tr>
    @forelse ($users as $user)
    @if($user->role->name == "Administrateur")
        @if(count($admins) > 5)
        <tr data-id="{{$user->id}}">
        <td>{{$user->pseudo}} | {{$user->role->name}} | </td><br/>
        <td>{{$user->pseudo}} | {{$user->role->name}} |  
            @if($user->role->name == "Administrateur")  
            @csrf
            <form action="{{ route('roles.unsetAdmin') }}" method="POST">
            <input type="hidden" id="id" name="id" value="{{$user->id}}"/>
                <button type="submit" class="btn btn-primary" >Dénommer admin</button></td><br/>
            </form>
            @else
            @csrf
                @if(Auth::user()->pseudo != $user->pseudo)
                <form action="{{ route('roles.setAdmin') }}" method="POST"> 
                    <input type="hidden" id="id" name="id" value="{{$user->id}}"/>
                    <button type="submit" class="btn btn-primary" disabled>Nommer admin</button></td><br/>
                </form>
                @endif
            @endif
        @else
        <td>{{$user->pseudo}} | {{$user->role->name}} |  
            
            @if($user->role->name == "Administrateur") 
            @csrf
            <form action="{{ route('roles.unsetAdmin') }}" method="POST">
                <input type="hidden" id="id" name="id" value="{{$user->id}}"/>
                <button type="submit" class="btn btn-primary" >Dénommer admin</button></td><br/>
            </form>
            @else
            @csrf
                @if(Auth::user()->pseudo != $user->pseudo)
                <form action="{{ route('roles.setAdmin') }}" method="POST"> 
                    <input type="hidden" id="id" name="id" value="{{$user->id}}"/>
                    <button type="submit" class="btn btn-primary" >Nommer admin</button></td><br/>
                </form>
                @endif
            @endif

    </tr>

        @endif
    @else
        <p>Vous n'avez pas la permission de voir ce contenu</p>
    @endif
@empty
    <div>Aucun utilisateur</div>
@endforelse

@endsection
