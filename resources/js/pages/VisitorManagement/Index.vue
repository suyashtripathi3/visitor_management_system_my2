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
            <div class="card-header d-flex flex-wrap gap-2 align-items-center bg-white justify-content-between">
                <div class="d-flex flex-wrap gap-2 align-items-center">
                    <input v-model="search" @input="applyFilter" class="form-control form-control-sm"
                        placeholder="Search visitor..." style="width: 220px" />

                    <select v-model="status" @change="applyFilter" class="form-select form-select-sm"
                        style="width: 150px">
                        <option value="">All</option>
                        <option value="not_checked_in">Not Checked In</option>
                        <option value="checked_in">Checked In</option>
                        <option value="checked_out">Checked Out</option>
                    </select>

                    <!-- 📷 Universal QR Scanner -->
                    <button class="btn btn-outline-secondary btn-sm" @click="openQRScanner" title="Scan Visitor QR">
                        <i class="fa fa-qrcode me-1"></i> Scan QR
                    </button>
                </div>

                <!-- 🔢 Results per page -->
                <div class="d-flex align-items-center gap-2">
                    <label class="small fw-semibold mb-0 text-muted">Show:</label>
                    <select v-model="perPage" @change="applyFilter" class="form-select form-select-sm"
                        style="width: 80px">
                        <option v-for="n in [10, 50, 100, 200]" :key="n" :value="n">{{ n }}</option>
                        <option value="all">All</option>
                    </select>
                </div>
            </div>

            <!-- 🧾 Table -->
            <div class="table-responsive" style="max-height: 70vh; overflow-y: auto;">
                <table class="table table-hover align-middle text-center mb-0">
                    <thead class="table-light sticky-top" style="top: 0; z-index: 10;">
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

                            <!-- 🖼️ Visitor Photo / Fallback -->
                            <td>
                                <div
                                    class="visitor-photo mx-auto d-flex align-items-center justify-content-center rounded-circle border shadow-sm">
                                    <template v-if="v.photo">
                                        <img :src="getPhotoUrl(v)" alt="Visitor" class="rounded-circle" />
                                    </template>
                                    <template v-else>
                                        <span
                                            class="fw-bold text-white bg-primary rounded-circle d-flex align-items-center justify-content-center initials">
                                            {{ getInitial(v.name) }}
                                        </span>
                                    </template>
                                </div>
                            </td>

                            <td class="fw-semibold">{{ v.name }}</td>
                            <td>{{ v.company || "-" }}</td>
                            <td>{{ v.phone || "-" }}</td>
                            <td><span class="fw-bold text-primary">{{ v.badge_no || "-" }}</span></td>

                            <td>
                                <span class="badge" :class="{
                                    'bg-secondary': !latestMovement(v)?.checked_in_at,
                                    'bg-success': latestMovement(v)?.checked_in_at && !latestMovement(v)?.checked_out_at,
                                    'bg-danger': latestMovement(v)?.checked_out_at,
                                }">
                                    {{ statusLabel(v) }}
                                </span>
                            </td>

                            <td>{{ formatDate(latestMovement(v)?.checked_in_at) }}</td>
                            <td>{{ formatDate(latestMovement(v)?.checked_out_at) }}</td>

                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-info me-1" title="View Visitor Identity"
                                    @click="showDetails(v)">
                                    <i class="fa fa-id-card"></i>
                                </button>
                                <!-- <button v-if="!latestMovement(v)?.checked_in_at"
                                    class="btn btn-sm btn-outline-success me-1" title="Mark as Checked In"
                                    @click="checkIn(v.id)">
                                    <i class="fa fa-sign-in-alt"></i>
                                </button>
                                <button
                                    v-else-if="latestMovement(v)?.checked_in_at && !latestMovement(v)?.checked_out_at"
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
                                </button> -->
                            </td>
                        </tr>

                        <tr v-if="!visitorsData.data.length">
                            <td colspan="10" class="text-center p-3 text-muted">No visitors found</td>
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

        <!-- 🪪 Visitor Identity Modal -->
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
                                    <div class="col-md-6 text-center text-md-start mb-4 mb-md-0">
                                        <div class="d-inline-block border border-3 border-primary shadow-sm mb-3 rounded-circle overflow-hidden"
                                            style="width: 120px; height: 120px;">
                                            <img :src="getPhotoUrl(selectedVisitor)" alt="Visitor Photo"
                                                class="w-100 h-100 object-fit-cover" />
                                        </div>
                                        <h5 class="fw-bold text-primary mb-1">{{ selectedVisitor.name }}</h5>
                                        <p class="text-muted mb-1">{{ selectedVisitor.company || "No Company" }}</p>
                                        <p class="mb-1"><strong>Email:</strong> {{ selectedVisitor.email || "—" }}</p>
                                        <p><strong>Phone:</strong> {{ selectedVisitor.phone || "—" }}</p>
                                    </div>

                                    <div class="col-md-6 text-center">
                                        <div class="border border-2 border-dashed rounded p-4 bg-light">
                                            <img src="/assets/images/qr-placeholder.png" alt="QR Code" width="150"
                                                height="150" />
                                            <p class="small text-muted mt-2 mb-0">QR Code Placeholder</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer bg-white">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fa fa-times me-1"></i> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 📷 QR Scanner Modal -->
        <div class="modal fade" id="qrModal" tabindex="-1" ref="qrModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 shadow">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title">
                            <i class="fa fa-qrcode me-2"></i> Scan Visitor QR
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            @click="stopQRScanner"></button>
                    </div>
                    <div class="modal-body text-center">
                        <video ref="video" autoplay playsinline class="border rounded w-100"></video>
                        <p class="mt-2 small text-muted">{{ qrMessage }}</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal" @click="stopQRScanner">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, computed, onMounted, onBeforeUnmount } from "vue";
