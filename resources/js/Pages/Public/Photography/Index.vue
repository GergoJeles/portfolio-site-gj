<script setup>
import { ref } from "vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Head } from "@inertiajs/vue3";

// Import the image(s) from the directory
import prague1 from "@/Pages/Public/Photography/img/prague1.jpg";
import prague2 from "@/Pages/Public/Photography/img/prague2.jpg";
// Repeat the above import statement for each image you have

// Reactive data for the modal visibility and content
const showModal = ref(false);
const modalContent = ref({});

// Function to open the modal with the clicked image
const openModal = (imageSrc, imageAlt) => {
    modalContent.value = { src: imageSrc, alt: imageAlt };
    showModal.value = true;
};

// Function to close the modal
const closeModal = () => {
    showModal.value = false;
};
</script>

<template>
    <Head title="Photography" />

    <GuestLayout>
        <!-- ... rest of your template ... -->

        <!-- Images grid -->
        <div class="container mx-auto p-5">
            <div
                class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4"
            >
                <!-- Clickable Image -->
                <div
                    class="overflow-hidden cursor-pointer"
                    @click="openModal(prague1, 'Prague')"
                >
                    <img
                        class="w-full object-cover transition-transform duration-300 hover:scale-110"
                        :src="prague1"
                        alt="Prague"
                    />
                </div>
                <!-- Clickable Image -->
                <div
                    class="overflow-hidden cursor-pointer"
                    @click="openModal(prague2, 'Prague')"
                >
                    <img
                        class="w-full object-cover transition-transform duration-300 hover:scale-110"
                        :src="prague2"
                        alt="Prague"
                    />
                </div>
                <!-- ... more images ... -->
            </div>
        </div>

        <!-- Modal -->
        <div
            v-if="showModal"
            class="fixed inset-0 bg-black bg-opacity-50 overflow-y-auto h-full w-full"
            @click.self="closeModal"
        >
            <div
                class="relative top-20 mx-auto p-5 border w-11/12 shadow-lg rounded-md bg-white"
            >
                <div class="mt-3 text-center">
                    <div
                        class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100"
                    >
                        <!-- Close button (optional) -->
                        <button
                            @click="closeModal"
                            class="absolute top-0 right-0 m-4"
                        >
                            X
                        </button>
                    </div>
                    <!-- Modal content -->
                    <h3
                        class="text-lg leading-6 font-medium text-gray-900"
                        v-text="modalContent.alt"
                    ></h3>
                    <div class="mt-2">
                        <img
                            :src="modalContent.src"
                            :alt="modalContent.alt"
                            class="w-full object-cover"
                        />
                        <p class="text-sm text-gray-500">Prague</p>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
