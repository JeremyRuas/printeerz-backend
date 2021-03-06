@extends('layouts/templateAdmin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-8">
            <div class="header mt-md-5">
                <div class="header-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="header-pretitle">
                                CONFIGURATION
                            </h6>
                            <h1 class="header-title">
                                Configurer une variante
                            </h1>
                        </div>
                        <div class="col-auto">
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::open(['action' => array('ProductsVariantsController@update'), 'id' => $products_variant->id,
            'files' => true, 'class'
            => 'mb-4']) !!}
            <div class="row">
                {{csrf_field()}}
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-header-title mt-2">
                                Informations générales de la variante.
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>
                                    Couleur de la variante
                                </label>
                                {!! Form::text('color', $products_variant->color, ['class' => 'form-control' .
                                $errors->first('color', 'is-invalid')]) !!}
                                @if($errors->has('color'))<div class="invalid-feedback">Veuillez renseigner la couleur.
                                </div>@endif

                            </div>
                            <div class="form-group">
                                <label>
                                    Taille
                                </label>
                                {!! Form::text('size', $products_variant->size, ['class' => 'form-control' .
                                $errors->first('size', 'is-invalid')]) !!}
                                @if($errors->has('size'))<div class="invalid-feedback">Veuillez renseigner la taille.
                                </div>@endif
                            </div>
                            <div class="form-group">
                                <label>
                                    Quantité stock
                                </label>
                                {!! Form::text('quantity', $products_variant->quantity, [
                                'class' => 'form-control' . $errors->first('quantity', 'is-invalid'),
                                'placeholder' => 'Saisissez la quantité en stock'
                                ])
                                !!}
                                @if($errors->has('quantity'))<div class="invalid-feedback">Veuillez renseigner la
                                    quantité.</div>@endif
                            </div>
                        </div>
                    </div>
                    {{-- Image --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-header-title mt-2">
                                        Image de la variante
                                    </h4>
                                </div>
                                <div class="card-body">
                                    @if(isset($products_variant->image))
                                    @if(!empty($products_variant->image) && $disk->exists($products_variant->image))
                                    <img width="auto" class="" src="{{$disk->url}}"
                                        alt="Image de de la variante"
                                        style="margin-left:auto;margin-right:auto;display:block;">
                                    <p class="text-muted">
                                        Si vous le souhaitez vous pouvez modifier cette image (format: jpeg,jpg,png |
                                        format: jpeg,jpg,png | max: 4mo).
                                    </p>
                                    <div class="form-group">
                                        {!! Form::file('image', array('class' => 'form-control', 'id' => 'logo_img'))
                                        !!}
                                        {!! $errors->first('image', '<p class="help-block mt-2" style="color:red;">
                                            <small>:message</small></p>') !!}
                                    </div>
                                    @else
                                    <div class="card card-inactive">
                                        <div class="card-body text-center">
                                            <!-- No image -->
                                            <p class="text-muted">
                                                Pas d'image pour ce produit
                                            </p>
                                        </div>
                                    </div>
                                    @endif
                                    @else
                                    <p class="text-muted">
                                        Si vous le souhaitez vous pouvez ajouter une image (format: jpeg,jpg,png |
                                        format: jpeg,jpg,png | max: 4mo).
                                    </p>
                                    <div class="form-group">
                                        {!! Form::file('image', array('class' => 'form-control', 'id' => 'logo_img'))
                                        !!}
                                        {!! $errors->first('image', '<p class="help-block mt-2" style="color:red;">
                                            <small>:message</small></p>') !!}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Printzones images --}}
                    <?php $i = 1; ?>
                    <div class="row">
                        <div class="col-12">
                            @if($products_variant->printzones !== null)
                            @foreach($products_variant->printzones as $printzone)
                            <div class="card">
                                @if(isset($printzone['image']))
                                <div class="card-header">
                                    <h4 class="card-header-title mt-2">
                                        {{$printzone['title']}}
                                        <p class="text-muted b-4 mb-2 mt-2">Pour chacune des zones d'impression vous
                                            pouvez ajouter une image (format: jpeg,jpg,png | format: jpeg,jpg,png | max:
                                            4mo).</p>
                                    </h4>
                                </div>
                                @else
                                <div class="card-header">
                                    <h4 class="card-header-title mt-2">
                                        Image(s) par zone d'impression
                                        <p class="text-muted b-4 mb-2 mt-2">Pour chacune des zones d'impression vous
                                            pouvez ajouter une image (format: jpeg,jpg,png | format: jpeg,jpg,png | max:
                                            4mo).</p>
                                    </h4>
                                </div>
                                @endif
                                <div class="card-body">
                                    @if(!isset($printzone['title']))
                                    <label> {{ $printzone->name }}</label>
                                    @endif
                                    @if(isset($printzone['image']))
                                    @if(!empty($printzone['image']) && $disk->exists($printzone['image']))
                                    <img width="auto" class="" src="{{$disk->url($printzone['image'])}}" alt="Image de zone"
                                        style="margin-left:auto;margin-right:auto;display:block;">
                                    <p class="text-muted">
                                        Si vous le souhaitez vous pouvez modifier cette image (format: jpeg,jpg,png |
                                        format: jpeg,jpg,png | max: 4mo).
                                    </p>
                                    @else
                                    <div class="card card-inactive">
                                        <div class="card-body text-center">
                                            <!-- No image -->
                                            <p class="text-muted">
                                                Pas d'image pour cette zone d'impression
                                            </p>
                                        </div>
                                    </div>
                                    @endif
                                    @endif
                                    <div class="form-group">
                                        {!! Form::file('printzone'.$i, array('class' => 'form-control')) !!}
                                        {{-- {!! $errors->first('printzone', '<p class="help-block mt-2" style="color:red;"><small>:message</small></p>') !!} --}}
                                        <input type="hidden" class="form-control" name="{{'printzone_name_'.$i}}"
                                            value="{{ $printzone['title'] }}">
                                        <input type="hidden" class="form-control" name="{{'printzone_id_'.$i}}"
                                            value="{{ $printzone['id'] }}">
                                    </div>
                                    <?php $i++; ?>
                                </div>
                            </div>
                            @endforeach
                            @else
                            @if($product->printzones_id)
                            @foreach($printzones as $printzone)
                            @foreach($product->printzones_id as $print)
                            @if($printzone->id == $print)
                            <div class="card">
                                @if(isset($products_variant->{'printzone'.$i}['image']))
                                <div class="card-header">
                                    <h4 class="card-header-title mt-2">
                                        {{$products_variant->{'printzone'.$i}['title']}}
                                        <p class="text-muted b-4 mb-2 mt-2">Pour chacune des zones d'impression vous
                                            pouvez ajouter une image (format: jpeg,jpg,png | format: jpeg,jpg,png | max:
                                            4mo).</p>
                                    </h4>
                                </div>
                                @else
                                <div class="card-header">
                                    <h4 class="card-header-title mt-2">
                                        Image(s) par zone d'impression
                                        <p class="text-muted b-4 mb-2 mt-2">Pour chacune des zones d'impression vous
                                            pouvez ajouter une image (format: jpeg,jpg,png | format: jpeg,jpg,png | max:
                                            4mo).</p>
                                    </h4>
                                </div>
                                @endif
                                <div class="card-body">
                                    @if(!isset($products_variant->{'printzone'.$i}['title']))
                                    <label> {{ $printzone->name }}</label>
                                    @endif
                                    @if(isset($products_variant->{'printzone'.$i}['image']))
                                    @if(!empty($products_variant->{'printzone'.$i}['image']) &&
                                    $disk->exists($products_variant->{'printzone'.$i}['image']))
                                    <img width="auto" class=""
                                        src="{{$disk->url($products_variant->{'printzone'.$i}['image'])}}" alt="Image de zone"
                                        style="margin-left:auto;margin-right:auto;display:block;">
                                    <p class="text-muted">
                                        Si vous le souhaitez vous pouvez modifier cette image (format: jpeg,jpg,png |
                                        format: jpeg,jpg,png | max: 4mo).
                                    </p>
                                    @else
                                    <div class="card card-inactive">
                                        <div class="card-body text-center">
                                            <!-- No image -->
                                            <p class="text-muted">
                                                Pas d'image pour cette zone d'impression
                                            </p>
                                        </div>
                                    </div>
                                    @endif
                                    @endif
                                    <div class="form-group">
                                        {!! Form::file('printzone'.$i, array('class' => 'form-control')) !!}
                                        <input type="hidden" class="form-control" name="{{'printzone_name_'.$i}}"
                                            value="{{ $printzone->name }}">
                                        <input type="hidden" class="form-control" name="{{'printzone_id_'.$i}}"
                                            value="{{ $printzone->id }}">
                                    </div>
                                    <?php $i++; ?>
                                </div>
                            </div>
                            @endif
                            @endforeach
                            @endforeach
                            @endif
                            @endif
                        </div>
                    </div>
                    <input type="hidden" class="form-control" name="printzones_nb" value="{{ $i }}">
                    <div class="row">
                        <div class="col-12">
                            <div class="buttons">
                                @if($products_variant->printzones == null)
                                {!! Form::submit('Configurer', ['style' => 'float: right', 'class' => 'btn
                                btn-primary']) !!}
                                @else
                                {!! Form::submit('Configurer', ['style' => 'float: right', 'title' => 'Cette variante a
                                déjà été configurée. Si vous souhaitez la modifier, merci de la supprimer et de la
                                recréer.', 'class' => 'btn btn-primary', 'disabled']) !!}
                                @endif
                                <a class="btn btn-secondary" style="float: left" class
                                    href="{{route('show_product', $products_variant->product_id)}}"><b>Annuler</b></a>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" class="form-control" name="actual_color" value="{{$products_variant->color}}">
                    <input type="hidden" class="form-control" name="products_variant_id"
                        value="{{$products_variant->id}}">
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection