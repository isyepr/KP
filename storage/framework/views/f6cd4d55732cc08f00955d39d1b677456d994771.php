<?php if(isset($spi)): ?>
    <?php echo Form::model($spi,['method'=>'put','id'=>'frm']); ?>

<?php else: ?>
    <?php echo Form::open(['id'=>'frm']); ?>

<?php endif; ?>
<div class="modal-header">
    <h5 class="modal-title"><?php echo e(isset($spi)?'Edit':'New'); ?> SPI</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="form-group row required">
        <?php echo Form::label("PLAN","Plan",["class"=>"col-form-label col-md-3"]); ?>

        <div class="col-md-9">
            <?php echo Form::date("PLAN",null,["class"=>"form-control".($errors->has('PLAN')?" is-invalid":""),'placeholder'=>'Plan','id'=>'focus']); ?>

            <span id="error-name" class="invalid-feedback"></span>
        </div>
    </div>    
     <div class="form-group row required">
        <?php echo Form::label("ACTUAL","Actual",["class"=>"col-form-label col-md-3"]); ?>

        <div class="col-md-9">
            <?php echo Form::text("ACTUAL",null,["class"=>"form-control".($errors->has('ACTUAL')?" is-invalid":""),'placeholder'=>'Actual','id'=>'focus']); ?>

            <span id="error-name" class="invalid-feedback"></span>
        </div>
    </div>
     <div class="form-group row required">
        <?php echo Form::label("LO","LO",["class"=>"col-form-label col-md-3"]); ?>

        <div class="col-md-9">
            <?php echo Form::text("LO",null,["class"=>"form-control".($errors->has('LO')?" is-invalid":""),'placeholder'=>'LO','id'=>'focus']); ?>

            <span id="error-name" class="invalid-feedback"></span>
        </div>
    </div>
     <div class="form-group row required">
        <?php echo Form::label("TRANSPORTIR","Transportir",["class"=>"col-form-label col-md-3"]); ?>

        <div class="col-md-9">
            <?php echo Form::text("TRANSPORTIR",null,["class"=>"form-control".($errors->has('TRANSPORTIR')?" is-invalid":""),'placeholder'=>'Transportir','id'=>'focus']); ?>

            <span id="error-name" class="invalid-feedback"></span>
        </div>
    </div>
    <div class="form-group row required">
        <?php echo Form::label("PERUSAHAAN","Perusahaan",["class"=>"col-form-label col-md-3"]); ?>

        <div class="col-md-9">
            <?php echo Form::text("PERUSAHAAN",null,["class"=>"form-control".($errors->has('PERUSAHAAN')?" is-invalid":""),'placeholder'=>'Perusahaan','id'=>'focus']); ?>

            <span id="error-name" class="invalid-feedback"></span>
        </div>
    </div>
    <div class="form-group row required">
        <?php echo Form::label("SPA","No. SPA",["class"=>"col-form-label col-md-3"]); ?>

        <div class="col-md-9">
            <?php echo Form::text("SPA",null,["class"=>"form-control".($errors->has('SPA')?" is-invalid":""),'placeholder'=>'No. SPA','id'=>'focus']); ?>

            <span id="error-name" class="invalid-feedback"></span>
        </div>
    </div>
    <div class="form-group row required">
        <?php echo Form::label("NOPOL","Nopol",["class"=>"col-form-label col-md-3"]); ?>

        <div class="col-md-9">
            <?php echo Form::text("NOPOL",null,["class"=>"form-control".($errors->has('NOPOL')?" is-invalid":""),'placeholder'=>'Nopol','id'=>'focus']); ?>

            <span id="error-name" class="invalid-feedback"></span>
        </div>
    </div>
    <div class="form-group row required">
        <?php echo Form::label("QUANTITY","Quantity",["class"=>"col-form-label col-md-3"]); ?>

        <div class="col-md-9">
            <?php echo Form::text("QUANTITY",null,["class"=>"form-control".($errors->has('QUANTITY')?" is-invalid":""),'placeholder'=>'Quantity','id'=>'focus']); ?>

            <span id="error-name" class="invalid-feedback"></span>
        </div>
    </div>
    <div class="form-group row">
        <?php echo Form::label("KETERANGAN","Keterangan",["class"=>"col-form-label col-md-3"]); ?>

        <div class="col-md-9">
            <?php echo Form::select("KETERANGAN",['SPBE'=>'SPBE',''=>''],null,["class"=>"form-control"]); ?>

        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
    <?php echo Form::submit("Save",["class"=>"btn btn-primary"]); ?>

</div>
<?php echo Form::close(); ?>


<script src=”js/bootstrap-modal.js”></script>
<script src=”js/bootstrap-transition.js”></script>
<script src=”js/bootstrap-datepicker.js”></script><?php /**PATH C:\xampp\htdocs\KP\resources\views/form.blade.php ENDPATH**/ ?>