@extends(Config::get('sgiauthorizer.view.layout'))
@section(Config::get('sgiauthorizer.view.userInfoSection'))      
	<ul>
		<li>Username: {{$usuario->username}}</li>
		<li>Nome: {{$usuario->nome}}</li>
		<li>Cpf: {{$usuario->cpf}}</li>
		<li>Rg: {{$usuario->rg}}</li>
		<li>Email: {{$usuario->email}}</li>
	</ul>	
@stop