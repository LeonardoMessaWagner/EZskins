<script>
	import { Router, Route } from "svelte-navigator";
	import Menu from "./componentes/Menu.svelte";
	import Home from "./Home.svelte";
	import Contato from "./Contato.svelte";
	import Cadastro from "./Cadastro.svelte";
	
	
	
</script>

<body>
	<Router>
		<Menu />

		<Route path="/" primary={false}>
			<Home />
		</Route>
		<Route path="/contato" primary={false}>
			<Contato />
		</Route>
		<Route path="/cadastro" primary={false}>
			<Cadastro />
		</Route>
	</Router>
	
</body>

<style>
	body {
		background-color: #0c011c;
	}
</style>
