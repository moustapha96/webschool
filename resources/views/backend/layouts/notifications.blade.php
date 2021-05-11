@if (isset($messageSuccess))
<div class="row">
	<div class="col-md-12">
		<div class="bs-component">
			<div class="alert alert-dismissible alert-success">
				<button class="close" type="button" data-dismiss="alert">×</button>
				<strong>Opération réussie !</strong>
				<br>
				{{ $messageSuccess }}
			</div>
		</div>
	</div>
</div>
@endif

@if (isset($messageDanger))
<div class="row">
	<div class="col-md-12">
		<div class="bs-component">
			<div class="alert alert-dismissible alert-danger">
				<button class="close" type="button" data-dismiss="alert">×</button>
				<strong>Attention !</strong>
				<br>{{ $messageDanger }}
			</div>
		</div>
	</div>
</div>
@endif

@if (isset($messageWarning))
<div class="row">
	<div class="col-md-12">
		<div class="bs-component">
			<div class="alert alert-dismissible alert-warning">
				<button class="close" type="button" data-dismiss="alert">×</button>
				<strong>Attention !</strong>
				<br>{{ $messageWarning }}
			</div>
		</div>
	</div>
</div>
@endif


