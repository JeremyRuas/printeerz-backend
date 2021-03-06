@extends('layouts/templateAdmin')
@section('title', 'Utilisateurs')

@section('content')

@if (session('status'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('status') }}
</div>
@endif

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-8">
            <div class="header mt-md-5">
                <div class="header-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="header-pretitle">
                                Overview
                            </h6>
                            <h1 class="header-title">
                                Utilisateurs
                            </h1>
                        </div>
                        <div class="col-auto">
                            <a href="{{action('UserController@create')}}" class="btn btn-primary">
                                Créer un utilisateur
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="userTable" class="card mt-3" data-toggle="lists" data-lists-values='["user-id", "user-lastname", "user-firstname", "user-email", "user-role","user-status", "user-date"]'>
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <!-- Search -->
                            <form class="row align-items-center">
                                <div class="col-auto pr-0">
                                    <span class="fe fe-search text-muted"></span>
                                </div>
                                <div class="col">
                                    <input type="search" class="form-control form-control-flush search" placeholder="Recherche">
                                </div>
                            </form>
                        </div>
                    </div> <!-- / .row -->
                </div>
                <div class="table-responsive">
                    <table class="table table-sm table-nowrap card-table">
                        <thead>
                            <tr>
                                <th>
                                    <a href="#">
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="user-lastname">
                                        Nom
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="user-firstname">
                                        Prénom
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="user-email">
                                        Email
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="user-role">
                                        Rôle
                                    </a>
                                </th>
                                <th colspan="2">
                                    <a href="#" class="text-muted sort" data-sort="user-status">
                                        Statut
                                    </a>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="list">
                            @foreach ($users as $user)
                            <tr>
                                <td class="align-middle user-avatar">
                                    @if(!empty($user->profile_img) && $disk->exists($user->profile_img))
                                    <div class="avatar avatar-sm">
                                        <img src="{{$disk->url($user->profile_img)}}" class="avatar-img rounded-circle"
                                            alt="img_profile">
                                    </div>
                                    @else <!--Initials-->
                                    <div class="avatar-sm">
                                        <?php 
                                        $avatarLastName = $user->lastname; 
                                        $avatarFirstName = $user->firstname; 
                                        $avatarInitials = $avatarFirstName[0] . $avatarLastName[0];
                                        ?>
                                        <span class="avatar-title rounded-circle">{{ $avatarInitials }}</span>
                                    </div>
                                    @endif
                                </td>
                                <td class="align-middle user-lastname">{{ $user->lastname }}</td>
                                <td class="align-middle user-firstname">{{ $user->firstname }}</td>
                                <td class="align-middle user-email">{{ $user->email }}</td>
                                <td class="align-middle user-role">
                                    @if ($user->role == 2) Administrateur
                                    @elseif ($user->role == 1)Opérateur
                                    @else Technicien
                                    @endif
                                </td>
                                <td class="align-middle user-status">
                                    @if ($user->is_active == true)<span class="badge badge-soft-success">Activé</span>
                                    @else <span class="badge badge-soft-secondary">Désactivé</span>
                                    @endif
                                </td>
                                {{-- Menu --}}
                                <td class="align-middle text-right">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false" data-boundary="window">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="{{route('edit_user', $user->id)}}" class="dropdown-item">
                                                Modifier l'utilisateur
                                            </a>
                                            @if ($user->is_active == true)
                                                <a class="dropdown-item" onclick="return confirm('Êtes-vous sûr?')" href="{{route('desactivate_user', $user->id)}}">
                                                Désactiver </a>
                                            @else
                                                <a class="dropdown-item" href="{{route('activate_user', $user->id)}}">Activer</a>
                                            @endif
                                                <hr class="dropdown-divider">
                                                <a class="dropdown-item text-danger" onclick="return confirm('Êtes-vous sûr?')"
                                                    href="{{route('destroy_user', $user->id)}}"> Supprimer </a>
                                        </div>
                                    </div>
                                </td>
                                @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <nav aria-label="customers-table-pagination" class="float-right">
                        <ul class="pagination">
                        </ul>
                    </nav>
                </div>
            </div>

        </div>
    </div> <!-- / .row -->
</div>

@endsection