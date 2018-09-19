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
            { title: 'Titulo', field: 'titulo' },
            { title: 'Descrição', field: 'descricao', sortable: true },
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
           return axios.get('/projeto/datatable').then( (response) => {
               this.data = response.data;
           });
       }
   },


    // watch: {
    //     query: {
    //         handler (query) {
    //             mockData(query).then(({ rows, total }) => {
    //                 this.data = rows
    //             this.total = total
    //         })
    //         },
    //         deep: true
    //     }
    // }
    }
</script>