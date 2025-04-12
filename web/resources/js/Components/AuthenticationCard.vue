<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative">
        <!-- Background image -->
        <div class="absolute inset-0 z-0">
            <img src="/images/landing/background.png" alt="Background" class="object-cover w-full h-full">
        </div>

        <!-- Overlay for better text readability -->
        <div class="absolute inset-0 z-10 bg-black bg-opacity-20"></div>

        <div class="z-20 relative">
            <slot name="logo" />
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white/10 backdrop-blur-md shadow-xl overflow-hidden sm:rounded-2xl border border-white/20 z-20 relative text-white">
            <slot />
        </div>

        <!-- Authentication links -->
        <div class="w-full sm:max-w-md mt-4 text-white/80 text-center z-20 relative">
            <Link :href="'/'" class="hover:text-white transition-colors duration-200">
                Return to home
            </Link>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>
