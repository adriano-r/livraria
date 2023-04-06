
@if($mensagem = Session::get('erro'))
	{{ $mensagem }}
@endif

@if($errors->any())
	@foreach($errors->all() as $error)
		{{ $error }} <br>
	@endforeach
@endif

<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
	integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
	crossorigin="anonymous">
<div class="body">
	<div class="veen">
		<div class="login-btn splits">
			<p>Already an user?</p>
			<button class="active">Login</button>
		</div>
		<div class="rgstr-btn splits">
			<p>Não possui conta?</p>
			<button>
				<a href="{{ route('login.create') }}">Registrar</a>
			</button>
		</div>
		<div class="wrapper">
			<form action="{{ route('login.auth') }}" method="POST" id="login" tabindex="500">
				@csrf
				<h3>Login</h3>
				<div class="mail">
					<input type="email" name="email"> <label>Email</label>
				</div>
				<div class="passwd">
					<input type="password" name="password"> <label>Senha</label>
				</div>
				<div class="checkbox" style="display: inline-flex; align-items: center; justify-content: right">
					<input style="width: 15px; height: 15px; padding: 5px; margin-right: -25px;" type="checkbox" name="remember"> Lembrar-me
				</div>
				<div class="submit">
					<button type="submit" class="dark">Entrar</button>
				</div>
			</form>
		</div>
	</div>
</div>


<style type="text/css">
.site-link {
	padding: 5px 15px;
	position: fixed;
	z-index: 99999;
	background: #fff;
	box-shadow: 0 0 4px rgba(0, 0, 0, .14), 0 4px 8px rgba(0, 0, 0, .28);
	right: 30px;
	bottom: 30px;
	border-radius: 10px;
}

.site-link img {
	width: 30px;
	height: 30px;
}

.body {
	background: #ff4931;
	transition: all .5s;
	padding: 1px;
	min-height: 100vh;
	display: flex;
	align-items: center;
	justify-content: center;
}

.veen {
	width: 70%;
	margin: 100px auto;
	background: rgba(255, 255, 255, .5);
	min-height: 400px;
	display: table;
	position: relative;
	box-shadow: 0 0 4px rgba(0, 0, 0, .14), 0 4px 8px rgba(0, 0, 0, .28);
}

.veen>div {
	display: table-cell;
	vertical-align: middle;
	text-align: center;
	color: #fff;
}

.veen button {
	background: transparent; //
	background-image: linear-gradient(90deg, #e0b722, #ff4931);
	display: inline-block;
	padding: 10px 30px;
	border: 3px solid #fff;
	border-radius: 50px;
	background-clip: padding-box;
	position: relative;
	color: #FFF; //
	box-shadow: 0 0 4px rgba(0, 0, 0, .14), 0 4px 8px rgba(0, 0, 0, .28);
	transition: all .25s;
}

.veen button.dark {
	border-color: #ff4931;
	background: #ff4931;
}

.veen .move button.dark {
	border-color: #e0b722;
	background: #e0b722;
}

.veen .splits p {
	font-size: 18px;
}

.veen button:active {
	box-shadow: none;
}

.veen a {
	text-decoration: inherit;
	color: inherit;
}

.veen button:focus {
	outline: none;
}

.veen>.wrapper {
	position: absolute;
	width: 40%;
	height: 120%;
	top: -10%;
	left: 5%;
	background: #fff;
	box-shadow: 0 0 4px rgba(0, 0, 0, .14), 0 4px 8px rgba(0, 0, 0, .28);
	transition: all .5s;
	color: #303030;
	overflow: hidden;
}

.veen .wrapper>form {
	padding: 15px 30px 30px;
	width: 100%;
	transition: all .5s;
	background: #fff;
	width: 100%;
}

.veen .wrapper>form:focus {
	outline: none;
}

.veen .wrapper #login {
	padding-top: 20%;
	visibility: visible;
}

.veen .wrapper>form>div {
	position: relative;
	margin-bottom: 15px;
}

.veen .wrapper label {
	position: absolute;
	top: -7px;
	font-size: 12px;
	white-space: nowrap;
	background: #fff;
	text-align: left;
	left: 15px;
	padding: 0 5px;
	color: #999;
	pointer-events: none;
}

.veen .wrapper h3 {
	margin-bottom: 25px;
}

.veen .wrapper input {
	height: 40px;
	padding: 5px 15px;
	width: 100%;
	border: solid 1px #999;
}

.veen .wrapper input {
	height: 40px padding: 5px 15px;
	width: 100%;
	border: solid 1px #999;
}

.veen .wrapper input:focus {
	outline: none;
	border-color: #ff4931;
}

@media ( max-width : 767px) {
	.veen {
		padding: 5px;
		margin: 0;
		width: 100%;
		display: block;
	}
	.veen>.wrapper {
		position: relative;
		height: auto;
		top: 0;
		left: 0;
		width: 100%;
	}
	.veen>div {
		display: inline-block;
	}
	.splits {
		width: 50%;
		background: #fff;
		float: left;
	}
	.splits button {
		width: 100%;
		border-radius: 0;
		background: #505050;
		border: 0;
		opacity: .7;
	}
	.splits button.active {
		opacity: 1;
	}
	.splits button.active {
		opacity: 1;
		background: #ff4931;
	}
	.splits.rgstr-btn button.active {
		background: #e0b722;
	}
	.splits p {
		display: none;
	}
	.veen>.wrapper.move {
		left: 0%;
	}
}

input:-webkit-autofill, textarea:-webkit-autofill, select:-webkit-autofill
	{
	box-shadow: inset 0 0 0 50px #fff
}
</style>