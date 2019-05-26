<div class="col-sm-12 col-md-6">
	<div class="form-group">
		<label for="placa">Placa<span style="color: red;">*</span></label>
		<input type="text" maxlength="7" class="form-control" required name="placa" id="placa" placeholder="Digite a placa do veículo">
		@if($err && array_key_exists('placa', $err))
			@foreach ($err['placa'] as $item)
				<small class="text-danger">{{$item}}</small>
			@endforeach
		@endif
	</div>
	<div class="form-group">
		<label for="brand">Marca<span style="color: red;">*</span></label>
		<input type="text" maxlength="50" class="form-control" required name="brand" id="brand" placeholder="Digite a marca do veículo">
		@if($err && array_key_exists('brand', $err))
			@foreach ($err['brand'] as $item)
				<small class="text-danger">{{$item}}</small>
			@endforeach
		@endif
	</div>
	<div class="form-group">
		<label for="model">Modelo</label>
		<input type="text" maxlength="50" class="form-control" required name="model" id="model" placeholder="Digite o modelo do veículo">
		@if($err && array_key_exists('model', $err))
			@foreach ($err['model'] as $item)
				<small class="text-danger">{{$item}}</small>
			@endforeach
		@endif
	</div>
	<div class="form-group">
		<label for="color">Cor<span style="color: red;">*</span></label>
		<input type="text" maxlength="50" class="form-control" required name="color" id="color" placeholder="Digite a cor do veículo">
		@if($err && array_key_exists('color', $err))
			@foreach ($err['color'] as $item)
				<small class="text-danger">{{$item}}</small>
			@endforeach
		@endif
	</div>
	<div class="form-group">
		<label for="year">Ano<span style="color: red;">*</span></label>
		<input type="text" maxlength="4" class="form-control" required name="year" id="year" placeholder="Digite o ano do veículo">
		@if($err && array_key_exists('year', $err))
			@foreach ($err['year'] as $item)
				<small class="text-danger">{{$item}}</small>
			@endforeach
		@endif
	</div>
	<div class="form-group">
		<label for="type">Tipo de veículo <span style="color: red;">*</span></label>
		<select id="type" name="type" class="form-control">
			<option value="car">Carro</option>
			<option value="bike">Moto</option>
			<option value="truck">Caminhão</option>
			<option value="utility">Utilitário</option>
		</select>
		@if($err && array_key_exists('type', $err))
			@foreach($err['type'] as $item)
				<small class="text-danger">{{$item}}</small>
			@endforeach
		@endif
	</div>
</div>
<div class="col-sm-12 col-md-6">
	<div class="form-group">
		<label for="serial_num">Número de série do equipamento<span style="color: red;">*</span></label>
		<input type="text" class="form-control" name="serial_num" id="serial_num"  placeholder="Digite o número de serie do equipamento">
		@if($err && array_key_exists('serial_num', $err))
			@foreach ($err['serial_num'] as $item)
				<small class="text-danger">{{$item}}</small>
			@endforeach
		@endif
	</div>
	<div class="form-group">
		<label for="equip_model">Modelo do equipamento<span style="color: red;">*</span></label>
		<input type="text" class="form-control" name="equip_model" id="equip_model" placeholder="Digite o modelo do equipamento">
		@if($err && array_key_exists('equip_model', $err))
			@foreach ($err['equip_model'] as $item)
				<small class="text-danger">{{$item}}</small>
			@endforeach
		@endif
	</div>
	<div class="form-group">
		<label for="chip_num">ICCID <span style="color: red;">*</span></label>
		<input type="text" class="form-control" name="chip_num" id="chip_num"  placeholder="Digite aqui...">
		@if($err && array_key_exists('chip_num', $err))
			@foreach ($err['chip_num'] as $item)
				<small class="text-danger">{{$item}}</small>
			@endforeach
		@endif
	</div>
	<div class="form-group">
		<label for="operator">Operadora <span style="color: red;">*</span></label>
		<input type="text" class="form-control" name="operator" id="operator"  placeholder="Digite aqui a operadora">
		@if($err && array_key_exists('operator', $err))
			@foreach ($err['operator'] as $item)
				<small class="text-danger">{{$item}}</small>
			@endforeach
		@endif
	</div>
	<div class="form-group">
		<label for="apn">APN <span style="color: red;">*</span></label>
		<input type="text" class="form-control" name="apn" id="apn"  placeholder="APN">
		@if($err && array_key_exists('apn', $err))
			@foreach ($err['apn'] as $item)
				<small class="text-danger">{{$item}}</small>
			@endforeach
		@endif
	</div>
	<div class="form-group">
		<label for="phone_num">Número <span style="color: red;">*</span></label>
		<input type="text" class="form-control" name="phone_num" id="phone_num"  placeholder="Digite aqui o número do chip">
		@if($err && array_key_exists('phone_num', $err))
			@foreach ($err['phone_num'] as $item)
				<small class="text-danger">{{$item}}</small>
			@endforeach
		@endif
	</div>
</div>