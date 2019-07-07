<body style="padding-bottom: 50px;background: #DEF0EF">
<div class="container">
	<div class="row">
  <div class="col-md-4 offset-md-4 form-group">
	
            <div class="input-group">
                <input class="form-control" id="searchscsan"
                       value="{{ request()->session()->get('searchscsan') }}"
                       onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('scan')}}?searchscsan='+this.value)"
                       placeholder="Search LO" name="searchscsan"
                       type="text" id="searchscsan"/>
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-warning"
                            onclick="ajaxLoad('{{url('scan')}}?searchscsan='+$('#searchscsan').val())">Search</button>
                </div>
            </div>
        </div>
</div>


<div id="notfound" style="display: none">
    <center>
        <br>
        <br>
        <br>
        <br>
        <h4>Data Not Found</h4>
    </center>
</div>
<div id="kuning" class="container" style="background-color: #FFC93A; border-radius: 20px; margin-top: 50px; box-shadow: 10px 10px 5px grey;">
			<div style="text-align: right; margin-bottom: 10px;"><img src="img/logo.png" width="175" style="margin-top: 30px; margin-right: 20px"></div>
  			<h1 style="text-align: center; margin-bottom: 50px; margin-top: 10px">SURAT PERINTAH ISI </h1>

		
      
        @foreach($spi as $s)
        
      		<div class="row justify-content-around">
    			<div class="col-4"><h5><b>SPPBE/Agen  &nbsp;:  </b>{{$s->PERUSAHAAN}}<h5></div>
    			<div class="col-4" style="text-align: left;"><h5><b>Delivery Number &nbsp;: &nbsp; &nbsp;</b>{{$s->LO}}<h5></div>
    		</div>
    		<div class="row justify-content-around">
    			<div class="col-4"><h5><b>Transportir PT.</b> {{$s->TRANSPORTIR}}<h4></div>
    			<div class="col-4" style="text-align: left;"><h5><b>SPA/SO Number &nbsp; : &nbsp;</b>{{$s->SPA}}<h5></div>
    		</div>
    		<div class="row justify-content-around" style="margin-top: 60px">
    			<div class="col-10"><h5><b>Condition</b><h5></div>
    			<!-- <div class="col-4" style="text-align: left;"><h5><b>Vehicle Driver &nbsp;: &nbsp;</b>{{$s->SPA}}<h5></div> -->
    		</div>
    		<div class="row justify-content-around">
    			<div class="col-4"><h5><b>Shipping</b><h4></div>
    			<div class="col-4" style="text-align: left;"><h5><b>Vehicle Number &nbsp;: &nbsp;</b>{{$s->NOPOL}}<h5></div>
    		</div>
    		<div class="row justify-content-around">
    			<div class="col-10"><h5><b>Ship Form &nbsp;</b>Depot LPG Tanjung Perak<h5></div>
    			<!-- <div class="col-4" style="text-align: left;"><h5><b>Filling Point &nbsp;: &nbsp;</b>{{$s->SPA}}<h5></div> -->
    		</div>
    		<div class="row justify-content-around" style="margin-top: 40px; text-align: left">
    			<div class="col-10"><h5><b>Shipping Details&nbsp;</b><h5></div>
    		</div>
    		<div class="row justify-content" style=" text-align: right">
    			<div class="col-2"><h5><b>Item</b><h5></div>
    			<div class="col-2"><h5><b>Material</b><h5></div>
    			<div class="col-6"><h5><b>Quantity</b><h5></div>
    		</div>
    		<div class="row justify-content" style=" text-align: right;">
    			<div class="col-4"><h5><b>Description</b><h5></div>
    		</div>
    		<hr>
    		<div class="row justify-content" style=" text-align: right; margin-top: 15px;">
    			<div class="col-2"><h5><b>0010</b><h5></div>
    			<div class="col-2"><h5><b>A050410001</b><h5></div>
    		</div>
    		<div class="row justify-content" style=" text-align: right; margin-bottom: 100p">
    			<div class="col-4"><h5><b>LPG Mix, Bulk</b><h5></div>
    		</div>
    		<div class="row justify-content-around" style=" text-align: right; margin-top: 30px;">
    			<div class="col-10"><h5><?php date_default_timezone_set('Asia/Jakarta');  echo  date("d M Y H:i"); ?></h5></div>

@endforeach

<script type="text/javascript">
    var number = document.getElementById("searchscsan").value; 
    if(number == ''){
        document.getElementById("kuning").style.display = "none";
        document.getElementById("notfound").style.display = "block";
    }
    

</script>    
  
</div>
