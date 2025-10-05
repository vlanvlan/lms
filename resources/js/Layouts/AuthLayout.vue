<template>
  	<section class="p-0 d-flex align-items-center position-relative overflow-hidden">
		<div class="container-fluid">
			<div class="row">
                <slot />
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "AuthLayout"
}
</script>
