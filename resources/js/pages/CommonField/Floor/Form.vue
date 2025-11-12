<template>
<div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,0.4)">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">{{ isEdit ? "Edit Floor" : "Add Floor" }}</h5>
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

          <!-- ✅ Building Dropdown + Search -->
          <div class="mb-3">
            <label>Building</label>

            <!-- Search Input (Show Only When Select is Focused) -->
            <input
              v-if="showSearch"
              type="text"
              v-model="searchBuilding"
              ref="searchBuildingInput"
              class="form-control mb-2"
              placeholder="Search building..."
            />

            <select
              v-model="form.building_id"
              class="form-select"
              :class="{ 'is-invalid': errors.building_id }"
              @focus="openSearch"
              @change="closeSearch"
              @blur="hideSearch"
            >
              <option value="">Select Building</option>
              <option v-for="b in filteredBuildings" :key="b.id" :value="b.id">
                {{ b.building_name ?? b.name }}
              </option>
            </select>

            <div class="invalid-feedback" v-if="errors.building_id">
              {{ errors.building_id }}
            </div>
          </div>

          <!-- Floor Name -->
          <div class="mb-3">
            <label>Floor Name</label>
            <input
              v-model="form.floor_name"
              class="form-control"
              :class="{ 'is-invalid': errors.floor_name }"
            >
            <div class="invalid-feedback" v-if="errors.name">{{ errors.floor_name }}</div>
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

<div class="modal-backdrop fade show"></div>
</template>

<script setup>
import { ref, computed, onMounted, nextTick } from "vue"
import { useForm } from "@inertiajs/vue3"
import axios from "axios"
import AppRoutes from "@/routes"

const props = defineProps({
  floorId: Number || null,
  buildings: Array
})

const emit = defineEmits(["close"])
const isEdit = props.floorId !== null
const isLoading = ref(false)

const form = useForm({
  building_id: "",
  floor_name: "",
  status: "1"
})

const errors = ref({})

// ✅ Search system
const searchBuilding = ref("")
const searchBuildingInput = ref(null)
const showSearch = ref(false)

// ✅ Filter building list
const filteredBuildings = computed(() => {
  if (!searchBuilding.value) return props.buildings
  return props.buildings.filter(b =>
    (b.building_name ?? b.name)
      .toLowerCase()
      .includes(searchBuilding.value.toLowerCase())
  )
})

// ✅ Actions controlling search box
const openSearch = () => {
  showSearch.value = true
  nextTick(() => searchBuildingInput.value?.focus())
}

const closeSearch = () => {
  searchBuilding.value = ""
  showSearch.value = false
}

const hideSearch = () => setTimeout(() => showSearch.value = false, 150)

// ✅ Load data if editing
if (isEdit) {
  isLoading.value = true

  axios.get(AppRoutes.common.floors.show(props.floorId))
    .then(res => {
      const f = res.data.data
      form.building_id = f.building_id
      form.floor_name = f.floor_name
      form.status = f.status ? "1" : "0"
    })
    .finally(() => isLoading.value = false)
}

// ✅ Submit
const submitForm = () => {

  errors.value = {}

  if (!form.building_id) errors.value.building_id = "Building is required"
  if (!form.floor_name) errors.value.floor_name = "Floor name is required"

  if (Object.keys(errors.value).length) return

  if (isEdit) {
    // alert("heelo");
    form.put(AppRoutes.common.floors.update(props.floorId), {
      onSuccess: () => emit("close")
    })
  } else {
    form.post(AppRoutes.common.floors.store, {
      onSuccess: () => emit("close")
    })
  }
}
</script>

<style scoped>
.modal-backdrop { z-index: 1040; }
.modal { z-index: 1050; }
</style>
