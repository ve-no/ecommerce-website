<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Product Page</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="stylesheet" href="style.css"> -->
        <link rel="shortcut icon" href="images/favicon-32x32.png" type="image/x-icon">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Kumbh+Sans&display=swap');

html {
    max-width: 400px;
  margin: auto;
}
body {
    min-width: 350px;
    max-width: 400px;
    height: 100vh;
    font-family: 'Kumbh Sans', sans-serif;
    margin: 0 auto;
    z-index: 1;
}
section {
    position: fixed; /*Sticky */
    top: 0;
    z-index: 5;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    min-width: 380px;
    max-width: 380px;
    background-color: #ffffff;
    padding: 10px;
    height: 50px;
}
.logo {
    position: relative;
    left: -1em;
}
.avatar {
    position: relative;
    width: 30px;
    height: 30px;
}
.cart {
    position: relative;
    right:-4em;
}
.badge {
    position: relative;
    top: -1em;
    right: -3em;
    display: inline-block; 
    opacity: 0; /*Set to show when cart has content JS*/
    min-width: 7px;
    padding: 3px 7px;
    font-size: 8px;
    font-weight: 700;
    line-height: 1;
    color: #ffffff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 10px;
    background-color: hsl(26, 100%, 55%);
}
nav ul {
    margin-top: 3em;
}
nav li {
    margin-top: 1.5em;
    list-style: none;
    margin-left: 0;
}
#closeNav {
    margin-left: 1em;
}
.overcast {
    opacity: 0;
    position: fixed;
    background-color: rgba(0, 0, 0, 0.4);
    width: 0px;
    height: 0vh;
    z-index: 6;
}
.overcast.show {
    opacity: 1;
    position: fixed;
    top: 0;
    width: 400px;
    height: 100vh;
}
.nav-box {
    /* display: none; Transitions dont work with display attribute. Set opacity, height and width to Zero instead*/
    transform: translateX(-300px);
    transition: transform 1s ease-in;
    background-color: #ffffff;
    width: 0;
    height: 0;
    opacity: 0;
    z-index: 7;
}
.nav-box.show {
    position: fixed;
    top: 0;
    /* display: block; */
    justify-self: flex-start;
    height: 100%;
    width: 50%;
    background-color: #ffffff;
    font-weight: 900;
    padding: 1em;
    transform: translateX(-10px);
    transition: transform 1s ease-out;
    opacity: 1;
}
.nav-box ul {
    margin-top: 0;
    padding: 1em;
    font-size: 16px;
}
.container {
    margin-top: 3em;
}
.product {
    position: relative;
    width: 100%;
    z-index: 1;
}
.reel {
    display: none;
}
.main {
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.moveIcon {
    position: relative;
    top: -220px;
    display: flex;
    justify-content: space-between;
    width: 100%;
    z-index: 2;
    margin-bottom: -50px;
}
.moveIcon > img {
    padding: 0.5em;
    margin: 1em;
    width: 15px;
    height: 15px;
    border-radius: 50%;
    background-color: #ffffff;
}
.info {
    padding-left: 1em;
    padding-right: 1em;
}
.info span{
    color: hsl(26, 100%, 55%);
    font-size: 12px;
    font-weight: bolder;
}
.info p {
    color: hsl(219, 9%, 45%);
    margin-top: 0.5em;
}
.priceInfo {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    padding: 1em;
    padding-top: 0;
    padding-bottom: 0;
    font-weight: bolder;
}
.priceInfo .currentPrice {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content:space-between ;
}
.priceInfo .currentPrice p {
    background-color: hsl(25, 100%, 94%);
    color: hsl(26, 100%, 55%);
    padding: 0.2em;
    border-radius: 5px;
    margin-left: 1.5em;
}
.priceInfo p {
    color: hsl(220, 14%, 75%);
    text-decoration: line-through;
}
.btnArea {
    display: flex;
    flex-direction: column;
    padding-left: 1em;
    padding-right: 1em;
}
.qty {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    color: hsl(26, 100%, 55%);
    width: 100%;
    background-color: hsla(240, 1%, 84%, 0.63);
    border-radius: 10px;
    margin-bottom: 1em;
    font-weight: bolder;
}
.qty p {
    margin: 1em;
}
.qty #num {
    color: black;
}
#add, #subtract, #num {
    cursor: pointer;
    font-size: 20px;
}
button {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: hsl(26, 100%, 55%);
    color: #ffffff;
    font-weight: bold;
    font-size: 14px;
    padding: 1.5em;
    border-radius: 5px;
    border: none;
    margin-bottom: 6em;
}
button img {
    margin-right: 1em;
    filter: invert(1) brightness(100); /*makes the svg white*/
}
.cart-modal {
    display:none;
    position: absolute;
    z-index: 2;
    top: 60px;
    /* left: 0.5em; */
    width: 355px;
    height: 280px;
    overflow: auto; /*Enable scrolling when necessary*/
    background-color: #ffffff;
    border-radius: 5px;
    margin-left: 10px;
    margin-right: 10px;
    animation: fadeIn 0.5s ease-in;
    box-shadow: 2px 2px #aaa;
}
@keyframes fadeIn {
    0% {opacity:0;}
    100% {opacity:1;}
  }
