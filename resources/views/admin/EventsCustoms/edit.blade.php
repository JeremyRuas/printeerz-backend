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
                                    MODIFICATION
                                </h6>
                                <!-- Title -->
                                <h1 class="header-title">
                                    Configurer une personnalisation
                                </h1>
                            </div>
                            <div class="col-auto">
                            </div>
                        </div>
                    </div>
                </div>
    
                {{-- Body --}}
    
                {!! Form::open(['action' => array('EventsCustomsController@update'), 'files' => true,'class' => 'mb-4']) !!}
                {{csrf_field()}}
    
                {{-- Custom title --}}
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>
                                        Nom du produit
                                    </label>
                                    {!! Form::text('title', $events_custom->title, ['class' => 'form-control', 'placeholder' => '']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <?php $i=0; ?>
                @foreach($templates as $template)
                <?php $array_template = $events_custom->template ?>
                    @if($template->id == reset($array_template))
                        @foreach($template_components as $template_component)
                            @foreach($template->components_ids as $component_id)
                                @if($template_component->id == $component_id)
                                    @if($template_component->type = 'input')
                                        <?php $i++; ?>
    
                                        {{-- Store template_composant id --}}
                                        <input type="hidden" class="form-control" name="{{'template_component_id'.$i}}" value="{{$template_component->id}}">
    
                                        {{-- Custom size --}}
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="card-header-title">
                                                            Taille du composant
                                                        </h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12 col-md-6">
                                                                <!-- First name -->
                                                                <div class="form-group">
                                                                    <!-- Label -->
                                                                    <label>
                                                                        Hauteur (cm)
                                                                    </label>
                                                                    <!-- Input -->
                                                                    {!! Form::number('height'.$i, $template_component->size["height"],
                                                                    ['class' => 'form-control', 'placeholder' => '']) !!}
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <!-- First name -->
                                                                <div class="form-group">
                                                                    <!-- Label -->
                                                                    <label>
                                                                        Largeur (cm)
                                                                    </label>
                                                                    <!-- Input -->
                                                                    {!! Form::number('width'.$i, $template_component->size["width"],
                                                                    ['class' => 'form-control', 'placeholder' => '']) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    
                                        {{-- Custom position --}}
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="card-header-title">
                                                            Position du composant
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
                                                                    {!! Form::number('origin_x'.$i, $template_component->origin["x"], ['class' =>
                                                                    'form-control', 'placeholder' =>'0']) !!}
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
                                                                    {!! Form::number('origin_y'.$i, $template_component->origin["y"], ['class' =>
                                                                    'form-control', 'placeholder' => '0']) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    
                                        {{-- Custom option --}}
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-header-title">
                                                            {{$template_component->title}}
                                                        </h3>
                                                    </div>
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <!-- Label -->
                                                                <label>
                                                                    Nom
                                                                </label>
                                                                <!-- Input -->
                                                                @if(isset($template_component->font["name"]))
                                                                {!! Form::text('font_title'.$i, $template_component->font["name"], ['class' => 'form-control', 'placeholder' => 'Entrer le nom']) !!}
                                                                @else
                                                                {!! Form::text('font_title'.$i, null, ['class' => 'form-control', 'placeholder' => 'Entrer le nom']) !!}
                                                                @endif
                                                            </div>
                                                            <hr class="mt-4 mb-5">
    
                                                            <p class="h3">Nombre de caractères</p>
                                                            <div class="row">
                                                                <div class="col-12 col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Minimum</label>
                                                                        {!! Form::number('min'.$i, $template_component->characters["min"],['class' => 'form-control', 'placeholder' => '1']) !!} 
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Maximum</label>
                                                                        {!! Form::number('max'.$i, $template_component->characters["max"],['class' => 'form-control', 'placeholder' => '99']) !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr class="mt-4 mb-5">
    
                                                            <p class="h3">Police de caractère par défault</p>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label>Nom</label>
                                                                        {!! Form::text('font_title'.$i, $template_component->font["name"], ['class' => 'form-control', 'placeholder' => 'Entrer le nom']) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <!-- First name -->
                                                                    <div class="custom-file">
                                                                        {!! Form::file('font_url'.$i, array('class' => 'form-control custom-file-input', 'id' =>'photo_profile')) !!}
                                                                        <label class="custom-file-label" for="photo_profile">Ajouter le fichier de la police</label>
                                                                    </div>
                                                                </div>
                                                                <hr class="mt-4 mb-5">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <!-- Label -->
                                                                        <label>
                                                                            Epaisseur {{$template_component->font["weight"]}}
                                                                        </label>
                                                                        <div class="form-group">
                                                                            <select name="{{'font_weight'.$i}}" id="font_weight" class="form-control"
                                                                                data-toggle="select">
                                                                                <option value="100">Thin (100)</option>
                                                                                <option value="200">Extra Light (200)</option>
                                                                                <option value="300">Light (300)</option>
                                                                                <option value="400">Normal (400)</option>
                                                                                <option value="500">Medium (500)</option>
                                                                                <option value="600">Semi Bold (600)</option>
                                                                                <option value="700">Bold (700)</option>
                                                                                <option value="800">Extra Bold (800)</option>
                                                                                <option value="900">Black (900)</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label>Transformation {{$template_component->font["transform"]}}</label>
                                                                        <div class="form-group">
                                                                            <select name="{{'font_transform'.$i}}" id="font_transform"
                                                                                class="form-control" data-toggle="select">
                                                                                <option value="none">Aucune</option>
                                                                                <option value="uppercase">Tout en Majuscules</option>
                                                                                <option value="capitalize">Première lettre en Majuscule</option>
                                                                                <option value="lowercase">Tout en minuscule</option>
                                                                                <option value="full-width">Pleine largeur</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label>Première lettre ou symbole avant le texte</label>
                                                                        {!! Form::text('font_first_letter'.$i, $template_component->font["first_letter"], ['class' => 'form-control', 'placeholder' => '#']) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <!-- Label -->
                                                                        <label>
                                                                            Couleur
                                                                        </label>
                                                                        <a href="#" style="float:right" class="buttonColor btn btn-sm btn-primary mb-2"
                                                                            data-toggle="modal" data-target="#addColorModal"
                                                                            data-id="{{$template_component->id}}">
                                                                            Ajouter une couleur
                                                                        </a>
                                                                        <!-- Input text title-->
                                                                        {!! Form::text('color'.$i, null, ['class' => 'form-control',
                                                                        'placeholder' => 'Couleur'])
                                                                        !!}
                                                                    </div>
    
                                                                    <hr>
                                                                    <div id="newsColors">
                                                                        <input type="hidden" name="{{'colorsList'.$template_component->id.'[]'}}" id="{{'colorsList'.$template_component->id}}" value="Black">
                                                                        <input type="hidden" name="{{'hexaList'.$template_component->id.'[]'}}" id="{{'hexaList'.$template_component->id}}" value="000000">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <!-- Label -->
                                                                        <label>
                                                                            Code hex
                                                                        </label>
                                                                        <!-- Input text title-->
                                                                        {!! Form::text('code_hex'.$i, null, ['class' => 'form-control',
                                                                        'placeholder' => '00000'])
                                                                        !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        @endforeach
                    @endif
                @endforeach
    
                {{-- Store Event custom id --}}
                <input type="hidden" class="form-control" name="events_custom_id" value="{{$events_custom->id}}">
    
                {{-- Store Event product id --}}
                <input type="hidden" class="form-control" name="events_product_id" value="{{$events_product->id}}">
    
                {{-- Store Event product title --}}
                <input type="hidden" class="form-control" name="actual_title" value="{{$events_product->title}}">

                <input type="hidden" id="countJS" value="{{$i}}">
    
                {{-- Custom actions --}}
                <div class="row">
                    <div class="col-12">
                        <div class="buttons">
                            {!! Form::submit('Configurer', ['class' => 'btn btn-primary', 'style' => 'float:right']) !!}
                            <a class='btn btn-secondary' style="float: left"
                                href="{{route('show_event', $events_product->event_id)}}">Annuler</a>
                        </div>
                    </div>
                </div>
    
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection

@include('admin.EventsCustoms.includes.modal_addColor')

@section('javascripts')
@parent()
<script type="text/Javascript">
    $('.buttonColor').on('click', function(e) {
        var id = $(this).attr('data-id');
        $('#idTP').html('<input type="hidden" name="tp_id" id="tp_id" value="'+id+'">');
    });

    $('#AddColor').on('submit', function (e) {
        e.preventDefault();
        $('#submit_modalAddColor').hide();
        $('#loading_modalAddColor').removeClass('d-none');
        $(this).removeClass('btn-primary');
        $(this).addClass('btn-success');
        var color = $('#ep_color').val();
        var code_hex = $('#ep_code_hex').val();
        var id = $('#tp_id').val();
        var colorsList = $('#colorsList'+id).val();
        var hexaList = $('#hexaList'+id).val();
        console.log(colorsList);
        var colors = [];
        var hexa = [];
        colors.push(colorsList);
        hexa.push(hexaList)
        var array_colors = [color];
        var array_hexas = [code_hex]
        colors.push([array_colors]);
        hexa.push([array_hexas]);
        document.getElementById("colorsList"+id).value = colors;
        document.getElementById("hexaList"+id).value = hexa;
        console.log(document.getElementById("colorsList"+id).value);
        console.log(document.getElementById("hexaList"+id).value);
        $('#addColorModal').modal('hide');
        $('#submit_modalAddColor').show();
        $('#loading_modalAddColor').addClass('d-none');
        $('#ep_color').val('');
        $('#ep_code_hex').val('');
    });

</script>
@endsection