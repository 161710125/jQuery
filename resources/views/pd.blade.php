<!DOCTYPE html>
<html lang="en">
<head>
  <title>Duch</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
 
<div class="container">
  <h2><center>Hmm</center></h2>
  <div class="panel-group">
    <div class="panel panel-info">
      <div class="panel-heading">Hmm</div>
      <div class="panel-body"><input type="text" id="he" class="form-control">
      	<button class="btn btn-primary" onclick="add()">Push</button>
      	<button class="btn btn-primary" onclick="searchanddelete()">Search And Delete</button>
      </div>
            Hasil : <p id="hsl"></p>
    </div>
    <br><br><br>

    <div class="container">          
  <table class="table table-striped" id="hmm">
    <thead>
      <tr>
        <th>Nama</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>

    <script type="text/javascript" src="{{ asset('new/hmm.min.js') }}"></script>
    <script type="text/javascript" language="javascript">
    	var myarr = [];
    	function add(){
    		var text = document.getElementById('he').value;
    		myarr.push(text);
    		console.log(text);
			var hach = "<tr><td>"+text+"</td></tr>";
			$("#hmm").append(hach);
    	}

    		function searchanddelete(){
    			var text2  = document.getElementById('he').value;

    			var index = myarr.indexOf(text2);

    			if (index !== -1) {
    				myarr.splice(index,1);
    				document.getElementById('hsl').innerHTML = myarr;
    				alert('Berhasil Menghapus');
    			}
    			else {
    				alert('Tidak Ada Data')
    			}
    		}
    </script>
</body>
</html>