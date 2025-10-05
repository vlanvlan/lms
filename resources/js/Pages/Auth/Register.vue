<template>

  <Head>
    <title>Register - Eduport</title>
  </Head>

  <main>
    <section class="p-0 d-flex align-items-center position-relative overflow-hidden">
      <div class="container-fluid">
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
                <span class="mb-0 fs-1">🎉</span>
                <h1 class="fs-2">Join EduClass!</h1>
                <p class="lead mb-4">Create your account to start your learning journey.</p>

                <form @submit.prevent="submit">
                  <!-- Name -->
                  <div class="mb-4">
                    <label for="name" class="form-label">Full Name *</label>
                    <div class="input-group input-group-lg">
                      <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3">
                        <i class="bi bi-person-fill"></i>
                      </span>
                      <input id="name" type="text" class="form-control border-0 bg-light rounded-end ps-1"
                        placeholder="Full Name" v-model.trim="form.name" required />
                    </div>
                    <div v-if="errors?.name" class="alert alert-danger mt-2">{{ errors.name }}</div>
                  </div>

                  <!-- Email -->
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

                  <!-- Password -->
                  <div class="mb-4">
                    <label for="password" class="form-label">Password *</label>
                    <div class="input-group input-group-lg">
                      <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3">
                        <i class="fas fa-lock"></i>
                      </span>
                      <input id="password" type="password" class="form-control border-0 bg-light rounded-end ps-1"
                        placeholder="Password" v-model="form.password" autocomplete="new-password" minlength="8"
                        required />
                    </div>
                    <div v-if="errors?.password" class="alert alert-danger mt-2">{{ errors.password }}</div>
                    <div id="passwordHelpBlock" class="form-text">Your password must be at least 8 characters.</div>
                  </div>

                  <!-- Confirm Password -->
                  <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Confirm Password *</label>
                    <div class="input-group input-group-lg">
                      <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3">
                        <i class="fas fa-lock"></i>
                      </span>
                      <input id="password_confirmation" type="password"
                        class="form-control border-0 bg-light rounded-end ps-1" placeholder="Confirm Password"
                        v-model="form.password_confirmation" autocomplete="new-password" minlength="8" required />
                    </div>
                    <div v-if="errors?.password_confirmation" class="alert alert-danger mt-2">
                      {{ errors.password_confirmation }}
                    </div>
                  </div>

                  <!-- Terms -->
                  <div class="mb-4">
                    <div class="form-check">
                      <input id="terms" type="checkbox" class="form-check-input" v-model="form.terms" />
                      <label class="form-check-label" for="terms">
                        I agree to the <a href="#" class="text-secondary">Terms and Conditions</a>
                      </label>
                    </div>
                    <div v-if="errors?.terms" class="alert alert-danger mt-2">{{ errors.terms }}</div>
                  </div>

                  <!-- Submit -->
                  <div class="d-grid">
                    <button class="btn btn-primary mb-0" type="submit" :disabled="!form.terms">
                      Register
                    </button>
                  </div>
                </form>

                <!-- Login link -->
                <div class="mt-4 text-center">
                  <span>Already have an account?
                    <Link href="/login">Login here</Link>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</template>

<script setup>
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'
import AuthLayout from '../../Layouts/AuthLayout.vue'

defineOptions({ layout: AuthLayout })

const { errors } = defineProps({
  errors: { type: Object, default: () => ({}) },
})

const form = reactive({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
  terms: false,
})

function submit() {
  router.post('/register', form)
}
</script>
