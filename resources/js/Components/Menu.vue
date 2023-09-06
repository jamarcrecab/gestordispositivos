<template>
    
    <nav class="flex bg-teal-600 p-8 justify-between align-center">
        <ApplicationWhiteLogo/>
        <p class="text-2xl text-white text-center mt-5">Hola de nuevo, {{username}}</p>
        <p class="font-bold text-3xl mt-5 text-white text-center">Gestor de Dispositivos</p>
        <button class="text-2xl underline text-white text-center">Cerrar Sesión</button>
    
        
    </nav>

</template>

<script>

    import ApplicationWhiteLogo from './ApplicationWhiteLogo.vue';


    export default {

        components: { Menu},

        props: { username: String }



    }

</script>