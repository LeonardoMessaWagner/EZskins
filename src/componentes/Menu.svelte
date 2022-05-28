<script>
    import { Link } from "svelte-navigator";
    
    
</script>

<nav class="nav">
    <ul>
        <li><Link to="/" class="nav-link">Home</Link></li>
        <li><a href="s">Facas</a></li>
        <li  class="drop">
            <a href="s">Skins</a>
            <ul   class="dropdown">
                <li><a href="s">Facas</a></li>
                <li><a href="s">Rifles</a></li>
                <li><a href="s">Pistolas</a></li>
            </ul>
        </li>
    </ul>
</nav>

<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    
                </li>
                <li class="nav-item">
                    <Link to="/contato" class="nav-link">Contato</Link>
                </li>
            </ul>
        </div>
    </div>
</nav> -->
<style>
    @import url(https://fonts.googleapis.com/css?family=Montserrat:300&subset=latin-ext);

    nav {
        margin: 0 auto;
        background: #29065b;
        box-shadow: 0 3px 15px rgba(0, 0, 0, 0.15);
        justify-content: center;
    }

    nav::after {
        display: block;
        content: "";
        clear: both;
    }

    nav ul {
        padding: 0;
        margin: 0;
        list-style: none;
    }

    nav ul li {
        float: left;
        position: relative;
    }

    nav ul li a {
        display: block;
        color: rgba(255, 255, 255, 0.9);
        text-decoration: none;
        padding: 1rem 2rem;
        border-top: 2px solid transparent;
        border-bottom: 2px solid transparent;
        transition: all 0.3s ease-in-out;
    }

    nav ul li a:hover,
    nav ul li a:focus {
        background: rgba(0, 0, 0, 0.15);
    }

    nav ul li a:focus {
        color: white;
    }

    nav ul li a:not(:only-child)::after {
        padding-left: 4px;
        content: " ▾";
    }

    nav ul li ul li {
        min-width: 190px;
    }

    nav ul li ul li a {
        background: transparent;
        color: #555;
        border-bottom: 1px solid #dde0e7;
    }

    nav ul li ul li a:hover,
    nav ul li ul li a:focus {
        background: #eee;
        color: #111;
    }

    .dropdown {
        display: none;
        position: absolute;
        background: #fff;
        box-shadow: 0 4px 10px rgba(10, 20, 30, 0.4);
    }
</style>
