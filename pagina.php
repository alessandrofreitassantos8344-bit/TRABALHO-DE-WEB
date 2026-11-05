<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Página Protegida</title>

	<style>

		@import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');

		*{ box-sizing:border-box; }

		body{
			margin:0;
			min-height:100vh;
			display:flex;
			align-items:center;
			justify-content:center;
			padding:40px 20px;
			font-family:'Press Start 2P', 'Courier New', monospace;
			font-size:12px;
			line-height:1.7;
			color:#404040;
			background:
				linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
				url("https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/9c9e740d-df91-4221-be13-b37fb394f7f4/d4ywq8d-e1806567-312f-4e26-a769-147436e0a4c6.png/v1/fill/w_900,h_900,q_80,strp/ipad_wallpaper_mc_dirt_by_xseanx123_d4ywq8d-fullview.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9OTAwIiwicGF0aCI6Ii9mLzljOWU3NDBkLWRmOTEtNDIyMS1iZTEzLWIzN2ZiMzk0ZjdmNC9kNHl3cThkLWUxODA2NTY3LTMxMmYtNGUyNi1hNzY5LTE0NzQzNmUwYTRjNi5wbmciLCJ3aWR0aCI6Ijw9OTAwIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmltYWdlLm9wZXJhdGlvbnMiXX0.gZ0K_9PTV3Ivftfz1FBOGHSs0NLSWyfgqc07-NCw5w8"),
				url("fundo.png");
			background-size:auto, 450px 450px, 450px 450px;
			image-rendering:pixelated;
		}

		.painel{
			position:relative;
			width:100%;
			max-width:460px;
			padding:32px 28px 28px;
			background:#C6C6C6;
			border:2px solid #000;
			box-shadow:
				inset 3px 3px 0 #FFFFFF,
				inset -3px -3px 0 #555555,
				6px 6px 0 rgba(0,0,0,0.5);
		}

		.splash{
			position:absolute;
			top:-18px;
			right:-22px;
			color:#FFFF00;
			font-size:11px;
			text-shadow:2px 2px 0 #3F3F00;
			white-space:nowrap;
			transform:rotate(-18deg);
			animation:pulsar 0.9s ease-in-out infinite alternate;
			pointer-events:none;
		}

		h1, h2{
			margin:0 0 8px;
			font-size:18px;
			font-weight:normal;
			color:#404040;
			text-shadow:2px 2px 0 #FFFFFF;
		}

		.subtitulo{
			margin:0 0 22px;
			padding-bottom:16px;
			border-bottom:2px solid #8B8B8B;
			font-size:10px;
			color:#555555;
		}

		.campo{ margin-bottom:18px; }

		label{
			display:block;
			margin-bottom:8px;
			font-size:11px;
			color:#404040;
		}

		input[type="text"],
		input[type="password"]{
			width:100%;
			padding:12px 10px;
			font-family:inherit;
			font-size:11px;
			color:#E0E0E0;
			background:#000000;
			border:2px solid #A0A0A0;
			border-radius:0;
		}

		input[type="text"]::placeholder,
		input[type="password"]::placeholder{
			color:#707070;
		}

		input[type="text"]:focus,
		input[type="password"]:focus{
			outline:none;
			border-color:#FFFFFF;
		}

		.botao{
			display:block;
			width:100%;
			margin-top:8px;
			padding:14px 12px;
			font-family:inherit;
			font-size:12px;
			text-align:center;
			text-decoration:none;
			color:#E0E0E0;
			text-shadow:2px 2px 0 #3F3F3F;
			background:#8B8B8B;
			border:2px solid #000;
			border-radius:0;
			box-shadow:
				inset 3px 3px 0 rgba(255,255,255,0.45),
				inset -3px -3px 0 rgba(0,0,0,0.45);
			cursor:pointer;
		}

		.botao:hover{
			color:#FFFFA0;
			background:#7B83C4;
		}

		.botao:active{
			box-shadow:
				inset 3px 3px 0 rgba(0,0,0,0.45),
				inset -3px -3px 0 rgba(255,255,255,0.35);
		}

		.botao:focus-visible{
			outline:2px solid #FFFFFF;
			outline-offset:2px;
		}

		.saudacao{
			margin:0 0 14px;
			font-size:13px;
			color:#404040;
			word-break:break-word;
		}

		.texto{
			margin:0 0 24px;
			font-size:10px;
			color:#555555;
		}

		@keyframes pulsar{
			from{ transform:rotate(-18deg) scale(1); }
			to{ transform:rotate(-18deg) scale(1.12); }
		}

		@media (max-width:520px){
			.painel{ padding:28px 18px 22px; }
			.splash{ right:-6px; }
		}

		@media (prefers-reduced-motion:reduce){
			.splash{ animation:none; }
		}

	</style>

</head>

<body>

	<div class="painel">

		<span class="splash">Sessão iniciada!</span>

		<h1>Área restrita</h1>
		<p class="subtitulo">Acesso autenticado por sessão.</p>

		<p class="saudacao">
			Olá, <?=htmlspecialchars($_SESSION["usuario"])?>
		</p>

		<p class="texto">Você acessou uma página protegida por sessão.</p>

		<a class="botao" href="sair.php">Sair do sistema</a>

	</div>

</body>

</html>
