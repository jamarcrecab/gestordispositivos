<template>

    <Head title="Index"/>

    <Layout>
        <div class="flex flex-row justify-start overflow gap-5 xl:justify-end">
            <Link href="/dispositivos/crear" type="submit" class="bg-teal-600 border border-transparent rounded-md font-semibold text-base text-white mt-2 hover:bg-teal-700 focus:bg-teal-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 ease-out duration-300 sm:p-2 text-lg md:p-2 text-lg xl:p-2 text-lg 2xl:p-2 text-lg ">Añadir Dispositivo</Link>
            <Link href="/registro" type="submit" class="bg-gray-600 border border-transparent rounded-md font-semibold text-base text-white mt-2 p-2 hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 ease-out duration-300 sm:p-2 text-lg md:p-2 text-lg xl:p-2 text-lg 2xl:p-2 text-lg">Añadir Usuario</Link>
            <Link href="/departamentos" type="submit" class="bg-teal-600 border border-transparent rounded-md font-semibold text-base text-white mt-2 hover:bg-teal-700 focus:bg-teal-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 ease-out duration-300 sm:p-2 text-lg md:p-2 text-lg xl:p-2 text-lg 2xl:p-2 text-lg ">Añadir Departamento</Link>
            <Link href="/zonas" type="submit" class="bg-gray-600 border border-transparent rounded-md font-semibold text-base text-white mt-2 p-2 hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 ease-out duration-300 sm:p-2 text-lg md:p-2 text-lg xl:p-2 text-lg 2xl:p-2 text-lg">Añadir Zona</Link>
            
        </div>

        <div v-show="mensajeenviado"></div>

            <TabsWrapper>
            <Tab title="Dispositivos">

            <TablaDispositivos :dispositivos='dispositivos' :busqueda="busqueda"/>

            </Tab>

            <Tab title="Tarjetas">
            
                <div>
                    <h2>HOla</h2>
                </div>


            </Tab>
        </TabsWrapper>
                
            

    </Layout>
         

</template>

<script setup>


    //Módulos Importados

    import Layout from '../Layouts/Layout.vue';
    import { Head,Link,router, usePage, useForm} from '@inertiajs/vue3';
    import { ref,defineProps, watch } from 'vue';
    import { useToastr } from '../toastr.js';
    import TablaDispositivos from '../Components/TablaDispositivos.vue'; 
    import Tab from '../Components/Tab.vue';
    import TabsWrapper from '../Components/TabsWrapper.vue';

    
    //Constantes 
    const toastr = useToastr();

    const page = usePage();

    const mensaje = page.props.mensaje;

    //Funcion para generar las propiedades obtenidas del controlador

     defineProps({

        dispositivos: Object,
    });

    if(mensaje != null){

       const mensajeenviado = toastr.success(mensaje);
    };


    //Función para eliminar un dispositivo de la tabla dispositivos
     
  let eliminar = async function(id) {

    router.delete(`/dispositivos/borrar/${id}`,{

    onBefore: () => confirm('¿Estás seguro de borrar este dispositivo?')

  });

}

</script>
