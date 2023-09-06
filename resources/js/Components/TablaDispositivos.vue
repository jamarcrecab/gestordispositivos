<template>

    <div class="overflow-auto rounded-lg shadow mt-7">

        <div class="relative flex flex-row justify-end justify-items-end">
            <i class="relative fa fa-search text-gray-400 top-5 left-8"></i>
            <input type="text"  v-model="busqueda" class="bg-white h-14 w-25  object-right-top px-12 rounded-lg focus:shadow-outline-teal-600 hover:cursor-pointer" placeholder="Buscar Dispositivo..." name="">
        </div>
        
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

</template>

<script setup>

    import { defineProps,ref,watch} from 'vue';
    import { Link, usePage, router } from '@inertiajs/vue3';


    const page = usePage();

    defineProps({

    dispositivos: Object,
    });

    console.log(page.props.dispositivos);

    //Variable busqueda y funcion busqueda en tiempo real
        
    let busqueda = ref('');

    watch(busqueda,(value) =>{

    router.get('/dispositivos',{ busqueda: value},
    {
        preserveState: true,
        replace: true

    });

    },300);


</script>