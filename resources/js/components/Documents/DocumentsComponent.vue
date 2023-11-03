<template>
    <table class="table">
        <thead>
            <th scope="col">Codigo</th>
            <th scope="col">Nombre</th>
            <th scope="col">Contenido</th>
            <th scope="col">Accion</th>
        </thead>
        <tbody>
            <tr v-for="documento in documentos" :key="documento.id">
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
                documentos: []
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
                    .then(response => {
                        if (response.data.success) {
                            this.documentos = this.documentos.filter(item => item.id !== id)
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            }
        }
    }
</script>
