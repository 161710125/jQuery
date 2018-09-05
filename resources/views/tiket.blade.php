@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>
   <head>
      <title>Tiketting</title>
   </head>
   <body>
      <div class="container">
         <h2>Tiketting</h2>
         <table class="table table-hover">
            <thead>
               <tr>
                  <TH>No</TH>
                  <th>Tribun</th>
                  <th>Harga</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td>1</td>
                  <td>Utara</td>
                  <td>50000</td>
               </tr>
               <tr>
                  <td>2</td>
                  <td>Selatan</td>
                  <td>60000</td>
               </tr>
               Jika Pembelian Lebih dari 3 disc 20%
            </tbody>
         </table>
      </div>
      <br>
      <br>
      <br>
      <form class="form-group">
         <div class="form-group">
            <label>Pilih Tribun</label>
            <select class="form-control" id="trbn">
               <option value="Utara">Utara</option>
               <option value="Selatan">Selatan</option>
            </select>
         </div>
         <br>
         <div class="form-group">
            <label>Jumlah Tiket</label>
            <input type="number" class="form-control" id="jmlh">
         </div>
         <br><br><br>
      </form>
      <button type="submit" id="subm" class="btn btn-default">Submit</button>
      </div><br><br><br>
      Tribune		: <b id="TRIBUNE"></b><br>
      Harga Tiket 	: <b id="HARGA"></b><br>
      Jumlah Tiket 	: <b id="JUMLAH"></b><br>
      Discount		: <b id="DISC"></b><br>
      TOTAL			: <b id="TOTAL"></b><br>
      <script src="{{ asset('new/hmm.min.js') }}"></script>
      <script type="text/javascript">
         $(document).ready(function() {
         	$('#subm').click(function(){
         	var jmlh = $('#jmlh').val();
         	var tribun = $('#trbn').val();
         	console.log(tribun)
         
         	switch (true){
         		case tribun == 'Utara':
         		var trib = 50000;
                    break;
                    case tribun == 'Selatan':
         		var trib = 60000;
                    break;
         	}
         	if (jmlh => 3) {
         		var discount = 20;
         		$('#DISC').text('Anda Mendapat Diskon');
         		var awal = (parseInt(trib)*parseInt(jmlh));
         		var total = (parseInt(trib)*parseInt(jmlh)*discount/100);
         		var disc = (parseInt(awal)-parseInt(total));
         	$('#TOTAL').text(disc);
         	}
         	else if (jmlh <= 2) {
         		$('#DISC').text('-');
         		var total = (parseInt(trib)*parseInt(jmlh));
         		$('#TOTAL').text(total);
         	}
         
         	
         	$('#HARGA').text(trib);
         	$('#TRIBUNE').text(tribun);
         	$('#JUMLAH').text(jmlh);
         });
         });
      </script>
   </body>
</html>
@endsection