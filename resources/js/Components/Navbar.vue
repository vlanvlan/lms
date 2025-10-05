<template>
  <nav class="navbar sidebar navbar-expand-xl navbar-dark bg-dark">
    <!-- Logo -->
    <div class="d-flex align-items-center">
      <Link class="navbar-brand" href="/">
        <img class="navbar-brand-item" src="/assets/logo/educlass-logo.png" alt="Logo" style="width: 100px; height: auto;" />
      </Link>
    </div>

    <!-- Sidebar -->
    <div class="offcanvas offcanvas-start flex-row custom-scrollbar h-100" id="offcanvasSidebar">
      <div class="offcanvas-body sidebar-content d-flex flex-column bg-dark">

        <!-- Menu -->
        <ul class="navbar-nav flex-column" id="navbar-sidebar">
          <li class="nav-item ms-2 my-1 text-muted">General</li>
          <li class="nav-item">
            <Link href="/admin/dashboard"
            class="nav-link"
            :class="{ 'active': $page.url.startsWith('/admin/dashboard') }">
              <i class="bi bi-house-door fa-fw me-2"></i>Dashboard
            </Link>
          </li>
          <li class="nav-item">
            <Link href="/" class="nav-link"><i class="bi bi-house fa-fw me-2"></i>Home</Link>
          </li>

        </ul>

        <!-- Footer -->
        <div class="px-3 mt-auto pt-3">
          <button class="h5 mb-0 text-body" @click="logout">
            <i class="bi bi-power"></i>
          </button>
        </div>
      </div>
    </div>
  </nav>
</template>

<script>
import { Link, router } from '@inertiajs/vue3';

export default {
  components: { Link },
  setup() {
    const logout = () => {
      router.post('/logout');
    };

    return { logout };
  },
};
</script>
