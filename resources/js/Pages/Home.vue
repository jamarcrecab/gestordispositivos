<template>

    <Head title="Index"/>

    <Layout>
        <div class="flex flex-row justify-start overflow gap-5 xl:justify-end">
            <Link href="/dispositivos/crear" type="submit" class="bg-teal-600 border border-transparent rounded-md font-semibold text-base text-white mt-2 hover:bg-teal-700 focus:bg-teal-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 ease-out duration-300 sm:p-2 text-lg md:p-2 text-lg xl:p-2 text-lg 2xl:p-2 text-lg ">Añadir Dispositivo</Link>
            <Link href="/usuario" type="submit" class="bg-gray-600 border border-transparent rounded-md font-semibold text-base text-white mt-2 p-2 hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 ease-out duration-300 sm:p-2 text-lg md:p-2 text-lg xl:p-2 text-lg 2xl:p-2 text-lg">Añadir Usuario</Link>
            <Link href="/departamentos" type="submit" class="bg-teal-600 border border-transparent rounded-md font-semibold text-base text-white mt-2 hover:bg-teal-700 focus:bg-teal-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 ease-out duration-300 sm:p-2 text-lg md:p-2 text-lg xl:p-2 text-lg 2xl:p-2 text-lg ">Añadir Departamento</Link>
            <Link href="/zonas" type="submit" class="bg-gray-600 border border-transparent rounded-md font-semibold text-base text-white mt-2 p-2 hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 ease-out duration-300 sm:p-2 text-lg md:p-2 text-lg xl:p-2 text-lg 2xl:p-2 text-lg">Añadir Zona</Link>
            
            <div class="relative">
                <i class="absolute fa fa-search text-gray-400 top-5 left-4"></i>
                <input type="text"  v-model="busqueda" class="bg-white h-14 w-full px-12 rounded-lg focus:shadow-outline-teal-600 hover:cursor-pointer" name="">
            </div>

        </div>

        <div class="overflow-auto rounded-lg shadow mt-7">

            <div v-show="mensajeenviado"></div>
            
            <table class="w-full mt-3 border-separate border-spacing-2">

                <thead class="bg-gray-50 border-b-2 border-gray-200">

                    <tr>
                        <th class="w-auto p-3 text-lg font-semibold tracking-wide text-left text-white bg-teal-600">ID</th>
                        <th class="w-auto p-3 text-lg font-semibold tracking-wide text-left text-white bg-teal-600">Nombre Dispositivo</th>
                        <th class="w-auto p-3 text-lg font-semibold tracking-wide text-left text-white bg-teal-600">Numero Serie</th>
                        <th class="w-auto p-3 text-lg font-semibold tracking-wide text-left text-white bg-teal-600">Tipo Dispositivo</th>
                        <th class="w-auto p-3 text-lg font-semibold tracking-wide text-left text-white bg-teal-600">Zona Trabajo</th>
                        <th class="w-auto p-3 text-lg font-semibold tracking-wide text-left text-white bg-teal-600">Administrar</th>

                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr v-for="dispositivo in dispositivos.data" :key="dispositivo.id" class="bg-gray-100 border-b border-gray-200">
                        <td class="p-3 text-xl text-gray-700 whitespace-nowrap">
                            {{dispositivo.id}}
                        </td>
                        
                        <td class="p-3 text-xl text-gray-700 whitespace-nowrap">
                            {{dispositivo.nombre_dispositivo}}
                        </td>

                        <td class="p-3 text-xl text-gray-700 whitespace-nowrap">
                            {{dispositivo.numero_serie}}
                        </td>
                        <td class="p-3 text-xl text-gray-700 whitespace-nowrap">
                            {{dispositivo.tipo_dispositivo}}
                        </td>
                        <td class="p-3 text-xl text-gray-700 whitespace-nowrap">
                            {{dispositivo.zona_trabajo}}
                        </td>
                        <td class="flex justify-evenly p-3 text-xl text-gray-700 whitespace-nowrap">
                            <div v-if="dispositivo.tipo_dispositivo === 'Ordenador'" class="flex flex-row gap-10">
                                <div class="w-2 transform hover:text-blue-500 hover:scale-110">
                                    <Link :href="`/ordenador/mostrar/${dispositivo.id}`">
                                        <i class="fa-regular fa-eye"></i>
                                    </Link>
                                </div>

                                <div class="w-2 transform hover:text-green-500 hover:scale-110">
                                    <Link :href="`/ordenador/actualizar/${dispositivo.id}`" >
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </Link>
                                </div>
                                <div class="w-2 transform hover:text-red-500 hover:scale-110">
                                <button type="buttton" data-toggle="modal" data-target="#modal" @click="eliminar(dispositivo.id)">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                                </div>
                            </div>
                        
                    
                            <div v-else-if="dispositivo.tipo_dispositivo === 'Grabadora'" class="flex flex-row gap-10">
                                <div class="w-2 transform hover:text-blue-500 hover:scale-110">
                                    <Link :href="`/grabadora/mostrar/${dispositivo.id}`">
                                        <i class="fa-regular fa-eye"></i>
                                    </Link>
                                </div>

                                <div class="w-2 transform hover:text-green-500 hover:scale-110">
                                    <Link :href="`/grabadora/actualizar/${dispositivo.id}`" >
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </Link>
                                </div>
                                <div class="w-2 transform hover:text-red-500 hover:scale-110">
                                <button type="buttton" data-toggle="modal" data-target="#modal" @click="eliminar(dispositivo.id)">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                                </div>

                            </div>

                            <div v-else-if="dispositivo.tipo_dispositivo === 'Impresora'" class="flex flex-row gap-10">
                                <div class="w-2 transform hover:text-blue-500 hover:scale-110">
                                    <Link :href="`/impresora/mostrar/${dispositivo.id}`">
                                        <i class="fa-regular fa-eye"></i>
                                    </Link>
                                </div>

                                <div class="w-2 transform hover:text-green-500 hover:scale-110">
                                    <Link :href="`/impresora/actualizar/${dispositivo.id}`" >
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </Link>
                                </div>
                                <div class="w-2 transform hover:text-red-500 hover:scale-110">
                                <button type="buttton" data-toggle="modal" data-target="#modal" @click="eliminar(dispositivo.id)">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                                </div>
                            </div>

                            <div v-else-if="dispositivo.tipo_dispositivo === 'Teléfono'" class="flex flex-row gap-10">
                                <div class="w-2 transform hover:text-blue-500 hover:scale-110">
                                    <Link :href="`/telefono/mostrar/${dispositivo.id}`">
                                        <i class="fa-regular fa-eye"></i>
                                    </Link>
                                </div>

                                <div class="w-2 transform hover:text-green-500 hover:scale-110">
                                    <Link :href="`/telefono/actualizar/${dispositivo.id}`" >
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </Link>
                                </div>
                                <div class="w-2 transform hover:text-red-500 hover:scale-110">
                                <button type="buttton" data-toggle="modal" data-target="#modal" @click="eliminar(dispositivo.id)">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                                </div>
                            </div>

                            <div v-else-if="dispositivo.tipo_dispositivo === 'Máquina de Fichar'" class="flex flex-row gap-10">
                                <div class="w-2 transform hover:text-blue-500 hover:scale-110">
                                    <Link :href="`/maquina-fichar/mostrar/${dispositivo.id}`">
                                        <i class="fa-regular fa-eye"></i>
                                    </Link>
                                </div>

                                <div class="w-2 transform hover:text-green-500 hover:scale-110">
                                    <Link :href="`/maquina-fichar/actualizar/${dispositivo.id}`" >
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </Link>
                                </div>
                                <div class="w-2 transform hover:text-red-500 hover:scale-110">
                                <button type="buttton" data-toggle="modal" data-target="#modal" @click="eliminar(dispositivo.id)">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                                </div>
                            </div>
                            
                        </td> 

                    </tr> 
                </tbody>
            </table>
        </div>
        
            <div class="fixed bottom-0 left-10 mb-16">

                <Link
                :is="link.url ? 'Link' : 'span'"
                v-for="link in dispositivos.links"
                :key="link.id"
                :href="link.url"
                v-html="link.label"
                class="text-black bg-white hover:bg-teal-600 focus:ring-4 border-0 border-b-2 border-teal-600 focus:ring-teal-500 font-medium rounded-lg px-5 py-2.5 mr-2 mb-2 dark:bg-white dark:hover:bg-white focus:outline-none dark:focus:ring-teal-500"
                :class="{ 'text-gray-500': ! link.url, 'font-bold, text-teal-500' : link.active}"
                />

            </div>

    </Layout>
         

</template>

    <script setup>


    //Módulos Importados

    import Layout from '../Layouts/Layout.vue';
    import { Head,Link,router, usePage, useForm} from '@inertiajs/vue3';
    import { ref,defineProps, watch } from 'vue';
    import { useToastr } from '../toastr.js';
    
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


    //Variable busqueda y funcion busqueda en tiempo real
    
    let busqueda = ref('');

    watch(busqueda,(value) =>{

       router.get('/dispositivos',{ busqueda: value},
       {
        preserveState: true,
        replace: true

       });

    },300);

    //Función para eliminar un dispositivo de la tabla dispositivos
     
  let eliminar = async function(id) {

    router.delete(`/dispositivos/borrar/${id}`,{

    onBefore: () => confirm('¿Estás seguro de borrar este dispositivo?')

  });

}

</script>
