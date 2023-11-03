import axios from 'axios'

const url = 'http://127.0.0.1:8000/api'

export default {
    getTipos() {
        return axios.get(`${url}/tipos`)
    },
    getProcesos(){
        return axios.get(`${url}/procesos`)
    },
    getDocumentos() {
        return axios.get(`${url}/documentos`)
    },
    getDocumentoById(id) {
        return axios.get(`${url}/documentos/${id}`)
    },
    deleteDocumento(id) {
        return axios.delete(`${url}/documentos/${id}`)
    },
    putDocumento(id, documento) {
        return axios.put(`${url}/documentos/${id}`, documento)
    },
    postDocumento(documento) {
        return axios.post(`${url}/documentos`, documento)
    }
}
