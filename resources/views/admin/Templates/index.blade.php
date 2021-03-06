@extends('layouts/templateAdmin')
@section('title', 'Gabarits')
@section('alerts')
@if (session('status'))
<div class="alert alert-{{ session('alert-type') }} alert-dismissible fade show" id="Alert" role="alert"
    data-dismiss="alert">
    {{ session('status') }}
</div>
@endif
@endsection
@section('content')

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
                                Gabarits
                            </h1>
                        </div>
                        <div class="col-auto">
                            <a href="{{action('TemplatesController@create')}}" class="btn btn-primary">
                                Créer un gabarit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="printzonesTable" class="card mt-3" data-toggle="lists"
                data-lists-values='["templates-title", "templates-category", "printzones-width", "printzones-height", "printzones-tray_width", "printzones-tray_height"]'>
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <form class="row align-items-center">
                                <div class="col-auto pr-0">
                                    <span class="fe fe-search text-muted"></span>
                                </div>
                                <div class="col">
                                    <input type="search" class="form-control form-control-flush search"
                                        placeholder="Recherche">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-sm table-nowrap card-table">
                        <thead>
                            <tr>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="printzones-name">
                                        Titre
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="printzones-zone">
                                        Catégorie
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="templates-size-width">
                                        Largeur
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="templates-size-height">
                                        Hauteur
                                    </a>
                                </th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody class="list">
                            @foreach ($templates as $template)
                            <tr>
                                <td class="tamplates-title"><a
                                        href="{{route('edit_templates', $template->id)}}"><b>{{$template->title}}</b></a>
                                </td>
                                @if($template->category !== null)
                                    <td class="templates-category">{{ $template->category }}</td>
                                @else
                                    <td class="templates-category">Mainstream</td>
                                @endif
                                @if(isset($template->size["width"]))
                                <td class="templates-size-width">{{ $template->size["width"] }} mm</td>
                                @else
                                <td class="templates-size-width">...</td>
                                @endif
                                @if(isset($template->size["height"]))
                                <td class="templates-size-height">{{ $template->size["height"] }} mm</td>
                                @else
                                <td class="templates-size-height">...</td>
                                @endif
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-ellipses dropdown-toggle" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                            data-boundary="window">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="{{route('edit_templates', $template->id)}}" class="dropdown-item">
                                                Modifier le gabarit
                                            </a>
                                            @if ($template->is_active == true)
                                            <a class="dropdown-item" onclick="return confirm('Êtes-vous sûr?')"
                                                href="{{route('desactivate_templates', $template->id)}}">
                                                Désactiver </a>
                                            @else
                                            <a class="dropdown-item"
                                                href="{{route('activate_templates', $template->id)}}">Activer</a>
                                            @endif
                                            <hr class="dropdown-divider">
                                            <a class="dropdown-item text-danger"
                                                onclick="return confirm('Êtes-vous sûr?')"
                                                href="{{route('destroy_templates', $template->id)}}"> Supprimer
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
    </div>
</div>
@endsection