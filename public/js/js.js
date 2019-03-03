function ConfirmDelete() {
  var x = confirm("Êtes-vous sûr?");
  if (x)
    return true;
  else
    return false;
}

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
  }
});

$("#tabs").tabs({
  classes: {
    "ui-tabs-tab": "nav-item",
    "ui-tabs-active": "active"
  },
  activate: function activeTab() {
    $('.ui-tabs-tab').each(function () {
      if ($(this).hasClass('ui-tabs-active')) {
        $(this).children().addClass('active')
      } else(
        $(this).children().removeClass('active')
      )
    });
  }
});

$('#element').toast('show');

$('#addVariante').on('keypress', function (e) {
  if (e.keyCode === 13) {
    e.preventDefault();
    $(this).trigger('submit');
  }
});

$('input[data-role="tagsinput"]').tagsinput({
  tagClass: 'badge badge-primary'
});

$(".bootstrap-tagsinput").addClass('form-control');

$(function () {
  // Get an element
  var componentElement = $('[data-root="componentElement"]');
  // Hide all elements 
  componentElement.hide();
  // When the type changed
  $('#componentElementType').change(function () {
    // Get type value
    var value = $(this).val();
    // Hide all elements when changed type
    componentElement.hide();
    // Show elements who matched the type 
    $('div[type *= '+ value +']').fadeIn();
  });
});

// --------------------------------
// Initialise the sortable plugin
// --------------------------------

$(function () {
  $("div[data-type='sortable']")
    .sortable({
      containment: "parent",
      handle: '.handle',
      cancel: 'button',
      start: function (event, ui) {
        console.log('start: ' + ui.item.index())
      },
      update: function (event, ui) {
          console.log('end ' + ui.item.index())
        }
      });
      
  $("div[data-type='sortable']").disableSelection();
});

// --------------------------------
// Remove Component form list
// --------------------------------

$(document).on('click', '.deleteComponent', function (event) {
  var a = event.target;
  a.closest('li').remove();
});

// --------------------------------
// Tweak Template form with capabilites for Components to be add in list, sortable
// --------------------------------

$(function () {
  var componentsSelect = $('#componentsSelect');
  componentsSelect.prepend('<option selected></option>').select2({
    placeholder: "Selectionner un composant pour l'ajouter",
    allowClear: true
  });
  componentsSelect.on('select2:close', function (e) {
    // Get option value
    var value = $(this).val();
    // Get option name
    var name = $("#componentsSelect option:selected").text();
    // Add new selected option in list
    var list = $('#templateComponentsList');
    list.append('<ul class="list-group py-2"><li class="list-group-item ui-state-default" data-id="' + value + '"><div class="row align-items-center"><div class="col ml-n2">' + name + '</div><div class="col-auto"><a class="deleteComponent" style="cursor:pointer;"><i class="fe fe-trash-2"></i></a></div><div class="col-auto"><a class="handle" style="cursor:grab;"><i class="fe fe-more-vertical"></i></a></div></div></li></ul>');
    // Reset Select2 value
    $(this).val(null).trigger('change.select2')
  });
});
