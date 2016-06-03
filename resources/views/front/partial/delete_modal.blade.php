
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <p>Weet u zeker dat u <span style="font-weight: bold" id="identifier"></span> wilt verwijderen?</p>
                </div>
                <div class="modal-footer">
                    {!! Form::open(['route'=> [$route,$contact->id,$id],'method' => 'DELETE']) !!}
                    <input type="hidden" name="id" id="itemId">
                    <input type="hidden" name="contact_id" value="{{$contact->id}}">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuleren</button>
                    <button type="submit" class="btn btn-danger">Verwijderen</button>
                    {!! Form::close() !!}
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

