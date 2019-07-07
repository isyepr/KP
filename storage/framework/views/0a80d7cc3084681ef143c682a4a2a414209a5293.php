 <div class="container-fluid"> 
        <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="post" action="/kim/import_excel" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                        </div>
                        <div class="modal-body">
 
                            <?php echo e(csrf_field()); ?>

 
                            <label>Pilih file excel</label>
                            <div class="form-group">
                                <input type="file" name="file" required="required">
                            </div>
 
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Import</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

<div class="container">
    <h1 style="font-size: 2.3rem; text-align: center">DATA KIM</h1>
    <hr/>
    
        
        <?php if($errors->has('file')): ?>
        <span class="invalid-feedback" role="alert">
            <strong><?php echo e($errors->first('file')); ?></strong>
        </span>
        <?php endif; ?>
 
        
        <?php if($sukses = Session::get('sukses')): ?>
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong><?php echo e($sukses); ?></strong>
        </div>
        <?php endif; ?>
    <div class="row">
        <div class="col-sm-5 form-group">
            <div class="input-group">
                <input class="form-control" id="search"
                       value="<?php echo e(request()->session()->get('search')); ?>"
                       onkeydown="if (event.keyCode == 13) ajaxLoad('<?php echo e(url('kim')); ?>?search='+this.value)"
                       placeholder="Search NOPOL" name="search"
                       type="text" id="search"/>
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-warning"
                            onclick="ajaxLoad('<?php echo e(url('kim')); ?>?search='+$('#search').val())">Search</button>
                </div>
            </div>
        </div>
        
         

    <div>
        <button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#importExcel">
            Import
        </button>

        <div class="float-right">
        <a href="#modalFormKim" data-toggle="modal" data-href="<?php echo e(url('kim/create')); ?>"
           class="btn btn-success mr-2">New</a>
    </div>
    </div>
 
        <?php echo Form::model($kim, array( 'route' => array('kim.truncate'),'method' => 'DELETE')); ?>

        <button type="submit" class="btn btn-danger mr-2">
            Delete All 
        </button>
        <?php echo Form::close(); ?>


    

    <table class="table table-bordered bg-light">
        <thead class="bg-dark" style="color: white">
        <tr>
            <th width="60px" style="vertical-align: middle;text-align: center">No</th>
            <th style="vertical-align: middle;text-align: center">Plant</th>
            <th st
            yle="vertical-align: middle;text-align: center">Nopol</th>
            <th style="vertical-align: middle;text-align: center">Perusahaan</th>
            <th style="vertical-align: middle;text-align: center">Kim</th>      
            <th style="vertical-align: middle;text-align: center">Keterangan</th>      
            <th width="130px" style="vertical-align: middle;text-align: center">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $i=1;
        ?>
        <?php $__currentLoopData = $kim; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td style="vertical-align: middle; text-align: center"> <?php echo e($i++); ?></td>
            <td style="vertical-align: middle; text-align: center"><?php echo e($s->PLANT); ?></td>
            <td style="vertical-align: middle; text-align: center"><?php echo e($s->NOPOL); ?></td>
            <td style="vertical-align: middle; text-align: center"><?php echo e($s->PERUSAHAAN); ?></td>
            <td style="vertical-align: middle; text-align: center"><?php echo date("d/m/Y", strtotime($s->KIM))?></td>
            <td style="vertical-align: middle; text-align: center"><?php echo e($s->KETERANGAN); ?></td>    
                <td style="vertical-align: middle" align="center">
                    <a class="btn btn-primary btn-sm" title="Edit" href="#modalFormKim" data-toggle="modal"
                       data-href="<?php echo e(url('kim/update/'.$s->id)); ?>">
                        Edit</a>
                    <input type="hidden" name="_method" value="delete"/>
                    <a class="btn btn-danger btn-sm" title="Delete" data-toggle="modal"
                       href="#modalDelete"
                       data-id="<?php echo e($s->id); ?>"
                       data-token="<?php echo e(csrf_token()); ?>">
                        Delete
                    </a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <nav>
        <ul class="pagination justify-content-end">
            <?php echo e($kim->links('vendor.pagination.bootstrap-4')); ?>

        </ul>
    </nav>
</div> 
</body><?php /**PATH C:\xampp\htdocs\KP\resources\views/kim.blade.php ENDPATH**/ ?>