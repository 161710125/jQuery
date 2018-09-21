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
               <p style="text-align:right">Jika Pembelian Lebih dari 3 disc 20%</p>
               <p style="text-align:right"><font color="red">Note : Hanya Berlaku untuk Member</font></p>
            </tbody>
         </table>
      </div>
      <br>
      <br>
      <br>
      <form class="form-group" id="fom">
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
         </div><br>
         <form class="form-group" id="fom1">
         <div class="form-group">
            <label>Pilih Status</label>
            <select class="form-control" id="ch">
               <option value="Member">Member</option>
               <option value="Non Member">Non Member</option>
            </select>
         </div>
         <br><br><br>
      </form><center>
      <button type="submit" id="subm" class="btn btn-default">Submit</button>
      <button type="reset" id="res" value="" class="btn btn-default">Reset</button>
      </div></center><br><br><br>
      <center>
         <center>
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                        Tribune<br><span class="input-group-text"><b id="TRIBUNE"></b></span>
                        Harga<br><span class="input-group-text"><b id="HARGA"></b></span>
                        Jumlah<br><span class="input-group-text"><b id="JUMLAH"></b></span>
                        Discount<br><span class="input-group-text"><b id="DISC"></b></span>
                        Member<br><span class="input-group-text"><b id="mem"></b></span>
                        Total<br><span class="input-group-text"><b id="TOTAL"></b></span>
                  </div>
            </div>
         </center>
      </center>
      <script src="{{ asset('new/hmm.min.js') }}"></script>
      <script type="text/javascript">
         $(document).ready(function() {
         	$('#subm').click(function(){
         	var jmlh = $('#jmlh').val();
         	var tribun = $('#trbn').val();
            var check = $('#ch').val();
         	console.log(check)
         
         	switch (true){
         		case tribun == 'Utara':
         		var trib = 50000;
                    break;
                    case tribun == 'Selatan':
         		var trib = 60000;
                    break;
                    case check == 'Member':
                    break;
                    case check == 'Non Member':
         	}
         	if (check == 'Member' && jmlh > 3) {
         		var discount = 20;
         		$('#DISC').text('Anda Mendapat Diskon');
         		var awal = (parseInt(trib)*parseInt(jmlh));
         		var total = (parseInt(trib)*parseInt(jmlh)*discount/100);
         		var disc = (parseInt(awal)-parseInt(total));
         	$('#TOTAL').text(disc);
         	}
         	else if (check == 'Member' && jmlh <= 3) {
         		$('#DISC').text('-');
         		var total = (parseInt(trib)*parseInt(jmlh));
         		$('#TOTAL').text(total);
         	}
            if (check == 'Non Member') {
               $('#DISC').text('-');
               var total = (parseInt(trib)*parseInt(jmlh));
               $('#TOTAL').text(total);
            }
            else if (jmlh <=0) {
            }

         
         	$('#mem').text(check);
         	$('#HARGA').text(trib);
         	$('#TRIBUNE').text(tribun);
         	$('#JUMLAH').text(jmlh);
         	$("#jmlh").text('');
            $('#res').click(function() {
               $('#fom')[0].reset();
               $('#HARGA,#TRIBUNE,#JUMLAH,#TOTAL,#DISC,#mem').text('')
            });
         });
         });
      </script>
   </body>
</html>
@endsection