 <div class="container-fluid"> 
        <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="post" action="/spi/import_excel" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                        </div>
                        <div class="modal-body">
 
                            {{ csrf_field() }}
 
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

<div class="container-fluid">
    <h1 style="font-size: 2.3rem; text-align: center">IMPORT SPI</h1>
    <hr/>
    
        {{-- notifikasi form validasi --}}
        @if ($errors->has('file'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('file') }}</strong>
        </span>
        @endif
 
        {{-- notifikasi sukses --}}
        @if ($sukses = Session::get('sukses'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $sukses }}</strong>
        </div>
        @endif
    <div class="row">
        <div class="col-sm-4 form-group">
            {!! Form::select('KETERANGAN',['-1'=>'Lihat Semua','SPBE'=>'SPBE',''=>'',],request()->session()->get('KETERANGAN'),['class'=>'form-control','onChange'=>'ajaxLoad("'.url("spi").'?KETERANGAN="+this.value)']) !!}

        </div>
        <div class="col-sm-5 form-group">
            <div class="input-group">
                <input class="form-control" id="search"
                       value="{{ request()->session()->get('search') }}"
                       onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('spi')}}?search='+this.value)"
                       placeholder="Search SPA" name="search"
                       type="text" id="search"/>
                <input class="form-control" id="searchbelakang"
                       value="{{ request()->session()->get('searchbelakang') }}"
                       onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('spi')}}?searchbelakang='+this.value)"
                       placeholder="Search SPA Belakang" name="searchbelakang"
                       type="text" id="searchbelakang"/>                       
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-warning"
                            onclick="ajaxLoad('{{url('spi')}}?search='+$('#search').val()+'&searchbelakang='+$('#searchbelakang').val())">Search</button>
                </div>
            </div>
        </div>
        
         

    <div>
        <button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#importExcel">
            Import
        </button>

        <div class="float-right">
        <a href="#modalForm" data-toggle="modal" data-href="{{url('spi/create')}}"
           class="btn btn-success mr-2">New</a>
    </div>
    </div>
 
        {!! Form::model($spi, array( 'route' => array('spi.truncate'),'method' => 'DELETE')) !!}
        <button type="submit" class="btn btn-danger mr-2">
            Delete All 
        </button>
        {!! Form::close()!!}

    

    <table class="table table-bordered bg-light">
        <thead class="bg-dark" style="color: white">
        <tr>
            <th width="60px" style="vertical-align: middle;text-align: center">No</th>
            <th style="vertical-align: middle;text-align: center">Plan</th>
            <th style="vertical-align: middle;text-align: center">Actual</th>
            <th style="vertical-align: middle;text-align: center">LO</th>
            <th style="vertical-align: middle;text-align: center">Transportir</th>
            <th style="vertical-align: middle;text-align: center">Perusahaan</th>
            <th style="vertical-align: middle;text-align: center">No. SPA</th>
            <th style="vertical-align: middle;text-align: center">Nopol</th>
            <th style="vertical-align: middle;text-align: center">Quantity</th>
            <th style="vertical-align: middle;text-align: center">Keterangan</th>
            <th width="130px" style="vertical-align: middle;text-align: center">Action</th>
        </tr>
        </thead>
        <tbody>
        @php
            $i=1;
        @endphp
        @foreach($spi as $s)
            <tr>
            <td style="vertical-align: middle; text-align: center"> {{ $i++}}</td>
            <td style="vertical-align: middle; text-align: center"><?php echo date("d/m/Y", strtotime($s->PLAN))?></td>
            <td style="vertical-align: middle; text-align: center"><?php echo date("d/m/Y H:i", strtotime($s->ACTUAL))?></td>
            <td style="vertical-align: middle; text-align: center">{{ $s->LO }}</td>
            <td style="vertical-align: middle; text-align: center">{{ $s->TRANSPORTIR }}</td>
            <td style="vertical-align: middle; text-align: center">{{ $s->PERUSAHAAN }}</td>
            <td style="vertical-align: middle; text-align: center">{{ $s->SPA }}</td>
            <td style="vertical-align: middle; text-align: center">{{ $s->NOPOL }}</td>
            <td style="vertical-align: middle; text-align: center">{{ $s->QUANTITY }}</td>
            <td style="vertical-align: middle; text-align: center">{{ $s->KETERANGAN }}</td>
                
                <td style="vertical-align: middle" align="center">
                    <a class="btn btn-primary btn-sm" title="Edit" href="#modalForm" data-toggle="modal"
                       data-href="{{url('spi/update/'.$s->id)}}">
                        Edit</a>
                    <input type="hidden" name="_method" value="delete"/>
                    <a class="btn btn-danger btn-sm" title="Delete" data-toggle="modal"
                       href="#modalDelete"
                       data-id="{{$s->id}}"
                       data-token="{{csrf_token()}}">
                        Delete</a>
                     <a class="btn btn-success btn-sm" title="Show" href="show" data-toggle="modal"
                       data-href="{{url('spi/show/'.$s->id)}}">
                        Show</a>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <nav>
        <ul class="pagination justify-content-end">
            {{$spi->links('vendor.pagination.bootstrap-4')}}
        </ul>
    </nav>
</div> 
</body>