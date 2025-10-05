<template>

  <Head>
    <title>Login - Eduport</title>
  </Head>

  <main>
    <div class="row">
      <!-- Left -->
      <div
        class="col-12 col-lg-6 d-md-flex align-items-center justify-content-center bg-primary bg-opacity-10 vh-lg-100">
        <div class="p-3 p-lg-5 text-center">
          <h2 class="fw-bold">Welcome to our largest community</h2>
          <p class="mb-0 h6 fw-light">Let's learn something new today!</p>
          <img src="/assets/images/02.svg" class="mt-5" alt="Community Image" />
        </div>
      </div>

      <!-- Right -->
      <div class="col-12 col-lg-6 m-auto">
        <div class="row my-5">
          <div class="col-sm-10 col-xl-8 m-auto">
            <span class="mb-0 fs-1">👋</span>
            <h1 class="fs-2">Login into EduClass!</h1>
            <p class="lead mb-4">Nice to see you! Please log in with your account.</p>

            <form @submit.prevent="submit">
              <div class="mb-4">
                <label for="email" class="form-label">Email address *</label>
                <div class="input-group input-group-lg">
                  <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3">
                    <i class="bi bi-envelope-fill"></i>
                  </span>
                  <input id="email" type="email" class="form-control border-0 bg-light rounded-end ps-1"
                    placeholder="E-mail" v-model.trim="form.email" autocomplete="email" required />
                </div>
                <div v-if="errors?.email" class="alert alert-danger mt-2">{{ errors.email }}</div>
              </div>

              <div class="mb-4">
                <label for="password" class="form-label">Password *</label>
                <div class="input-group input-group-lg">
                  <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3">
                    <i class="fas fa-lock"></i>
                  </span>
                  <input id="password" type="password" class="form-control border-0 bg-light rounded-end ps-1"
                    placeholder="Password" v-model="form.password" autocomplete="current-password" required
                    minlength="8" />
                </div>
                <div v-if="errors?.password" class="alert alert-danger mt-2">{{ errors.password }}</div>
                <div id="passwordHelpBlock" class="form-text">Your password must be 8 characters at least</div>
              </div>

              <div class="mb-4 d-flex justify-content-between">
                <div class="form-check">
                  <input id="remember" type="checkbox" class="form-check-input" v-model="form.remember" />
                  <label class="form-check-label" for="remember">Remember me</label>
                </div>
              </div>

              <div class="d-grid">
                <button class="btn btn-primary mb-0" type="submit">Login</button>
              </div>
            </form>

            <div class="mt-4 text-center">
              <span>Don't have an account?
                <Link href="/register">Signup here</Link>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<script setup>
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'
import AuthLayoutVue from '../../Layouts/AuthLayout.vue'

defineOptions({ layout: AuthLayoutVue })

const { errors } = defineProps({
  errors: { type: Object, default: () => ({}) },
})

const form = reactive({
  email: '',
  password: '',
  remember: false,
})

function submit() {
  router.post('/login', form)
}
</script>
