<template>

    <Head title="Crear Dispositivo"></Head>

    <Layout>

    <div class="container mx-auto">
        <h3 class="text-3xl mt-12 font-bold text-neutral-800">Añadir Dispositivo</h3>


        <div class="mt-4">
            <label for="tipodispositivo" class="text-lg mb-3 font-bold">Tipo de Dispositivo</label>
            <select v-model="tipodispositivo" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80">
                <option value="Seleccionar">Seleccionar</option>
                <option value="Ordenador">Ordenador</option>
                <option value="Impresora">Impresora</option>
                <option value="MaquinaFichar">Máquina de Fichar</option>
                <option value="Grabadora">Grabadora</option>
                <option value="Telefonos">Teléfonos/Móviles/Tablets</option>
            </select>
        </div>

        <div v-if="tipodispositivo === 'Ordenador'">
            <form  @submit.prevent="submitOrdenador" class="w-auto flex flex-col justify-start text-teal-600 mb-10 mt-7 bg-gray-50 shadow-md p-10 md:flex-row w-2/3 lg:w-2/3">
                <div class="pr-20">
                    <div class="mt-4">
                        <label for="conexion" class="text-lg mb-3">Nombre Dispositivo</label>
                        <input v-model="formOrdenador.nombre_dispositivo" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formOrdenador.errors.nombre_dispositivo" v-text="formOrdenador.errors.nombre_dispositivo" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                    </div>

                    <div class="mt-4">

                        <label for="numero_serie" class="text-lg mb-3">Número de Serie (Opcional)</label>
                        <input v-model="formOrdenador.numero_serie" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                    </div>

                    <div class="mt-4">
                            <label for="conexion" class="text-lg mb-3">Conexión</label>
                            <input v-model="formOrdenador.conexion" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formOrdenador.errors.conexion" v-text="formOrdenador.errors.conexion" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                                

                        <div class="mt-4">
                        <label for="zonatrabajo" class="text-lg mb-3">Zona de Trabajo</label>
                        <select v-model="formOrdenador.zona_trabajo" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80">
                            <option v-for="zona_trabajo in zonas" :key="zona_trabajo.id">{{ zona_trabajo.nombre }}</option>
                        </select>

                        <div v-if="formOrdenador.errors.zona_trabajo" v-text="formOrdenador.errors.conexion" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80  md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                        
                    </div>

                    <div class="mt-4">
                            <label for="ip_principal" class="text-lg mb-3">IP Principal</label>
                            <input  v-model="formOrdenador.ip_principal" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                            <div v-if="formOrdenador.errors.ip_principal" v-text="formOrdenador.errors.ip_principal" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                        </div>

                        <div class="mt-4">
                            <label for="ip_secundaria" class="text-lg mb-3">IP Secundaria (Opcional)</label>
                            <input v-model="formOrdenador.ip_secundaria" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                        </div>

                        <div class="mt-4">
                            <label for="procesador" class="text-lg mb-3">Procesador</label>
                            <input v-model="formOrdenador.procesador" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                            <div v-if="formOrdenador.errors.procesador" v-text="formOrdenador.errors.procesador" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                        </div>

                        <div class="mt-4">
                            <label for="SO" class="text-lg mb-3">Sistema Operativo</label>
                            <input v-model="formOrdenador.so" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                            <div v-if="formOrdenador.errors.so" v-text="formOrdenador.errors.so" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                        </div>

                        <div class="mt-4">
                            <label for="ram" class="text-lg mb-3">RAM</label>
                            <input v-model="formOrdenador.ram" type="number" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                                <div v-if="formOrdenador.errors.ram" v-text="formOrdenador.errors.ram" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                        </div>

                        <div class="mt-4">

                            <label for="discoduro" class="text-lg mb-3">Disco Duro</label>
                            <input v-model="formOrdenador.discoduro" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                            <div v-if="formOrdenador.errors.discoduro" v-text="formOrdenador.errors.discoduro" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>

                        </div>

                        <div class="mt-4">

                            <label for="programa_ofimatica" class="text-lg mb-3">Programa Ofimática</label>
                            <input v-model="formOrdenador.programa_ofimatica" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>
                                
                            <div v-if="formOrdenador.errors.programa_ofimatica" v-text="formOrdenador.errors.programa_ofimatica" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>

                        </div>

                    </div>

                    
                </div>
  
                <div>

                    <div class="mt-4">

                            <label for="licencia_office" class="text-lg mb-3">Licencia Office (Opcional)</label>
                            <input v-model="formOrdenador.licencia_office" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>
                            
                    </div>

                    <div class="mt-4">

                        <label for="licencia_windows" class="text-lg mb-3">Licencia Windows (Opcional)</label>
                        <input v-model="formOrdenador.licencia_windows" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>
                        
                    </div>

                    <div class="mt-4">

                        <label for="correo_office" class="text-lg mb-3">Correo Office (Opcional)</label>
                        <input v-model="formOrdenador.correo_office" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>
                        
                    </div>

                    <div class="mt-4">
                        <label for="conexion" class="text-lg">Dominio/Grupo de Trabajo</label>
                        <input v-model="formOrdenador.dominio" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>
                        
                        <div v-if="formOrdenador.errors.dominio" v-text="formOrdenador.errors.dominio" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="usuarioprincipal" class="text-lg mb-3">Usuario Principal</label>
                        <input v-model="formOrdenador.usuario_principal" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formOrdenador.errors.usuario_principal" v-text="formOrdenador.errors.usuario_principal" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="usuariodominio" class="text-lg mb-3">Usuario Dominio</label>
                        <input v-model="formOrdenador.usuario_dominio" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formOrdenador.errors.usuario_dominio" v-text="formOrdenador.errors.usuario_dominio" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="zonatrabajo" class="text-lg mb-3">Departamento</label>
                        <select v-model="formOrdenador.departamento" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80">
                            <option v-for="departamento in departamentos" :key="departamento.id">{{ departamento.nombre }}</option>
                        </select>

                        <div v-if="formOrdenador.errors.departamento" v-text="formOrdenador.errors.departamento" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80  md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                        
                    </div>

                    <div class="mt-4">
                        <label class="text-lg mb-3">Pertenece al Cabildo</label>
                        <div class="d-flex flex-row w-25 mt-4">

                            <input class="form-check-input" v-model="formOrdenador.cabildo" type="radio" value="Si" id="si">
                            <label class="form-check-label ml-2" for="Si">Si</label>

                            <input class="form-check-input ml-4" v-model="formOrdenador.cabildo" type="radio" value="No" id="no">
                            <label class="form-check-label ml-2" for="No">No</label>
                        </div>

                        <div v-if="formOrdenador.errors.cabildo" v-text="formOrdenador.errors.cabildo" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>

                    </div>

                    <div class="mt-4">
                        <label for="fechainstalacion" class="text-lg mb-3">Fecha Instalación</label>
                        <input v-model="formOrdenador.fecha_instalacion" type="date" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formOrdenador.errors.fecha_instalacion" v-text="formOrdenador.errors.fecha_instalacion" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                    </div>
                    
                    <div class="mt-4">
                        <label for="tecnico_informatico" class="text-lg mb-3">Técnico Informático</label>
                        <input v-model="formOrdenador.tecnico_informatico" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formOrdenador.errors.tecnico_informatico" v-text="formOrdenador.errors.tecnico_informatico" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="observaciones" class="text-lg mb-3">Observaciones (Opcional)</label>
                        <textarea name="observaciones" v-model="formOrdenador.observaciones" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80" placeholder="Deja aquí las observaciones..."></textarea>

                    </div>

                    <div class="mt-4">

                        <button type="submit" class="p-2 bg-teal-600 border border-transparent rounded-md font-semibold text-lg text-white hover:bg-teal-700 focus:bg-teal-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 ease-out duration-300">Crear</button>

                    </div>
                    
                </div>
            </form>
        </div>

        <div v-if="tipodispositivo === 'Impresora'">
            <form  @submit.prevent="submitImpresora" class="w-auto flex flex-col justify-start text-teal-600 mb-10 mt-7 bg-gray-50 shadow-md p-10 md:flex-row w-2/3 lg:w-2/3">
                <div class="pr-20">

                    <div class="mt-4">
                        <label for="nombre_dispositivo" class="text-lg mb-3">Nombre Dispositivo</label>
                        <input v-model="formImpresora.nombre_dispositivo" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formImpresora.errors.nombre_dispositivo" v-text="formImpresora.errors.nombre_dispositivo" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>

                    </div>

                    <div class="mt-4">
                        <label for="numero_serie" class="text-lg mb-3">Número de Serie (Opcional)</label>
                        <input v-model="formImpresora.numero_serie" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formImpresora.errors.numero_serie" v-text="formImpresora.errors.numero_serie" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>

                    </div>

                    <div class="mt-4">
                        <label for="conexion" class="text-lg mb-3">Conexión</label>
                        <input v-model="formImpresora.conexion" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formImpresora.errors.conexion" v-text="formImpresora.errors.conexion" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                       
                    </div>

                    <div class="mt-4">
                        <label for="zonatrabajo" class="text-lg mb-3">Zona de Trabajo</label>
                        <select v-model="formImpresora.zona_trabajo" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80">
                            <option v-for="zona_trabajo in zonas" :key="zona_trabajo.id">{{ zona_trabajo.nombre }}</option>
                        </select>

                        <div v-if="formImpresora.errors.zona_trabajo" v-text="formImpresora.errors.conexion" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80  md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                        
                    </div>

                    <div class="mt-4">
                        <label for="marca" class="text-lg mb-3">Marca</label>
                        <input v-model="formImpresora.marca" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formImpresora.errors.marca" v-text="formImpresora.errors.marca" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                    </div>
                </div>

                <div>

                    <div class="mt-4">
                        <label for="modelo" class="text-lg mb-3">Modelo</label>
                        <input v-model="formImpresora.modelo" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formImpresora.errors.modelo" v-text="formImpresora.errors.modelo" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                    </div>

                    <div class="mt-4">
                         <label for="ip_principal" class="text-lg mb-3">IP Principal</label>
                         <input  v-model="formImpresora.ip_principal" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formImpresora.errors.ip_principal" v-text="formImpresora.errors.ip_principal" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="ip_secundaria" class="text-lg mb-3">IP Secundaria (Opcional)</label>
                        <input v-model="formImpresora.ip_secundaria" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                    </div>

                    <div class="mt-4">
                        <label class="text-lg mb-3">Pertenece al Cabildo</label>
                        <div class="d-flex flex-row w-25">

                            <input class="form-check-input" v-model="formImpresora.cabildo" type="radio" value="Si" id="si">
                            <label class="form-check-label ml-2" for="Si">Si</label>

                            <input class="form-check-input ml-4" v-model="formImpresora.cabildo" type="radio" value="No" id="no">
                            <label class="form-check-label ml-2" for="No">No</label>
                        </div>

                        <div v-if="formImpresora.errors.cabildo" v-text="formImpresora.errors.cabildo" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>

                    </div>

                    <div class="mt-4">
                        <label for="observaciones" class="text-lg mb-3">Observaciones (Opcional)</label>
                        <textarea name="observaciones" v-model="formImpresora.observaciones" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80" placeholder="Deja aquí las observaciones..."></textarea>

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

                        <div v-if="formMF.errors.nombre_dispositivo" v-text="formMF.errors.nombre_dispositivo" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                       
                    </div>

                    <div class="mt-4">
                        <label for="zonatrabajo" class="text-lg mb-3">Número de Serie (Opcional)</label>
                        <input v-model="formMF.numero_serie" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formMF.errors.numero_serie" v-text="formMF.errors.numero_serie" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="conexion" class="text-lg mb-3">Conexión</label>
                        <input v-model="formMF.conexion" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formMF.errors.conexion" v-text="formMF.errors.conexion" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                       
                    </div>

                    <div class="mt-4">
                        <label for="zonatrabajo" class="text-lg mb-3">Zona de Trabajo</label>
                        <select v-model="formMF.zona_trabajo" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80">
                            <option v-for="zona_trabajo in zonas" :key="zona_trabajo.id">{{ zona_trabajo.nombre }}</option>
                        </select>

                        <div v-if="formMF.errors.zona_trabajo" v-text="formMF.errors.conexion" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80  md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                        
                    </div>

                    <div class="mt-4">
                        <label for="ip1" class="text-lg mb-3">IP Principal</label>
                        <input v-model="formMF.ip_principal" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formMF.errors.ip_principal" v-text="formMF.errors.ip_principal" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
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

                        <div v-if="formGrabadora.errors.nombre_dispositivo" v-text="formGrabadora.errors.nombre_dispositivo" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                       
                    </div>

                    <div class="mt-4">
                        <label for="zonatrabajo" class="text-lg mb-3">Número de Serie (Opcional)</label>
                        <input v-model="formGrabadora.numero_serie" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>
                    </div>

                    <div class="mt-4">
                        <label for="conexion" class="text-lg mb-3">Conexión</label>
                        <input v-model="formGrabadora.conexion" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formGrabadora.errors.conexion" v-text="formGrabadora.errors.conexion" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                       
                    </div>

                    <div class="mt-4">
                        <label for="zonatrabajo" class="text-lg mb-3">Zona de Trabajo</label>
                        <select v-model="formGrabadora.zona_trabajo" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80">
                            <option v-for="zona_trabajo in zonas" :key="zona_trabajo.id">{{ zona_trabajo.nombre }}</option>
                        </select>

                        <div v-if="formGrabadora.errors.zona_trabajo" v-text="formGrabadora.errors.conexion" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80  md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                        
                    </div>

                    <div class="mt-4">
                        <label for="modelo" class="text-lg mb-3">Modelo</label>
                        <input v-model="formGrabadora.modelo" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formGrabadora.errors.modelo" v-text="formGrabadora.errors.modelo" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="ip_principal" class="text-lg mb-3">IP Principal</label>
                        <input v-model="formGrabadora.ip_principal" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formGrabadora.errors.ip_principal" v-text="formGrabadora.errors.ip_principal" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
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

        <div v-if="tipodispositivo === 'Telefonos'">

            <form  @submit.prevent="submitTelefonos" class="w-auto flex flex-col justify-start text-teal-600 mb-10 mt-7 bg-gray-50 shadow-md p-10 md:flex-row w-2/3 lg:w-2/3">
                <div class="pr-20">
                    <div class="mt-4">
                        <label for="nombre_dispositivo" class="text-lg mb-3">Nombre Dispositivo</label>
                        <input v-model="formTelefonos.nombre_dispositivo" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formTelefonos.errors.nombre_dispositivo" v-text="formTelefonos.errors.nombre_dispositivo" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>

                    </div>

                    <div class="mt-4">
                        <label for="imei" class="text-lg mb-3">IMEI(Opcional)</label>
                        <input v-model="formTelefonos.numero_serie" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formTelefonos.errors.numero_serie" v-text="formTelefonos.errors.numero_serie" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>

                    </div>

                    <div class="mt-4">
                        <label for="conexion" class="text-lg mb-3">Conexión</label>
                        <input v-model="formTelefonos.conexion" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formTelefonos.errors.conexion" v-text="formTelefonos.errors.conexion" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80  md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                       
                    </div>

                    <div class="mt-4">
                        <label for="zonatrabajo" class="text-lg mb-3">Zona de Trabajo</label>
                        <select v-model="formTelefonos.zona_trabajo" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80">
                            <option v-for="zona_trabajo in zonas" :key="zona_trabajo.id">{{ zona_trabajo.nombre }}</option>
                        </select>

                        <div v-if="formTelefonos.errors.zona_trabajo" v-text="formTelefonos.errors.conexion" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80  md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                        
                    </div>

                    <div class="mt-4">
                        <label for="zonatrabajo" class="text-lg mb-3">Departamento</label>
                        <select v-model="formTelefonos.departamento" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80">
                            <option v-for="departamento in departamentos" :key="departamento.id">{{ departamento.nombre }}</option>
                        </select>

                        <div v-if="formTelefonos.errors.departamento" v-text="formTelefonos.errors.departamento" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80  md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                        
                    </div>

                    <div class="mt-4">
                        <label for="marca" class="text-lg mb-3">Marca</label>
                        <input v-model="formTelefonos.marca" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formTelefonos.errors.marca" v-text="formTelefonos.errors.marca" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                    </div>
                </div>

                <div>

                    <div class="mt-4">
                        <label for="modelo" class="text-lg mb-3">Modelo</label>
                        <input v-model="formTelefonos.modelo" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formTelefonos.errors.modelo" v-text="formTelefonos.errors.modelo" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="usuario_principal" class="text-lg mb-3">Usuario Principal</label>
                        <input v-model="formTelefonos.usuario_principal" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formTelefonos.errors.usuario_principal" v-text="formTelefonos.errors.usuario_principal" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="telefono" class="text-lg mb-3">Número de Teléfono</label>
                        <input v-model="formTelefonos.numero_telefono" type="tel" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formTelefonos.errors.numero_telefono" v-text="formTelefonos.errors.numero_telefono" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="departamento" class="text-lg mb-3">Correo (Opcional)</label>
                        <input v-model="formTelefonos.correo" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="formTelefonos.errors.correo" v-text="formTelefonos.errors.correo" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label for="observaciones" class="text-lg mb-3">Observaciones (Opcional)</label>
                        <textarea name="observaciones" v-model="formTelefonos.observaciones" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-50 sm:w-50 xl:w-80 2xl:w-80" placeholder="Deja aquí las observaciones..."></textarea>

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

    import axios from 'axios';
    import { useForm,Head } from '@inertiajs/vue3';
    import  Layout  from '../../Layouts/Layout.vue';
    import { onMounted, ref } from 'vue';


    const tipodispositivo = ref('Seleccionar');
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

    console.log(departamentos);
    console.log(zonas);


    

