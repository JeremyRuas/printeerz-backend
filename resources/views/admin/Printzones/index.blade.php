@extends('layouts/templateAdmin')

@section('content')

@if (session('status'))
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
            </div>
        </div>
    </div>
</div>
@endif

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">

            <!-- Header -->
            <div class="header mt-md-5">
                <div class="header-body">
                    <div class="row align-items-center">
                        <div class="col">

                            <!-- Pretitle -->
                            <h6 class="header-pretitle">
                                Overview
                            </h6>

                            <!-- Title -->
                            <h1 class="header-title">
                                Zones d'impression
                            </h1>

                        </div>
                        <div class="col-auto">

                            <!-- Button -->
                            <a href="{{action('PrintzonesController@create')}}" class="btn btn-primary">
                                Créer une zone
                            </a>

                        </div>
                </div>
            </div>

            <!-- Card -->
            <div id="printzonesTable" class="card mt-3" data-toggle="lists" data-lists-values='["printzones-name", "printzones-zone", "printzones-width", "printzones-height", "printzones-tray_width", "printzones-tray_height"]'>
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
                                    <a href="#" class="text-muted sort" data-sort="printzones-name">
                                        Nom
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="printzones-zone">
                                        Zone
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="printzones-width">
                                        Largeur
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="printzones-height">
                                        Hauteur
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="printzones-tray_width">
                                        Largeur de plateau
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="printzones-tray_height">
                                        Hauteur de plateau
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="printzones-is_active">
                                        Status
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="printzones-description">
                                        Description
                                    </a>
                                </th>
                                
                            </tr>
                        </thead>

                        <tbody class="list">
                                @foreach ($printzones as $printzone)
                                <tr>
                                    <td class="printzones-name"><a href="{{route('edit_printzones', $printzone->id)}}"><b>{{ $printzone->name }}</b></a></td>
                                    <td class="printzones-zone"><b>{{ $printzone->zone }}</b></td>
                                    <td class="printzones-width"><b>{{ $printzone->width }}</b></td>
                                    <td class="printzones-height"><b>{{ $printzone->height }}</b></td>
                                    <td class="printzones-tray_width"><b>{{ $printzone->tray_width }}</b></td>
                                    <td class="printzones-tray_height"><b>{{ $printzone->tray_height }}</b></td>
                                    <td class="printzones-is_active">
                                        @if ($printzone->is_active == true)<span class="badge badge-soft-success">Activé</span>
                                        @else <span class="badge badge-soft-secondary">Désactivé</span>
                                        @endif
                                    </td>
                                    <td class="printzones-description"><b>{{ $printzone->description }}</b></td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-ellipses dropdown-toggle" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                data-boundary="window">
                                                <i class="fe fe-more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="{{route('show_printzones', $printzone->id)}}" class="dropdown-item">
                                                    Voir la zone d'impression
                                                </a>
                                            </div>
                                        </div>
                                    </td>        
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- / .row -->
</div>

@endsection