import { router } from "@inertiajs/vue3";
import axios from "axios";
import AppRoutes from "@/routes";
import AdminLayout from "@/Layouts/AdminLayout.vue";
defineOptions({ layout: AdminLayout });

const props = defineProps({ visitors: Object, filters: Object });
const visitorsData = ref(props.visitors);
const search = ref(props.filters?.search ?? "");
const status = ref(props.filters?.status ?? "");
const perPage = ref(props.filters?.perPage ?? 10);

const selectedVisitor = ref({});
const visitorModal = ref(null);
const editModal = ref(null);
const qrModal = ref(null);
const video = ref(null);
const qrMessage = ref("Initializing camera...");
let barcodeDetector = null;
let qrInterval = null;
let cameraStream = null;

const editForm = ref({ id: null, name: "", email: "", phone: "", company: "", gender: "" });
let originalData = {};
let modalInstance = null;
let editInstance = null;
let qrInstance = null;

onMounted(async () => {
    modalInstance = new bootstrap.Modal(visitorModal.value);
    editInstance = new bootstrap.Modal(editModal.value);
    qrInstance = new bootstrap.Modal(qrModal.value);

    if ("BarcodeDetector" in window) {
        const formats = await window.BarcodeDetector.getSupportedFormats();
        barcodeDetector = new window.BarcodeDetector({ formats });
    } else {
        console.warn("BarcodeDetector not supported in this browser.");
    }
});

onBeforeUnmount(() => stopQRScanner());

const latestMovement = (v) => (!v.movement_histories?.length ? null : v.movement_histories[0]);

const formatDate = (date) =>
    date ? new Date(date).toLocaleString("en-IN", { dateStyle: "medium", timeStyle: "short" }) : "-";

const applyFilter = () => {
    router.get(
        AppRoutes.visitor.index,
        { search: search.value, status: status.value, perPage: perPage.value },
        {
            preserveScroll: true,
            replace: true,
            onSuccess: (page) => (visitorsData.value = page.props.visitors),
        }
    );
};

const go = (url) => url && router.visit(url, { preserveScroll: true });

