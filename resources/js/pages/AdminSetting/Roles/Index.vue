<template>
<div>
  <div class="page-title">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li><h1>Roles</h1></li>
        <li class="breadcrumb-item"><a :href="AppRoutes.dashboard">Home</a></li>
        <li class="breadcrumb-item active">Roles</li>
      </ol>
    </nav>
  </div>

  <div class="card">
    <div class="card-header d-flex gap-2">
      <input v-model="search" @input="applyFilter"
        class="form-control form-control-sm"
        placeholder="Search role..." style="width:200px">

      <button class="btn btn-primary btn-sm ms-auto" @click="goCreate">+ Add Role</button>
    </div>

    <div class="card-body p-0">
      <table class="table table-striped mb-0">
        <thead>
          <tr>
            <th>#</th>
            <th>Role</th>
            <th>Permissions</th>
            <th>Users</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="(r, i) in roles.data" :key="r.id">
            <td>{{ roles.from + i }}</td>
            <td>{{ r.name }}</td>
            <td><span class="badge bg-info">{{ r.permissions_count }}</span></td>
            <td><span class="badge bg-success">{{ r.users_count }}</span></td>

            <td class="text-end">
              <button class="btn btn-sm btn-primary me-1" @click="goEdit(r.id)">Edit</button>
              <button class="btn btn-sm btn-danger" @click="destroy(r.id)">Delete</button>
            </td>
          </tr>

          <tr v-if="!roles.data.length">
            <td colspan="5" class="text-center p-3">No roles found</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="card-footer d-flex justify-content-between align-items-center">
      <div>Showing {{ roles.from }}–{{ roles.to }} of {{ roles.total }}</div>
      <ul class="pagination mb-0">
        <li v-for="link in roles.links" :key="link.label"
            :class="['page-item', { active: link.active }]"
        >
          <button class="page-link" @click="go(link.url)" v-html="link.label"></button>
        </li>
      </ul>
    </div>

  </div>
</div>
</template>

<script setup>
import { ref } from "vue"
import { router } from "@inertiajs/vue3"
import AppRoutes from "@/routes"
import AdminLayout from '@/Layouts/AdminLayout.vue'
defineOptions({ layout: AdminLayout })

const props = defineProps({ roles: Object, filters: Object })

const roles = props.roles
const search = ref(props.filters?.search ?? "")

const applyFilter = () => router.get(AppRoutes.roles.index, { search: search.value }, { preserveState: true })
const go = url => url && router.get(url)
const goCreate = () => router.get(AppRoutes.roles.create)
const goEdit = id => router.get(AppRoutes.roles.edit(id))

const destroy = (id) => {
  if (confirm("Delete role?")) router.delete(AppRoutes.roles.delete(id), {
    onSuccess: () => router.get(AppRoutes.roles.index, {}, { replace: true })
  })
}
</script>
