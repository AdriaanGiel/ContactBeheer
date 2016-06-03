<div style="border: solid 1px black;border-top: none" class="panel-footer col-md-12 col-sm-12 col-xs-12">
    <div class="col-md-6 col-sm-4 col-xs-4">
        <a href="{{ url("contact/".$contact->id."/edit") }}" class="btn btn-info btn-sm" role="button">Contact bewerken</a>
    </div>
    <div class="col-md-6 col-sm-8 col-xs-8" style="text-align: right">
        <span class="visible-md-inline visible-lg-inline">Opnemen in Kalender:</span><span class="visible-xs-inline visible-sm-inline">Kalender</span> <input type="checkbox" id="kalender" @if($contact->opnemen_kalender == 0){{ 'checked'  }} @endif>
    </div>

</div>