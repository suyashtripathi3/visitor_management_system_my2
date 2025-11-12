<template>
<div>

    <!-- ✅ Title -->
    <div class="page-title">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li><h1>Floors</h1></li>
                <li class="breadcrumb-item"><a :href="AppRoutes.dashboard">Home</a></li>
                <li class="breadcrumb-item active">Floors</li>
            </ol>
        </nav>
    </div>

    <div class="card">

        <!-- ✅ Filters -->
        <div class="card-header d-flex gap-2">
            <input v-model="search" @input="applyFilter" class="form-control form-control-sm"
                placeholder="Search floor..." style="width:200px">

            <button class="btn btn-primary btn-sm ms-auto" @click="createFloor">
                + Add Floor
            </button>
        </div>

        <!-- ✅ Table -->
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Floor Name</th>
                        <th>Building</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="(f, index) in props.floors.data" :key="f.id">
                        <td>{{ props.floors.from + index }}</td>
                        <td>{{ f.floor_name }}</td>
                        <td>{{ f.building?.name ?? '-' }}</td>

                        <td>
                          <span
                            :class="f.status ? 'badge bg-success' : 'badge bg-danger'"
                            style="cursor:pointer"
                            @click="toggleStatus(f.id)"
                          >
                            {{ f.status ? 'Active' : 'Inactive' }}
                          </span>
                        </td>

                        <td class="text-end">
                            <button class="btn btn-sm btn-primary me-1" @click="editFloor(f.id)">Edit</button>
                            <button class="btn btn-sm btn-danger" @click="deleteFloor(f.id)">Delete</button>
                        </td>
                    </tr>

                    <tr v-if="!props.floors.data.length">
                        <td colspan="5" class="text-center p-2">No floors found</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- ✅ Pagination -->
        <div class="card-footer d-flex justify-content-between align-items-center">
            <div>
              Showing {{ props.floors.from }}–{{ props.floors.to }} of {{ props.floors.total }}
            </div>

            <ul class="pagination mb-0">
                <li class="page-item"
                    v-for="page in props.floors.links"
                    :key="page.label"
                    :class="{ active: page.active, disabled: !page.url }">
                    <button class="page-link" @click="goPage(page.url)" v-html="page.label"></button>
                </li>
            </ul>
        </div>

    </div>

    <!-- ✅ Modal Form -->
    <FloorForm
        v-if="showForm"
        :floor-id="editingId"
        :buildings="props.buildings"
        @close="closeForm"
    />

</div>
</template>

<script setup>
import { ref } from "vue"
import { router } from "@inertiajs/vue3"
import AppRoutes from "@/routes"
import AdminLayout from '@/Layouts/AdminLayout.vue'
import FloorForm from "./Form.vue"

defineOptions({ layout: AdminLayout })

const props = defineProps({
  floors: Object,
  buildings: Array,   
  filters: Object
})

const search = ref(props.filters.search ?? "")

const applyFilter = () => {
  router.get(AppRoutes.common.floors.index, {
    search: search.value
  }, { preserveState: true, replace: true })
}

const goPage = (url) => {
  if (!url) return
  router.get(url, {}, { preserveState: true })
}

const toggleStatus = (id) => {
  if (!confirm("Change floor status?")) return;

  router.post(AppRoutes.common.floors.toggleStatus(id), {}, {
    preserveScroll: true,
  });
};

const showForm = ref(false)
const editingId = ref(null)

const createFloor = () => {
  editingId.value = null
  showForm.value = true
}

const editFloor = (id) => {
  editingId.value = id
  showForm.value = true
}

const deleteFloor = (id) => {
  if (confirm("Delete floor?")) {
    router.delete(AppRoutes.common.floors.delete(id), {
      preserveScroll: true
    })
  }
}

const closeForm = () => {
  showForm.value = false
  editingId.value = null
}
</script>