.modal-content {
    background-color: #fefefe;
    /* margin: 0.5em auto;  centred with margin */
    width: 100%;
}
.close-modal {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}
.close-modal:hover, .close-modal:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
.cart-header {
    display: flex;
    justify-content: space-between;
    padding: 2em;
    padding-top: 0.5em;
    padding-bottom: 0.5em;
    border-bottom: 1px solid #aaa;
    font-weight: 700;
}
.cart-body {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 60%;
    font-weight: 700;
    margin-top: 2.5em;
    padding: 0;
}
.cart-item {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
    margin: 1em;
    width: 90%;
    font-weight: 400;
}
.cart-item-info {
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.cart-item-info p {
    margin-top: 0;
    margin-bottom: 0;
    margin-left: 0;
}
.cart-price {
    font-weight: 700;
}
.thumbnail {
    border-radius: 5px;
}
.cart-body button {
    display: flex;
    padding: 1.5em;
    margin-top: 2em;
    width: 80%;
}
#lightbox {
    display: none;
}

/* MEDIA QUERY */
@media (min-width:450px) {
    html, body {
        min-width: 450px;
        max-width: 1440px;
    }
    body {
        padding: 8em;
        padding-right: 8em;
        padding-top: 2em;
    }
    section {
        position: relative; /*Sticky */
        top: 0;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        min-width: 450px;
        max-width: 1440px;
        width: 100%;
        padding: 10px;
        height: auto;
        margin-bottom: 2em;
        border-bottom: 1px solid rgb(204, 199, 199);
        
    }
    .logo {
        position: relative;
        cursor: pointer;
        /* left: -1em; */
    }
    .avatar {
        position: relative;
        cursor: pointer;
        width: 30px;
        height: 30px;
    }
    .cart {
        position: relative;
        cursor: pointer;
        /* right:-4em; */
    }
    #toggler, #closeNav {
        display: none;
    }
    .product {
        width: 450px;
        height: 400px;
        border-radius: 10px;
        margin-right: 4em;
    }
    .reel {
        display: flex;
        max-width: 450px;
        justify-content: space-between;
        margin-top: 1em;
    }
    .reel-image {
        border-radius: 15px;
        height: 100px;
        width: 100px;
    }
    .reel-image:hover {
        filter: opacity(0.35);
        border: 3px solid hsl(26, 100%, 55%);
        transform: scale(1.1);
        transition: transform 2s ease;
    }
    .reel-image#active {
        filter: opacity(0.5);
        border: 3px solid hsl(26, 100%, 55%);
    }
    .moveIcon {
        display: none;
    }
    .overcast {
        opacity: 1;
        width: 60%;
        height: 100%;
        background-color: #ffffff;
        position: relative;
        z-index: 0;
    }
    .nav-box {
        background-color: #ffffff;
        position: relative;
        width: 100%;
        height: 100%;
        opacity: 1;
        z-index: 0;
        transform: translateX(0px);
        transition: transform 1s ease-in;
        display: flex;
        justify-content: space-between;
    }
    .nav-box ul li {
        display: inline;
        margin-right: 4em;
        padding-bottom: 1.5em;
        cursor: pointer;
    }
    ul {
        margin: auto;
    }
    li:hover {
        font-weight: 700;
        border-bottom: 4px solid hsl(26, 100%, 55%); /*references the padding bottom on li*/
    }
    .container {
        margin-top: 0em;
        /* background-color: darkolivegreen; */
        display: flex;
        justify-content: flex-start;
        padding: 4em;
        width: 100%;
    }
    .cart-modal {
        display:none;
        position: fixed;
        z-index: 10;
        top: 100px;
        right:200px;
        width: 355px;
        height: 280px;
        overflow: auto; /*Enable scrolling when necessary*/
        background-color: #5e1111;
        border-radius: 5px;
        margin-left: 10px;
        margin-right: 10px;
        animation: fadeIn 0.5s ease-in;
    }
    .sub-container {
        padding: 2em;
        width: 35%;
    }
    .priceInfo {
        flex-direction: column;
        align-items: flex-start;
    }
    .priceInfo p {
        margin-top: 0;
    }
    .currentPrice {
        line-height: 2px;
    }
    .currentPrice p {
        font-size: 20px;
        margin-bottom: 0;
    }
    .btnArea {
        flex-direction: row;
        justify-content: space-between;
    }
    .qty {
        width: 45%;
        margin-bottom: 0;
        box-shadow: 0px 2px 4px 0px #aaa;
    }
    .btnArea button {
        width: 50%;
        margin-bottom: 0;
        box-shadow: 0px 2px 4px 0px hsl(26, 100%, 55%);
    }
    .badge {
        right: -0.5em;
    }
    button, #delete-btn {
        cursor: pointer;
    }
    .lightbox {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 6;
        display: none;
        justify-content: center;
        align-items: center;
    } 
    .lightbox:target {
        display: flex;
    }
    .lightbox-content {
        transform: scale(1.2);
    }   
    .closeBox {
        position: relative;
        top: -2em;
        left: -3.5em;
        float: right;
        width: 20px;
        height: 20px;
        cursor: pointer;
    }
    .closeBox:hover {
        border: 1px solid hsl(26, 100%, 55%);
    }
    .lightbox .moveIcon {
        display: flex;
        width: 100px;
        position: relative;
        top: -350px;
        left: -27px;
        justify-content: space-between;
        width: 95%;
        z-index: 2;
        margin-bottom: -50px;
    }
    .lightbox .moveIcon img:hover {
        cursor: pointer;
        filter: brightness(0) saturate(100%);
        filter: saturate(2815%) contrast(101%) brightness(105%) invert(56%) sepia(74%) hue-rotate(348deg);
    }
}
        </style>
    </head>
    <body>
        <section class="section">
            <img id="toggler" src="images/icon-menu.svg" alt="">
            <div class="logo">
                <a href="index.html">.<img src="images/logo.svg" alt=""></a>
            </div>
            <nav class="overcast">
                <div class="nav-box">
                    <img src="images/icon-close.svg" id="closeNav" alt="">
                    <ul>
                        <li>Collections</li>
                        <li>Men</li>
                        <li>Women</li>
                        <li>About</li>
                        <li>Contact</li>
                    </ul>
                </div>
            </nav>
            <img class="cart" src="images/icon-cart.svg" alt=""><span class="badge">4</span>
            <img class="avatar" src="images/image-avatar.png" alt="">
        </section>
        <div class="container">
            <div role="main" class="main">
                <img class="product" src="images/image-product-1.jpg" alt="">
                <!-- <div class="reel">
                    <img class="reel-image" id="active" src="images/image-product-1-thumbnail.jpg" alt="">
                    <img class="reel-image" src="images/image-product-2-thumbnail.jpg" alt="">
                    <img class="reel-image" src="images/image-product-3-thumbnail.jpg" alt="">
                    <img class="reel-image" src="images/image-product-4-thumbnail.jpg" alt="">
                </div> -->
                <div class="moveIcon">
                    <img src="images/icon-previous.svg" alt="">
                    <img src="images/icon-next.svg" alt="">
                </div>
            </div>
            <div class="sub-container">
                <div class="info">
                    <span>SNEAKER COMPANY</span>
                    <h1>Fall Limited Edition Sneakers</h1>
                    <p>These low profile sneakers are your perfect casual wear companion. Featuring a durable rubber outer sole, they'll withstand everything the weather can offer. </p>
                </div>
                <div class="priceInfo">
                    <div class="currentPrice">
                        <h1>$<span id="price">125.00</span></h1>
                        <p>50%</p>
                    </div>
                    <p>$250.00</p>
                </div>
                <div class="btnArea">
                    
                    <button><img src="images/icon-cart.svg" alt=""> Add to Cart</button>
                </div>
            </div>
            <div class="cart-modal" id="modal">
                <div class="modal-content">
                    <div class="cart-header">
                        <p>Cart</p>  
                        <span class="close-modal">&times;</span>
                    </div>
                    <div class="cart-body">Your cart is empty.</div>
                </div>
            </div>
        </div>
        <!-- LIGHTBOX -->
        <!-- <div id="lightbox" class="lightbox">
            <div class="lightbox-content">
                <img src="images/icon-close.svg" alt="" class="closeBox">
                <img class="product" id="lightboxDisplay" src="images/image-product-1.jpg" alt="">
                <div class="reel">
                    <img class="box reel-image" src="images/image-product-1-thumbnail.jpg" alt="">
                    <img class="box reel-image" src="images/image-product-2-thumbnail.jpg" alt="">
                    <img class="box reel-image" src="images/image-product-3-thumbnail.jpg" alt="">
                    <img class="box reel-image" src="images/image-product-4-thumbnail.jpg" alt="">
                </div>
                <div class="moveIcon">
                    <img id="prev" src="images/icon-previous.svg" alt="">
                    <img id="next" src="images/icon-next.svg" alt="">
                </div>
            </div>
        </div> -->
        <!-- <script src="script.js" async defer></script> -->
    </body>
</html>