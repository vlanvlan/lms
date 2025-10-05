<template>
  <!-- sidebar -->
  <Navbar />

  <div class="page-content">
    <!-- topbar -->
    <Topbar />

    <!-- konten -->
    <div class="page-content-wrapper border">
      <slot />
    </div>
  </div>
</template>

<script>
import Navbar from "../Components/Navbar.vue";
import Topbar from "../Components/Topbar.vue";

export default {
  components: {
    Navbar,
    Topbar,
  },
};
</script>
