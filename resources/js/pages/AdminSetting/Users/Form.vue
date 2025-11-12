<template>
<div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,0.4)">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">{{ isEdit ? "Edit User" : "Add User" }}</h5>
        <button type="button" class="btn-close" @click="emit('close')"></button>
      </div>

      <form @submit.prevent="submitForm">
        <div class="modal-body">

          <!-- Name -->
          <div class="mb-3">
            <label>Name</label>
            <input v-model="form.name" class="form-control" :class="{ 'is-invalid': errors.name }">
            <div class="invalid-feedback" v-if="errors.name">{{ errors.name }}</div>
          </div>

          <!-- Email -->
          <div class="mb-3">
            <label>Email</label>
            <input v-model="form.email" type="email" class="form-control" :class="{ 'is-invalid': errors.email }">
            <div class="invalid-feedback" v-if="errors.email">{{ errors.email }}</div>
          </div>

          <!-- Password only for Create -->
          <div class="mb-3" v-if="!isEdit">
            <label>Password</label>
            <input v-model="form.password" type="password" class="form-control" :class="{ 'is-invalid': errors.password }">
            <div class="invalid-feedback" v-if="errors.password">{{ errors.password }}</div>
          </div>

          <!-- Department -->
          <div class="mb-3">
            <label>Department</label>
            <select v-model="form.department_id" class="form-select" :class="{ 'is-invalid': errors.department_id }">
              <option value="">Select Department</option>
              <option v-for="d in departments" :key="d.id" :value="d.id">{{ d.name }}</option>
            </select>
            <div class="invalid-feedback" v-if="errors.department_id">{{ errors.department_id }}</div>
          </div>

          <!-- Designation -->
          <div class="mb-3">
            <label>Designation</label>
            <select v-model="form.designation_id" class="form-select" :class="{ 'is-invalid': errors.designation_id }">
              <option value="">Select Designation</option>
              <option v-for="des in designations" :key="des.id" :value="des.id">{{ des.name }}</option>
            </select>
            <div class="invalid-feedback" v-if="errors.designation_id">{{ errors.designation_id }}</div>
          </div>

          <!-- Roles -->
          <div class="mb-3">
            <label>Roles</label>
            <select v-model="form.roles" multiple class="form-select" :class="{ 'is-invalid': errors.roles }">
              <option v-for="r in allRoles" :key="r" :value="r">{{ r }}</option>
            </select>
            <div class="invalid-feedback" v-if="errors.roles">{{ errors.roles }}</div>
            <small class="text-muted">Hold CTRL to select multiple</small>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" @click="emit('close')" class="btn btn-secondary">Cancel</button>
          <button type="submit" class="btn btn-primary">{{ isEdit ? "Update" : "Save" }}</button>
        </div>

      </form>

    </div>
  </div>
</div>

<!-- Backdrop -->
<div class="modal-backdrop fade show"></div>
</template>

<script setup>
import { ref } from "vue"
import { useForm } from "@inertiajs/vue3"
import axios from "axios"
import AppRoutes from "@/routes"

// Props from Index.vue
const props = defineProps({
  userId: Number || null,
  departments: Array,
  designations: Array,
  allRoles: Array
})

const emit = defineEmits(["close"])
const isEdit = props.userId !== null

// Form
const form = useForm({
  name: "",
  email: "",
  password: "",
  department_id: "",
  designation_id: "",
  roles: []
})

const errors = ref({})

// Load user for edit
if (isEdit) {
  axios.get(AppRoutes.users.edit(props.userId)).then(res => {
    const u = res.data.data

    form.name = u.name
    form.email = u.email
    form.department_id = u.department_id
    form.designation_id = u.designation_id
    form.roles = u.roles ? u.roles.map(r => r.name) : []
  })
}

// Submit
const submitForm = () => {
  errors.value = {}
  if (!form.name) errors.value.name = "Name is required"
  if (!form.email) errors.value.email = "Email is required"
  if (!isEdit && !form.password) errors.value.password = "Password required"
  if (!form.department_id) errors.value.department_id = "Required"
  if (!form.designation_id) errors.value.designation_id = "Required"
  if (form.roles.length === 0) errors.value.roles = "Select at least one role"

  if (Object.keys(errors.value).length) return

  if (isEdit) {
    form.put(AppRoutes.users.update(props.userId), { onSuccess: () => emit("close") })
  } else {
    form.post(AppRoutes.users.store, { onSuccess: () => emit("close") })
  }
}
</script>
