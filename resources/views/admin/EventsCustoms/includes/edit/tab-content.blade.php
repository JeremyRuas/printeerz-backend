<div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label>
                            Nom de la personnalisation
                        </label>
                        {!! Form::text('title', $events_custom->title, ['class' => 'form-control'. $errors->first('title', ' is-invalid')]) !!}
                        @if($errors->has('title'))<div class="invalid-feedback">Nom de police incorrect.</div>@endif
                    </div>
                    <div class="form-group">
                        <label>Description de la personnalisation</label>
                        <input id="textDescription" type="textarea" class="description" name="description" rows="3">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            {{-- IsActive part link to an input hidden --}}
            <div class="row" >
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="custom-control custom-switch">
                                        <input name="is_active" type="checkbox" class="custom-control-input" id="isActive" value="{{ $events_custom->is_active }}">
                                        <label class="custom-control-label" for="isActive">Ce composant est-il actif ?</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Image --}}
            @if(!empty($events_custom->image) && $disk->exists($events_custom->image))
                <div class="card">
                    <div class="card-body">
                        <img width="100%" title="image principale" class="" src="{{$s3 . $events_custom->image}}"
                            alt="Image personnalisation">
                    </div>
                </div>
            @else
                <div class="card card-inactive">
                    <div class="card-body text-center">
                        <!-- No image -->
                        <p class="text-muted">
                            Pas d'image de personnalisation
                        </p>
                    </div>
                </div>
            @endif
        </div>

    </div>
</div>
<?php 
$i=0;
$arrayEventsComponentsIds = array();
 ?>
