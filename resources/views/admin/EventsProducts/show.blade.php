@extends('layouts/templateAdmin')
@section('title', $events_product->title)
@section('content')
@include('admin.EventsProducts.includes.modalDelete')

<div id="tabs">
    @include('admin.EventsProducts.includes.header')
    @include('admin.EventsProducts.includes.informations')
    @include('admin.EventsProducts.includes.addVarianteEP')
    @include('admin.EventsProducts.includes.personnalisations')
</div>
@endsection