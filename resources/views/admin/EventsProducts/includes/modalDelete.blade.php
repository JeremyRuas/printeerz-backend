<div class="modal fade" id="modalDeleteEventsProduct" tabindex="-2" role="dialog" aria-labelledby="modalDeleteEventsProductLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Supprimer cette variante ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir de supprimer <b>{{ $product->title }}</b> ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <a href="{{route('destroy_eventsProducts', $events_product->id)}}" class="btn btn-danger">Supprimer</a>
            </div>
        </div>
    </div>
</div>