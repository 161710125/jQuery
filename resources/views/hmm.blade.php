<!DOCTYPE html>
<html>
   <head>
      <title>Each</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   </head>
   <body>
      <div class="col-md-6">
      <div class="panel-group">
         <div class="panel panel-success">
            <div class="panel-heading">
               <div class="panel-body">
                  <form class="form-group">
                     <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nilai Kesatu</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control jumlah" placeholder="20">
                        </div>
                        <label class="col-sm-2 col-form-label">Nilai Kedua</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control jumlah" placeholder="33">
                        </div>
                        <label class="col-sm-2 col-form-label">Hasil</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" id="hsl" placeholder="45" readonly>
                        </div>
                  </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <center>
         <button type="submit" id="subm" class="btn btn-primary my-1">Click Me!</button>
      </center>
   </body>
</html>
<script type="text/javascript" src="{{ asset('new/hmm.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('new/ha.min.js') }}"></script>
<script type="text/javascript" language="javascript">
   $(document).ready(function() {
   	$(function () {
   		$('.jumlah').mask('#,###.##',{reverse : true});
   		var hsl = function() {
   			var sum = 0;
   			$('.jumlah').each(function () {
   				var num = $(this).val().replace(',','');
   				if (num != 0) {
   					sum += parseFloat(num);
   				}
   				
   			});
   			$('#hsl').val(sum);
   		}
   		$('.jumlah').keyup(function(){
   			hsl();
   		})
   	});
   	$('#subm').click(function () {
   		var arr = [
   {"id":"1","first":"Pawit","last":"Ala"},
   {"id":"2","first":"Robi","last":"Purba"},
   {"id":"3","first":"Sit","last":"i"},
   {"id":"4","first":"Ras","last":"kin"},
   ];
   
   $.each(arr, function(idx, obj) {
   // $('#ID').text(obj.id);
   console.log("Id : " + obj.id);
   console.log("Nama Depan : " + obj.first);
   console.log("Nama Belakang : " + obj.last);
   console.log(" ");
   });
   	});
   });
</script>