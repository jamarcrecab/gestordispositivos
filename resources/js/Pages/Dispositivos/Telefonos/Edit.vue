<template>

    <Head title="Editar Teléfono"></Head>

    <Layout>

    <div class="container mx-auto">
        <h3 class="text-3xl mt-12 font-bold text-neutral-800">Editar {{props.dispositivo.nombre_dispositivo }}</h3>
        
            <form  @submit.prevent="submit" class="w-auto flex flex-col justify-start text-teal-600 mb-10 mt-7 bg-gray-50 shadow-md p-10 md:flex-row w-2/3 lg:w-2/3 xl:w-2/3 2xl:w-2/3">
                <div class="pr-20">
                    <div class="mt-4">
                        <label for="imei" class="text-lg mb-3">IMEI(Opcional)</label>
                        <input v-model="form.numero_serie" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="form.errors.numero_serie" v-text="form.errors.numero_serie" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>

                    </div>

                    <div class="mt-4">
                        <label for="conexion" class="text-lg mb-3">Conexión</label>
                        <input v-model="form.conexion" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="form.errors.conexion" v-text="form.errors.conexion" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80  md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                       
                    </div>

                    <div class="mt-4">
                        <label for="zonatrabajo" class="text-lg mb-3">Departamento</label>
                        <select v-model="form.departamento" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80">
                            <option v-for="departamento in departamentos" :value="departamento.nombre" :key="departamento.id">{{ departamento.nombre }}</option>
                        </select>

                        <div v-if="form.errors.departamento" v-text="form.errors.departamento" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80  md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                        
                    </div>

                    <div class="mt-4">
                        <label for="zonatrabajo" class="text-lg mb-3">Zona de Trabajo</label>
                        <select v-model="form.zona_trabajo" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80">
                            <option v-for="zona_trabajo in zonas" :value="zona_trabajo.nombre" :key="zona_trabajo.id">{{ zona_trabajo.nombre }}</option>
                        </select>

                        <div v-if="form.errors.zona_trabajo" v-text="form.errors.zona_trabajo" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80  md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                        
                    </div>

                    <div class="mt-4">
                        <label for="marca" class="text-lg mb-3">Marca</label>
                        <input v-model="form.marca" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="form.errors.marca" v-text="form.errors.marca" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                    </div>
                </div>

                <div>

                    <div class="mt-4">
                        <label for="modelo" class="text-lg mb-3">Modelo</label>
                        <input v-model="form.modelo" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="form.errors.modelo" v-text="form.errors.modelo" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="usuario_principal" class="text-lg mb-3">Usuario Principal</label>
                        <input v-model="form.usuario_principal" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="form.errors.usuario_principal" v-text="form.errors.usuario_principal" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="telefono" class="text-lg mb-3">Número de Teléfono</label>
                        <input v-model="form.numero_telefono" type="tel" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="form.errors.numero_telefono" v-text="form.errors.numero_telefono" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="departamento" class="text-lg mb-3">Correo (Opcional)</label>
                        <input v-model="form.correo" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="form.errors.correo" v-text="form.errors.correo" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
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

    import { useForm,Head } from '@inertiajs/vue3';
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
        telefono: Object

    })


    let form = useForm({

    nombre_dispositivo:props.dispositivo.nombre_dispositivo,
    numero_serie: props.dispositivo.numero_serie,
    tipo_dispositivo:props.dispositivo.tipo_dispositivo,
    conexion:props.dispositivo.conexion,
    zona_trabajo:props.dispositivo.zona_trabajo,
    departamento:props.telefono.departamento,
    marca:props.telefono.marca,
    modelo:props.telefono.modelo,
    usuario_principal:props.telefono.usuario_principal,
    numero_telefono:props.telefono.numero_telefono,
    correo:props.telefono.correo,
    observaciones:props.telefono.observaciones,
});


let submit= () => {

    form.post(`/telefono/actualizar/${props.dispositivo.id}`);

}

console.log(props.telefono);

</script>
