<script setup>
import { onMounted, ref, watch } from 'vue'
import { usePage } from '@inertiajs/vue3'

// Toast Plugin
import { toast } from 'vue3-toastify'
import 'vue3-toastify/dist/index.css'

import Header from '@/Components/Layout/Header.vue'
import Sidebar from '@/Components/Layout/Sidebar.vue'

// Sidebar toggle state
const sidebarOpen = ref(false)

// Inertia props
const page = usePage()

// ✅ Toast watcher
watch(
  () => page.props.toast,
  (toastMsg) => {
    if (!toastMsg) return

    switch (toastMsg.type) {
      case 'success':
        toast.success(toastMsg.message, { position: 'top-right' })
        break
      case 'error':
        toast.error(toastMsg.message, { position: 'top-right' })
        break
      case 'info':
        toast.info(toastMsg.message, { position: 'top-right' })
        break
    }
  },
  { immediate: true }
)

// ✅ Init Admin Theme JS
onMounted(() => {
  setTimeout(() => {
    if (window.YashAdmin && typeof window.YashAdmin.init === 'function') {
      window.YashAdmin.init()
    }
  }, 200)
})
</script>

<template>
  <div id="main-wrapper">
    
    <!-- Navbar -->
    <Header />

    <!-- Sidebar -->
    <Sidebar />

    <!-- Content -->
    <div class="content-body">
      <div class="container-fluid">
        <slot />
      </div>
    </div>

  </div>
</template>

<style scoped>
/* You can style if needed */
</style>
