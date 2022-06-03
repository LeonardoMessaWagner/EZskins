<script>
    import { Link } from "svelte-navigator";
    import Dropdown from "sv-bootstrap-dropdown";
    let dropdownTrigger;
    window.process = {
        env: "production",
    };
</script>

<div class="topnav">
    <Link class="active" to="/">Home</Link>
    <Link to="/contato">Contato</Link>
    <Link to="/cadastro">Cadastre-se</Link>
    <div class="search-container">
        <form action="/action_page.php">
            <input type="text" placeholder="Buscar Skins..." name="search" />
            <button type="submit">Buscar</button>
        </form>
    </div>
</div>


<style>
    .topnav {
        overflow: hidden;
        background-color: #29065b;
        text-align: center;
        
    }

    
    .topnav > :global(a) {
        float: left;
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }

    .topnav > :global(a):hover {
        background-color: rgba(0, 0, 0, 0.15);;
        
    }

    

    .topnav .search-container {
        float: right;
    }

    .topnav input[type="text"] {
        padding: 6px;
        margin-top: 8px;
        font-size: 17px;
        border: none;
    }

    .topnav .search-container button {
        float: right;
        padding: 6px 10px;
        margin-top: 8px;
        margin-right: 16px;
        background: #ddd;
        font-size: 17px;
        border: none;
        cursor: pointer;
    }

    .topnav .search-container button:hover {
        background: #ccc;
    }

    @media screen and (max-width: 600px) {
        .topnav .search-container {
            float: none;
        }
        
        .topnav input[type="text"],
        .topnav .search-container button {
            float: none;
            display: block;
            text-align: left;
            width: 100%;
            margin: 0;
            padding: 14px;
        }
        .topnav input[type="text"] {
            border: 1px solid #ccc;
        }
    }
</style>
