<template>
    <div>
        <!-- 🧭 Page Title -->
        <div class="page-title mb-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb align-items-center">
                    <li>
                        <h1 class="h4 mb-0 fw-semibold">Visitors</h1>
                    </li>
                    <li class="breadcrumb-item ms-2">
                        <a :href="AppRoutes.dashboard" class="text-decoration-none text-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Visitors</li>
                </ol>
            </nav>
        </div>

        <!-- 📋 Visitor List -->
        <div class="card shadow-sm border-0">
            <div class="card-header d-flex flex-wrap gap-2 align-items-center bg-white">
                <input v-model="search" @input="applyFilter" class="form-control form-control-sm"
                    placeholder="Search visitor..." style="width: 220px" />
                <select v-model="status" @change="applyFilter" class="form-select form-select-sm" style="width: 150px">
                    <option value="">All</option>
                    <option value="not_checked_in">Not Checked In</option>
                    <option value="checked_in">Checked In</option>
                    <option value="checked_out">Checked Out</option>
                </select>
            </div>

            <!-- 🧾 Table -->
            <div class="table-responsive">
                <table class="table table-hover align-middle text-center mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Phone</th>
                            <th>Badge</th>
                            <th>Status</th>
                            <th>Check-In</th>
                            <th>Check-Out</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="(v, i) in visitorsData.data" :key="v.id">
                            <td>{{ visitorsData.from + i }}</td>

                            <!-- 🖼️ Visitor Photo -->
                            <td>
                                <div class="visitor-photo mx-auto">
                                    <img :src="getPhotoUrl(v)" alt="Visitor" class="rounded-circle border shadow-sm" />
                                </div>
                            </td>

                            <td class="fw-semibold">{{ v.name }}</td>
                            <td>{{ v.company || "-" }}</td>
                            <td>{{ v.phone || "-" }}</td>
                            <td><span class="fw-bold text-primary">{{ v.badge_no || "-" }}</span></td>

                            <td>
                                <span class="badge" :class="{
                                    'bg-secondary': !v.checked_in_at,
                                    'bg-success': v.checked_in_at && !v.checked_out_at,
                                    'bg-danger': v.checked_out_at,
                                }">
                                    {{ statusLabel(v) }}
                                </span>
                            </td>

                            <td>{{ v.checked_in_at ?? "-" }}</td>
                            <td>{{ v.checked_out_at ?? "-" }}</td>

                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-info me-1" title="View Visitor Identity"
                                    @click="showDetails(v)">
                                    <i class="fa fa-id-card"></i>
                                </button>
                                <button v-if="!v.checked_in_at" class="btn btn-sm btn-outline-success me-1"
                                    title="Mark as Checked In" @click="checkIn(v.id)">
                                    <i class="fa fa-sign-in-alt"></i>
                                </button>
                                <button v-else-if="v.checked_in_at && !v.checked_out_at"
                                    class="btn btn-sm btn-outline-warning me-1" title="Mark as Checked Out"
                                    @click="checkOut(v.id)">
                                    <i class="fa fa-sign-out-alt"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-primary me-1" title="Edit Visitor"
                                    @click="openEditModal(v)">
                                    <i class="fa fa-pen"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" title="Delete Visitor"
                                    @click="destroy(v.id)">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>

                        <tr v-if="!visitorsData.data.length">
                            <td colspan="10" class="text-center p-3 text-muted">
                                No visitors found
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- 📄 Pagination -->
            <div class="card-footer d-flex flex-wrap justify-content-between align-items-center">
                <div class="small text-muted mb-2 mb-sm-0">
                    Showing {{ visitorsData.from }}–{{ visitorsData.to }} of {{ visitorsData.total }}
                </div>
                <ul class="pagination mb-0">
                    <li v-for="link in visitorsData.links" :key="link.label"
                        :class="['page-item', { active: link.active }]">
                        <button class="page-link" @click="go(link.url)" v-html="link.label"></button>
                    </li>
                </ul>
            </div>
        </div>

        <!-- 🪪 Visitor Identity (VI) Modal -->
        <div class="modal fade" id="visitorModal" tabindex="-1" ref="visitorModal">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0 shadow-lg">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title fw-bold">
                            <i class="fa fa-id-badge me-2"></i> Visitor Identity (VI)
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body bg-light">
                        <div class="card border-0 shadow-sm mx-auto" style="max-width: 700px;">
                            <div class="card-body bg-white p-4">
                                <div class="row align-items-center">
                                    <!-- Left: Visitor Info -->
                                    <div class="col-md-6 text-center text-md-start mb-4 mb-md-0">
                                        <div class="d-inline-block position-relative overflow-hidden border border-3 border-primary shadow-sm mb-3"
                                            style="width: 120px; height: 120px; border-radius: 50%;">
                                            <img :src="getPhotoUrl(selectedVisitor)" alt="Visitor Photo"
                                                style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;" />
                                        </div>

                                        <h5 class="fw-bold text-primary mb-1">{{ selectedVisitor.name }}</h5>
                                        <p class="text-muted mb-1">{{ selectedVisitor.company || "No Company" }}</p>
                                        <p class="mb-1"><strong>Email:</strong> {{ selectedVisitor.email || "—" }}</p>
                                        <p><strong>Phone:</strong> {{ selectedVisitor.phone || "—" }}</p>
                                    </div>


                                    <!-- Right: QR Code Placeholder -->
                                    <div class="col-md-6 text-center">
                                        <div class="border border-2 border-dashed rounded p-4 d-inline-block bg-light"
                                            style="min-width: 180px;">
                                            <img src="/assets/images/qr-placeholder.png" alt="QR Code"
                                                width="150" height="150" />
                                            <p class="small text-muted mt-2 mb-0">QR Code Placeholder</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer bg-white d-flex justify-content-between flex-wrap">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fa fa-times me-1"></i> Close
                        </button>
                        <button class="btn btn-outline-primary btn-sm">
                            <i class="fa fa-print me-1"></i> Print ID
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- ✏️ Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" ref="editModal">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0 shadow-lg">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title fw-bold">
                            <i class="fa fa-pen me-2"></i>Edit Visitor
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body bg-light">
                        <form @submit.prevent="updateVisitor">
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label class="form-label">Name</label>
                                    <input v-model="editForm.name" class="form-control" required />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Email</label>
                                    <input v-model="editForm.email" type="email" class="form-control" required />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Phone</label>
                                    <input v-model="editForm.phone" class="form-control" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Company</label>
                                    <input v-model="editForm.company" class="form-control" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Gender</label>
                                    <select v-model="editForm.gender" class="form-select">
                                        <option disabled value="">Select gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Purpose</label>
                                    <textarea v-model="editForm.purpose" class="form-control" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-primary" :disabled="!isChanged">
                                    <i class="fa fa-save me-1"></i> Update Visitor
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, reactive, computed, onMounted } from "vue";
import { router } from "@inertiajs/vue3";
import axios from "axios";
import AppRoutes from "@/routes";
import AdminLayout from "@/Layouts/AdminLayout.vue";
defineOptions({ layout: AdminLayout });

