<script>
	// export let name;
	import { Router, Route } from "svelte-navigator";
	import Menu from "./componentes/Menu.svelte";
	import Home from "./paginas/Home.svelte";
	import Contato from "./paginas/Contato.svelte";
</script>

<Router>
	<Menu />

	<Route path="/">
		<Home />
	</Route>
	<Route path="/contato">
		<Contato />
	</Route>
</Router>

<style>
	/* h1 {
		color: #ff3e00;
		text-transform: uppercase;
		font-size: 4em;
		font-weight: 100;
	} */

	@media (min-width: 640px) {
		/* main {
			max-width: none;
		} */
	}
</style>
