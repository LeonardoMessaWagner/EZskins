<script>
    import { Link } from "svelte-navigator";
    import Dropdown from "sv-bootstrap-dropdown";
    let dropdownTrigger;
    window.process = {
        env: "production",
    };
</script>

<nav class="nav">
    <ul>
        <li>
            <div class="link-wrapper">
                <Link to="/" class="link">Home</Link>
            </div>
        </li>
        <li>
            <div class="link-wrapper">
                <Dropdown triggerElement={dropdownTrigger}>
                    <a
                        type="button"
                        class="link"
                        id="botao"
                        bind:this={dropdownTrigger}
                    >
                        Skins ▾
                    </a>
                    <div slot="DropdownMenu">
                        <button class="dropdown-item" type="button"
                            >Facas</button
                        >
                        <button class="dropdown-item" type="button"
                            >Rifles</button
                        >
                        <button class="dropdown-item" type="button"
                            >Pistolas</button
                        >
                    </div>
                </Dropdown>
            </div>
        </li>
        <li>
            <div class="link-wrapper">
                <Link to="/contato" class="link">Contato</Link>
            </div>
        </li>
    </ul>
</nav>

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

    nav ul li ul li {
        min-width: 190px;
    }

    #botao {
        display: block;
        color: rgba(255, 255, 255, 0.9);
        text-decoration: none;
        padding: 1rem 2rem;
        border-top: 2px solid transparent;
        border-bottom: 2px solid transparent;
        transition: all 0.3s ease-in-out;
    }
    #botao:hover,
    #botao:focus {
        background: rgba(0, 0, 0, 0.15);
    }
    #botao:focus {
        color: white;
    }

    .link-wrapper > :global(a) {
        display: block;
        color: rgba(255, 255, 255, 0.9);
        text-decoration: none;
        padding: 1rem 2rem;
        border-top: 2px solid transparent;
        border-bottom: 2px solid transparent;
        transition: all 0.3s ease-in-out;
    }
    .link-wrapper > :global(a):hover,
    .link-wrapper > :global(a):focus {
        background: rgba(0, 0, 0, 0.15);
    }

    .link-wrapper > :global(a):focus {
        color: white;
    }
</style>
