<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
defineOptions({ layout: AdminLayout })
</script>

<template>
    
            <!-- Start - Page Title & Breadcrumb -->
            <div class="page-title">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li>
                            <h1>Dashboard</h1>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="index.html">
								<svg width="16" height="16" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="var(--bs-body-color)" stroke-linecap="round" stroke-linejoin="round"/>
									<path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="var(--bs-body-color)" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
								Home
							</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard 2</li>
                    </ol>
                </nav>
            </div>
            <!-- End - Page Title & Breadcrumb -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-7 col-xxl-6">
                        <div class="row">

                            <!-- Start - Not Finished Tasks -->
                            <div class="col-xl-6 col-sm-6">
                                <div class="card bg-primary">
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <div>
                                            <h3 class="text-white fs-2 fw-semibold m-0">20</h3>
                                            <h6 class="text-white">Tasks Not Finisheds</h6>
                                        </div>
                                        <div>
                                            <div class="d-flex justify-content-between mb-2">
                                                <p class="mb-0 text-white">Complete Task</p>
                                                <p class="mb-0 text-white">20/28</p>
                                            </div>
                                            <div class="bg-gray">
                                                <div class="progress-bar bg-white" style="width:50%; height:5px; border-radius:4px;" role="progressbar"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End - Not Finished Tasks -->

                            <!-- Start - Total Deposit -->
                            <div class="col-xl-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <h3 class="d-flex align-items-center m-0 justify-content-between fs-2 fw-semibold">
                                                $2,000
                                                <span class="badge bg-success-subtle text-success ms-2 border border-1 border-success-subtle">
													<i class="fa-solid fa-arrow-up me-2"></i>5.2%
												</span>
                                            </h3>
                                            <h6>Total Deposit</h6>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div id="AllProject_rate"></div>
                                                <ul>
                                                    <li>
                                                        <h6>All Projects</h6>
                                                    </li>
                                                    <li>
                                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect width="10" height="10" rx="3" fill="#3AC977"/>
														</svg> Complete
                                                    </li>
                                                    <li>
                                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect width="10" height="10" rx="3" fill="var(--bs-primary)"/>
														</svg> Pending
                                                    </li>
                                                    <li>
                                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect width="10" height="10" rx="3" fill="var(--bs-secondary)"/>
														</svg> Not Start
                                                    </li>
                                                </ul>
                                            </div>
                                            <ul>
                                                <li>$500</li>
                                                <li>$200</li>
                                                <li>$560</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End - Total Deposit -->

                            <!-- Start - Revenue -->
                            <div class="col-xl-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <div>
                                            <h6 class="mb-0">Revenue</h6>
                                            <h3 class="fs-2 fw-semibold"><small>$</small>310.435</h3>
                                        </div>
                                        <div>
                                            <span class="d-block text-black mb-1">Our Star</span>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-list avatar-list-stacked">
                                                    <img src="assets/images/contacts/pic666.jpg" class="avatar avatar-xs rounded-circle" alt="">
                                                    <img src="assets/images/contacts/pic555.jpg" class="avatar avatar-xs rounded-circle" alt="">
                                                    <img src="assets/images/contacts/pic1.jpg" class="avatar avatar-xs rounded-circle" alt="">
                                                    <span class="avatar avatar-xs rounded-circle bg-primary text-white">P</span>
                                                    <img src="assets/images/contacts/pic666.jpg" class="avatar avatar-xs rounded-circle" alt="">
                                                    <span class="avatar avatar-xs rounded-circle bg-danger text-white">H</span>
                                                </div>
                                                <a href="javascript:void(0)" class="ms-2">21+ Team</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End - Revenue -->

                            <!-- Start - UI/UX Design -->
                            <div class="col-xl-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <img src="assets/images/uidesgn.png" class="avatar avatar-lg" alt="">
                                        </div>
                                        <div>
                                            <h6>UI/UX Design</h6>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                            <a href="javascript:void(0);" class="btn btn-primary btn-sm">Learn More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End - UI/UX Design -->

                        </div>
                    </div>

                    <!-- Start - Upgrade Your Plan -->
                    <div class="col-xl-5 col-xxl-6">
                        <div class="card">
                            <div class="card-header border-0">
                                <h5 class="mb-0">Upgrade Your Plan</h5>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="assets/images/items.png" alt="">
                                </div>
                                <h4>Enviroment with Pro Plan for Free</h4>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal1">Upgrade</button>
                            </div>
                        </div>
                    </div>
                    <!-- End - Upgrade Your Plan -->

                    <!-- Start - Literay Success -->
                    <div class="col-xl-12 col-xxl-6">
                        <div class="card">
                            <div class="card-header border-0 pb-0 flex-wrap pt-4">
                                <h4 class="fs-16mb-0">Literary success</h4>
                            </div>
                            <div class="card-body px-0 pt-0">
                                <nav class="ps-3 pb-2">
                                    <div class="nav nav-tabs-outline nav-outline-dashed" id="nav-tab" role="tablist">
                                        <button class="nav-link border-2 active mw-80" data-series="social" id="pills-social-tab" data-bs-toggle="pill" data-bs-target="#pills-social" type="button" role="tab" aria-selected="true">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24"></polygon>
													<path d="M16.5,4.5 C14.8905,4.5 13.00825,6.32463215 12,7.5 C10.99175,6.32463215 9.1095,4.5 7.5,4.5 C4.651,4.5 3,6.72217984 3,9.55040872 C3,12.6834696 6,16 12,19.5 C18,16 21,12.75 21,9.75 C21,6.92177112 19.349,4.5 16.5,4.5 Z" fill="var(--bs-dark)" fill-rule="nonzero" opacity="0.3"></path>
													<path d="M12,19.5 C6,16 3,12.6834696 3,9.55040872 C3,6.72217984 4.651,4.5 7.5,4.5 C9.1095,4.5 10.99175,6.32463215 12,7.5 L12,19.5 Z" fill="var(--bs-dark)" fill-rule="nonzero"></path>
												</g>
											</svg>
											<span class="d-block fw-semibold">Social</span>
										</button>
                                        <button class="nav-link border-2 mw-80" data-series="project" id="pills-project-tab" data-bs-toggle="pill" data-bs-target="#pills-project" type="button" role="tab" aria-selected="false">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<path d="M5.84026576,8 L18.1597342,8 C19.1999115,8 20.0664437,8.79732479 20.1528258,9.83390904 L20.8194924,17.833909 C20.9112219,18.9346631 20.0932459,19.901362 18.9924919,19.9930915 C18.9372479,19.9976952 18.8818364,20 18.8264009,20 L5.1735991,20 C4.0690296,20 3.1735991,19.1045695 3.1735991,18 C3.1735991,17.9445645 3.17590391,17.889153 3.18050758,17.833909 L3.84717425,9.83390904 C3.93355627,8.79732479 4.80008849,8 5.84026576,8 Z M10.5,10 C10.2238576,10 10,10.2238576 10,10.5 L10,11.5 C10,11.7761424 10.2238576,12 10.5,12 L13.5,12 C13.7761424,12 14,11.7761424 14,11.5 L14,10.5 C14,10.2238576 13.7761424,10 13.5,10 L10.5,10 Z" fill="var(--bs-dark)"></path>
													<path d="M10,8 L8,8 L8,7 C8,5.34314575 9.34314575,4 11,4 L13,4 C14.6568542,4 16,5.34314575 16,7 L16,8 L14,8 L14,7 C14,6.44771525 13.5522847,6 13,6 L11,6 C10.4477153,6 10,6.44771525 10,7 L10,8 Z" fill="var(--bs-dark)" fill-rule="nonzero" opacity="0.3"></path>
												</g>
											</svg>
											<span class="d-block fw-semibold">Project</span>
										</button>
                                        <button class="nav-link border-2 mw-80" data-series="sale" id="pills-sale-tab" data-bs-toggle="pill" data-bs-target="#pills-sale" type="button" role="tab" aria-selected="false">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="var(--bs-dark)" fill-rule="nonzero"></path>
													<path d="M8.7295372,14.6839411 C8.35180695,15.0868534 7.71897114,15.1072675 7.31605887,14.7295372 C6.9131466,14.3518069 6.89273254,13.7189711 7.2704628,13.3160589 L11.0204628,9.31605887 C11.3857725,8.92639521 11.9928179,8.89260288 12.3991193,9.23931335 L15.358855,11.7649545 L19.2151172,6.88035571 C19.5573373,6.44687693 20.1861655,6.37289714 20.6196443,6.71511723 C21.0531231,7.05733733 21.1271029,7.68616551 20.7848828,8.11964429 L16.2848828,13.8196443 C15.9333973,14.2648593 15.2823707,14.3288915 14.8508807,13.9606866 L11.8268294,11.3801628 L8.7295372,14.6839411 Z" fill="var(--bs-dark)" fill-rule="nonzero" opacity="0.3" transform="translate(14.000019, 10.749981) scale(1, -1) translate(-14.000019, -10.749981) "></path>
												</g>
											</svg>
											<span class="d-block fw-semibold">Sale</span>
										</button>
                                        <button class="nav-link border-2 mw-80" data-series="all" id="pills-mobile-tab" data-bs-toggle="pill" data-bs-target="#pills-mobile" type="button" role="tab" aria-selected="false">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<path d="M8,2.5 C7.30964406,2.5 6.75,3.05964406 6.75,3.75 L6.75,20.25 C6.75,20.9403559 7.30964406,21.5 8,21.5 L16,21.5 C16.6903559,21.5 17.25,20.9403559 17.25,20.25 L17.25,3.75 C17.25,3.05964406 16.6903559,2.5 16,2.5 L8,2.5 Z" fill="var(--bs-dark)" opacity="0.3"></path>
													<path d="M8,2.5 C7.30964406,2.5 6.75,3.05964406 6.75,3.75 L6.75,20.25 C6.75,20.9403559 7.30964406,21.5 8,21.5 L16,21.5 C16.6903559,21.5 17.25,20.9403559 17.25,20.25 L17.25,3.75 C17.25,3.05964406 16.6903559,2.5 16,2.5 L8,2.5 Z M8,1 L16,1 C17.5187831,1 18.75,2.23121694 18.75,3.75 L18.75,20.25 C18.75,21.7687831 17.5187831,23 16,23 L8,23 C6.48121694,23 5.25,21.7687831 5.25,20.25 L5.25,3.75 C5.25,2.23121694 6.48121694,1 8,1 Z M9.5,1.75 L14.5,1.75 C14.7761424,1.75 15,1.97385763 15,2.25 L15,3.25 C15,3.52614237 14.7761424,3.75 14.5,3.75 L9.5,3.75 C9.22385763,3.75 9,3.52614237 9,3.25 L9,2.25 C9,1.97385763 9.22385763,1.75 9.5,1.75 Z" fill="var(--bs-dark)" fill-rule="nonzero"></path>
												</g>
											</svg>
											<span class="d-block fw-semibold">Mobile</span>
										</button>
                                        <button class="nav-link border-2 mw-80" data-series="all" id="pills-all1-tab" data-bs-toggle="pill" data-bs-target="#pills-all1" type="button" role="tab" aria-selected="false">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="var(--bs-dark)" opacity="0.3"></path>
													<path d="M14.35,10.5 C13.54525,10.5 12.604125,11.4123161 12.1,12 C11.595875,11.4123161 10.65475,10.5 9.85,10.5 C8.4255,10.5 7.6,11.6110899 7.6,13.0252044 C7.6,14.5917348 9.1,16.25 12.1,18 C15.1,16.25 16.6,14.625 16.6,13.125 C16.6,11.7108856 15.7745,10.5 14.35,10.5 Z" fill="var(--bs-dark)" fill-rule="nonzero" opacity="0.3"></path>
												</g>
											</svg>
											<span class="d-block fw-semibold">All</span>
										</button>
                                    </div>
                                </nav>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-social" role="tabpanel" aria-labelledby="pills-social-tab">
                                        <div class="table-responsive">
                                            <table class="table mb-0 card-table border-no success-tbl table-bottom-borderless">
                                                <thead class="table-primary">
                                                    <tr>
                                                        <th class="fw-medium text-primary text-uppercase ps-4 py-2" style="font-size: 13px;">Name</th>
                                                        <th class="fw-medium text-primary text-uppercase py-2" style="font-size: 13px;">Avg.</th>
                                                        <th class="fw-medium text-primary text-uppercase py-2" style="font-size: 13px;">Growth</th>
                                                        <th class="fw-medium text-primary text-uppercase py-2" style="font-size: 13px;">View</th>
                                                        <th class="fw-medium text-primary text-uppercase py-2" style="font-size: 13px;">status</th>
                                                        <th class="fw-medium text-primary text-uppercase py-2" style="font-size: 13px;">action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img src="assets/images/contacts/pic1.jpg" class="avatar avatar-sm" alt="">
                                                                <div class="ms-2 cat-name">
                                                                    <p class="mb-0">Liam Risher</p>
                                                                    <span>Span</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>66.99%</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="peity-line2" data-width="100%">8,4,5,9,5,3,5,7,5</span>
                                                            </div>
                                                        </td>
                                                        <td>66.99%</td>
                                                        <td><span class="badge badge-sm badge-primary light">Inprogress</span></td>
                                                        <td>
                                                            <div class="dropdown c-pointer">
                                                                <div class="btn-link" data-bs-toggle="dropdown">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
                                                                </div>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img src="assets/images/contacts/pic2.jpg" class="avatar avatar-sm" alt="">
                                                                <div class="ms-2 cat-name">
                                                                    <p class="mb-0">Oliver Noah</p>
                                                                    <span>USA</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>78.89%</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="peity-line" data-width="100%">8,4,5,9,5,3,5,7,5</span>
                                                            </div>
                                                        </td>
                                                        <td>78.39.99%</td>
                                                        <td><span class="badge badge-sm badge-success light">Completed</span></td>
                                                        <td>
                                                            <div class="dropdown c-pointer">
                                                                <div class="btn-link" data-bs-toggle="dropdown">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
                                                                </div>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img src="assets/images/contacts/pic888.jpg" class="avatar avatar-sm" alt="">
                                                                <div class="ms-2 cat-name">
                                                                    <p class="mb-0">Elijah James</p>
                                                                    <span>NYC</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>59.879%</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="peity-line2" data-width="100%">8,4,5,9,5,3,5,7,5</span>
                                                            </div>
                                                        </td>
                                                        <td>69.99%</td>
                                                        <td><span class="badge badge-sm badge-primary light">Inprogress</span></td>
                                                        <td>
                                                            <div class="dropdown c-pointer">
                                                                <div class="btn-link" data-bs-toggle="dropdown">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
                                                                </div>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img src="assets/images/contacts/pic2.jpg" class="avatar avatar-sm" alt="">
                                                                <div class="ms-2 cat-name">
                                                                    <p class="mb-0">Oliver Noah</p>
                                                                    <span>USA</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>78.89%</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="peity-line3" data-width="100%">8,4,5,9,5,3,5,7,5</span>
                                                            </div>
                                                        </td>
                                                        <td>78.39.99%</td>
                                                        <td><span class="badge badge-sm badge-success light">Completed</span></td>
                                                        <td>
                                                            <div class="dropdown c-pointer">
                                                                <div class="btn-link" data-bs-toggle="dropdown">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
                                                                </div>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-project" role="tabpanel" aria-labelledby="pills-project-tab">
                                        <div class="table-responsive">
                                            <table class="table m-0 card-table border-no success-tbl table-bottom-borderless">
                                                <thead class="table-primary">
                                                    <tr>
                                                        <th class="fw-medium text-primary text-uppercase ps-4 py-2" style="font-size: 13px;">Name</th>
                                                        <th class="fw-medium text-primary text-uppercase py-2" style="font-size: 13px;">Avg.</th>
                                                        <th class="fw-medium text-primary text-uppercase py-2" style="font-size: 13px;">Growth</th>
                                                        <th class="fw-medium text-primary text-uppercase py-2" style="font-size: 13px;">View</th>
                                                        <th class="fw-medium text-primary text-uppercase py-2" style="font-size: 13px;">status</th>
                                                        <th class="fw-medium text-primary text-uppercase py-2" style="font-size: 13px;">action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img src="assets/images/contacts/pic1.jpg" class="avatar avatar-sm" alt="">
                                                                <div class="ms-2 cat-name">
                                                                    <p class="mb-0">Liam Risher</p>
                                                                    <span>Span</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>66.99%</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="peity-line2" data-width="100%">8,4,5,9,5,3,5,7,5</span>
                                                            </div>
                                                        </td>
                                                        <td>66.99%</td>
                                                        <td><span class="badge badge-sm badge-primary light">Inprogress</span></td>
                                                        <td>
                                                            <div class="dropdown c-pointer">
                                                                <div class="btn-link" data-bs-toggle="dropdown">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
                                                                </div>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img src="assets/images/contacts/pic3.jpg" class="avatar avatar-sm" alt="">
                                                                <div class="ms-2 cat-name">
                                                                    <p class="mb-0">Oliver Noah</p>
                                                                    <span>USA</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="avg">78.89%</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="peity-line" data-width="100%">8,4,5,9,5,3,5,7,5</span>
                                                            </div>
                                                        </td>
                                                        <td class="avg">78.39.99%</td>
                                                        <td><span class="badge badge-sm badge-success light">Completed</span></td>
                                                        <td>
                                                            <div class="dropdown c-pointer">
                                                                <div class="btn-link" data-bs-toggle="dropdown">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
                                                                </div>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img src="assets/images/contacts/pic888.jpg" class="avatar avatar-sm " alt="">
                                                                <div class="ms-2 cat-name">
                                                                    <p class="mb-0">Elijah James</p>
                                                                    <span>NYC</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="avg">59.879%</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="peity-line2" data-width="100%">8,4,5,9,5,3,5,7,5</span>
                                                            </div>
                                                        </td>
                                                        <td class="avg">69.99%</td>
                                                        <td><span class="badge badge-sm badge-primary light">Inprogress</span></td>
                                                        <td>
                                                            <div class="dropdown c-pointer">
                                                                <div class="btn-link" data-bs-toggle="dropdown">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
                                                                </div>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img src="assets/images/contacts/pic1.jpg" class="avatar avatar-sm" alt="">
                                                                <div class="ms-2 cat-name">
                                                                    <p class="mb-0">Oliver Noah</p>
                                                                    <span>USA</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="avg">78.89%</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="peity-line3" data-width="100%">8,4,5,9,5,3,5,7,5</span>
                                                            </div>
                                                        </td>
                                                        <td class="avg">78.39.99%</td>
                                                        <td><span class="badge badge-sm badge-success light">Completed</span></td>
                                                        <td>
                                                            <div class="dropdown c-pointer">
                                                                <div class="btn-link" data-bs-toggle="dropdown">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
                                                                </div>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-sale" role="tabpanel" aria-labelledby="pills-sale-tab">
                                        <div class="table-responsive">
                                            <table class="table m-0 card-table border-no success-tbl table-bottom-borderless">
                                                <thead class="table-primary">
                                                    <tr>
                                                        <th class="fw-medium text-primary text-uppercase ps-4 py-2" style="font-size: 13px;">Name</th>
                                                        <th class="fw-medium text-primary text-uppercase py-2" style="font-size: 13px;">Avg.</th>
                                                        <th class="fw-medium text-primary text-uppercase py-2" style="font-size: 13px;">Growth</th>
                                                        <th class="fw-medium text-primary text-uppercase py-2" style="font-size: 13px;">View</th>
                                                        <th class="fw-medium text-primary text-uppercase py-2" style="font-size: 13px;">status</th>
                                                        <th class="fw-medium text-primary text-uppercase py-2" style="font-size: 13px;">action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img src="assets/images/contacts/pic1.jpg" class="avatar avatar-sm" alt="">
                                                                <div class="ms-2 cat-name">
                                                                    <p class="mb-0">Liam Risher</p>
                                                                    <span>Span</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>66.99%</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="peity-line2" data-width="100%">8,4,5,9,5,3,5,7,5</span>
                                                            </div>
                                                        </td>
                                                        <td>66.99%</td>
                                                        <td><span class="badge badge-sm badge-primary light">Inprogress</span></td>
                                                        <td>
                                                            <div class="dropdown c-pointer">
                                                                <div class="btn-link" data-bs-toggle="dropdown">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
                                                                </div>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img src="assets/images/contacts/pic2.jpg" class="avatar avatar-sm" alt="">
                                                                <div class="ms-2 cat-name">
                                                                    <p class="mb-0">Oliver Noah</p>
                                                                    <span>USA</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>78.89%</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="peity-line" data-width="100%">8,4,5,9,5,3,5,7,5</span>
                                                            </div>
                                                        </td>
                                                        <td>78.39.99%</td>
                                                        <td><span class="badge badge-sm badge-success light">Completed</span></td>
                                                        <td>
                                                            <div class="dropdown c-pointer">
                                                                <div class="btn-link" data-bs-toggle="dropdown">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
                                                                </div>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img src="assets/images/contacts/pic888.jpg" class="avatar avatar-sm" alt="">
                                                                <div class="ms-2 cat-name">
                                                                    <p class="mb-0">Elijah James</p>
                                                                    <span>NYC</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>59.879%</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="peity-line2" data-width="100%">8,4,5,9,5,3,5,7,5</span>
                                                            </div>
                                                        </td>
                                                        <td>69.99%</td>
                                                        <td><span class="badge badge-sm badge-primary light">Inprogress</span></td>
                                                        <td>
                                                            <div class="dropdown c-pointer">
                                                                <div class="btn-link" data-bs-toggle="dropdown">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
                                                                </div>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img src="assets/images/contacts/pic2.jpg" class="avatar avatar-sm" alt="">
                                                                <div class="ms-2 cat-name">
                                                                    <p class="mb-0">Oliver Noah</p>
                                                                    <span>USA</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>78.89%</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="peity-line3" data-width="100%">8,4,5,9,5,3,5,7,5</span>
                                                            </div>
                                                        </td>
                                                        <td>78.39.99%</td>
                                                        <td><span class="badge badge-sm badge-success light">Completed</span></td>
                                                        <td>
                                                            <div class="dropdown c-pointer">
                                                                <div class="btn-link" data-bs-toggle="dropdown">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
                                                                </div>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-mobile" role="tabpanel" aria-labelledby="pills-mobile-tab">
                                        <div class="table-responsive">
                                            <table class="table m-0 card-table border-no success-tbl table-bottom-borderless">
                                                <thead class="table-primary">
                                                    <tr>
                                                        <th class="fw-medium text-primary text-uppercase ps-4 py-2" style="font-size: 13px;">Name</th>
                                                        <th class="fw-medium text-primary text-uppercase py-2" style="font-size: 13px;">Avg.</th>
                                                        <th class="fw-medium text-primary text-uppercase py-2" style="font-size: 13px;">Growth</th>
                                                        <th class="fw-medium text-primary text-uppercase py-2" style="font-size: 13px;">View</th>
                                                        <th class="fw-medium text-primary text-uppercase py-2" style="font-size: 13px;">status</th>
                                                        <th class="fw-medium text-primary text-uppercase py-2" style="font-size: 13px;">action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img src="assets/images/contacts/pic1.jpg" class="avatar avatar-sm" alt="">
                                                                <div class="ms-2 cat-name">
                                                                    <p class="mb-0">Liam Risher</p>
                                                                    <span>Span</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>66.99%</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="peity-line2" data-width="100%">8,4,5,9,5,3,5,7,5</span>
                                                            </div>
                                                        </td>
                                                        <td>66.99%</td>
                                                        <td><span class="badge badge-sm badge-primary light">Inprogress</span></td>
                                                        <td>
                                                            <div class="dropdown c-pointer">
                                                                <div class="btn-link" data-bs-toggle="dropdown">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
                                                                </div>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img src="assets/images/contacts/pic2.jpg" class="avatar avatar-sm" alt="">
                                                                <div class="ms-2 cat-name">
                                                                    <p class="mb-0">Oliver Noah</p>
                                                                    <span>USA</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>78.89%</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="peity-line" data-width="100%">8,4,5,9,5,3,5,7,5</span>
                                                            </div>
                                                        </td>
                                                        <td>78.39.99%</td>
                                                        <td><span class="badge badge-sm badge-success light">Completed</span></td>
                                                        <td>
                                                            <div class="dropdown c-pointer">
                                                                <div class="btn-link" data-bs-toggle="dropdown">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
                                                                </div>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img src="assets/images/contacts/pic888.jpg" class="avatar avatar-sm" alt="">
                                                                <div class="ms-2 cat-name">
                                                                    <p class="mb-0">Elijah James</p>
                                                                    <span>NYC</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>59.879%</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="peity-line2" data-width="100%">8,4,5,9,5,3,5,7,5</span>
                                                            </div>
                                                        </td>
                                                        <td>69.99%</td>
                                                        <td><span class="badge badge-sm badge-primary light">Inprogress</span></td>
                                                        <td>
                                                            <div class="dropdown c-pointer">
                                                                <div class="btn-link" data-bs-toggle="dropdown">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
                                                                </div>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img src="assets/images/contacts/pic2.jpg" class="avatar avatar-sm" alt="">
                                                                <div class="ms-2 cat-name">
                                                                    <p class="mb-0">Oliver Noah</p>
                                                                    <span>USA</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>78.89%</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="peity-line3" data-width="100%">8,4,5,9,5,3,5,7,5</span>
                                                            </div>
                                                        </td>
                                                        <td>78.39.99%</td>
                                                        <td><span class="badge badge-sm badge-success light">Completed</span></td>
                                                        <td>
                                                            <div class="dropdown c-pointer">
                                                                <div class="btn-link" data-bs-toggle="dropdown">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
                                                                </div>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-all1" role="tabpanel" aria-labelledby="pills-all1-tab">
                                        <div class="table-responsive">
                                            <table class="table m-0 card-table border-no success-tbl table-bottom-borderless">
                                                <thead class="table-primary">
                                                    <tr>
                                                        <th class="fw-medium text-primary text-uppercase ps-4 py-2" style="font-size: 13px;">Name</th>
                                                        <th class="fw-medium text-primary text-uppercase py-2" style="font-size: 13px;">Avg.</th>
                                                        <th class="fw-medium text-primary text-uppercase py-2" style="font-size: 13px;">Growth</th>
                                                        <th class="fw-medium text-primary text-uppercase py-2" style="font-size: 13px;">View</th>
                                                        <th class="fw-medium text-primary text-uppercase py-2" style="font-size: 13px;">status</th>
                                                        <th class="fw-medium text-primary text-uppercase py-2" style="font-size: 13px;">action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img src="assets/images/contacts/pic1.jpg" class="avatar avatar-sm" alt="">
                                                                <div class="ms-2 cat-name">
                                                                    <p class="mb-0">Liam Risher</p>
                                                                    <span>Span</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>66.99%</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="peity-line2" data-width="100%">8,4,5,9,5,3,5,7,5</span>
                                                            </div>
                                                        </td>
                                                        <td>66.99%</td>
                                                        <td><span class="badge badge-sm badge-primary light">Inprogress</span></td>
                                                        <td>
                                                            <div class="dropdown c-pointer">
                                                                <div class="btn-link" data-bs-toggle="dropdown">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
                                                                </div>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img src="assets/images/contacts/pic2.jpg" class="avatar avatar-sm" alt="">
                                                                <div class="ms-2 cat-name">
                                                                    <p class="mb-0">Oliver Noah</p>
                                                                    <span>USA</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>78.89%</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="peity-line" data-width="100%">8,4,5,9,5,3,5,7,5</span>
                                                            </div>
                                                        </td>
                                                        <td>78.39.99%</td>
                                                        <td><span class="badge badge-sm badge-success light">Completed</span></td>
                                                        <td>
                                                            <div class="dropdown c-pointer">
                                                                <div class="btn-link" data-bs-toggle="dropdown">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
                                                                </div>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img src="assets/images/contacts/pic888.jpg" class="avatar avatar-sm" alt="">
                                                                <div class="ms-2 cat-name">
                                                                    <p class="mb-0">Elijah James</p>
                                                                    <span>NYC</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>59.879%</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="peity-line2" data-width="100%">8,4,5,9,5,3,5,7,5</span>
                                                            </div>
                                                        </td>
                                                        <td>69.99%</td>
                                                        <td><span class="badge badge-sm badge-primary light">Inprogress</span></td>
                                                        <td>
                                                            <div class="dropdown c-pointer">
                                                                <div class="btn-link" data-bs-toggle="dropdown">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
                                                                </div>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img src="assets/images/contacts/pic2.jpg" class="avatar avatar-sm" alt="">
                                                                <div class="ms-2 cat-name">
                                                                    <p class="mb-0">Oliver Noah</p>
                                                                    <span>USA</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>78.89%</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="peity-line3" data-width="100%">8,4,5,9,5,3,5,7,5</span>
                                                            </div>
                                                        </td>
                                                        <td>78.39.99%</td>
                                                        <td><span class="badge badge-sm badge-success light">Completed</span></td>
                                                        <td>
                                                            <div class="dropdown c-pointer">
                                                                <div class="btn-link" data-bs-toggle="dropdown">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																		<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	</svg>
                                                                </div>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End - Literay Success -->

                    <!-- Start - Projects Overview -->
                    <div class="col-xl-12 col-xxl-6">
                        <div class="card overflow-hidden">
                            <div class="card-header border-0 pb-0 flex-wrap">
                                <h4 class="card-title">Projects Overview</h4>
                                <ul class="nav nav-pills nav-pills-sm nav-pills-bg gap-2 mix-chart-tab" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" data-series="week" id="pills-week-tab" data-bs-toggle="pill" data-bs-target="#pills-week" type="button" role="tab" aria-selected="true">Week</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" data-series="month" id="pills-month-tab" data-bs-toggle="pill" data-bs-target="#pills-month" type="button" role="tab" aria-selected="false">Month</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" data-series="year" id="pills-year-tab" data-bs-toggle="pill" data-bs-target="#pills-year" type="button" role="tab" aria-selected="false">Year</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" data-series="all" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-selected="false">All</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body p-0">
                                <div id="overiewChart"></div>
                            </div>
                            <div class="card-footer p-0 border-0">
                                <div class="row text-center g-0">
                                    <div class="col-sm-3 col-6 border-end border-top p-3">
                                        <h5 class="mb-0">12,721</h5>
                                        <span>Number of Projects</span>
                                    </div>
                                    <div class="col-sm-3 col-6 border-end border-top p-3">
                                        <h5 class="mb-0 text-primary">721</h5>
                                        <span>Active Projects</span>
                                    </div>
                                    <div class="col-sm-3 col-6 border-end border-top p-3">
                                        <h5 class="mb-0">$2,50,523</h5>
                                        <span>Revenue</span>
                                    </div>
                                    <div class="col-sm-3 col-6 border-top p-3">
                                        <h5 class="mb-0 text-success">12,275h</h5>
                                        <span>Working Hours</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End - Projects Overview -->

                    <!-- Start - Prominent -->
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-5 col-xxl-6 col-sm-6">
                                        <div class="space-image">
                                            <img src="assets/images/windows.jpg" class="w-100 height350 border border-0 rounded-2" alt="">
                                        </div>
                                    </div>
                                    <div class="col-xl-7 col-xxl-6 col-sm-6">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="mt-3 mt-sm-0">
                                                <h4 class="mb-0">Prominent</h4>
                                                <span>User Interface Design</span>
                                            </div>
                                            <a href="project.html" class="btn btn-primary btn-sm">View Project</a>
                                        </div>
                                        <div class="d-flex justify-content-between mt-3">
                                            <div class="mt-1 py-1 px-2 border border-1 border-dark-subtle rounded-1 text-center mw-110">
                                                <p class="mb-0 text-black">Start Date</p>
                                                <span style="font-size: 12px;">17 June 2023</span>
                                            </div>
                                            <div class="mt-1 py-1 px-2 border border-1 border-dark-subtle rounded-1 text-center mw-110">
                                                <p class="mb-0 text-black">End Date</p>
                                                <span style="font-size: 12px;">08 May 2023</span>
                                            </div>
                                            <div class="mt-1 py-1 px-2 border border-1 border-dark-subtle rounded-1 text-center mw-110">
                                                <p class="mb-0 text-black">Price</p>
                                                <span style="font-size: 12px;">$256</span>
                                            </div>
                                        </div>
                                        <p class="m-0 py-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard</p>
                                        <div class="d-flex align-items-center justify-content-between pt-1">
                                            <div class="d-flex align-items-center p-bd">
                                                <img src="assets/images/contacts/pic666.jpg" class="avatar avatar-sm rounded-circle" alt="">
                                                <div class="ms-2">
                                                    <p class="mb-0 text-black">Project Manager</p>
                                                    <span>Hanuman</span>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <img src="assets/images/budgeting.png" class="avatar avatar-sm rounded-circle" alt="">
                                                <div class="ms-2">
                                                    <p class="mb-0 text-black">Budget</p>
                                                    <span>$25,25</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <span class="d-block text-black">Our Star</span>
                                            <div class="d-flex align-items-center pt-2">
                                                <div class="avatar-list avatar-list-stacked">
                                                    <img src="assets/images/contacts/pic666.jpg" class="avatar avatar-xs rounded-circle" alt="">
                                                    <img src="assets/images/contacts/pic555.jpg" class="avatar avatar-xs rounded-circle" alt="">
                                                    <img src="assets/images/contacts/pic1.jpg" class="avatar avatar-xs rounded-circle" alt="">
                                                    <span class="avatar avatar-xs rounded-circle bg-primary text-white">P</span>
                                                    <img src="assets/images/contacts/pic666.jpg" class="avatar avatar-xs rounded-circle" alt="">
                                                    <span class="avatar avatar-xs rounded-circle bg-danger text-white">H</span>
                                                </div>
                                                <a href="javascript:void(0)" class="text-primary ms-2">21+ Team</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End - Prominent -->

                    <!-- Start - Projects -->
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Projects</h5>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <thead class="table-primary">
                                            <tr>
                                                <th class="fw-medium text-primary text-uppercase ps-4 py-2 fs-13">Project Name</th>
                                                <th class="fw-medium text-primary text-uppercase py-2 fs-13">Price</th>
                                                <th class="fw-medium text-primary text-uppercase py-2 fs-13">Growth</th>
                                                <th class="fw-medium text-primary text-uppercase py-2 fs-13">Chart</th>
                                                <th class="fw-medium text-primary text-uppercase py-2 fs-13">status</th>
                                                <th class="fw-medium text-primary text-uppercase py-2 fs-13">action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="ps-4">
                                                    <div class="d-flex align-items-center">
                                                        <img src="assets/images/os/p1.jpg" class="avatar avatar-sm" alt="">
                                                        <div class="ms-2">
                                                            <p class="mb-0 text-black fs-12 fw-medium">Jobick</p>
                                                            <span class="fs-12">Admin</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>$9</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="peity-line2" data-width="100%">8,4,5,9,5,3,5,7,5</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-info text-white ms-2"><i class="fa-solid fa-arrow-up me-1"></i>2.8</span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-success light">Inprogress</span>
                                                </td>
                                                <td class="text-end">
                                                    <div class="dropdown c-pointer">
                                                        <div class="btn-link" data-bs-toggle="dropdown">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
															</svg>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ps-4">
                                                    <div class="d-flex align-items-center">
                                                        <img src="assets/images/os/p2.jpg" class="avatar avatar-sm" alt="">
                                                        <div class="ms-2">
                                                            <p class="mb-0 text-black fs-12 fw-medium">Winkit</p>
                                                            <span class="fs-12">Front-End</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>$49</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="peity-line" data-width="100%">8,4,5,9,5,3,5,7,5</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-danger text-white ms-2"><i class="fa-solid fa-arrow-down me-1"></i>3.8</span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-success light">Completed</span>
                                                </td>
                                                <td class="text-end">
                                                    <div class="dropdown c-pointer">
                                                        <div class="btn-link" data-bs-toggle="dropdown">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
															</svg>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ps-4">
                                                    <div class="d-flex align-items-center">
                                                        <img src="assets/images/os/p3.jpg" class="avatar avatar-sm" alt="">
                                                        <div class="ms-2">
                                                            <p class="mb-0 text-black fs-12 fw-medium">W3CRM</p>
                                                            <span class="fs-12">Admin</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>$59</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="peity-line2" data-width="100%">8,4,5,9,5,3,5,7,5</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-primary text-white ms-2"><i class="fa-solid fa-arrow-up me-1"></i>7.9</span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-primary light">Inprogress</span>
                                                </td>
                                                <td class="text-end">
                                                    <div class="dropdown c-pointer">
                                                        <div class="btn-link" data-bs-toggle="dropdown">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
															</svg>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ps-4">
                                                    <div class="d-flex align-items-center">
                                                        <img src="assets/images/os/p5.jpg" class="avatar avatar-sm" alt="">
                                                        <div class="ms-2">
                                                            <p class="mb-0 text-black fs-12 fw-medium">JobZilla</p>
                                                            <span class="fs-12">WordPress</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>$39</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="peity-line3" data-width="100%">8,4,5,9,5,3,5,7,5</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-success text-white ms-2"><i class="fa-solid fa-arrow-up me-1"></i>5.9</span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-success light">Completed</span>
                                                </td>
                                                <td class="text-end">
                                                    <div class="dropdown c-pointer">
                                                        <div class="btn-link" data-bs-toggle="dropdown">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
															</svg>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End - Projects -->

                    <!-- Start - Employees -->
                    <div class="col-xl-8 col-xxl-9 bst-seller">
                        <div class="card">
                            <div class="card-header border-0 d-sm-flex d-block align-items-center">
                                <h4 class="card-title">Employees</h4>
                                <div class="clearfix">
                                    <div class="d-inline-block" id="tableEmpoloyeesExcelBTN"></div>
                                    <a class="btn btn-primary btn-sm m-1" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">+ Add Employee</a>
                                    <button type="button" class="btn btn-secondary btn-sm m-1" data-bs-toggle="modal" data-bs-target="#exampleModal1">+ Invite Employee</button>
                                </div>
                            </div>
                            <div class="card-body table-card-body px-0 pt-0 pb-2">
                                <div class="table-responsive check-wrapper">
                                    <table id="empoloyees-tbl" class="table table-sm table-sm-responsive">
                                        <thead class="table-primary text-nowrap">
                                            <tr>
                                                <th>ID</th>
                                                <th>Employee Name</th>
                                                <th>Email Address</th>
                                                <th>Contact Number</th>
                                                <th>Gender</th>
                                                <th>Location</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><span>1001</span></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <img src="assets/images/avatar/small/avatar1.webp" class="avatar avatar-sm me-2" alt="">
                                                        <div class="clearfix text-nowrap">
                                                            <h6 class="mb-0">Olivia Grace</h6>
                                                            <small>Web Designer</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><a href="javascript:void(0)" class="text-primary">ra@gmail.com</a></td>
                                                <td><span>+12 123 456 7890</span></td>
                                                <td><span>Male</span></td>
                                                <td><span>AZ</span></td>
                                                <td><span class="badge badge-sm badge-success light">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td><span>1018</span></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <img src="assets/images/avatar/small/avatar2.webp" class="avatar avatar-sm me-2" alt="">
                                                        <div class="clearfix text-nowrap">
                                                            <h6 class="mb-0">Elijah James</h6>
                                                            <small>Web Designer</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><a href="javascript:void(0)" class="text-primary">abc@gmail.com</a></td>
                                                <td><span>+91 123 456 7890</span></td>
                                                <td><span>Male</span></td>
                                                <td><span>Delhi</span></td>
                                                <td><span class="badge badge-sm badge-success light">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td><span>1018</span></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <img src="assets/images/avatar/small/avatar3.webp" class="avatar avatar-sm me-2" alt="">
                                                        <div class="clearfix text-nowrap">
                                                            <h6 class="mb-0">Amelia Rose</h6>
                                                            <small>Software Designer</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><a href="javascript:void(0)" class="text-primary">rm@gmail.com</a></td>
                                                <td><span>+55 123 456 7890</span></td>
                                                <td><span>Male</span></td>
                                                <td><span>PA</span></td>
                                                <td><span class="badge badge-sm badge-success light">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td><span>1018</span></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <img src="assets/images/avatar/small/avatar4.webp" class="avatar avatar-sm me-2" alt="">
                                                        <div class="clearfix text-nowrap">
                                                            <h6 class="mb-0">Liam Risher</h6>
                                                            <small>Software Designer</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><a href="javascript:void(0)" class="text-primary">abc@gmail.com</a></td>
                                                <td><span>+91 123 456 7890</span></td>
                                                <td><span>Male</span></td>
                                                <td><span>Delhi</span></td>
                                                <td><span class="badge badge-sm badge-success light">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td><span>1018</span></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <img src="assets/images/avatar/small/avatar5.webp" class="avatar avatar-sm me-2" alt="">
                                                        <div class="clearfix text-nowrap">
                                                            <h6 class="mb-0">Isabella Claire</h6>
                                                            <small>Software Designer</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><a href="javascript:void(0)" class="text-primary">hr@gmail.com</a></td>
                                                <td><span>+22 123 456 7890</span></td>
                                                <td><span>Female</span></td>
                                                <td><span>WA</span></td>
                                                <td><span class="badge badge-sm badge-success light">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td><span>1018</span></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <img src="assets/images/avatar/small/avatar6.webp" class="avatar avatar-sm me-2" alt="">
                                                        <div class="clearfix text-nowrap">
                                                            <h6 class="mb-0">Henry Mason</h6>
                                                            <small>Web Designer</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><a href="javascript:void(0)" class="text-primary">ma@gmail.com</a></td>
                                                <td><span>+62 123 456 7890</span></td>
                                                <td><span>Female</span></td>
                                                <td><span>WA</span></td>
                                                <td><span class="badge badge-sm badge-success light">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td><span>1018</span></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <img src="assets/images/avatar/small/avatar7.webp" class="avatar avatar-sm me-2" alt="">
                                                        <div class="clearfix text-nowrap">
                                                            <h6 class="mb-0">Evelyn Hope</h6>
                                                            <small>Web Designer</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><a href="javascript:void(0)" class="text-primary">ar@gmail.com</a></td>
                                                <td><span>+62 123 456 7890</span></td>
                                                <td><span>Female</span></td>
                                                <td><span>AL</span></td>
                                                <td><span class="badge badge-sm badge-success light">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td><span>1018</span></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <img src="assets/images/avatar/small/avatar8.webp" class="avatar avatar-sm me-2" alt="">
                                                        <div class="clearfix text-nowrap">
                                                            <h6 class="mb-0">Samuel Owen</h6>
                                                            <small>Software Developer</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><a href="javascript:void(0)" class="text-primary">ar@gmail.com</a></td>
                                                <td><span>+85 123 456 7890</span></td>
                                                <td><span>Female</span></td>
                                                <td><span>AL</span></td>
                                                <td><span class="badge badge-sm badge-success light">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td><span>1018</span></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <img src="assets/images/avatar/small/avatar9.webp" class="avatar avatar-sm me-2" alt="">
                                                        <div class="clearfix text-nowrap">
                                                            <h6 class="mb-0">Abigail Faith</h6>
                                                            <small>Software Developer</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><a href="javascript:void(0)" class="text-primary">ej@gmail.com</a></td>
                                                <td><span>+69 123 456 7890</span></td>
                                                <td><span>Male</span></td>
                                                <td><span>AL</span></td>
                                                <td><span class="badge badge-sm badge-success light">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td><span>1018</span></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <img src="assets/images/avatar/small/avatar10.webp" class="avatar avatar-sm me-2" alt="">
                                                        <div class="clearfix text-nowrap">
                                                            <h6 class="mb-0">Alexander Finn</h6>
                                                            <small>Web Designer</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><a href="javascript:void(0)" class="text-primary">ta@gmail.com</a></td>
                                                <td><span>+78 123 456 7890</span></td>
                                                <td><span>Female</span></td>
                                                <td><span>NYC</span></td>
                                                <td><span class="badge badge-sm badge-success light">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td><span>1001</span></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <img src="assets/images/avatar/small/avatar1.webp" class="avatar avatar-sm me-2" alt="">
                                                        <div class="clearfix text-nowrap">
                                                            <h6 class="mb-0">Harper Joy</h6>
                                                            <small>Web Designer</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><a href="javascript:void(0)" class="text-primary">abc@gmail.com</a></td>
                                                <td><span>+91 123 456 7890</span></td>
                                                <td><span>Male</span></td>
                                                <td><span>Delhi</span></td>
                                                <td><span class="badge badge-sm badge-danger light">Pending</span></td>
                                            </tr>
                                            <tr>
                                                <td><span>1001</span></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <img src="assets/images/avatar/small/avatar2.webp" class="avatar avatar-sm me-2" alt="">
                                                        <div class="clearfix text-nowrap">
                                                            <h6 class="mb-0">William Jasper</h6>
                                                            <small>Web Designer</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><a href="javascript:void(0)" class="text-primary">abc@gmail.com</a></td>
                                                <td><span>+91 123 456 7890</span></td>
                                                <td><span>Male</span></td>
                                                <td><span>Delhi</span></td>
                                                <td><span class="badge badge-sm badge-success light">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td><span>1001</span></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <img src="assets/images/avatar/small/avatar3.webp" class="avatar avatar-sm me-2" alt="">
                                                        <div class="clearfix text-nowrap">
                                                            <h6 class="mb-0">Isabella Claire</h6>
                                                            <small>Web Designer</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><a href="javascript:void(0)" class="text-primary">abc@gmail.com</a></td>
                                                <td><span>+255 123 456 7890</span></td>
                                                <td><span>Male</span></td>
                                                <td><span>USA</span></td>
                                                <td><span class="badge badge-sm badge-danger light">Pending</span></td>
                                            </tr>
                                            <tr>
                                                <td><span>1001</span></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <img src="assets/images/avatar/small/avatar4.webp" class="avatar avatar-sm me-2" alt="">
                                                        <div class="clearfix text-nowrap">
                                                            <h6 class="mb-0">Lucas Bennett</h6>
                                                            <small>Web Designer</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><a href="javascript:void(0)" class="text-primary">abc@gmail.com</a></td>
                                                <td><span>+91 123 456 7890</span></td>
                                                <td><span>Male</span></td>
                                                <td><span>Delhi</span></td>
                                                <td><span class="badge badge-sm badge-success light">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td><span>1001</span></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <img src="assets/images/avatar/small/avatar5.webp" class="avatar avatar-sm me-2" alt="">
                                                        <div class="clearfix text-nowrap">
                                                            <h6 class="mb-0">Harper Joy</h6>
                                                            <small>Web Designer</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><a href="javascript:void(0)" class="text-primary">abc@gmail.com</a></td>
                                                <td><span>+91 123 456 7890</span></td>
                                                <td><span>Male</span></td>
                                                <td><span>USA</span></td>
                                                <td><span class="badge badge-sm badge-danger light">Pending</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End - Employees -->

                    <!-- Start - Total Earning -->
                    <div class="col-xxl-3 col-xl-4 col-lg-6 order-1 order-xxl-0">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h4 class="card-title">Total Earning</h4>
                            </div>
                            <div class="card-body px-0 overflow-hidden d-flex flex-column justify-content-between pt-4 pb-2">
                                <div class="clearfix">
                                    <h2 class="text-center fw-semibold display-6 mb-0">$6,743.00</h2>
                                    <ul class="nav nav-underline nav-text-body mb-3 earning-chart justify-content-center" id="pills-tab1" role="tablist">
                                        <li class="nav-item px-2" role="presentation">
                                            <button class="nav-link py-2 px-0 border-3 m-0 active" data-series="day" id="pills-day-tab1" data-bs-toggle="pill" data-bs-target="#pills-day1" type="button" role="tab" aria-selected="true">Day</button>
                                        </li>
                                        <li class="nav-item px-2" role="presentation">
                                            <button class="nav-link py-2 px-0 border-3 m-0" id="pills-week-tab1" data-series="week" data-bs-toggle="pill" data-bs-target="#pills-week1" type="button" role="tab" aria-selected="false">Week</button>
                                        </li>
                                        <li class="nav-item px-2" role="presentation">
                                            <button class="nav-link py-2 px-0 border-3 m-0" id="pills-month-tab1" data-series="month" data-bs-toggle="pill" data-bs-target="#pills-month1" type="button" role="tab" aria-selected="false">Month</button>
                                        </li>
                                        <li class="nav-item px-2" role="presentation">
                                            <button class="nav-link py-2 px-0 border-3 m-0" id="pills-year-tab1" data-series="year" data-bs-toggle="pill" data-bs-target="#pills-year1" type="button" role="tab" aria-selected="false">Year</button>
                                        </li>
                                    </ul>
                                </div>
                                <div id="earningChart" style="direction: ltr;"></div>
                            </div>
                        </div>
                    </div>
                    <!-- End - Total Earning -->

                </div>
            </div>
            <div class="modal fade" id="exampleModal1" tabindex="-1">
                <div class="modal-dialog modal-dialog-center modal-xl">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body pt-0">
                            <div class="text-center">
                                <h2>Choose the plans that’s perfect for your business.</h2>
                                <p>Donec ligula ligula, porta at urna non, faucibus congue urna. Nullam nulla purus, facilisis vitae odio ac, tempus aliquet dolor.</p>
                            </div>
                            <div class="d-flex justify-content-center mb-4">
                                <ul class="nav nav-pills" id="pills-tab2" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" data-series="year" id="pills-year-tab2" data-bs-toggle="pill" data-bs-target="#pills-year" type="button" role="tab" aria-selected="true">Yearly</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" data-series="month" id="pills-month-tab2" data-bs-toggle="pill" data-bs-target="#pills-month" type="button" role="tab" aria-selected="false" tabindex="-1">Monthly</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="tab-content" id="pills-tabContent1">
                                    <div class="tab-pane fade show active" id="pills-year" role="tabpanel" aria-labelledby="pills-year-tab">
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-6">
                                                <div class="card upgrad-plan">
                                                    <div class="card-body">
                                                        <div class="text-center">
                                                            <span class="badge badge-info light border-0">Standard</span>
                                                            <div class="d-flex align-items-baseline m-prise">
                                                                <h4>$12</h4><span>/Per Year</span>
                                                            </div>
                                                            <ul class="prise-list">
                                                                <li>
                                                                    <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="24" height="24" rx="12" fill="#F0F5FF"/>
																		<path d="M16.8125 8.93774L10.6875 15.0625L7.625 12.0002" stroke="#0B63E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																	</svg> User Dashboard
                                                                </li>
                                                                <li>
                                                                    <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="24" height="24" rx="12" fill="#F0F5FF"/>
																		<path d="M16.8125 8.93774L10.6875 15.0625L7.625 12.0002" stroke="#0B63E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																	</svg> Post 3 Ads per week
                                                                </li>
                                                                <li>
                                                                    <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="24" height="24" rx="12" fill="#F0F5FF"/>
																		<path d="M16.8125 8.93774L10.6875 15.0625L7.625 12.0002" stroke="#0B63E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																	</svg> Multiple images & videos
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-center border-0">
                                                        <a href="javascript:void(0)" class="btn btn-primary light btn-block">Choose plans<i class="fa-solid fa-arrow-right ms-2"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-6">
                                                <div class="card upgrad-plan">
                                                    <div class="card-body">
                                                        <div class="text-center">
                                                            <span class="badge badge-info light border-0">Premium</span>
                                                            <div class="d-flex align-items-baseline m-prise">
                                                                <h4>$25</h4><span>/Per Year</span>
                                                            </div>
                                                            <ul class="prise-list">
                                                                <li>
                                                                    <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="24" height="24" rx="12" fill="#F0F5FF"/>
																		<path d="M16.8125 8.93774L10.6875 15.0625L7.625 12.0002" stroke="#0B63E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																	</svg> User Dashboard
                                                                </li>
                                                                <li>
                                                                    <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="24" height="24" rx="12" fill="#F0F5FF"/>
																		<path d="M16.8125 8.93774L10.6875 15.0625L7.625 12.0002" stroke="#0B63E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																	</svg> Post 3 Ads per week
                                                                </li>
                                                                <li>
                                                                    <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="24" height="24" rx="12" fill="#F0F5FF"/>
																		<path d="M16.8125 8.93774L10.6875 15.0625L7.625 12.0002" stroke="#0B63E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																	</svg> Multiple images & videos
                                                                </li>
                                                                <li>
                                                                    <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="24" height="24" rx="12" fill="#F0F5FF"/>
																		<path d="M16.8125 8.93774L10.6875 15.0625L7.625 12.0002" stroke="#0B63E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																	</svg> Basic customer support
                                                                </li>
                                                                <li>
                                                                    <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="24" height="24" rx="12" fill="#F0F5FF"/>
																		<path d="M16.8125 8.93774L10.6875 15.0625L7.625 12.0002" stroke="#0B63E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																	</svg> Featured ads
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-center border-0">
                                                        <a href="javascript:void(0)" class="btn btn-primary light btn-block">Choose plans<i class="fa-solid fa-arrow-right ms-2"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                <div class="card upgrad-plan">
                                                    <div class="card-body">
                                                        <div class="text-center">
                                                            <span class="badge badge-info light border-0">Business</span>
                                                            <div class="d-flex align-items-baseline m-prise">
                                                                <h4>$200</h4><span>/Per Year</span>
                                                            </div>
                                                            <ul class="prise-list">
                                                                <li>
                                                                    <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="24" height="24" rx="12" fill="#F0F5FF"/>
																		<path d="M16.8125 8.93774L10.6875 15.0625L7.625 12.0002" stroke="#0B63E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																	</svg> User Dashboard
                                                                </li>
                                                                <li>
                                                                    <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="24" height="24" rx="12" fill="#F0F5FF"/>
																		<path d="M16.8125 8.93774L10.6875 15.0625L7.625 12.0002" stroke="#0B63E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																	</svg> Post 3 Ads per week
                                                                </li>
                                                                <li>
                                                                    <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="24" height="24" rx="12" fill="#F0F5FF"/>
																		<path d="M16.8125 8.93774L10.6875 15.0625L7.625 12.0002" stroke="#0B63E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																	</svg> Multiple images & videos
                                                                </li>
                                                                <li>
                                                                    <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="24" height="24" rx="12" fill="#F0F5FF"/>
																		<path d="M16.8125 8.93774L10.6875 15.0625L7.625 12.0002" stroke="#0B63E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																	</svg> Basic customer support
                                                                </li>
                                                                <li>
                                                                    <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="24" height="24" rx="12" fill="#F0F5FF"/>
																		<path d="M16.8125 8.93774L10.6875 15.0625L7.625 12.0002" stroke="#0B63E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																	</svg> Featured ads
                                                                </li>
                                                                <li>
                                                                    <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="24" height="24" rx="12" fill="#F0F5FF"/>
																		<path d="M16.8125 8.93774L10.6875 15.0625L7.625 12.0002" stroke="#0B63E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																	</svg> Special ads badge
                                                                </li>
                                                                <li>
                                                                    <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="24" height="24" rx="12" fill="#F0F5FF"/>
																		<path d="M16.8125 8.93774L10.6875 15.0625L7.625 12.0002" stroke="#0B63E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																	</svg> Call to Action in Every Ads
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-center border-0">
                                                        <a href="javascript:void(0)" class="btn btn-primary light btn-block">Choose plans<i class="fa-solid fa-arrow-right ms-2"></i></a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-month" role="tabpanel" aria-labelledby="pills-month-tab">
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-6">
                                                <div class="card upgrad-plan">
                                                    <div class="card-body">
                                                        <div class="text-center">
                                                            <span class="badge badge-info light border-0">Standard</span>
                                                            <div class="d-flex align-items-baseline m-prise">
                                                                <h4>$08</h4><span>/Per Month</span>
                                                            </div>
                                                            <ul class="prise-list">
                                                                <li>
                                                                    <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="24" height="24" rx="12" fill="#F0F5FF"/>
																		<path d="M16.8125 8.93774L10.6875 15.0625L7.625 12.0002" stroke="#0B63E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																	</svg> User Dashboard
                                                                </li>
                                                                <li>
                                                                    <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="24" height="24" rx="12" fill="#F0F5FF"/>
																		<path d="M16.8125 8.93774L10.6875 15.0625L7.625 12.0002" stroke="#0B63E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																	</svg> Post 3 Ads per week
                                                                </li>
                                                                <li>
                                                                    <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="24" height="24" rx="12" fill="#F0F5FF"/>
																		<path d="M16.8125 8.93774L10.6875 15.0625L7.625 12.0002" stroke="#0B63E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																	</svg> Multiple images & videos
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-center border-0">
                                                        <a href="javascript:void(0)" class="btn btn-primary light btn-block">Choose plans<i class="fa-solid fa-arrow-right ms-2"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-6">
                                                <div class="card upgrad-plan">
                                                    <div class="card-body">
                                                        <div class="text-center">
                                                            <span class="badge badge-info light border-0">Premium</span>
                                                            <div class="d-flex align-items-baseline m-prise">
                                                                <h4>$20</h4><span>/Per Month</span>
                                                            </div>
                                                            <ul class="prise-list">
                                                                <li>
                                                                    <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="24" height="24" rx="12" fill="#F0F5FF"/>
																		<path d="M16.8125 8.93774L10.6875 15.0625L7.625 12.0002" stroke="#0B63E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																	</svg> User Dashboard
                                                                </li>
                                                                <li>
                                                                    <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="24" height="24" rx="12" fill="#F0F5FF"/>
																		<path d="M16.8125 8.93774L10.6875 15.0625L7.625 12.0002" stroke="#0B63E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																	</svg> Post 3 Ads per week
                                                                </li>
                                                                <li>
                                                                    <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="24" height="24" rx="12" fill="#F0F5FF"/>
																		<path d="M16.8125 8.93774L10.6875 15.0625L7.625 12.0002" stroke="#0B63E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																	</svg> Multiple images & videos
                                                                </li>
                                                                <li>
                                                                    <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="24" height="24" rx="12" fill="#F0F5FF"/>
																		<path d="M16.8125 8.93774L10.6875 15.0625L7.625 12.0002" stroke="#0B63E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																	</svg> Basic customer support
                                                                </li>
                                                                <li>
                                                                    <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="24" height="24" rx="12" fill="#F0F5FF"/>
																		<path d="M16.8125 8.93774L10.6875 15.0625L7.625 12.0002" stroke="#0B63E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																	</svg> Featured ads
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-center border-0">
                                                        <a href="javascript:void(0)" class="btn btn-primary light btn-block">Choose plans<i class="fa-solid fa-arrow-right ms-2"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                <div class="card upgrad-plan">
                                                    <div class="card-body">
                                                        <div class="text-center">
                                                            <span class="badge badge-info light border-0">Business</span>
                                                            <div class="d-flex align-items-baseline m-prise">
                                                                <h4>$50</h4><span>/Per Month</span>
                                                            </div>
                                                            <ul class="prise-list">
                                                                <li>
                                                                    <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="24" height="24" rx="12" fill="#F0F5FF"/>
																		<path d="M16.8125 8.93774L10.6875 15.0625L7.625 12.0002" stroke="#0B63E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																	</svg> User Dashboard
                                                                </li>
                                                                <li>
                                                                    <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="24" height="24" rx="12" fill="#F0F5FF"/>
																		<path d="M16.8125 8.93774L10.6875 15.0625L7.625 12.0002" stroke="#0B63E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																	</svg> Post 3 Ads per week
                                                                </li>
                                                                <li>
                                                                    <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="24" height="24" rx="12" fill="#F0F5FF"/>
																		<path d="M16.8125 8.93774L10.6875 15.0625L7.625 12.0002" stroke="#0B63E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																	</svg> Multiple images & videos
                                                                </li>
                                                                <li>
                                                                    <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="24" height="24" rx="12" fill="#F0F5FF"/>
																		<path d="M16.8125 8.93774L10.6875 15.0625L7.625 12.0002" stroke="#0B63E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																	</svg> Basic customer support
                                                                </li>
                                                                <li>
                                                                    <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="24" height="24" rx="12" fill="#F0F5FF"/>
																		<path d="M16.8125 8.93774L10.6875 15.0625L7.625 12.0002" stroke="#0B63E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																	</svg> Featured ads
                                                                </li>
                                                                <li>
                                                                    <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="24" height="24" rx="12" fill="#F0F5FF"/>
																		<path d="M16.8125 8.93774L10.6875 15.0625L7.625 12.0002" stroke="#0B63E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																	</svg> Special ads badge
                                                                </li>
                                                                <li>
                                                                    <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<rect width="24" height="24" rx="12" fill="#F0F5FF"/>
																		<path d="M16.8125 8.93774L10.6875 15.0625L7.625 12.0002" stroke="#0B63E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																	</svg> Call to Action in Every Ads
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-center border-0">
                                                        <a href="javascript:void(0)" class="btn btn-primary light btn-block">Choose plans<i class="fa-solid fa-arrow-right ms-2"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="offcanvas offcanvas-end customeoff" tabindex="-1" id="offcanvasExample">
                <div class="offcanvas-header">
                    <h5 class="modal-title" id="#gridSystemModal">Add Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
					
				</button>
                </div>
                <div class="offcanvas-body">
                    <div class="container-fluid">
                        <div>
                            <label>Profile Picture</label>
                            <div class="dz-default dlab-message upload-img mb-3">
                                <form action="#" class="dropzone">
                                    <svg width="41" height="40" viewBox="0 0 41 40" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M27.1666 26.6667L20.4999 20L13.8333 26.6667" stroke="#DADADA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									<path d="M20.5 20V35" stroke="#DADADA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									<path d="M34.4833 30.6501C36.1088 29.7638 37.393 28.3615 38.1331 26.6644C38.8731 24.9673 39.027 23.0721 38.5703 21.2779C38.1136 19.4836 37.0724 17.8926 35.6111 16.7558C34.1497 15.619 32.3514 15.0013 30.4999 15.0001H28.3999C27.8955 13.0488 26.9552 11.2373 25.6498 9.70171C24.3445 8.16614 22.708 6.94647 20.8634 6.1344C19.0189 5.32233 17.0142 4.93899 15.0001 5.01319C12.9861 5.0874 11.015 5.61722 9.23523 6.56283C7.45541 7.50844 5.91312 8.84523 4.7243 10.4727C3.53549 12.1002 2.73108 13.9759 2.37157 15.959C2.01205 17.9421 2.10678 19.9809 2.64862 21.9222C3.19047 23.8634 4.16534 25.6565 5.49994 27.1667" stroke="#DADADA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									<path d="M27.1666 26.6667L20.4999 20L13.8333 26.6667" stroke="#DADADA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
                                    <div class="fallback">
                                        <input name="file" type="file" multiple>

                                    </div>
                                </form>
                            </div>
                        </div>
                        <form>
                            <div class="row">
                                <div class="col-xl-6 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Employee ID <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label for="exampleFormControlInput2" class="form-label">Employee Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="">
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label for="exampleFormControlInput3" class="form-label">Employee Email<span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="exampleFormControlInput3" placeholder="">
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label for="exampleFormControlInput4" class="form-label">Password<span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="exampleFormControlInput4" placeholder="">
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label class="form-label">Designation<span class="text-danger">*</span></label>
                                    <select class="default-select form-control">
									<option  data-display="Select">Please select</option>
									<option value="html">Software Engineer</option>
									<option value="css">Civil Engineer</option>
									<option value="javascript">Web Doveloper</option>
								</select>
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label class="form-label">Department<span class="text-danger">*</span></label>
                                    <select class="default-select form-control">
									<option  data-display="Select">Please select</option>
									<option value="html">Software</option>
									<option value="css">Doit</option>
									<option value="javascript">Designing</option>
								</select>
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label class="form-label">Country<span class="text-danger">*</span></label>
                                    <select class="default-select form-control">
									<option  data-display="Select">Please select</option>
									<option value="html">Ind</option>
									<option value="css">USA</option>
									<option value="javascript">UK</option>
								</select>
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label for="exampleFormControlInput88" class="form-label">Mobile<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="exampleFormControlInput88" placeholder="">
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label class="form-label">Gender<span class="text-danger">*</span></label>
                                    <select class="default-select form-control">
									<option  data-display="Select">Please select</option>
									<option value="html">Male</option>
									<option value="css">Female</option>
									<option value="javascript">Other</option>
								</select>
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label class="form-label">Joining Date<span class="text-danger">*</span></label>
                                    <div class="input-hasicon mb-sm-0 mb-3">
                                        <input name="datepicker" class="form-control bt-datepicker">
                                        <div class="icon"><i class="far fa-calendar"></i></div>
                                    </div>
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label class="form-label">Date of Birth<span class="text-danger">*</span></label>
                                    <div class="input-hasicon mb-sm-0 mb-3">
                                        <input name="datepicker" class="form-control bt-datepicker">
                                        <div class="icon"><i class="far fa-calendar"></i></div>
                                    </div>
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label for="exampleFormControlInput10" class="form-label">Reporting To<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="exampleFormControlInput10" placeholder="">
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label class="form-label">Language Select<span class="text-danger">*</span></label>
                                    <select class="default-select form-control">
									<option  data-display="Select">Please select</option>
									<option value="html">English</option>
									<option value="css">Hindi</option>
									<option value="javascript">Canada</option>
								</select>
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label class="form-label">User Role<span class="text-danger">*</span></label>
                                    <select class="default-select form-control">
									<option  data-display="Select">Please select</option>
									<option value="html">Parmanent</option>
									<option value="css">Parttime</option>
									<option value="javascript">Per Hours</option>
								</select>
                                </div>
                                <div class="col-xl-12 mb-3">
                                    <label class="form-label">Address<span class="text-danger">*</span></label>
                                    <textarea rows="2" class="form-control"></textarea>
                                </div>
                                <div class="col-xl-12 mb-3">
                                    <label class="form-label">About<span class="text-danger">*</span></label>
                                    <textarea rows="2" class="form-control"></textarea>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-primary me-1">Submit</button>
                                <button class="btn btn-danger light ms-1">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                <div class="modal-dialog modal-dialog-center">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel2">Invite Employee</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xl-12">
                                    <label class="form-label">Email ID<span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" placeholder="hello@gmail.com">
                                    <label class="form-label mt-3">Employment date<span class="text-danger">*</span></label>
                                    <input class="form-control" type="date">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <label class="form-label mt-3">First Name<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <label class="form-label mt-3">Last Name<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Surname">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 invite">
                                        <label class="form-label">Send invitation email<span class="text-danger">*</span></label>
                                        <input type="email" class="form-control " placeholder="+ invite">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
    
</template>
