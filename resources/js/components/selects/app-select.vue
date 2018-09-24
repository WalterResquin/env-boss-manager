<template>
    <select v-model="sel" class="form-control" id="projeto" name="titulo" type="text">
        <option v-for="option in options" v-bind:value="option.id">
            {{ option.titulo}}
        </option>
    </select>
</template>

<script>
    export default {
        props: [ 'list', 'value'],
        data(){
            return (
                {
                    sel: '',
                    options: JSON.parse(this.list)
                }
            )
        },

        mounted() {
            console.log(this.value);
            this.options.unshift({"id":"","titulo":"Selecione"});

            if(this.value !== null && this.value !== undefined)
            {
                console.log(this.value);
                this.sel = this.value;
            }
        },
    }
</script>

<style scoped>

</style>