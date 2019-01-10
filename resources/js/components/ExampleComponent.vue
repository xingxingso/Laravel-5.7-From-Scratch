<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header" v-text="name"></div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {name: 'Larcasts'};
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style type="text/css" scoped>
    .card { background: pink; }
</style>
