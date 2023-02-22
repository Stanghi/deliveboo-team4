<script>
export default {
    name: "Cart",
};
</script>

<template>
    <div class="container my-5">
        <h1>Riepilogo Carrello</h1>
        <div class="cart-container mt-3">

            <div class="box pt-2">
                <h3 class="Current">Carrello</h3>
                <h5 class="Action">Svuota Carrello</h5>
            </div>

            <div class="box box-items">
                <div class="image-item">
                    <img src="../../img/placeholder.png"/>
                </div>
                <div class="info-items">
                    <h1 class="title">Bistecca</h1>
                    <h3 class="subtitle">250gr</h3>
                </div>
                <div class="counter">
                    <div class="btn">+</div>
                    <div class="count">5</div>
                    <div class="btn">-</div>
                </div>
                <div class="prices">
                    <div class="amount">€ 4</div>
                    <div class="remove">Elimina</div>
                </div>
            </div>

            <div class="box box-items">
                <div class="image-item">
                    <img src="../../img/placeholder.png"/>
                </div>
                <div class="info-items">
                    <h1 class="title">Bistecca</h1>
                    <h3 class="subtitle">250gr</h3>
                </div>
                <div class="counter">
                    <div class="btn">+</div>
                    <div class="count">5</div>
                    <div class="btn">-</div>
                </div>
                <div class="prices">
                    <div class="amount">€ 4</div>
                    <div class="remove">Elimina</div>
                </div>
            </div>

            <div class="box box-items">
                <div class="image-item">
                    <img src="../../img/placeholder.png"/>
                </div>
                <div class="info-items">
                    <h1 class="title">Bistecca</h1>
                    <h3 class="subtitle">250gr</h3>
                </div>
                <div class="counter">
                    <div class="btn">+</div>
                    <div class="count">5</div>
                    <div class="btn">-</div>
                </div>
                <div class="prices">
                    <div class="amount">€ 4</div>
                    <div class="remove">Elimina</div>
                </div>
            </div>

            <div class="checkout mt-2">
                <div class="total my-2">
                    <div>
                        <div class="Subtotal">Sub-Total</div>
                        <div class="items">3 Prodotti</div>
                    </div>

                    <div class="total-amount">€ 20</div>
                    <button class="button">Checkout</button>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped lang="scss">
@use "../../scss/_variables.scss" as *;

    .cart-container{
        width: 100%;
        height: 85%;
        background-color: #ffffff;
        border-radius: 20px;
        box-shadow: 0px 25px 40px #1687d933;
        .box{
            margin: auto;
            width: 90%;
            height: 15%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .Current{
            font-size: 20px;
            font-weight: 700;
            color: #2F3841;
        }
        .Action{
            font-size: 14px;
            font-weight: 600;
            color: #E44C4C;
            cursor: pointer;
            border-bottom: 1px solid #E44C4C;
        }
        .box-items{
            .image-item{
                width: 15%;
                img{
                    width: 100%;
                }
            }
            .info-items{
                width: 20%;
                .title{
                    padding-top: 5px;
                    line-height: 10px;
                    font-size: 20px;
                    font-weight: 800;
                    color: #202020;
                }
                    .subtitle{
                    line-height: 10px;
                    font-size: 10px;
                    font-weight: 600;
                    color: #909090;
                }
            }
            .counter{
                width: 15%;
                display: flex;
                justify-content: space-between;
                align-items: center;
                .btn{
                    width: 30px;
                    height: 30px;
                    border-radius: 50%;
                    background-color: #d9d9d9;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    font-size: 15px;
                    font-weight: 900;
                    color: #202020;
                    cursor: pointer;
                }
                    .count{
                    font-size: 15px;
                    font-weight: 900;
                    color: #202020;
                }
            }
            .prices{
                height: 100%;
                text-align: right;
                .amount{
                    padding-top: 20px;
                    font-size: 26px;
                    font-weight: 800;
                    color: #202020;
                }
                .remove{
                    padding-top: 5px;
                    font-size: 14px;
                    font-weight: 600;
                    color: #E44C4C;
                    cursor: pointer;
                }
            }
        }
        .checkout{
            border-top: 2px solid #909090;
            margin: auto;
            width: 90%;
            display: flex;
            justify-content: end;
            .total{
                text-align: end;
                .Subtotal{
                    font-size: 18px;
                    font-weight: 700;
                    color: #202020;
                }
                .items{
                    font-size: 16px;
                    font-weight: 500;
                    color: #909090;
                    line-height: 10px;
                }
                .total-amount{
                    font-size: 26px;
                    font-weight: 900;
                    color: #202020;
                }

                .button{
                    margin-top: 5px;
                    width: 100%;
                    height: 40px;
                    border: none;
                    background: $orange;
                    border-radius: 20px;
                    cursor: pointer;
                    font-size: 16px;
                    font-weight: 600;
                    color: $dark-gray;
                }
            }
        }
    }
</style>
