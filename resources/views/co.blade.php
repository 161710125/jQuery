<!DOCTYPE html>
<html>
<head>
	<title>Heem</title>
	<style type="text/css">
		input[type='submit'], button, [aria-label]{
			cursor: pointer;
		}
	</style>
</head>
<body>
	<form action="javascript:void(0);" method="POST" onsubmit="app.Add()">
		<input type="text" id="add-name" placeholder="Negara Baru">
		<input type="submit" value="add">
	</form>
<p id="counter"></p>
<table border="1">
	<tr>
		<th>Nama Negara</th>
	</tr>
	<tbody id="countries">
	</tbody>
</table>
<script type="text/javascript">
	var app = new function() {
		this.el = document.getElementById('countries');
		this.countries = [];
		this.Count = function(data) {
			var el = document.getElementById('counter');
			var name = 'Negoro';
			if (data) {
				if (data > 1) {
					name = 'countries';
				}
				el.innerHTML = data + ' ' + name;
			} else {
				el.innerHTML = 'No ' + name;
			}
		};
		this.FetchAll = function() {
			var data = '';
			if (this.countries.length > 0) {
				for (i = 0; i < this.countries.length; i++) {
					data += '<tr>';
					data += '<td>' + this.countries[i] + '</td>'
					data += '</tr>';
				}
			}
			this.Count(this.countries.length);
			return this.el.innerHTML = data;
		};
		this.Add = function (){
			el = document.getElementById('add-name');
			// get the value
			var country = el.value;
			if (country) {
				//Add the new value
				this.countries.push(country.trim());
				//reset input value
				el.value = '';
				//Display the new list
				this.FetchAll();
			}
		};
	}
</script>
</body>
</html>