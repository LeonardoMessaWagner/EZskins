<script>
    import { Link } from "svelte-navigator";
</script>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <Link to="/" class="nav-link">Home</Link>
                </li>
                <li class="nav-item">
                    <Link to="/contato" class="nav-link">Contato</Link>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    :global(a) {
        text-decoration: none;
    }
</style>
