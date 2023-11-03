<template>
    <div>
        <h4>Nuevo documento</h4>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form @submit.prevent="addDocument">
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control" v-model="documento.DOC_NOMBRE">
                </div>
                <div class="form-group">
                    <label>Contenido</label>
                    <textarea type="text" class="form-control" v-model="documento.DOC_CONTENIDO"></textarea>
                </div>
                <div class="form-group">
                    <label>Tipo</label>
                    <select class="form-control" v-model="documento.DOC_ID_TIPO">
                        <option v-for="tipo in tipo" :key="tipo.id" :value="tipo.id">{{ tipo.TIP_NOMBRE }}</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Proceso</label>
                    <select class="form-control" v-model="documento.DOC_ID_PROCESO">
                        <option v-for="proceso in proceso" :key="proceso.id" :value="proceso.id">{{ proceso.PRO_NOMBRE }}</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Añadir documento</button>

            </form>
        </div>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                documento: {},
                tipo: [],
                proceso: [],
            }
        },
        mounted() {
            this.$apiService.getTipos()
                .then(response => {
                    this.tipo = response.data;
                }).catch(function (error) {
                    console.error(error);
                })

            this.$apiService.getProcesos()
                .then(response => {
                    this.proceso = response.data;
                }).catch(function (error) {
                    console.error(error);
                })
        },
            methods: {
                addDocument() {
                    this.$apiService.postDocumento(this.documento)
                        .then(response => {
                            this.documento = response.data;
                            this.$router.push({ name: 'documents' })
                    }).catch(function (error) {
                        console.error(error);
                    })
            }
        }
    }
</script>
