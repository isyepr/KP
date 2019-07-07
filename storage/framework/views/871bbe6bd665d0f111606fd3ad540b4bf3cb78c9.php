<?php if(isset($kim)): ?>
    <?php echo Form::model($kim,['method'=>'put','id'=>'frm']); ?>

<?php else: ?>
    <?php echo Form::open(['id'=>'frm']); ?>

<?php endif; ?>
<div class="modal-header">
    <h5 class="modal-title"><?php echo e(isset($kim)?'Edit':'New'); ?> kim</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="form-group row required">
        <?php echo Form::label("PLANT","Plant",["class"=>"col-form-label col-md-3"]); ?>

        <div class="col-md-9">
            <?php echo Form::text("PLANT",null,["class"=>"form-control".($errors->has('PLANT')?" is-invalid":""),'placeholder'=>'Plant','id'=>'focus']); ?>

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
        <?php echo Form::label("PERUSAHAAN","Perusahaan",["class"=>"col-form-label col-md-3"]); ?>

        <div class="col-md-9">
            <?php echo Form::text("PERUSAHAAN",null,["class"=>"form-control".($errors->has('PERUSAHAAN')?" is-invalid":""),'placeholder'=>'Perusahaan','id'=>'focus']); ?>

            <span id="error-name" class="invalid-feedback"></span>
        </div>
    </div>
    <div class="form-group row required">
        <?php echo Form::label("KIM","KIM",["class"=>"col-form-label col-md-3"]); ?>

        <div class="col-md-9">
            <?php echo Form::text("KIM",null,["class"=>"form-control".($errors->has('KIM')?" is-invalid":""),'placeholder'=>'KIM','id'=>'focus']); ?>

            <span id="error-name" class="invalid-feedback"></span>
        </div>
    </div>
    <div class="form-group row required">
        <?php echo Form::label("KETERANGAN","Keterangan",["class"=>"col-form-label col-md-3"]); ?>

        <div class="col-md-9">
            <?php echo Form::text("KETERANGAN",null,["class"=>"form-control".($errors->has('KETERANGAN')?" is-invalid":""),'placeholder'=>'Keterangan','id'=>'focus']); ?>

            <span id="error-name" class="invalid-feedback"></span>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
    <?php echo Form::submit("Save",["class"=>"btn btn-primary"]); ?>

</div>
<?php echo Form::close(); ?>

<?php /**PATH C:\xampp\htdocs\KP\resources\views/formkim.blade.php ENDPATH**/ ?>