<template>

    <Head title="Ver Ordenador" />

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

                    <p class="text-xl mt-4 text-teal-600">Conexión</p>

                    <p class="mt-1 text-2xl">{{ props.dispositivo.conexion }}</p>
                    
                    <p class="mt-4 text-xl text-teal-600">Zona de Trabajo</p>

                    <p class="mt-1 text-2xl">{{ props.dispositivo.zona_trabajo }}</p>

                    <p class="mt-4 text-xl text-teal-600">Tipo de Conexión</p>

                    <p class="mt-1 text-2xl">{{ props.dispositivo.conexion }}</p>

                    <p class="mt-4 text-xl text-teal-600">IPs</p>

                    <p v-if="props.ordenador.ip_secundaria == null" class="mt-1 text-2xl"> {{ props.ordenador.ip_principal }} | No tiene IP secundaria </p>

                    <p v-else class="mt-1 text-2xl">{{ props.ordenador.ip_principal }} | {{ props.ordenador.ip_secundaria }} </p>

                    <p class="mt-4 text-xl text-teal-600">Procesador</p>

                    <p class="mt-1 text-2xl">{{ props.ordenador.procesador }}</p>

                    <p class="mt-4 text-xl text-teal-600">Sistema Operativo</p>

                    <p class="mt-1 text-2xl">{{ props.ordenador.so }}</p>

                    <p class="mt-4 text-xl text-teal-600">RAM</p>

                    <p class="mt-1 text-2xl">{{ props.ordenador.ram }}</p>

                    <p class="mt-4 text-xl mt-4 text-teal-600">Disco Duro</p>

                    <p class="mt-1 text-2xl">{{ props.ordenador.discoduro }}</p>

                    <p class="mt-4 text-xl text-teal-600">Programa Ofimática</p>

                    <p class="mt-1 text-2xl">{{ props.ordenador.programa_ofimatica }}</p>

                    <p class="mt-4 text-xl text-teal-600">Licencia Office</p>

                    <p  v-if="props.ordenador.licencia_office == null" >No hay licencia de Office añadida.</p>

                    <p v-else  class="mt-1 text-2xl">{{ props.ordenador.licencia_office }}</p>

                </div>

                <div>

                    <p class="mt-4 text-xl text-teal-600">Licencia Windows</p>

                    <p  v-if="props.ordenador.licencia_windows == null" >No hay licencia de Windows añadida.</p>

                    <p v-else  class="mt-1 text-2xl">{{ props.ordenador.licencia_windows }}</p>

                    <p class="mt-4 text-xl text-teal-600">Correo Office</p>

                        <p  v-if="props.ordenador.correo_office == null" >No hay licencia de Windows añadida.</p>

                        <p v-else  class="mt-1 text-2xl">{{ props.ordenador.correo_office }}</p>

                    <p class="mt-4 text-xl text-teal-600">Dominio/Grupo de Trabajo</p>

                    <p class="mt-1 text-2xl">{{ props.ordenador.dominio }}</p>

                    <p class="mt-4 text-xl text-teal-600">Usuario Principal</p>

                    <p class="mt-1 text-2xl">{{ props.ordenador.usuario_principal }}</p>

                    <p class="mt-4 text-xl text-teal-600">Usuario Dominio</p>

                    <p class="mt-1 text-2xl">{{ props.ordenador.usuario_dominio }}</p>

                    <p class="mt-4 text-xl mt-4 text-teal-600">Departamento</p>

                    <p class="mt-1 text-2xl">{{ props.ordenador.departamento }}</p>

                    <p class="mt-4 text-xl text-teal-600">Pertenece al Cabildo</p>

                    <p class="mt-1 text-2xl">{{ props.ordenador.cabildo }}</p>

                    <p class="mt-4 text-xl text-teal-600">Fecha de Instalación</p>

                    <p class="mt-1 text-2xl">{{ props.ordenador.fecha_instalacion }}</p>

                    <p class="mt-4 text-xl text-teal-600">Técnico Informático</p>

                    <p class="mt-1 text-2xl">{{ props.ordenador.tecnico_informatico }}</p>

                    <p class="mt-4 text-xl text-teal-600">Observaciones</p>

                    <p class="mt-1 text-2xl" v-if="props.ordenador.observaciones">{{ props.ordenador.observaciones }}</p>

                    <p class="mt-1 text-xl" v-else>No hay observaciones añadidas.</p>

                    <p class="mt-4 text-xl text-teal-600">QR</p>

                    <Qrcode :size=150 :value="`/localhost/ordenador/mostrar/${dispositivo.id}`"></Qrcode>

                    <div class="mt-5">

                        <Link :href="`/ordenador/actualizar/${dispositivo.id}`" class="p-2 bg-teal-600 border border-transparent rounded-md font-semibold text-lg text-white hover:bg-teal-700 focus:bg-teal-700 active:bg-teal-900 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 ease-out duration-300">Editar</Link>
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
    import { Link, Head,router} from '@inertiajs/vue3';
    import Qrcode from 'qrcode.vue';

    const props = defineProps({


        dispositivo: Object,
        ordenador: Object,

    });

    let eliminar = async function(id) {

        router.delete(`/ordenadores/borrar/${id}`,{

        onBefore: () => confirm('¿Estás seguro de borrar este dispositivo?')
});

}

</script>