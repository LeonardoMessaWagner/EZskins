<script>
    import Carousel from "svelte-carousel";
    let images = [
        "imgs/carousel/img1.jpg",
        "imgs/carousel/img2.jpg",
        "imgs/carousel/img3.jpg",
    ];
   
</script>

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <br />
            <h1>Bem Vindo ao EZskins </h1>
            
        </div>
    </div>
    <div id="carouzel" class="row">
        <div  class="col-lg-6 col-md-12 col-sm-12">
            
            <Carousel
                autoplay
                autoplayDuration={2000}
                autoplayProgressVisible
                pauseOnFocus
                arrows={false}
                dots={false}
                let:loaded
            >
                {#each images as src, imageIndex (src)}
                    <div class="img-container">
                        {#if loaded.includes(imageIndex)}
                            <img class="img" {src} alt="nature" />
                        {/if}
                    </div>
                {/each}
            </Carousel>
        </div>
    </div>
</div>

<style type="text/css">
    .img {
        width: 100%;
    }
    h1 {
        color: white;
        border: none;
        text-align: center;
    }
    #carouzel{
        justify-content: center;
    }
    
</style>
