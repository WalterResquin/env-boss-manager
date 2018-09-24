<template>
    <div>
        <datatable v-bind="$data">
        </datatable>
    </div>
</template>
<script>
    import options from './options'

    export default {
        options,
        prop:['list'],
        data: () => ({
            columns: [
                { title: 'ID', field: 'id', sortable: true },
                { title: 'Titulo', field: 'titulo', sortable: true},
                { title: 'Descrição', field: 'descricao' },
                { title: 'Projeto', field: "projeto", sortable: true},
                { title: 'Data de Criação', field: 'created_at' },
                { title: 'Operation', tdComp: options, visible: 'true' }
            ],
            data: [],
            total: 0,
            query: {}
        }),
        mounted(){
            this.update();
        },
        methods: {
            update(){
                return axios.get('/configuracoes/datatable').then( (response) => {
                    this.data = JSON.parse(JSON.stringify(response.data));

                    Object.keys(this.data).map((item) => {
                        this.data[item].projeto = this.data[item].projeto.titulo;
                    })
                });
            }
        },
    }
</script>