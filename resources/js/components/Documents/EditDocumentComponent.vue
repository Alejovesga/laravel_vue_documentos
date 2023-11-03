<template>
    <h4>Editar documento</h4>
    <form @submit.prevent="editDocument">
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" class="form-control" v-model="documento.DOC_NOMBRE">
        </div>
        <div class="form-group">
            <label>Contenido</label>
            <textarea  class="form-control" v-model="documento.DOC_CONTENIDO" rows="20"></textarea>
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

        <button type="submit" class="btn btn-primary">Editar documento</button>
    </form>
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

      this.$apiService.getDocumentoById( this.$route.params.id)
        .then(response => {
          this.documento = response.data;
        }).catch(function (error) {
          console.error(error);
        })
    },
    methods: {
        editDocument() {
            this.$apiService.putDocumento(this.$route.params.id, this.documento)
                .then(() => {
                  this.$router.push({ name: 'documents' })
                })
                .catch(function (error) {
                    console.error(error);
                });
            }
        },
    }
</script>
