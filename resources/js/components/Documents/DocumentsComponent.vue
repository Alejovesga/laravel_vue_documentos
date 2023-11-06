<template>
    <input type="text" v-model="search" placeholder="buscar...">
    <table class="table">
        <thead>
            <th scope="col">Codigo</th>
            <th scope="col">Nombre</th>
            <th scope="col">Contenido</th>
            <th scope="col">Accion</th>
        </thead>
        <tbody>
            <tr v-for="documento in filteredDocumentos" :key="documento.id">
                <td>{{ documento.DOC_CODIGO }}</td>
                <td>{{ documento.DOC_NOMBRE }}</td>
                <td>{{ documento.DOC_CONTENIDO }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'editdocument', params: { id: documento.id }}" class="btn btn-primary">Editar
                        </router-link>
                        <button class="btn btn-danger" @click="deleteDocument(documento.id)">Borrar</button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    data() {
        return {
            search: '',
            documentos: []
        }
    },
    computed: {
       filteredDocumentos() {
            if (this.search) {
                return this.documentos.filter(documento =>
                    documento.DOC_NOMBRE.toLowerCase().includes(this.search.toLowerCase()) ||
                    documento.DOC_CODIGO.toLowerCase().includes(this.search.toLowerCase())
                );
            } else {
                return this.documentos;
            }
        }
    },
    mounted() {
        this.$apiService.getDocumentos()
            .then(response => {
                this.documentos = response.data
            })
            .catch(function (error) {
                console.error(error);
            });
    },
    methods: {
        deleteDocument(id) {
            this.$apiService.deleteDocumento(id)
                .then(() => {
                    this.documentos = this.documentos.filter(item => item.id !== id)
                })
                .catch(function (error) {
                    console.error(error);
                });
        }
    },
}
</script>
