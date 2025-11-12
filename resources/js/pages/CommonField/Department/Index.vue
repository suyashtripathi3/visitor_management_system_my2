<template>
<div>

    <!-- ✅ Title -->
    <div class="page-title">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li><h1>Departments</h1></li>
                <li class="breadcrumb-item"><a :href="AppRoutes.dashboard">Home</a></li>
                <li class="breadcrumb-item active">Departments</li>
            </ol>
        </nav>
    </div>

    <div class="card">

        <!-- ✅ Filters -->
        <div class="card-header d-flex gap-2">

            <input v-model="search" @input="applyFilter" class="form-control form-control-sm"
                placeholder="Search department..." style="width:200px">

            <button class="btn btn-primary btn-sm ms-auto" @click="createDepartment">
                + Add Department
            </button>
        </div>

        <!-- ✅ Table -->
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Department Name</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="(d, index) in props.departments.data" :key="d.id">
                        <td>{{ props.departments.from + index }}</td>
                        <td>{{ d.name }}</td>

                        <td class="text-end">
                            <button class="btn btn-sm btn-primary me-1" @click="editDepartment(d.id)">Edit</button>
                            <button class="btn btn-sm btn-danger" @click="deleteDepartment(d.id)">Delete</button>
                        </td>
                    </tr>

                    <tr v-if="!props.departments.data.length">
                        <td colspan="3" class="text-center p-2">No departments found</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- ✅ Pagination -->
        <div class="card-footer d-flex justify-content-between align-items-center">

            <div>
              Showing {{ props.departments.from }}–{{ props.departments.to }} of {{ props.departments.total }}
            </div>

            <ul class="pagination mb-0">
                <li class="page-item"
                    v-for="page in props.departments.links"
                    :key="page.label"
                    :class="{ active: page.active, disabled: !page.url }">
                    <button class="page-link" @click="goPage(page.url)" v-html="page.label"></button>
                </li>
            </ul>

        </div>

    </div>

    <!-- ✅ FORM MODAL -->
    <DepartmentForm
        v-if="showForm"
        :department-id="editingId"
        @close="closeForm"
    />

</div>
</template>

<script setup>
import { ref } from "vue"
import { router } from "@inertiajs/vue3"
import AppRoutes from "@/routes"
import AdminLayout from '@/Layouts/AdminLayout.vue'
import DepartmentForm from "./Form.vue"

defineOptions({ layout: AdminLayout })

const props = defineProps({
  departments: Object,
  filters: Object
})

const search = ref(props.filters.search ?? "")

const applyFilter = () => {
  router.get(AppRoutes.departments.index, {
    search: search.value
  }, { preserveState: true, replace: true })
}

const goPage = (url) => {
  if (!url) return;
  router.get(url, {}, { preserveState: true })
}

const showForm = ref(false)
const editingId = ref(null)

const createDepartment = () => { editingId.value=null; showForm.value=true }
const editDepartment = (id) => { editingId.value=id; showForm.value=true }

const deleteDepartment = (id) => {
  if (confirm("Delete department?")) {
    router.delete(AppRoutes.common.departments.delete(id))
  }
}

const closeForm = () => { showForm.value=false; editingId.value=null }
</script>
