<template>

    <Head title="Crear Dispositivo"></Head>

    <Layout>

    <div class="container mx-auto">
        <h3 class="text-3xl mt-12 font-bold text-neutral-800">Añadir Zona de Trabajo</h3>

        <form  @submit.prevent="submit" class="w-auto flex flex-col justify-start text-teal-600 mb-10 mt-7 bg-gray-50 shadow-md p-10 md:flex-row w-2/3 lg:w-2/3">
                <div class="pr-20">
                    <div class="mt-4">
                        <label for="conexion" class="text-lg mb-3">Nombre Zona</label>
                        <input v-model="form.nombre" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="form.errors.nombre" v-text="form.errors.nombre" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                    </div>

                    <div class="mt-4">

                        <button type="submit" class="p-2 bg-teal-600 border border-transparent rounded-md font-semibold text-lg text-white hover:bg-teal-700 focus:bg-teal-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 ease-out duration-300">Crear</button>

                    </div>
                </div>
        </form>
    </div>

    </Layout>
</template>

<script setup>

import { useForm,Head } from '@inertiajs/vue3';
import  Layout  from '../../Layouts/Layout.vue';


let form = useForm({

        nombre:'',

});

let submit = () => {

    form.post('/zonas');

}


</script>