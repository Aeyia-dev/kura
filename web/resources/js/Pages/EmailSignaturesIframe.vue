<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { onMounted, ref, nextTick } from 'vue';

const iframeContainer = ref(null);
const iframeElement = ref(null);

// Function to adjust iframe height
const adjustIframeHeight = () => {
    if (!iframeElement.value || !iframeContainer.value) return;

    // Get the container height based on viewport minus header and any padding
    // Typical Jetstream header height is around 64px and padding is 48px (py-12)
    const viewportHeight = window.innerHeight;
    const headerHeight = 64; // Approximate header height
    const padding = 48; // py-12 padding
    const containerHeight = viewportHeight - headerHeight - padding - 20; // Extra 20px buffer

    // Set iframe height
    iframeElement.value.style.height = `${containerHeight}px`;
};

onMounted(() => {
    // Initial adjustment
    nextTick(() => {
        adjustIframeHeight();
    });

    // Adjust on window resize
    window.addEventListener('resize', adjustIframeHeight);
});
</script>

<template>
    <AppLayout title="Email Signatures">
        <template #header>
            <h2 class="font-medium text-xl text-gray-800 leading-tight">
                Email Signatures
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" ref="iframeContainer">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <!-- Full page iframe with dynamic height -->
                    <iframe
                        ref="iframeElement"
                        src="/email-signatures-popup"
                        class="w-full"
                        style="min-height: 800px; width: 100%;"
                        frameborder="0"
                    ></iframe>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>
/* Ensure iframe container takes available height */
.max-w-7xl {
    min-height: calc(100vh - 120px);
}
</style>
