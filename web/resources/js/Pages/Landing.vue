<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});
</script>

<template>
    <Head title="AEYIA" />
    <div style="font-family: 'Arial', sans-serif; margin: 0; padding: 0; background-color: #f5f5f5; color: #212025;">
        <div style="max-width: 1200px; margin: 0 auto; padding: 20px; text-align: center;">
            <header style="display: flex; justify-content: flex-end; padding: 20px 0;">
                <nav v-if="canLogin" style="display: flex; gap: 16px;">
                    <Link
                        v-if="$page.props.auth.user"
                        :href="route('dashboard')"
                        style="display: inline-block; padding: 8px 20px; border: 1px solid #212025; border-radius: 4px; text-decoration: none; color: #212025; font-size: 14px;"
                        class="hover:bg-gray-100"
                    >
                        Dashboard
                    </Link>

                    <template v-else>
                        <Link
                            :href="route('login')"
                            style="display: inline-block; padding: 8px 20px; border: 1px solid transparent; border-radius: 4px; text-decoration: none; color: #212025; font-size: 14px;"
                            class="hover:border-gray-800 hover:bg-gray-100"
                        >
                            Log in
                        </Link>

                        <Link
                            v-if="canRegister"
                            :href="route('register')"
                            style="display: inline-block; padding: 8px 20px; border: 1px solid #212025; border-radius: 4px; text-decoration: none; color: #212025; font-size: 14px;"
                            class="hover:bg-gray-100"
                        >
                            Register
                        </Link>
                    </template>
                </nav>
            </header>
            
            <div style="padding: 40px 0; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                <img src="/images/aeyia-logo.png" alt="AEYIA" style="max-width: 400px; height: auto; margin-bottom: 30px;">
                <h1 style="font-size: 2.5rem; margin-bottom: 20px; color: #212025;">Coming Soon</h1>
                <p style="font-size: 1.2rem; margin-bottom: 40px; color: #666;">We're building a new platform to transform wellness management</p>
            </div>

            <div style="background-color: #fff; border-radius: 8px; padding: 40px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); margin-bottom: 40px;">
                <h2>KURA - Tech Spikes Platform</h2>
                <p>Our comprehensive wellness platform is currently under development.</p>
                <p>Designed to connect clients with practitioners and streamline the wellness journey.</p>
            </div>

            <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 20px; margin: 40px 0;">
                <div style="background-color: #fff; border-radius: 8px; padding: 20px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); width: 300px; text-align: left;">
                    <h3 style="color: #212025; margin-top: 0;">Appointment Management</h3>
                    <p>Seamless scheduling, reminders, and calendar integration for both practitioners and clients.</p>
                </div>
                <div style="background-color: #fff; border-radius: 8px; padding: 20px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); width: 300px; text-align: left;">
                    <h3 style="color: #212025; margin-top: 0;">Client Portal</h3>
                    <p>Secure access to treatment plans, progress tracking, and communication with practitioners.</p>
                </div>
                <div style="background-color: #fff; border-radius: 8px; padding: 20px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); width: 300px; text-align: left;">
                    <h3 style="color: #212025; margin-top: 0;">Practitioner Dashboard</h3>
                    <p>Comprehensive tools for managing clients, appointments, and business operations.</p>
                </div>
            </div>

            <div style="margin-top: 50px; padding: 20px 0; border-top: 1px solid #ddd; font-size: 0.9rem; color: #666;">
                <p>© {{ new Date().getFullYear() }} AEYIA. All rights reserved.</p>
                <p>Made with love in Byron Bay, Australia</p>
            </div>
        </div>
    </div>
</template>