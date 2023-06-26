<template>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.aaaa
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import HelloWorld from './HelloWorld.vue';

    export default {
        name:'ExampleComponents',
        components:{ HelloWorld },
        mounted() {
            console.log('Component')
        }
    }
</script>
