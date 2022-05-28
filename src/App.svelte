<script>
	import { Router, Route } from "svelte-navigator";
	import Menu from "./componentes/Menu.svelte";
	import Home from "./paginas/Home.svelte";
	import Contato from "./paginas/Contato.svelte";
	
</script>

<body>
	
	<Router>
		<Menu />

		<Route path="/">
			<Home />
		</Route>
		<Route path="/contato">
			<Contato />
		</Route>
	</Router>
	
</body>

<style>
	body {
		background-color: #0c011c;
		
	}
</style>
