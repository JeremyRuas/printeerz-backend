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
                                    CONFIGURATION
                                </h6>
                                <!-- Title -->
                                <h1 class="header-title">
                                    Configurer une personnalisation
                                </h1>
                            </div>
                            <div class="col-auto">
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-12 col-md-auto mt-2 mt-md-0">
                                <ul class="nav nav-tabs nav-overflow header-tabs" id="myTab" role="tablist">
                                    @include('admin.EventsCustoms.includes.edit.nav-tabs')
                                </ul>
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
                        <div class="tab-content" id="myTabContent">
                            @include('admin.EventsCustoms.includes.edit.tab-content')
                        </div>
                        {{-- Store Event custom event_id --}}
                        <input type="hidden" class="form-control" id="events_custom_event_id" name="events_custom_event_id" value="{{$events_custom->event_id}}">
                        {{-- Store Event custom id --}}
                        <input type="hidden" class="form-control" name="events_custom_id" value="{{$events_custom->id}}">
                        {{-- Store Event product id --}}
                        <input type="hidden" class="form-control" name="events_product_id" value="{{$events_product->id}}">
                        {{-- Store Event product title --}}
                        <input type="hidden" class="form-control" name="actual_title" value="{{$events_custom->title}}">
                        {{-- Custom actions --}}
                        <div class="row">
                            <div class="col-12">
                                <div class="buttons">
                                    {!! Form::submit('Configurer', ['class' => 'btn btn-primary', 'style' => 'float:right']) !!}
                                    <a class='btn btn-secondary' style="float: left"
                                        href="{{route('show_eventsProducts', $events_product->id)}}">Annuler</a>
                                </div>
                            </div>
                        </div>

            
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>{{-- /container --}}
@endsection

