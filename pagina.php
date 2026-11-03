<?php
session_start();
?>
<html>

<head>

	<meta charset="UTF-8">

	<title>Página Protegida</title>

	<style>
		body{
			color:white;
			font-family:cursive;
			background: radial-gradient(circle,rgba(0, 0, 0, 1) 0%, rgba(92, 92, 92, 1) 100%);
			background-size:200% 200%;
			animation: fundo 10s ease-in-out infinite;
		}
		.card{
			background-color:#B5B5B5;
			text-align:center;
			border-radius:15px;
			width:400px;
			padding:60px 20px;
			margin:100px auto 0 auto;
			box-shadow: 0px 0px 50px -4px white;
			animation:
				entrada 0.9s ease-out backwards,
				brilho 4s ease-in-out 1s infinite;
		}
		h1{
			animation: subir 0.8s ease-out 0.3s backwards;
		}
		p{
			animation: subir 0.8s ease-out backwards;
		}
		p:nth-of-type(1){ animation-delay:0.5s; }
		p:nth-of-type(2){ animation-delay:0.8s; }
		a{
			display:inline-block;
			color:white;
			background-color:gray;
			border:1px solid white;
			border-radius:5px;
			padding:8px 18px;
			text-decoration:none;
			transition: transform 0.3s, background-color 0.3s, box-shadow 0.3s;
			animation: subir 0.8s ease-out 1.1s backwards;
		}
		a:hover{
			background-color:#777;
			transform:scale(1.08);
			box-shadow:0 0 12px white;
		}

		/* Animações */
		@keyframes entrada{
			from{ opacity:0; transform:translateY(-60px) scale(0.9); }
			to{ opacity:1; transform:translateY(0) scale(1); }
		}
		@keyframes subir{
			from{ opacity:0; transform:translateY(20px); }
			to{ opacity:1; transform:translateY(0); }
		}
		@keyframes brilho{
			0%, 100%{ box-shadow:0px 0px 50px -4px white; }
			50%{ box-shadow:0px 0px 75px 2px white; }
		}
		@keyframes fundo{
			0%, 100%{ background-position:50% 50%; }
			50%{ background-position:20% 80%; }
		}
	</style>

</head>

<body>

	<div class="card">

		<h1>Bem-Vindo!</h1>

		<p>
			olá,<?=htmlspecialchars($_SESSION["usuario"])?>
		</p>

		<p>você acessou uma página protegida por sessão.</p>

		<a href="sair.php">Sair do sistema</a>

	</div>

	<script>
	(function () {
		const canvas = document.createElement("canvas");
		canvas.style.cssText = "position:fixed;top:0;left:0;width:100%;height:100%;z-index:-1;pointer-events:none;";
		document.body.appendChild(canvas);
		const ctx = canvas.getContext("2d");

		let w, h;
		const mouse = { x: null, y: null };
		const particulas = [];
		const QUANTIDADE = 80;
		const DISTANCIA = 120;

		function ajustar() {
			w = canvas.width = window.innerWidth;
			h = canvas.height = window.innerHeight;
		}
		window.addEventListener("resize", ajustar);
		window.addEventListener("mousemove", e => { mouse.x = e.clientX; mouse.y = e.clientY; });
		window.addEventListener("mouseout", () => { mouse.x = null; mouse.y = null; });
		ajustar();

		for (let i = 0; i < QUANTIDADE; i++) {
			particulas.push({
				x: Math.random() * w,
				y: Math.random() * h,
				vx: (Math.random() - 0.5) * 0.6,
				vy: (Math.random() - 0.5) * 0.6,
				r: Math.random() * 2 + 1
			});
		}

		function animar() {
			ctx.clearRect(0, 0, w, h);

			for (const p of particulas) {
				p.x += p.vx;
				p.y += p.vy;
				if (p.x < 0 || p.x > w) p.vx *= -1;
				if (p.y < 0 || p.y > h) p.vy *= -1;

				ctx.beginPath();
				ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
				ctx.fillStyle = "rgba(255,255,255,0.8)";
				ctx.fill();
			}

			const pontos = mouse.x === null ? particulas : particulas.concat([mouse]);
			for (let i = 0; i < pontos.length; i++) {
				for (let j = i + 1; j < pontos.length; j++) {
					const dx = pontos[i].x - pontos[j].x;
