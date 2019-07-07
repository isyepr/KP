@if(isset($spi))
    {!! Form::model($spi,['method'=>'put','id'=>'frm']) !!}
@else
    {!! Form::open(['id'=>'frm']) !!}
@endif
<div class="modal-header">
    <h5 class="modal-title">{{isset($spi)?'Edit':'New'}} SPI</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="form-group row required">
        {!! Form::label("PLAN","Plan",["class"=>"col-form-label col-md-3"]) !!}
        <div class="col-md-9">
            {!! Form::date("PLAN",null,["class"=>"form-control".($errors->has('PLAN')?" is-invalid":""),'placeholder'=>'Plan','id'=>'focus']) !!}
            <span id="error-name" class="invalid-feedback"></span>
        </div>
    </div>    
     <div class="form-group row required">
        {!! Form::label("ACTUAL","Actual",["class"=>"col-form-label col-md-3"]) !!}
        <div class="col-md-9">
            {!! Form::text("ACTUAL",null,["class"=>"form-control".($errors->has('ACTUAL')?" is-invalid":""),'placeholder'=>'Actual','id'=>'focus']) !!}
            <span id="error-name" class="invalid-feedback"></span>
        </div>
    </div>
     <div class="form-group row required">
        {!! Form::label("LO","LO",["class"=>"col-form-label col-md-3"]) !!}
        <div class="col-md-9">
            {!! Form::text("LO",null,["class"=>"form-control".($errors->has('LO')?" is-invalid":""),'placeholder'=>'LO','id'=>'focus']) !!}
            <span id="error-name" class="invalid-feedback"></span>
        </div>
    </div>
     <div class="form-group row required">
        {!! Form::label("TRANSPORTIR","Transportir",["class"=>"col-form-label col-md-3"]) !!}
        <div class="col-md-9">
            {!! Form::text("TRANSPORTIR",null,["class"=>"form-control".($errors->has('TRANSPORTIR')?" is-invalid":""),'placeholder'=>'Transportir','id'=>'focus']) !!}
            <span id="error-name" class="invalid-feedback"></span>
        </div>
    </div>
    <div class="form-group row required">
        {!! Form::label("PERUSAHAAN","Perusahaan",["class"=>"col-form-label col-md-3"]) !!}
        <div class="col-md-9">
            {!! Form::text("PERUSAHAAN",null,["class"=>"form-control".($errors->has('PERUSAHAAN')?" is-invalid":""),'placeholder'=>'Perusahaan','id'=>'focus']) !!}
            <span id="error-name" class="invalid-feedback"></span>
        </div>
    </div>
    <div class="form-group row required">
        {!! Form::label("SPA","No. SPA",["class"=>"col-form-label col-md-3"]) !!}
        <div class="col-md-9">
            {!! Form::text("SPA",null,["class"=>"form-control".($errors->has('SPA')?" is-invalid":""),'placeholder'=>'No. SPA','id'=>'focus']) !!}
            <span id="error-name" class="invalid-feedback"></span>
        </div>
    </div>
    <div class="form-group row required">
        {!! Form::label("NOPOL","Nopol",["class"=>"col-form-label col-md-3"]) !!}
        <div class="col-md-9">
            {!! Form::text("NOPOL",null,["class"=>"form-control".($errors->has('NOPOL')?" is-invalid":""),'placeholder'=>'Nopol','id'=>'focus']) !!}
            <span id="error-name" class="invalid-feedback"></span>
        </div>
    </div>
    <div class="form-group row required">
        {!! Form::label("QUANTITY","Quantity",["class"=>"col-form-label col-md-3"]) !!}
        <div class="col-md-9">
            {!! Form::text("QUANTITY",null,["class"=>"form-control".($errors->has('QUANTITY')?" is-invalid":""),'placeholder'=>'Quantity','id'=>'focus']) !!}
            <span id="error-name" class="invalid-feedback"></span>
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label("KETERANGAN","Keterangan",["class"=>"col-form-label col-md-3"]) !!}
        <div class="col-md-9">
            {!! Form::select("KETERANGAN",['SPBE'=>'SPBE',''=>''],null,["class"=>"form-control"]) !!}
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
    {!! Form::submit("Save",["class"=>"btn btn-primary"])!!}
</div>
{!! Form::close() !!}

<script src=”js/bootstrap-modal.js”></script>
<script src=”js/bootstrap-transition.js”></script>
<script src=”js/bootstrap-datepicker.js”></script>