/*--------------------------------------------------------------------------------*/



    let formOrdenador = useForm({
        
        nombre_dispositivo:'',
        numero_serie:'',
        conexion:'',
        zona_trabajo:'',
        tipo_dispositivo: 'Ordenador',
        ip_principal:'',
        ip_secundaria:'',
        procesador:'',
        so:'',
        ram:'',
        discoduro:'',
        programa_ofimatica:'',
        licencia_office:'',
        licencia_windows:'',
        correo_office:'',
        dominio:'',
        usuario_principal:'',
        usuario_dominio:'',
        departamento:'',
        cabildo:'',
        fecha_instalacion:'',
        tecnico_informatico:'',
        observaciones:'',
    });

    let formImpresora = useForm({

        nombre_dispositivo:'',
        numero_serie:'',
        conexion:'',
        tipo_dispositivo:'Impresora',
        zona_trabajo:'',
        marca:'',
        modelo:'',
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
        tipo_dispositivo:'Máquina de Fichar',
        ip_principal:'',
        observaciones:'',

    })

    let formTelefonos = useForm({

        nombre_dispositivo:'',
        numero_serie:'',
        conexion:'',
        zona_trabajo:'Informática',
        tipo_dispositivo:'Teléfono',
        marca:'',
        modelo:'',
        usuario_principal:'',
        numero_telefono:'',
        departamento:'',
        correo:'',
        observaciones:'',
    
    })

    let formGrabadora = useForm({

        nombre_dispositivo:'',
        numero_serie:'',
        conexion:'',
        zona_trabajo:'',
        tipo_dispositivo:'Grabadora',
        modelo:'',
        ip_principal:'',
        observaciones:'',
    })

    //Función para crear un nuevo registro de ordenador

    let submitOrdenador = () => {

        formOrdenador.post('/ordenador/crear');

    };

    //Función para crear un nuevo registro de Impresora

    let submitImpresora = () => {

        formImpresora.post('/impresora/crear');

    };

    //Función para crear un nuevo registro de Máquina de Fichar

    let submitMF = () => {

        formMF.post('/maquina-fichar/crear');

    }

    //Función para crear un nuevo registro de telefonía
    let submitTelefonos = () => {

        formTelefonos.post('/telefono/crear');

    }

    let submitGrabadora = () => {

        formGrabadora.post('/grabadora/crear');

    }

</script>
