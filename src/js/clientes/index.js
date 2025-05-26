//Esto manda a llamar todo lo que necesitamos
import { Dropdown } from "bootstrap";
import Swal from "sweetalert2";
import { validarFormulario } from '../funciones';
import DataTable from "datatables.net-bs5";
import { lenguaje } from "../lenguaje";
import { data } from "jquery";

//**************************/
//aqui mandamos a traer elementos del DOM

const FormularioClientes = document.getElementById('FormularioClientes');
const BtnGuardar = document.getElementById('BtnGuardar');
const InputClientesTelefono = document.getElementById('cli_telefono');
const BtnModificar = document.getElementById('BtnModificar');
const BtnLimpiar = document.getElementById('BtnLimpiar');

//**************************/
//Validaciones de Telefono
const ValidarTelefono = () => {
    const CantidadDigitos = InputClientesTelefono.value;

    if (CantidadDigitos.length < 1) {
        InputClientesTelefono.classList.remove('is-valid', 'is-invalid');
    } else {
        if (CantidadDigitos.length != 8) {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Número Telefónico Inválido",
                text: "La cantidad de dígitos debe ser igual a 8 dígitos",
                showConfirmButton: true,
            });

            InputClientesTelefono.classList.remove('is-valid');
            InputClientesTelefono.classList.add('is-invalid');
        } else {
            InputClientesTelefono.classList.remove('is-invalid');
            InputClientesTelefono.classList.add('is-valid');
        }
    }
}

//*********** */
//Guardar
const GuardarClientes = async (event) => {
    event.preventDefault();
    BtnGuardar.disabled = true;

    if (!validarFormulario(FormularioClientes, ['cli_id'])) {
        Swal.fire({
            position: "center",
            icon: "info",
            title: "FORMULARIO INCOMPLETO",
            text: "Debe validar todos los campos",
            showConfirmButton: true,
        });
        BtnGuardar.disabled = false;
        return;
    }

    const body = new FormData(FormularioClientes);

    // URL CORREGIDA - sin /app02_mrml/
    const url = '/clientes/guardarAPI';
    const config = {
        method: 'POST',
        body
    }

    try {
        const respuesta = await fetch(url, config);
        const datos = await respuesta.json();
        console.log(datos);
        const { codigo, mensaje } = datos;

        if (codigo == 1) {
            await Swal.fire({
                position: "center",
                icon: "success",
                title: "Éxito",
                text: mensaje,
                showConfirmButton: true,
            });

            limpiarTodo();
            BuscarClientes();
        } else {
            await Swal.fire({
                position: "center",
                icon: "info",
                title: "Error",
                text: mensaje,
                showConfirmButton: true,
            });
        }
    } catch (error) {
        console.log(error);
        await Swal.fire({
            position: "center",
            icon: "error",
            title: "Error de conexión",
            text: "No se pudo conectar con el servidor",
            showConfirmButton: true,
        });
    }
    BtnGuardar.disabled = false;
}

//******************************* */
//Buscar Clientes
const BuscarClientes = async () => {
    // URL CORREGIDA - sin /app02_mrml/
    const url = '/clientes/buscarAPI';
    const config = {
        method: 'GET'
    }

    try {
        const respuesta = await fetch(url, config);
        const datos = await respuesta.json();
        const { codigo, mensaje, data } = datos;

        if (codigo == 1) {
            datatable.clear().draw();
            datatable.rows.add(data).draw();
        } else {
            await Swal.fire({
                position: "center",
                icon: "info",
                title: "Error",
                text: mensaje,
                showConfirmButton: true,
            });
        }
    } catch (error) {
        console.log(error);
        await Swal.fire({
            position: "center",
            icon: "error",
            title: "Error",
            text: "No hay existen datos en la Db o hay problema en la conexion",
            showConfirmButton: true,
        });
    }
}

//******************************* */
//DATA-Table
const datatable = new DataTable('#TableClientes', {
    dom: `
        <"row mt-3 justify-content-between" 
            <"col" l> 
            <"col" B> 
            <"col-3" f>
        >
        t
        <"row mt-3 justify-content-between" 
            <"col-md-3 d-flex align-items-center" i> 
            <"col-md-8 d-flex justify-content-end" p>
        >
    `,
    language: lenguaje,
    data: [],
    columns: [
        {
            title: 'No.',
            data: 'cli_id',
            width: '5%',
            render: (data, type, row, meta) => meta.row + 1
        },
        { title: 'Primer Nombre', data: 'cli_nombre1' },
        { title: 'Segundo Nombre', data: 'cli_nombre2' },
        { title: 'Primer Apellido', data: 'cli_ape1' },
        { title: 'Segundo Apellido', data: 'cli_ape2' },
        { title: 'Correo', data: 'cli_email' },
        { title: 'Teléfono', data: 'cli_telefono' },
        { title: 'País', data: 'cli_pais' },
        {
            title: 'Acciones',
            data: 'cli_id',
            searchable: false,
            orderable: false,
            render: (data, type, row, meta) => {
                return `
                 <div class='d-flex justify-content-center'>
                     <button class='btn btn-warning modificar mx-1' 
                         data-id="${data}" 
                         data-nombre1="${row.cli_nombre1}"
                         data-nombre2="${row.cli_nombre2}"
                         data-apellido1="${row.cli_ape1}"
                         data-apellido2="${row.cli_ape2}"   
                         data-correo="${row.cli_email}"  
                         data-telefono="${row.cli_telefono}"
                         data-pais="${row.cli_pais}">
                         <i class='bi bi-pencil-square me-1'></i> Modificar
                     </button>
                     <button class='btn btn-danger eliminar mx-1' 
                         data-id="${data}">
                        <i class="bi bi-trash3 me-1"></i> Eliminar
                     </button>
                 </div>`;
            }
        }
    ]
});

