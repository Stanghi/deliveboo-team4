<script>
export default {
    name: "Footer",
};
</script>

<template>
    <footer>
        <div class="cont">
            <nav class="blocs">

                <!-- Primo Blocco -->
                <div class="bloc">
                    <div class="light-bloc">
                        <div class="frame">
                            <h3 >Scopri DeliveBoo</h3>
                            <ul>
                                <li>
                                    <p>
                                        <a href="#" class="">Investitori</a>
                                    </p>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <p>
                                        <a href="#" class="">Chi siamo</a>
                                    </p>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <p>
                                        <a href="#" class="">Ristoranti</a>
                                    </p>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <p>
                                        <a href="#" class="">Altro</a>
                                    </p>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <p>
                                        <a href="#" class="">Pressroom</a>
                                    </p>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <p>
                                        <a href="#" class="">Programmazione</a>
                                    </p>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <p>
                                        <a href="#" class="">Design</a>
                                    </p>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <p>
                                        <a href="#" class="">Lavora con noi</a>
                                    </p>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <p>
                                        <a href="#" class="">Diventa nostro partner</a>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Primo Blocco -->

                <!-- Secondo Blocco -->
                <div class="bloc">
                    <div class="light-bloc">
                        <div class="frame">
                            <h3>Note Legali</h3>
                            <ul>
                                <li>
                                    <p>
                                        <a href="#" class="">Termini & Condizioni</a>
                                    </p>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <p>
                                        <a href="#" class="">Chi siamo</a>
                                    </p>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <p>
                                        <a href="#" class="">Ristoranti</a>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Secondo Blocco -->

                <!-- Terzo Blocco -->
                <div class="bloc">
                    <div class="light-bloc">
                        <div class="frame">
                            <h3>Aiuto</h3>
                            <ul>
                                <li>
                                    <p>
                                        <a href="#" class="">Contatti</a>
                                    </p>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <p>
                                        <a href="#" class="">FAQ</a>
                                    </p>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <p>
                                        <a href="#" class="">Tipi di cucina</a>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Terzo Blocco -->

                <!-- Quarto Blocco -->
                <div class="bloc"></div>
                <!-- /Quarto Blocco -->
            </nav>
            <nav></nav>
        </div>
    </footer>
</template>

<style lang="scss" scoped>
@use "../../scss/_variables.scss" as *;

footer{
    background-color: $dark-gray;
    color: $white;
    .cont{
        max-width: 1120px;
        margin: 0 auto;
        padding: 0 16px;
        overflow: hidden;
        .blocs{
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            margin: 0;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            .bloc{
                min-width: auto;
                flex: 1;
                background: $dark-gray;
                border-radius: 3px;
                .light-bloc{
                    min-width: 272px;
                    .frame{
                    padding: 24px;
                }
                }
            }
        }
    }
}

h3{
    font-size: 19px;
    line-height: 24px;
    font-weight: 700px;
    padding-bottom: 8px;
}

a{
    color: $white;
}

a:hover{
    color: $orange;
}

ul{
    padding-left: 0;
}
</style>