const props = defineProps({ visitors: Object, filters: Object });
const visitorsData = reactive(props.visitors);
const search = ref(props.filters?.search ?? "");
const status = ref(props.filters?.status ?? "");
const selectedVisitor = ref({});
const visitorModal = ref(null);
const editModal = ref(null);
const editForm = reactive({ id: null, name: "", email: "", phone: "", company: "", gender: "", purpose: "" });
let originalData = {};
let modalInstance = null;
let editInstance = null;

onMounted(() => {
    modalInstance = new bootstrap.Modal(visitorModal.value);
    editInstance = new bootstrap.Modal(editModal.value);
});

const applyFilter = () => {
    router.get(AppRoutes.visitor.index, { search: search.value, status: status.value }, {
        preserveScroll: true, replace: true,
        onSuccess: (page) => Object.assign(visitorsData, page.props.visitors),
    });
};

const openEditModal = (v) => {
    Object.assign(editForm, v);
    originalData = JSON.parse(JSON.stringify(v));
    editInstance.show();
};

const isChanged = computed(() => JSON.stringify(editForm) !== JSON.stringify(originalData));

const updateVisitor = async () => {
    try {
        const formData = new FormData();
        for (const key in editForm) formData.append(key, editForm[key] ?? "");

        await axios.post(AppRoutes.visitor.update(editForm.id), formData, {
            headers: { "Content-Type": "multipart/form-data" },
            params: { _method: "PUT" },
        });

        alert("Visitor updated successfully!");
        editInstance.hide();
        applyFilter();
    } catch (error) {
        if (error.response?.status === 422) {
            const errs = error.response.data.errors;
            alert("Validation failed:\n" + Object.entries(errs).map(([k, v]) => `• ${k}: ${v[0]}`).join("\n"));
        } else {
            alert("Something went wrong while updating.");
        }
    }
};

const destroy = (id) => confirm("Delete this visitor?") && router.delete(AppRoutes.visitor.delete(id), { onSuccess: applyFilter });
const checkIn = (id) => router.post(AppRoutes.visitor.checkIn(id), {}, { onSuccess: applyFilter });
const checkOut = (id) => router.post(AppRoutes.visitor.checkOut(id), {}, { onSuccess: applyFilter });
const showDetails = (v) => { selectedVisitor.value = v; modalInstance.show(); };
const getPhotoUrl = (v) => v.photo ? (v.photo.startsWith("http") ? v.photo : `/${v.photo}`) : "/assets/images/visitor/default-visitor.png";
const statusLabel = (v) => !v.checked_in_at ? "Not Checked In" : (v.checked_out_at ? "Checked Out" : "Checked In");
</script>

<style scoped>
.visitor-photo img {
    width: 45px;
    height: 45px;
    object-fit: cover;
}

.modal-content {
    border-radius: 10px;
}
</style>
