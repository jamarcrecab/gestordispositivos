<template>

    <Head title="Editar Máquina de Fichar"></Head>

    <Layout>

        <div class="container mx-auto">
            <h3 class="text-3xl mt-12 font-bold text-neutral-800">Editar {{props.dispositivo.nombre_dispositivo }}</h3>
        
            <form  @submit.prevent="submit" class="flex flex-col justify-start text-teal-600 mb-10 mt-7 bg-gray-50 shadow-md p-10 md:flex-row w-auto sm:w-2/3 md:w-2/5 lg:w-2/4 xl:w-2/5 2xl:w-2/5">
                <div class="pr-20">
                    <div class="mt-4">

                        <label for="numero_serie" class="text-lg mb-3">Numero de Serie (Opcional)</label>
                        <input v-model="form.numero_serie" type="text" class="block appearance-none w-80 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600"/>

                        <div v-if="form.errors.numero_serie" v-text="form.errors.numero_serie" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="conexion" class="text-lg mb-3">Conexión</label>
                        <input v-model="form.conexion" type="text" class="block appearance-none w-80 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-teal-600 focus:shadow-outline-teal-600"/>

                        <div v-if="form.errors.conexion" v-text="form.errors.conexion" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="zonatrabajo" class="text-lg mb-3">Zona de Trabajo</label>
                        <select v-model="form.zona_trabajo" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80">
                            <option v-for="zona_trabajo in zonas" :value="zona_trabajo.nombre" :key="zona_trabajo.id">{{ zona_trabajo.nombre }}</option>
                        </select>

                        <div v-if="form.errors.zona_trabajo" v-text="form.errors.zona_trabajo" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80  md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                        
                    </div>

                    <div class="mt-4">
                        <label for="ip_principal" class="text-lg mb-3">IP Principal</label>
                        <input  v-model="form.ip_principal" type="text" class="block appearance-none w-80 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-teal-600 focus:shadow-outline-teal-600"/>

                        <div v-if="form.errors.ip_principal" v-text="form.errors.ip_principal" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="observaciones" class="text-lg mb-3">Observaciones (Opcional)</label>
                        <textarea name="observaciones" v-model="form.observaciones" class="block appearance-none w-80 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-teal-600 focus:shadow-outline-teal-600" placeholder="Deja aquí las observaciones..."></textarea>

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

import { useForm,Head } from '@inertiajs/vue3';
import  Layout  from '../../../Layouts/Layout.vue';
import PrimaryButton from '../../../Components/PrimaryButton.vue';


    const zonas = ref([]);

    const getZonas = async () => {

    await axios.get('/api/zonas').then(response => {

    zonas.value = response.data;

    });


    onMounted(() => {

        getZonas();

        }) 
    };


    let props = defineProps({

        dispositivo:Object,
        maquinafichar:Object

    });


    let form = useForm({

    nombre_dispositivo:props.dispositivo.nombre_dispositivo,
    numero_serie: props.dispositivo.numero_serie,
    tipo_dispositivo: props.dispositivo.tipo_dispositivo,
    conexion:props.dispositivo.conexion,
    zona_trabajo:props.dispositivo.zona_trabajo,
    ip_principal:props.maquinafichar.ip_principal,
    observaciones:props.maquinafichar.observaciones
   
    
});


let submit= () => {

    form.post(`/maquina-fichar/actualizar/${props.dispositivo.id}`);

}

</script>