@foreach($events_components as $events_component)
    @if($events_component->events_custom_id == $events_custom->id)
        {{-- For every components we put id in an array --}}
        <?php 
        $i++;
        array_push($arrayEventsComponentsIds, $events_component->id);
         ?>
        <input type="hidden" name="{{'template_component_id'.$i}}" value="{{$events_component->id}}">
        <input type="hidden" name="{{'comp_type_'.$events_component->id}}" id="{{'comp_type_'.$events_component->id}}" value="{{$events_component->type}}">
        {{-- <input type="hidden" name="tp_id" id="tp_id" value="{{$events_component->id}}"> --}}
        <input type="hidden" name="countJS" id="countJS" value="{{$i}}">
        <div class="tab-pane fade show" id="template_component_{{$events_component->id}}" role="tabpanel"
            aria-labelledby="template_component_{{$events_component->id}}-tab">
            {{-- Store template_composant id --}}
            <div class="row">
                <div class="col-8">
                    {{-- Custom option --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-header-title">
                                        Nom du composant
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <!-- Input -->
                                        {!! Form::text('option_title'.$i, $events_component->title, ['class' => 'form-control','placeholder' => 'Entrer le nom']) !!}
                                    </div>
                                    <div class="col-12">
                                        <p class="text-muted">Vous pouvez changer le nom de ce composant pour cette personnalisation.</p>
                                    </div>
                                </div>
                            </div>
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
                                                            Largeur (mm)
                                                        </label>
                                                        <!-- Input -->
                                                        {!! Form::number('width'.$i, $events_component->width,
                                                        ['class' => 'form-control', 'placeholder' => '', 'step' => 'any']) !!}
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <!-- First name -->
                                                    <div class="form-group">
                                                        <!-- Label -->
                                                        <label>
                                                            Hauteur (mm)
                                                        </label>
                                                        <!-- Input -->
                                                        {!! Form::number('height'.$i, $events_component->height,
                                                        ['class' => 'form-control', 'placeholder' => '', 'step' => 'any']) !!}
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <p class="text-muted">La taille par défault est de {{$events_component->width}} x {{$events_component->height}} mm</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($events_component->type == 'input')
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h4 class="card-header-title">
                                            Polices de caractères
                                            </h4>
                                        </div>
                                        <div class="col-auto">
                                                <a href="#" class="buttonFont btn btn-sm btn-primary"
                                                data-toggle="modal" data-target="#addFontModal"
                                                data-id="{{$events_component->id}}">
                                                +
                                            </a>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#" class="buttonFont btn btn-sm btn-primary"
                                            data-toggle="modal" data-target="#selectFontModal"
                                            data-id="{{$events_component->id}}">
                                            Sélectionner une police
                                        </a>
                                    </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div id="fontTable" class="card mt-2" data-toggle="lists"
                                            data-lists-values='["font-name"]'>
                                                <div class="table-responsive">
                                                    <table class="table table-sm table-nowrap card-table">
                                                        <thead>
                                                            <tr>
                                                                <th><a href="#" class="text-muted" data-sort="font-name"></a></th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="list" id="{{'font_name_list'.$events_component->id}}">
                                                            <tr></tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div> 
                                        <div id="{{'newsFonts'.$events_component->id}}">
                                            <input type="hidden" name="{{'fontsList'.$events_component->id.'[]'}}" id="{{'fontsList'.$events_component->id}}" > {{-- removed value="Roboto-Black" --}}
                                            <input type="hidden" name="{{'font_urlList'.$events_component->id.'[]'}}" id="{{'font_urlList'.$events_component->id}}" > {{-- removed value="/events/Roboto-Black.ttf" --}}
                                            <input type="hidden" name="{{'fontsFileNameList'.$events_component->id.'[]'}}" id="{{'fontsFileNameList'.$events_component->id}}"> {{-- font file name --}}
                                            <input type="hidden" name="{{'fontsWeightList'.$events_component->id.'[]'}}" id="{{'fontsWeightList'.$events_component->id}}"> {{-- font_weight --}}
                                            <input type="hidden" name="{{'fontsTransformList'.$events_component->id.'[]'}}" id="{{'fontsTransformList'.$events_component->id}}"> {{-- font_transform --}}
                                            <input type="hidden" name="{{'fontsIdsList'.$events_component->id.'[]'}}" id="{{'fontsIdsList'.$events_component->id}}"> {{-- font_ids --}}
                                         </div>
                                        <div id="{{'fontsToDelete'.$events_component->id}}">
                                            <input type="hidden" name="{{'fontsToDeleteList'.$events_component->id.'[]'}}" id="{{'fontsToDeleteList'.$events_component->id}}">
                                            <input type="hidden" name="{{'fontsIdsToDeleteList'.$events_component->id.'[]'}}" id="{{'fontsIdsToDeleteList'.$events_component->id}}">
                                            <input type="hidden" name="{{'fontsWeightsToDeleteList'.$events_component->id.'[]'}}" id="{{'fontsWeightsToDeleteList'.$events_component->id}}"> {{-- font file name --}}
                                            <input type="hidden" name="{{'fontsTransformToDeleteList'.$events_component->id.'[]'}}" id="{{'fontsTransformToDeleteList'.$events_component->id}}" > {{-- removed value="/events/Roboto-Black.ttf" --}}
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <p class="text-muted">Vous pouvez ajouter ou supprimer des polices pour cette personnalisation.</p>
                                    </div>
                                </div>
                            </div>
                            {{-- Fonts colors --}}
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h4 class="card-header-title">
                                            Couleurs de la police
                                            </h4>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#" class="buttonColor btn btn-sm btn-primary"
                                                data-toggle="modal" data-target="#addColorModal"
                                                data-id="{{$events_component->id}}">
                                                Ajoutez une couleur
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">    
                                        <div class="col-12">
                                            <div id="colorTable" class="card mt-2" data-toggle="lists"
                                            data-lists-values='["color-name", "color-code_hex"]'>
                                                <div class="table-responsive">
                                                    <table class="table table-sm table-nowrap card-table">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    <a href="#" class="text-muted" data-sort="color-name">
                                                                        Nom
                                                                    </a>
                                                                </th>
                                                                <th>
                                                                    <a href="#" class="text-muted" data-sort="color-code_hex">
                                                                        Code hexa
                                                                    </a>
                                                                </th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                
                                                        <tbody class="list" id="{{'color_name_list'.$events_component->id}}">
                                                            <tr></tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div id="newsColors">
                                                    <input type="hidden" name="{{'colorsList'.$events_component->id.'[]'}}" id="{{'colorsList'.$events_component->id}}"> {{-- value="Black" --}}
                                                    <input type="hidden" name="{{'hexaList'.$events_component->id.'[]'}}" id="{{'hexaList'.$events_component->id}}"> {{-- value="000000" --}}
                                                </div>
                                                <div id="colorsToDelete">
                                                    <input type="hidden" name="{{'colorsToDeleteList'.$events_component->id.'[]'}}" id="{{'colorsToDeleteList'.$events_component->id}}">
                                                    <input type="hidden" name="{{'hexasToDeleteList'.$events_component->id.'[]'}}" id="{{'hexasToDeleteList'.$events_component->id}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <p class="text-muted">Vous pouvez ajouter ou supprimer des couleurs de police pour cette personnalisation.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Image components --}}
                            @elseif($events_component->type == 'image')
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-header-title">
                                            Image du composant
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="custom-file">
                                                {!! Form::file('comp_image'.$events_component->id, array('class' => 'form-control custom-file-input', 'id' =>'comp_image'.$events_component->id)) !!}
                                                <label class="custom-file-label" for="photo_profile">Ajoutez l'image</label>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <p class="text-muted">Ajoutez ici l'image correspondant à ce composant.</p>
                                        </div>
                                    </div>
                                </div>
                            @endif {{-- /Component type condition --}}
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    Composant de type : {{ $events_component->type }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($events_component->type == 'input')
                        <div class="card">
                            <div class="card-header">
                                <b>Nombre de caractères</b>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Minimum</label>
                                            {!! Form::number('min'.$i, $events_component->input_min,['class' =>
                                            'form-control', 'placeholder' => '1']) !!}
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Maximum</label>
                                            {!! Form::number('max'.$i, $events_component->input_max,['class' =>
                                            'form-control', 'placeholder' => '99']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
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
                                                    X (mm)
                                                </label>
                                                <!-- Input -->
                                                {!! Form::number('origin_x'.$i, $events_component->origin_x, ['class' =>
                                                'form-control', 'placeholder' =>'0', 'step' => 'any']) !!}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <!-- First name -->
                                            <div class="form-group">
                                                <!-- Label -->
                                                <label>
                                                    Y (mm)
                                                </label>
                                                <!-- Input -->
                                                {!! Form::number('origin_y'.$i, $events_component->origin_y, ['class' =>
                                                'form-control', 'placeholder' => '0', 'step' => 'any']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($events_component->type == 'input')
                        {{-- First letter --}}
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-header-title">
                                            Première lettre ou symbole avant le texte
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <!-- First name -->
                                                <div class="form-group">
                                                    <!-- Input -->
                                                    {!! Form::text('font_first_letter'.$i, null, ['class' => 'form-control', 'placeholder' => '#']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
@endforeach
{{-- Send an array with eventsCustom ids for alert errors --}}
<input type="hidden" name="arrayEventsComponentsIds[]" value="{{ json_encode($arrayEventsComponentsIds) }}" id="arrayEventsComponentsIds">