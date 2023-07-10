<template>

    <Head title="Crear Dispositivo"></Head>

    <Layout>

    <div class="container mx-auto">
        <h3 class="text-3xl mt-12 font-bold text-neutral-800">Añadir Dispositivo</h3>


        <div class="mt-4">
            <label for="tipodispositivo" class="text-lg mb-3 font-bold">Tipo de Dispositivo</label>
            <select v-model="tipodispositivo" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80">
                <option value="Seleccionar">Seleccionar</option>
                <option value="PC">PC</option>
                <option value="Impresora">Impresora</option>
                <option value="MaquinaFichar">Máquina de Fichar</option>
                <option value="Grabadora">Grabadora</option>
                <option value="Telefonia">Teléfonos/Móviles/Tablets</option>
            </select>
        </div>

        <div v-if="tipodispositivo === 'PC'">
            <form  @submit.prevent="submitPC" class="w-auto flex flex-col justify-start text-teal-600 mb-10 mt-7 bg-gray-50 shadow-md p-10 md:flex-row w-2/3 lg:w-2/3">
                <div class="pr-20">
                    <div class="mt-4">
                        <label for="conexion" class="text-lg mb-3">Nombre Dispositivo</label>
                        <input v-model="formPC.nombre_dispositivo" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formPC.errors.nombre_dispositivo" v-text="formPC.errors.nombre_dispositivo" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">

                        <label for="numero_serie" class="text-lg mb-3">Número de Serie (Opcional)</label>
                        <input v-model="formPC.numero_serie" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formPC.errors.numero_serie" v-text="formPC.errors.numero_serie" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">
                            <label for="conexion" class="text-lg mb-3">Conexión</label>
                            <input v-model="formPC.conexion" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formPC.errors.conexion" v-text="formPC.errors.conexion" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                                

                        <div class="mt-4">
                            <label for="zonatrabajo" class="text-lg mb-3">Zona de Trabajo</label>
                            <input v-model="formPC.zona_trabajo" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                            <div v-if="formPC.errors.zona_trabajo" v-text="formPC.errors.zona_trabajo" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                        </div>

                    <div class="mt-4">
                            <label for="ip_principal" class="text-lg mb-3">IP Principal</label>
                            <input  v-model="formPC.ip_principal" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                            <div v-if="formPC.errors.ip_principal" v-text="formPC.errors.ip_principal" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                        </div>

                        <div class="mt-4">
                            <label for="ip_secundaria" class="text-lg mb-3">IP Secundaria (Opcional)</label>
                            <input v-model="formPC.ip_secundaria" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                        </div>

                        <div class="mt-4">
                            <label for="procesador" class="text-lg mb-3">Procesador</label>
                            <input v-model="formPC.procesador" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                            <div v-if="formPC.errors.procesador" v-text="formPC.errors.procesador" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                        </div>

                        <div class="mt-4">
                            <label for="SO" class="text-lg mb-3">Sistema Operativo</label>
                            <input v-model="formPC.so" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                            <div v-if="formPC.errors.so" v-text="formPC.errors.so" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                        </div>

                        <div class="mt-4">
                            <label for="ram" class="text-lg mb-3">RAM</label>
                            <input v-model="formPC.ram" type="number" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                                <div v-if="formPC.errors.ram" v-text="formPC.errors.ram" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                        </div>

                        <div class="mt-4">

                            <label for="discoduro" class="text-lg mb-3">Disco Duro</label>
                            <input v-model="formPC.discoduro" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                            <div v-if="formPC.errors.discoduro" v-text="formPC.errors.discoduro" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>

                        </div>

                        <div class="mt-4">

                            <label for="programa_ofimatica" class="text-lg mb-3">Programa Ofimática</label>
                            <input v-model="formPC.programa_ofimatica" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>
                                
                            <div v-if="formPC.errors.programa_ofimatica" v-text="formPC.errors.programa_ofimatica" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>

                        </div>

                    </div>

                    
                </div>
  
                <div>

                    <div class="mt-4">

                            <label for="licencia_office" class="text-lg mb-3">Licencia Office (Opcional)</label>
                            <input v-model="formPC.licencia_office" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>
                            
                            <div v-if="formPC.errors.licencia_office" v-text="formPC.errors.licencia_office" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">

                        <label for="licencia_windows" class="text-lg mb-3">Licencia Windows (Opcional)</label>
                        <input v-model="formPC.licencia_windows" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>
                        
                        <div v-if="formPC.errors.licencia_windows" v-text="formPC.errors.licencia_windows" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">

                        <label for="correo_office" class="text-lg mb-3">Correo Office (Opcional)</label>
                        <input v-model="formPC.correo_office" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>
                        
                        <div v-if="formPC.errors.correo_office" v-text="formPC.errors.correo_office" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                
                    </div>

                    <div class="mt-4">
                        <label for="conexion" class="text-lg">Dominio/Grupo de Trabajo</label>
                        <input v-model="formPC.dominio" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>
                        
                        <div v-if="formPC.errors.dominio" v-text="formPC.errors.dominio" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="usuarioprincipal" class="text-lg mb-3">Usuario Principal</label>
                        <input v-model="formPC.usuario_principal" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formPC.errors.usuario_principal" v-text="formPC.errors.usuario_principal" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="usuariodominio" class="text-lg mb-3">Usuario Dominio</label>
                        <input v-model="formPC.usuario_dominio" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formPC.errors.usuario_dominio" v-text="formPC.errors.usuario_dominio" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="departamento" class="text-lg mb-3">Departamento</label>
                        <input v-model="formPC.departamento" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formPC.errors.departamento" v-text="formPC.errors.departamento" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label class="text-lg mb-3">Pertenece al Cabildo</label>
                        <div class="d-flex flex-row w-25 mt-4">

                            <input class="form-check-input" v-model="formPC.cabildo" type="radio" value="Si" id="si">
                            <label class="form-check-label ml-2" for="Si">Si</label>

                            <input class="form-check-input ml-4" v-model="formPC.cabildo" type="radio" value="No" id="no">
                            <label class="form-check-label ml-2" for="No">No</label>
                        </div>

                        <div v-if="formPC.errors.cabildo" v-text="form.errors.cabildo" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>

                    </div>

                    <div class="mt-4">
                        <label for="fechainstalacion" class="text-lg mb-3">Fecha Instalación</label>
                        <input v-model="formPC.fecha_instalacion" type="date" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formPC.errors.fecha_instalacion" v-text="formPC.errors.fecha_instalacion" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>
                    
                    <div class="mt-4">
                        <label for="tecnico_informatico" class="text-lg mb-3">Técnico Informático</label>
                        <input v-model="formPC.tecnico_informatico" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formPC.errors.tecnico_informatico" v-text="formPC.errors.tecnico_informatico" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="observaciones" class="text-lg mb-3">Observaciones (Opcional)</label>
                        <textarea name="observaciones" v-model="formPC.observaciones" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80" placeholder="Deja aquí las observaciones..."></textarea>

                    </div>

                    <div class="mt-4">

                        <button type="submit" class="p-2 bg-teal-600 border border-transparent rounded-md font-semibold text-lg text-white hover:bg-teal-700 focus:bg-teal-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 ease-out duration-300">Crear</button>

                    </div>
                    
                </div>
            </form>
        </div>

        <div v-if="tipodispositivo === 'Impresora'">
            <form  @submit.prevent="submitImp" class="flex flex-col justify-start text-teal-600 mb-10 mt-7 bg-gray-50 shadow-md p-10 md:flex-row w-auto sm:w-2/4 md:w-2/4 lg:w-2/4 xl:w-2/5 2xl:w-2/5">
                <div class="pr-20">

                    <div class="mt-4">
                        <label for="nombre_dispositivo" class="text-lg mb-3">Nombre Dispositivo</label>
                        <input v-model="formTelefonia.nombre_dispositivo" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formTelefonia.errors.nombre_dispositivo" v-text="formTelefonia.errors.nombre_dispositivo" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>

                    </div>

                    <div class="mt-4">
                        <label for="numero_serie" class="text-lg mb-3">Número de Serie (Opcional)</label>
                        <input v-model="formTelefonia.numero_serie" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formTelefonia.errors.numero_serie" v-text="formTelefonia.errors.numero_serie" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>

                    </div>

                    <div class="mt-4">
                        <label for="conexion" class="text-lg mb-3">Conexión</label>
                        <input v-model="formImp.conexion" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formImp.errors.conexion" v-text="formImp.errors.conexion" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                       
                    </div>

                    <div class="mt-4">
                        <label for="zonatrabajo" class="text-lg mb-3">Zona de Trabajo</label>
                        <input v-model="formImp.zona_trabajo" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formImp.errors.zona_trabajo" v-text="formImp.errors.zona_trabajo" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="marca" class="text-lg mb-3">Marca</label>
                        <input v-model="formImp.marca" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formImp.errors.marca" v-text="formImp.errors.marca" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="modelo" class="text-lg mb-3">Modelo</label>
                        <input v-model="formImp.modelo" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formImp.errors.modelo" v-text="formImp.errors.modelo" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">
                         <label for="ip_principal" class="text-lg mb-3">IP Principal</label>
                         <input  v-model="formImp.ip_principal" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formImp.errors.ip_principal" v-text="formImp.errors.ip_principal" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="ip_secundaria" class="text-lg mb-3">IP Secundaria (Opcional)</label>
                        <input v-model="formImp.ip_secundaria" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                    </div>

                    <div class="mt-4">
                        <label class="text-lg mb-3">Pertenece al Cabildo</label>
                        <div class="d-flex flex-row w-25">

                            <input class="form-check-input" v-model="formImp.cabildo" type="radio" value="Si" id="si">
                            <label class="form-check-label ml-2" for="Si">Si</label>

                            <input class="form-check-input ml-4" v-model="formImp.cabildo" type="radio" value="No" id="no">
                            <label class="form-check-label ml-2" for="No">No</label>
                        </div>

                        <div v-if="formImp.errors.cabildo" v-text="formImp.errors.cabildo" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>

                    </div>

                    <div class="mt-4">
                        <label for="observaciones" class="text-lg mb-3">Observaciones (Opcional)</label>
                        <textarea name="observaciones" v-model="formImp.observaciones" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80" placeholder="Deja aquí las observaciones..."></textarea>

                    </div>

                    <div class="mt-4">

                        <button type="submit" class="p-2 bg-teal-600 border border-transparent rounded-md font-semibold text-lg text-white hover:bg-teal-700 focus:bg-teal-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 ease-out duration-300">Crear</button>

                    </div>

                </div>
            </form>
        </div>

        <div v-if="tipodispositivo === 'MaquinaFichar'">
            <form  @submit.prevent="submitMF" class="flex flex-col justify-start text-teal-600 mb-10 mt-7 bg-gray-50 shadow-md p-10 md:flex-row w-auto sm:w-2/3 md:w-2/5 lg:w-2/4 xl:w-2/5 2xl:w-2/5">
                <div class="pr-20">

                    <div class="mt-4">
                        <label for="conexion" class="text-lg mb-3">Nombre Dispositivo</label>
                        <input v-model="formMF.nombre_dispositivo" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formMF.errors.nombre_dispositivo" v-text="formMF.errors.nombre_dispositivo" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                       
                    </div>

                    <div class="mt-4">
                        <label for="zonatrabajo" class="text-lg mb-3">Número de Serie (Opcional)</label>
                        <input v-model="formMF.numero_serie" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formMF.errors.numero_serie" v-text="formMF.errors.numero_serie" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="conexion" class="text-lg mb-3">Conexión</label>
                        <input v-model="formImp.conexion" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formImp.errors.conexion" v-text="formImp.errors.conexion" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                       
                    </div>

                    <div class="mt-4">
                        <label for="zonatrabajo" class="text-lg mb-3">Zona de Trabajo</label>
                        <input v-model="formMF.zona_trabajo" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formMF.errors.zona_trabajo" v-text="formMF.errors.zona_trabajo" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="ip1" class="text-lg mb-3">IP Principal</label>
                        <input v-model="formMF.ip_principal" type="number" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formMF.errors.ip_principal" v-text="formMF.errors.ip_principal" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="observaciones" class="text-lg mb-3">Observaciones (Opcional)</label>
                        <textarea name="observaciones" v-model="formMF.observaciones" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80" placeholder="Deja aquí las observaciones..."></textarea>

                    </div>

                    <div class="mt-4">

                        <button type="submit" class="p-2 bg-teal-600 border border-transparent rounded-md font-semibold text-lg text-white hover:bg-teal-700 focus:bg-teal-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 ease-out duration-300">Crear</button>

                    </div>


                </div>
            </form>
        </div>

        <div v-if ="tipodispositivo === 'Grabadora'">

            <form  @submit.prevent="submitGrabadora" class="flex flex-col justify-start text-teal-600 mb-10 mt-7 bg-gray-50 shadow-md p-10 md:flex-row w-auto sm:w-2/3 md:w-2/5 lg:w-2/4 xl:w-2/5 2xl:w-2/5">
                <div class="pr-20">

                    <div class="mt-4">
                        <label for="nombre_dispositivo" class="text-lg mb-3">Nombre Dispositivo</label>
                        <input v-model="formGrabadora.nombre_dispositivo" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formGrabadora.errors.nombre_dispositivo" v-text="formGrabadora.errors.nombre_dispositivo" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                       
                    </div>

                    <div class="mt-4">
                        <label for="zonatrabajo" class="text-lg mb-3">Número de Serie (Opcional)</label>
                        <input v-model="formGrabadora.zona_trabajo" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formGrabadora.errors.zona_trabajo" v-text="formGrabadora.errors.zona_trabajo" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="conexion" class="text-lg mb-3">Conexión</label>
                        <input v-model="formGrabadora.conexion" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formGrabadora.errors.conexion" v-text="formGrabadora.errors.conexion" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                       
                    </div>

                    <div class="mt-4">
                        <label for="zonatrabajo" class="text-lg mb-3">Zona de Trabajo</label>
                        <input v-model="formGrabadora.zona_trabajo" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formGrabadora.errors.zona_trabajo" v-text="formGrabadora.errors.zona_trabajo" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="modelo" class="text-lg mb-3">Modelo</label>
                        <input v-model="formGrabadora.zona_trabajo" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formGrabadora.errors.zona_trabajo" v-text="formGrabadora.errors.zona_trabajo" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="ip_principal" class="text-lg mb-3">IP Principal</label>
                        <input v-model="formGrabadora.ip_principal" type="number" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formGrabadora.errors.ip_principal" v-text="formGrabadora.errors.ip_principal" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="observaciones" class="text-lg mb-3">Observaciones (Opcional)</label>
                        <textarea name="observaciones" v-model="formGrabadora.observaciones" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80" placeholder="Deja aquí las observaciones..."></textarea>

                    </div>

                    <div class="mt-4">

                        <button type="submit" class="p-2 bg-teal-600 border border-transparent rounded-md font-semibold text-lg text-white hover:bg-teal-700 focus:bg-teal-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 ease-out duration-300">Crear</button>

                    </div>


                </div>
            </form>
        
            
        
        </div>

        <div v-if="tipodispositivo === 'Telefonia'">

            <form  @submit.prevent="submitTelefonia" class="flex flex-col justify-start text-teal-600 mb-10 mt-7 bg-gray-50 shadow-md p-10 md:flex-row w-auto sm:w-2/3 md:w-2/5 lg:w-2/4 xl:w-2/5 2xl:w-2/5">
                <div class="pr-20">
                    <div class="mt-4">
                        <label for="nombre_dispositivo" class="text-lg mb-3">Nombre Dispositivo</label>
                        <input v-model="formTelefonia.nombre_dispositivo" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formTelefonia.errors.nombre_dispositivo" v-text="formTelefonia.errors.nombre_dispositivo" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>

                    </div>

                    <div class="mt-4">
                        <label for="imei" class="text-lg mb-3">IMEI</label>
                        <input v-model="formTelefonia.imei" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formTelefonia.errors.imei" v-text="formTelefonia.errors.imei" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>

                    </div>

                    <div class="mt-4">
                        <label for="conexion" class="text-lg mb-3">Conexión</label>
                        <input v-model="formTelefonia.conexion" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formTelefonia.errors.conexion" v-text="formTelefonia.errors.conexion" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                       
                    </div>

                    <div class="mt-4">
                        <label for="departamento" class="text-lg mb-3">Departamento</label>
                        <input v-model="formTelefonia.departamento" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formTelefonia.errors.departamento" v-text="formTelefonia.errors.departamento" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="zonatrabajo" class="text-lg mb-3">Zona de Trabajo</label>
                        <input v-model="formGrabadora.zona_trabajo" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formGrabadora.errors.zona_trabajo" v-text="formGrabadora.errors.zona_trabajo" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="marca" class="text-lg mb-3">Marca</label>
                        <input v-model="formTelefonia.marca" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formTelefonia.errors.marca" v-text="formTelefonia.errors.marca" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="modelo" class="text-lg mb-3">Modelo</label>
                        <input v-model="formTelefonia.modelo" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formTelefonia.errors.modelo" v-text="formTelefonia.errors.modelo" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="usuario_principal" class="text-lg mb-3">Usuario Principal</label>
                        <input v-model="formTelefonia.usuario_principal" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formTelefonia.errors.usuario_principal" v-text="formTelefonia.errors.usuario_principal" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="telefono" class="text-lg mb-3">Número de Teléfono</label>
                        <input v-model="formTelefonia.telefono" type="tel" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formTelefonia.errors.telefono" v-text="formTelefonia.errors.telefono" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="departamento" class="text-lg mb-3">Correo (Opcional)</label>
                        <input v-model="formTelefonia.correo" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formTelefonia.errors.correo" v-text="formTelefonia.errors.correo" class="w-80 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="observaciones" class="text-lg mb-3">Observaciones (Opcional)</label>
                        <textarea name="observaciones" v-model="formTelefonia.observaciones" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80" placeholder="Deja aquí las observaciones..."></textarea>

                    </div>

                    <div class="mt-4">

                        <button type="submit" class="p-2 bg-teal-600 border border-transparent rounded-md font-semibold text-lg text-white hover:bg-teal-700 focus:bg-teal-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 ease-out duration-300">Crear</button>

                    </div>
                </div>
            </form>
        </div>
        
    
    </div>
        </Layout>
            
