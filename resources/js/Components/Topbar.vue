<template>
  <nav class="navbar top-bar navbar-light border-bottom py-2">
    <div class="container-fluid">
      <div class="d-flex align-items-center w-100">
        <!-- Sidebar Toggler -->
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasSidebar">
          <span class="navbar-toggler-icon"></span>
        </button>


        <!-- Profile dropdown -->
        <div class="ms-auto">
          <ul class="navbar-nav flex-row align-items-center">
            <li class="nav-item ms-2 ms-md-3 dropdown">
              <a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside"
                data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                <img class="avatar-img rounded-circle shadow" :src="$page.props.auth.user.avatar" alt="avatar" />

              </a>

              <ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3"
                aria-labelledby="profileDropdown">
                <li class="px-3">
                  <div class="d-flex align-items-center">
                    <div>
                      <Link class="h6 mt-2 mt-sm-0" href="/profile">{{
                        user.name
                      }}</Link>
                      <p class="small m-0">{{ user.email }}</p>
                    </div>
                  </div>
                </li>
                <li>
                  <hr class="dropdown-divider" />
                </li>
                <!-- Logout -->
                <li>
                  <button class="dropdown-item bg-danger-soft-hover" @click="logout">
                    <i class="bi bi-power fa-fw me-2"></i>Sign Out
                  </button>
                </li>
              </ul>
            </li>
            <!-- Profile dropdown END -->
          </ul>
        </div>
      </div>
    </div>
  </nav>
</template>

<script>
import { router } from '@inertiajs/vue3'

export default {
  props: {
    user: {
      type: Object,
      default: () => ({}),
    },
  },
  setup() {
    const logout = () => {
      router.post('/logout')
    }
    return { logout }
  },
}
</script>
