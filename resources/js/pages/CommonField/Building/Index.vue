<template>
<div>

    <!-- ✅ Title -->
    <div class="page-title">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li><h1>Buildings</h1></li>
                <li class="breadcrumb-item"><a :href="AppRoutes.dashboard">Home</a></li>
                <li class="breadcrumb-item active">Buildings</li>
            </ol>
        </nav>
    </div>

    <div class="card">

        <!-- ✅ Filters -->
        <div class="card-header d-flex gap-2">
            <input v-model="search" @input="applyFilter" class="form-control form-control-sm"
                placeholder="Search building..." style="width:200px">

            <button class="btn btn-primary btn-sm ms-auto" @click="createBuilding">
                + Add Building
            </button>
        </div>

        <!-- ✅ Table -->
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Building ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="(b, index) in props.buildings.data" :key="b.id">
                        <td>{{ props.buildings.from + index }}</td>
                        <td>{{ b.building_id }}</td>
                        <td>{{ b.name }}</td>
                        <td>{{ b.address ?? '-' }}</td>

                        <!-- ✅ Status -->
                        <td>
                            <span
                              :class="b.status ? 'badge bg-success' : 'badge bg-danger'"
                              style="cursor: pointer"
                              @click="toggleStatus(b.id)"
                            >
                              {{ b.status ? 'Active' : 'Inactive' }}
                            </span>
                          </td>

                        <!-- ✅ Actions -->
                        <td class="text-end">
                            <button class="btn btn-sm btn-primary me-1" @click="editBuilding(b.id)">Edit</button>
                            <button class="btn btn-sm btn-danger" @click="deleteBuilding(b.id)">Delete</button>
                        </td>
                    </tr>

                    <tr v-if="!props.buildings.data.length">
                        <td colspan="6" class="text-center p-2">No buildings found</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- ✅ Pagination -->
        <div class="card-footer d-flex justify-content-between align-items-center">
            <div>
              Showing {{ props.buildings.from }}–{{ props.buildings.to }} of {{ props.buildings.total }}
            </div>

            <ul class="pagination mb-0">
                <li class="page-item"
                    v-for="page in props.buildings.links"
                    :key="page.label"
                    :class="{ active: page.active, disabled: !page.url }">
                    <button class="page-link" @click="goPage(page.url)" v-html="page.label"></button>
                </li>
            </ul>
        </div>

    </div>

    <!-- ✅ FORM MODAL -->
    <BuildingForm
        v-if="showForm"
        :building-id="editingId"
        @close="closeForm"
    />

</div>
</template>

<script setup>
import { ref } from "vue"
import { router } from "@inertiajs/vue3"
import AppRoutes from "@/routes"
import AdminLayout from '@/Layouts/AdminLayout.vue'
import BuildingForm from "./Form.vue"

defineOptions({ layout: AdminLayout })

const props = defineProps({
  buildings: Object,
  filters: Object
})

const search = ref(props.filters.search ?? "")

const applyFilter = () => {
  router.get(AppRoutes.common.buildings.index, {
    search: search.value
  }, { preserveState: true, replace: true })
}

// Pagination
const goPage = (url) => {
  if (!url) return
  router.get(url, {}, { preserveState: true })
}

const toggleStatus = (id) => {
  if (!confirm("Change status?")) return;

  router.post(AppRoutes.common.buildings.toggleStatus(id), {}, {
    preserveScroll: true,
  });
};




const showForm = ref(false)
const editingId = ref(null)

// Create
const createBuilding = () => {
  editingId.value = null
  showForm.value = true
}

// Edit
const editBuilding = (id) => {
  editingId.value = id
  showForm.value = true
}

// Delete
const deleteBuilding = (id) => {
  if (confirm("Delete building?")) {
    router.delete(AppRoutes.common.buildings.delete(id), {
      preserveScroll: true
    })
  }
}

// Close modal
const closeForm = () => {
  showForm.value = false
  editingId.value = null
}
</script>
