<script>
    import Image from "./componentes/Image.svelte";
</script>

<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
/>
<br />
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3">
            <div id="produto">
                <Image src="http://localhost/back/imgs/ak_imperatriz.png" />
                <br />
                <button>
                    <i
                        id="cart"
                        class="fa fa-shopping-cart"
                        style="font-size:24px"
                    /> Comprar
                </button>
                <br />
                <br />
            </div>
            <br />
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
            <div id="produto">
                <Image
                    src="http://localhost/back/imgs/m4a1_s_fogo_de_chantico.png"
                />
                <br />
                <button>
                    <i
                        id="cart"
                        class="fa fa-shopping-cart"
                        style="font-size:24px"
                    /> Comprar
                </button>
                <br />
                <br />
            </div>
            <br />
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
            <div id="produto">
                <Image src="http://localhost/back/imgs/ak_imperatriz.png" />
                <br />
                <button>
                    <i
                        id="cart"
                        class="fa fa-shopping-cart"
                        style="font-size:24px"
                    /> Comprar
                </button>
                <br />
                <br />
            </div>
            <br />
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
            <div id="produto">
                <Image src="http://localhost/back/imgs/ak_imperatriz.png" />
                <br />
                <button>
                    <i
                        id="cart"
                        class="fa fa-shopping-cart"
                        style="font-size:24px"
                    /> Comprar
                </button>
                <br />
                <br />
            </div>
            <br />
        </div>
    </div>
</div>

<style type="text/css">
    div {
        color: white;
    }
    #produto {
        background-color: #3C3349;
        text-align: center;
        border-radius: 10px;
    }

    #produto > :global(img) {
        width: 150px;
    }

    #produto button {
        background-color: #0c011c;
        color: white;
        border-radius: 10px;
        border: none;
        font-size: 1em;
    }
    #produto button:hover {
        background-color: #29065b;
    }
</style>
