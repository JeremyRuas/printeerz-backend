@extends('layouts/templateAdmin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-8">
            <!-- Header -->
            <div class="header">
                <div class="header-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <!-- Pretitle -->
                            <h6 class="header-pretitle">
                                CREATION
                            </h6>
                            <!-- Title -->
                            <h1 class="header-title">
                                Créer une zone d'impression
                            </h1>
                        </div>
                        <div class="col-auto">
                        </div>
                    </div>
                </div>
            </div>
            {{-- Body --}}
            {!! Form::open(['action' => array('PrintzonesController@store'), 'files' => true, 'class' => 'mb-4']) !!}
            {{csrf_field()}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>
                                            Nom de la zone
                                        </label>
                                        {!! Form::text('name', null, ['class' => 'form-control'. $errors->first('name', ' is-invalid'), 'placeholder' => 'Nom'])!!}
                                        @if($errors->has('name'))<div class="invalid-feedback">Veuillez renseigner ce champ</div>@endif
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Zone
                                        </label>
                                        {!! Form::text('zone', null, ['class' => 'form-control'. $errors->first('name', ' is-invalid'), 'placeholder' => 'Nom'])!!}
                                        @if($errors->has('zone'))<div class="invalid-feedback">Veuillez renseigner ce champ</div>@endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-header-title">
                                Taille de la zone d'impression
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>
                                            Largeur (cm)
                                        </label>
                                        {!! Form::number('width', null, ['class' => 'form-control'. $errors->first('width', ' is-invalid'), 'placeholder' =>'Largeur de la zone ']) !!}
                                        @if($errors->has('width'))<div class="invalid-feedback">Veuillez renseigner ce champ</div>@endif
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>
                                            Hauteur (cm)
                                        </label>
                                        {!! Form::number('height', null, ['class' => 'form-control'. $errors->first('height', ' is-invalid'), 'placeholder' =>'Hauteur de la zone']) !!}
                                        @if($errors->has('height'))<div class="invalid-feedback">Veuillez renseigner ce champ</div>@endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-header-title">
                                Taille du plateau
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>
                                            Largeur (cm)
                                        </label>
                                        {!! Form::number('tray_width', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <!-- First name -->
                                    <div class="form-group">
                                        <!-- Label -->
                                        <label>
                                            Hauteur (cm)
                                        </label>
                                        <!-- Input -->
                                        {!! Form::number('tray_height', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-header-title">
                                Position du plateau
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <!-- First name -->
                                    <div class="form-group">
                                        <!-- Label -->
                                        <label>
                                            X (cm)
                                        </label>
                                        <!-- Input -->
                                        {!! Form::number('origin_x', null, ['class' => 'form-control', 'placeholder' =>
                                        'Position X d\'origine sur le plateau']) !!}
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <!-- First name -->
                                    <div class="form-group">
                                        <!-- Label -->
                                        <label>
                                            Y (cm)
                                        </label>
                                        <!-- Input -->
                                        {!! Form::number('origin_y', null, ['class' => 'form-control', 'placeholder' =>
                                        'Position Y d\'origine sur le plateau']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-header-title">
                                Description
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input id="textDescription" type="textarea" class="description" name="description" rows="3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" >
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                <div class="custom-control custom-switch">
                                    <input name="is_active" type="checkbox" class="custom-control-input" id="isActive">
                                    <label class="custom-control-label" for="isActive">Ce composant est-il actif ?</label>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::hidden('is_active', 'false', [ 'id'=>'formActive']) !!}
            {!! Form::hidden('is_deleted', "false") !!}
            <div class="row">
                <div class="col-12">
                    <div class="buttons">
                        {!! Form::submit('Créer la zone', ['class' => 'btn btn-primary', 'style' => 'float: right']) !!}
                        <a class='btn btn-secondary' style="float: left" href="{{route('index_printzones')}}">Annuler</a>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection