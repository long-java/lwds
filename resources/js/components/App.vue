<template>
    <div class="">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div>
                        <router-view></router-view>
                    </div>

                    

                </div>
            </div>
        </div>

    </div>
</template>

<script>

    export default {
        name: 'App',

        data(){
            return {

            }
        }
    }

</script>

<style>
    .container {
        border: 1px solid #eee;
    }
    .active {
        color: red
    }
    .card{
        border: none !important;
    }
</style>

