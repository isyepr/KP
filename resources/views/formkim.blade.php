@if(isset($kim))
    {!! Form::model($kim,['method'=>'put','id'=>'frm']) !!}
@else
    {!! Form::open(['id'=>'frm']) !!}
@endif
<div class="modal-header">
    <h5 class="modal-title">{{isset($kim)?'Edit':'New'}} kim</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="form-group row required">
        {!! Form::label("PLANT","Plant",["class"=>"col-form-label col-md-3"]) !!}
        <div class="col-md-9">
            {!! Form::text("PLANT",null,["class"=>"form-control".($errors->has('PLANT')?" is-invalid":""),'placeholder'=>'Plant','id'=>'focus']) !!}
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
        {!! Form::label("PERUSAHAAN","Perusahaan",["class"=>"col-form-label col-md-3"]) !!}
        <div class="col-md-9">
            {!! Form::text("PERUSAHAAN",null,["class"=>"form-control".($errors->has('PERUSAHAAN')?" is-invalid":""),'placeholder'=>'Perusahaan','id'=>'focus']) !!}
            <span id="error-name" class="invalid-feedback"></span>
        </div>
    </div>
    <div class="form-group row required">
        {!! Form::label("KIM","KIM",["class"=>"col-form-label col-md-3"]) !!}
        <div class="col-md-9">
            {!! Form::text("KIM",null,["class"=>"form-control".($errors->has('KIM')?" is-invalid":""),'placeholder'=>'KIM','id'=>'focus']) !!}
            <span id="error-name" class="invalid-feedback"></span>
        </div>
    </div>
    <div class="form-group row required">
        {!! Form::label("KETERANGAN","Keterangan",["class"=>"col-form-label col-md-3"]) !!}
        <div class="col-md-9">
            {!! Form::text("KETERANGAN",null,["class"=>"form-control".($errors->has('KETERANGAN')?" is-invalid":""),'placeholder'=>'Keterangan','id'=>'focus']) !!}
            <span id="error-name" class="invalid-feedback"></span>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
    {!! Form::submit("Save",["class"=>"btn btn-primary"])!!}
</div>
{!! Form::close() !!}
