@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des utilisateurs
                  @can('delete-users')
                  <a class="btn btn-primary" href="{{ route('register') }}">{{ __('Register') }}</a>
                  @endcan
                <a class="btn btn-primary" href="{{route('portail')}}">portail</a>
                </div>

                <div class="card-body">
                 <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">N°</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Email</th>
                        <th scope="col">Roles</th>
                        <th scope="col">Actions </th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td >{{$user->name}}</td>
                            <td >{{$user->email}}</td>
                            <td >{{implode(' , ' , $user->roles()->get()->pluck('name')->toArray())}}</td>
                            <td >
                              @can('edit-users')
                                <a href="{{route('admin.users.edit',$user->id)}}"><button class="btn btn-primary">Editer</button></a>
                              @endcan
                                @can('delete-users')
                                <form action="{{route('admin.users.destroy',$user->id)}}" method="post" class="d-inline">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-warning">Suprimer</button>
                                </form>
                            @endcan
                            </td>
                        </tr>
                  @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
