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
                                Créer un client
                            </h1>
                        </div>
                        <div class="col-auto">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Body --}}
            {!! Form::open(['action' => array('CustomerController@store'), 'files' => true,
            'class' => 'mb-4']) !!}
            <div class="row">
                {{csrf_field()}}
                <div class="col-12">
                    <!-- First name -->
                    <div class="form-group">
                        <!-- Label -->
                        <label>
                            Nom du client
                        </label>
                        <!-- Input -->
                        {!! Form::text('title', null, ['class' => 'form-control' . $errors->first('title', '
                        is-invalid'), 'placeholder' => 'Nom du client']) !!}
                        @if($errors->has('title'))<div class="invalid-feedback">Veuillez renseigner le nom du client</div>@endif
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <!-- First name -->
                    <div class="form-group">
                        <!-- Label -->
                        <label>
                            Activité
                        </label>
                        <!-- Input -->
                        {!! Form::text('activity_type', null, ['class' => 'form-control'.
                        $errors->first('activity_type', ' is-invalid'), 'placeholder' =>'Activité']) !!}
                        @if($errors->has('activity_type'))<div class="invalid-feedback">Veuillez renseigner une
                            activité</div>@endif
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <!-- First name -->
                    <div class="form-group">
                        <!-- Label -->
                        <label>
                            SIREN
                        </label>
                        <!-- Input -->
                        {!! Form::text('SIREN', null, ['class' => 'form-control'. $errors->first('SIREN', '
                        is-invalid'), 'placeholder' => '012345678', 'data-mask' => '000000000' ]) !!}
                        @if($errors->has('SIREN'))<div class="invalid-feedback">Veuillez renseigner un numéro de SIREN
                            valide</div>@endif
                    </div>
                </div>
            </div>
            <hr class="mt-4 mb-5">
            <div class="row">
                <div class="col-12">
                    <p class="h3">Adresse de la société</p>
                    <p class="text-muted mb-4">L'adresse va s'autocompléter directement</p>
                </div>
                <div class="col-12">
                    <!-- Address  -->
                    <div class="form-group">
                        <!-- Input -->
                        <input class="form-control mt-2" id="formPlacesAuto" placeholder="Renseigner l'adresse" name="autocompleteAddress"
                            type="text" autocomplete="false" onFocus="initMap();">
                        <input class="form-control mt-2" name="address" id="address" type="hidden">
                        <input class="form-control mt-2" name="postal_code" id="postal_code" type="hidden">
                        <input class="form-control mt-2" name="city" id="city" type="hidden">
                        <input class="form-control mt-2" name="country" id="country" type="hidden">
                        <input class="form-control mt-2" name="lattitude" id="latitude" type="hidden">
                        <input class="form-control mt-2" name="longitude" id="longitude" type="hidden">
                    </div>
                </div>
            </div>
            <hr class="mt-4 mb-5">
            <div class="row">
                <div class="col-12">
                    <p class="h3">Nom du contact</p>
                    <p class="text-muted mb-4">Entrez les informations de la personne avec laquelle vous êtes en contact.</p>
                </div>
                <div class="col-12 col-md-6">
                    <!-- First name -->
                    <div class="form-group">
                        <!-- Label -->
                        <label>
                            Nom
                        </label>
                        <!-- Input -->
                        {!! Form::text('lastname', null, ['class' => 'form-control', 'placeholder' => 'Nom'])
                        !!}
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <!-- First name -->
                    <div class="form-group">
                        <!-- Label -->
                        <label>
                            Prénom
                        </label>
                        <!-- Input -->
                        {!! Form::text('firstname', null, ['class' => 'form-control', 'placeholder' => 'Prénom']) !!}
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <!-- First name -->
                    <div class="form-group">
                        <!-- Label -->
                        <label>
                            Email
                        </label>
                        <!-- Input -->
                        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'user@email.com']) !!}
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <!-- First name -->
                    <div class="form-group">
                        <!-- Label -->
                        <label>
                            Téléphone
                        </label>
                        {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => '0123456789',
                        'data-mask' => '00 00 00 00 00']) !!}
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <!-- First name -->
                    <div class="form-group">
                        <!-- Label -->
                        <label>
                            Poste
                        </label>
                        {!! Form::text('job_title', null, ['class' => 'form-control', 'placeholder' =>
                        'Poste'])!!}
                    </div>
                </div>
            </div>
            <hr class="mt-4 mb-5">
            <div class="row">
                <div class="col-12">
                    <p class="h3">Logo</p>
                    <p class="text-muted mb-4">Ajouter le logo du client de préférence en format 1:1</p>
                </div>
                <div class="col-12">
                    <!-- First name -->
                    <div class="form-group">
                        <div class="custom-file">
                            {!! Form::file('image', array('class' => 'custom-file-input', 'id' => 'logo_img'))
                            !!}
                            <label class="custom-file-label" for="projectCoverUploads">Télécharger le logo</label>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mt-4 mb-5">
            <div class="row">
                <div class="col-12">
                    <!-- First name -->
                    <div class="form-group">
                        <p class="h3">Evénements déjà organisés</p>
                        <p class="text-muted mb-4">Seulement si vous souhaitez ajouter des événements passés avec ce nouveau client</p>
                        <!-- Input -->
                        {!! Form::select('shows_id[]', App\Event::pluck('name','_id'), null, ['class' =>
                        'form-control', 'multiple', 'data-toggle' => 'select']) !!}
                    </div>
                </div>
            </div>
            {!! Form::hidden('is_active', "true") !!}
            {!! Form::hidden('is_deleted', "false") !!}
            <hr class="mt-4 mb-5">
            <div class="row">
                <div class="col-12">
                    <div class="buttons">
                        {!! Form::submit('Créer le client', ['class' => 'btn btn-primary', 'style' => 'float:
                        right'])
                        !!}
                        <a class='btn btn-secondary' style="float: left" href="{{route('index_customer')}}">Annuler</a>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection