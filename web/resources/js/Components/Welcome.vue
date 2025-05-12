<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

// Modal functionality has been replaced with a dedicated page

// Define the tech spikes with their status
const techSpikes = [
    {
        title: 'Development framework and hosting setup',
        description: 'Scaffold the hosting and website for the tech spikes and prototype',
        status: 'completed',
        demoLink: null
    },
    {
        title: 'Email signature builder',
        description: 'Simple email signature generator',
        status: 'completed',
        demoLink: '/email-signatures'
    },
    {
        title: 'Production Holding Site',
        description: 'aeyia.com and society.aeyia.com pre-launch holding sights with email capture and contact page',
        status: 'in-progress',
        demoLink: '/holding'
    },
    {
        title: 'Video Session Platform',
        description: 'Determine the best video platform for secure therapy sessions',
        status: 'in-progress',
        demoLink: null
    },
    {
        title: 'Calendar Integration',
        description: 'Determine the optimal calendar solution for booking management',
        status: 'upcoming',
        demoLink: null
    },
    {
        title: 'Digital Library & Course Platform',
        description: 'Select the right platform for educational content delivery',
        status: 'upcoming',
        demoLink: null
    },
    {
        title: 'Search Implementation with Algolia',
        description: 'Design an effective practitioner search experience',
        status: 'upcoming',
        demoLink: null
    },
    {
        title: 'Credits System Implementation',
        description: 'Design a flexible credit system for session payment',
        status: 'upcoming',
        demoLink: null
    },
    {
        title: 'Practitioner Verification Process',
        description: 'Create a secure but efficient verification system',
        status: 'upcoming',
        demoLink: null
    },
    {
        title: 'Client File Security System',
        description: 'Create a secure system for sensitive client information',
        status: 'upcoming',
        demoLink: null
    },
    {
        title: 'Form & Questionnaire System',
        description: 'Determine the best approach for complex intake forms',
        status: 'upcoming',
        demoLink: null
    },
    {
        title: 'Circle Community Integration',
        description: 'Assess feasibility of Circle for community features',
        status: 'upcoming',
        demoLink: null
    },
    {
        title: 'Health Fund Integration',
        description: 'Determine complexity of health insurance integration',
        status: 'upcoming',
        demoLink: null
    },
    {
        title: 'Membership & Subscription Model',
        description: 'Test implementation of tiered membership system',
        status: 'upcoming',
        demoLink: null
    },
    {
        title: 'Marketing Site Implementation',
        description: 'Determine the optimal approach for marketing site integration',
        status: 'upcoming',
        demoLink: null
    }
];

// Sort spikes by status (completed first, then in-progress, then upcoming)
const sortedTechSpikes = [...techSpikes].sort((a, b) => {
    const statusPriority = { 'completed': 0, 'in-progress': 1, 'upcoming': 2 };
    return statusPriority[a.status] - statusPriority[b.status];
});

// Calculate completion statistics
const completedSpikes = techSpikes.filter(spike => spike.status === 'completed').length;
const inProgressSpikes = techSpikes.filter(spike => spike.status === 'in-progress').length;
const upcomingSpikes = techSpikes.filter(spike => spike.status === 'upcoming').length;
const completionPercentage = Math.round((completedSpikes / techSpikes.length) * 100);

// Helper function to get status-based styling
const getStatusClasses = (status) => {
    switch(status) {
        case 'completed':
            return {
                bg: 'bg-green-100',
                text: 'text-green-800',
                icon: 'text-green-500'
            };
        case 'in-progress':
            return {
                bg: 'bg-blue-100',
                text: 'text-blue-800',
                icon: 'text-blue-500'
            };
        case 'upcoming':
        default:
            return {
                bg: 'bg-gray-100',
                text: 'text-gray-800',
                icon: 'text-gray-500'
            };
    }
};

// Helper function to get status display text
const getStatusDisplay = (status) => {
    switch(status) {
        case 'completed':
            return 'Completed';
        case 'in-progress':
            return 'In Progress';
        case 'upcoming':
        default:
            return 'Upcoming';
    }
};
</script>

<template>
    <div>
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
            <img src="/images/aeyia-logo.png" alt="Aeyia Logo" class="block h-16 w-auto" />

            <h1 class="mt-8 text-2xl font-medium text-gray-900">
                Kura Project - Technical Spike & Prototype Roadmap
            </h1>

            <p class="mt-6 text-gray-500 leading-relaxed">
                <strong><em>Kura</em></strong>
                <br/>Maori: <i>school</i>
                <br/>Japanese: <i>storehouse</i> or <i>treasure house</i>.
            </p>


            <p class="mt-6 text-gray-500 leading-relaxed">
                The Kura project is the technical spike and prototyping phase for the Aeyia platform.
                This website displays our progress implementing spikes for key technical challenges, laying the path for production development.
            </p>

            <!-- Progress Bar -->
            <div class="mt-8">
                <div class="flex justify-between mb-2">
                    <span class="text-sm font-medium text-gray-700">Tech Spike Progress</span>
                    <span class="text-sm font-medium text-gray-700">{{ completionPercentage }}% Complete ({{ completedSpikes }}/{{ techSpikes.length }})</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2.5">
                    <div class="bg-teal-600 h-2.5 rounded-full" :style="{ width: completionPercentage + '%' }"></div>
                </div>
            </div>

            <!-- Status Summary -->
            <div class="mt-4 flex flex-wrap gap-4">
                <div class="flex items-center">
                    <div class="w-3 h-3 rounded-full bg-green-500 mr-2"></div>
                    <span class="text-sm text-gray-700">{{ completedSpikes }} Completed</span>
                </div>
                <div class="flex items-center">
                    <div class="w-3 h-3 rounded-full bg-blue-500 mr-2"></div>
                    <span class="text-sm text-gray-700">{{ inProgressSpikes }} In Progress</span>
                </div>
                <div class="flex items-center">
                    <div class="w-3 h-3 rounded-full bg-gray-400 mr-2"></div>
                    <span class="text-sm text-gray-700">{{ upcomingSpikes }} Upcoming</span>
                </div>
            </div>
        </div>

        <div class="p-6 lg:p-8">
            <h2 class="text-xl font-medium text-gray-900 mb-6">Technical Spikes</h2>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div v-for="(spike, index) in sortedTechSpikes" :key="index" class="border border-gray-200 rounded-lg p-5 shadow-sm hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-start">
                        <div :class="[
                            'flex items-center justify-center rounded-full w-8 h-8 flex-shrink-0 mr-3',
                            getStatusClasses(spike.status).bg
                        ]">
                            <svg v-if="spike.status === 'completed'" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" :class="getStatusClasses(spike.status).icon" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <svg v-else-if="spike.status === 'in-progress'" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" :class="getStatusClasses(spike.status).icon" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                            </svg>
                            <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" :class="getStatusClasses(spike.status).icon" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 3.5a1.5 1.5 0 013 0V4a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-.5a1.5 1.5 0 000 3h.5a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-.5a1.5 1.5 0 00-3 0v.5a1 1 0 01-1 1H6a1 1 0 01-1-1v-3a1 1 0 00-1-1h-.5a1.5 1.5 0 010-3H4a1 1 0 001-1V6a1 1 0 011-1h3a1 1 0 001-1v-.5z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-medium" :class="getStatusClasses(spike.status).text">
                                {{ spike.title }}
                            </h3>
                            <p class="mt-1 text-sm text-gray-600">{{ spike.description }}</p>
                            <div class="mt-3 flex items-center">
                                <span class="text-xs font-medium mr-2 px-2.5 py-0.5 rounded"
                                      :class="[getStatusClasses(spike.status).bg, getStatusClasses(spike.status).text]">
                                    {{ getStatusDisplay(spike.status) }}
                                </span>
                                <a
                                    v-if="spike.demoLink"
                                    :href="spike.demoLink"
                                    target="_blank"
                                    class="text-xs text-blue-600 hover:underline ml-2"
                                >
                                    {{ spike.status == 'completed' ? "View →" :  "View Demo →" }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal has been removed and replaced with a dedicated page -->
    </div>
</template>

<style scoped>
/* Any additional custom styles can go here */
</style>
