<template>
<div>

    <!-- ✅ Title -->
    <div class="page-title">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li><h1>Users</h1></li>
                <li class="breadcrumb-item"><a :href="AppRoutes.dashboard">Home</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ol>
        </nav>
    </div>

    <div class="card">

        <!-- ✅ Filters -->
        <div class="card-header d-flex gap-2">

            <input v-model="search" @input="applyFilter" class="form-control form-control-sm"
                placeholder="Search name or email..." style="width:200px">

            <select v-model="filterDepartment" @change="applyFilter" class="form-select form-select-sm" style="width:150px">
                <option value="">All Departments</option>
                <option v-for="d in props.departments" :key="d.id" :value="d.id">{{ d.name }}</option>
            </select>

            <select v-model="filterRole" @change="applyFilter" class="form-select form-select-sm" style="width:140px">
                <option value="">All Roles</option>
                <option v-for="r in props.allRoles" :key="r" :value="r">{{ r }}</option>
            </select>

            <button class="btn btn-primary btn-sm ms-auto" @click="createUser">+ Add User</button>
        </div>

        <!-- ✅ Table -->
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead><tr>
                    <th>#</th><th>Name</th><th>Email</th><th>Department</th><th>Role</th> <th>Status</th> <th class="text-end">Actions</th>
                </tr></thead>

                <tbody>
                    <tr v-for="(u, index) in props.users.data" :key="u.id">
                        <td>{{ props.users.from + index }}</td>
                        <td>{{ u.name }}</td>
                        <td>{{ u.email }}</td>
                        <td>{{ u.department?.name ?? '-' }}</td>
                        <td>{{ u.roles?.map(r=>r.name).join(', ') ?? '-'  }}</td>
                            <!-- ✅ Status Toggle -->
                            <td>
                                <span 
                                    class="badge"
                                    :class="u.status === 'active' ? 'bg-success' : 'bg-danger'"
                                    style="cursor: pointer"
                                    @click="toggleStatus(u.id)"
                                >
                                    {{ u.status === 'active' ? 'Active' : 'Inactive' }}
                                </span>
                            </td>

                        <td class="text-end">
                            <button class="btn btn-sm btn-primary me-1" @click="editUser(u.id)">Edit</button>
                            <button class="btn btn-sm btn-danger" @click="deleteUser(u.id)">Delete</button>
                        </td>
                    </tr>
                    <tr v-if="!props.users.data.length">
                        <td colspan="6" class="text-center p-2">No users found</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- ✅ Pagination -->
        <div class="card-footer d-flex justify-content-between align-items-center">

            <div>Showing {{ props.users.from }}–{{ props.users.to }} of {{ props.users.total }}</div>

            <ul class="pagination mb-0">
              
                <li class="page-item" v-for="page in props.users.links" :key="page.label"
                    :class="{ active: page.active, disabled: !page.url }">
                    <button class="page-link" @click="goPage(page.url)" v-html="page.label"></button>
                </li>
          
            </ul>

        </div>

    </div>

    <!-- ✅ FORM MODAL -->
    <UserForm v-if="showForm"
        :user-id="editingId"
        :departments="props.departments"
        :designations="props.designations"
        :allRoles="props.allRoles"
        @close="closeForm" />

</div>
</template>

<script setup>
import { ref } from "vue"
import { router } from "@inertiajs/vue3"
import UserForm from "./Form.vue"
import AppRoutes from "@/routes"
import AdminLayout from '@/Layouts/AdminLayout.vue'
defineOptions({ layout: AdminLayout })

const props = defineProps({
  users: Object,
  filters: Object,
  departments: Array,
  designations: Array,
  allRoles: Array,
  totalUsers: Number
})

const toggleStatus = (id) => {
  if (!confirm("Change user status?")) return;

  router.post(AppRoutes.users.toggleStatus(id), {}, {
    preserveScroll: true
  });
};

const search = ref(props.filters.search ?? "")
const filterDepartment = ref(props.filters.department_id ?? "")
const filterRole = ref(props.filters.role ?? "")

const applyFilter = () => {
  router.get(AppRoutes.users.index, {
    search: search.value,
    department_id: filterDepartment.value,
    role: filterRole.value
  }, { preserveState: true, replace: true })
}

const goPage = (url) => {
  if (!url) return
  router.get(url, {}, { preserveState: true })
}

const showForm = ref(false)
const editingId = ref(null)

const createUser = () => { editingId.value=null; showForm.value=true }
const editUser = (id) => { editingId.value=id; showForm.value=true }

const deleteUser = (id) => {
  if (confirm("Delete user?")) router.delete(AppRoutes.users.delete(id))
}

const closeForm = () => { showForm.value=false; editingId.value=null }
</script>
