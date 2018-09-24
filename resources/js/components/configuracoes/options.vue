<template>
    <div class="btn-group btn-group-sm">
        <button class="btn btn-default" title="Edit" @click="edit">
            <i class="fa fa-pencil"></i>
        </button>
        <button class="btn btn-default" title="Delete"  @click="del" >
            <i class="fa fa-trash"></i>
        </button>
    </div>
</template>

<script>
    export default {
        props: ['row', 'nested'],
        mounted() {
            $(this.$el).find('button[title]').tooltip()
        },

        methods: {
            edit() {
                window.location = `/configuracoes/editar/${this.row.id}`;
            },

            del(){
                var id = this.row.id;
                axios.post('/configuracoes/deletar', {id: id}).then( () => {
                    window.location.reload()
                });
            }
        }
    }
</script>

<style scoped>

</style>