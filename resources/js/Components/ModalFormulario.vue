<template>
<div>
    <div id="modal" class="modal-bg" v-if="modalAbierto">
        <div class="modal">
            <form @submit.prevent="anadirprograma">

                <h2 class="text-xl">Añadir Programa Ofimática</h2>
                <p class="text-lg">Nombre:</p>
                <input v-model="formPrograma.nombre" type="text" class="block appearance-none w-80 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600"/>
                <button type="submit" class="p-2 bg-teal-600 border border-transparent rounded-md font-semibold text-lg text-white hover:bg-teal-700 focus:bg-teal-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 ease-out duration-300">Añadir</button>
            </form>
        
        </div>
    </div>
</div>
</template>

<script setup>

const formPrograma = useForm({

nombre:''

});

const anadirprograma = () => {

formPrograma.post('/programa/crear')   

}
</script>