@include('admin.EventsCustoms.includes.modal_addColor')
@include('admin.EventsCustoms.includes.modal_addFont')

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
        hexa.push(hexaList);
        var array_colors = [color];
        var array_hexas = [code_hex];
        colors.push([array_colors]);
        hexa.push([array_hexas]);
        document.getElementById("colorsList"+id).value = colors;
        document.getElementById("hexaList"+id).value = hexa;
        console.log(document.getElementById("colorsList"+id).value);
        console.log(document.getElementById("hexaList"+id).value);
        $('#addColorModal').modal('hide');
        $('#submit_modalAddColor').show();
        $('#loading_modalAddColor').addClass('d-none');
        // console.log(gettype(colors));
        // colors_str = document.getElementById("colorsList"+id).value;
        // var color_name = colors_str.split(",");
        $('#color_name_list'+id).append('<tr><td class="color-name">'+color+'</td><td class="color-code_hex">'+code_hex+'</td><td class="text-right"><a data-color="'+color+'" data-hexa="'+code_hex+'" onclick="var color=$(this).attr(\'data-color\');var hexa=$(this).attr(\'data-hexa\');deleteColorRow(color);deleteHexaRow(hexa);$(this).closest(\'tr\').remove();" style="float:right">Supprimer</a></td></tr>');
        //$('#color_hexa_list'+id).append('<td class="color-code_hexa">'+hexa+'</td>');
        $('#ep_color').val('');
        $('#ep_code_hex').val('');
    });

    $('.buttonFont').on('click', function(e) {
        var id = $(this).attr('data-id');
        $('#idTPFont').html('<input type="hidden" name="tp_id_font" id="tp_id_font" value="'+id+'">');
    });

    $('#AddFont').on('submit', function (e) {
        e.preventDefault();
        $('#submit_modalAddFont').hide();
        $('#loading_modalAddFont').removeClass('d-none');
        $(this).removeClass('btn-primary');
        $(this).addClass('btn-success');
        var font_title = $('#ec_font_title').val();
        var font_url = $('#ec_font_url').val();
        var font_name = font_url.replace('C:\\fakepath\\','');
        var events_custom_event_id = $('#events_custom_event_id').val();
        console.log('event-id=> '+events_custom_event_id);
        console.log('font_name=>'+font_name);
        console.log('font_url_val=>'+font_url);
        var events_custom_id = $('#events_custom_id').val();
        var new_path = '/event/'+events_custom_id+'/fonts/'+font_title+'/';
        var font_url_replaced = font_url.replace('C:\\fakepath\\', new_path);
        var id = $('#tp_id_font').val();
        var fontsList = $('#fontsList'+id).val();
        var font_urlList = document.getElementById("font_urlList"+id).value;
        console.log(fontsList);
        var fonts = [];
        var url = [];
        fonts.push(fontsList);
        url.push(font_urlList);
        var array_fonts = [font_title];
        var array_urls = [font_url_replaced];
        fonts.push([array_fonts]);
        url.push([array_urls]);
        document.getElementById("fontsList"+id).value = fonts;
        document.getElementById("font_urlList"+id).value = url;
        $('#newsFonts'+id).append('<input type="hidden" name="url_'+id+'[]" value="'+font_url_replaced+'">');
        console.log(document.getElementById("fontsList"+id).value);
        console.log(document.getElementById("font_urlList"+id).value);
        $('#addFontModal').modal('hide');
        $('#submit_modalAddFont').show();
        $('#loading_modalAddFont').addClass('d-none');
        console.log('font_url= '+font_url_replaced);
        $('#font_name_list'+id).append('<tr><td class="font-name">'+font_title+'</td><td><a data-url="'+font_url_replaced+'" data-font="'+font_title+'" onclick="var font=$(this).attr(\'data-font\');var url=$(this).attr(\'data-url\');deleteFontRow(font);deleteFile('+'\''+font_title+'\',\''+font_name+'\',\''+events_custom_event_id+'\');$(this).closest(\'tr\').remove();">Supprimer</a></td></tr>');
    });

    function deleteColorRow(color){
        var id = $('#tp_id').val();
        var colorsList = $('#colorsList'+id).val();
        var colors = [];
        colors.push(colorsToDeleteList);
        var array_colors = [color];
        colors.push([array_colors]);
        document.getElementById("colorsToDeleteList"+id).value = colors;
        var colorsToDeleteList = $('#colorsToDeleteList'+id).val();
        var finalColors = colorsList.replace(colorsToDeleteList, "");
        document.getElementById("colorsList"+id).value = finalColors;
        console.log('finalColors= '+document.getElementById("colorsList"+id).value);
        document.getElementById("colorsToDeleteList"+id).value = "";
    }

    function deleteHexaRow(hexa){
        var id = $('#tp_id').val();
        var hexaList = $('#hexaList'+id).val();
        var hexas = [];
        var hexasToDeleteList = $('#hexasToDeleteList'+id).val();
        hexas.push(hexasToDeleteList);
        var array_hexas = [hexa];
        hexas.push([array_hexas]);
        document.getElementById("hexasToDeleteList"+id).value = hexas;
        var hexasToDeleteList = $('#hexasToDeleteList'+id).val();
        var finalHexas = hexaList.replace(hexasToDeleteList, "");
        document.getElementById("hexaList"+id).value = finalHexas;
        console.log('finalHexas= '+document.getElementById("hexaList"+id).value);
        document.getElementById("hexasToDeleteList"+id).value = "";
    }

    function deleteFontRow(font){
        console.log(font);
        var id = $('#tp_id_font').val();
        var fontsList = $('#fontsList'+id).val();
        var fonts = [];
        var fontsToDeleteList = $('#fontsToDeleteList'+id).val();
        fonts.push(fontsToDeleteList);
        var array_fonts = [font];
        fonts.push([array_fonts]);
        document.getElementById("fontsToDeleteList"+id).value = fonts;
        var fontsToDeleteList = $('#fontsToDeleteList'+id).val();
        var finalColors = fontsList.replace(fontsToDeleteList, "");
        document.getElementById("fontsList"+id).value = finalColors;
        console.log('finalColors= '+document.getElementById("fontsList"+id).value);
        document.getElementById("fontsToDeleteList"+id).value = "";
    }

    function deleteFile(font_title, font_name, events_custom_event_id) {
        $.ajaxSetup({
            beforeSend: function (xhr, type) {
                if (!type.crossDomain) {
                    xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
                }
            },
        });
        $.ajax({
            type: 'delete',
            url: "/admin/EventsCustoms/deleteFile/events/"+events_custom_event_id+'/fonts/'+font_title+'/'+font_name,
            dataType: "JSON",
            data: {
                "events_custom_event_id": events_custom_event_id,
                "font_name": font_name,
                "font_title": font_title,
                _token: '{!! csrf_token() !!}',
            },
            contentType: false,
            processData: false,
            success: function (response) {
                console.log(response.msg);
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            }
        });
    }

</script>
@endsection