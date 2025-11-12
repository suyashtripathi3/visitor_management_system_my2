<template>
<div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,0.4)">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">{{ isEdit ? "Edit Building" : "Add Building" }}</h5>
        <button type="button" class="btn-close" @click="emit('close')"></button>
      </div>

      <form @submit.prevent="submitForm">
        <div class="modal-body">

          <!-- Loader -->
          <div v-if="isLoading" class="text-center py-3">
            <div class="spinner-border text-primary" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
          </div>

          <!-- Building Name -->
          <div class="mb-3">
            <label>Building Name</label>
            <input v-model="form.name" class="form-control" :class="{ 'is-invalid': errors.name }">
            <div class="invalid-feedback" v-if="errors.name">{{ errors.name }}</div>
          </div>

          <!-- Address -->
          <div class="mb-3">
            <label>Address</label>
            <textarea v-model="form.address" class="form-control" :class="{ 'is-invalid': errors.address }"></textarea>
            <div class="invalid-feedback" v-if="errors.address">{{ errors.address }}</div>
          </div>

          <!-- Status -->
       

        </div>

        <div class="modal-footer">
          <button type="button" @click="emit('close')" class="btn btn-secondary">Cancel</button>
          <button type="submit" class="btn btn-primary">{{ isEdit ? "Update" : "Save" }}</button>
        </div>
      </form>

    </div>
  </div>
</div>

<div class="modal-backdrop fade show"></div>
</template>

<script setup>
import { ref } from "vue"
import { useForm } from "@inertiajs/vue3"
import axios from "axios"
import AppRoutes from "@/routes"

const props = defineProps({
  buildingId: Number || null
})

const emit = defineEmits(["close"])
const isEdit = props.buildingId !== null
const isLoading = ref(false)

// Form object
const form = useForm({
  name: "",
  address: "",
  status: "1"
})

const errors = ref({})

// Fetch building data if editing
if (isEdit) {
  isLoading.value = true

  axios.get(AppRoutes.common.buildings.show(props.buildingId))
    .then(res => {
      const b = res.data.data
      form.name = b.name
      form.address = b.address
      form.status = b.status ? "1" : "0"
    })
    .finally(() => isLoading.value = false)
}

// Submit form
const submitForm = () => {
  errors.value = {}

  if (!form.name) errors.value.name = "Building name is required"
  if (form.status === "") errors.value.status = "Select status"

  if (Object.keys(errors.value).length) return

  if (isEdit) {
    form.put(AppRoutes.common.buildings.update(props.buildingId), {
      onSuccess: () => emit("close")
    })
  } else {
    form.post(AppRoutes.common.buildings.store, {
      onSuccess: () => emit("close")
    })
  }
}
</script>

<style scoped>
.modal-backdrop { z-index: 1040; }
.modal { z-index: 1050; }
</style>
