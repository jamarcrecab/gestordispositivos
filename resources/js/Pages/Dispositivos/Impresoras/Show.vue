<template>

    <Head title="Ver Impresora" />

    <Layout>

    <div class="flex flex-row justify-stretch">

        <div class="container mx-auto overflow ">

            <h3 class="text-3xl mt-12 font-bold text-neutral-800">{{ props.dispositivo.nombre_dispositivo }}</h3>

            <div class="w-auto flex flex-col justify-start mb-10 mt-7 bg-gray-50 shadow-md p-10 md:flex-row w-2/3 lg:w-2/3 xl:w-2/3 2xl:w-2/3">

                <div class="pr-20">

                    <p class="text-xl mt-4 text-teal-600">Tipo de Dispositivo</p>

                    <p class="mt-1 text-2xl">{{ props.dispositivo.tipo_dispositivo }}</p>

                    <p class="text-xl mt-4 text-teal-600">Número de Serie</p>

                    <p class="mt-1 text-2xl">{{ props.dispositivo.numero_serie }}</p>

                    <p class="mt-4 text-xl text-teal-600">Tipo de Conexión</p>

                    <p class="mt-1 text-2xl">{{ props.dispositivo.conexion }}</p>

                    <p class="mt-4 text-xl text-teal-600">Marca</p>

                    <p  class="mt-1 text-2xl">{{ props.impresora.marca }}</p>

                    <p class="mt-4 text-xl text-teal-600">Zona Trabajo</p>

                    <p  class="mt-1 text-2xl">{{ props.dispositivo.zona_trabajo }}</p>

                    <p class="mt-4 text-xl text-teal-600">Marca</p>

                    <p  class="mt-1 text-2xl">{{ props.impresora.marca }}</p>

                    <p class="mt-4 text-xl text-teal-600">Modelo</p>

                    <p  class="mt-1 text-2xl">{{ props.impresora.modelo }}</p>

                    <p class="mt-4 text-xl text-teal-600">IP'S</p>

                    <p v-if="props.impresora.ip_secundaria == null" class="mt-1 text-2xl"> {{ props.impresora.ip_principal }} | No tiene IP secundaria </p>

                    <p v-else class="mt-1 text-2xl">{{ props.impresora.ip_principal }} | {{ props.impresora.ip_secundaria }} </p>

                    <p class="mt-4 text-xl text-teal-600">Pertenece al Cabildo</p>

                    <p class="mt-1 text-2xl">{{ props.impresora.cabildo }}</p>

                    <p class="mt-4 text-xl text-teal-600">Observaciones</p>

                    <p class="mt-1 text-2xl" v-if="props.impresora.observaciones">{{ props.impresora.observaciones }}</p>

                    <p class="mt-1 text-xl" v-else>No hay observaciones añadidas.</p>

                    <p class="mt-4 text-xl text-teal-600">QR</p>

                    <Qrcode :size=150 :value="`/localhost/impresora/mostrar/${dispositivo.id}`"></Qrcode>

                    <div class="mt-5">

                        <Link :href="`/impresora/actualizar/${dispositivo.id}`" class="p-2 bg-teal-600 border border-transparent rounded-md font-semibold text-lg text-white hover:bg-teal-700 focus:bg-teal-700 active:bg-teal-900 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 ease-out duration-300">Editar</Link>
                        <Link  @click="eliminar(props.dispositivo.id)" class="ml-4 p-2 bg-red-600 border border-transparent rounded-md font-semibold text-lg text-white hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 ease-out duration-300">Borrar</Link>

                    </div>

                </div>
            </div>

        </div>

    </div>
    </Layout>

</template>

<script setup>

    import Layout from '../../../Layouts/Layout.vue';
    import { Link, Head,router, usePage} from '@inertiajs/vue3';
    import Qrcode from 'qrcode.vue';

    const props = defineProps({


        dispositivo: Object,
        impresora: Object,

    })

    const page = usePage();

    console.log(page.props.dispositivo);

    
    let eliminar = async function(id) {

        router.delete(`/impresoras/eliminar/${id}`,{

        onBefore: () => confirm('¿Estás seguro de borrar este dispositivo?')
});

}


</script>