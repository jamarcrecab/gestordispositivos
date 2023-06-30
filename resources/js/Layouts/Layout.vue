
<template>
    
    <header class="flex bg-teal-600 gap-4 p-8 justify-between align-center w-screen">
            <ApplicationWhiteLogo />
            <p class="font-bold text-3xl text-white text-center mt-6">Gestor de Dispositivos</p>
            <div class="flex justify-items-end">
            <p class="text-2xl hidden text-white text-center mt-7 mr-6 sm:hidden 2xl:block xl:block">Hola de nuevo, {{usuario}}</p>
            <LogOut />
            </div>
    </header>
    
    <section class="p-6">

        <slot />

    </section>

</template>


<script setup>

import ApplicationWhiteLogo  from '../Components/ApplicationWhiteLogo.vue';

</script>

<script>

import LogOut from '../Components/LogOut.vue';
export default {


    computed: {

        usuario() {

            return this.$page.props.auth.user.name

        }

    }

}

</script>


