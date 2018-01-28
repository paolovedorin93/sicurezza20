<!DOCTYPE html>
<html>

	<head>
		<title>Modifica Ente</title>

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/edit.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
        <link rel="favicon" href="{{ asset('image/logo_provincia.ico') }}">
	</head>

	<body>
		@if(Auth::user())
		<br><br><br><br>
		<p align="center">Sicuro di voler procedere alla<b> modifica</b> dell'ente <b>{{ $utility->name }}</b>? Premi "Modifica" per procedere, "Indietro" per annullare.</p>
		<br><br><br><br>

		<div class="container" align="center">
			<form method="POST" action="{{ action('CrudsController@editUtility',$utility->id) }}">
			{{ csrf_field() }}
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Nome</th>
							<th>Indirizzo</th>
							<th>Azioni</th>
						</tr>
					</thead>
					<tbody>
						<tr align="center">
							<td>
								<input name="_method" type="hidden" value="PATCH">
								<div class="col-sm-10">
									<textarea name="name" rows="2" cols="40" style="text-align: center;">{{$utility->name}}</textarea>
								</div>
							</td>
							<td>
								<div class="form-group row">
									<div class="col-sm-10">
										<textarea name="address" rows="1" cols="60" style="text-align: center;">{{$utility->address}}</textarea>
									</div>
								</div>
							</td>
							<td id="button">
								<div class="form-group row">
									&nbsp;&nbsp;&nbsp;<button id="elimina" type="submit" class="btn btn-primary"><i class="fa fa-pencil fa-lg">&nbsp;&nbsp;&nbsp;</i>Modifica</button>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
		<br><br><br><br><br>
		<a href="{{ URL('cruds/utilities') }}" class="btn btn-warning" >
			<button id="indietro" class="btn btn-danger" type="submit"><i class="fa fa-undo fa-lg">&nbsp;&nbsp;&nbsp;</i> Indietro</button>
		</a>
		@endif
		@if(Auth::guest())
			<br><br><br><br>
			<div align="center">
		    	<a href="{{ URL('') }}">
					<button id="btn_expire" ></button>
				</a>
			</div>
			<p align="center" style="font-size: 25px; font-family: sans-serif;">La sessione è scaduta</p>
		@endif
	</body>
</html>