//****************************** */
//llenar formulario
const llenarFormulario = (event) => {
    const datos = event.currentTarget.dataset;

    document.getElementById('cli_id').value = datos.id;
    document.getElementById('cli_nombre1').value = datos.nombre1;
    document.getElementById('cli_nombre2').value = datos.nombre2;
    document.getElementById('cli_ape1').value = datos.apellido1;
    document.getElementById('cli_ape2').value = datos.apellido2;
    document.getElementById('cli_telefono').value = datos.telefono;
    document.getElementById('cli_email').value = datos.correo;
    document.getElementById('cli_pais').value = datos.pais;

    BtnGuardar.classList.add('d-none');
    BtnModificar.classList.remove('d-none');

    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

const limpiarTodo = () => {
    FormularioClientes.reset();
    BtnGuardar.classList.remove('d-none');
    BtnModificar.classList.add('d-none');
    
    const inputs = FormularioClientes.querySelectorAll('input');
    inputs.forEach(input => {
        input.classList.remove('is-valid', 'is-invalid');
    });
}

//*************** */
//Modificar Clientes
const ModificarClientes = async (event) => {
    event.preventDefault();
    BtnModificar.disabled = true;

    if (!validarFormulario(FormularioClientes, [''])) {
        Swal.fire({
            position: "center",
            icon: "info",
            title: "FORMULARIO INCOMPLETO",
            text: "Debe validar todos los campos",
            showConfirmButton: true,
        });
        BtnModificar.disabled = false;
        return;
    }

    const body = new FormData(FormularioClientes);

    // URL CORREGIDA - sin /app02_mrml/
    const url = '/clientes/modificarAPI';
    const config = {
        method: 'POST',
        body
    }

    try {
        const respuesta = await fetch(url, config);
        const datos = await respuesta.json();
        const { codigo, mensaje } = datos;

        if (codigo == 1) {
            await Swal.fire({
                position: "center",
                icon: "success",
                title: "Éxito",
                text: mensaje,
                showConfirmButton: true,
            });

            limpiarTodo();
            BuscarClientes();
        } else {
            await Swal.fire({
                position: "center",
                icon: "info",
                title: "Error",
                text: mensaje,
                showConfirmButton: true,
            });
        }
    } catch (error) {
        console.log(error);
        await Swal.fire({
            position: "center",
            icon: "error",
            title: "Error",
            text: "No se pudo actualizar el registro",
            showConfirmButton: true,
        });
    }
    BtnModificar.disabled = false;
}

//************************************** */
//Eliminar Cliente
const EliminarClientes = async (e) => {
    const idClientes = e.currentTarget.dataset.id;

    const AlertaConfirmarEliminar = await Swal.fire({
        position: "center",
        icon: "warning",
        title: "¿Desea ejecutar esta acción?",
        text: 'Esta completamente seguro que desea eliminar este registro',
        showConfirmButton: true,
        confirmButtonText: 'Sí, Eliminar',
        confirmButtonColor: '#d33',
        cancelButtonText: 'No, Cancelar',
        showCancelButton: true
    });

    if (AlertaConfirmarEliminar.isConfirmed) {
        // URL CORREGIDA - sin /app02_mrml/
        const url = `/clientes/EliminarAPI?cli_id=${idClientes}`;
        const config = {
            method: 'GET'
        }

        try {
            const consulta = await fetch(url, config);
            const respuesta = await consulta.json();
            const { codigo, mensaje } = respuesta;

            if (codigo == 1) {
                await Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Éxito",
                    text: mensaje,
                    showConfirmButton: true,
                });

                BuscarClientes();
            } else {
                await Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Error",
                    text: mensaje,
                    showConfirmButton: true,
                });
            }
        } catch (error) {
            console.log(error);
            await Swal.fire({
                position: "center",
                icon: "error",
                title: "Error de conexión",
                text: "No se pudo eliminar el registro",
                showConfirmButton: true,
            });
        }
    }
}

// Event Listeners
BuscarClientes();
datatable.on('click', '.eliminar', EliminarClientes);
datatable.on('click', '.modificar', llenarFormulario);
FormularioClientes?.addEventListener('submit', GuardarClientes);
InputClientesTelefono?.addEventListener('change', ValidarTelefono);
BtnLimpiar?.addEventListener('click', limpiarTodo);
BtnModificar?.addEventListener('click', ModificarClientes);