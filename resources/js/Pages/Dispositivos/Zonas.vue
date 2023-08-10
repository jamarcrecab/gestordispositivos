<template>

    <Head title="Crear Zona de Trabajo"></Head>

    <Layout>

    <div class="container mx-auto">
        <div class="d-flex">
            <div>
                <h3 class="text-3xl mt-12 font-bold text-neutral-800">Añadir Zona de Trabajo</h3>
            </div>
            <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 p-5 rounded relative w-auto md: w-1/3 lg:w-2/3 mt-4" role="alert">
                <strong class="font-bold">¡Importante! </strong>
                <span class="block sm:inline">Comprobar antes de añadir el departamento que no se haya añadido anteriormente uno parecido. Para comprobarlo revisar el campo "Zona de trabajo" en el formulario.</span>
            </div>
        </div>
        
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