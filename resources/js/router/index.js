import { createWebHistory, createRouter } from "vue-router";

import DocumentsComponent from '../components/Documents/DocumentsComponent.vue'
import NewDocumentComponent from '../components/Documents/NewDocumentComponent.vue'
import EditDocumentComponent from '../components/Documents/EditDocumentComponent.vue'

export const routes = [
    {
        name: 'documents',
        path: '/documents',
        component: DocumentsComponent
    },
    {
        name: 'newdocument',
        path: '/add',
        component: NewDocumentComponent
    },
    {
        name: 'editdocument',
        path: '/edit/:id',
        component: EditDocumentComponent
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes:routes
})

export default router;
