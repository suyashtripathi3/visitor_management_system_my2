<template>
  <div class="container-fluid">
    
    <!-- Page Header -->
    <div class="page-title">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li><h1>{{ editId ? "Edit Role" : "Create Role" }}</h1></li>
          <li class="breadcrumb-item"><a :href="AppRoutes.dashboard">Home</a></li>
          <li class="breadcrumb-item"><a :href="AppRoutes.roles.index">Roles</a></li>
          <li class="breadcrumb-item active">{{ editId ? "Edit" : "Create" }}</li>
        </ol>
      </nav>
    </div>

    <div class="card">
      <div class="card-body">

        <form @submit.prevent="save">

          <!-- Role Name -->
          <div class="mb-3">
            <label class="form-label fw-bold">Role Name</label>
            <input v-model="form.name" class="form-control" placeholder="Enter role name">
            <small class="text-danger" v-if="form.errors.name">{{ form.errors.name }}</small>
          </div>

          <!-- Search Filter -->
          <div class="mb-2">
            <label class="fw-bold">Permissions</label>
            <input 
              v-model="search"
              class="form-control form-control-sm mt-1"
              placeholder="Search permissions..."
            >
          </div>

          <!-- Permissions -->
          <div class="border rounded p-3" style="max-height:350px; overflow-y:auto;">
            <div class="row">
              <div v-for="p in filteredPermissions" :key="p.id" class="col-6 mb-2">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input me-1"
                    :value="p.name"
                    v-model="form.permissions"
                  >
                  {{ p.name }}
                </label>
              </div>
            </div>
          </div>

          <!-- Error -->
          <small class="text-danger" v-if="form.errors.permissions">
            {{ form.errors.permissions }}
          </small>

          <div class="mt-3 d-flex justify-content-end gap-2">
            <button type="button" class="btn btn-light" @click="cancel">Cancel</button>
            <button type="submit" class="btn btn-primary">{{ editId ? "Update" : "Save" }}</button>
          </div>

        </form>

      </div>
    </div>

  </div>
</template>

<script setup>
import { ref, computed } from "vue"
import { useForm, router } from "@inertiajs/vue3"
import AppRoutes from "@/routes"
import AdminLayout from "@/Layouts/AdminLayout.vue"

defineOptions({ layout: AdminLayout })

const props = defineProps({
  editId: Number || null,
  role: Object,
  permissions: Array,
  rolePermissions: Array
})

const form = useForm({
  name: props.role?.name ?? "",
  permissions: props.rolePermissions ?? []
})

const search = ref("")

const filteredPermissions = computed(() =>
  props.permissions.filter(p =>
    p.name.toLowerCase().includes(search.value.toLowerCase())
  )
)

const save = () => {
  if (props.editId) {
    form.put(AppRoutes.roles.update(props.editId), {
      onSuccess: () => router.get(AppRoutes.roles.index)
    })
  } else {
    form.post(AppRoutes.roles.store, {
      onSuccess: () => router.get(AppRoutes.roles.index)
    })
  }
}

const cancel = () => router.get(AppRoutes.roles.index)
</script>
