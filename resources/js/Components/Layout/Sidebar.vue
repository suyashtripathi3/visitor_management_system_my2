<template>
  <div class="deznav">
    <div class="deznav-scroll">
      <ul class="metismenu" id="menu">

        <li class="menu-title">Dashboard</li>

        <!-- Dashboard -->
        <li>
          <a :href="AppRoutes.dashboard" aria-expanded="false">
            <div class="menu-icon"><i class="fa-solid fa-chart-line"></i></div>
            <span class="nav-text">Dashboard</span>
          </a>
        </li>

        <li>
          <a href="#" aria-expanded="false">
            <div class="menu-icon"><i class="fa-solid fa-chart-pie"></i></div>
            <span class="nav-text">Analytics</span>
          </a>
        </li>


        <!-- Visitor Section -->
        <li class="menu-title">Visitor Managment</li>

        <li>
          <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
            <div class="menu-icon"><i class="fa-solid fa-user-group"></i></div>
            <span class="nav-text">Visitor</span>
          </a>
          <ul aria-expanded="false">
            <li><a :href="AppRoutes.visitor.form">Add Visitor</a></li>
            <li><a :href="AppRoutes.visitor.index">All Visitor</a></li>
          </ul>
        </li>


        <!-- Report Section -->
        <li class="menu-title">Report Managment</li>

        <li>
          <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
            <div class="menu-icon"><i class="fa-solid fa-file-alt"></i></div>
            <span class="nav-text">Report</span>
          </a>
          <ul aria-expanded="false">
            <li><a href="#">Report</a></li>
            <li><a href="#">Custom Report</a></li>
          </ul>
        </li>

        <li>
          <a href="#" aria-expanded="false">
            <div class="menu-icon"><i class="fa-solid fa-database"></i></div>
            <span class="nav-text">Database Backup</span>
          </a>
        </li>


        <!-- Profile Section -->
        <li class="menu-title">Profile</li>

        <li>
          <a href="#" aria-expanded="false">
            <div class="menu-icon"><i class="fa-solid fa-user"></i></div>
            <span class="nav-text">Profile</span>
          </a>
        </li>

        <li>
          <a href="#" aria-expanded="false">
            <div class="menu-icon"><i class="fa-solid fa-calendar-days"></i></div>
            <span class="nav-text">Calender</span>
          </a>
        </li>


        <!-- Admin Setting -->
        <li class="menu-title">Admin Setting</li>

        <li>
          <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
            <div class="menu-icon"><i class="fa-solid fa-shield-halved"></i></div>
            <span class="nav-text">Security</span>
          </a>
          <ul aria-expanded="false">
            <li><a :href="AppRoutes.users.index">Users</a></li>
            <li><a :href="AppRoutes.roles.index">Roles</a></li>
            <li><a :href="AppRoutes.logs.index">Logs</a></li>
          </ul>
        </li>

        <li>
          <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
            <div class="menu-icon"><i class="fa-solid fa-table-cells"></i></div>
            <span class="nav-text">Common Fields</span>
          </a>
          <ul aria-expanded="false">
            <li><a :href="AppRoutes.common.departments.index">Department</a></li>
            <li><a :href="AppRoutes.common.buildings.index">Buildings</a></li>
            <li><a :href="AppRoutes.common.floors.index">Floors</a></li>
            <li><a :href="AppRoutes.common.locationTypes.index">Location Type</a></li>
            <li><a :href="AppRoutes.common.locations.index">Location</a></li>

          </ul>
        </li>

      </ul>
    </div>

    <div class="deznav-footer">
      <a href="#" class="btn btn-docs btn-success w-100">
        <span>Version 1.1.1</span>
        <i class="fa-solid fa-arrow-up rotate-x"></i>
      </a>
    </div>
  </div>

</template>

<script setup>
import AppRoutes from '@/routes';
</script>