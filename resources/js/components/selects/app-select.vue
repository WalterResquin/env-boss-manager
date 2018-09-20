<template>
    <select v-model="sel" class="form-control" id="projeto" name="titulo" type="text">
        <!--<option disabled value="">Selecione</option>-->
        <option v-for="option in options" v-bind:value="option.id">
            {{ option.titulo }}
        </option>

    </select>
</template>

<script>
    export default {
        props: [ 'list', 'selected'],
        data(){
            return (
                {
                    sel: '2',
                    options: this.list
                }
            )
        },

        // watch: {
        //     sel:function(val) {
        //         this.$emit('selected', val);
        //     }
        // },

        mounted() {


        },
    }
</script>

<style scoped>

</style>