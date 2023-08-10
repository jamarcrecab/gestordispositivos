<template>

    <Head title="Editar Ordenador"></Head>

    <Layout>

    <div class="container mx-auto">
        <h3 class="text-3xl mt-12 font-bold text-neutral-800">Editar {{ props.dispositivo.nombre_dispositivo }}</h3>
        
            <form  @submit.prevent="submit" class="w-auto flex flex-col justify-start text-teal-600 mb-10 mt-7 bg-gray-50 shadow-md p-10 md:flex-row w-2/3 lg:w-2/3 xl:w-2/3 2xl:w-2/3">
                <div class="pr-20">

                    <div class="mt-4">
                        <label for="nombre_dispositivo" class="text-lg mb-3">Nombre Dispositivo</label>
                        <input v-model="form.nombre_dispositivo" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="form.errors.nombre_dispositivo" v-text="form.errors.nombre_dispositivo" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>

                    </div>
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
                        <label for="ip_secundaria" class="text-lg mb-3">IP Secundaria (Opcional)</label>
                        <input v-model="form.ip_secundaria" type="text" class="block appearance-none w-80 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-teal-600 focus:shadow-outline-teal-600"/>

                        <div v-if="form.errors.ip_secundaria" v-text="form.errors.ip_secundaria" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="procesador" class="text-lg mb-3">Procesador</label>
                        <input v-model="form.procesador" type="text" class="block appearance-none w-80 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-teal-600 focus:shadow-outline-teal-600"/>

                        <div v-if="form.errors.procesador" v-text="form.errors.procesador" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="discoduro" class="text-lg mb-3">Disco Duro</label>
                        <input v-model="form.discoduro" type="text" class="block appearance-none w-80 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-teal-600 focus:shadow-outline-teal-600"/>

                    <div v-if="form.errors.discoduro" v-text="form.errors.discoduro" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="SO" class="text-lg mb-3">Sistema Operativo</label>
                        <input v-model="form.so" type="text" class="block appearance-none w-80 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-teal-600 focus:shadow-outline-teal-600"/>  

                        <div v-if="form.errors.so" v-text="form.errors.so" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="ram" class="text-lg mb-3">RAM</label>
                        <input v-model="form.ram" type="number" class="block appearance-none w-80 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-teal-600 focus:shadow-outline-teal-600"/>

                            <div v-if="form.errors.ram" v-text="form.errors.ram" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">
                            <label for="programaofimatica" class="text-lg mb-3">Programa Ofimática</label>
                            <input v-model="form.programa_ofimatica" type="text" class="block appearance-none w-80 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-teal-600 focus:shadow-outline-teal-600"/>

                        <div v-if="form.errors.programa_ofimatica" v-text="form.errors.programa_ofimatica" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    
                    </div>


                </div>

                      
                <div>
                    
                    <div class="mt-4">
                        <label for="licenciaoffice" class="text-lg mb-3">Licencia Office (Opcional)</label>
                        <input v-model="form.licencia_office" type="text" class="block appearance-none w-80 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-teal-600 focus:shadow-outline-teal-600"/>

                    </div>

                    <div class="mt-4">
                        <label for="licenciawindows" class="text-lg mb-3">Licencia Windows (Opcional)</label>
                        <input v-model="form.licencia_windows" type="text" class="block appearance-none w-80 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-teal-600 focus:shadow-outline-teal-600"/>

                    </div>

                    <div class="mt-4">
                        <label for="licenciawindows" class="text-lg mb-3">Correo Office (Opcional)</label>
                        <input v-model="form.correo_office" type="text" class="block appearance-none w-80 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-teal-600 focus:shadow-outline-teal-600"/>

                    </div>
        
                    <div class="mt-4">
                        <label for="usuarioprincipal" class="text-lg mb-3">Usuario Principal</label>
                        <input v-model="form.usuario_principal" type="text" class="block appearance-none w-80 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-teal-600 focus:shadow-outline-teal-600"/>

                        <div v-if="form.errors.usuario_principal" v-text="form.errors.usuario_principal" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="usuariodominio" class="text-lg mb-3">Usuario Dominio</label>
                        <input v-model="form.usuario_dominio" type="text" class="block appearance-none w-80 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-teal-600 focus:shadow-outline-teal-600"/>

                        <div v-if="form.errors.usuario_dominio" v-text="form.errors.usuario_dominio" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="conexion" class="text-lg">Dominio/Grupo de Trabajo</label>
                        <input v-model="form.dominio" type="text" class="block appearance-none w-80 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-teal-600 focus:shadow-outline-teal-600"/>
                        
                        <div v-if="form.errors.dominio" v-text="form.errors.dominio" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="zonatrabajo" class="text-lg mb-3">Departamento</label>
                        <select v-model="form.departamento" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80">
                            <option v-for="departamento in departamentos" :key="departamento.id">{{ departamento.nombre }}</option>
                        </select>

                        <div v-if="form.errors.departamento" v-text="form.errors.departamento" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80  md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                        
                    </div>

                
                    <div class="mt-4">
                        <label class="text-lg mb-3">Pertenece al Cabildo</label>
                        <div class="d-flex flex-row w-25">

                            <input v-model= form.cabildo type="radio" value="Si" id="si" class="form-check-input">
                            <label class="form-check-label ml-2" for="Si">Si</label>

                            <input v-model=form.cabildo type="radio" value="No" id="no" class="form-check-input ml-4" >
                            <label class="form-check-label ml-2" for="No">No</label>
                        </div>

                        <div v-if="form.errors.cabildo" v-text="form.errors.cabildo" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>

                    </div>

                    
                    <div class="mt-4">
                        <label for="usuarioinstalacion" class="text-lg mb-3">Técnico Informático</label>
                        <input v-model="form.tecnico_informatico" type="text" class="block appearance-none w-80 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-teal-600 focus:shadow-outline-teal-600"/>

                        <div v-if="form.errors.tecnico_informatico" v-text="form.errors.tecnico_informatico" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
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

    import { useForm,Head,usePage } from '@inertiajs/vue3';
    import  Layout  from '../../../Layouts/Layout.vue';
    import PrimaryButton from '../../../Components/PrimaryButton.vue';
    import { onMounted, ref } from 'vue';

    const departamentos = ref([]);
    const zonas = ref([]);

    const getZonas = async () => {

        await axios.get('/api/zonas').then(response => {

        zonas.value = response.data;

        });

    };

    const getDepartamentos = async () => {

        await axios.get('/api/departamentos').then(response => {

        departamentos.value = response.data;

    });

    };

    onMounted(() => {

    getZonas();
    getDepartamentos();

    }) 

    
    let props = defineProps({

        dispositivo:Object,
        ordenador: Object

    })


    let form = useForm({

    nombre_dispositivo:props.dispositivo.nombre_dispositivo,
    numero_serie: props.dispositivo.numero_serie,
    tipo_dispositivo:props.dispositivo.tipo_dispositivo,
    conexion:props.dispositivo.conexion,
    zona_trabajo:props.dispositivo.zona_trabajo,
    ip_principal:props.ordenador.ip_principal,
    ip_secundaria:props.ordenador.ip_secundaria,
    procesador:props.ordenador.procesador,
    discoduro:props.ordenador.discoduro,
    so:props.ordenador.so,
    ram:props.ordenador.ram,
    programa_ofimatica:props.ordenador.programa_ofimatica,
    licencia_office:props.ordenador.licencia_office,
    licencia_windows:props.ordenador.licencia_windows,
    correo_office:props.ordenador.correo_office,
    departamento:props.ordenador.departamento,
    usuario_principal:props.ordenador.usuario_principal,
    usuario_dominio:props.ordenador.usuario_dominio,
    dominio:props.ordenador.dominio,
    cabildo:props.ordenador.cabildo,
    tecnico_informatico:props.ordenador.tecnico_informatico,
    observaciones:props.ordenador.observaciones,
});


let submit= () => {

    form.post(`/ordenador/actualizar/${props.dispositivo.id}`);

}

</script>
