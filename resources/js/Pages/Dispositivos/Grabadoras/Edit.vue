<template>

    <Head title="Editar grabadora"></Head>
    
        <Layout>
    
            <div class="container mx-auto">
                <h3 class="text-3xl mt-12 font-bold text-neutral-800">Editar {{props.dispositivo.nombre_dispositivo }}</h3>
                
                <form  @submit.prevent="submit" class="w-auto flex flex-col justify-start text-teal-600 mb-10 mt-7 bg-gray-50 shadow-md p-10 md:flex-row w-2/3 lg:w-2/3 xl:w-2/3 2xl:w-2/3">
    
                    <div class="pr-20">
                        <div class="mt-4">
                            <label for="numero_serie" class="text-lg mb-3">Número de Serie (Opcional)</label>
                            <input v-model="form.numero_serie" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>
    
                            <div v-if="form.errors.numero_serie" v-text="form.errors.numero_serie" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
    
                        </div>
    
                        <div class="mt-4">
                            <label for="conexion" class="text-lg mb-3">Conexión</label>
                            <input v-model="form.conexion" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>
    
                            <div v-if="form.errors.conexion" v-text="form.errors.conexion" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                        
                        </div>
    
                        <div class="mt-4">
                            <label for="zonatrabajo" class="text-lg mb-3">Zona de Trabajo</label>
                            <input v-model="form.zona_trabajo" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>
    
                            <div v-if="form.errors.zona_trabajo" v-text="form.errors.zona_trabajo" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                        </div>
    
                        <div class="mt-4">
                            <label for="modelo" class="text-lg mb-3">Modelo</label>
                            <input v-model="form.modelo" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>
    
                            <div v-if="form.errors.modelo" v-text="form.errors.modelo" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                        </div>
    
                        <div class="mt-4">
                            <label for="observaciones" class="text-lg mb-3">Observaciones (Opcional)</label>
                            <textarea name="observaciones" v-model="form.observaciones" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80" placeholder="Deja aquí las observaciones..."></textarea>
    
                        </div>
    
                        <div class="mt-4">
    
                            <PrimaryButton type="submit">Guardar</PrimaryButton>
    
                        </div>
    
                    </div>
    
                </form>
    
            </div>
    
        </Layout>
    </template>
    
    <script setup>
    
    import { useForm,Head, usePage } from '@inertiajs/vue3';
    import  Layout  from '../../../Layouts/Layout.vue';
    import PrimaryButton from '../../../Components/PrimaryButton.vue';
    
        const page = usePage();

        console.log(page.props.grabadora);

    
        let props = defineProps({
    
            dispositivo:Object,
            grabadora:Object
    
        });
    
    
        let form = useForm({
    
        nombre_dispositivo:props.dispositivo.nombre_dispositivo,
        numero_serie: props.dispositivo.numero_serie,
        tipo_dispositivo: props.dispositivo.tipo_dispositivo,
        conexion:props.dispositivo.conexion,
        zona_trabajo:props.dispositivo.zona_trabajo,
        modelo:props.grabadora.modelo,
        observaciones:props.grabadora.observaciones
      
        });
    
    
    let submit= () => {
    
        form.post(`/grabadora/actualizar/${props.dispositivo.id}`);
    
    }
    
    </script>