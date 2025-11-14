<template>
    <main class="main">
        <!-- Page Title & Breadcrumb -->
        <div class="page-title d-flex align-items-center justify-content-between">
            <nav aria-label="breadcrumb" class="flex-grow-1">
                <ol class="breadcrumb mb-0">
                    <li>
                        <h1 class="d-inline-block me-2">Invite Visitor</h1>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/dashboard">
                            <svg width="16" height="16" viewBox="0 0 17 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z"
                                    stroke="var(--bs-body-color)" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="var(--bs-body-color)"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            Home
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Invite Visitor</li>
                </ol>
            </nav>

            <!-- QR Scanner Icon button (small) -->
            <div class="ms-3">
                <button class="btn btn-outline-secondary btn-sm" @click="openQRScanner" title="Scan QR for visitor">
                    <i class="fa fa-qrcode me-1"></i>
                </button>
            </div>
        </div>

        <!-- Page Content -->
        <div class="container-fluid">
            <div class="row justify-content-center">
                <!-- Left Sidebar -->
                <div class="col-xl-3 col-md-4 mb-4">
                    <div class="card h-auto shadow-sm border-0">
                        <div class="card-body text-center py-5">
                            <!-- Avatar -->
                            <div class="avatar avatar-xl position-relative mx-auto">
                                <!-- If previewImage present show image; else initials -->
                                <img v-if="previewImage" :src="previewImage"
                                    class="w-100 h-100 rounded-circle object-fit-cover" alt="Avatar" />
                                <div v-else
                                    class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center mx-auto"
                                    style="width: 100px; height: 100px; font-size: 2rem;">
                                    {{ initials }}
                                </div>

                                <!-- Hidden file input -->
                                <input type="file" class="d-none" ref="fileInput" accept=".png,.jpg,.jpeg"
                                    @change="handleFileUpload" />

                                <!-- Camera button -->
                                <a href="javascript:void(0);"
                                    class="btn btn-square btn-primary btn-sm position-absolute bottom-0 end-0 shadow-sm rounded-circle border border-white"
                                    @click="openPhotoOptions" data-bs-toggle="tooltip" title="Upload or Capture Photo">
                                    <i class="fa fa-camera"></i>
                                </a>
                            </div>

                            <!-- Remove photo button (shows only when image exists) -->
                            <div class="mt-2">
                                <button v-if="previewImage" class="btn btn-sm btn-outline-danger" @click="removePhoto">
                                    <i class="fa fa-trash me-1"></i> Remove Photo
                                </button>
                            </div>

                            <!-- Basic Info -->
                            <div class="mt-3">
                                <h6 class="mb-0">{{ form.name || "New Visitor" }}</h6>
                                <span class="text-muted">{{ form.company || "No Company" }}</span>
                            </div>

                            <!-- Venues -->
                            <div class="mt-4 text-start small px-3">
                                <p class="fw-bold mb-1">📍 Venues:</p>
                                <ul class="list-unstyled ps-2 mb-0">
                                    <li v-if="form.venues && form.venues.length" v-for="(venue, i) in form.venues"
                                        :key="i">
                                        • {{ venue }}
                                    </li>
                                    <li v-else class="text-muted">No venues added</li>
                                </ul>
                            </div>
                        </div>

                        <!-- History & Badge -->
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item py-3">
                                <strong>📜 History:</strong>
                            <li v-if="form.movement_histories && form.movement_histories.length"
                                v-for="(m, i) in form.movement_histories" :key="i">
                                • {{ m.purpose || "Visit" }} -
                                {{ formatDate(m.checked_in_at || m.created_at) }}
                            </li>

                            <p v-else class="text-muted mt-2 mb-0">No history available</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between py-3">
                                <span>🎟️ Badge No</span>
                                <span>{{ form.badge_no || "---" }}</span>
                            </li>
                        </ul>

                        <div class="card-footer p-4">
                            <a href="javascript:void(0);" class="btn btn-primary w-100">View Visitors</a>
                        </div>
                    </div>
                </div>

                <!-- Right Section -->
                <div class="col-xl-9 col-md-8">
                    <div class="card shadow-sm border-0">
                        <div class="card-header">
                            <h6 class="card-title mb-0 fw-semibold">Visitor Invitation Form</h6>
                        </div>
                        <div class="card-body">
                            <!-- Search -->
                            <div class="mb-4">
                                <label class="form-label fw-bold">Search Visitor (Email / Phone / Company)</label>
                                <div class="input-group">
                                    <input v-model="searchQuery" class="form-control"
                                        placeholder="Enter email, phone, or company..." @input="onSearchInput"
                                        @keyup.enter.prevent="searchVisitor" @blur="searchVisitor" />
                                    <!-- manual search button removed -->
                                </div>
                                <small v-if="searchError" class="text-danger">{{ searchError }}</small>

                                <div v-if="searchResults.length" class="mt-3 border rounded p-2 bg-light">
                                    <p class="fw-bold mb-2">Select a visitor to re-invite:</p>
                                    <ul class="list-group">
                                        <li v-for="v in searchResults" :key="v.id"
                                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                                            @click="selectVisitor(v)" style="cursor: pointer">
                                            <div>
                                                <strong>{{ v.name }}</strong><br />
                                                <small class="text-muted">{{ v.email }} | {{ v.phone }}</small>
                                            </div>
                                            <span class="badge bg-primary">{{ v.company || "N/A" }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Form -->
                            <!-- Prevent Enter from submitting globally; Enter on venue input will add venue -->
                            <form @submit.prevent="inviteVisitor" @keydown.enter.prevent>
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <label class="form-label">Name *</label>
                                        <input v-model="form.name" class="form-control" required />
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label">Email </label>
                                        <input v-model="form.email" type="email" class="form-control" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label">Phone *</label>
                                        <input v-model="form.phone" class="form-control" required />
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label">Company *</label>
                                        <input v-model="form.company" class="form-control" required />
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label">Gender *</label>
                                        <select v-model="form.gender" class="form-select" required>
                                            <option disabled value="">Select gender</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                        </select>
                                    </div>

                                    <!-- Aadhaar added -->
                                    <div class="col-sm-6">
                                        <label class="form-label">Aadhaar Number *</label>
                                        <input v-model="form.aadhaar" class="form-control" inputmode="numeric"
                                            maxlength="12" required />
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Venues *</label>

                                        <!-- wrapper to hold input and inline badges -->
                                        <div class="venue-input-wrapper position-relative">
                                            <input v-model="venueInput" class="form-control"
                                                placeholder="Type a venue and press Enter"
                                                @keydown.enter.stop.prevent="addVenue" aria-label="venue input" />
                                            <!-- badges appear in the same wrapper, positioned below the input but visually attached -->
                                            <div class="venue-badges mt-2">
                                                <span v-for="(venue, i) in form.venues" :key="i"
                                                    class="badge bg-primary me-1 mb-1">
                                                    {{ venue }}
                                                    <button type="button" class="btn-close btn-close-white btn-sm ms-1"
                                                        @click="removeVenue(i)"></button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Purpose of Visit *</label>
                                        <textarea v-model="form.purpose" class="form-control" rows="3"
                                            required></textarea>
                                    </div>

                                    <!-- NEW: Meeting Date & Time & Remarks -->
                                    <div class="col-sm-6">
                                        <label class="form-label">Meeting Date *</label>
                                        <input v-model="form.meeting_date" type="date" class="form-control" required />
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label">Meeting Time *</label>
                                        <!-- use datetime-local for a full timestamp if you prefer,
                                             but backend expects meeting_time — using datetime-local keeps it unambiguous -->
                                        <input v-model="form.meeting_time" type="datetime-local" class="form-control"
                                            required />
                                    </div>
                                </div>

                                <div class="text-end mt-4">
                                    <button type="submit" class="btn btn-primary" :disabled="!isFormValid">
                                        <i class="fa fa-paper-plane me-1"></i>
                                        {{ form.id ? "Re-invite Visitor" : "Invite Visitor" }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 📷 Modal: Upload or Capture -->
        <div class="modal fade" id="photoOptionModal" tabindex="-1" ref="photoOptionModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 shadow">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title text-white">
                            <i class="fa fa-camera me-2 text-white"></i>
                            Choose Photo Option
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body text-center py-4">
                        <button class="btn btn-outline-primary w-100 mb-3" @click="triggerUpload">
                            <i class="fa fa-upload me-2"></i> Upload from Device
                        </button>
                        <button class="btn btn-outline-success w-100" @click="openCamera">
                            <i class="fa fa-video me-2"></i> Capture from Camera
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- 📸 Camera Modal (used for face capture & QR scanning) -->
        <div class="modal fade" id="cameraModal" tabindex="-1" ref="cameraModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 shadow">
                    <div :class="['modal-header', qrMode ? 'bg-info text-white' : 'bg-success text-white']">
                        <h5 class="modal-title">
                            <i :class="qrMode ? 'fa fa-qrcode me-2' : 'fa fa-video me-2'"></i>
                            {{ qrMode ? 'Scan QR' : 'Capture Photo' }}
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            @click="stopCamera"></button>
                    </div>
                    <div class="modal-body text-center">
                        <div class="position-relative d-inline-block w-100">
                            <video ref="video" autoplay playsinline class="border rounded w-100"></video>
                            <canvas ref="overlayCanvas" class="position-absolute top-0 start-0 w-100 h-100"></canvas>
                        </div>
                        <canvas ref="canvas" class="d-none"></canvas>

                        <div class="mt-3">
                            <small
                                :class="{ 'text-success': faceStatus === 'Face Detected ✅' || qrFound, 'text-danger': (faceStatus && faceStatus !== 'Face Detected ✅') && !qrFound }">
                                {{ qrMode ? (qrFound ? 'QR Found ✅' : (qrMessage || 'Scanning for QR...')) : faceStatus
                                }}
                            </small>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button class="btn btn-secondary" data-bs-dismiss="modal" @click="stopCamera">Close</button>
                        <div v-if="qrMode">
                            <button class="btn btn-info" @click="stopCamera">Done</button>
                        </div>
                        <div v-else>
                            <button class="btn btn-success" @click="capturePhoto" :disabled="!faceDetected">
                                <i class="fa fa-camera me-1"></i> Capture
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script setup>
/*
  Full updated script:
  - meeting_date / meeting_time / remarks handled
  - send to backend via FormData
  - selectVisitor populates meeting fields when available
*/

import { ref, computed, onMounted, watch } from "vue";
import { useForm } from "@inertiajs/vue3";
import axios from "axios";
import AppRoutes from "@/routes";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import * as faceapi from "face-api.js";

defineOptions({ layout: AdminLayout });

/* -------------------------
   Form data (Inertia useForm)
   ------------------------- */
const form = useForm({
    id: null,
    name: "",
    email: "",
    phone: "",
    company: "",
    purpose: "",
    badge_no: "",
    gender: "",
    aadhaar: "",
    venues: [],
    movement_histories: [], // read-only history shown in left panel
    photo: null,
    // NEW fields
    meeting_date: "",
    meeting_time: "",
    remarks: "",
});



/* --- UI / refs --- */
const searchQuery = ref("");
const searchResults = ref([]);
const searchError = ref("");
const previewImage = ref(null);
const venueInput = ref("");
const fileInput = ref(null);
const photoOptionModal = ref(null);
const cameraModal = ref(null);
const video = ref(null);
const canvas = ref(null);
const overlayCanvas = ref(null);

let cameraInstance = null;
let detectionInterval = null;
let searchDebounceTimer = null;

/* face/qr state */
const faceDetected = ref(false);
const faceStatus = ref("");
const currentBox = ref(null);
const qrMode = ref(false);
const qrFound = ref(false);
const qrMessage = ref("");
const qrData = ref(null);

/* QR barcode detector instance */
let barcodeDetector = null;



/* Load face-api.js models on mount */
onMounted(async () => {
    try {
        await Promise.all([
            faceapi.nets.tinyFaceDetector.loadFromUri("/models"),
            faceapi.nets.faceLandmark68Net.loadFromUri("/models"),
            faceapi.nets.faceRecognitionNet.loadFromUri("/models"),
        ]);
        console.log("✅ face-api.js models loaded");
    } catch (err) {
        console.error("❌ Failed to load face-api.js models", err);
    }

    if ("BarcodeDetector" in window) {
        try {
            const supportedFormats = await window.BarcodeDetector.getSupportedFormats();
            barcodeDetector = new window.BarcodeDetector({ formats: supportedFormats });
            console.log("BarcodeDetector ready:", supportedFormats);
        } catch (e) {
            console.warn("BarcodeDetector init failed", e);
            barcodeDetector = null;
        }
    } else {
        console.log("BarcodeDetector not available in this browser.");
    }

    if (cameraModal.value) {
        cameraModal.value.addEventListener?.("hidden.bs.modal", stopCamera);
    }
});

/* computed initials */
const initials = computed(() => {
    if (!form.name) return "V";
    const parts = form.name.split(" ");
    return parts.length > 1
        ? (parts[0][0] || "").toUpperCase() + (parts[1][0] || "").toUpperCase()
        : (parts[0][0] || "").toUpperCase();
});

/* -------------------------
   Photo upload / preview
   ------------------------- */
const openPhotoOptions = () => new bootstrap.Modal(photoOptionModal.value).show();

const triggerUpload = () => {
    bootstrap.Modal.getInstance(photoOptionModal.value).hide();
    fileInput.value.click();
};

const handleFileUpload = (e) => {
    const file = e.target.files[0];
    if (file) {
        form.photo = file;
        const reader = new FileReader();
        reader.onload = (event) => (previewImage.value = event.target.result);
        reader.readAsDataURL(file);
    }
};

const removePhoto = () => {
    form.photo = null;
    previewImage.value = null;
    if (fileInput.value) {
        fileInput.value.value = "";
    }
};

/* Fix backend relative path to absolute URL when we get `photo` from backend */
const fixPhotoUrl = (path) => {
    if (!path) return null;
    if (path.startsWith("http://") || path.startsWith("https://")) {
        return path;
    }
    if (path.startsWith("/")) {
        return window.location.origin + path;
    }
    return `${window.location.origin}/${path}`;
};

/* -------------------------
   Camera & face detection
   ------------------------- */
const openCamera = async () => {
    bootstrap.Modal.getInstance(photoOptionModal.value).hide();
    qrMode.value = false;
    const modal = new bootstrap.Modal(cameraModal.value);
    modal.show();

    faceDetected.value = false;
    faceStatus.value = "Initializing camera...";

    try {
        cameraInstance = await navigator.mediaDevices.getUserMedia({
            video: { facingMode: "user" },
            audio: false,
        });
        video.value.srcObject = cameraInstance;

        video.value.onloadedmetadata = () => {
            video.value.play();
            startFaceDetection();
        };
    } catch (err) {
        alert("Unable to access camera. Please allow permission.");
        faceStatus.value = "Camera access denied.";
    }
};

const updateOverlaySize = () => {
    const overlay = overlayCanvas.value;
    if (!video.value || !overlay) return;
    overlay.width = video.value.videoWidth || video.value.clientWidth;
    overlay.height = video.value.videoHeight || video.value.clientHeight;
    overlay.style.width = video.value.clientWidth + "px";
    overlay.style.height = video.value.clientHeight + "px";
};

const startFaceDetection = () => {
    if (detectionInterval) clearInterval(detectionInterval);
    const overlay = overlayCanvas.value;
    const context = overlay.getContext("2d");

    updateOverlaySize();
    window.addEventListener("resize", updateOverlaySize);

    detectionInterval = setInterval(async () => {
        try {
            if (!video.value || video.value.readyState < 2) return;
            const detections = await faceapi.detectAllFaces(
                video.value,
                new faceapi.TinyFaceDetectorOptions({ inputSize: 320, scoreThreshold: 0.45 })
            );

            context.clearRect(0, 0, overlay.width, overlay.height);

            if (detections.length > 0) {
                faceDetected.value = true;
                faceStatus.value = "Face Detected ✅";

                const biggestFace = detections.reduce((prev, curr) => {
                    const prevArea = prev.box.width * prev.box.height;
                    const currArea = curr.box.width * curr.box.height;
                    return currArea > prevArea ? curr : prev;
                });

                const { x, y, width, height } = biggestFace.box;

                const paddingX = width * 0.9;
                const paddingY = height * 1.2;

                const boxX = Math.max(x - paddingX / 2, 0);
                const boxY = Math.max(y - paddingY / 1.8, 0);
                const boxWidth = Math.min(width + paddingX, overlay.width - boxX);
                const boxHeight = Math.min(height + paddingY, overlay.height - boxY);

                currentBox.value = { x: boxX, y: boxY, width: boxWidth, height: boxHeight };

                context.beginPath();
                context.lineWidth = 4;
                context.strokeStyle = "rgba(0, 200, 0, 0.95)";
                roundRect(context, boxX, boxY, boxWidth, boxHeight, 10);
                context.stroke();

                context.fillStyle = "rgba(0, 200, 0, 0.10)";
                context.fillRect(boxX, boxY, boxWidth, boxHeight);
            } else {
                faceDetected.value = false;
                faceStatus.value = "No face detected ❌";
                currentBox.value = null;
            }
        } catch (err) {
            console.error("Error detecting face:", err);
            faceStatus.value = "Error detecting face.";
        }
    }, 250);
};

function roundRect(ctx, x, y, width, height, radius) {
    ctx.beginPath();
    ctx.moveTo(x + radius, y);
    ctx.arcTo(x + width, y, x + width, y + height, radius);
    ctx.arcTo(x + width, y + height, x, y + height, radius);
    ctx.arcTo(x, y + height, x, y, radius);
    ctx.arcTo(x, y, x + width, y, radius);
    ctx.closePath();
}

const capturePhoto = () => {
    if (!currentBox.value) return alert("No face box available to capture.");
    const v = video.value;
    const tmpCanvas = canvas.value;
    tmpCanvas.width = v.videoWidth;
    tmpCanvas.height = v.videoHeight;
    const ctx = tmpCanvas.getContext("2d");
    ctx.drawImage(v, 0, 0, tmpCanvas.width, tmpCanvas.height);

    const { x, y, width, height } = currentBox.value;
    const cropCanvas = document.createElement("canvas");
    cropCanvas.width = Math.round(width);
    cropCanvas.height = Math.round(height);
    const cropCtx = cropCanvas.getContext("2d");

    cropCtx.drawImage(
        tmpCanvas,
        Math.round(x),
        Math.round(y),
        Math.round(width),
        Math.round(height),
        0,
        0,
        Math.round(width),
        Math.round(height)
    );

    const dataUrl = cropCanvas.toDataURL("image/png");
    previewImage.value = dataUrl;

    const arr = dataUrl.split(",");
    const mime = arr[0].match(/:(.*?);/)[1];
    const bstr = atob(arr[1]);
    let n = bstr.length;
    const u8arr = new Uint8Array(n);
    while (n--) u8arr[n] = bstr.charCodeAt(n);
    form.photo = new File([u8arr], "visitor_photo.png", { type: mime });

    stopDetectionAndCamera();
    bootstrap.Modal.getInstance(cameraModal.value).hide();
};

function stopDetectionAndCamera() {
    if (detectionInterval) {
        clearInterval(detectionInterval);
        detectionInterval = null;
    }
    if (cameraInstance) {
        cameraInstance.getTracks().forEach((t) => t.stop());
        cameraInstance = null;
    }
}

/* -------------------------
   QR Scanner
   ------------------------- */
const openQRScanner = async () => {
    qrMode.value = true;
    qrFound.value = false;
    qrMessage.value = "Initializing QR scanner...";
    const modal = new bootstrap.Modal(cameraModal.value);
    modal.show();

    try {
        cameraInstance = await navigator.mediaDevices.getUserMedia({
            video: { facingMode: "environment" },
            audio: false,
        });
        video.value.srcObject = cameraInstance;
        video.value.onloadedmetadata = () => {
            video.value.play();
            startQRScanning();
        };
    } catch (e) {
        qrMessage.value = "Unable to access camera. Please allow permission.";
    }
};

const startQRScanning = () => {
    if (detectionInterval) clearInterval(detectionInterval);
    const overlay = overlayCanvas.value;
    const ctx = overlay.getContext("2d");

    updateOverlaySize();
    window.addEventListener("resize", updateOverlaySize);

    detectionInterval = setInterval(async () => {
        try {
            if (!video.value || video.value.readyState < 2) return;

            const tmpCanvas = canvas.value;
            tmpCanvas.width = video.value.videoWidth;
            tmpCanvas.height = video.value.videoHeight;
            const tmpCtx = tmpCanvas.getContext("2d");
            tmpCtx.drawImage(video.value, 0, 0, tmpCanvas.width, tmpCanvas.height);

            if (barcodeDetector) {
                try {
                    const detections = await barcodeDetector.detect(tmpCanvas);
                    if (detections && detections.length) {
                        qrFound.value = true;
                        qrMessage.value = "QR Found ✅";
                        qrData.value = detections[0].rawValue;
                        handleQRResult(qrData.value);
                        stopDetectionAndCamera();
                        bootstrap.Modal.getInstance(cameraModal.value).hide();
                        return;
                    } else {
                        qrMessage.value = "Scanning for QR...";
                    }
                } catch (err) {
                    console.warn("BarcodeDetector error:", err);
                }
            } else {
                ctx.clearRect(0, 0, overlay.width, overlay.height);
                ctx.fillStyle = "rgba(0,0,0,0.25)";
                ctx.fillRect(0, 0, overlay.width, overlay.height);
                ctx.fillStyle = "white";
                ctx.font = "14px sans-serif";
                ctx.fillText("BarcodeDetector not available in this browser.", 10, 20);
                qrMessage.value = "BarcodeDetector not available in this browser.";
            }
        } catch (err) {
            console.error("QR scan error:", err);
            qrMessage.value = "Error scanning QR";
        }
    }, 300);
};

const handleQRResult = (raw) => {
    try {
        const parsed = JSON.parse(raw);

        form.name = parsed.name || "";
        form.email = parsed.email || "";
        form.phone = parsed.phone || "";
        form.company = parsed.company || "";
        form.gender = parsed.gender || "";
        form.aadhaar = parsed.aadhaar || "";
        form.purpose = parsed.purpose || "";
        form.badge_no = parsed.badge_no || "";

        form.venues = Array.isArray(parsed.venues) ? parsed.venues : [];
        form.movement_histories = Array.isArray(parsed.movement_histories)
            ? parsed.movement_histories
            : [];

        // meeting fields from QR if present
        form.meeting_date = parsed.meeting_date || "";
        // if QR stored meeting_time as ISO, keep it; else try to combine fields if available
        form.meeting_time = parsed.meeting_time || parsed.meeting_datetime || "";

        form.remarks = parsed.remarks || "";

        // photo autofill
        if (parsed.photo_url) previewImage.value = fixPhotoUrl(parsed.photo_url);
    } catch (e) {
        // if not JSON, treat as search term
        searchQuery.value = raw;
        searchVisitor();
    }
};

/* stop camera / detection (used on modal close) */
const stopCamera = () => {
    stopDetectionAndCamera();
    qrMode.value = false;
    qrFound.value = false;
    qrMessage.value = "";
    try {
        bootstrap.Modal.getInstance(cameraModal.value)?.hide();
    } catch { }
};

/* -------------------------
   Venues handling
   ------------------------- */
const addVenue = () => {
    const val = (venueInput.value || "").trim();
    if (!val) return;
    if (!form.venues.includes(val)) {
        form.venues.push(val);
    }
    venueInput.value = "";
};

const removeVenue = (i) => form.venues.splice(i, 1);

/* -------------------------
   Search behavior
   ------------------------- */
const onSearchInput = () => {
    if (searchDebounceTimer) clearTimeout(searchDebounceTimer);
    searchDebounceTimer = setTimeout(() => {
        if (searchQuery.value && searchQuery.value.trim()) searchVisitor();
    }, 700);
};

const selectVisitor = (v) => {
    form.id = v.id || null;
    form.name = v.name || "";
    form.email = v.email || "";
    form.phone = v.phone || "";
    form.company = v.company || "";
    form.gender = v.gender || "";

    form.aadhaar =
        v.aadhaar ||
        v.aadhar ||
        v.aadhaar_no ||
        v.aadhar_no ||
        "";

    form.purpose =
        v.purpose ||
        v.purpose_of_visit ||
        "";

    form.badge_no = v.badge_no || v.badge || "";

    form.venues =
        Array.isArray(v.venues) ? [...v.venues] :
            Array.isArray(v.venue_list) ? [...v.venue_list] :
                [];

    form.movement_histories =
        Array.isArray(v.movement_histories) ? [...v.movement_histories] :
            Array.isArray(v.history) ? [...v.history] :
                [];

    // populate meeting fields if backend provides them
    form.meeting_date = v.meeting_date || "";
    form.meeting_time = v.meeting_time || "";
    form.remarks = v.remarks || "";

    const photo =
        v.photo_url ||
        v.photo ||
        v.image ||
        v.image_url ||
        v.profile_photo ||
        v.profile_photo_url ||
        v.avatar ||
        "";

    if (photo) {
        previewImage.value = fixPhotoUrl(photo);
        form.photo = null;
    } else {
        previewImage.value = null;
    }

    searchResults.value = [];
};

const searchVisitor = async () => {
    searchError.value = "";
    searchResults.value = [];

    if (!searchQuery.value.trim()) {
        searchError.value = "Please enter email, phone, or company.";
        return;
    }

    try {
        const res = await axios.post(AppRoutes.visitor.search, {
            query: searchQuery.value.trim(),
        });

        if (res.data.visitor) {
            selectVisitor(res.data.visitor);
            return;
        }

        if (Array.isArray(res.data.visitors) && res.data.visitors.length) {
            searchResults.value = res.data.visitors;
            return;
        }

        if (Array.isArray(res.data.data) && res.data.data.length) {
            searchResults.value = res.data.data;
            return;
        }

        searchError.value = "No existing record found.";
    } catch (err) {
        console.error(err);
        searchError.value = "Error occurred while searching.";
    }
};

/* -------------------------
   Form validation & invite
   ------------------------- */
const isFormValid = computed(() => {
    return (
        form.name &&
        form.phone &&
        form.company &&
        form.gender &&
        form.aadhaar &&
        form.purpose &&
        form.meeting_date &&
        form.meeting_time
    );
});

const inviteVisitor = async () => {
    if (!isFormValid.value) {
        alert("Please fill all required fields (including meeting date/time and at least one venue).");
        return;
    }

    const data = new FormData();
    data.append("name", form.name ?? "");
    data.append("email", form.email ?? "");
    data.append("phone", form.phone ?? "");
    data.append("company", form.company ?? "");
    data.append("purpose", form.purpose ?? "");
    data.append("badge_no", form.badge_no ?? "");
    data.append("gender", form.gender ?? "");
    data.append("aadhaar", form.aadhaar ?? "");

    // NEW meeting fields
    data.append("meeting_date", form.meeting_date ?? "");
    // meeting_time send as ISO-ish string from datetime-local input (backend expects a datetime)
    data.append("meeting_time", form.meeting_time ?? "");
    data.append("remarks", form.remarks ?? "");

    // include movement_histories only for reference (optional)
    data.append("movement_histories", JSON.stringify(form.movement_histories || []));

    if (form.photo instanceof File) {
        data.append("photo", form.photo);
    } else if (previewImage.value && !form.photo) {
        // if your backend supports `photo_url` you can send previewImage (absolute URL)
        // data.append("photo_url", previewImage.value);
    }

    const route = form.id ? AppRoutes.visitor.reinvite(form.id) : AppRoutes.visitor.invite;

    try {
        const res = await axios.post(route, data);
        alert(res.data.message || "Visitor invited successfully!");
        // reset form to initial values
        form.reset({
            id: null,
            name: "",
            email: "",
            phone: "",
            company: "",
            purpose: "",
            badge_no: "",
            gender: "",
            aadhaar: "",
            movement_histories: [],
            photo: null,
            meeting_date: "",
            meeting_time: "",
        });
        previewImage.value = null;
        venueInput.value = "";
    } catch (err) {
        console.error(err);
        alert("Something went wrong while inviting visitor.");
    }
    console.log(this.FormData);

};

/* helper: format date for history display */
const formatDate = (d) => {
    try {
        if (!d) return "";
        const dt = new Date(d);
        if (isNaN(dt.getTime())) return d;
        return dt.toLocaleDateString("en-IN");
    } catch {
        return d;
    }
};

/* ensure stop on unmount (safe) */
onMounted(() => {
    if (cameraModal.value) {
        cameraModal.value.addEventListener?.("hidden.bs.modal", stopCamera);
    }
});
</script>

<style scoped>
.card-title {
    font-weight: 600;
}

/* Ensure venue badges appear attached to the input wrapper and wrap neatly */
.venue-input-wrapper {
    display: block;
}

.venue-badges {
    display: flex;
    flex-wrap: wrap;
    gap: 0.25rem;
    margin-top: 0.35rem;
}

/* smaller QR button styling aligning with page header */
.page-title .btn[title="Scan QR for visitor"] {
    height: 36px;
    width: 36px;
    padding: 0;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

/* ensure overlay canvas sits exactly over video */
video+canvas {
    pointer-events: none;
}
</style>