const openEditModal = (v) => {
    editForm.value = { ...v };
    originalData = JSON.parse(JSON.stringify(v));
    editInstance.show();
};

const isChanged = computed(() => JSON.stringify(editForm.value) !== JSON.stringify(originalData));

const updateVisitor = async () => {
    try {
        const formData = new FormData();
        for (const key in editForm.value) formData.append(key, editForm.value[key] ?? "");
        await axios.post(AppRoutes.visitor.update(editForm.value.id), formData, {
            headers: { "Content-Type": "multipart/form-data" },
            params: { _method: "PUT" },
        });
        editInstance.hide();
        applyFilter();
    } catch (error) {
        console.error(error);
        alert("Error updating visitor details.");
    }
};

const destroy = (id) =>
    confirm("Delete this visitor?") &&
    router.delete(AppRoutes.visitor.delete(id), { onSuccess: applyFilter });

const checkIn = (id) =>
    router.post(AppRoutes.visitor.checkIn(id), {}, { onSuccess: () => setTimeout(applyFilter, 300) });
const checkOut = (id) =>
    router.post(AppRoutes.visitor.checkOut(id), {}, { onSuccess: () => setTimeout(applyFilter, 300) });

const showDetails = (v) => {
    selectedVisitor.value = v;
    modalInstance.show();
};

const getPhotoUrl = (v) =>
    v.photo
        ? v.photo.startsWith("http")
            ? v.photo
            : `/${v.photo}`
        : "";

const getInitial = (name) => {
    if (!name) return "?";
    return name.charAt(0).toUpperCase();
};

const statusLabel = (v) => {
    const m = latestMovement(v);
    if (!m) return "Not Checked In";
    return m.checked_out_at ? "Checked Out" : m.checked_in_at ? "Checked In" : "Not Checked In";
};

// 🔍 QR Scanner Logic
const openQRScanner = async () => {
    if (!("BarcodeDetector" in window)) {
        alert("QR scanning is not supported in this browser.");
        return;
    }
    qrMessage.value = "Initializing camera...";
    qrInstance.show();
    try {
        cameraStream = await navigator.mediaDevices.getUserMedia({
            video: { facingMode: "environment" },
            audio: false,
        });
        video.value.srcObject = cameraStream;
        video.value.play();
        qrMessage.value = "Scanning for QR...";
        startQRScanner();
    } catch {
        qrMessage.value = "Camera access denied.";
    }
};

const startQRScanner = () => {
    if (qrInterval) clearInterval(qrInterval);
    qrInterval = setInterval(async () => {
        if (!barcodeDetector || !video.value) return;
        const canvas = document.createElement("canvas");
        canvas.width = video.value.videoWidth;
        canvas.height = video.value.videoHeight;
        const ctx = canvas.getContext("2d");
        ctx.drawImage(video.value, 0, 0, canvas.width, canvas.height);
        try {
            const detections = await barcodeDetector.detect(canvas);
            if (detections.length > 0) {
                const qr = detections[0].rawValue;
                qrMessage.value = "QR Found ✅";
                search.value = qr;
                stopQRScanner();
                qrInstance.hide();
                applyFilter();
            }
        } catch (err) {
            console.warn("QR scan error:", err);
        }
    }, 400);
};

const stopQRScanner = () => {
    if (qrInterval) clearInterval(qrInterval);
    qrInterval = null;
    if (cameraStream) {
        cameraStream.getTracks().forEach((t) => t.stop());
        cameraStream = null;
    }
};
</script>


<style scoped>
.visitor-photo {
    width: 45px;
    height: 45px;
    position: relative;
}

.visitor-photo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.initials {
    width: 45px;
    height: 45px;
    font-size: 1rem;
}

.modal-content {
    border-radius: 10px;
}

.table-responsive::-webkit-scrollbar {
    width: 8px;
}

.table-responsive::-webkit-scrollbar-thumb {
    background-color: rgba(0, 0, 0, 0.15);
    border-radius: 4px;
}
</style>