</template>

<script setup>

import { useForm,Head } from '@inertiajs/vue3';
import  Layout  from '../../Layouts/Layout.vue';
import { ref } from 'vue';

    const tipodispositivo = ref('Seleccionar');


    let formPC = useForm({
        
        nombre_dispositivo:'',
        numero_serie:'',
        tipo_dispositivo:'',
        conexion:'',
        ip_principal:'',
        ip_secundaria:'',
        procesador:'',
        so:'',
        ram:'',
        programa_ofimatica:'',
        licencia_office:'',
        licencia_windows:'',
        correo_office:'',
        discoduro:'',
        departamento:'',
        dominio:'',
        usuario_principal:'',
        usuario_dominio:'',
        zona_trabajo:'',
        cabildo:'',
        fecha_instalacion:'',
        tecnico_informatico:'',
        observaciones:'',
    });

    let formImp = useForm({

        nombre_dispositivo:'',
        numero_serie:'',
        conexion:'',
        zona_trabajo:'',
        ip_principal:'',
        ip_secundaria:'',
        cabildo:'',
        observaciones:'',
    });

    let formMF = useForm({

        nombre_dispositivo:'',
        numero_serie:'',
        conexion:'',
        zona_trabajo:'',
        ip_principal:'',
        observaciones:'',

    })

    let formTelefonia = useForm({

        nombre_dispositivo:'',
        imei:'',
        conexion:'',
        zona_trabajo:'',
        marca:'',
        modelo:'',
        usuario_principal:'',
        telefono:'',
        departamento:'',
        correo:'',
        observaciones:'',
    
    })

    let formGrabadora = useForm({

        nombre_dispositivo:'',
        numero_serie:'',
        conexion:'',
        zona_trabajo:'',
        modelo:'',
        observaciones:'',
    })

    //Función para crear un nuevo registro de ordenador

    let submitPC= () => {

        form.post('/pc/crear');

    };

    //Función para crear un nuevo registro de Impresora

    let submitImp = () => {

        form.post('/imp/crear');

    };

    //Función para crear un nuevo registro de Máquina de Fichar

    let submitMF = () => {

        form.post('/maquina-fichar/crear');

    }

    //Función para crear un nuevo registro de telefonía
    let submitTelefonia = () => {

        form.post('/telefonia/crear');

    }

</script>
